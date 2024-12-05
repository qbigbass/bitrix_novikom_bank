<?php
$itemsBySections = [];
$arSectionIds = [];
foreach ($arResult['ITEMS'] as $item) {
    $sectionId = $item['IBLOCK_SECTION_ID'];
    $arSectionIds[] = $sectionId;
    $itemsBySections[$sectionId][] = $item;
}

$entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($arResult['ID']);
$rsSections = $entity::getList([
    'filter' => [
        'ID' => $arSectionIds,
    ],
    'order' => ['SORT' => 'ASC'],
    'select' => ['NAME', 'ID'],
])->fetchAll();

$sections = [];
foreach ($rsSections as $section) {
    $sections[] = [
        'ID' => $section['ID'],
        'NAME' => $section['NAME']
    ];
}

$arResult['SECTIONS'] = $sections;
$arResult['ITEMS'] = $itemsBySections;
