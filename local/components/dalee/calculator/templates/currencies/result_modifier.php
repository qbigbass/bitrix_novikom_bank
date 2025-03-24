<?php
/** @var array $arResult */

use Bitrix\Iblock\ElementTable;

$filter = [
    'IBLOCK_ID' => iblock('currency-exchange_rates'),
    'ACTIVE' => 'Y',
    'SECTION.ACTIVE' => 'Y'
];

$elements = ElementTable::getList([
    'select' => ['ID', 'NAME'],
    'filter' => $filter,
    'runtime' => [
        'SECTION' => [
            'data_type' => '\Bitrix\Iblock\SectionTable',
            'reference' => ['this.IBLOCK_SECTION_ID' => 'ref.ID'],
            'join_type' => 'LEFT'
        ]
    ],
    'order' => ['SORT' => 'ASC'],
])->fetchAll();

$elementsWithProps = array_combine(
    array_column($elements, 'ID'),
    array_map(fn($item) => $item + ['PROPERTIES' => []], $elements)
);

CIBlockElement::GetPropertyValuesArray($elementsWithProps, $filter['IBLOCK_ID'], $filter);

$arResult['ELEMENTS'] = $elementsWithProps;
