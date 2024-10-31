<?php
use Dalee\Helpers\ComponentHelper;

global $APPLICATION;

if (!empty($arResult['VARIABLES']['ELEMENT_CODE'])) {
    $element = Bitrix\Iblock\ElementTable::getList(['select' => ['NAME'], 'filter' => ['CODE' => $arResult['VARIABLES']['ELEMENT_CODE']]])->Fetch();
    $APPLICATION->setTitle(strip_tags($element['NAME']));
}

ComponentHelper::handle($this);
