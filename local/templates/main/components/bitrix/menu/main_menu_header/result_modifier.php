<?php
/** @var $arResult array */

$modifiedResult = [];
foreach ($arResult as $key => $item) {
    if($key >= 3) {
        $modifiedResult['HIDDEN'][] = $item;
    } else {
        $modifiedResult['NOT_HIDDEN'][] = $item;
    }
}

$modifiedResult['HIDDEN'][] = [
    'TEXT' => 'English version',
    'LINK' => ENGLISH_VERSION_LINK,
];

$arResult = $modifiedResult;
