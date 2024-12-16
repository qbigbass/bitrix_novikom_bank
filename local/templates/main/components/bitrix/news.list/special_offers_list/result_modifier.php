<?php
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
    ],
    'filter' => $filter
];

if (!empty($arResult['SECTION'])) {
    $section = $arResult['SECTION']['PATH'][array_key_last($arResult['SECTION']['PATH'])];
    $data['filter']['IBLOCK_SECTION_ID'] = [$section['ID']];

    $arSections = \Bitrix\Iblock\SectionTable::getList([
        'filter' => [
            'IBLOCK_SECTION_ID' => $section['ID']
        ],
        'select' => [
            'ID',
        ]
    ])->fetchAll();

    if (!empty($arSections)) {
        $data['filter']['IBLOCK_SECTION_ID'] = array_merge($data['filter']['IBLOCK_SECTION_ID'], array_column($arSections, 'ID'));
    }
}

$items = $dataClass::getList($data)->fetchAll();

if (!empty($items)) {
    $pinnedItems = [];
    $otherItems = [];

    foreach ($items as &$item) {
        $item['PROPERTIES'] = [];
        $item['EDIT_LINK'] = CIBlock::GetPanelButtons($item["IBLOCK_ID"], $item["ID"], 0, ["SECTION_BUTTONS" => false, "SESSID" => false])["edit"]["edit_element"]["ACTION_URL"];
        $item['DELETE_LINK'] = CIBlock::GetPanelButtons($item["IBLOCK_ID"], $item["ID"], 0, ["SECTION_BUTTONS" => false, "SESSID" => false])["edit"]["delete_element"]["ACTION_URL"];
        $item['DETAIL_PAGE_URL'] = $iblockUrl . $item['SECTION_CODE'] . '/' . $item['CODE'] . '/';

        if (!empty($item['PREVIEW_PICTURE'])) {
            $item['PREVIEW_PICTURE'] = ['SRC' => CFile::GetPath($item['PREVIEW_PICTURE'])];
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
