<?php
/** @var array $arResult */
/** @var CBitrixComponent $component */

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

foreach ($arResult['ITEMS'] as &$anchor) {
    if (!empty($anchor['DISPLAY_PROPERTIES'])) {
        $anchor['DISPLAY_PROPERTIES']['SHORT_INFO']['IMG'] = $anchor['DISPLAY_PROPERTIES']['ICON_SHORT_INFO']['FILE_VALUE']['SRC'];
        $anchor['DISPLAY_PROPERTIES']['ICONS_WITH_DESCRIPTION']['SHOW_TWO_ICONS_IN_ROW'] = $anchor['DISPLAY_PROPERTIES']['SHOW_TWO_ICONS_IN_ROW']['VALUE'];

        foreach ($anchor['DISPLAY_PROPERTIES'] as &$property) {
            if ($property['PROPERTY_TYPE'] == 'E' && !empty($property['VALUE'])) {
                $elements = ElementTable::GetList([
                    'select' => ['ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE'],
                    'filter' => [
                        'IBLOCK_ID' => $property['LINK_IBLOCK_ID'],
                        'ID' => $property['VALUE']
                    ],
                ])->fetchAll();

                foreach ($elements as $element) {
                    $property['LINK_ELEMENT_VALUE'][$element['ID']]['PREVIEW_TEXT'] = $element['PREVIEW_TEXT'];
                    $property['LINK_ELEMENT_VALUE'][$element['ID']]['DETAIL_TEXT'] = $element['DETAIL_TEXT'];
                    $property['LINK_ELEMENT_VALUE'][$element['ID']]['ID'] = $element['ID'];
                    $property['LINK_ELEMENT_VALUE'][$element['ID']]['NAME'] = $element['NAME'];

                    if (!empty($element['PREVIEW_PICTURE'])) {
                        $property['LINK_ELEMENT_VALUE'][$element['ID']]['PREVIEW_PICTURE'] = CFile::GetPath($element['PREVIEW_PICTURE']);
                    }

                    if (!empty($element['DETAIL_PICTURE'])) {
                        $property['LINK_ELEMENT_VALUE'][$element['ID']]['DETAIL_PICTURE'] = CFile::GetPath($element['DETAIL_PICTURE']);
                    }
                }
            }

            if ($property['PROPERTY_TYPE'] == 'G' && !empty($property['VALUE'])) {
                $filter = [
                    'IBLOCK_ID' => $property['LINK_IBLOCK_ID'],
                    'IBLOCK_SECTION_ID' => $property['VALUE']
                ];

                $sections = SectionTable::GetList([
                    'select' => ['ID', 'NAME', 'DESCRIPTION'],
                    'filter' => ['IBLOCK_ID' => $property['LINK_IBLOCK_ID'], 'ID' => $property['VALUE']],
                ])->fetchAll();

                $elements = ElementTable::GetList([
                    'select' => ['ID', 'NAME', 'IBLOCK_SECTION_ID', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'ACTIVE_FROM'],
                    'filter' => $filter,
                ])->fetchAll();

                $elementsWithProps = array_combine(
                    array_column($elements, 'ID'),
                    array_map(fn($item) => $item + ['PROPERTIES' => []], $elements)
                );

                CIBlockElement::GetPropertyValuesArray($elementsWithProps, $filter['IBLOCK_ID'], $filter);

                foreach ($sections as $section) {
                    $property['LINK_SECTION_VALUE'][$section['ID']]['DESCRIPTION'] = $section['DESCRIPTION'];
                    $property['LINK_SECTION_VALUE'][$section['ID']]['NAME'] = $section['NAME'];
                    $property['LINK_SECTION_VALUE'][$section['ID']]['ID'] = $section['ID'];
                }

                foreach ($elementsWithProps as $element) {
                    $property['LINK_SECTION_VALUE'][$element['IBLOCK_SECTION_ID']]['ELEMENTS'][$element['ID']] = $element;
                }
            }
        }

        unset($property);
    }

    $title = $anchor["PROPERTIES"]["TITLE_MENU"]["VALUE"] ?: $anchor["NAME"];
    $arResult["MENU"][] = [
        "CODE" => $anchor["CODE"],
        "TITLE" => $title,
        "SORT" => $anchor["SORT"]
    ];

    $params = [];

    if (!empty($anchor["PROPERTIES"]["BENEFITS_SLIDER_CLASS_CARDS"]["VALUE"])) {
        $params["BENEFITS_SLIDER_CLASS_CARDS"] = $anchor["PROPERTIES"]["BENEFITS_SLIDER_CLASS_CARDS"]["VALUE"];
    }

    if (!empty($anchor["PROPERTIES"]["BENEFITS_SLIDER_CLASS_CARDS"]["VALUE"])) {
        $params["BENEFITS_SLIDER_CLASS_CARDS"] = $anchor["PROPERTIES"]["BENEFITS_SLIDER_CLASS_CARDS"]["VALUE"];
    }

    if (!empty($anchor["PROPERTIES"]["SHORT_INFO_CLASS_BLOCK"]["VALUE"])) {
        $params["SHORT_INFO_CLASS_BLOCK"] = $anchor["PROPERTIES"]["SHORT_INFO_CLASS_BLOCK"]["VALUE"];
    }

    if (!empty($anchor["PROPERTIES"]["SHORT_INFO_CLASS_LINE"]["VALUE"])) {
        $params["SHORT_INFO_CLASS_LINE"] = $anchor["PROPERTIES"]["SHORT_INFO_CLASS_LINE"]["VALUE"];
    }

    $arResult["BLOCKS"][] = [
        "TITLE" => $anchor["NAME"],
        "CODE" => $anchor["CODE"],
        "TEXT" => $anchor["~PREVIEW_TEXT"],
        "CLASS_BLOCK" => $anchor["PROPERTIES"]["CLASS_BLOCK"]["VALUE"],
        "IMG_PATH" => $anchor["PROPERTIES"]["PATH_IMG_BLOCK"]["VALUE"],
        "~DETAIL_TEXT" => $anchor["~DETAIL_TEXT"],
        "DISPLAY_PROPERTIES" => $anchor["DISPLAY_PROPERTIES"],
        "PARAMS" => $params
    ];
}

unset($anchor);
