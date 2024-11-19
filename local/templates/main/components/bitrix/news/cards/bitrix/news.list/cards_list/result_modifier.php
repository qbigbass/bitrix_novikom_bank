<?php
/** @var array $arResult */

require_once __DIR__ . '/functions.php';

$sectionEntity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($arResult['ID']);

$sectionsId = [];
foreach ($arResult['ITEMS'] as $item) {
    if (!in_array($item['IBLOCK_SECTION_ID'], $sectionsId)) {
        $sectionsId[] = $item['IBLOCK_SECTION_ID'];
    }
}

$arSections = [];
foreach ($sectionsId as $sectionId) {
    $arSection = $sectionEntity::getList([
        'filter' => ['ID' => $sectionId],
        'select' => ['NAME', 'UF_TAG'],
        'limit' => 1
    ])->fetch();

    $arSections[$sectionId] = $arSection;
}

$arResult['SECTIONS'] = $arSections;
