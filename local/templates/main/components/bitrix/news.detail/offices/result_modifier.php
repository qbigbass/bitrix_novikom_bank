<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */

$placemarkCoords = array_map('floatval', explode(',', $arResult["PROPERTIES"]["COORDS"]["VALUE"]));
$arResult['PARAMS'] = [
    'coords' => $placemarkCoords,
    'center' => $placemarkCoords,
    'zoom' => 17,
];
