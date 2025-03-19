<?php

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;
use Dalee\Helpers\IblockHelper;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $aMenuLinks */

global $APPLICATION;

Loader::includeModule('iblock');

$aMenuLinksExt = IblockHelper::getMenuSectionsWithActiveElements('cards_detail_pages_ru');

$elements = ElementTable::GetList([
    'select' => ['ID', 'NAME', 'CODE'],
    'filter' => [
        'IBLOCK_ID' => iblock('cards_detail_pages_ru'),
        'IBLOCK_SECTION_ID' => false,
        'ACTIVE' => 'Y'
    ],
    'order' => ['SORT' => 'ASC']
])->fetchAll();

foreach ($elements as $element) {
    $aMenuLinksExt[] = [
        $element['NAME'],
        '/cards/' . $element['CODE'] . '/',
        [],
        ['show_only_in_header' => 'Y']
    ];
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
