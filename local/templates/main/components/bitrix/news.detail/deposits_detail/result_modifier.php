<?php
/** @var array $arResult */

use Dalee\Services\RatesFetcher;
use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$asset->addJs('/frontend/dist/js/calculator-deposit.js');

$ratesFetcher = new RatesFetcher(iblock($arResult['IBLOCK_CODE'] . '_rates'));
$ratesFetcher->fetchRates($arResult['ID']);

$arResult['PROPERTIES']['TERMS'] = $ratesFetcher->getResultArrayCalculatedFromToValues($arResult['ID']);
