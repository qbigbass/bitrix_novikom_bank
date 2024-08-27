<?php

use Bitrix\Main\Application;
use Bitrix\Main\Entity\ExpressionField;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arParams */
/** @var array $arResult */

$request = Application::getInstance()->getContext()->getRequest()->toArray();

// получение данных для вывода детальной информации
$arrElementsForCardInfo = $arResult["PROPERTY_{$arResult['PROPERTIES']['DETAIL_INFO_CARD']['ID']}"];
$iblockInnerCardInfoId = iblock('inner_card_info');
$elementEntity = \Bitrix\Iblock\Iblock::wakeUp($iblockInnerCardInfoId)->getEntityDataClass();
$generalPage = false;
$generalPageTabs = [];
$advantagesItems = [];

// запрос на получение табов (страниц)
$generalPageTabs = $elementEntity::query()
    ->setSelect(['ID','NAME', 'CODE'])
    ->setFilter(['ID' => $arrElementsForCardInfo])
    ->exec()->fetchAll();

$arResult['generalPageTabs'] = $generalPageTabs;

// проверка для вывода общего контента
if (in_array('obshchaya', array_column($generalPageTabs, 'CODE'))) {
    $generalPage = true;
}
$arResult['generalPage'] = $generalPage;

// запрос на получение прикрепленных элементов для блока Преиммущества
$generalPageElementsQuery = $elementEntity::query();
$generalPageElementsQuery->setSelect([
    'ID', 'NAME', 'CODE',
    'ADVANTAGES_ELEMENT_ID' => 'ADVANTAGES.ELEMENT.ID',
    'ADVANTAGES_ELEMENT_NAME' => 'ADVANTAGES.ELEMENT.NAME',
    'ADVANTAGES_ELEMENT_CODE' => 'ADVANTAGES.ELEMENT.CODE',
    'ADVANTAGES_ELEMENT_DESCRIPTION' => 'ADVANTAGES.ELEMENT.PREVIEW_TEXT',
    new ExpressionField('ADVANTAGES_ELEMENT_IMG_PATH','CONCAT("/upload/", %s,"/",%s)', ['ADVANTAGES.ELEMENT.SVG_FILE.FILE.SUBDIR', 'ADVANTAGES.ELEMENT.SVG_FILE.FILE.FILE_NAME']),

]);

if (!$generalPage) {

    if (isset($request['item'])) {
        $generalPageElementsQuery->setFilter(['ID' => $request['item'] ]);
    } else {
        $generalPageElementsQuery->setFilter(['ID' => $generalPageTabs[0]['ID'] ]);
    }

} elseif ($generalPage) {
    $generalPageElementsQuery->setFilter(['ID' => $generalPageTabs[0]['ID'] ]);
}

$generalPageElementsQuery->setOrder(['ADVANTAGES_ELEMENT_ID' => 'DESC']);
$items = $generalPageElementsQuery->exec()->fetchAll();
foreach ($items as $item) {
    $advantagesItems[] = [
        'ID' => $item['ADVANTAGES_ELEMENT_ID'],
        'NAME' => $item['ADVANTAGES_ELEMENT_NAME'],
        'CODE' => $item['ADVANTAGES_ELEMENT_CODE'],
        'DESCRIPTION' => $item['ADVANTAGES_ELEMENT_DESCRIPTION'],
        'IMG_PATH' => $item['ADVANTAGES_ELEMENT_IMG_PATH'],
    ];
}

$arResult['advantagesItems'] = $advantagesItems;

//$this->__component->setResultCacheKeys(['detailCard', 'NAME']);
