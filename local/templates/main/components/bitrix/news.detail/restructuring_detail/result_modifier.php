<?php
/** @var array $arResult */

if (!empty($arResult['PROPERTIES']['STEPS_NEW']['VALUE'])) {
    $stepsResource = CIBlockElement::GetList(
        [
            'ID' => $arResult['PROPERTIES']['STEPS_NEW']['VALUE']
        ],
        [
            'IBLOCK_ID' => iblock('steps'),
            'ID' => $arResult['PROPERTIES']['STEPS_NEW']['VALUE']
        ],
        false,
        [],
        [
            'ID', 'NAME',
        ]
    );
    while ($step = $stepsResource->GetNextElement()) {
        echo "<pre>";
        var_dump($step->GetProperties());
        //var_dump($step->GetFields());
        //var_dump($step->GetProperties());
        echo "</pre>";
    }
}
