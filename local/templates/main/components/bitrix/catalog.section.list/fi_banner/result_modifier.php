<?php
/** @var array $arResult */

if (!empty($arResult["SECTION"]) && $arResult["SECTION"]["PICTURE"] > 0 ) {
    $filePath = CFile::GetPath($arResult["SECTION"]["PICTURE"]);

    if ($filePath !== '') {
        $arResult["SECTION"]["PICTURE_PATH"] = $filePath;
    }
}

/* Получим контент для баннера */
$arBannerContent = [];
$rsElements = CIBlockElement::GetList(
    [],
    [
        "ACTIVE" => "Y",
        "IBLOCK_ID" => iblock("fi_banner_content"),
        "PROPERTY_LINK_SECTION" => $arResult["SECTION"]["ID"]
    ],
    false,
    false,
    ["ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PROPERTY_ELEM_POS_LIST", "PROPERTY_ICON"]
);

$propElemPosList = CIBlockPropertyEnum::GetList(
    [],
    [
        "IBLOCK_ID" => iblock("fi_banner_content"),
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

        if ($arElement["PROPERTY_ICON_VALUE"] > 0) {
            $filePath = CFile::GetPath($arElement["PROPERTY_ICON_VALUE"]);
        }

        if ($filePath !== '') {
            $arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"][$arElement["ID"]]["ICON"] = $filePath;
        }
    } else {
        $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$arElement["ID"]]["NAME"] = $arElement["NAME"];
    }
}
