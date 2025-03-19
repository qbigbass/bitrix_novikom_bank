<?php
namespace Dalee\Helpers;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionTable;
use CIBlockElement;
use CIBlockFormatProperties;
use Bitrix\Iblock\Model\Section;
use CIBlockSection;

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
    public static function getIblockSectionElementsIds(string $iblockCode, ?string $sectionCode = null, ?array $sectionFilter = []): array
    {
        $iblockId = iblock($iblockCode);
        $arElementFilter = [
            'IBLOCK_ID' => $iblockId,
        ];

        if (!empty($sectionCode)) {
            $entity = Section::compileEntityByIblock($iblockId);
            $sections = $entity::getList([
                "select" => [
                    'ID',
                    'CODE',
                    'IBLOCK_SECTION_ID',
                ],
                "filter" => $sectionFilter
            ])->fetchAll();

            $sectionsById = array_column($sections, null, 'ID');
            $sectionsByCode = array_column($sections, 'ID', 'CODE');

            if (!isset($sectionsByCode[$sectionCode])) {
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
            $arElementFilter['IBLOCK_SECTION_ID'] = $ids;
        }

        $elements = ElementTable::getList([
            'filter' => $arElementFilter,
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

    /**
     * Получаем элементы ИБ без разделов, для построения верхнего меню
     *
     * @param string $iblockCode
     * @param string|null $dir
     * @return array
     */
    public static function getIblockMenuWithoutSections(string $iblockCode, ?string $dir): array
    {
        $return = [];
        $elements = ElementTable::GetList([
            "select" => ["ID", "NAME", "CODE"],
            "filter" => [
                "IBLOCK_ID" => iblock($iblockCode),
                'IBLOCK_SECTION_ID' => false,
                "ACTIVE" => "Y"
            ],
            'order' => ['SORT' => 'ASC']
        ])->fetchAll();

        foreach ($elements as $element) {
            $link = $dir . $element["CODE"] . "/";
            $return[] = [
                $element["NAME"],
                $link,
                [],
                ["show_only_in_header" => "Y"]
            ];
        }
        return $return;
    }

    /**
     * Получает меню с верхними разделами ИБ, в которых есть активные элементы
     *
     * @param string $iblockCode
     * @return array
     */
    public static function getMenuSectionsWithActiveElements(string $iblockCode): array
    {
        $aMenuLinksExt = [];

        $sections = CIBlockSection::GetList(
            [
                'SORT' => 'ASC',
                'NAME' => 'ASC'
            ],
            [
                'IBLOCK_ID' => iblock($iblockCode),
                'ACTIVE' => 'Y',
                'CNT_ACTIVE' => 'Y',
                'SECTION_ID' => false,
            ],
            true,
            [
                'ID',
                'NAME',
                'SECTION_PAGE_URL',
                'ELEMENT_CNT'
            ]
        );

        while ($section = $sections->GetNext()) {
            if ($section['ELEMENT_CNT'] == 0) {
                continue;
            }

            $aMenuLinksExt[] = [
                $section['NAME'],
                $section['SECTION_PAGE_URL'],
                [],
                [],
            ];
        }

        return $aMenuLinksExt;
    }

    /**
     * Получаем Элементы ИБ по фильтру. Используется в комплексным компонентах, для получения элементов по коду
     *
     * @param array $filter
     * @return array
     */
    public static function getIblockElementByFilter(array $filter): array
    {
        return ElementTable::GetList([
            "filter" => $filter,
        ])->fetchAll();
    }

    /**
     * Получаем св-ва ИБ по кодам
     *
     * @param int $iblockID
     * @param array $propCodes
     * @return array
     */
    public static function getPropsByCode(int $iblockID, array $propCodes): array
    {
        $result = [];
        $propRes = PropertyTable::getList([
            'filter' => ['IBLOCK_ID' => $iblockID, 'CODE' => $propCodes, 'ACTIVE' => 'Y'],
            'select' => ['ID','CODE','NAME','MULTIPLE','PROPERTY_TYPE','LIST_TYPE','USER_TYPE'],
        ]);
        while ($prop = $propRes->fetch()) {
            $result[$prop['CODE']] = $prop;
        }
        return $result;
    }

    public static function onAfterIBlockSectionUpdateHandler(&$arFields)
    {
        global $CACHE_MANAGER;
        $arIblocks = getIblockIdsClearMenu();

        if (!empty($arFields) && (in_array((int)$arFields["IBLOCK_ID"], $arIblocks, true))) {
            $CACHE_MANAGER->ClearByTag("bitrix:menu");
        }
    }

    public static function onAfterIBlockSectionDeleteHandler($ID)
    {
        global $CACHE_MANAGER;

        if ($ID > 0) {
            $section = SectionTable::getByPrimary($ID)->fetchObject();
            $iblockId = $section->getIblockId();
            $arIblocks = getIblockIdsClearMenu();

            if (in_array((int)$iblockId, $arIblocks, true)) {
                $CACHE_MANAGER->ClearByTag("bitrix:menu");
            }
        }
    }

    /**
     * @param int|null $iblockId
     * @return array
     */
    public static function getEmptySections(?int $iblockId, ?bool $idsOnly = false): array
    {
        $result = [];
        if (empty($iblockId)) {
            return $result;
        }

        $arSections = CIBlockSection::GetList(
            ["SORT" => "ASC"],
            [
                'IBLOCK_ID' => $iblockId,
                'CNT_ACTIVE' => 'Y',
            ],
            true,
            ['ID', 'CODE']
        );

        $arInactiveSections = SectionTable::getList([
            'filter' => [
                'IBLOCK_ID' => $iblockId,
                'ACTIVE' => 'N'
            ],
            'select' => ['ID', 'CODE']
        ])->fetchAll();

        while ($res = $arSections->fetch()) {
            if (!$res['ELEMENT_CNT']) {
                $result[] = !$idsOnly ? $res['CODE'] : $res['ID'];
            }
        }

        if (!empty($arInactiveSections)) {
            foreach ($arInactiveSections as $section) {
                $result[] = !$idsOnly ? $section['CODE'] : $section['ID'];
            }
        }

        return array_unique($result);
    }
}
