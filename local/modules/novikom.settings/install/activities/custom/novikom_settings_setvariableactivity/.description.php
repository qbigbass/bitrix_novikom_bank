<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arActivityDescription = [
    "NAME" => GetMessage("NOVIKOM_SETTINGS_SETVARIABLE_DESCR_NAME"),
    "DESCRIPTION" => GetMessage("NOVIKOM_SETTINGS_SETVARIABLE_DESCR_DESCR"),
    "TYPE" => "activity",
    "CLASS" => "Novicom_Settings_SetVariableActivity",
    "JSCLASS" => "BizProcActivity",
    "CATEGORY" => [
        "ID" => "other",
    ],
];
?>
