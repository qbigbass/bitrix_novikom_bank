<?php

use Bitrix\Iblock\Component\Tools;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION;

$APPLICATION->SetTitle('Устав и документы');
$iblockId = iblock('charter_and_documents_ru');

$classCC = \Bitrix\Iblock\Iblock::wakeUp($iblockId)->getEntityDataClass();

$elementsCC = $classCC::getList([
    "select" => ["ID", "NAME"],
    "filter" => [
        "=ACTIVE" => "Y",
    ],
    "limit" => 1,
    'order' => ['SORT' => 'ASC'],
])->fetchObject();

if ($elementsCC === null) {
    Tools::process404(showPage: true);
}
?>


<?php $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "charter_detail",
    [
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "IBLOCK_TYPE" => "for_corporate_clients_ru",
        "IBLOCK_ID" => $iblockId,
        "FIELD_CODE" => [
            "NAME",
            "PREVIEW_TEXT",
            "DETAIL_PICTURE"
        ],
        "PROPERTY_CODE" => [
            "BENEFITS_TOP",
            "BENEFITS_PAGE",
            "BENEFITS_HEADER",
            "HEADER_TEMPLATE",
            "HEADER_COLOR_CLASS",
            "HEADER_LINE_COLOR_CLASS",
            "BUTTON_DETAIL",
            "BUTTON_TEXT_DETAIL",
            "BUTTON_HREF_DETAIL",
            "BANNER_HEADER",
            "BANNER_TEXT",
            "BANNER_IMG",
        ],
        "META_KEYWORDS" => "-",
        "META_DESCRIPTION" => "-",
        "BROWSER_TITLE" => "-",
        "SET_CANONICAL_URL" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_TITLE" => "Y",
        "MESSAGE_404" => "",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "FILE_404" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "USE_PERMISSIONS" => "N",
        "GROUP_PERMISSIONS" => [],
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Страница",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "",
        "PAGER_SHOW_ALL" => "Y",
        "CHECK_DATES" => "Y",
        "ELEMENT_ID" => $elementsCC->getId(),
        "IBLOCK_URL" => '/about/',
        "USE_SHARE" => "N",
        "SHARE_HIDE" => "",
        "SHARE_TEMPLATE" => "",
        "SHARE_HANDLERS" => "",
        "SHARE_SHORTEN_URL_LOGIN" => "",
        "SHARE_SHORTEN_URL_KEY" => "",
        "ADD_ELEMENT_CHAIN" => "N",
        "STRICT_SECTION_CHECK" => "Y",
    ]
);
?>

<?php $APPLICATION->IncludeFile('/local/php_interface/include/block_tabs.php'); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
