<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}

use Bitrix\Iblock\Model\Section;

/** @var array $arParams */
/** @var array $arResult */

$elementEntity = \Bitrix\Iblock\Iblock::wakeUp(iblock('inner_card_info'))->getEntityDataClass();
$arrSectionIds = [];

// получение польз.свойства раздела
foreach ($arResult['ITEMS'] as $item) {
    $arrSectionIds[] = $item['IBLOCK_SECTION_ID'];
}
$arrSectionIds = array_unique($arrSectionIds);
$sectionQuery = Section::compileEntityByIblock($arParams['IBLOCK_ID'])::query()
    ->setSelect(['ID', 'NAME', 'UF_TYPE_CARDS'])
    ->setCacheTtl(7200)
    ->exec()->fetchAll();

foreach ($arResult['ITEMS'] as $key => &$item) {
    $convertFromSprintEditorBlock = json_decode($item['PROPERTIES']['DETAIL_CARD']['~VALUE'], true)['blocks'][0];

    if (isset($convertFromSprintEditorBlock['info_elements'])) {
        $item['anchoredElements'] = $convertFromSprintEditorBlock['info_elements'];
    }

    $findKey = array_search($item['IBLOCK_SECTION_ID'], array_column($sectionQuery,'ID'));
    if ($findKey !== false) {
        $item['IBLOCK_SECTION_PROP_TYPE_CARDS'] = $sectionQuery[$findKey]['UF_TYPE_CARDS'];
    }
}
