<?php
/** @var $arResult array */

$colNumber = 1;
$modifiedResult = [];
$countInCol = round(count($arResult) / 2);

foreach ($arResult as $key => $item) {
    if($countInCol < $key + 1) $colNumber = 2;
    $modifiedResult[$colNumber][] = $item;
}

$arResult = $modifiedResult;
