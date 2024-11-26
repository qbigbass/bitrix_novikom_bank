<?php
/** @var array $arResult */

$sections = \Bitrix\Iblock\SectionTable::getList([
    'filter' => [
        'IBLOCK_ID' => $arResult['ID']
    ],
    'select' => ['ID', 'NAME'],
    'order' => ['SORT' => 'ASC']
])->fetchAll();

$arResult['SECTIONS'] = array_column($sections, 'NAME', 'ID');
