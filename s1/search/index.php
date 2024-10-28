<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @global CMain $APPLICATION
 */
$APPLICATION->SetTitle("Поиск");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:search.page",
    "main",
    [
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DEFAULT_SORT" => "rank",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FILTER_NAME" => "",
        "NO_WORD_LOGIC" => "N",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "main",
        "PAGER_TITLE" => "Результаты поиска",
        "PAGE_RESULT_COUNT" => "5",
        "RESTART" => "N",
        "SHOW_WHEN" => "N",
        "SHOW_WHERE" => "N",
        "USE_LANGUAGE_GUESS" => "Y",
        "USE_SUGGEST" => "N",
        "USE_TITLE_RANK" => "Y",
        "arrFILTER" => ["no"],
        "arrFILTER_iblock_rates" => ["all"],
        "arrWHERE" => []
    ]
);?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
