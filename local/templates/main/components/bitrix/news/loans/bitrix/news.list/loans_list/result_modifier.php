<?php
/** @var array $arResult */

foreach ($arResult['ITEMS'] as &$loan) {
    $previewConditions = json_decode($loan['DISPLAY_PROPERTIES']['PREVIEW_SHORT_CONDITIONS']['~VALUE'], true);
    $displayValue = [];

    foreach($previewConditions['blocks'] as $condition) {
        if(isConditionDataEmpty($condition)) continue;
        $displayValue[] = [
            'CONDITION_NAME' => $condition['condition_name'],
            'SMALL_TEXT' => $condition['small_text'],
            'MAIN_TEXT' => $condition['main_text'],
        ];
    }

    $loan['DISPLAY_PROPERTIES']['PREVIEW_SHORT_CONDITIONS']['DISPLAY_VALUE'] = $displayValue;
}

function isConditionDataEmpty(array $condition) : bool {
    return $condition['small_text'] == '' && $condition['main_text'] == '' && $condition['condition_name'] == '';
}
