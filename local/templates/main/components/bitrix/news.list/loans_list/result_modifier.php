<?php
/** @var array $arResult */

use Dalee\Services\RatesFetcher;

$ratesFetcher = new RatesFetcher(iblock($arResult['CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ELEMENTS']);

foreach ($arResult['ITEMS'] as $key => $loan) {
    if (empty($loan['IBLOCK_SECTION_ID'])) {
        unset($arResult['ITEMS'][$key]);
        continue;
    }

    $arResult['ITEMS'][$key]['PROPERTIES']['TERMS'] = $ratesFetcher->getResultArrayCalculatedFromToValues($loan['ID']);
}
