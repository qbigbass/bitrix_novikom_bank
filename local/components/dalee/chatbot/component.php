<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

$arResult["ITEMS"] = [];

if (!empty($arParams["FORM_TITLES"]) && !empty($arParams["FORM_CODES"])) {
    foreach ($arParams["FORM_TITLES"] as $key => $title) {
        if (!empty($arParams["FORM_CODES"][$key])) {
            $arResult["ITEMS"][$key] = [
                "TITLE" => $title,
                "CODE" => $arParams["FORM_CODES"][$key],
                "ICON" => $arParams["FORM_ICONS"][$key] ?? '',
            ];
        }
    }
}

if (!empty($arResult["ITEMS"])) {
    $this->includeComponentTemplate();
}
