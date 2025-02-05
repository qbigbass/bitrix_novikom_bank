<?php
require_once __DIR__ . '/functions.php';

use Bitrix\Iblock\Iblock as BitrixIblock;

$informationIds = [];

if (!empty($arResult['PROPERTIES']['INFORMATION_LIST']['VALUE'])) {
    $informationIds = $arResult['PROPERTIES']['INFORMATION_LIST']['VALUE'];
}

if (!empty($informationIds)) {
    $block = iblock('information');
    $class = BitrixIblock::wakeUp($block)->getEntityDataClass();
    $elements = $class::getList([
        "select" => ["ID", "NAME", "PREVIEW_TEXT"],
        "filter" => ["ACTIVE" => "Y", "ID" => $informationIds],
    ])->fetchCollection();

    if (!empty($elements)) {
        foreach ($elements as $element) {
            $id = $element->getId();
            $name = $element->getName();
            $text = $element->getPreviewText();
            $arResult["INFORMATION_LIST"][$id] = [
                "TITLE" => $name,
                "TEXT" => $text
            ];
        }
    }
}
