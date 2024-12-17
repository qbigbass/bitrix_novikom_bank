<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arComponentParameters = [
    "GROUPS" => [
        "SETTINGS" => [
            "NAME" => GetMessage("GROUP_SETTINGS"),
            "SORT" => 10,
        ],
    ],
    "PARAMETERS" => [
        "FORM_TITLES" => [
            "PARENT" => "SETTINGS",
            "NAME" => GetMessage("FORM_TITLES"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
        ],
        "FORM_CODES" => [
            "PARENT" => "SETTINGS",
            "NAME" => GetMessage("FORM_CODES"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
        ],
        "FORM_ICONS" => [
            "PARENT" => "SETTINGS",
            "NAME" => GetMessage("FORM_ICONS"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
        ],
        "CACHE_TIME"  => [
            "DEFAULT" => 3600000,
        ],
    ],
];
