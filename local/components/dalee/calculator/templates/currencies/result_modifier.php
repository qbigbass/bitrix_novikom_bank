<?php
/** @var array $arResult */

$filter = [
    'IBLOCK_ID' => iblock('currency-exchange_rates'),
    'ACTIVE' => 'Y',
];

$elements = \Bitrix\Iblock\ElementTable::getList([
    'filter' => $filter,
    'select' => ['ID', 'NAME'],
    'order' => ['SORT' => 'ASC'],
])->fetchAll();

$elementsWithProps = array_combine(
    array_column($elements, 'ID'),
    array_map(fn($item) => $item + ['PROPERTIES' => []], $elements)
);

CIBlockElement::GetPropertyValuesArray($elementsWithProps, $filter['IBLOCK_ID'], $filter);

$arResult['ELEMENTS'] = $elementsWithProps;
