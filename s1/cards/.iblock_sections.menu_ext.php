<?php

use Bitrix\Iblock\ElementTable;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    [
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "IBLOCK_TYPE" => "for_private_clients_ru",
        "IBLOCK_ID" => iblock('cards_detail_pages_ru'),
        "DEPTH_LEVEL" => "1",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000"
    ],
    false
);

$elements = ElementTable::GetList([
    "select" => ["ID", "NAME", "CODE"],
    "filter" => [
        "IBLOCK_ID" => iblock("cards_detail_pages_ru"),
        'IBLOCK_SECTION_ID' => false,
        "ACTIVE" => "Y"
    ],
])->fetchAll();

foreach ($elements as $element) {
    $aMenuLinksExt[] = [
        $element["NAME"],
        "/cards/" . $element["CODE"] . "/",
        [],
        ["show_only_in_header" => "Y"]
    ];
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
