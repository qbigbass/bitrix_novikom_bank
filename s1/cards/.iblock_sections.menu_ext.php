<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Iblock\ElementTable;

global $APPLICATION;

$aMenuLinks[] = [
    'Все карты',
    '/cards/',
    Array(),
    Array('alternative_name' => 'Все карты НОВИКОМ')
];

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    array(
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "IBLOCK_TYPE" => "for_private_clients_ru",
        "IBLOCK_ID" => iblock('cards_list_ru'),
        "DEPTH_LEVEL" => "1",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000"
    ),
    false
);

$elements = ElementTable::GetList([
    "select" => ["ID", "NAME", "CODE"],
    "filter" => [
        "IBLOCK_ID" => iblock("bonus_programs_ru"),
        "ACTIVE" => "Y"
    ],
])->fetchAll();

foreach ($elements as $element) {
    $aMenuLinksExt[] = [
        $element["NAME"],
        "/bonus-programs/" . $element["CODE"] . "/",
        [],
        ["show_only_in_header" => "Y"]
    ];
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);

?>
