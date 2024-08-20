<?php


use Bitrix\Iblock\Model\Section;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}

/** @var array $arParams */
/** @var array $arResult */

// получение польз.свойства раздела
$arrSectionIds = [];
foreach ($arResult['ITEMS'] as $item) {
    $arrSectionIds[] = $item['IBLOCK_SECTION_ID'];
}
$arrSectionIds = array_unique($arrSectionIds);
$sectionQuery = Section::compileEntityByIblock($arParams['IBLOCK_ID'])::query()
    ->setSelect(['ID', 'NAME', 'UF_TYPE_CARDS'])
    ->exec()->fetchAll();

foreach ($arResult['ITEMS'] as $key => &$item) {
    $findKey = array_search($item['IBLOCK_SECTION_ID'], array_column($sectionQuery,'ID'));
    if ($findKey !== false) {
        $item['IBLOCK_SECTION_PROP_TYPE_CARDS'] = $sectionQuery[$findKey]['UF_TYPE_CARDS'];
        $item['IBLOCK_SECTION_NAME'] = $sectionQuery[$findKey]['NAME'];
    }
}
