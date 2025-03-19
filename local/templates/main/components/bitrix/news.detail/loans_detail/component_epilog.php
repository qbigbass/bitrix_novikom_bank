<?php

use Bitrix\Main\Page\Asset;
use Dalee\Helpers\ComponentHelper;

ComponentHelper::handle($this);

$asset = Asset::getInstance();
$asset->addJs('/frontend/dist/js/calculator-loan.js');
