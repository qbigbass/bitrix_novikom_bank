<?php
/** @var $arResult array */

$arMenu = [];

if (!empty($arResult)) {
    $parentKey = 0;
    foreach ($arResult as $key => $item) {
        if ($item['DEPTH_LEVEL'] === 1) {
            $arMenu[$key] = $item;

            if ($item['IS_PARENT']) {
                $arMenu[$key]['CHILD'] = [];
                $parentKey = $key;
            }
        } elseif ($item['DEPTH_LEVEL'] === 2) {
            $arMenu[$parentKey]['CHILD'][$key] = $item;
        }
    }
}

global $mobileSubMenu;
$mobileSubMenu = $arMenu;

