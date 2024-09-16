<?php
/** @var array $arParams */
/** @var array $arResult */

foreach($arResult['SECTIONS'] as &$section) {
    $section['UF_ICON'] = CFile::GetPath($section['UF_ICON']);

    $previewConditions = json_decode($section['~UF_SHORT_CONDITIONS'], true);
    $displayValue = [];

    foreach($previewConditions['blocks'] as $condition) {
        if(isRestructuringConditionDataEmpty($condition)) continue;
        $displayValue[] = [
            'CONDITION_NAME' => $condition['condition_name'],
            'SMALL_TEXT' => $condition['small_text'],
            'MAIN_TEXT' => $condition['main_text'],
        ];
    }
    $section['UF_SHORT_CONDITIONS'] = $displayValue;
}

function isRestructuringConditionDataEmpty(array $condition) : bool {
    return $condition['small_text'] == '' && $condition['main_text'] == '' && $condition['condition_name'] == '';
}
