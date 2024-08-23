<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arParams */
/** @var array $arResult */

// получение данных для вывода детальной информации
$arrElementsForCardInfo = $arResult["PROPERTY_{$arResult['PROPERTIES']['DETAIL_INFO_CARD']['ID']}"];
$elementEntity = \Bitrix\Iblock\Iblock::wakeUp(iblock('inner_card_info'))->getEntityDataClass();

$elementDetailCardQuery = $elementEntity::query()
    ->setSelect(['ID', 'NAME', 'CODE', 'ADVANTAGES_VALUE' => 'GENERATE_PAGE.VALUE'])
    ->setFilter(['IBLOCK_ID' => iblock('inner_card_info'), 'ID' => $arrElementsForCardInfo])
    ->setCacheTtl(3600)
    ->exec()->fetch();

$arResult['elementDetailCardQuery'] = $elementDetailCardQuery;

$this->__component->setResultCacheKeys(['elementDetailCardQuery']);
