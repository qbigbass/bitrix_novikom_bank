<?
use Dalee\Helpers\HeaderView;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$headerView = new HeaderView($component);
$helper = $headerView->helper();

$headerView->render(
    $APPLICATION->GetTitle(),
    $APPLICATION->GetProperty("description"),
    ['border-green'],
    1
);
?>

<section class="section-layout py-lg-11 px-lg-6">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <? $APPLICATION->includeFile('/about/purchases/include_text.php'); ?>

                <div class="polygon-container js-polygon-container">
                    <div class="polygon-container__content">
                        <div class="helper bg-dark-10">
                            <div
                                class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                <img class="helper__image w-auto float-end"
                                     src="/frontend/dist/img/restructuring-additional-info.png" alt="Обратите внимание">

                                <? $APPLICATION->includeFile('/about/purchases/include_quote.php'); ?>

                            </div>
                        </div>
                    </div>
                    <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-dasharray="10"></polygon>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-layout bg-dark-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="swiper slider-cards js-slider-cards"
                     data-slides-per-view="mobile-s:1,mobile:1,tablet:2,tablet-album:2,laptop:3,laptop-x:3"
                     data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:16,laptop:16,laptop-x:16">
                    <div class="swiper-wrapper">

                        <? global $tileFilter;
                        $tileFilter = [
                            'ACTIVE' => 'Y',
                            'SECTION_CODE' => 'links'
                        ];

                        $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "links_tile",
                            [
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "CACHE_FILTER" => "Y",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "COL_COUNT" => "2",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
                                "FILTER_NAME" => "tileFilter",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => iblock('purchases_ru'),
                                "IBLOCK_TYPE" => "about_ru",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "N",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "20",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => "Новости",
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "PROPERTY_CODE" => ["",""],
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_BY2" => "SORT",
                                "SORT_ORDER1" => "DESC",
                                "SORT_ORDER2" => "ASC",
                                "STRICT_SECTION_CHECK" => "N",
                            ],
                            $component,
                            ['HIDE_ICONS' => 'Y']
                        ); ?>

                    </div>
                    <div class="slider-controls js-swiper-controls mt-3 mt-md-4">
                        <div class="slider-controls__pagination js-swiper-pagination"></div>
                        <div class="slider-controls__navigation js-swiper-nav">
                            <button class="swiper-button-prev js-swiper-prev" type="button">
                                <span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg>
                                </span>
                            </button>
                            <button class="swiper-button-next js-swiper-next" type="button">
                                <span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-announcement-list section-layout py-lg-11">
    <div class="container d-flex flex-column row-gap-6 row-gap-lg-7">
        <div class="row row-gap-4 row-gap-md-6 row-gap-lg-7 px-lg-6">
            <? $APPLICATION->includeFile('/about/purchases/include_list_text.php'); ?>
        </div>
        <?
        global $purchasesFilter;

        $purchasesFilter = [
            'ACTIVE' => 'Y',
            'SECTION_CODE' => 'purchases'
        ];

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "purchases",
            [
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                "SORT_BY1" => $arParams["SORT_BY1"],
                "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                "SORT_BY2" => $arParams["SORT_BY2"],
                "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                "SET_TITLE" => $arParams["SET_TITLE"],
                "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                "MESSAGE_404" => $arParams["MESSAGE_404"],
                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                "SHOW_404" => $arParams["SHOW_404"],
                "FILE_404" => $arParams["FILE_404"],
                "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                "FILTER_NAME" => 'purchasesFilter',
                "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                "CHECK_DATES" => $arParams["CHECK_DATES"],
                "STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
                "PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
                "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
                "IBLOCK_SECTIONS" => $arResult["IBLOCK_SECTIONS"],
            ],
            $component,
            ['HIDE_ICONS' => 'Y']
        ); ?>
    </div>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale_section.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news_section.php'); ?>

<? $helper->saveCache(); ?>
