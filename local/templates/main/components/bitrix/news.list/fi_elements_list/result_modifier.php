<?php
/** @var array $arResult */

use Bitrix\Iblock\Model\Section;

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
            $arResult["SHOW_UP_MENU"] = true;
        }

        if ($arSect["UF_FI_SHOW_CONTACT"]) {
            $arResult["SHOW_BLOCK_CONTACT"] = true;
        }
    }
}

if ($arResult["SHOW_UP_MENU"]) {
    foreach ($arResult["ITEMS"] as $item) {
        $title = $item["NAME"];

        if (!empty($item["PROPERTIES"]["NAME_MENU"])) {
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
$arQuoteIds = [];
$arQuotes = [];

foreach ($arResult["ITEMS"] as $item) {
    if (!empty($item["PROPERTIES"]["QUOTES"]["VALUE"])) {
        foreach ($item["PROPERTIES"]["QUOTES"]["VALUE"] as $valueId) {
            $arQuoteIds[$valueId] = $valueId;
            $arElemQuotes[$item["ID"]] = $item["PROPERTIES"]["QUOTES"]["VALUE"];
        }
    }
}

if (!empty($arQuoteIds)) {
    $rsElementsQuote = CIBlockElement::GetList(
        [],
        [
            "ACTIVE" => "Y",
            "IBLOCK_ID" => iblock("fi_quotes"),
            "ID" => $arQuoteIds
        ],
        false,
        false,
        ["ID", "IBLOCK_ID", "PREVIEW_TEXT", "DETAIL_TEXT", "PREVIEW_PICTURE"]
    );

    while ($arElement = $rsElementsQuote->GetNext()) {
        $filePath = '';

        if ($arElement["PREVIEW_PICTURE"] > 0) {
            $filePath = CFile::GetPath($arElement["PREVIEW_PICTURE"]);
        }

        if ($filePath !== '') {
            $arQuotes[$arElement["ID"]]["TITLE"] = $arElement["PREVIEW_TEXT"];
            $arQuotes[$arElement["ID"]]["TEXT"] = $arElement["DETAIL_TEXT"];
            $arQuotes[$arElement["ID"]]["PICTURE"] = $filePath;
        }
    }
}

if (!empty($arQuotes)) {
    foreach ($arResult["ITEMS"] as &$item) {
        $itemId = $item["ID"];

        if (!empty($arElemQuotes[$itemId])) {
            foreach ($arElemQuotes[$itemId] as $key => $elemQuoteId) {
                $item["QUOTES"]["POS_".$key] = $arQuotes[$elemQuoteId];
            }
        }
    }
}
/* END */

