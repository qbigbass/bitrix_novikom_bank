<?php
/** @var array $arResult */
/** @var CBitrixComponent $component */

use Bitrix\Iblock\Iblock as BitrixIblock;

$blockPossibilitiesIds = [];
$blockPossibilitiesElements = [];
$blockQuotesIds = [];
$blockQuotesElements = [];
$blockOtherServicesIds = [];
$blockOtherServicesElements = [];
$blockContactsIds = [];
$blockContactsElements = [];
$blockGuaranteesIds = [];
$blockGuaranteesElements = [];

if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $item) {
        if (!empty($item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"])) {
            $blockPossibilitiesIds = $item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"];
        }

        if (!empty($item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"])) {
            $blockQuotesIds = $item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"];
        }

        if (!empty($item["PROPERTIES"]["BLOCK_OTHER_SERVICES"]["VALUE"])) {
            $blockOtherServicesIds = $item["PROPERTIES"]["BLOCK_OTHER_SERVICES"]["VALUE"];
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CONTACTS"]["VALUE"])) {
            $blockContactsIds = $item["PROPERTIES"]["BLOCK_CONTACTS"]["VALUE"];
        }

        if (!empty($item["PROPERTIES"]["BLOCK_GUARANTEES"]["VALUE"])) {
            $blockGuaranteesIds = $item["PROPERTIES"]["BLOCK_GUARANTEES"]["VALUE"];
        }
    }
}

if (!empty($blockPossibilitiesIds)) {
    // Получим полную информацию для блока "Возможности" из ИБ "Возможности для каталога услуг"
    $iblockPossibilities = iblock('msb_possibilities');
    $classPossibilities = BitrixIblock::wakeUp($iblockPossibilities)->getEntityDataClass();
    $elementsPossibilities = $classPossibilities::getList([
        "select" => ["ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockPossibilitiesIds],
    ])->fetchCollection();

    if (!empty($elementsPossibilities)) {
        foreach ($elementsPossibilities as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $previewPicture = $element->getPreviewPicture();
            $previewText = '';
            $picture = '';

            if (!empty($element->getPreviewText())) {
                $previewText = $element->getPreviewText();
            }

            if (!empty($previewPicture)) {
                $picture = CFile::GetPath($previewPicture);
            }

            $blockPossibilitiesElements[$id] = [
                "TITLE" => $name,
                "TEXT" => $previewText,
                "PICTURE" => $picture
            ];
        }
    }
}

if (!empty($blockQuotesIds)) {
    // Получим полную информацию для блока с цитатой из ИБ "Цитаты для каталога услуг"
    $iblockQuotes = iblock('msb_quotes');
    $classQuotes = BitrixIblock::wakeUp($iblockQuotes)->getEntityDataClass();
    $elementsQuotes = $classQuotes::getList([
        "select" => ["ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockQuotesIds],
    ])->fetchCollection();

    if (!empty($elementsQuotes)) {
        foreach ($elementsQuotes as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $previewPicture = $element->getPreviewPicture();
            $previewText = '';
            $picture = '';

            if (!empty($element->getPreviewText())) {
                $previewText = $element->getPreviewText();
            }

            if (!empty($previewPicture)) {
                $picture = CFile::GetPath($previewPicture);
            }

            $blockQuotesElements[$id] = [
                "TITLE" => $name,
                "TEXT" => $previewText,
                "PICTURE" => $picture
            ];
        }
    }
}

if (!empty($blockOtherServicesIds)) {
    // Получим полную информацию для блока "Другие услуги для бизнеса" из ИБ "Дополнительно / Кросс продажи"
    $iblockCrossSale = iblock('cross_sale');
    $classCrossSale = BitrixIblock::wakeUp($iblockCrossSale)->getEntityDataClass();
    $elementsCrossSale = $classCrossSale::getList([
        "select" => ["ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "TAG.ITEM", "CONDITION", "BTN_TEXT", "LINK", "BTN_TYPE.ITEM", "LINE_COLOR.ITEM"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockOtherServicesIds],
    ])->fetchCollection();

    if (!empty($elementsCrossSale)) {
        foreach ($elementsCrossSale as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $previewPicture = $element->getPreviewPicture();
            $previewText = '';
            $picture = '';
            $tag = '';
            $conditionValue = '';
            $conditionDesc = '';
            $btnText = '';
            $link = '';
            $lineColorXml = '';

            if (!empty($element->getPreviewText())) {
                $previewText = $element->getPreviewText();
            }

            if (!empty($previewPicture)) {
                $picture = CFile::GetPath($previewPicture);
            }

            if (!empty($element->getTag())) {
                $tag = $element->getTag()->getItem()->getValue();
            }

            if ($element->getCondition()) {
                $conditionValue = $element->getCondition()->getValue();
                $conditionDesc = $element->getCondition()->getDescription();
            }

            if ($element->getBtnText()) {
                $btnText = $element->getBtnText()->getValue();
            }

            if ($element->getLink()) {
                $link = $element->getLink()->getValue();
            }

            if (!empty($element->getLineColor())) {
                $lineColorXml = $element->getLineColor()->getItem()->getXmlId();
            }

            $blockOtherServicesElements[$id] = [
                "TITLE" => $name,
                "TEXT" => $previewText,
                "PICTURE" => $picture,
                "TAG" => $tag,
                "CONDITION_DESC" => $conditionDesc,
                "CONDITION_VALUE" => $conditionValue,
                "BTN_TEXT" => $btnText,
                "LINK" => $link,
                "LINE_COLOR_XML" => $lineColorXml
            ];
        }
    }
}

if (!empty($blockContactsIds)) {
    // Получим полную информацию для блока "Контакты" из ИБ "Контакты для каталога услуг"
    $iblockContacts = iblock('msb_contacts');
    $classContacts = BitrixIblock::wakeUp($iblockContacts)->getEntityDataClass();
    $elementsContacts = $classContacts::getList([
        "select" => ["ID", "NAME", "EMAIL", "PHONE", "TYPE"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockContactsIds],
    ])->fetchCollection();

    if (!empty($elementsContacts)) {
        foreach ($elementsContacts as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $email = '';
            $phones = [];
            $type = '';

            if ($element->getEmail()) {
                $email = $element->getEmail()->getValue();
            }

            if ($element->getPhone()) {
                foreach ($element->getPhone()->getAll() as $phone) {
                    $phones[$phone->getValue()] = $phone->getDescription() ?? '';
                }
            }

            if ($element->getType()) {
                $type = $element->getType()->getValue();
            }

            $blockContactsElements[$id] = [
                "TITLE" => $name,
                "EMAIL" => $email,
                "PHONES" => $phones,
                "TYPE" => $type
            ];
        }
    }
}

if (!empty($blockGuaranteesIds)) {
    // Получим полную информацию для блока "Оформление гарантии" из ИБ "Оформление гарантии для каталога услуг"
    $iblockGuarantees = iblock('msb_guarantees');
    $classGuarantees = BitrixIblock::wakeUp($iblockGuarantees)->getEntityDataClass();
    $elementsGuarantees = $classGuarantees::getList([
        "select" => ["ID", "NAME", "PLACE.ITEM"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockGuaranteesIds],
    ])->fetchCollection();

    if (!empty($elementsGuarantees)) {
        foreach ($elementsGuarantees as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $placeXmlId = '';
            $placeValue = '';

            if (!empty($element->getPlace())) {
                $placeValue = $element->getPlace()->getItem()->getValue();
                $placeXmlId = $element->getPlace()->getItem()->getXmlId();
            }

            if (!empty($placeXmlId) && !empty($placeValue)) {
                $blockGuaranteesElements["TABS"][$placeXmlId] = $placeValue;
                $blockGuaranteesElements["ITEMS"][$placeXmlId][$id] = [
                    "TITLE" => $name
                ];
            }
        }
    }
}

if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $index => $item) {
        if (!empty($item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"]) && !empty($blockPossibilitiesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_POSSIBILITIES"] = $blockPossibilitiesElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"]) && !empty($blockQuotesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_QUOTES"] = $blockQuotesElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_OTHER_SERVICES"]["VALUE"]) && !empty($blockOtherServicesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_OTHER_SERVICES"] = $blockOtherServicesElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CONTACTS"]["VALUE"]) && !empty($blockContactsElements)) {
            $arResult["ITEMS"][$index]["BLOCK_CONTACTS"] = $blockContactsElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_GUARANTEES"]["VALUE"]) && !empty($blockGuaranteesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_GUARANTEES"] = $blockGuaranteesElements;
        }
    }
}
