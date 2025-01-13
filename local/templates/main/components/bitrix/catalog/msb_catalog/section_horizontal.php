<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var array $arParams
 * @var array $arResult
 * @var array $arCurSection
 */

use Bitrix\Iblock\Iblock as BitrixIblock;
use \Bitrix\Iblock\SectionTable;
?>
<?
/**
 * Проверим наличие связей между ИБ "Корпоративным клиентам / Корпоративным клиентам" и "МСБ / Каталог услуг"
 * по символьному коду раздела в URL. При наличии связей выводим контент из ИБ "Корпоративным клиентам / Корпоративным клиентам" на странице МСБ.
 */
$sectionCode =  $arResult["VARIABLES"]["SECTION_CODE"] ?? '';
$idRelationSection = 0;
$iblockCC = iblock('corporate_clients');

if (!empty($sectionCode)) {
    $section = SectionTable::getList([
        "filter" => [
            "IBLOCK_ID" =>  $arParams["IBLOCK_ID"],
            "CODE" => $sectionCode
        ],
        "select" => ["ID"]
    ])->fetch();

    if (!empty($section["ID"]) && !empty($iblockCC)) {
        $classCC = BitrixIblock::wakeUp($iblockCC)->getEntityDataClass();
        $elementsCC = $classCC::getList([
            "select" => ["ID", "NAME"],
            "filter" => [
                "ACTIVE" => "Y",
                "REF_IBLOCK_MSB.VALUE" => $section["ID"]
            ],
            "limit" => 1
        ])->fetchObject();

        if (!empty($elementsCC)) {
            $idRelationSection = $elementsCC->getId();
        }
    }
}
?>
<? if ($idRelationSection > 0) : ?>
    <?
    $APPLICATION->AddChainItem("МСБ", "/msb/");
    $arResultCC = [
        "FOLDER" => "/for-corporate-clients/",
        "URL_TEMPLATES" => [
            "news" => "",
            "detail" => "#ELEMENT_CODE#/",
            "section" => "",
            "search" => ""
        ],
        "VARIABLES" => [
            "ELEMENT_CODE" => "depozity",
            "ELEMENT_ID" => "",
            "SECTION_ID" => "",
            "SECTION_CODE" => "",
        ],
        "ALIASES" => []
    ];
    ?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "for_corporate_clients_detail",
        [
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "IBLOCK_TYPE" => "for_corporate_clients_ru",
            "IBLOCK_ID" => $iblockCC,
            "FIELD_CODE" => [
                "NAME",
                "PREVIEW_TEXT",
                "DETAIL_PICTURE"
            ],
            "PROPERTY_CODE" => [
                "BENEFITS_TOP",
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
            "DETAIL_URL" => $arResultCC["FOLDER"].$arResultCC["URL_TEMPLATES"]["detail"],
            "SECTION_URL" => $arResultCC["FOLDER"].$arResultCC["URL_TEMPLATES"]["section"],
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
            "GROUP_PERMISSIONS" => [],
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Страница",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_SHOW_ALL" => "Y",
            "CHECK_DATES" => "Y",
            "ELEMENT_ID" => $arResultCC["VARIABLES"]["ELEMENT_ID"],
            "ELEMENT_CODE" => $arResultCC["VARIABLES"]["ELEMENT_CODE"],
            "SECTION_ID" => $arResultCC["VARIABLES"]["SECTION_ID"],
            "SECTION_CODE" => $arResultCC["VARIABLES"]["SECTION_CODE"],
            "IBLOCK_URL" => $arResultCC["FOLDER"].$arResultCC["URL_TEMPLATES"]["news"],
            "USE_SHARE" => "N",
            "SHARE_HIDE" => "",
            "SHARE_TEMPLATE" => "",
            "SHARE_HANDLERS" => "",
            "SHARE_SHORTEN_URL_LOGIN" => "",
            "SHARE_SHORTEN_URL_KEY" => "",
            "ADD_ELEMENT_CHAIN" => "Y",
            'STRICT_SECTION_CHECK' => "Y",
        ],
        $component
    );?>
    <?$APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block_corporate.php', ['HEADER_TEXT' => 'Другие услуги для корпоративных клиентов']);?>
<? else : ?>
    <?
    /* Баннер */
    $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "msb_banner",
        [
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
            "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
            "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
            "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
            "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
            "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
            "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
            "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
            "CUSTOM_SECTION_SORT" => ["SORT" => "ASC"],
            "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "Y",
            "SECTION_FIELDS" => ["PICTURE", "DESCRIPTION", "UF_COLOR_BG"],
            "MAIN_CHAIN_TITLE" => $arParams["MAIN_CHAIN_TITLE"],
        ],
        $component,
        ["HIDE_ICONS" => "Y"]
    );

    /* Список элементов */
    $GLOBALS["arrFilterElement"] = [
        "ACTIVE" => "Y",
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"]
    ];
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "msb_elements_list",
        [
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "NEWS_COUNT" => $arParams["NEWS_COUNT"],
            "SORT_BY1" => $arParams["SORT_BY1"],
            "SORT_ORDER1" => $arParams["SORT_ORDER1"],
            "SORT_BY2" => $arParams["SORT_BY2"],
            "SORT_ORDER2" => $arParams["SORT_ORDER2"],
            "FIELD_CODE" => ["SORT", "CODE"],
            "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
            "SET_TITLE" => $arParams["SET_TITLE"],
            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
            "MESSAGE_404" => $arParams["MESSAGE_404"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "SHOW_404" => $arParams["SHOW_404"],
            "FILE_404" => $arParams["FILE_404"],
            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
            "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_FILTER" => "A",
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
            "PAGER_TITLE" => $arParams["PAGER_TITLE"],
            "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
            "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
            "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
            "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
            "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
            "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
            "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
            "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
            "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
            "FILTER_NAME" => "arrFilterElement",
            "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
            "PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
            "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
            "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
            "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
            "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
            "IBLOCK_SECTIONS" => $arResult["IBLOCK_SECTIONS"],
        ],
        $component,
        ["HIDE_ICONS" => "Y"]
    );
    ?>
<? endif; ?>

