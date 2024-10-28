<?php

use Lib\Classes\ElementPropertiesFetcher;
use Lib\Classes\Helper;

$propertiesToGet = [];
foreach ($arResult['PROPERTIES'] as $property) {
    if ($property['PROPERTY_TYPE'] == 'E') {
        $propertiesToGet[] = $property['CODE'];
    }
}
$propertiesFetcher = new ElementPropertiesFetcher($arResult['IBLOCK_ID']);
$propertiesFetcher->fetchElementProperties($propertiesToGet, [$arResult['ID']]);

$arResult['PROPERTIES']['DETAIL_TERMS']['VALUE_FORMATTED'] = $terms ?? [];
$arResult['ELEMENTS_PROPERTIES'] = $propertiesFetcher->getProperties();
