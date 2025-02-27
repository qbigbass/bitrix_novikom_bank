<?php

use Bitrix\Iblock\SectionTable;


$subsectionsRes = SectionTable::getList([
    'filter' => ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'IBLOCK_SECTION_ID' => $arResult['ID']],
    'select' => ['ID', 'IBLOCK_ID', 'NAME', 'CODE'],
    'order' => ['SORT' => 'ASC', 'ID' => 'ASC'],
]);
$arResult['SECTIONS'] = [];
while ($section = $subsectionsRes->fetch()) {
    $section['ITEMS'] = [];
    $arResult['SECTIONS'][$section['ID']] = $section;
}

foreach ($arResult['ITEMS'] as $arItem) {
    $itemSectionId = $arItem['~IBLOCK_SECTION_ID'];
    if ($arResult['SECTIONS'][$itemSectionId]) {
        if ($arItem['CODE']) {
            $arItem['URL'] = '/private-banking/services/' .
                $arResult['SECTIONS'][$itemSectionId]['CODE'] . '/' . $arItem['CODE'] . '/';
        }
        $arResult['SECTIONS'][$itemSectionId]['ITEMS'][] = $arItem;
    }
}

