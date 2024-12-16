<?php

use Bitrix\Iblock\SectionTable;

if (!empty($arResult['ITEMS'])) {
    $arSectionIds = [];
    $arItems = [];

    foreach ($arResult['ITEMS'] as $item) {
        $arSectionIds[$item['IBLOCK_SECTION_ID']] = $item['IBLOCK_SECTION_ID'];
        $arItems[$item['IBLOCK_SECTION_ID']]['ITEMS'][$item['ID']]['NAME'] =  $item['NAME'];
        $arItems[$item['IBLOCK_SECTION_ID']]['ITEMS'][$item['ID']]['PREVIEW_TEXT'] =  $item['PREVIEW_TEXT'];

        if (file_exists($_SERVER["DOCUMENT_ROOT"] . $item['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'])) {
            $arItems[$item['IBLOCK_SECTION_ID']]['ITEMS'][$item['ID']]['ICON'] = $item['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'];
        }
    }

    if (!empty($arSectionIds)) {
        $arResult['SECTIONS_FRAUD_PROTECTION'] = SectionTable::GetList([
            'select' => ['ID', 'NAME', 'CODE', 'SORT'],
            'filter' => ['IBLOCK_ID' => $arResult['ID'], 'ID' => $arSectionIds],
            'order' => ['SORT' => 'ASC']
        ])->fetchAll();

        if (!empty($arResult['SECTIONS_FRAUD_PROTECTION'])) {
            foreach ($arResult['SECTIONS_FRAUD_PROTECTION'] as &$section) {
                $section['ITEMS'] = $arItems[$section['ID']]['ITEMS'];
            }
        }
    }
}
