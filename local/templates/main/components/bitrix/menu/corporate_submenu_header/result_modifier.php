<?php
/** @var $arResult array */
require 'functions.php';
global $currentSection;

$hiddenKey = 7;
$modifiedResult = modifyCorporateSubmenuResult($arResult);

if ($currentSection === 'financial-institutions') {
    $hiddenKey = 4;
}

$modifiedResult['FIRST_LEVEL_MENU'] = modifyFirstLevelMainSubmenu($modifiedResult['FIRST_LEVEL_MENU'], $hiddenKey);
$arResult = $modifiedResult;

if (!empty($arResult["FIRST_LEVEL_MENU"]["NOT_HIDDEN"])) {
    foreach ($arResult["FIRST_LEVEL_MENU"]["NOT_HIDDEN"] as &$item) {
        $item["TEXT"] = preg_replace("/&lt;br&gt;|&lt;br\s+\/&gt;/i", "", $item["TEXT"]);
    }
}
