<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$elements = getIBlockElements(iblock('corporate_clients'));

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
