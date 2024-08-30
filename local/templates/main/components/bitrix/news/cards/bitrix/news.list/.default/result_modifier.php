<?php


use Bitrix\Iblock\Model\Section;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}

/** @var array $arParams */
/** @var array $arResult */

$elementEntity = \Bitrix\Iblock\Iblock::wakeUp(iblock('inner_card_info'))->getEntityDataClass();
$arrItemIds = [];
$arrItems = [];
$arrSectionIds = [];
$result = [];

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
    $findKey = array_search($item['IBLOCK_SECTION_ID'], array_column($sectionQuery,'ID'));
    if ($findKey !== false) {
        $item['IBLOCK_SECTION_PROP_TYPE_CARDS'] = $sectionQuery[$findKey]['UF_TYPE_CARDS'];
    }
    $arrItemIds[$item['ID']] = $item['PROPERTIES']['DETAIL_INFO_CARD']['VALUE'];
}

array_walk_recursive($arrItemIds, function ($item, $key) use (&$result) {
    $result[] = $item;
});

$innerCardInfoElements = $elementEntity::query()
    ->setSelect(['ID','NAME', 'CODE'])
    ->setFilter(['ID' => $result])
    ->setCacheTtl(7200)
    ->exec()->fetchAll();

// ищет и сохраняет информацию по элементам
foreach ($arrItemIds as $parentElementIdKey => $arrChildElementId) {

    if ($arrChildElementId) {
        $arrItems[$parentElementIdKey] = array_map(function ($item) use ($innerCardInfoElements) {
            $findKey = array_search($item, array_column($innerCardInfoElements, 'ID'));

            if ($findKey !== false) {
                return $innerCardInfoElements[$findKey];
            } else {
                return [];
            }

        }, $arrChildElementId);
    }

}

if ($arrItems) {
    foreach ($arResult['ITEMS'] as $key => $items) {
        if ($arrItems[$items['ID']]) {
            $arResult['ITEMS'][$key]['anchoredElements'] = $arrItems[$items['ID']];
        }
    }
}
