<?php
/** @var array $arResult */

require_once __DIR__ . '/functions.php';

$sectionEntity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($arResult['ID']);

foreach ($arResult['ITEMS'] as &$item) {
    $arSection = $sectionEntity::getList([
        'filter' => ['ID' => $item['IBLOCK_SECTION_ID']],
        'select' => ['NAME', 'UF_TAG'],
        'limit' => 1
    ])->fetch();
    $item['SECTION_NAME'] = $arSection['NAME'];
    $item['SECTION_TAG'] = (!empty($arSection['UF_TAG'])) ? $arSection['UF_TAG'] : $arSection['NAME'];
}
unset($item);
