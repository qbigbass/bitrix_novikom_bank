<?php
namespace Dalee\Helpers;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionTable;
use CIBlockElement;
use CIBlockFormatProperties;

class IblockHelper
{
    private int $iblockId = 0;
    private string $iblockCode = '';
    private array $iblockProperties = [];

    private function __construct(string $elementCode, string $iblockType)
    {
        $iblock = $this->fetchIblock($elementCode, $iblockType);

        if(!empty($iblock)) {
            $this->iblockId = $iblock['ID'];
            $this->iblockCode = $iblock['CODE'];
            $this->iblockProperties = $iblock['PROPERTIES'];
        }
    }

    private function fetchIblock(string $elementCode, string $iblockType): array
    {
        $iblockId = $this->fetchIblockId($elementCode, $iblockType);
        $iblocks = IblockTable::getList([
            'filter' => ['ID' => $iblockId],
            'select' => ['ID', 'CODE', 'PROPERTY_CODE' => 'PROPERTIES.CODE'],
            'runtime' => [
                'PROPERTIES' => [
                    'data_type' => PropertyTable::getEntity(),
                    'reference' => [
                        '=this.ID' => 'ref.IBLOCK_ID'
                    ],
                    'join_type' => 'LEFT'
                ],
            ]
        ])->fetchAll();

        $result = [];
        foreach ($iblocks as $iblock) {
            $result[$iblock['ID']]['ID'] = $iblock['ID'];
            $result[$iblock['ID']]['CODE'] = $iblock['CODE'];
            $result[$iblock['ID']]['PROPERTIES'][] = $iblock['PROPERTY_CODE'];
        }

        return !empty($result[$iblockId]) ? $result[$iblockId] : [];
    }

    private function fetchIblockId(string $elementCode, string $iblockType): int
    {
        $result = ElementTable::getList([
            'filter' => ['CODE' => $elementCode, 'IBLOCK.TYPE.ID' => $iblockType],
            'select' => ['IBLOCK_ID'],
            'order' => ['SORT' => 'ASC'],
            'limit' => 1
        ])->fetch();

        return (!empty($result['IBLOCK_ID'])) ? $result['IBLOCK_ID'] : 0;
    }

    public static function getBy(string $elementCode, string $iblockType): IblockHelper
    {
        return new IblockHelper($elementCode, $iblockType);
    }

    public function getId(): int
    {
        return $this->iblockId;
    }

    public function getCode(): string
    {
        return $this->iblockCode;
    }

    public function getProperties(): array
    {
        return $this->iblockProperties;
    }

    /**
     * @param string $iblockCode
     * @param string|null $sectionCode
     * @return array
     * @throws \Bitrix\Main\SystemException
     */
    public static function getIblockSectionElementsIds(string $iblockCode, ?string $sectionCode = null): array
    {
        $iblockId = iblock($iblockCode);
        $filter = [
            'IBLOCK_ID' => $iblockId
        ];

        if (!empty($sectionCode)) {
            $sections = SectionTable::getList([
                'filter' => [
                    'IBLOCK_ID' => $iblockId,
                ],
                'select' => [
                    'ID',
                    'CODE',
                    'IBLOCK_SECTION_ID',
                ]
            ])->fetchAll();

            $sectionsById = array_column($sections, null, 'ID');
            $sectionsByCode = array_column($sections, 'ID', 'CODE');

            if (!isset($sectionsByCode[$sectionCode])) {
                echo ("Раздел $sectionCode не найден");
                return [];
            }

            $parentSectionId = $sectionsByCode[$sectionCode];
            $ids = [$parentSectionId];

            // Рекурсивная функция для поиска всех потомков
            $collectDescendants = function ($parentId) use (&$collectDescendants, $sectionsById, &$ids) {
                foreach ($sectionsById as $section) {
                    if ($section['IBLOCK_SECTION_ID'] == $parentId) {
                        $ids[] = $section['ID'];
                        $collectDescendants($section['ID']);
                    }
                }
            };

            $collectDescendants($parentSectionId);

            $filter['IBLOCK_SECTION_ID'] = $ids;
        }

        $elements = ElementTable::getList([
            'filter' => $filter,
            'select' => ['ID'],
        ])->fetchAll();

        return array_column($elements, 'ID');
    }

    public static function getItemsSectionData(array &$items): void
    {
        $sectionIds = array_column($items, 'IBLOCK_SECTION_ID');

        $sections = \Bitrix\Iblock\SectionTable::getList([
            'filter' => [
                'ID' => $sectionIds
            ],
            'select' => [
                'ID',
                'NAME',
                'CODE'
            ]
        ])->fetchAll();

        foreach ($items as &$item) {
            foreach ($sections as $section) {
                if ($section['ID'] == $item['IBLOCK_SECTION_ID']) {
                    $item['SECTION'] = $section;
                    break;
                }
            }
        }
    }

    /**
     * Возвращает список элементов инфоблока с DISPLAY_PROPERTIES
     *
     * @param $order
     * @param $filter
     * @param array|bool $groupBy
     * @param array|bool $nav
     * @param array $propertyFilter
     * @param array $options
     * @return array
     */
    public static function getElementsWithProperties($order, $filter, $groupBy = false, $nav = false, $propertyFilter = [], $options = [])
    {
        $elements = [];

        $res = CIBlockElement::GetList($order, $filter, $groupBy, $nav);

        $res->NavStart();

        while ($row = $res->GetNext()) {
            $row['PROPERTIES'] = [];
            $elements[$row['ID']] =& $row;
            unset($row);
        }

        $total = intval($res->NavRecordCount);

        CIBlockElement::GetPropertyValuesArray($elements, $filter['IBLOCK_ID'], $filter, $propertyFilter, $options);

        $items = array_values($elements);

        foreach ($items as &$item) {
            foreach ($propertyFilter["CODE"] as $pid) {
                $prop = &$item["PROPERTIES"][$pid];
                if ((is_array($prop["VALUE"]) && count($prop["VALUE"]) > 0) || (!is_array($prop["VALUE"]) && $prop["VALUE"] <> '')) {
                    $prop = $item['PROPERTIES'][$pid];
                    $item['DISPLAY_PROPERTIES'][$pid] = CIBlockFormatProperties::GetDisplayValue($item, $prop);
                }
            }
        }

        return [
            'items' => $items,
            'total' => $total,
        ];
    }

    /**
     * Возвращает список вариантов значений свойства типа "список"
     *
     * @param $iblockId
     * @param $propertyCode
     * @return array
     */
    public static function getPropertyEnumList($iblockId, $propertyCode)
    {
        $enumList = [];

        $res = \CIBlockPropertyEnum::GetList(
            ['SORT' => 'ASC'],
            ['IBLOCK_ID' => $iblockId, 'CODE' => $propertyCode]
        );

        while ($row = $res->GetNext()) {
            $enumList[] = $row;
        }

        return $enumList;
    }

    public static function onAfterIblockElementUpdateHandler(&$arFields)
    {
        global $DB, $CACHE_MANAGER;

        $res = $DB->Query("SELECT LINK_IBLOCK_ID, IBLOCK_ID FROM b_iblock_property WHERE IBLOCK_ID = " . $DB->ForSql($arFields['IBLOCK_ID']));

        while ($row = $res->Fetch()) {
            $CACHE_MANAGER->ClearByTag('iblock_id_' . $row['LINK_IBLOCK_ID']);
        }
    }
}
