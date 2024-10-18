<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
global $APPLICATION;

$APPLICATION->SetTitle('Частным клиентам - Главная НОВИКОМБАНК');
?>
<div class="banner-hero">
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "main_slider",
        Array(
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
            "IBLOCK_ID" => "115",
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
            "PROPERTY_CODE" => array("BUTTON_LINK", "BUTTON_TEXT", "TEXT", ""),
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
            "STRICT_SECTION_CHECK" => "N"
        )
    );?>
</div>

<?$APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block.php', ['HEADER_TEXT' => 'Предложения банка Новиком']);?>

<section class="section-layout bank-service-layout">
    <div class="container">
        <div class="bank-service-layout__wrapper">
            <div class="bank-service-layout__services">
                <div class="swiper js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:3,laptop:3,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:8,laptop:8,laptop-x:8">
                    <div class="swiper-wrapper js-swiper-wrapper">
                        <div class="swiper-slide js-swiper-slide"><a class="card-service" href="#">
                                <div class="card-service__content d-flex flex-column">
                                    <h4 class="dark-100">Интернет-банк</h4><span class="icon card-service__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-a-web-bank"></use>
                            </svg></span>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-sm-top">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                                </picture></a>
                        </div>
                        <div class="swiper-slide js-swiper-slide"><a class="card-service" href="#">
                                <div class="card-service__content d-flex flex-column">
                                    <h4 class="dark-100">Кредиты</h4><span class="icon card-service__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-a-money"></use>
                            </svg></span>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-sm-top">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                                </picture></a>
                        </div>
                        <div class="swiper-slide js-swiper-slide"><a class="card-service" href="#">
                                <div class="card-service__content d-flex flex-column">
                                    <h4 class="dark-100">Ипотека</h4><span class="icon card-service__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-a-house"></use>
                            </svg></span>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-sm-top">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                                </picture></a>
                        </div>
                    </div>
                    <div class="slider-controls js-swiper-controls mt-3 mt-md-0">
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
            <div class="bank-service-layout__salary">
                <div class="card-service-salary">
                    <div class="card-service-salary__content">
                        <h3>Зарплатная карта</h3>
                        <div class="d-flex flex-wrap column-gap-6 row-gap-4 column-gap-md-7"><a class="btn btn-link btn-lg-lg text-info btn-icon" href="#">Кешбэк
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                </svg></a><a class="btn btn-link btn-lg-lg text-info btn-icon" href="#">Бонусы
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                </svg></a><a class="btn btn-link btn-lg-lg text-info btn-icon" href="#">Акции
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                </svg></a></div>
                    </div>
                    <picture class="pattern-bg">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-s.svg" media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                    <picture class="pattern-bg card-service-salary__desktop-pattern">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-s.svg" media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                </div>
            </div>
            <div class="bank-service-layout__app">
                <div class="card-service-app">
                    <div class="card-service-app__content">
                        <h3>Мобильное приложение</h3>
                        <div class="row row-gap-3">
                            <div class="col-12 col-lg-3">
                                <div class="d-flex align-items-center gap-3">
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mobile"></use>
                                    </svg><span class="fw-semibold text-s">Управление кешбэком и&nbsp;бонусами</span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="d-flex align-items-center gap-3">
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-time"></use>
                                    </svg><span class="fw-semibold text-s">Доступ к&nbsp;услугам банка 24/7</span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="d-flex align-items-center gap-3">
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-cash"></use>
                                    </svg><span class="fw-semibold text-s">Платежи и&nbsp;переводы без комиссии</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-3"><a class="btn btn-info d-none d-md-inline-flex align-items-center" href="#"><img src="/frontend/dist/img/app-logos/ru-store.svg" width="94" height="24" alt="RuStore" loading="lazy"></a><a class="btn btn-info d-none d-md-inline-flex align-items-center" href="#"><img src="/frontend/dist/img/app-logos/ru-market.svg" width="120" height="28" alt="RuMarket" loading="lazy"></a><a class="btn btn-info d-none d-md-inline-flex align-items-center" href="#"><img src="/frontend/dist/img/app-logos/nash-store.svg" width="112" height="18" alt="NashStore" loading="lazy"></a><a class="btn btn-info btn-icon d-none d-md-inline-flex" href="#">Скачать
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download"></use>
                                </svg></a><a class="btn btn-sm btn-info btn-icon d-md-none" href="#">Скачать
                                <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                </svg></a>
                        </div>
                    </div>
                    <picture class="pattern-bg pattern-bg--position-sm-top">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-s.svg" media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-dark-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-layout section-layout--bg-gray section-calculator">
    <div class="container"><a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#calculator" role="button" aria-expanded="false" aria-controls="calculator">Рассчитайте выгоду
            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
            </svg></a>
        <div class="collapse show section-calculator__wrapper" id="calculator">
            <div class="section-calculator__header d-flex flex-md-column flex-lg-row gap-md-6 align-items-lg-end py-4 p-md-0 mb-md-6 mb-lg-7 justify-content-lg-between ps-lg-6">
                <h3 class="d-none d-md-inline">Рассчитайте выгоду</h3>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#loan" type="button" role="tab" aria-controls="loan" aria-selected>Кредит</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#mortgage" type="button" role="tab" aria-controls="mortgage">Ипотека</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit">Вклад</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="ps-lg-6" id="loan">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="d-none d-lg-inline-flex">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#loan-consumer" type="button" role="tab" aria-controls="loan-consumer" aria-selected>Потребительский кредит</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#refinance" type="button" role="tab" aria-controls="refinance">Рефинансирование</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-lg-none">
                                <select class="form-select form-select--size-small js-select">
                                    <option selected value="loan">Потребительский кредит</option>
                                    <option value="refinance">Рефинансирование</option>
                                </select>
                            </div>
                            <div class="tab-content pt-4 pt-md-6 pt-lg-7 pe-xl-6">
                                <div class="tab-pane fade show active" id="loan-consumer" role="tabpanel" aria-labelledby="loan" tabindex="0">
                                    <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7">
                                        <div class="input-slider js-input-slider" data-type="price" data-start-value="1000000" data-max-value="5000000" data-min-value="20000" data-step-size="5000">
                                            <label class="text-s dark-70 ps-3 mb-2" for="amount-credit">Сумма кредита</label>
                                            <div class="input-slider-text js-input-slider-text">
                                                <input class="input-slider-text__input h4 js-input-slider-text-input">
                                                <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                                                    <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                                                    </svg>
                                                </button>
                                                <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                                                    <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="input-slider__inner js-input-slider-inner">
                                                <input class="input-slider__item js-input-slider-input" id="amount-credit" type="range" step="1" min="0" max="1" value="0">
                                            </div>
                                            <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                                        </div>
                                        <div class="input-slider js-input-slider" data-type="month" data-start-value="36" data-max-value="60" data-min-value="6">
                                            <label class="text-s dark-70 ps-3 mb-2" for="payment-term">Срок выплаты</label>
                                            <div class="input-slider-text js-input-slider-text">
                                                <input class="input-slider-text__input h4 js-input-slider-text-input">
                                                <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                                                    <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                                                    </svg>
                                                </button>
                                                <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                                                    <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="input-slider__inner js-input-slider-inner">
                                                <input class="input-slider__item js-input-slider-input" id="payment-term" type="range" step="1" min="0" max="1" value="0">
                                            </div>
                                            <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                                        </div>
                                        <div class="d-flex flex-column row-gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" id="inp1" type="checkbox" value="" checked>
                                                <label class="form-check-label" for="inp1"><a href="#">Получаю зарплату на&nbsp;карту Новиком</a></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" id="inp2" type="checkbox" value="">
                                                <label class="form-check-label" for="inp2">Страхование</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="refinance" role="tabpanel" aria-labelledby="refinance" tabindex="0">
                                    <p>refinance</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-4 mt-md-6 mt-lg-0">
                            <div class="ps-xxl-6">
                                <div class="polygon-container js-polygon-container">
                                    <div class="polygon-container__content">
                                        <div class="card-calculate-result bg-dark-0">
                                            <div class="card-calculate-result__body">
                                                <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Процентная ставка</span><span class="text-number-ml fw-bold text-nowrap">16,5%</span>
                                                </div>
                                                <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Ежемесячный платеж</span>
                                                    <div class="d-flex flex-column flex-md-row justify-content-md-between flex-wrap align-items-md-end"><span class="text-number-ml fw-bold text-nowrap">35 404,38&nbsp;<span class="currency">₽</span></span>
                                                        <button class="btn btn-link btn-sm btn-icon mt-2 mt-md-0" type="button"><span>График платежей</span>
                                                            <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Необходимый ежемесячный доход, от</span><span class="text-number-ml fw-bold text-nowrap">35 404,38&nbsp;<span class="currency">₽</span></span>
                                                </div>
                                                <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Диапазон полной стоимости кредита</span><span class="text-number-ml fw-bold text-nowrap">16,464 – 20,474 %</span>
                                                </div>
                                            </div>
                                            <div class="card-calculate-result__footer">
                                                <button class="btn btn-primary btn-lg-lg w-100" type="button">Оформить заявку</button>
                                                <p class="dark-70 caption-m">Калькулятор не&nbsp;гарантирует точность расчетов. Окончательные параметры кредита определяются по&nbsp;итогам рассмотрения заявки.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-layout">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xxl-6 d-flex flex-column gap-6 gap-lg-7"><a class="h3 d-flex align-items-center ps-lg-6 pt-xxl-6" href="#"><span>
          Объявления
          <span class="d-none d-md-inline">для клиентов</span></span><span class="icon size-m violet-100 ms-auto ms-md-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
              </svg></span></a>
                <div class="ps-lg-6 mt-xxl-auto mw-100">
                    <div class="swiper js-announcement-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide js-announcement-slide"><a class="announcement" href="#" tabIndex="-1"><span class="dark-70">25.04.2024</span><span class="dark-100">Технические работы 30 апреля 2024 года в период с 0:00 до 3:30 (МСК)</span><span class="icon size-m d-none d-md-inline-block ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                            </svg></span></a>
                            </div>
                            <div class="swiper-slide js-announcement-slide"><a class="announcement" href="#" tabIndex="-1"><span class="dark-70">25.04.2024</span><span class="dark-100">Режим работы клиентских офисов в мае</span><span class="icon size-m d-none d-md-inline-block ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                            </svg></span></a>
                            </div>
                            <div class="swiper-slide js-announcement-slide"><a class="announcement" href="#" tabIndex="-1"><span class="dark-70">25.04.2024</span><span class="dark-100">Технические работы 30 апреля 2024 года в период с 0:00 до 3:30 (МСК)</span><span class="icon size-m d-none d-md-inline-block ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                            </svg></span></a>
                            </div>
                            <div class="swiper-slide js-announcement-slide"><a class="announcement" href="#" tabIndex="-1"><span class="dark-70">25.04.2024</span><span class="dark-100">Режим работы клиентских офисов в мае</span><span class="icon size-m d-none d-md-inline-block ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                            </svg></span></a>
                            </div>
                            <div class="swiper-slide js-announcement-slide"><a class="announcement" href="#" tabIndex="-1"><span class="dark-70">25.04.2024</span><span class="dark-100">Технические работы 30 апреля 2024 года в период с 0:00 до 3:30 (МСК)</span><span class="icon size-m d-none d-md-inline-block ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                            </svg></span></a>
                            </div>
                            <div class="swiper-slide js-announcement-slide"><a class="announcement" href="#" tabIndex="-1"><span class="dark-70">25.04.2024</span><span class="dark-100">Режим работы клиентских офисов в мае</span><span class="icon size-m d-none d-md-inline-block ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                            </svg></span></a>
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
            </div>
            <div class="col-12 col-xxl-6 mt-6 mt-xxl-0"><a class="card-link h3 d-lg-none" href="#">О банке
                    <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg></a>
                <div class="card-about-bank d-none d-lg-flex">
                    <div class="card-about-bank__col d-flex flex-column gap-6"><a class="h3" href="#">О банке
                            <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg></a>
                        <div class="d-flex flex-column"><span class="violet-100 fw-semibold text-number-m fw-bold">30 лет</span>
                            <p class="card-about-bank__description text-s fw-semibold">успешной работы в&nbsp;реальном секторе российской<br class="d-xxl-none">
                                экономики
                            </p>
                        </div>
                        <div class="d-flex flex-column"><span class="violet-100 fw-semibold text-number-m fw-bold">19,4 млн</span>
                            <p class="card-about-bank__description text-s fw-semibold">рекордная чистая прибыль<br>за&nbsp;2022&nbsp;г</p>
                        </div>
                    </div>
                    <div class="card-about-bank__col d-flex flex-column"><img src="/frontend/dist/img/top.svg" alt="Топ" width="138" height="54" loading="lazy"><img src="/frontend/dist/img/top-20.svg" alt="20" width="138" height="144" loading="lazy">
                        <p class="card-about-bank__description text-s fw-semibold mt-auto">по&nbsp;величине капитала, объему активов<br class="d-xxl-none">
                            и&nbsp;корпоративных кредитов
                        </p>
                    </div>
                    <picture class="pattern-bg card-about-bank__pattern">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-layout pt-0">
    <div class="container">
        <div class="d-flex align-items-end ps-lg-6 mb-4 mb-md-6 mb-lg-7">
            <h3>Новости</h3><a class="violet-100 d-flex align-items-center gap-2 ms-auto" href="#"><span class="d-none d-md-inline text-s fw-semibold">Пресс-центр</span>
                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                </svg></a>
        </div>
        <div class="swiper js-slider-cards slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:8,laptop:8,laptop-x:8">
            <div class="swiper-wrapper js-swiper-wrapper">
                <div class="swiper-slide js-swiper-slide"><a class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span class="tag__content text-s fw-semibold">Пресс-центр</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div><span class="text-s dark-70 my-auto mb-0">07.12.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">Новикомбанк рассказал о развитии финансовых инструментов</span>
                        </div></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span class="tag__content text-s fw-semibold">Пресс-центр</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div><span class="text-s dark-70 my-auto mb-0">06.12.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">Новикомбанк и Республика Татарстан договорились о сотрудничестве</span>
                        </div></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span class="tag__content text-s fw-semibold">Союз машиностроителей</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div><span class="text-s dark-70 my-auto mb-0">27.11.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</span>
                        </div></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span class="tag__content text-s fw-semibold">Пресс-центр</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div><span class="text-s dark-70 my-auto mb-0">20.11.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">Новикомбанк и Республика Татарстан договорились о сотрудничестве</span>
                        </div></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                        <div class="card-special__header d-flex align-items-start justify-content-between">
                            <div class="tag tag--outline"><span class="tag__content text-s fw-semibold">Союз машиностроителей</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div><span class="text-s dark-70 my-auto mb-0">05.11.2023</span>
                        </div>
                        <div class="card-special__body"><span class="dark-100">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</span>
                        </div></a>
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

