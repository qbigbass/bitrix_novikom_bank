<?php
/**
 * @note Класс поднимает все свойства, переданные в fetchElementProperties в $propertiesToGet
 * @note и получает их значения. У полученных элементов аналогично поднимаются все привязки, рекурсивно.
 * @note Пока у привязанного элемента есть свои привязки, данные по ним также будут получены. При этом в $propertiesToGet
 * @note фильтруются значения с ошибками, не полученные значения пропускаются. Вложенные свойства сортируются по значению SORT.
 */

namespace Dalee\Helpers;

use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\ORM\CommonElementTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use CFile;

class ElementPropertiesFetcher
{
    private int $iblockId;
    private array $properties = [];
    private array $propertyTypes = [
        'E' => 'ELEMENT',
        'F' => 'FILE',
        'L' => 'ITEM',
        'G' => 'SECTION',
    ];
    private array $loadedElements = [];

    public function __construct(int $iblockId)
    {
        $this->iblockId = $iblockId;
    }

    /**
     * @param array $propertiesToGet
     * @param array $elementIds
     * @return void
     */
    public function fetchElementProperties(array $propertiesToGet, array $elementIds): void
    {
        try {
            $dataClass = $this->getDataClass($this->iblockId);
            $properties = $this->getPropertyTypes($propertiesToGet, $this->iblockId);

            $data = [
                'order' => ['SORT' => 'ASC'],
                'filter' => ['ID' => $elementIds],
                'select' => array_map(function ($prop) {
                    return isset($this->propertyTypes[$prop['TYPE']]) ? $prop['CODE'] . "." . $this->propertyTypes[$prop['TYPE']] : $prop['CODE'];
                }, $properties),
            ];

            $res = $dataClass::getList($data)->fetchCollection();
            foreach ($res as $element) {
                $this->processElement($properties, $element);
            }
        } catch (SystemException $e) {
            $this->filterBadPropertyName($e->getMessage(), $propertiesToGet, $elementIds);
        }
    }

    /**
     * @param array $properties
     * @param object $element
     * @return void
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function processElement(array $properties, object $element): void
    {
        foreach ($properties as $property) {
            $dbProperty = $element->get($property['CODE']);

            if ($property['MULTIPLE']) {
                $dbProperty->getAll();
                foreach ($dbProperty as $propertyValue) {
                    $this->processElementProperty($propertyValue, $property['TYPE']);
                }
            } else {
                $this->processElementProperty($dbProperty, $property['TYPE']);
            }
        }
    }

    /**
     * @param object $propertyObject
     * @param string $propertyType
     * @return void
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function processElementProperty(object $propertyObject, string $propertyType): void
    {
        $elementDTO = $this->createElementDTO($propertyObject, $propertyType);

        $this->fetchLinkedElementProperties($elementDTO, $depth = 0);

        $this->properties[$elementDTO->id] = $elementDTO;
    }

    /**
     * @param ElementDTO $elementDTO
     * @param int $depth
     * @return void
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function fetchLinkedElementProperties(ElementDTO $elementDTO, int $depth): void
    {
        if (in_array($elementDTO->id, $this->loadedElements)) {
            return;
        }

        $this->loadedElements[] = $elementDTO->id;

        $elementProperties = ElementPropertyTable::getList([
            'filter' => ['IBLOCK_ELEMENT_ID' => $elementDTO->id],
            'select' => ['IBLOCK_PROPERTY_ID', 'VALUE', 'DESCRIPTION'],
        ])->fetchCollection();

        foreach ($elementProperties as $elementProperty) {
            $arElementProperty = PropertyTable::getByPrimary($elementProperty->getIblockPropertyId())->fetchObject();

            $propertyDTO = $this->createPropertyDTO($elementProperty, $arElementProperty);
            $elementDTO->addProperty($propertyDTO);

            if ($propertyDTO->type === 'E') {
                $linkedItem = $this->getLinkedItem($arElementProperty->getLinkIblockId(), $propertyDTO->value);
                $propertyDTO->linkedItem = $linkedItem;
                $this->fetchLinkedElementProperties($linkedItem, $depth + 1);
            } elseif ($propertyDTO->type === 'G') {
                $linkedSection = $this->getLinkedSection($propertyDTO->value);
                $propertyDTO->linkedSection = $linkedSection;
                $this->fetchSectionElements($linkedSection);
            }
        }
    }

    /**
     * @param object $propertyObject
     * @param string $propertyType
     * @return ElementDTO
     */
    private function createElementDTO(object $propertyObject, string $propertyType): ElementDTO
    {
        if (isset($this->propertyTypes[$propertyType])) {
            $property = $propertyObject->get($this->propertyTypes[$propertyType]);
        } else {
            $property = $propertyObject;
        }

        return new ElementDTO(
            $property->getId(),
            $property->getName(),
            $property->getCode(),
            $property->getPreviewPicture() ? CFile::GetPath($property->getPreviewPicture()) : null,
            $property->getPreviewText(),
            $property->getDetailText()
        );
    }

