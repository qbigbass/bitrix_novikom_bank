<?php
/** @var array $arResult */

require_once __DIR__ . '/functions.php';

$sectionIds = array_unique(array_column($arResult['ITEMS'], 'IBLOCK_SECTION_ID'));

$arSections = [];
if (!empty($sectionIds)) {
    $res = CIBlockSection::GetList(
        ['SORT' => 'ASC'],
        [
            'ID' => $sectionIds,
            'IBLOCK_ID' => $arResult['ID']
        ],
        false,
        [
            'ID',
            'NAME',
            'PICTURE',
            'IBLOCK_SECTION_ID',
            'SECTION_PAGE_URL',
            'UF_*'
        ]
    );
    while ($section = $res->GetNext()) {
        $section['PARENT_SECTION_NAME'] = CIBlockSection::GetByID($section['IBLOCK_SECTION_ID'])->fetch()['NAME'];

        // Формирование кнопок
        foreach ($arResult['ITEMS'] as $item) {
            if ($item['IBLOCK_SECTION_ID'] == $section['ID']) {
                $section['BUTTON_SHOW'] = $item['DISPLAY_PROPERTIES']['BUTTON_SHOW']['VALUE'];
                $section['BUTTON_TEXT'] = $item['DISPLAY_PROPERTIES']['BUTTON_TEXT']['VALUE'];
            }
        }

        $arSections[$section['ID']] = $section;
    }
}

$arResult['ITEMS'] = $arSections;
