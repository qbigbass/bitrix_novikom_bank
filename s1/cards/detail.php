<?php

use Bitrix\Iblock\Component\Tools;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Банковские карты');

$path = basename($APPLICATION->GetCurPage());
$iblockId = iblock('cards_detail_pages_ru');

$filter = [
    'IBLOCK_ID' => $iblockId,
    'ACTIVE' => 'Y',
];

$section = SectionTable::getList([
    'filter' => [
        'IBLOCK_ID' => $iblockId,
        'CODE' => $path,
    ],
    'select' => ['ID']
])->fetch();

$filter[] = !empty($section) ? ['IBLOCK_SECTION.CODE' => $path] : ['CODE' => $path];

$element = ElementTable::getList([
    'filter' => $filter,
    'select' => ['ID'],
    'order' => ['SORT' => 'ASC'],
    'limit' => 1
])->fetch();

if (empty($element)) {
    Tools::process404('Элемент не найден', true, true, true);
    die();
}

$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "card_detail",
    [
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_CODE" => '',
        "ELEMENT_ID" => $element['ID'],
        "FIELD_CODE" => [
            "NAME",
            "PREVIEW_TEXT",
            "DETAIL_PICTURE",
        ],
        "IBLOCK_ID" => iblock('cards_detail_pages_ru'),
        "IBLOCK_TYPE" => "for_private_clients_ru",
        "IBLOCK_URL" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Страница",
        "PROPERTY_CODE" => [
            "SHORT_CONDITIONS",
            "DISCOUNTS_HEADING",
            "DISCOUNTS",
            "BENEFITS_HEADING",
            "BENEFITS",
            "BANNER_TAG",
            "BANNER_HEADING",
            "BANNER_IMG",
            "BANNER_LINK",
            "BANNER_TEXT",
            "SPECIAL_OFFERS_HEADING",
            "SPECIAL_OFFERS",
            "OPTIONS_BLOCK_HEADING",
            "CARD_RECEIPT_OPTIONS",
            "CONVENIENCES_HEADING",
            "CONVENIENCES",
            "TABS_HEADING",
            "TABS",
            "BONUS_PROGRAMS_HEADING",
            "BONUS_PROGRAMS",
            "STEPS_HEADING",
            "STEPS",
            "ADDITIONAL_INFO",
            "BANNER_LINK_TEXT",
            "LINK_IS_BUTTON",
        ],
        "SET_BROWSER_TITLE" => "N",
        "SET_CANONICAL_URL" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "STRICT_SECTION_CHECK" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_SHARE" => "N"
    ],
);
?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news_detail.php');?>

<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
