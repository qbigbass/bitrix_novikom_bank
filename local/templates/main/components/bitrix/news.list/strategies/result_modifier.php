<?php
/** @var array $arResult */
/** @var array $arParams */
/** @var CBitrixComponent $component */

use Bitrix\Iblock\Iblock as BitrixIblock;


if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $arData) {
        $iconPath = '';
        $filePath = '';
        $fileDesc = '';
        $fileDateModified = '';
        $benefitIcon = '';
        $requirements = [];
        $rates = [];
        $others = [];
        $arBenefitIds = [];
        $arBenefitsData = [];

        if (!empty($arData["PREVIEW_PICTURE"]["SRC"])) {
            $iconPath = $arData["PREVIEW_PICTURE"]["SRC"];
        }

        if (!empty($arData["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"])) {
            $filePath = $arData["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"];
        }

        if (!empty($arData["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["DESCRIPTION"])) {
            $fileDesc = $arData["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["DESCRIPTION"];
        }

        if (!empty($arData["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["TIMESTAMP_X"])) {
            $fileDateModified = $arData["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["TIMESTAMP_X"];
        }

        if (!empty($arData["PROPERTIES"]["BENEFITS"]["VALUE"])) {
            $arBenefitIds = $arData["PROPERTIES"]["BENEFITS"]["VALUE"];
        }

        if (!empty($arData["PROPERTIES"]["REQUIREMENTS"]["VALUE"])) {
            foreach ($arData["PROPERTIES"]["REQUIREMENTS"]["VALUE"] as $kR => $value) {
                $requirements[$arData["PROPERTIES"]["REQUIREMENTS"]["DESCRIPTION"][$kR]] = $arData["PROPERTIES"]["REQUIREMENTS"]["VALUE"][$kR];
            }
        }

        if (!empty($arData["PROPERTIES"]["RATES"]["VALUE"])) {
            foreach ($arData["PROPERTIES"]["RATES"]["VALUE"] as $k => $value) {
                $rates[$arData["PROPERTIES"]["RATES"]["DESCRIPTION"][$k]] = $arData["PROPERTIES"]["RATES"]["VALUE"][$k];
            }
        }

        if (!empty($arData["PROPERTIES"]["OTHERS"]["VALUE"])) {
            foreach ($arData["PROPERTIES"]["OTHERS"]["VALUE"] as $k => $value) {
                $others[$k] = $value;
            }
        }

        if (!empty($arBenefitIds)) {
            // Получим информацию по бенефитам из ИБ "Преимущества"
            $block = iblock('benefits');
            $class = BitrixIblock::wakeUp($block)->getEntityDataClass();
            $elements = $class::getList([
                "select" => ["ID", "NAME", "ICON.FILE"],
                "filter" => ["ACTIVE" => "Y", "ID" => $arBenefitIds],
            ])->fetchCollection();

            if (!empty($elements)) {
                foreach ($elements as $element) {
                    $id = $element->getId();
                    $name = $element->getName();
                    $icon = '';

                    if (!empty($element->getIcon())) {
                        $icon = '/upload/' . $element->getIcon()->getFile()->getSubdir() . '/' . $element->getIcon()->getFile()->getFileName();
                    }

                    $arBenefitsData[$id] = [
                        "NAME" => $name,
                        "ICON" => $icon
                    ];
                }
            }
        }

        $arResult["STRATEGIES"][$arData["ID"]] = [
            "NAME" => $arData["NAME"],
            "DATE_MODIFIED" => $fileDateModified,
            "PREVIEW_TEXT" => $arData["PREVIEW_TEXT"] ?? "",
            "PICTURE" => $iconPath ?? "",
            "RISK" => $arData["PROPERTIES"]["RISK"]["~VALUE"] ?? "",
            "PERIOD" => $arData["PROPERTIES"]["PERIOD"]["~VALUE"] ?? "",
            "PROFIT" => $arData["PROPERTIES"]["PROFIT"]["~VALUE"] ?? "",
            "TARGET" => $arData["PROPERTIES"]["TARGET"]["VALUE"] ?? "",
            "CONTROL_METHOD" => $arData["PROPERTIES"]["CONTROL_METHOD"]["VALUE"] ?? "",
            "REQUIREMENTS" => $requirements,
            "RATES" => $rates,
            "OTHERS" => $others,
            "BENEFITS" => $arBenefitsData
        ];

        if (!empty($filePath)) {
            $arResult["STRATEGIES"][$arData["ID"]]["FILE"] = [
                "PATH" => $filePath,
                "EXTENSION" => pathinfo($filePath, PATHINFO_EXTENSION),
                "NAME" => $fileDesc
            ];
        }
    }
}
