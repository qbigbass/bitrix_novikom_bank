<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinks = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "",
    "SECTION_PAGE_URL" => "#SECTION_CODE#/",
    "DETAIL_PAGE_URL" => "#ELEMENT_CODE#/",
    "IBLOCK_TYPE" => "for_corporate_clients_ru",
    "IBLOCK_ID" => iblock('corporate_clients'),
    "DEPTH_LEVEL" => "1",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000"
),
    false
);
?>
