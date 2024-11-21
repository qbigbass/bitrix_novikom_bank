<?php
/** @var array $arResult */

$sectionIds = array_column($arResult['ITEMS'], 'IBLOCK_SECTION_ID');

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

foreach ($arResult['ITEMS'] as &$item) {
    foreach ($sections as $section) {
        if ($section['ID'] == $item['IBLOCK_SECTION_ID']) {
            $item['SECTION'] = $section;
            break;
        }
    }
}
