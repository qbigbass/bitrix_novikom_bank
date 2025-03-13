<?php
/** @var array $arParams */
/** @var array $arResult */

use Dalee\Helpers\IblockHelper;

$iblockId = $this->getComponent()->getParent()?->arParams['IBLOCK_ID'] ?? null;

$sections = array_map(function ($section) {
    return rtrim(basename($section['LINK']), '/');
}, $arResult);

$emptySections = IblockHelper::getEmptySections($iblockId);

if (!empty($emptySections)) {
    foreach ($arResult as $key => $section) {
        if (in_array(rtrim(basename($section['LINK']), '/'), $emptySections)) {
            unset($arResult[$key]);
        }
    }
}

