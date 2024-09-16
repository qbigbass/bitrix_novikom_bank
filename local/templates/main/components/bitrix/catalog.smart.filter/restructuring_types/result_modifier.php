<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$arProperty = \Bitrix\Iblock\PropertyTable::getList(array(
    'filter' => array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => 'TYPE'),
    'limit' => 1
))->fetch();

$arResult['PROP_ID'] = $arProperty['ID'];
