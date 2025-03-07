<?php
$entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($arResult['ID']);

$sectionIds = array_unique(array_column($arResult['ITEMS'], 'IBLOCK_SECTION_ID'));

$sections = [];
$rsSections = $entity::getList([
    "filter" => ["ID" => $sectionIds],
    "select" => ["ID", "UF_TAG"],
]);

while ($section = $rsSections->fetch()) {
    $sections[$section['ID']] = $section['UF_TAG'];
}

$currentDate = time();

$arResult['ITEMS'] = array_map(function ($item) use ($sections, $currentDate) {
    $item["SECTION_TAG"] = $sections[$item['IBLOCK_SECTION_ID']] ?? null;

    $startDate = MakeTimeStamp($item['PROPERTIES']['PUBLICATION_DATE']['VALUE']) ?: 0;
    $endDate = MakeTimeStamp($item['PROPERTIES']['END_DATE']['VALUE']) ?: PHP_INT_MAX;

    if ($currentDate < $startDate || $currentDate > $endDate) {
        return null; // Исключаем элементы, которые не подходят по дате
    }

    return $item;
}, $arResult['ITEMS']);

// Фильтруем null-элементы
$arResult['ITEMS'] = array_filter($arResult['ITEMS']);
