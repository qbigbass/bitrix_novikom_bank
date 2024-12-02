<?php
/** @var array $arResult */

use Bitrix\Iblock\Model\Section;
use Bitrix\Iblock\Elements\ElementFiQuotesApiTable;
use Bitrix\Iblock\Elements\ElementFiSlidersApiTable;
use Bitrix\Iblock\Elements\ElementFiAccordionApiTable;

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
/* Тексты для аккордиона для каждого элемента получим из ИБ "Контент для аккордиона" */
$arQuoteIds = [];
$arSliderIds = [];
$arAccordionIds = [];
$arQuotesPictures = [];
$arAccordionNames = [];

foreach ($arResult["ITEMS"] as $item) {
    if (!empty($item["DISPLAY_PROPERTIES"]["QUOTES"]["LINK_ELEMENT_VALUE"])) {
        foreach ($item["DISPLAY_PROPERTIES"]["QUOTES"]["LINK_ELEMENT_VALUE"] as $arQuote) {
            $arQuoteIds[$arQuote["ID"]] = $arQuote["ID"];
            $arQuotesPictures[$arQuote["ID"]] = $arQuote["PREVIEW_PICTURE"];
            $arElemQuotes[$item["ID"]] = $item["PROPERTIES"]["QUOTES"]["VALUE"];
        }
    }

    if (!empty($item["DISPLAY_PROPERTIES"]["SLIDER"]["LINK_ELEMENT_VALUE"])) {
        foreach ($item["DISPLAY_PROPERTIES"]["SLIDER"]["LINK_ELEMENT_VALUE"] as $arSlider) {
            $arSliderIds[$arSlider["ID"]] = $arSlider["ID"];
        }
    }

    if (!empty($item["DISPLAY_PROPERTIES"]["TEXT_ACCORDION"]["LINK_ELEMENT_VALUE"])) {
        foreach ($item["DISPLAY_PROPERTIES"]["TEXT_ACCORDION"]["LINK_ELEMENT_VALUE"] as $arAccordion) {
            $arAccordionIds[$arAccordion["ID"]] = $arAccordion["ID"];
            $arAccordionNames[$arAccordion["ID"]] = $arAccordion["NAME"];
        }
    }
}

$arQuotes = [];
$arSliders = [];
$arAccordions = [];

if (!empty($arQuoteIds)) {
    $elementsQuotes = ElementFiQuotesApiTable::getList([
        "select" => ["ID", "PREVIEW_TEXT", "DETAIL_TEXT"],
        "filter" => ["ID" => $arQuoteIds],
    ])->fetchAll();

    if (!empty($elementsQuotes)) {
        foreach ($elementsQuotes as $arData) {
            $filePath = '';

            if ($arQuotesPictures[$arData["ID"]] > 0) {
                $filePath = CFile::GetPath($arQuotesPictures[$arData["ID"]]);
            }

            $arQuotes[$arData["ID"]]["TITLE"] = $arData["PREVIEW_TEXT"];
            $arQuotes[$arData["ID"]]["TEXT"] = $arData["DETAIL_TEXT"];
            $arQuotes[$arData["ID"]]["PICTURE"] = $filePath;
        }
    }
}

if (!empty($arSliderIds)) {
    $elementsSliders = ElementFiSlidersApiTable::getList([
        "select" => ["ID", "PREVIEW_TEXT"],
        "filter" => ["ID" => $arSliderIds],
    ])->fetchAll();

    if (!empty($elementsSliders)) {
        foreach ($elementsSliders as $arData) {
            $arSliders[$arData["ID"]]["TEXT"] = $arData["PREVIEW_TEXT"];
        }
    }
}

if (!empty($arAccordionIds)) {
    $elementsAccordions = ElementFiAccordionApiTable::getList([
        "select" => ["ID", "PREVIEW_TEXT"],
        "filter" => ["ID" => $arAccordionIds],
    ])->fetchAll();

    if (!empty($elementsAccordions)) {
        foreach ($elementsAccordions as $arData) {
            $arAccordions[$arData["ID"]]["TEXT"] = $arData["PREVIEW_TEXT"];
        }
    }
}

/* Заполним недостающие данные по цитатам и слайдерам для элементов */
foreach ($arResult["ITEMS"] as $index => $item) {
    $arResult["ITEMS"][$index]["SECTION_CLASS_STYLE"] = ''; // класс для <section>
    $itemId = $item["ID"];

    if (!empty($arQuotes) && !empty($arElemQuotes[$itemId])) {
        foreach ($arElemQuotes[$itemId] as $key => $elemQuoteId) {
            $arResult["ITEMS"][$index]["QUOTES"]["POS_" . $key] = $arQuotes[$elemQuoteId];
        }
    }

    if (!empty($item["DISPLAY_PROPERTIES"]["SLIDER"]["LINK_ELEMENT_VALUE"])) {
        foreach ($item["DISPLAY_PROPERTIES"]["SLIDER"]["LINK_ELEMENT_VALUE"] as $arSlider) {
            $filePath = '';

            if ($arSlider["PREVIEW_PICTURE"] > 0) {
                $filePath = CFile::GetPath($arSlider["PREVIEW_PICTURE"]);
            }

            $arResult["ITEMS"][$index]["SLIDERS"][$arSlider["ID"]]["TITLE"] = $arSlider["NAME"];
            $arResult["ITEMS"][$index]["SLIDERS"][$arSlider["ID"]]["PICTURE"] = $filePath;

            if (!empty($arSliders[$arSlider["ID"]])) {
                $arResult["ITEMS"][$index]["SLIDERS"][$arSlider["ID"]]["TEXT"] = $arSliders[$arSlider["ID"]]["TEXT"];
            }
        }
    }

    if (!empty($item["DISPLAY_PROPERTIES"]["TEXT_ACCORDION"]["LINK_ELEMENT_VALUE"])) {
        foreach ($item["DISPLAY_PROPERTIES"]["TEXT_ACCORDION"]["LINK_ELEMENT_VALUE"] as $arAccordion) {
            $arResult["ITEMS"][$index]["TEXT_ACCORDION"][$arAccordion["ID"]]["TITLE"] = $arAccordion["NAME"];

            if (!empty($arAccordions[$arAccordion["ID"]])) {
                $arResult["ITEMS"][$index]["TEXT_ACCORDION"][$arAccordion["ID"]]["TEXT"] = $arAccordions[$arAccordion["ID"]]["TEXT"];
            }
        }
    }

    if ($item["PROPERTIES"]["COLOR_BG"]["VALUE"] !== "") {
        $arResult["ITEMS"][$index]["SECTION_CLASS_STYLE"] = $item["PROPERTIES"]["COLOR_BG"]["VALUE"];
    }
}
/* END */
