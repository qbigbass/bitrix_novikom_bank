<?php
global $APPLICATION;

$iblockId = iblock('contacts_ru');
$arSelectUf = ["UF_COLOR_BLOCK"];
$sectionData = getSectionData($iblockId, $arSelectUf);
$elementIds = getElementIdsIncludedArea($sectionData, $iblockId);

if (!empty($elementIds)) {
    global $contactFilter;
    $contactFilter = [
        "ID" => $elementIds
    ];

    $blockSectionClass = $sectionData["COLOR_BLOCK"] ?: "bg-blue-10";
    $defaultColorCard = $APPLICATION->GetProperty("defaultColorCard") ?: "contact-block--bg-blue";
    $defaultColorTag = $APPLICATION->GetProperty("defaultColorTag") ?: "tag--outline-white";
    $defaultColorH4 = $APPLICATION->GetProperty("defaultColorH4") ?: "dark-0";
    $defaultColorSpan = $APPLICATION->GetProperty("defaultColorSpan") ?: "dark-0";
    $defaultColorIcon = $APPLICATION->GetProperty("defaultColorIcon") ?: "dark-0";

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "corporate_contacts",
        [
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
            "FILTER_NAME" => "contactFilter",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => iblock('contacts_ru'),
            "IBLOCK_TYPE" => "additional",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "20",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => ["EMAIL", "PHONE", "ADDRESS"],
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N",
            "COLOR_SECTION" => $blockSectionClass,
            "COLOR_CARD" => $defaultColorCard,
            "COLOR_TAG" => $defaultColorTag,
            "COLOR_H4" => $defaultColorH4,
            "COLOR_SPAN" => $defaultColorSpan,
            "COLOR_ICON" => $defaultColorIcon,
        ],
        false
    );
}
