<?php

use Bitrix\Main\Application;
use Bitrix\Main\Entity\ExpressionField;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arParams */
/** @var array $arResult */

// получение данных для вывода детальной информации
$arrElementsForCardInfo = json_decode($arResult['PROPERTIES']['DETAIL_CARD']['~VALUE'], true)['blocks'][0]['element_ids'];
$arResult['iblockInnerCardInfo'] = $iblockInnerCardInfoId = iblock('inner_card_info');
$elementEntity = \Bitrix\Iblock\Iblock::wakeUp($iblockInnerCardInfoId)->getEntityDataClass();
$advantagesItems = [];

// запрос на получение прикрепленных элементов для блока Преиммущества
$generalPageElementsQuery = $elementEntity::query()
    ->setSelect([
        'ID', 'NAME', 'CODE',
        'ADVANTAGES_ELEMENT_ID' => 'ADVANTAGES.ELEMENT.ID',
        'ADVANTAGES_ELEMENT_NAME' => 'ADVANTAGES.ELEMENT.NAME',
        'ADVANTAGES_ELEMENT_CODE' => 'ADVANTAGES.ELEMENT.CODE',
        'ADVANTAGES_ELEMENT_DESCRIPTION' => 'ADVANTAGES.ELEMENT.PREVIEW_TEXT',
        new ExpressionField('ADVANTAGES_ELEMENT_IMG_PATH','CONCAT("/upload/", %s,"/",%s)', ['ADVANTAGES.ELEMENT.SVG_FILE.FILE.SUBDIR', 'ADVANTAGES.ELEMENT.SVG_FILE.FILE.FILE_NAME']),
    ])
    ->setFilter(['ID' => $arrElementsForCardInfo])
    ->setOrder(['ADVANTAGES_ELEMENT_ID' => 'DESC'])
    ->setCacheTtl(7200)
    ->exec()->fetchAll();

foreach ($generalPageElementsQuery as $item) {
    $advantagesItems[] = [
        'ID' => $item['ADVANTAGES_ELEMENT_ID'],
        'NAME' => $item['ADVANTAGES_ELEMENT_NAME'],
        'CODE' => $item['ADVANTAGES_ELEMENT_CODE'],
        'DESCRIPTION' => $item['ADVANTAGES_ELEMENT_DESCRIPTION'],
        'IMG_PATH' => $item['ADVANTAGES_ELEMENT_IMG_PATH'],
    ];
}

$arResult['advantagesItems'] = $advantagesItems;
