<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Context;

global $APPLICATION;
$request = Context::getCurrent()->getRequest();
$section = $request->getQuery('path');

$aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "",
    "SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
    "DETAIL_PAGE_URL" => "",
    "IBLOCK_TYPE" => "support",
    "IBLOCK_ID" => iblock('qa'),
    "DEPTH_LEVEL" => "2",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000"
),
    false
);

foreach ($aMenuLinksExt as $key => $value) {
    if (empty($value[3]) || $value[3]['DEPTH_LEVEL'] < 2 || empty($section)) unset($aMenuLinksExt[$key]);
}

if (!empty($section)) {
    foreach ($aMenuLinksExt as $key => $value) {
        $parent = explode('/', $value[1])[0];
        if ($parent != $section) {
            unset($aMenuLinksExt[$key]);
        }
    }
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
