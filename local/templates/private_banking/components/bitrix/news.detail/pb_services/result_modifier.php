<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */

$res = CIBlockSection::GetList(
    [
        'left_margin' => 'asc',
    ],
    [
        'IBLOCK_ID' => $arParams["IBLOCK_ID"],
        'ACTIVE' => 'Y',
        'ID' => $arResult['IBLOCK_SECTION_ID'],
    ]
);
$sections = [];
$arSection = $res->GetNext();
$arResult['SECTION'] = $arSection;

$res = CIBlockElement::GetList(
    [
        'SORT' => 'ASC',
    ],
    [
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'ACTIVE' => 'Y',
        'IBLOCK_SECTION_ID' => $arResult['IBLOCK_SECTION_ID'],
    ],
    false,
    false,
    [
        'NAME', 'DETAIL_PAGE_URL',
    ]
);
$elements = [];
while ($arElement = $res->GetNext()) {
    $elements[] = $arElement;
}

$arResult['MENU_ELEMENTS'] = $elements;

$arResult['MODEL'] = [
    'about' => [
    ],
    'cards_grid' => [
    ],
];
