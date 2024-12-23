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

$asset = \Bitrix\Main\Page\Asset::getInstance();
$asset->addJs('https://cdnjs.cloudflare.com/ajax/libs/ajv/8.1.0/ajv7.bundle.js');
//<script src="https://cdnjs.cloudflare.com/ajax/libs/ajv/8.1.0/ajv7.bundle.js" integrity="sha512-PuzkO+wOBh6m/Jux4nXgl2ItRzed77lFDidDX500DUNlvuzr4OrXtsFhN4q0CCxPoXjTFfiw1z4FmED9J/MMdQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
