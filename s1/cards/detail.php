<?php

use Bitrix\Iblock\Component\Tools;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Банковские карты');

$arPathUrl = array_filter(explode("/", $APPLICATION->GetCurPage()));
$cntSectionsPath = count($arPathUrl);

if ($cntSectionsPath === 3) {
    $iblockId = iblock('cards_detail_pages_ru');
    $parentSection = $arPathUrl[2];
    $currentSection = $arPathUrl[3];

    $filter = [
        'IBLOCK_ID' => $iblockId,
        'ACTIVE' => 'Y',
    ];

    $section = SectionTable::getList([
        'filter' => [
            'IBLOCK_ID' => $iblockId,
            'PARENT_SECTION.CODE' => $parentSection,
            'CODE' => $currentSection,
        ],
        'select' => [
            'ID'
        ]
    ])->fetch();

    if (!empty($section['ID'])) {
        $element = ElementTable::getList([
            'filter' => ['IBLOCK_SECTION.ID' => $section['ID']],
            'select' => ['ID','IBLOCK_ID'],
            'order' => ['SORT' => 'ASC'],
            'limit' => 1
        ])->fetch();

        if (empty($element)) {
            Tools::process404('Элемент не найден', true, true, true);
            die();
        }

        include_once 'detail_component.php';
    }
} else {
    Tools::process404('Элемент не найден', true, true, true);
    die();
}
?>
<? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale_detail.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news_detail.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_special_offers_detail.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts_detail.php'); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