<?$APPLICATION->IncludeFile('/local/php_interface/include/request_call.php');?>

<section class="section-layout section-currency-exchange">
    <div class="container"><a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#currency-exchange" role="button" aria-expanded="false" aria-controls="currency-exchange">Обмен валют
            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
            </svg></a>
        <div class="section-currency-exchange__wrapper collapse" id="currency-exchange">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="d-flex flex-column flex-lg-row align-items-lg-end mb-4 mb-md-6 mb-lg-7 pt-4 pt-md-0 gap-md-3">
                        <h3 class="d-none d-md-block">Обмен валют</h3>
                        <p class="text-s dark-70 mb-0 ms-lg-auto">Курс банка актуален на&nbsp;14:00 по&nbsp;МСК 30&nbsp;апреля 2024&nbsp;г.</p>
                    </div>
                    <ul class="nav nav-tabs d-md-none" role="tablist">
                        <li class="nav-item flex-grow-1" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#eur" type="button" role="tab" aria-controls="eur" aria-selected>EUR</button>
                        </li>
                        <li class="nav-item flex-grow-1" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#usd" type="button" role="tab" aria-controls="usd">USD</button>
                        </li>
                        <li class="nav-item flex-grow-1" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cny" type="button" role="tab" aria-controls="cny">CNY</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3 d-md-none">
                        <div class="tab-pane fade show active" id="eur" role="tabpanel" aria-labelledby="eur" tabindex="0">
                            <div class="table-currency">
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">Продать, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">94,60</span></div>
                                </div>
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">Купить, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">99,10</span></div>
                                </div>
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">ЦБ РФ, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">97,15</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="usd" role="tabpanel" aria-labelledby="usd" tabindex="0">
                            <div class="table-currency">
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">Продать, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">86,20</span></div>
                                </div>
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">Купить, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">91,50</span></div>
                                </div>
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">ЦБ РФ, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">91,34</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cny" role="tabpanel" aria-labelledby="cny" tabindex="0">
                            <div class="table-currency">
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">Продать, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">12,25</span></div>
                                </div>
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">Купить, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">12,73</span></div>
                                </div>
                                <div class="table-currency__row">
                                    <div class="table-currency__col"><span class="text-s dark-70">ЦБ РФ, RUB</span></div>
                                    <div class="table-currency__col"><span class="text-l dark-100">12,38</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-currency d-none d-md-block">
                        <div class="table-currency__row table-currency__row--header">
                            <div class="table-currency__col"><span class="text-s dark-70">Валюта</span></div>
                            <div class="table-currency__col"><span class="text-s dark-70">Продать, RUB</span></div>
                            <div class="table-currency__col"><span class="text-s dark-70">Купить, RUB</span></div>
                            <div class="table-currency__col"><span class="text-s dark-70">ЦБ РФ, RUB</span></div>
                        </div>
                        <div class="table-currency__row">
                            <div class="table-currency__col"><span class="fw-semibold">Евро — EUR</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">94,60</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">99,10</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">97,15</span></div>
                        </div>
                        <div class="table-currency__row">
                            <div class="table-currency__col"><span class="fw-semibold">Доллар США — USD</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">86,20</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">91,50</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">91,34</span></div>
                        </div>
                        <div class="table-currency__row">
                            <div class="table-currency__col"><span class="fw-semibold">Китайский юань — CNY</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">12,25</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">12,73</span></div>
                            <div class="table-currency__col"><span class="text-l dark-100">12,38</span></div>
                        </div>
                    </div>
                    <p class="dark-70 pt-4 text-s mb-0">Банк оставляет за&nbsp;собой право на&nbsp;изменение курса купли-продажи иностранной валюты.<br>Действующие на&nbsp;момент совершения операций курсы уточняйте в&nbsp;отделениях банка.<br>Список отделений доступен по&nbsp;ссылке.</p>
                    <p class="dark-70 pt-3 text-s mb-0">Покупка и&nbsp;продажа фунтов стерлингов и&nbsp;швейцарских франков осуществляется только в&nbsp;ДО&nbsp;&laquo;Якиманка&raquo;.</p>
                </div>
                <div class="col-12 col-xl-4 mt-4">
                    <div class="d-flex flex-column gap-4 gap-lg-5 gap-xl-4 bg-dark-0 rounded-3 px-3 py-4 p-md-5 px-lg-6 p-xl-6">
                        <h4>Предварительный расчет</h4>
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-12">
                                <label class="form-label" for="have">У вас есть</label>
                                <div class="input-group">
                                    <input class="form-control form-control-lg" id="have" type="text" name="you_have" placeholder="1500">
                                    <div class="input-group__currency">
                                        <select class="form-select js-select" aria-label="Выберите валюту">
                                            <option selected value="RUB">RUB</option>
                                            <option value="USD">USD</option>
                                            <option value="CNY">CNY</option>
                                        </select>
                                    </div>
                                </div><span class="caption-m dark-70 mt-2 d-block">1 RUB = 0,01 USD</span>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12 mt-4 mt-md-0 mt-xl-4">
                                <label class="form-label" for="get">Вы получите</label>
                                <div class="input-group">
                                    <input class="form-control form-control-lg" id="get" type="text" name="you_get" placeholder="9,77">
                                    <div class="input-group__currency">
                                        <select class="form-select js-select" aria-label="Выберите валюту">
                                            <option value="RUB">RUB</option>
                                            <option value="USD" selected>USD</option>
                                            <option value="CNY">CNY</option>
                                        </select>
                                    </div>
                                </div><span class="caption-m dark-70 mt-2 d-block">1 USD = 97 RUB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
