<?php
/** @var array $arResult */

use Dalee\Services\RatesFetcher;

$ratesFetcher = new RatesFetcher(iblock($arResult['IBLOCK_CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ID']);

$arResult['PROPERTIES']['TERMS'] = $ratesFetcher->getResultArrayCalculatedFromToValues($arResult['ID']);
$arResult['RATES_TABLE_HTML'] = '';

$keyRate = COption::GetOptionString( "novikom.settings", "UF_KEY_RATE") ?? null;

if (!empty($keyRate) && is_numeric($keyRate)) {
    $data = $ratesFetcher->generateRatesTableHTML($keyRate);
} else {
    $data = 'Не указана ключевая ставка';
}
$arResult['RATES_TABLE_HTML'] = $data;
