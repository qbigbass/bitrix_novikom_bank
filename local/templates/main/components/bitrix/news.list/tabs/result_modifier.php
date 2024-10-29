<?php

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
        }
    }
}
