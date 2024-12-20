<?php
//Navigation chain template
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arChainBody = [];
foreach ($arCHAIN as $item) {
    if (mb_strlen($item["LINK"]) < mb_strlen(SITE_DIR)) {
        continue;
    }
    if ($item["LINK"] <> "") {
        $arChainBody[] = '<a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex" href="' . $item["LINK"] . '">' . htmlspecialcharsex($item["TITLE"]) . '</a>';
    } else {
        $arChainBody[] = htmlspecialcharsex($item["TITLE"]);
    }
}
return implode('', $arChainBody);
