<?php

use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Банковские карты');
?>
<?
$iblockId = iblock('cards_detail_pages_ru');
$elementWithoutSection = \Bitrix\Iblock\ElementTable::getList([
    'filter' => [
        'IBLOCK_ID' => $iblockId,
        'ACTIVE' => 'Y',
        'IBLOCK_SECTION_ID' => false,
        'CODE' => basename($APPLICATION->GetCurPage()),
    ],
    'select' => [
        'ID',
        'NAME',
        'CODE',
        'IBLOCK_SECTION_ID',
        'IBLOCK_ID'
    ],
    'order' => [
        'SORT' => 'ASC',
    ]
])->fetch();

//Есть элемент без раздела
//TODO Засунуть бы это все в комплексный компонент
if (!empty($elementWithoutSection)) {
    //определяем бонусная программа это или карта
    $isBonusProgram = false;
    $prop = PropertyTable::getList([
        'filter' => ['CODE' => 'IS_BONUS', 'IBLOCK_ID' => $iblockId],
    ])->fetch();
    if ($prop) {
        $propEnum = PropertyEnumerationTable::getList([
            'filter' => ['PROPERTY_ID' => $prop['ID']],
        ])->fetch();
        if ($propEnum) {
            $elemetBonusPropValue = ElementPropertyTable::getList([
                'filter' => [
                    'IBLOCK_PROPERTY_ID' => $prop['ID'],
                    'IBLOCK_ELEMENT_ID' => $elementWithoutSection['ID'],
                ],
            ])->fetch();
            //Там всего одно значение. Сравнение VALUE не требуется
            if ($elemetBonusPropValue) {
                $isBonusProgram = true;
            }
        }
    }
    if ($isBonusProgram) {
        include_once 'bonus_programs_component.php';
    } else {
        $element = $elementWithoutSection;
        include_once 'detail_component.php';
    }
} else {
    //Карты в разделах
    $APPLICATION->IncludeComponent(
        "bitrix:news",
        "cards",
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
            "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
            "DETAIL_DISPLAY_TOP_PAGER" => "N",
            "DETAIL_FIELD_CODE" => [],
            "DETAIL_PAGER_SHOW_ALL" => "N",
            "DETAIL_PAGER_TEMPLATE" => "",
            "DETAIL_PAGER_TITLE" => "Страница",
            "DETAIL_PROPERTY_CODE" => [
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
                "BONUS_PROGRAMS_HEADING",
                "BONUS_PROGRAMS",
                "STEPS_HEADING",
                "STEPS",
                "ADDITIONAL_INFO",
                "BANNER_LINK_TEXT",
                "LINK_IS_BUTTON",
            ],
            "DETAIL_SET_CANONICAL_URL" => "N",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FILE_404" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => $iblockId,
            "IBLOCK_TYPE" => "for_private_clients_ru",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
            "LIST_FIELD_CODE" => [],
            "LIST_PROPERTY_CODE" => [
                "SHOW_BUTTON",
                "SHORT_CONDITIONS",
                "ICON_PREVIEW",
                "BUTTON_SHOW",
                "BUTTON_TEXT",
                "BUTTON_LINK",
            ],
            "MESSAGE_404" => "",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "NEWS_COUNT" => "20",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PREVIEW_TRUNCATE_LEN" => "",
            "SEF_FOLDER" => "/cards/",
            "SEF_MODE" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "SET_STATUS_404" => "Y",
            "SET_TITLE" => "N",
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
            "COMPONENT_TEMPLATE" => "cards",
            "SEF_URL_TEMPLATES" => [
                "news" => "",
                "section" => "#SECTION_CODE_PATH#/",
            ]
        ],
        false
    );
}
?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_tabs.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_ads_customers.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_special_offers.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts.php'); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
