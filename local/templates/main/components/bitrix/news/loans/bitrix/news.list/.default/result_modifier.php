<?php
foreach ($arResult['ITEMS'] as $key => $loan) {

    $terms = [];
    $listTermsProperty = $loan['PROPERTIES']['LIST_TERMS'];

    if ($listTermsProperty['VALUE']) {
        $terms = array_map(function($fields) use ($listTermsProperty) {
            return array_combine(
                $listTermsProperty['USER_TYPE_SETTINGS']['DESCR'],
                $fields
            );
        }, $listTermsProperty['VALUE']);
    }

    $arResult['ITEMS'][$key]['PROPERTIES']['LIST_TERMS']['VALUE_FORMATTED'] = $terms;
}
