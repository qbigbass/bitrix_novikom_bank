<?php
/** @var array $arResult */

require_once __DIR__ . '/functions.php';

foreach ($arResult['ITEMS'] as &$item) {
    $arSection = \Bitrix\Iblock\SectionTable::getById($item['IBLOCK_SECTION_ID'])->fetch();
    $item['SECTION_NAME'] = $arSection['NAME'];
}
unset($item);
