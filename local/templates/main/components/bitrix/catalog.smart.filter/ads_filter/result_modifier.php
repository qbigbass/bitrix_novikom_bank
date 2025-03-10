<?php
/** @var array $arResult */

$newItems = [];
foreach ($arResult["ITEMS"] as $arItem) {
    $newItems[$arItem['CODE']] = $arItem;
}

$arResult["ITEMS"] = $newItems;
