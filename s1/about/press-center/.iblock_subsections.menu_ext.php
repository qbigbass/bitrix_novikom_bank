<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "",
    "SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
    "DETAIL_PAGE_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#",
    "IBLOCK_TYPE" => "about_ru",
    "IBLOCK_ID" => iblock('press_center_ru'),
    "DEPTH_LEVEL" => "2",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000"
),
    false
);

foreach ($aMenuLinksExt as $key => $value) {
    if ($value[3]['DEPTH_LEVEL'] != 2) {
        unset($aMenuLinksExt[$key]);
    }
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
