<?php
/** @var array $arParams */
/** @var array $arResult */

use Bitrix\Iblock\SectionTable;

$sections = SectionTable::getList([
    'filter' => [
        'IBLOCK_ID' => iblock('steps'),
        'IBLOCK_SECTION_ID' => $arParams['PARENT_SECTION'],
        'ACTIVE' => 'Y'
    ],
    'select' => ['ID', 'NAME', 'CODE'],
    'order' => ['SORT' => 'ASC']
])->fetchAll();

$withTabs = !empty($sections) && count($sections) > 1;

$arResult['WITH_TABS'] = $withTabs;
$arResult['SECTIONS'] = $sections;
