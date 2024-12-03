<?php
/** @var array $arResult */

use Bitrix\Iblock\Model\Section;
use Bitrix\Iblock\Elements\ElementFiQuotesApiTable;
use Bitrix\Iblock\Elements\ElementFiSlidersProductsApiTable;
use Bitrix\Iblock\Elements\ElementFiAccordionApiTable;
use Bitrix\Iblock\Elements\ElementFiProductsApiTable;

$sectionId = 0;
$arResult["SHOW_UP_MENU"] = false;
$arResult["SHOW_BLOCK_CONTACT"] = false;

if ($arResult["SECTION"]["PATH"][0]["ID"] > 0) {
    $sectionId = $arResult["SECTION"]["PATH"][0]["ID"];
}

if ($sectionId > 0) {
    $entity = Section::compileEntityByIblock($arResult["ID"]);
    $dbSect = $entity::getList(array(
        "select" => ["UF_FI_SHOW_SECT", "UF_FI_SHOW_CONTACT"],
        "filter" => ["ID" => $sectionId]
    ));

    if ($arSect = $dbSect->fetch()) {
        if ($arSect["UF_FI_SHOW_SECT"]) {
            $arResult["SHOW_UP_MENU"] = true; // Показываем меню из элементов на странице раздела
        }

        if ($arSect["UF_FI_SHOW_CONTACT"]) {
            $arResult["SHOW_BLOCK_CONTACT"] = true; // Показываем блок "Контакты" на странице раздела
        }
    }
}

if ($arResult["SHOW_UP_MENU"]) {
    foreach ($arResult["ITEMS"] as $item) {
        $title = $item["NAME"];

        if (!empty($item["PROPERTIES"]["NAME_MENU"]) && $item["PROPERTIES"]["NAME_MENU"]["VALUE"] !== "") {
            $title = $item["PROPERTIES"]["NAME_MENU"]["VALUE"];
        }

        $arResult["UP_MENU"][] = [
            "CODE" => $item["CODE"],
            "TITLE" => $title,
            "SORT" => $item["SORT"]
        ];
    }
}

if (!empty($arResult["UP_MENU"])) {
    usort($arResult["UP_MENU"], "sortBySort");
}

/* Цитаты для каждого элемента получим из ИБ "Цитаты для элементов" */
/* Слайдер для каждого элемента получим из ИБ "Слайдер для элементов" */
/* Карточки для аккордиона для каждого элемента получим из ИБ "Слайдер с продуктами для каталога услуг" */
/* Карточки с продуктами для каждого элемента получим из ИБ "Продукты для каталога услуг" */

$arQuoteIds = [];
$arSliderIds = [];
$arAccordionIds = [];
$arProductIds = [];

foreach ($arResult["ITEMS"] as $item) {
    if (!empty($item["PROPERTIES"]["QUOTES"]["VALUE"])) {
        foreach ($item["PROPERTIES"]["QUOTES"]["VALUE"] as $value) {
            $arQuoteIds[$value] = $value;
        }
    }

    if (!empty($item["PROPERTIES"]["SLIDER"]["VALUE"])) {
        foreach ($item["PROPERTIES"]["SLIDER"]["VALUE"] as $value) {
            $arSliderIds[$value] = $value;
        }
    }

    if (!empty($item["PROPERTIES"]["TEXT_ACCORDION"]["VALUE"])) {
        foreach ($item["PROPERTIES"]["TEXT_ACCORDION"]["VALUE"] as $value) {
            $arAccordionIds[$value] = $value;
        }
    }

    if (!empty($item["PROPERTIES"]["CARD_PRODUCTS"]["VALUE"])) {
        foreach ($item["PROPERTIES"]["CARD_PRODUCTS"]["VALUE"] as $value) {
            $arProductIds[$value] = $value;
        }
    }
}

$arQuotes = [];
$arSliders = [];
$arAccordions = [];
$arProducts = [];

if (!empty($arQuoteIds)) {
    $elementsQuotes = ElementFiQuotesApiTable::getList([
        "select" => ["ID", "PREVIEW_TEXT", "DETAIL_TEXT", "PREVIEW_PICTURE"],
        "filter" => ["ID" => $arQuoteIds],
    ])->fetchAll();

    if (!empty($elementsQuotes)) {
        foreach ($elementsQuotes as $arData) {
            $filePath = '';

            if ($arData["PREVIEW_PICTURE"] > 0) {
                $filePath = CFile::GetPath($arData["PREVIEW_PICTURE"]);
            }

            $arQuotes[$arData["ID"]]["TITLE"] = $arData["PREVIEW_TEXT"];
            $arQuotes[$arData["ID"]]["TEXT"] = $arData["DETAIL_TEXT"];
            $arQuotes[$arData["ID"]]["PICTURE"] = $filePath;
        }
    }
}

if (!empty($arSliderIds)) {
    $elementsSliders = ElementFiSlidersProductsApiTable::getList([
        "select" => ["ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE"],
        "filter" => ["ID" => $arSliderIds],
    ])->fetchAll();

    if (!empty($elementsSliders)) {
        foreach ($elementsSliders as $arData) {
            $iconPath = '';

            if ($arData["PREVIEW_PICTURE"] > 0) {
                $iconPath = CFile::GetPath($arData["PREVIEW_PICTURE"]);
            }

            $arSliders[$arData["ID"]]["NAME"] = $arData["NAME"];
            $arSliders[$arData["ID"]]["TEXT"] = $arData["PREVIEW_TEXT"];
            $arSliders[$arData["ID"]]["PICTURE"] = $iconPath;
        }
    }
}

