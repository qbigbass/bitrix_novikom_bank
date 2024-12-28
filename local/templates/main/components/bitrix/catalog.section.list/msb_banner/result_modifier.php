<?php
/** @var array $arResult */

use Bitrix\Iblock\Model\Section;
use Bitrix\Iblock\Iblock as BitrixIblock;

$iBlockCatalog = $arResult["SECTION"]["IBLOCK_ID"];
$entity = Section::compileEntityByIblock($iBlockCatalog);
$sectionUserFields = $entity::getList([
    "select" => ["UF_CNT_ELEM_F", "UF_SHOW_BANNER", "UF_TITLE_MENU"],
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

if (!empty($sectionUserFields["UF_TITLE_MENU"])) {
    $arResult["SECTION_TITLE_BREADCRUMBS"] = $sectionUserFields["UF_TITLE_MENU"];
} else {
    $arResult["SECTION_TITLE_BREADCRUMBS"] = $arResult["SECTION"]["NAME"];
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
    $iblockBannerContent = iblock("msb_banner_content");
    $classBannerContent = BitrixIblock::wakeUp($iblockBannerContent)->getEntityDataClass();
    $elementsBannerContent = $classBannerContent::getList([
        "select" => ["ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "ELEM_POS_LIST.ITEM", "ICON.FILE"],
        "filter" => [
            "ACTIVE" => "Y",
            "=LINK_SECTION.VALUE" => $arResult["SECTION"]["ID"]
        ],
        "order" => ["SORT" => "ASC"],
    ])->fetchCollection();

    if (!empty($elementsBannerContent)) {
        foreach ($elementsBannerContent as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $previewText = '';
            $detailText = '';
            $icon = '';
            $posXmlId = '';

            if (!empty($element->getPreviewText())) {
                $previewText = $element->getPreviewText();
            }

            if (!empty($element->getDetailText())) {
                $detailText = $element->getDetailText();
            }

            if (!empty($element->getIcon())) {
                $icon = '/upload/' . $element->getIcon()->getFile()->getSubdir() . '/' . $element->getIcon()->getFile()->getFileName();
            }

            if ($element->getElemPosList()->getItem()) {
                $posXmlId = $element->getElemPosList()->getItem()->getXmlId();
            }

            if ($posXmlId === "down") {
                $arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"][$id]["NAME"] = $name;
                $arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"][$id]["DESC"] = $previewText;

                if (!empty($icon)) {
                    $arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"][$id]["ICON"] = $icon;
                }
            } else {
                if (!empty($detailText)) {
                    $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$id]["DESC"] = $previewText;
                    $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$id]["DETAIL"] = $detailText;
                } else {
                    $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$id]["NAME"] = $name;
                    $arResult["SECTION"]["BANNER_CONTENT"]["HEADER"][$id]["DESC"] = $previewText;
                }
            }
        }
    }
}
