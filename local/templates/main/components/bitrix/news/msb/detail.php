<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\Iblock as BitrixIblock;
?>
<?
/**
 * Проверим наличие связей между ИБ "Корпоративным клиентам / Корпоративным клиентам" и "МСБ / Малому и среднему бизнесу"
 * по символьному коду элемента в URL. При наличии связей выводим контент из ИБ "Корпоративным клиентам / Корпоративным клиентам" в разделе МСБ.
 */

$elementCode =  $arResult["VARIABLES"]["ELEMENT_CODE"] ?? '';
$idRelationSection = 0;
$iblockCC = iblock('corporate_clients');

if (!empty($elementCode)) {
    $element = ElementTable::getList([
        "filter" => [
            "IBLOCK_ID" =>  $arParams["IBLOCK_ID"],
            "CODE" => $elementCode
        ],
        "select" => ["ID"]
    ])->fetch();

    if (!empty($element["ID"]) && !empty($iblockCC)) {
        $classCC = BitrixIblock::wakeUp($iblockCC)->getEntityDataClass();
        $elementsCC = $classCC::getList([
            "select" => ["ID", "NAME"],
            "filter" => [
                "ACTIVE" => "Y",
                "REF_IBLOCK_MSB.VALUE" => $element["ID"]
            ],
            "limit" => 1
        ])->fetchObject();

        if (!empty($elementsCC)) {
            $idRelationSection = $elementsCC->getId();
        }
    }
}

if ($idRelationSection > 0) {
    $arResultCC = [
        "FOLDER" => "/for-corporate-clients/",
        "URL_TEMPLATES" => [
            "news" => "",
            "detail" => "#ELEMENT_CODE#/",
            "section" => "",
            "search" => ""
        ],
        "VARIABLES" => [
            "ELEMENT_CODE" => $elementCode,
            "ELEMENT_ID" => "",
            "SECTION_ID" => "",
            "SECTION_CODE" => "",
        ],
        "ALIASES" => []
    ];
    $APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "client_detail",
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
            "STRICT_SECTION_CHECK" => "Y",
            "HEADER_COLOR_CLASS" => "border-orange banner-product--heavy-purple", // Для всех детальных страниц КК
            "TITLE_BLOCK_CROSS_SALE" => "Другие услуги для корпоративных клиентов",
            "FILTER_BLOCK_CROSS_SALE" => [
                "SECTION_CODE" => "corporate"
            ]
        ],
        $component
    );
} else {
    $APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "msb_client_detail",
        [
            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
            "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
            "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
            "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
            "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
            "META_KEYWORDS" => $arParams["META_KEYWORDS"],
            "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
            "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
            "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
            "SET_TITLE" => $arParams["SET_TITLE"],
            "MESSAGE_404" => $arParams["MESSAGE_404"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "SHOW_404" => $arParams["SHOW_404"],
            "FILE_404" => $arParams["FILE_404"],
            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
            "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
            "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
            "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
            "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
            "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
            "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
            "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
            "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
            "USE_SHARE" => $arParams["USE_SHARE"],
            "SHARE_HIDE" => $arParams["SHARE_HIDE"],
            "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
            "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
            "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
            "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
            "ADD_ELEMENT_CHAIN" => "Y",
            "STRICT_SECTION_CHECK" => $arParams['STRICT_SECTION_CHECK'],
            "COLOR_TITLE_BENEFITS_TOP" => "yellow-100",
            "BLOCK_CONTACT_COLOR_CARD" => "bg-heavy-violet",
            "BLOCK_CONTACT_COLOR_TAG" => "tag--outline-white",
            "BLOCK_CONTACT_COLOR_H4" => "dark-0",
            "BLOCK_CONTACT_COLOR_SPAN" => "dark-0",
            "BLOCK_CONTACT_COLOR_ICON" => "dark-0",
            "HEADER_COLOR_CLASS" => "bg-heavy-violet border-yellow", // Для всех детальных страниц МСБ
            "TITLE_BLOCK_CROSS_SALE" => $arParams["TITLE_BLOCK_CROSS_SALE"],
            "FILTER_BLOCK_CROSS_SALE" => $arParams["FILTER_BLOCK_CROSS_SALE"],
        ],
        $component
    );
}
?>
