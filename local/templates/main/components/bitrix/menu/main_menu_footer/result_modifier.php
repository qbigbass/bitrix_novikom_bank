<?php
/** @var $arResult array */

$colNumber = 1;
$modifiedResult = [];
$prevDepthLevel = 1;
foreach ($arResult as &$item) {
    if ($item['DEPTH_LEVEL'] == 1 && $prevDepthLevel == 2) $colNumber++;

    $item['HEAD_LINK'] = match($item['DEPTH_LEVEL']) {
        1 => true,
        2 => false
    };

    $modifiedResult[$colNumber][] = $item;
    $prevDepthLevel = $item['DEPTH_LEVEL'];
}

$arResult = $modifiedResult;
