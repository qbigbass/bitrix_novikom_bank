<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Dalee\Helpers\ComponentHelper;

global $APPLICATION;
if (isset($arResult["SECTION"]["NAME"])) {
    $APPLICATION->SetTitle($arResult["SECTION"]["NAME"]);
}

ComponentHelper::handle($this);
