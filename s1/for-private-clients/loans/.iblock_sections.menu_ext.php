<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinks[] = [
    'Все кредиты',
    '/for-private-clients/loans/index.php',
    Array(),
    Array('alternative_name' => 'Все кредиты НОВИКОМ')
];

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    array(
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#",
        "IBLOCK_TYPE" => "for_private_clients_ru",
        "IBLOCK_ID" => iblock('loans'),
        "DEPTH_LEVEL" => "1",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000"
    ),
    false
);

$aMenuLinksExt[] = [
    'Реструктуризация',
    '/for-private-clients/loans/restructuring/',
    Array(),
    Array()
];

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);

?>
