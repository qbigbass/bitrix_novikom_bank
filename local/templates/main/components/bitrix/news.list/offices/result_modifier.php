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

$arResult['PARAMS'] = [
    'sectionCode' => $arParams['PARENT_SECTION_CODE'],
];

$res = CIBlockSection::GetList(
    [],
    [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'ACTIVE' => 'Y',
    ]
);
$mapMenu = [];
while ($arSection = $res->GetNext()) {
    $mapMenu[] = [
        'NAME' => $arSection['NAME'],
        'URL' => $arSection['SECTION_PAGE_URL'],
        'ACTIVE' => $arSection['CODE'] === $arParams['PARENT_SECTION_CODE'],
    ];
}
$arResult['MAP_MENU'] = $mapMenu;
