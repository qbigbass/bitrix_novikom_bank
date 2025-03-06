<?php
/** @var array $arResult */

use Dalee\Services\RatesFetcher;
use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$asset->addJs('/frontend/dist/js/calculator-loan.js');
