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

$result = [];
$noDescendants = [];

foreach ($arResult as $col => $items) {
    foreach ($items as $arItem) {
        if (count($arItem['CHAIN']) === 1) {
            $children = array_filter($items, function ($child) use ($arItem) {
                return in_array($arItem['CHAIN'][0], $child['CHAIN']) && $arItem !== $child;
            });

            if (!empty($children)) {
                $result[] = array_merge([$arItem], $children);
            } else {
                $noDescendants[] = $arItem;
            }
        }
    }
}

if (!empty($noDescendants)) {
    array_unshift($result, $noDescendants);
}

$arResult = $result;
