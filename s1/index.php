<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;

$APPLICATION->SetTitle('Частным клиентам - Главная НОВИКОМБАНК');
?>
<div class="banner-hero">
    <? $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "main_slider",
        array(
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
            "FIELD_CODE" => array("ID", "NAME", ""),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => iblock('main_slider'),
            "IBLOCK_TYPE" => "for_private_clients_ru",
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
            "PROPERTY_CODE" => array("BUTTON_LINK", "BUTTON_TEXT", "TEXT", "", "FILE_VIDEO"),
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
        )
    ); ?>
</div>

<? $APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block.php', ['HEADER_TEXT' => 'Предложения банка Новиком']); ?>

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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#loan" type="button"
                                role="tab" aria-controls="loan" aria-selected>Кредит
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#mortgage" type="button"
                                role="tab" aria-controls="mortgage">Ипотека
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab"
                                aria-controls="deposit">Вклад
                        </button>
                    </li>
                </ul>
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
                        "deposits",
                        array(
                            "CALCULATOR_ELEMENT_ID" => "474"
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-layout">
    <div class="container">
        <div class="row">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "customer_announcements",
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
                    "DETAIL_URL" => "/support/announcements_for_clients/#SECTION_CODE#/#ELEMENT_CODE#/",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => ["CODE", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", ""],
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => iblock('ads_for_customers_ru'),
                    "IBLOCK_TYPE" => "support",
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
                    "PROPERTY_CODE" => [""],
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
                false,
                ["HIDE_ICONS" => "Y"]
            ); ?>
            <div class="col-12 col-xxl-6 mt-6 mt-xxl-0"><a class="card-link h3 d-lg-none" href="/about/">О банке
                    <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </a>
                <div class="card-about-bank d-none d-lg-flex">
                    <div class="card-about-bank__col d-flex flex-column gap-6"><a class="h3" href="/about/">О банке
                            <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%"
                                 height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </a>
                        <div class="d-flex flex-column"><span class="violet-100 fw-semibold text-number-m fw-bold">30 лет</span>
                            <p class="card-about-bank__description text-s fw-semibold">успешной работы в&nbsp;реальном
                                секторе российской<br class="d-xxl-none">
                                экономики
                            </p>
                        </div>
                        <div class="d-flex flex-column"><span class="violet-100 fw-semibold text-number-m fw-bold">19,4 млн</span>
                            <p class="card-about-bank__description text-s fw-semibold">рекордная чистая прибыль<br>за&nbsp;2022&nbsp;г
                            </p>
                        </div>
                    </div>
                    <div class="card-about-bank__col d-flex flex-column"><img src="/frontend/dist/img/top.svg" alt="Топ"
                                                                              width="138" height="54"
                                                                              loading="lazy"><img
                            src="/frontend/dist/img/top-20.svg" alt="20" width="138" height="144" loading="lazy">
                        <p class="card-about-bank__description text-s fw-semibold mt-auto">по&nbsp;величине капитала,
                            объему активов<br class="d-xxl-none">
                            и&nbsp;корпоративных кредитов
                        </p>
                    </div>
                    <picture class="pattern-bg card-about-bank__pattern">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                media="(max-width: 1199px)">
                        <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-layout pt-0">
    <div class="container">
        <div class="d-flex align-items-end ps-lg-6 mb-4 mb-md-6 mb-lg-7">
            <h3>Новости</h3><a class="violet-100 d-flex align-items-center gap-2 ms-auto" href="/about/press-center/"><span
                    class="d-none d-md-inline text-s fw-semibold">Пресс-центр</span>
                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                </svg>
            </a>
        </div>
        <div class="swiper js-slider-cards slider-cards"
             data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3,laptop-x:3"
             data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
            <div class="swiper-wrapper js-swiper-wrapper">
                <div class="swiper-slide js-swiper-slide"><a
                        class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span
                                    class="tag__content text-s fw-semibold">Пресс-центр</span><span
                                    class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <span class="text-s dark-70 my-auto mb-0">07.12.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">Новикомбанк рассказал о развитии финансовых инструментов</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a
                        class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span
                                    class="tag__content text-s fw-semibold">Пресс-центр</span><span
                                    class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <span class="text-s dark-70 my-auto mb-0">06.12.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">Новикомбанк и Республика Татарстан договорились о сотрудничестве</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a
                        class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span class="tag__content text-s fw-semibold">Союз машиностроителей</span><span
                                    class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <span class="text-s dark-70 my-auto mb-0">27.11.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a
                        class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span
                                    class="tag__content text-s fw-semibold">Пресс-центр</span><span
                                    class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <span class="text-s dark-70 my-auto mb-0">20.11.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">Новикомбанк и Республика Татарстан договорились о сотрудничестве</span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a
                        class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span class="tag__content text-s fw-semibold">Союз машиностроителей</span><span
                                    class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <span class="text-s dark-70 my-auto mb-0">05.11.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="slider-controls js-swiper-controls mt-3 mt-md-4">
                <div class="slider-controls__pagination js-swiper-pagination"></div>
                <div class="slider-controls__navigation js-swiper-nav">
                    <button class="swiper-button-prev js-swiper-prev" type="button"><span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                            </svg></span></button>
                    <button class="swiper-button-next js-swiper-next" type="button"><span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg></span></button>
                </div>
            </div>
        </div>
    </div>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/request_call.php'); ?>

<section class="section-layout section-currency-exchange">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "dalee:calculator",
            "currencies",
            array(
                "CALCULATOR_ELEMENT_ID" => ""
            )
        ); ?>
    </div>
</section>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
