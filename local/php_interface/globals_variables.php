<?php
global $APPLICATION;
global $PARENT_SECTION_CODE;
global $FORMS;

$url = $APPLICATION->GetCurPage();
$arSectionsUrl = [];
$PARENT_SECTION_CODE = '';

if (!empty($url)) {
    $arSectionsUrl = array_filter(explode("/", $url));
}

if (!empty($arSectionsUrl[1])) {
    $PARENT_SECTION_CODE = $arSectionsUrl[1];
}

$FORMS = new \Dalee\Helpers\Forms();
