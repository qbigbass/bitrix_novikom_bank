<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arSectionUpPosition = [];
$arSectionDownPosition = [];
$cntSectionsUpPosition = 0;
$cntSectionsUp = 3;

if (!empty($arResult['SECTIONS'])) {
    foreach ($arResult['SECTIONS'] as &$section) {
        if ($section['UF_FI_ICON'] > 0) {
            $fieldIcon = $section['UF_FI_ICON'];
            $filePath = CFile::GetPath($fieldIcon);

            if ($filePath !== '') {
                $section["ICON_PATH"] = $filePath;
            }
        }

        $cntSectionsUpPosition = count($arSectionUpPosition);

        if ((int)$section["UF_FL_POS"] > 0 && $cntSectionsUpPosition < $cntSectionsUp) {
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
