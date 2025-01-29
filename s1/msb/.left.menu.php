<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$filter = [
    'IBLOCK_SECTION.CODE' => false
];

$elements = getIBlockElements(iblock('small_medium_business'), $filter);

$aMenuLinksExt = array_map(function ($element) {
    return [
        $element['NAME'],
        $element['CODE'] . '/',
        [$element['CODE'] . '/'],
        [
            'FROM_IBLOCK' => true,
            'IS_PARENT' => '',
            'DEPTH_LEVEL' => 1,
        ]
    ];
}, $elements);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
