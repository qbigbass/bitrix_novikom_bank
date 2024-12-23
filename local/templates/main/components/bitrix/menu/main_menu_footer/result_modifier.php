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

    $item["TEXT"] = preg_replace("/&lt;br&gt;|&lt;br\s+\/&gt;/i", "", $item["TEXT"]);
    $modifiedResult[$colNumber][] = $item;
    $prevDepthLevel = $item['DEPTH_LEVEL'];
}

$arResult = $modifiedResult;
