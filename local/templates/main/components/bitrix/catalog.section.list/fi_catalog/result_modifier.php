<?
/** @var array $arResult */
/** @var array $arParams */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\UserFieldTable;

$iblockId = $arParams["IBLOCK_ID"];
$arSectionUpPosition = [];
$arSectionCentrePosition = [];
$arSectionDownPosition = [];
$cntSectionsUpPosition = 0;
$cntSectionsUp = 3;
$ufFiPosId = 0;
$arUfFiPosData = [];

$rsUserFields = UserFieldTable::getList([
    "select" => ["ID"],
    "filter" => [
        "FIELD_NAME" => "UF_FI_POS",
        "ENTITY_ID" => "IBLOCK_" . $iblockId . "_SECTION"
    ],
]);

if ($arUserField = $rsUserFields->fetch()) {
    $ufFiPosId = $arUserField["ID"];
}

if ($ufFiPosId > 0) {
    $dbEnums = CUserFieldEnum::GetList(
        [],
        ["USER_FIELD_ID" => $arUserField['ID']]
    );

    while ($arEnum = $dbEnums->GetNext()) {
        $arUfFiPosData[$arEnum["ID"]] = $arEnum["XML_ID"];
    }
}

if (!empty($arResult["SECTIONS"])) {
    foreach ($arResult["SECTIONS"] as &$section) {
        if (!empty($section["UF_FI_ICON"])) {
            $fieldIcon = $section['UF_FI_ICON'];
            $filePath = CFile::GetPath($fieldIcon);

            if (!empty($filePath) && file_exists($_SERVER["DOCUMENT_ROOT"] . $filePath)) {
                $section["ICON_PATH"] = $filePath;
            }
        }

        if (!empty($section["UF_TITLE_MAIN"])) {
            $section["NAME"] = $section["UF_TITLE_MAIN"];
        }

        $cntSectionsUpPosition = count($arSectionUpPosition);

        if ($arUfFiPosData[$section["UF_FI_POS"]] === "down") {
            $arSectionDownPosition[] = $section;
        } else {
            if (($arUfFiPosData[$section["UF_FI_POS"]] === "up") && $cntSectionsUpPosition < $cntSectionsUp) {
                $arSectionUpPosition[] = $section;
            } else {
                $arSectionCentrePosition[] = $section;
            }
        }
    }

    if (empty($arSectionUpPosition) && !empty($arSectionCentrePosition)) {
        $arSectionUpPosition = array_splice($arSectionCentrePosition, 0, $cntSectionsUp);
    }

    if (!empty($arSectionCentrePosition)) {
        $arResult["SECTIONS_CENTER_POSITION_1"] = array_splice($arSectionCentrePosition, 0, $cntSectionsUp);
        $arResult["SECTIONS_CENTER_POSITION_2"] = $arSectionCentrePosition;
    }
}

$arResult["SECTIONS_UP_POSITION"] = $arSectionUpPosition;
$arResult["SECTIONS_DOWN_POSITION"] = $arSectionDownPosition;
