<?php
/** @var $arResult array */
/** @var $arParams array */

use Bitrix\Iblock\Iblock;

$sectionCodes = [];

foreach ($arResult as $key => $item) {
    if (empty($item['PARAMS']['FROM_IBLOCK'])) {
        $parentSection = basename($item['LINK']);
    }
}

foreach ($arResult as $key => $item) {
    if (!empty($item['PARAMS']['FROM_IBLOCK']) && !empty($parentSection)) {
        $sectionCodes[$key] = basename(explode($parentSection, $item['LINK'])[1]);
    }
}

$sectionCodes = array_filter($sectionCodes);

$iblockId = $arParams['IBLOCK_ID'];
$dataClass = Iblock::wakeUp($iblockId)->getEntityDataClass();

$filter = [
    'IBLOCK_ID' => $iblockId,
    'IBLOCK_SECTION.CODE' => $sectionCodes,
    'ACTIVE' => 'Y',
];

if (!empty($arParams['FILTER_END_DATE'])) {
    $condition = !empty($_SESSION['section_page'][$arParams['MENU_DIR']]) && $_SESSION['section_page'][$arParams['MENU_DIR']] == '/ended/'
        ? '<=END_DATE.VALUE'
        : '>=END_DATE.VALUE';

    $filter[$condition] = date('Y-m-d H:i:s');
}

$data = [
    'order' => ['SORT' => 'ASC'],
    'filter' => $filter,
    'select' => [
        'SECTION_CODE' => 'IBLOCK_SECTION.CODE',
        'ID'
    ],
];

$elements = $dataClass::getList($data)->fetchAll();

if (!empty($elements)) {
    $elementsIds = array_column($elements, 'ID');
    $elementsSections = \Bitrix\Iblock\SectionElementTable::getList([
        'filter' => [
            'IBLOCK_ELEMENT_ID' => $elementsIds
        ],
        'select' => [
            'IBLOCK_SECTION_ID'
        ]
    ])->fetchAll();

    $elements = \Bitrix\Iblock\SectionTable::getList([
        'filter' => [
            'ID' => array_unique(array_column($elementsSections, 'IBLOCK_SECTION_ID'))
        ],
        'select' => [
            'SECTION_CODE' => 'CODE'
        ]
    ])->fetchAll();
}

$res = array_column($elements, 'SECTION_CODE');

if (!empty($sectionCodes)) {
    foreach ($sectionCodes as $key => $sectionCode) {
        if (!in_array($sectionCode, $res)) {
            unset($arResult[$key]);
        }
    }
} else {
    $arResult = array_reduce($arResult, function ($result, $item) {
        if ($item['DEPTH_LEVEL'] == 1) {
            $result[] = $item;
        }
        return $result;
    });
}
