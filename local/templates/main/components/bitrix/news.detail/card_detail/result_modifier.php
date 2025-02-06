<?php
require_once __DIR__ . '/functions.php';
global $APPLICATION;

$section = CIBlockSection::GetList(
    ['SORT' => 'ASC'],
    [
        'ID' => $arResult['IBLOCK_SECTION_ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID']
    ],
    false,
    [
        'ID',
        'NAME',
        'PICTURE',
        'UF_*'
    ]
)->fetch();

$arResult['SECTION_NAME'] = $section['NAME'];
$arResult['SECTION_ICON'] = CFile::GetPath($section['PICTURE']);
$arResult['BANNER_STYLE'] = getBannerStyle($section['UF_BANNER_STYLE']);

$cp = $this->__component;
if (is_object($cp)) {
    $cp->SetResultCacheKeys(['SECTION_NAME']);
}
