<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Dalee\Helpers\ComponentHelper;

global $APPLICATION;

if (isset($arResult['SECTION_NAME'])) {
    $APPLICATION->SetTitle($arResult['SECTION_NAME']);
    $APPLICATION->AddChainItem($arResult['SECTION_NAME']);
}

ComponentHelper::handle($this);
