<?php
use Bitrix\Main\Context;

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle("Вопросы и ответы");
$sef = '/support/questions_and_answers/';

$request = Context::getCurrent()->getRequest();
$section = $request->getQuery('path');
$path = $APPLICATION->GetCurPage();
$element = basename($path);

if ($path != $sef) {
    $filter = [
        'IBLOCK_ID' => iblock('qa'),
        'ACTIVE' => 'Y',
        'CODE' => $element
    ];

    $sections = \Bitrix\Iblock\SectionTable::getList([
        'filter' => $filter
    ])->fetchAll();

    if (empty($sections)) {
        $filter['CODE'] = $section;
        $sections = \Bitrix\Iblock\SectionTable::getList([
            'filter' => $filter
        ])->fetchAll();

        if (!empty($sections)) {
            $url = str_replace($element . '/', '', $path);
            LocalRedirect($url);
        } else {
            if (!empty($section)) {
                LocalRedirect($sef);
            }
        }
    }
}
?>
<?
$APPLICATION->IncludeComponent(
    "bitrix:news",
    "questions_and_answers",
    [
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_FIELD_CODE" => [
            "NAME",
            "PREVIEW_TEXT",
            "DETAIL_PICTURE",
            "PREVIEW_PICTURE",
        ],
        "DETAIL_PAGER_SHOW_ALL" => "Y",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PROPERTY_CODE" => [
            "DATE",
            "TYPE_AD"
        ],
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FILE_404" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => iblock("qa"),
        "IBLOCK_TYPE" => "support",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => [
            'NAME',
            'PREVIEW_TEXT',
            'PREVIEW_PICTURE',
            'DETAIL_PICTURE',
        ],
        "LIST_PROPERTY_CODE" => [],
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "NEWS_COUNT" => "40",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "products_services",
        "PAGER_TITLE" => "Новости",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SEF_FOLDER" => $sef,
        "SEF_MODE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "SORT_BY1" => "PROPERTY_FIX_AD",
        "SORT_BY2" => "PROPERTY_DATE",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "DESC",
        "STRICT_SECTION_CHECK" => "Y",
        "USE_CATEGORIES" => "N",
        "USE_FILTER" => "Y",
        "FILTER_NAME" => "arrQuestionFilter",
        "FILTER_FIELD_CODE" => [],
        "FILTER_PROPERTY_CODE" => ["TYPE_Q"],
        "USE_PERMISSIONS" => "N",
        "USE_RATING" => "N",
        "USE_RSS" => "N",
        "USE_SEARCH" => "N",
        "USE_SHARE" => "N",
        "COMPONENT_TEMPLATE" => "questions_and_answers",
        "SEF_URL_TEMPLATES" => [
            "news" => "",
            "section" => "#SECTION_CODE_PATH#/",
            "detail" => "",
        ],
    ],
    false
);
?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/request_call.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts.php'); ?>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
