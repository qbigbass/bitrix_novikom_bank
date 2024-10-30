<?php
/** @var array $arResult */

use Dalee\Helpers\RatesFetcher;

$ratesFetcher = new RatesFetcher(iblock($arResult['CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ELEMENTS']);


foreach ($arResult['ITEMS'] as $key => $loan) {
    $resultArray = $ratesFetcher->getResultArrayCalculatedFromToValues($loan['ID']);
    $psk = $ratesFetcher->calculatePSK($resultArray);

    if (!empty($psk)) {
        $resultArray['DIAPASON'] = $psk['minPSK'] . ' - ' . $psk['maxPSK'] . '%';
    }
    $arResult['ITEMS'][$key]['PROPERTIES']['TERMS'] = $resultArray;
}
