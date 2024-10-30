<?php
/** @var array $arResult */

use Dalee\Services\RatesFetcher;

$ratesFetcher = new RatesFetcher(iblock($arResult['IBLOCK_CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ID']);

$arResult['PROPERTIES']['TERMS'] = $ratesFetcher->getResultArrayCalculatedFromToValues($arResult['ID']);
