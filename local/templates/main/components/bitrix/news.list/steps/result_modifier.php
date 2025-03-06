<?php
/** @var array $arParams */
/** @var array $arResult */

foreach ($arResult['ITEMS'] as $key => $section) {
    if (empty($section['PROPERTIES']['STEPS']['VALUE'])) {
        unset($arResult['ITEMS'][$key]);
    }
}

$arResult['ITEMS'] = array_values($arResult['ITEMS']);
$arResult['WITH_TABS'] = count($arResult['ITEMS']) > 1;
