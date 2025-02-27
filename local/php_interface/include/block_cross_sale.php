<?php
/** @var array $arParams */
/** @global CMain $APPLICATION */

global $APPLICATION;
$elementIds = getElementIdsIncludedArea(iblock('cross_sale'));

if (!empty($elementIds)) {
    global $crossSaleFilter;
    $crossSaleFilter = [
        "ID" => $elementIds
    ];

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "cross_sale_block",
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
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => ["ID", "NAME", ""],
            "FILTER_NAME" => "crossSaleFilter",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "HEADER_TEXT" => $arParams['HEADER_TEXT'] ?: "Смотрите также",
            "IBLOCK_ID" => iblock('cross_sale'),
            "IBLOCK_TYPE" => "additional",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
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
            "PARENT_SECTION_CODE" => $sectionCode,
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => ["TAG", "CONDITION", "BTN_TEXT", "LINK", "BTN_TYPE", "LINE_COLOR"],
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
            "STRICT_SECTION_CHECK" => "Y"
        ]
    );
}
