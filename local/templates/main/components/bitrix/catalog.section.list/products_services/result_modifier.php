<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!empty($arResult['SECTIONS'])) {
    foreach ($arResult['SECTIONS'] as &$section) {
        if ($section['UF_SUPPORT_PRODUCT__ICON'] > 0) {
            $filePath = CFile::GetPath($section['UF_SUPPORT_PRODUCT__ICON']);

            if ($filePath !== '') {
                $section["ICON_PATH"] = $filePath;
            }
        }
    }
}
