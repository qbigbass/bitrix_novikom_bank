<?php
require_once __DIR__ . '/functions.php';
global $APPLICATION;

$entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($arResult['IBLOCK_ID']);

$rsSection = $entity::getList([
    'filter' => [
        'ID' => $arResult['IBLOCK_SECTION_ID'],
    ],
    'select' => ['UF_CARD_ICON', 'UF_OUTPUT_NAME', 'UF_BANNER_STYLE'],
])->fetch();

$rsSection['UF_CARD_ICON'] = CFile::GetPath($rsSection['UF_CARD_ICON']);
$arResult['SECTION_NAME'] = $rsSection['UF_OUTPUT_NAME'];
$arResult['SECTION_ICON'] = $rsSection['UF_CARD_ICON'];
$arResult['BANNER_STYLE'] = getBannerStyle($rsSection['UF_BANNER_STYLE']);

$cp = $this->__component;
if (is_object($cp)) {
    $cp->SetResultCacheKeys(['SECTION_NAME']);
}
