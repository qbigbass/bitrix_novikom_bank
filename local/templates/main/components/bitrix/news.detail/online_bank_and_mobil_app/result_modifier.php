<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_IMG']['SRC'] = '';

if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_IMG']['VALUE'])) {
    $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_IMG']['SRC'] = CFile::ResizeImageGet(
        $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_IMG']['VALUE'],
        [
            'width' => 200,
            'height' => 200,
        ]
    )['src'];
}
