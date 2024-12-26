<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;

Loader::includeModule("iblock");
$elements = ElementTable::getList([
    'filter' => [
        'IBLOCK_ID' => iblock('pages_en')
    ],
    'order' => ['SORT' => 'ASC'],
    'select' => ['CODE', 'NAME']
])->fetchAll();

$aMenuLinksExt = [];

foreach ($elements as $element) {
    $aMenuLinksExt[] = [
        $element['NAME'],
        $element['CODE'] . '/',
        [],
        [],
        ""
    ];
}

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>
