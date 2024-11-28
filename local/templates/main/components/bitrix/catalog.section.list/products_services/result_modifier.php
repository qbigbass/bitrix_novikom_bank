<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!empty($arResult['SECTIONS'])) {
    foreach ($arResult['SECTIONS'] as &$section) {
        if ($section['UF_SUPPORT_PRODUCT__ICON'] > 0 || $section['UF_SUPPORT_INFO_ICON'] > 0) {
            $fieldIcon = $section['UF_SUPPORT_PRODUCT__ICON'] ?? $section['UF_SUPPORT_INFO_ICON'];
            $filePath = CFile::GetPath($fieldIcon);

            if ($filePath !== '') {
                $section["ICON_PATH"] = $filePath;
            }
        }
    }
}
