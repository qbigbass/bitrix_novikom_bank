<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle("Спецпредложения");
?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news",
    "special_offers",
    [
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_FIELD_CODE" => [
            "NAME",
            "PREVIEW_TEXT",
            "DETAIL_PICTURE",
            "PREVIEW_PICTURE",
        ],
        "DETAIL_PAGER_SHOW_ALL" => "Y",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PROPERTY_CODE" => [
            "PUBLICATION_DATE",
            "TAG"
        ],
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FILE_404" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => iblock("special_offers_ru"),
        "IBLOCK_TYPE" => "for_private_clients_ru",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => [
            "NAME",
            "PREVIEW_TEXT",
            "PREVIEW_PICTURE",
        ],
        "LIST_PROPERTY_CODE" => [
            "PUBLICATION_DATE",
            "END_DATE",
            "TAG"
        ],
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "NEWS_COUNT" => "12",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "square",
        "PAGER_TITLE" => "Новости",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SEF_FOLDER" => "/special-offers/",
        "SEF_MODE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "Y",
        "USE_CATEGORIES" => "N",
        "USE_FILTER" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_RATING" => "N",
        "USE_RSS" => "N",
        "USE_SEARCH" => "N",
        "USE_SHARE" => "N",
        "COMPONENT_TEMPLATE" => "special_offers",
        "SEF_URL_TEMPLATES" => [
            "news" => "",
            "section" => "#SECTION_CODE#/",
            "detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        ]
    ],
    false
); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
