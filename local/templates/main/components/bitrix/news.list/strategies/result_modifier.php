<?php
/** @var array $arResult */
/** @var array $arParams */

/** @var CBitrixComponent $component */

use Bitrix\Iblock\Iblock as BitrixIblock;


if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $arData) {
        $iconPath = '';
        $benefitIcon = '';
        $requirements = [];
        $rates = [];
        $others = [];
        $arBenefitIds = [];
        $arBenefitsData = [];

        if (!empty($arData["PREVIEW_PICTURE"]["SRC"])) {
            $iconPath = $arData["PREVIEW_PICTURE"]["SRC"];
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
                "select" => ["ID", "NAME", "PREVIEW_PICTURE", "ICON.FILE"],
                "filter" => ["ACTIVE" => "Y", "ID" => $arBenefitIds],
            ])->fetchCollection();

            if (!empty($elements)) {
                foreach ($elements as $element) {
                    $id = $element->getId();
                    $name = $element->getName();
                    $icon = '';

                    if (!empty($element->getIcon())) {
                        $icon = '/upload/' . $element->getIcon()->getFile()->getSubdir() . '/' . $element->getIcon()->getFile()->getFileName();
                    } else if (!empty($element->getPreviewPicture())) {
                        $icon = CFile::GetPath($element->getPreviewPicture());
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

        // Формирование списка файлов
        $files = [];
        if (!empty($arData["PROPERTIES"]["DOCUMENTS"]['VALUE'])) {
            $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM");
            $arFilter = array("IBLOCK_ID" => IntVal($yvalue), "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
            $resultDocuments = CIBlockElement::GetList(
                [
                    'SORT' => 'ASC'
                ],
                [
                    'IBLOCK_ID' => iblock('documents'),
                    'SECTION_ID' => $arData["PROPERTIES"]["DOCUMENTS"]['VALUE']
                ],
                false,
                [],
                [
                    'ID', 'NAME', 'PREVIEW_TEXT', 'PROPERTY_FILE'
                ]
            );
            while ($document = $resultDocuments->GetNext()) {
                if (!empty($document['PROPERTY_FILE_VALUE'])) {
                    $file = CFile::GetFileArray($document['PROPERTY_FILE_VALUE']);
                    $files[] = [
                        'PATH' => $file['SRC'],
                        'EXTENSION' => pathinfo($file['SRC'], PATHINFO_EXTENSION),
                        'NAME' => $document['NAME'],
                        'DATE_MODIFIED' => $file['TIMESTAMP_X'],
                    ];
                }
            }
        }
        $arResult["STRATEGIES"][$arData["ID"]]["FILES"] = $files;
    }
}
