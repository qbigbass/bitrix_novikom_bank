<?php

use Lib\Classes\ElementPropertiesFetcher;
use Lib\Classes\Helper;

$detailTermsProperty = $arResult['PROPERTIES']['DETAIL_TERMS'];
if ($detailTermsProperty['VALUE']) {
    $terms = array_map(function($fields) use ($detailTermsProperty) {
        return array_combine(
            $detailTermsProperty['USER_TYPE_SETTINGS']['DESCR'],
            $fields
        );
    }, $detailTermsProperty['VALUE']);
}

$propertiesToGet = [];
foreach ($arResult['PROPERTIES'] as $property) {
    if ($property['PROPERTY_TYPE'] == 'E') {
        $propertiesToGet[] = $property['CODE'];
    }
}
$propertiesFetcher = new ElementPropertiesFetcher(iblock('loans'));
$propertiesFetcher->fetchElementProperties($propertiesToGet, [$arResult['ID']]);
//pre($propertiesFetcher->getProperties());


$arResult['PROPERTIES']['DETAIL_TERMS']['VALUE_FORMATTED'] = $terms ?? [];
$arResult['ELEMENTS_PROPERTIES'] = $propertiesFetcher->getProperties();
