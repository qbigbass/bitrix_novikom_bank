<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle("Защита<br> от мошенничества");

global $fraudProtectionFilter;
$fraudProtectionFilter = [
    "SECTION_CODE" => "fraud-protection",
    "INCLUDE_SUBSECTIONS" => "Y"
];

$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "fraud_protection",
    [
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COL_COUNT" => "",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => ["NAME", "PREVIEW_TEXT"],
        "FILTER_NAME" => "fraudProtectionFilter",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "HEADER_TAG" => "h4",
        "IBLOCK_ID" => iblock('benefits'),
        "IBLOCK_TYPE" => "additional",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "50",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => ["ICON"],
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
    ],
);
?>
<? $APPLICATION->IncludeFile('/local/php_interface/include/send_appeal.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/important_information.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/request_call.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts.php'); ?>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
