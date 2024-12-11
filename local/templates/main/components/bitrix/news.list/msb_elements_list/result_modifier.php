<?php
/** @var array $arResult */
/** @var array $arParams */
/** @var CBitrixComponent $component */

use Bitrix\Iblock\Iblock as BitrixIblock;
use Bitrix\Iblock\Model\Section;

$mainSectionId = $arParams["PARENT_SECTION"];
$blockRatingIds = [];
$blockRatingElements = [];
$blockPossibilitiesIds = [];
$blockPossibilitiesElements = [];
$blockQuotesIds = [];
$blockQuotesElements = [];
$blockCardsIds = [];
$blockCardsElements = [];
$blockOtherServicesIds = [];
$blockOtherServicesElements = [];
$blockContactsIds = [];
$blockContactsElements = [];
$blockGuaranteesIds = [];
$blockGuaranteesElements = [];
$blockDetailServiceSectionIds = [];
$blockDetailServiceTabs = [];
$blockDetailServiceElements = [];
$blockDetailServiceTabsQuotes = [];
$colorsBlocks = [];
$blockWithColor = '';

if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $item) {
        if (!empty($item["PROPERTIES"]["BLOCK_RATINGS"]["VALUE"])) {
            $blockRatingsIds = $item["PROPERTIES"]["BLOCK_RATINGS"]["VALUE"];
            $blockWithColor = "BLOCK_RATINGS";
        }

        if (!empty($item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"])) {
            $blockPossibilitiesIds = $item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"];
            $blockWithColor = "BLOCK_POSSIBILITIES";
        }

        if (!empty($item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"])) {
            $blockQuotesIds = $item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"];
            $blockWithColor = "BLOCK_QUOTES";
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CARDS"]["VALUE"])) {
            $blockCardsIds = $item["PROPERTIES"]["BLOCK_CARDS"]["VALUE"];
            $blockWithColor = "BLOCK_CARDS";
        }

        if (!empty($item["PROPERTIES"]["BLOCK_OTHER_SERVICES"]["VALUE"])) {
            $blockOtherServicesIds = $item["PROPERTIES"]["BLOCK_OTHER_SERVICES"]["VALUE"];
            $blockWithColor = "BLOCK_OTHER_SERVICES";
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CONTACTS"]["VALUE"])) {
            $blockContactsIds = $item["PROPERTIES"]["BLOCK_CONTACTS"]["VALUE"];
            $blockWithColor = "BLOCK_CONTACTS";
        }

        if (!empty($item["PROPERTIES"]["BLOCK_GUARANTEES"]["VALUE"])) {
            $blockGuaranteesIds = $item["PROPERTIES"]["BLOCK_GUARANTEES"]["VALUE"];
            $blockWithColor = "BLOCK_GUARANTEES";
        }

        if (!empty($item["PROPERTIES"]["BLOCK_DETAIL_SERVICE"]["VALUE"])) {
            $blockDetailServiceSectionIds = $item["PROPERTIES"]["BLOCK_DETAIL_SERVICE"]["VALUE"];
            $blockWithColor = "BLOCK_DETAIL_SERVICE";
        }

        if (!empty($item["PROPERTIES"]["COLOR_BLOCK"]["VALUE"])) {
            $color = $item["PROPERTIES"]["COLOR_BLOCK"]["VALUE"];

            if (!empty($blockWithColor)) {
                $colorsBlocks[$blockWithColor] = $color;
            }
        }
    }
}

if (!empty($blockRatingsIds)) {
    // Получим полную информацию для блока "Рейтинги" из ИБ "Рейтинги для каталога услуг"
    $blockRatings = iblock('msb_ratings');
    $classRatings = BitrixIblock::wakeUp($blockRatings)->getEntityDataClass();
    $elementsRatings = $classRatings::getList([
        "select" => ["ID", "NAME", "PREVIEW_TEXT"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockRatingsIds],
    ])->fetchCollection();

    if (!empty($elementsRatings)) {
        foreach ($elementsRatings as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $previewText = '';

            if (!empty($element->getPreviewText())) {
                $previewText = $element->getPreviewText();
            }

            $blockRatingElements[$id] = [
                "TEMPLATE" => $previewText,
            ];
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

            if (empty($previewText)) {
                $previewText = $name;
                $name = '';
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

if (!empty($blockCardsIds)) {
    // Получим полную информацию для блока "Простые карточки" из ИБ "Простые карточки для каталога услуг"
    $iblockCards = iblock('msb_cards');
    $classCards = BitrixIblock::wakeUp($iblockCards)->getEntityDataClass();
    $elementsCards = $classCards::getList([
        "select" => ["ID", "NAME", "ICON.FILE"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockCardsIds],
    ])->fetchCollection();

    if (!empty($elementsCards)) {
        foreach ($elementsCards as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $icon = '';

            if (!empty($element->getIcon())) {
                $icon = '/upload/' . $element->getIcon()->getFile()->getSubdir() . '/' . $element->getIcon()->getFile()->getFileName();
            }

            $blockCardsElements[$id] = [
                "TITLE" => $name,
                "PICTURE" => $icon
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

if (!empty($blockDetailServiceSectionIds)) {
    // Получим полную информацию для блока "Подробнее об услугах" из ИБ "Подробная информация об услугах для каталога услуг"
    $iblockDetailServices = iblock('msb_full_info_services');
    $entity = Section::compileEntityByIblock($iblockDetailServices);
    $rsSections = $entity::getList([
        "select" => ["ID", "NAME", "CODE", "UF_TAB_QUOTES"],
        "filter" => [
            "ID" => $blockDetailServiceSectionIds
        ],
        "order" => ["SORT" => "ASC"],
    ])->fetchAll();

    $tabQuoteIds = [];
    $tabQuoteSectionIds = [];
    $tabQuotesElements = [];

    foreach ($rsSections as $section) {
        if (!empty($section["UF_TAB_QUOTES"])) {
            $tabQuoteIds[$section["UF_TAB_QUOTES"]] = $section["UF_TAB_QUOTES"];
            $tabQuoteSectionIds[$section["CODE"]][$section["UF_TAB_QUOTES"]] = $section["UF_TAB_QUOTES"];
        }

        $blockDetailServiceTabs[$section['ID']] = [
            "NAME" => $section["NAME"],
            "CODE" => $section["CODE"],
        ];
    }

    if (!empty($tabQuoteIds)) {
        // Получим подробные данные для цитаты из ИБ "Цитаты для каталога услуг"
        $iblockQuotes = iblock('msb_quotes');
        $classQuotes = BitrixIblock::wakeUp($iblockQuotes)->getEntityDataClass();
        $elementsQuotes = $classQuotes::getList([
            "select" => ["ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT"],
            "filter" => ["ACTIVE" => "Y", "ID" => $tabQuoteIds],
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

                if (empty($previewText)) {
                    $previewText = $name;
                    $name = '';
                }

                if (!empty($previewPicture)) {
                    $picture = CFile::GetPath($previewPicture);
                }

                $tabQuotesElements[$id] = [
                    "TITLE" => $name,
                    "TEXT" => $previewText,
                    "PICTURE" => $picture
                ];
            }
        }
    }

    if (!empty($tabQuotesElements)) {
        foreach ($tabQuoteSectionIds as $sectionCode => $arQuotes) {
            foreach ($arQuotes as $quotesId) {
                $blockDetailServiceTabsQuotes[$sectionCode][$quotesId] = $tabQuotesElements[$quotesId];
            }
        }

    }

    $classDetailServices = BitrixIblock::wakeUp($iblockDetailServices)->getEntityDataClass();
    $elementsDetailServices = $classDetailServices::getList([
        "select" => [
            "ID",
            "IBLOCK_SECTION_ID",
            "NAME",
            "PREVIEW_TEXT",
            "TAB_TARIF"
        ],
        "filter" => [
            "ACTIVE" => "Y",
            "IBLOCK_SECTION_ID" => $blockDetailServiceSectionIds,
            "RELATION_CATALOG.VALUE" => $mainSectionId
        ],
    ])->fetchCollection();

    if (!empty($elementsDetailServices)) {
        foreach ($elementsDetailServices as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $sectionId = $element->getIblockSectionId();
            $sectionCode = $blockDetailServiceTabs[$sectionId]["CODE"];
            $previewText = '';

            if (!empty($element->getPreviewText())) {
                $previewText = $element->getPreviewText();
            }

            if ($sectionCode === "opisanie") {
                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "TEXT" => $previewText,
                ];
            }

            if ($sectionCode === "voprosy-i-otvety") {
                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "QUESTION" => $name,
                    "ANSWER" => $previewText
                ];
            }

            if ($sectionCode === "tarify") {
                $tarifs = [];

                if (!empty($element->getTabTarif())) {
                    foreach ($element->getTabTarif()->getAll() as $tarif) {
                        $tarifs[$tarif->getDescription()] = $tarif->getValue() ?? '';
                    }
                }

                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "NAME" => $name,
                    "TARIFS" => $tarifs
                ];
            }
        }

        if (!empty($blockDetailServiceElements)) {
            foreach ($blockDetailServiceElements as $sectionCode => $arItems) {
                if (!empty($blockDetailServiceTabsQuotes[$sectionCode])) {
                    $blockDetailServiceElements[$sectionCode]["QUOTES"] = $blockDetailServiceTabsQuotes[$sectionCode];
                }
            }
        }
    }
}

if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $index => $item) {
        if (!empty($item["PROPERTIES"]["BLOCK_RATINGS"]["VALUE"]) && !empty($blockRatingElements)) {
            $arResult["ITEMS"][$index]["BLOCK_RATINGS"] = $blockRatingElements;

            if (!empty($colorsBlocks["BLOCK_RATINGS"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_RATINGS"];
            }
        }

        if (!empty($item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"]) && !empty($blockPossibilitiesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_POSSIBILITIES"] = $blockPossibilitiesElements;

            if (!empty($colorsBlocks["BLOCK_POSSIBILITIES"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_POSSIBILITIES"];
            }
        }

        if (!empty($item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"]) && !empty($blockQuotesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_QUOTES"] = $blockQuotesElements;

            if (!empty($colorsBlocks["BLOCK_QUOTES"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_QUOTES"];
            }
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CARDS"]["VALUE"]) && !empty($blockCardsElements)) {
            $arResult["ITEMS"][$index]["BLOCK_CARDS"] = $blockCardsElements;

            if (!empty($colorsBlocks["BLOCK_CARDS"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_CARDS"];
            }
        }

        if (!empty($item["PROPERTIES"]["BLOCK_OTHER_SERVICES"]["VALUE"]) && !empty($blockOtherServicesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_OTHER_SERVICES"] = $blockOtherServicesElements;

            if (!empty($colorsBlocks["BLOCK_OTHER_SERVICES"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_OTHER_SERVICES"];
            }
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CONTACTS"]["VALUE"]) && !empty($blockContactsElements)) {
            $arResult["ITEMS"][$index]["BLOCK_CONTACTS"] = $blockContactsElements;

            if (!empty($colorsBlocks["BLOCK_CONTACTS"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_CONTACTS"];
            }
        }

        if (!empty($item["PROPERTIES"]["BLOCK_GUARANTEES"]["VALUE"]) && !empty($blockGuaranteesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_GUARANTEES"] = $blockGuaranteesElements;

            if (!empty($colorsBlocks["BLOCK_GUARANTEES"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_GUARANTEES"];
            }
        }

        if (!empty($item["PROPERTIES"]["BLOCK_DETAIL_SERVICE"]["VALUE"]) &&
            !empty($blockDetailServiceElements) &&
            !empty($blockDetailServiceTabs)
        ) {
            $arResult["ITEMS"][$index]["BLOCK_DETAIL_SERVICE"]["TABS"] = $blockDetailServiceTabs;
            $arResult["ITEMS"][$index]["BLOCK_DETAIL_SERVICE"]["ELEMENTS"] = $blockDetailServiceElements;

            if (!empty($colorsBlocks["BLOCK_DETAIL_SERVICE"])) {
                $arResult["ITEMS"][$index]["COLOR_BLOCK"] = $colorsBlocks["BLOCK_DETAIL_SERVICE"];
            }
        }
    }
}
