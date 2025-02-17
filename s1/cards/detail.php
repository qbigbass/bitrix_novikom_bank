<?php

use Bitrix\Iblock\Component\Tools;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Банковские карты');

$path = basename($APPLICATION->GetCurPage());
$iblockId = iblock('cards_detail_pages_ru');

$filter = [
    'IBLOCK_ID' => $iblockId,
    'ACTIVE' => 'Y',
];

$section = SectionTable::getList([
    'filter' => [
        'IBLOCK_ID' => $iblockId,
        'CODE' => $path,
    ],
    'select' => ['ID']
])->fetch();

$filter[] = !empty($section) ? ['IBLOCK_SECTION.CODE' => $path] : ['CODE' => $path];

$element = ElementTable::getList([
    'filter' => $filter,
    'select' => ['ID','IBLOCK_ID'],
    'order' => ['SORT' => 'ASC'],
    'limit' => 1
])->fetch();

if (empty($element)) {
    Tools::process404('Элемент не найден', true, true, true);
    die();
}

include_once 'detail_component.php';
?>

<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
