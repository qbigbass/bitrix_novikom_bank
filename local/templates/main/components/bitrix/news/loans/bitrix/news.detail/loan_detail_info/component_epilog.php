<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arResult */

global $APPLICATION;

$APPLICATION->SetPageProperty('DETAIL_SHORT_CONDITIONS', $arResult['DETAIL_SHORT_CONDITIONS']);
$APPLICATION->SetPageProperty('NAME', $arResult['NAME']);
$APPLICATION->SetPageProperty('DETAIL_TEXT', $arResult['DETAIL_TEXT']);
$APPLICATION->SetPageProperty('IS_BUTTON_SHOW', $arResult['IS_BUTTON_SHOW']);
$APPLICATION->SetPageProperty('ICON_SRC', $arResult['ICON_SRC']);
