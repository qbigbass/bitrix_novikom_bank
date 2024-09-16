<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arResult */

$previewConditions = json_decode($arResult['DISPLAY_PROPERTIES']['DETAIL_SHORT_CONDITIONS']['~VALUE'], true);
$displayValue = [];

foreach($previewConditions['blocks'] as $condition) {
    if(isConditionDataEmpty($condition)) continue;
    $displayValue[] = [
        'CONDITION_NAME' => $condition['condition_name'],
        'SMALL_TEXT' => $condition['small_text'],
        'MAIN_TEXT' => $condition['main_text'],
    ];
}

$arResult['DISPLAY_PROPERTIES']['DETAIL_SHORT_CONDITIONS']['DISPLAY_VALUE'] = $displayValue;

function isConditionDataEmpty(array $condition) : bool {
    return $condition['small_text'] == '' && $condition['main_text'] == '' && $condition['condition_name'] == '';
}

$cp = $this->__component;

if (is_object($cp)) {
    $cp->arResult['DETAIL_SHORT_CONDITIONS'] = $arResult['DISPLAY_PROPERTIES']['DETAIL_SHORT_CONDITIONS']['DISPLAY_VALUE'];
    $cp->arResult['NAME'] = $arResult['NAME'];
    $cp->arResult['DETAIL_TEXT'] = $arResult['DETAIL_TEXT'];
    $cp->arResult['IS_BUTTON_SHOW'] = $arResult['DISPLAY_PROPERTIES']['IS_BUTTON_SHOW']['VALUE'];
    $cp->arResult['ICON_SRC'] = $arResult['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'];
    $cp->SetResultCacheKeys(['DETAIL_SHORT_CONDITIONS','NAME', 'DETAIL_TEXT', 'IS_BUTTON_SHOW', 'ICON_SRC']);
}
