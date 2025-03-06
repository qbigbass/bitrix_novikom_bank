<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

use Bitrix\Iblock\Iblock;

$chunkSize = $arParams['NEWS_COUNT'];
$iblockUrl = $arParams['IBLOCK_URL'];

$dataClass = Iblock::wakeUp($arParams['IBLOCK_ID'])->getEntityDataClass();

$filter = ['ACTIVE' => 'Y'];
if ($iblockUrl == '/special-offers/') {
    $condition = !empty($_SESSION['section_page']['/special-offers/']) && $_SESSION['section_page']['/special-offers/'] == '/ended/'
        ? '<=END_DATE.VALUE'
        : '>=END_DATE.VALUE';
    $filter[$condition] = date('Y-m-d H:i:s');
}

$data = [
    'order' => ['SORT' => 'ASC'],
    'select' => [
        'ID',
        'IBLOCK_ID',
        'NAME',
        'CODE',
        'PREVIEW_PICTURE',
        'SORT',
        'TAG_PROP' => 'TAG.VALUE',
        'PIN_PROP' => 'PIN.VALUE',
        'DATE' => 'PUBLICATION_DATE.VALUE',
        'SECTION_CODE' => 'IBLOCK_SECTION.CODE',
        'SECTION_PARENT' => 'IBLOCK_SECTION.IBLOCK_SECTION_ID',
    ],
    'filter' => $filter
];

$arSections = \Bitrix\Iblock\SectionTable::getList([
    'select' => [
        'ID',
        'IBLOCK_SECTION_ID',
        'CODE',
    ]
])->fetchAll();

if (!empty($arResult['SECTION'])) {
    $section = $arResult['SECTION']['PATH'][array_key_last($arResult['SECTION']['PATH'])];
    $sectionIds = [$section['ID']];

    $sections = array_filter($arSections, fn($item) => $item['IBLOCK_SECTION_ID'] == $section['ID']);

    if (!empty($sections)) {
        $sectionIds = array_merge($sectionIds, array_column($sections, 'ID'));
    }

    $elementsRes = \Bitrix\Main\Application::getConnection()->query("
        SELECT IBLOCK_ELEMENT_ID FROM b_iblock_section_element
        WHERE IBLOCK_SECTION_ID IN (" . implode(',', $sectionIds) . ")
    ");

    $elementIds = [];
    while ($row = $elementsRes->fetch()) {
        $elementIds[] = $row['IBLOCK_ELEMENT_ID'];
    }

    if (!empty($elementIds)) {
        $data['filter'][] = [
            'LOGIC' => 'OR',
            'IBLOCK_SECTION_ID' => $sectionIds,
            'ID' => $elementIds
        ];
    }
}

$items = $dataClass::getList($data)->fetchAll();

if (!empty($items)) {
    $pinnedItems = [];
    $otherItems = [];

    foreach ($items as &$item) {
        if (!empty($item['SECTION_PARENT'])) {
            $parentSection = array_filter($arSections, function ($section) use ($item) {
                return $section['ID'] == $item['SECTION_PARENT'];
            });
            $item['DETAIL_PAGE_URL'] = $iblockUrl . reset($parentSection)['CODE'] . '/' . $item['CODE'] . '/';
        } else {
            $item['DETAIL_PAGE_URL'] = $iblockUrl . $item['SECTION_CODE'] . '/' . $item['CODE'] . '/';
        }

        $item['PROPERTIES'] = [];
        $item['EDIT_LINK'] = CIBlock::GetPanelButtons($item["IBLOCK_ID"], $item["ID"], 0, ["SECTION_BUTTONS" => false, "SESSID" => false])["edit"]["edit_element"]["ACTION_URL"];
        $item['DELETE_LINK'] = CIBlock::GetPanelButtons($item["IBLOCK_ID"], $item["ID"], 0, ["SECTION_BUTTONS" => false, "SESSID" => false])["edit"]["delete_element"]["ACTION_URL"];

        if (!empty($item['PREVIEW_PICTURE'])) {
            $renderImage = CFile::ResizeImageGet(
                $item['PREVIEW_PICTURE'],
                [
                    "width" => 523,
                    "height" => 240
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            );

            if ($renderImage["src"]) {
                $item["PICTURE"] = $renderImage["src"];
            }
        }
        if (!empty($item['TAG_PROP'])) {
            $item['PROPERTIES']['TAG']['VALUE'] = $item['TAG_PROP'];
        }
        if (!empty($item['DATE'])) {
            $item['PROPERTIES']['PUBLICATION_DATE']['VALUE'] = date('d.m.Y', strtotime($item['DATE']));
        }
        if (!empty($item['PIN_PROP'])) {
            $item['PROPERTIES']['PIN']['VALUE'] = 'Y';
            $pinnedItems[] = $item;
        } else {
            $otherItems[] = $item;
        }
    }

    $sortBySort = fn($a, $b) => $a['SORT'] <=> $b['SORT'];
    usort($pinnedItems, $sortBySort);
    usort($otherItems, $sortBySort);

    $otherItems = array_chunk($otherItems, $chunkSize - count($pinnedItems));
    $page = (int)($_GET['PAGEN_1'] ?? 1) - 1;
    $otherItems = $otherItems[$page] ?? [];

    $arResult['ITEMS'] = [...$pinnedItems, ...$otherItems];
} else {
    $arResult['ITEMS'] = [];
}

