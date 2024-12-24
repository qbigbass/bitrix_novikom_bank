<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!empty($arResult['SECTIONS'])) {
    foreach ($arResult['SECTIONS'] as &$section) {
        if (!empty($section['UF_SUPPORT_PRODUCT__ICON']) || !empty($section['UF_SUPPORT_INFO_ICON'])) {
            $fieldIcon = $section['UF_SUPPORT_PRODUCT__ICON'] ?? $section['UF_SUPPORT_INFO_ICON'];
            $filePath = CFile::GetPath($fieldIcon);

            if (!empty($filePath) && file_exists($_SERVER["DOCUMENT_ROOT"] . $filePath)) {
                $section["ICON_PATH"] = $filePath;
            }
        }
    }
}
