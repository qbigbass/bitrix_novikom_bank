<?php
/** @var array $arResult */

foreach ($arResult['ITEMS'] as $key => $loan) {
    if (empty($loan['IBLOCK_SECTION_ID'])) {
        unset($arResult['ITEMS'][$key]);
        continue;
    }
}
