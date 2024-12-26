<?php
/** @var $arResult array */
require 'functions.php';

$modifiedResult = modifyMainSubmenuResult($arResult);
$modifiedResult['FIRST_LEVEL_MENU'] = modifyFirstLevelMainSubmenu($modifiedResult['FIRST_LEVEL_MENU']);
$arResult = $modifiedResult;

