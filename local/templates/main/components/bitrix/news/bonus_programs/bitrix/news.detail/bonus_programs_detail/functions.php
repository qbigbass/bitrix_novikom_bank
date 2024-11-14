<?php
use Bitrix\Highloadblock\HighloadBlockTable;

function getStylizedValue(string $value): string
{
    return '<span class="text-number-l fw-bold text-nowrap">' . wrapCurrencySymbolRub($value) . '</span>';
}

function wrapCurrencySymbolRub(string $value): string
{
    return str_replace('₽', '</span><span class="text-number-l currency fw-bold">₽', $value);
}

function getBannerStyle(int $bannerStyleId): string
{
    CModule::IncludeModule('highloadblock');
    $hldata = HighloadBlockTable::getList([
        'filter' => ['TABLE_NAME' => 'card_banner_styles'],
        'limit' => 1
    ])->fetch();

    $entity = HighloadBlockTable::compileEntity($hldata);
    $entityClass = $entity->getDataClass();
    $result = $entityClass::getList([
        'select' => ['UF_CSS_CLASSES'],
        'filter' => ['ID' => $bannerStyleId],
        'limit' => 1
    ])->fetch();

    return (!empty($result)) ? $result['UF_CSS_CLASSES'] : '';
}