<?php

$arResult['SECTIONS'][] = [
    'ID' => 0,
    'NAME' => 'Все меры',
    'CODE' => 'all',
    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    'ITEMS' => $arResult['ITEMS'],
];
$sectionsRes = \Bitrix\Iblock\SectionTable::getList([
    'filter' => ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'DEPTH_LEVEL' => 1],
    'order'  => ['SORT' => 'ASC', 'ID' => 'ASC'],
    'select' => ['NAME', 'CODE', 'ID', 'IBLOCK_ID'],
]);
while($section = $sectionsRes->fetch()){
    $section['ITEMS'] = [];
    $arResult['SECTIONS'][$section['ID']] = $section;
}

foreach($arResult['ITEMS'] as $item){
    $sectionId = $item['IBLOCK_SECTION_ID'];
    $arResult['SECTIONS'][$sectionId]['ITEMS'][] = $item;
}
