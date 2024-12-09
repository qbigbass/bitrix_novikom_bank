<?php
/** @var array $arResult */

use Bitrix\Iblock\Model\Section;

$iBlockCatalog = $arResult["SECTION"]["IBLOCK_ID"];
$entity = Section::compileEntityByIblock($iBlockCatalog);
$sectionUserFields = $entity::getList([
    "select" => ["UF_CNT_ELEM_F", "UF_SHOW_BANNER"],
    "filter" => [
        "IBLOCK_ID" => $iBlockCatalog,
        "ID" => $arResult["SECTION"]["ID"]
    ]
])->fetch();

$arResult["UF_CNT_ELEM_F"] = 3; // Кол-во колонок у контента для баннеров в подвале (по-умолчанию)

if (!empty($sectionUserFields["UF_CNT_ELEM_F"])) {
    $arResult["UF_CNT_ELEM_F"] = $sectionUserFields["UF_CNT_ELEM_F"];
}

if (!empty($sectionUserFields["UF_SHOW_BANNER"])) {
    $arResult["SHOW_BANNER"] = true;
}

if ($arResult["SHOW_BANNER"]) {
    if (!empty($arResult["SECTION"]["PICTURE"])) {
        $filePath = CFile::GetPath($arResult["SECTION"]["PICTURE"]);

        if (!empty($filePath)) {
            $arResult["SECTION"]["PICTURE_PATH"] = $filePath;
        }
    }

    /* Получим контент для баннера */
    $arBannerContent = [];
    $rsElements = CIBlockElement::GetList(
        [],
        [
            "ACTIVE" => "Y",
            "IBLOCK_ID" => iblock("msb_banner_content"),
            "PROPERTY_LINK_SECTION" => $arResult["SECTION"]["ID"]
        ],
        false,
        false,
        ["ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PROPERTY_ELEM_POS_LIST", "PROPERTY_ICON", "DETAIL_TEXT"]
    );

    $propElemPosList = CIBlockPropertyEnum::GetList(
        [],
        [
            "IBLOCK_ID" => iblock("msb_banner_content"),
            "CODE" => "ELEM_POS_LIST"
        ]
    );
    $propElemPosListDownId = 0;

    while ($enumFields = $propElemPosList->GetNext()) {
        if ($enumFields["XML_ID"] === "down") {
            $propElemPosListDownId = $enumFields["ID"];
        }
    }

    while ($arElement = $rsElements->GetNext()) {
        if ($arElement["PROPERTY_ELEM_POS_LIST_ENUM_ID"] === $propElemPosListDownId) {
            $arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"][$arElement["ID"]]["NAME"] = $arElement["NAME"];
            $arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"][$arElement["ID"]]["DESC"] = $arElement["PREVIEW_TEXT"];
            $filePath = '';

            if (!empty($arElement["PROPERTY_ICON_VALUE"])) {
                $filePath = CFile::GetPath($arElement["PROPERTY_ICON_VALUE"]);
            }

            if (!empty($filePath)) {
                $arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"][$arElement["ID"]]["ICON"] = $filePath;
            }
        } else {
            if (!empty($arElement["DETAIL_TEXT"])) {
                $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$arElement["ID"]]["DESC"] = $arElement["PREVIEW_TEXT"];
                $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$arElement["ID"]]["DETAIL"] = $arElement["DETAIL_TEXT"];
            } else {
                $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$arElement["ID"]]["NAME"] = $arElement["NAME"];
                $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$arElement["ID"]]["DESC"] = $arElement["PREVIEW_TEXT"];
            }
        }
    }
}
