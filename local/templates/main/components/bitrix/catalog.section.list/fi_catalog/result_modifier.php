<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arSectionUpPosition = [];
$arSectionDownPosition = [];
$cntSectionsUpPosition = 0;
$cntSectionsUp = 3;

if (!empty($arResult['SECTIONS'])) {
    foreach ($arResult['SECTIONS'] as &$section) {
        if (!empty($section['UF_FI_ICON'])) {
            $fieldIcon = $section['UF_FI_ICON'];
            $filePath = CFile::GetPath($fieldIcon);

            if (!empty($filePath)) {
                $section["ICON_PATH"] = $filePath;
            }
        }

        $cntSectionsUpPosition = count($arSectionUpPosition);

        if (!empty($section["UF_FI_POS"]) && $cntSectionsUpPosition < $cntSectionsUp) {
            $arSectionUpPosition[] = $section;
        } else {
            $arSectionDownPosition[] = $section;
        }
    }

    if (empty($arSectionUpPosition) && !empty($arSectionDownPosition)) {
        $arSectionUpPosition = array_splice($arSectionDownPosition, 0, $cntSectionsUp);
    }

    if (!empty($arSectionDownPosition)) {
        $arResult["SECTIONS_DOWN_POSITION_1"] = array_splice($arSectionDownPosition, 0, $cntSectionsUp);
        $arResult["SECTIONS_DOWN_POSITION_2"] = $arSectionDownPosition;
    }
}
$arResult["SECTIONS_UP_POSITION"] = $arSectionUpPosition;
