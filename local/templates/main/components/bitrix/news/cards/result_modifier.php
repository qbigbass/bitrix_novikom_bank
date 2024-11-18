<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */

$iblock = \Bitrix\Iblock\IblockTable::getList([
    'select' => ['NAME', 'DESCRIPTION'],
    'filter' => ['ID' => $arParams['IBLOCK_ID']],
    'limit' => 1
])->fetch();

$arResult['IBLOCK_NAME'] = str_replace('(витрина)', '', $iblock['NAME']);
$arResult['IBLOCK_DESCRIPTION'] = $iblock['DESCRIPTION'];
