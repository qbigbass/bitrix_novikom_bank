<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;

use Dalee\Helpers\IblockHelper;

$APPLICATION->SetTitle('Частным клиентам - Главная НОВИКОМБАНК');
?>
<?
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider_spreader_page",
    [
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => [
            "ID",
            "NAME",
            "PREVIEW_TEXT",
            "DETAIL_PICTURE"
        ],
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => iblock("main_banners"),
        "IBLOCK_TYPE" => "additional",
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
        "PARENT_SECTION_CODE" => "private-clients",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => ["BUTTON_LINK", "BUTTON_TEXT", "FILE_VIDEO"],
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    ]
); ?>

<?$APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale.php',
    [
        'HEADER_TEXT' => 'Предложения банка Новиком',
    ]
);?>

<section class="section-layout bank-service-layout">
    <div class="container">
        <div class="bank-service-layout__wrapper">
            <div class="bank-service-layout__services">
                <div class="swiper js-slider-cards"
                     data-slides-per-view="mobile-s:1,mobile:1,tablet:3,laptop:3,laptop-x:3"
                     data-space-between="mobile-s:8,mobile:8,tablet:8,laptop:8,laptop-x:8">
                    <div class="swiper-wrapper js-swiper-wrapper">
                        <div class="swiper-slide js-swiper-slide">
                            <a class="card-service" href="/services/internet-bank-i-mobilnoe-prilozhenie/">
                                <div class="card-service__content d-flex flex-column">
                                    <h4 class="dark-100">Интернет-банк</h4>
                                    <span class="icon card-service__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-a-web-bank"></use>
                                        </svg>
                                    </span>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-sm-top">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                            media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                            media="(max-width: 1199px)">
                                    <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern"
                                         loading="lazy">
                                </picture>
                            </a>
                        </div>
                        <div class="swiper-slide js-swiper-slide">
                            <a class="card-service" href="/loans/">
                                <div class="card-service__content d-flex flex-column">
                                    <h4 class="dark-100">Кредиты</h4>
                                    <span class="icon card-service__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-a-money"></use>
                                        </svg>
                                    </span>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-sm-top">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                            media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                            media="(max-width: 1199px)">
                                    <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern"
                                         loading="lazy">
                                </picture>
                            </a>
                        </div>
                        <div class="swiper-slide js-swiper-slide">
                            <a class="card-service" href="/mortgage/">
                                <div class="card-service__content d-flex flex-column">
                                    <h4 class="dark-100">Ипотека</h4>
                                    <span class="icon card-service__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-a-house"></use>
                                        </svg>
                                    </span>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-sm-top">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                            media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                            media="(max-width: 1199px)">
                                    <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern"
                                         loading="lazy">
                                </picture>
                            </a>
                        </div>
                    </div>
                    <div class="slider-controls js-swiper-controls mt-3 mt-md-0">
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
            <div class="bank-service-layout__salary">
                <div class="card-service-salary">
                    <div class="card-service-salary__content">
                        <h3>Зарплатная карта</h3>
                        <div class="d-flex flex-wrap column-gap-6 row-gap-4 column-gap-md-7"><a
                                class="btn btn-link btn-lg-lg text-info btn-icon" href="#">Кешбэк
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                </svg>
                            </a><a class="btn btn-link btn-lg-lg text-info btn-icon" href="#">Бонусы
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                </svg>
                            </a><a class="btn btn-link btn-lg-lg text-info btn-icon" href="#">Акции
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                </svg>
                            </a></div>
                    </div>
                    <picture class="pattern-bg">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-s.svg" media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-m.svg"
                                media="(max-width: 1199px)">
                        <img src="/frontend/dist/img/patterns/card/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                    <picture class="pattern-bg card-service-salary__desktop-pattern">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-s.svg" media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-m.svg"
                                media="(max-width: 1199px)">
                        <img src="/frontend/dist/img/patterns/card/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                </div>
            </div>
            <div class="bank-service-layout__app">
                <? $APPLICATION->IncludeFile('/local/php_interface/include/mobile_app_block.php'); ?>
            </div>
        </div>
    </div>
</section>
<section class="section-layout section-layout--bg-gray section-calculator">
    <div class="container">
        <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none"
           data-bs-toggle="collapse" href="#calculator" role="button" aria-expanded="false"
           aria-controls="calculator">Рассчитайте выгоду
            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
            </svg>
        </a>
        <div class="collapse show section-calculator__wrapper" id="calculator">
            <div
                class="section-calculator__header d-flex flex-md-column flex-lg-row gap-md-6 align-items-lg-end py-4 p-md-0 mb-md-6 mb-lg-7 justify-content-lg-between ps-lg-6">
                <h3 class="d-none d-md-inline">Рассчитайте выгоду</h3>
                <div class="tabs-panel js-tabs-slider overflow-hidden position-relative">
                    <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                        <span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                            <span class="icon size-s">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                  <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                            </span>
                        </span>
                        <span class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                            <span class="icon size-s">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                  <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </div>
                    <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                            <a class="tabs-panel__list-item-link nav-link bg-transparent" href="#loan" data-bs-toggle="tab" data-bs-target="#loan" role="tab" aria-controls="loan" aria-selected="false">Кредит</a>
                        </li>
                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                            <a class="tabs-panel__list-item-link nav-link bg-transparent active" href="#mortgage" data-bs-toggle="tab" data-bs-target="#mortgage" role="tab" aria-controls="mortgage" aria-selected="true">Ипотека</a>
                        </li>
                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                            <a class="tabs-panel__list-item-link nav-link bg-transparent" href="#deposit" data-bs-toggle="tab" data-bs-target="#deposit" role="tab" aria-controls="deposit" aria-selected="false">Вклад</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content ps-lg-6">
                <div class="tab-pane fade show active" id="loan" role="tabpanel" aria-labelledby="loan" tabindex="0">
                    <? $APPLICATION->IncludeComponent(
                        "dalee:calculator",
                        "loans",
                        array(
                            "CALCULATOR_ELEMENT_ID" => ""
                        )
                    ); ?>
                </div>
                <div class="tab-pane fade" id="mortgage" role="tabpanel" aria-labelledby="mortgage" tabindex="0">
                    <? $APPLICATION->IncludeComponent(
                        "dalee:calculator",
                        "mortgage",
                        array(
                            "CALCULATOR_ELEMENT_ID" => ""
                        )
                    ); ?>
                </div>
                <div class="tab-pane fade" id="deposit" role="tabpanel" aria-labelledby="deposit" tabindex="0">
                    <? $APPLICATION->IncludeComponent(
                        "dalee:calculator",
                        "deposits_index",
                        array(
                            "CALCULATOR_ELEMENT_ID" => ""
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_tabs.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_special_offers.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_ads_customers.php',
    [
        'CLASS_COLOR_BG' => 'bg-dark-0',
    ]
); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news.php',
    [
        'CLASS_SECTION' => 'pt-0',
    ]
); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/request_call.php'); ?>

<section class="section-layout section-currency-exchange">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "dalee:calculator",
            "currencies",
            [
                "CALCULATOR_ELEMENT_ID" => ""
            ]
        ); ?>
    </div>
</section>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
