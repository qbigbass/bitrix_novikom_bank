<?php
/** @var array $arResult */

use Lib\Classes\ElementPropertiesFetcher;
use Lib\Classes\RatesFetcher;

$ratesFetcher = new RatesFetcher(iblock($arResult['IBLOCK_CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ID']);

$arResult['PROPERTIES']['TERMS'] = $ratesFetcher->getResultArrayCalculatedFromToValues($arResult['ID']);

$propertiesToGet = [];
foreach ($arResult['PROPERTIES'] as $property) {
    if ($property['PROPERTY_TYPE'] == 'E') {
        $propertiesToGet[] = $property['CODE'];
    }
}
$propertiesFetcher = new ElementPropertiesFetcher($arResult['IBLOCK_ID']);
$propertiesFetcher->fetchElementProperties($propertiesToGet, [$arResult['ID']]);

$arResult['ELEMENTS_PROPERTIES'] = $propertiesFetcher->getProperties();
