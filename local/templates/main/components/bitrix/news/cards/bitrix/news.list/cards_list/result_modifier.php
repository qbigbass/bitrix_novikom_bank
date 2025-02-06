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
        $arSections[$section['ID']] = $section;
    }
}

$arResult['ITEMS'] = $arSections;
