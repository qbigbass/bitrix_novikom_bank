<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$elements = \Bitrix\Iblock\ElementTable::getList([
    'filter' => [
        'IBLOCK_ID' => iblock('online_services'),
        'ACTIVE' => 'Y',
    ],
    'select' => [
        'NAME',
        'CODE',
    ],
    'order' => [
        'SORT' => 'ASC',
    ]
])->fetchAll();

$elementsLinks = [];
foreach ($elements as $element) {
    $elementsLinks[] = [
        $element['NAME'],
        $element['CODE'] . '/',
        [],
        [],
        ""
    ];
}

$aMenuLinks = array_merge($elementsLinks, $aMenuLinks);
?>
