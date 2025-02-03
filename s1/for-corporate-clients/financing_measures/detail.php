<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Корпоративным клиентам');
?>
<?
$curPage = $APPLICATION->GetCurPage();
$arCurPage = array_filter(explode("/", $curPage));
$elementCode = $arCurPage[array_key_last($arCurPage)];

if (!empty($elementCode)) {
    $APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "client_detail",
        [
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "IBLOCK_TYPE" => "for_corporate_clients_ru",
            "IBLOCK_ID" => iblock("financing_measures"),
            "FIELD_CODE" => [
                "NAME",
                "PREVIEW_TEXT",
                "DETAIL_PICTURE",
            ],
            "PROPERTY_CODE" => [
                "BENEFITS_TOP",
                "BENEFITS_TOP_HEADER",
                "BENEFITS_PAGE",
                "BENEFITS_HEADER",
                "HEADER_TEMPLATE",
                "HEADER_COLOR_CLASS",
                "HEADER_LINE_COLOR_CLASS",
                "BUTTON_DETAIL",
                "BUTTON_TEXT_DETAIL",
                "BUTTON_HREF_DETAIL",
                "BANNER_HEADER",
                "BANNER_TEXT",
                "BANNER_IMG",
                "TABS_HEADER",
                "TABS",
            ],
            "DETAIL_URL" => "/for-corporate-clients/#ELEMENT_CODE#/",
            "SECTION_URL" => "/for-corporate-clients/",
            "META_KEYWORDS" => "-",
            "META_DESCRIPTION" => "-",
            "BROWSER_TITLE" => "-",
            "SET_CANONICAL_URL" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_TITLE" => "Y",
            "MESSAGE_404" => "",
            "SET_STATUS_404" => "Y",
            "SHOW_404" => "Y",
            "FILE_404" => "",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_GROUPS" => "Y",
            "USE_PERMISSIONS" => "N",
            "GROUP_PERMISSIONS" => "",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Страница",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_SHOW_ALL" => "Y",
            "CHECK_DATES" => "Y",
            "ELEMENT_ID" => "",
            "ELEMENT_CODE" => $elementCode,
            "SECTION_ID" => "",
            "SECTION_CODE" => "",
            "IBLOCK_URL" => "/for-corporate-clients/mery-gospodderzhki/",
            "USE_SHARE" => "N",
            "SHARE_HIDE" => "",
            "ADD_ELEMENT_CHAIN" => "Y",
            'STRICT_SECTION_CHECK' => "Y",
        ],
        false
    );
} ?>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
