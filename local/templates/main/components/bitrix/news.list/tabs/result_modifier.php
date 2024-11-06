<?php
require_once __DIR__ . '/functions.php';

foreach ($arResult['ITEMS'] as &$tab) {
    if (!empty($tab['DISPLAY_PROPERTIES'])) {

        foreach ($tab['DISPLAY_PROPERTIES'] as &$property) {
            if ($property['PROPERTY_TYPE'] == 'E' && !empty($property['LINK_ELEMENT_VALUE'])) {

                $elements = \Bitrix\Iblock\ElementTable::GetList([
                    'select' => ['ID', 'PREVIEW_TEXT', 'DETAIL_TEXT'],
                    'filter' => [
                        'IBLOCK_ID' => $property['LINK_IBLOCK_ID'],
                        'ID' => $property['VALUE']
                    ],
                ])->fetchAll();

                foreach ($elements as $element) {
                    $property['LINK_ELEMENT_VALUE'][$element['ID']]['PREVIEW_TEXT'] = $element['PREVIEW_TEXT'];
                    $property['LINK_ELEMENT_VALUE'][$element['ID']]['DETAIL_TEXT'] = $element['DETAIL_TEXT'];
                }
            }

            if ($property['PROPERTY_TYPE'] == 'G' && !empty($property['LINK_SECTION_VALUE'])) {

                $filter = [
                    'IBLOCK_ID' => $property['LINK_IBLOCK_ID'],
                    'IBLOCK_SECTION_ID' => $property['VALUE']
                ];

                $sections = \Bitrix\Iblock\SectionTable::GetList([
                    'select' => ['ID', 'NAME', 'DESCRIPTION'],
                    'filter' => ['IBLOCK_ID' => $property['LINK_IBLOCK_ID'], 'ID' => $property['VALUE']],
                ])->fetchAll();

                $elements = \Bitrix\Iblock\ElementTable::GetList([
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
                }

                foreach ($elementsWithProps as $element) {
                    $property['LINK_SECTION_VALUE'][$element['IBLOCK_SECTION_ID']]['ELEMENTS'][$element['ID']] = $element;
                }
            }
        }
    }
}
