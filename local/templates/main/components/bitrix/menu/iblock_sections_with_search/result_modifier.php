<?php
/** @var $arResult array */
/** @var $arParams array */

use Bitrix\Iblock\Iblock;

$sectionCodes = [];
foreach ($arResult as $key => $item) {
    if (!empty($item['PARAMS']['FROM_IBLOCK'])) {
        $sectionCodes[$key] = basename($item['LINK']);
    }
}

$iblockId = iblock('special_offers_ru');
$dataClass = Iblock::wakeUp($iblockId)->getEntityDataClass();
$condition = !empty($_SESSION['section_page']['/special-offers/']) && $_SESSION['section_page']['/special-offers/'] == '/ended/'
    ? '<=END_DATE.VALUE'
    : '>=END_DATE.VALUE';

$data = [
    'order' => ['SORT' => 'ASC'],
    'filter' => [
        $condition => date('Y-m-d H:i:s'),
        'IBLOCK_SECTION.CODE' => $sectionCodes
    ],
    'select' => [
        'SECTION_CODE' => 'IBLOCK_SECTION.CODE',
    ],
];

$res = array_unique(array_column($dataClass::getList($data)->fetchAll(), 'SECTION_CODE'));

foreach ($sectionCodes as $key => $sectionCode) {
    if (!in_array($sectionCode, $res)) {
        unset($arResult[$key]);
    }
}

