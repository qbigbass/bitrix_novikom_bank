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
$blockStagesElements = [];
$blockDetailServiceSectionIds = [];
$blockDetailServiceTabs = [];
$blockDetailServiceElements = [];
$blockDetailServiceTabsQuotes = [];

if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $item) {
        if (!empty($item["PROPERTIES"]["BLOCK_RATINGS"]["VALUE"])) {
            $blockRatingsIds = $item["PROPERTIES"]["BLOCK_RATINGS"]["VALUE"];
        }

        if (!empty($item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"])) {
            $blockPossibilitiesIds = $item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"];
        }

        if (!empty($item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"])) {
            $blockQuotesIds = $item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"];
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CARDS"]["VALUE"])) {
            $blockCardsIds = $item["PROPERTIES"]["BLOCK_CARDS"]["VALUE"];
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

        if (!empty($item["PROPERTIES"]["BLOCK_DETAIL_SERVICE"]["VALUE"])) {
            $blockDetailServiceSectionIds = $item["PROPERTIES"]["BLOCK_DETAIL_SERVICE"]["VALUE"];
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
        "select" => ["ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "COLOR_BG"],
        "filter" => ["ACTIVE" => "Y", "ID" => $blockQuotesIds],
    ])->fetchCollection();

    if (!empty($elementsQuotes)) {
        foreach ($elementsQuotes as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $previewPicture = $element->getPreviewPicture();
            $previewText = '';
            $picture = '';
            $colorBg = 'bg-blue-10';

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

            if (!empty($element->getColorBg())) {
                $colorBg = $element->getColorBg()->getValue();
            }

            $blockQuotesElements[$id] = [
                "TITLE" => $name,
                "TEXT" => $previewText,
                "PICTURE" => $picture,
                "COLOR_BG" => $colorBg
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
            } else {
                $blockStagesElements[$id] = [
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
        "select" => ["ID", "NAME", "CODE"],
        "filter" => [
            "ID" => $blockDetailServiceSectionIds
        ],
        "order" => ["SORT" => "ASC"],
    ])->fetchAll();

    $tabQuoteIds = [];
    $tabQuoteSectionIds = [];
    $tabQuotesElements = [];
    $tabSectionCode = [];

    foreach ($rsSections as $section) {
        $blockDetailServiceTabs[$section['ID']] = [
            "NAME" => $section["NAME"],
            "CODE" => $section["CODE"],
        ];

        $tabSectionCode[$section["CODE"]] = $section["ID"];
    }

    $classDetailServices = BitrixIblock::wakeUp($iblockDetailServices)->getEntityDataClass();
    $elementsDetailServices = $classDetailServices::getList([
        "select" => [
            "ID",
            "IBLOCK_SECTION_ID",
            "NAME",
            "PREVIEW_TEXT",
            "TAB_TARIF",
            "DOCUMENTS.FILE",
            "TAB_FUNDS_DESC",
            "TAB_FUNDS_CITY",
            "TAB_FUNDS_LINK",
            "TAB_QUOTES"
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

            if ($sectionCode === "svedeniya") {
                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "TEXT" => $previewText,
                ];
            }

            if ($sectionCode === "vidy") {
                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "TITLE" => $name,
                    "TEXT" => $previewText,
                ];
            }

            if ($sectionCode === "otvetstvennost") {
                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "TITLE" => $name,
                    "TEXT" => $previewText,
                ];
            }

            if ($sectionCode === "pamyatka") {
                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "TEXT" => $previewText,
                ];
            }

            if ($sectionCode === "usloviya") {
                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "TEXT" => $previewText,
                ];
            }

            if ($sectionCode === "dokumenty-i-tarify") {
                $documents = [];

                if (!empty($element->getDocuments())) {
                    foreach ($element->getDocuments() as $doc) {
                        $fileId = $doc->getFile()->getId();
                        $fileSrc = '/upload/' . $doc->getFile()->getSubdir() . '/' . $doc->getFile()->getFileName();
                        $fileDesc = $doc->getFile()->getDescription();
                        $fileTime = date('d.m.y H:i', strtotime($doc->getFile()->getTimestampX()));
                        $fileType = pathinfo($fileSrc, PATHINFO_EXTENSION);

                        if (!empty($fileDesc) && !empty($fileSrc)) {
                            $documents[$fileId] = [
                                "DESC" => $fileDesc,
                                "SRC" => $fileSrc,
                                "EXT" => $fileType,
                                "TIME" => $fileTime
                            ];
                        }
                    }

                    if (!empty($documents)) {
                        $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                            "NAME" => $name,
                            "DOCUMENTS" => $documents
                        ];
                    }
                }
            }

            if ($sectionCode === "fondy") {
                $fundsDesc = [];
                $fundsLink = '';
                $fundsCity = '';

                if (!empty($element->getTabFundsDesc())) {
                    foreach ($element->getTabFundsDesc()->getAll() as $funds) {
                        $fundsDesc[$funds->getDescription()] = $funds->getValue() ?? '';
                    }
                }

                if (!empty($element->getTabFundsLink())) {
                    $fundsLink = $element->getTabFundsLink()->getValue();
                }

                if (!empty($element->getTabFundsCity())) {
                    $fundsCity = $element->getTabFundsCity()->getValue();
                }

                $blockDetailServiceElements[$sectionCode]["ITEMS"][$id] = [
                    "TITLE" => $name,
                    "DESC" => $fundsDesc,
                    "LINK" => $fundsLink,
                    "CITY" => $fundsCity
                ];
            }

            if (!empty($element->getTabQuotes())) {
                $quoteId = $element->getTabQuotes()->getValue();
                $tabQuoteIds[$quoteId] = $quoteId;
                $tabQuoteSectionIds[$sectionCode][$quoteId] = $quoteId;
            }
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

        if (!empty($blockDetailServiceElements)) {
            foreach ($blockDetailServiceElements as $sectionCode => $arItems) {
                if (!empty($blockDetailServiceTabsQuotes[$sectionCode])) {
                    $blockDetailServiceElements[$sectionCode]["QUOTES"] = $blockDetailServiceTabsQuotes[$sectionCode];
                }
            }

            foreach ($tabSectionCode as $code => $id) {
                if (empty($blockDetailServiceElements[$code])) {
                    unset($blockDetailServiceTabs[$id]);
                }
            }
        }
    }
}

if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $index => $item) {
        if (!empty($item["PROPERTIES"]["BLOCK_RATINGS"]["VALUE"]) && !empty($blockRatingElements)) {
            $arResult["ITEMS"][$index]["BLOCK_RATINGS"] = $blockRatingElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_POSSIBILITIES"]["VALUE"]) && !empty($blockPossibilitiesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_POSSIBILITIES"] = $blockPossibilitiesElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_QUOTES"]["VALUE"]) && !empty($blockQuotesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_QUOTES"] = $blockQuotesElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_CARDS"]["VALUE"]) && !empty($blockCardsElements)) {
            $arResult["ITEMS"][$index]["BLOCK_CARDS"] = $blockCardsElements;
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

        if (!empty($item["PROPERTIES"]["BLOCK_GUARANTEES"]["VALUE"]) && !empty($blockStagesElements)) {
            $arResult["ITEMS"][$index]["BLOCK_STAGES"] = $blockStagesElements;
        }

        if (!empty($item["PROPERTIES"]["BLOCK_DETAIL_SERVICE"]["VALUE"]) &&
            !empty($blockDetailServiceElements) &&
            !empty($blockDetailServiceTabs)
        ) {
            $arResult["ITEMS"][$index]["BLOCK_DETAIL_SERVICE"]["TABS"] = $blockDetailServiceTabs;
            $arResult["ITEMS"][$index]["BLOCK_DETAIL_SERVICE"]["ELEMENTS"] = $blockDetailServiceElements;
        }

        if (!empty($item["PROPERTIES"]["CLASS_SECTION"]["VALUE"])) {
            $arResult["ITEMS"][$index]["SECTION_BACKGROUND_CLASS_STYLE"] = $item["PROPERTIES"]["CLASS_SECTION"]["VALUE"];
        }
    }
}

//echo "<pre>"; print_r($arResult); echo "</pre>"; //exit();