    /**
     * @param object $elementProperty
     * @param object $arElementProperty
     * @return ElementPropertyDTO
     */
    private function createPropertyDTO(object $elementProperty, object $arElementProperty): ElementPropertyDTO
    {
        $elementPropertyValue = $elementProperty->getValue();
        $elementPropertyCode = $arElementProperty->getCode();
        $elementPropertyType = $arElementProperty->getPropertyType();

        return new ElementPropertyDTO(
            $elementProperty->getId(),
            $elementPropertyCode,
            $elementPropertyType,
            $elementPropertyValue,
            $elementProperty->getDescription(),
            $arElementProperty->getSort(),
            $elementPropertyType === 'F' ? CFile::GetPath($elementPropertyValue) : null
        );
    }

    /**
     * @param int $iblockId
     * @param int $value
     * @return ElementDTO
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function getLinkedItem(int $iblockId, int $value): ElementDTO
    {
        $dataClass = $this->getDataClass($iblockId);

        $data = [
            'order' => ['SORT' => 'ASC'],
            'filter' => ['ID' => $value],
        ];

        $res = $dataClass::getList($data)->fetchObject();

        return new ElementDTO (
            $res->getId(),
            $res->getName(),
            $res->getCode(),
            $res->getPreviewPicture() ? CFile::GetPath($res->getPreviewPicture()) : null,
            $res->getPreviewText(),
            $res->getDetailText()
        );
    }

    /**
     * @param int $sectionId
     * @return ElementDTO
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function getLinkedSection(int $sectionId): ElementDTO
    {
        $section = SectionTable::getByPrimary($sectionId)->fetchObject();

        $elementDTO = new ElementDTO (
            $section->getId(),
            $section->getName(),
            $section->getCode(),
            $section->getPicture() ? CFile::GetPath($section->getPicture()) : null,
            $section->getDescription(),
        );

        $elementDTO->iblockId = $section->getIblockId();

        return $elementDTO;
    }

    /**
     * @param ElementDTO $elementDTO
     * @return void
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function fetchSectionElements(ElementDTO $elementDTO): void
    {
        $dataClass = $this->getDataClass($elementDTO->iblockId);

        $data = [
            'order' => ['SORT' => 'ASC'],
            'filter' => ['IBLOCK_SECTION_ID' => $elementDTO->id],
            'select' => ['ID', 'NAME', 'CODE', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'DETAIL_TEXT'],
        ];

        $res = $dataClass::getList($data)->fetchCollection();
        foreach ($res as $element) {
            $element = new ElementDTO(
                $element->getId(),
                $element->getName(),
                $element->getCode(),
                $element->getPreviewPicture() ? CFile::GetPath($element->getPreviewPicture()) : null,
                $element->getPreviewText(),
                $element->getDetailText()
            );

            $elementDTO->elements[] = $element;
            $this->fetchLinkedElementProperties($elementDTO, $depth = 0);
        }
    }

    /**
     * @param int $iblockId
     * @return string|CommonElementTable
     */
    private function getDataClass(int $iblockId): string|CommonElementTable
    {
        return Iblock::wakeUp($iblockId)->getEntityDataClass();
    }

    /**
     * @param array $propertiesToGet
     * @param int $iblockId
     * @return array|null
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function getPropertyTypes(array $propertiesToGet, int $iblockId): ?array
    {
        $result = [];

        $data = [
            'order' => ['SORT' => 'ASC'],
            'filter' => ['CODE' => $propertiesToGet, 'IBLOCK_ID' => $iblockId],
            'select' => ['ID', 'CODE', 'PROPERTY_TYPE', 'MULTIPLE']
        ];

        $properties = PropertyTable::getList($data)->fetchCollection();

        foreach ($properties as $property) {
            $result[] = [
                'ID' => $property->getId(),
                'CODE' => $property->getCode(),
                'TYPE' => $property->getPropertyType(),
                'MULTIPLE' => $property->getMultiple(),
            ];
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        foreach ($this->properties as $elementDTO) {
            if (!empty($elementDTO->properties)) {
                $this->sortPropertiesInElementDTO($elementDTO);
            }
        }

        return $this->properties;
    }

    /**
     * @param ElementDTO $elementDTO
     * @return void
     */
    private function sortPropertiesInElementDTO(ElementDTO $elementDTO): void
    {
        foreach ($elementDTO->properties as $code => $values) {
            foreach ($values as $value) {
                if (!empty($value->linkedItem->properties)) {
                    $this->sortPropertiesInElementDTO($value->linkedItem);
                }
            }
            $sortOrder[$code] = $values[0]->sort;
        }

        uksort($elementDTO->properties, function ($a, $b) use ($elementDTO) {
            $sortA = $elementDTO->properties[$a][0]->sort ?? PHP_INT_MAX;
            $sortB = $elementDTO->properties[$b][0]->sort ?? PHP_INT_MAX;

            return $sortA <=> $sortB;
        });
    }

    /**
     * @param string $message
     * @param array $propertiesToGet
     * @param array $elementIds
     * @return void
     */
    private function filterBadPropertyName(string $message, array $propertiesToGet, array $elementIds): void
    {
        if (preg_match('/\((\w+)\.\w+\)/', $message, $matches)) {
            $propertyName = $matches[1];
            $propertiesToGet = array_filter($propertiesToGet, function ($prop) use ($propertyName) {
                return $prop !== $propertyName;
            });

            $this->fetchElementProperties($propertiesToGet, $elementIds);
        } else {
            echo $message;
        }
    }
}
