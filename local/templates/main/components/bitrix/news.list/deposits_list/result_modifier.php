<?php
/** @var array $arResult */

use Lib\Classes\RatesFetcher;

$ratesFetcher = new RatesFetcher(iblock($arResult['CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ELEMENTS']);

foreach ($arResult['ITEMS'] as $key => $loan) {
    $arResult['ITEMS'][$key]['PROPERTIES']['TERMS'] = $ratesFetcher->getResultArrayCalculatedFromToValues($loan['ID']);
}
