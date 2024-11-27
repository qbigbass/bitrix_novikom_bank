<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    [
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "IBLOCK_TYPE" => "for_financial_institutes",
        "IBLOCK_ID" => iblock('fi_catalog'),
        "DEPTH_LEVEL" => "1",
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "36000000"
    ],
    false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