if (!empty($arAccordionIds)) {
    $elementsAccordions = ElementFiAccordionApiTable::getList([
        "select" => ["ID", "NAME", "PREVIEW_TEXT"],
        "filter" => ["ID" => $arAccordionIds],
    ])->fetchAll();

    if (!empty($elementsAccordions)) {
        foreach ($elementsAccordions as $arData) {
            $arAccordions[$arData["ID"]]["TITLE"] = $arData["NAME"];
            $arAccordions[$arData["ID"]]["TEXT"] = $arData["PREVIEW_TEXT"];
        }
    }
}

if (!empty($arProductIds)) {
    $elementsProducts = ElementFiProductsApiTable::getList([
        "select" => ["ID", "NAME", "PREVIEW_TEXT", "ICON"],
        "filter" => ["ID" => $arProductIds],
    ])->fetchAll();

    if (!empty($elementsProducts)) {
        foreach ($elementsProducts as $arData) {
            $iconPath = '';

            if ($arData["IBLOCK_ELEMENTS_ELEMENT_FI_PRODUCTS_API_ICON_VALUE"] > 0) {
                $iconPath = CFile::GetPath($arData["IBLOCK_ELEMENTS_ELEMENT_FI_PRODUCTS_API_ICON_VALUE"]);
            }

            $arProducts[$arData["ID"]]["NAME"] = $arData["NAME"];
            $arProducts[$arData["ID"]]["TEXT"] = $arData["PREVIEW_TEXT"];
            $arProducts[$arData["ID"]]["PICTURE"] = $iconPath;
        }
    }
}

/* Заполним недостающие данные по цитатам и слайдерам для элементов */
foreach ($arResult["ITEMS"] as $index => $item) {
    $arResult["ITEMS"][$index]["SECTION_CLASS_STYLE"] = ''; // класс для тега <section>
    $itemId = $item["ID"];

    if (!empty($item["PROPERTIES"]["QUOTES"]["VALUE"]) && !empty($arQuotes)) {
        foreach ($item["PROPERTIES"]["QUOTES"]["VALUE"] as $kValue => $vValue) {
            $arResult["ITEMS"][$index]["QUOTES"]["POS_" . $kValue] = $arQuotes[$vValue];
        }
    }

    if (!empty($item["PROPERTIES"]["SLIDER"]["VALUE"]) && !empty($arSliders)) {
        foreach ($item["PROPERTIES"]["SLIDER"]["VALUE"] as $kValue => $vValue) {
            $arResult["ITEMS"][$index]["SLIDERS"][$kValue]["TITLE"] = $arSliders[$vValue]["NAME"];
            $arResult["ITEMS"][$index]["SLIDERS"][$kValue]["TEXT"] = $arSliders[$vValue]["TEXT"];
            $arResult["ITEMS"][$index]["SLIDERS"][$kValue]["PICTURE"] = $arSliders[$vValue]["PICTURE"];
        }
    }

    if (!empty($item["PROPERTIES"]["TEXT_ACCORDION"]["VALUE"]) && !empty($arAccordions)) {
        foreach ($item["PROPERTIES"]["TEXT_ACCORDION"]["VALUE"] as $kValue => $vValue) {
            $arResult["ITEMS"][$index]["TEXT_ACCORDION"][$kValue]["TITLE"] = $arAccordions[$vValue]["TITLE"];
            $arResult["ITEMS"][$index]["TEXT_ACCORDION"][$kValue]["TEXT"] = $arAccordions[$vValue]["TEXT"];
        }
    }

    if (!empty($item["PROPERTIES"]["BENEFITS"]["VALUE"])) {
        foreach ($item["PROPERTIES"]["BENEFITS"]["VALUE"] as $kValue => $vValue) {
            $iconPath = '';

            if ($vValue > 0) {
                $iconPath = CFile::GetPath($vValue);
            }

            $arResult["ITEMS"][$index]["BENEFITS"][$kValue]["TITLE"] = $item["PROPERTIES"]["BENEFITS"]["DESCRIPTION"][$kValue] ?? '';
            $arResult["ITEMS"][$index]["BENEFITS"][$kValue]["PICTURE"] = $iconPath;
        }
    }

    if (!empty($item["PROPERTIES"]["CARD_PRODUCTS"]["VALUE"]) && !empty($arProducts)) {
        foreach ($item["PROPERTIES"]["CARD_PRODUCTS"]["VALUE"] as $kValue => $vValue) {
            $arResult["ITEMS"][$index]["CARD_PRODUCTS"][$kValue]["TITLE"] = $arProducts[$vValue]["NAME"];
            $arResult["ITEMS"][$index]["CARD_PRODUCTS"][$kValue]["TEXT"] = $arProducts[$vValue]["TEXT"];
            $arResult["ITEMS"][$index]["CARD_PRODUCTS"][$kValue]["PICTURE"] = $arProducts[$vValue]["PICTURE"];
        }
    }

    if ($item["PROPERTIES"]["COLOR_BG"]["VALUE"] !== "") {
        $arResult["ITEMS"][$index]["SECTION_CLASS_STYLE"] = $item["PROPERTIES"]["COLOR_BG"]["VALUE"];
    }
}
