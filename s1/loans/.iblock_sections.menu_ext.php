<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Dalee\Helpers\IblockHelper;

/** @var array $aMenuLinks */

global $APPLICATION;

Loader::includeModule('iblock');

$aMenuLinksExt = IblockHelper::getMenuSectionsWithActiveElements('loans');
$aMenuLinksElementsExt = IblockHelper::getIblockMenuWithoutSections('loans', '/loans/');

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt, $aMenuLinksElementsExt);
