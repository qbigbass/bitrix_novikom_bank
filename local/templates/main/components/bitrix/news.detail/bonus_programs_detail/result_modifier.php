<?php
use Dalee\Services\ProgramBonusesService;

require_once __DIR__ . '/functions.php';

if($arResult['DISPLAY_PROPERTIES']['SHOW_BONUSES_CALC']['VALUE'] === 'Y') {
    $bonusesService = ProgramBonusesService::fetch();
    $arResult['CARD_CATEGORIES'] = $bonusesService->getCardCategories();
    $arResult['CARD_TYPES'] = $bonusesService->getCardTypes();
    $arResult['BONUS_RATES'] = $bonusesService->getRates();
}

