<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Dalee\Helpers\IblockHelper;
global $APPLICATION;
$aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "",
    "SECTION_PAGE_URL" => "#SECTION_CODE#/",
    "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#",
    "IBLOCK_TYPE" => "for_private_clients_ru",
    "IBLOCK_ID" => iblock('for_private_clients_ru_sms_services'),
    "DEPTH_LEVEL" => "1",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000"
),
    false
);

$aMenuLinksElementsExt = IblockHelper::getIblockMenuWithoutSections('for_private_clients_ru_sms_services', '/services/');

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt, $aMenuLinksElementsExt);
?>
