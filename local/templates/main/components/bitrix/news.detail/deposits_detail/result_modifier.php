<?php
/** @var array $arResult */

use Dalee\Services\CBR;
use Dalee\Services\RatesFetcher;

$ratesFetcher = new RatesFetcher(iblock($arResult['IBLOCK_CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ID']);

$arResult['PROPERTIES']['TERMS'] = $ratesFetcher->getResultArrayCalculatedFromToValues($arResult['ID']);
$arResult['RATES_TABLE_HTML'] = '';

try {
    $cbr = new CBR();
    $keyRate = $cbr->getKeyRate();
    $arResult['RATES_TABLE_HTML'] = $ratesFetcher->generateRatesTableHTML($keyRate);
} catch (SoapFault $e) {
    echo $e->getMessage();
}
