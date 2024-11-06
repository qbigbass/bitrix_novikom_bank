<?php
$entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($arResult['ID']);

foreach($arResult['ITEMS'] as &$item) {
    $rsSection = $entity::getList(array(
        "filter" => array(
            "ID" => $item['IBLOCK_SECTION_ID'],
        ),
        "select" => array("UF_TAG"),
    ))->fetch();
    $item["SECTION_TAG"] = $rsSection['UF_TAG'];
}
unset($item);