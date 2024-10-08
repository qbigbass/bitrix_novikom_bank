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
<section class="section-layout">
    <div class="container">
        <h3 class="ps-lg-6 mb-6 mb-lg-7">Предложения банка Новиком</h3>
        <!-- type: outline | color-white-->
        <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:40">
            <div class="swiper-wrapper">
                <div class="swiper-slide js-swiper-slide">
                    <div class="card-product card-product--green">
                        <div class="card-product__inner">
                            <div class="tag card-product__tag"><span class="tag__content text-s fw-semibold">Частным клиентам</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <div class="card-product__content">
                                <h4 class="card-product__title">Вклад «Рантье»</h4>
                                <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 violet-100">до<span class="text-number-l fw-bold">15,5%</span></div>
                            </div><img class="card-product__img" src="/frontend/dist/img/big-illustrations/large-individual/contribution-rentier.png" alt="" loading="lazy"><a class="btn btn-primary card-product__button" href="#">Открыть вклад</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="card-product card-product--orange">
                        <div class="card-product__inner">
                            <div class="tag card-product__tag"><span class="tag__content text-s fw-semibold">Корпоративным клиентам</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <div class="card-product__content">
                                <h4 class="card-product__title">Резервирование <br>счетов</h4>
                                <p class="card-product__description m-0">Дистанционная подача заявки на&nbsp;открытие расчетного счета</p>
                            </div><img class="card-product__img" src="/frontend/dist/img/big-illustrations/large-corporate/account-reservation.png" alt="" loading="lazy"><a class="btn btn-primary card-product__button" href="#">Подать заявку</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="card-product card-product--yellow">
                        <div class="card-product__inner">
                            <div class="tag card-product__tag"><span class="tag__content text-s fw-semibold">Малому и среднему бизнесу</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <div class="card-product__content">
                                <h4 class="card-product__title">Экспресс-гарантии <br>44-ФЗ, 223-ФЗ</h4>
                                <p class="card-product__description m-0">Принятие решения за&nbsp;1 день, до&nbsp;30&nbsp;000&nbsp;000&nbsp;рублей, без залога</p>
                            </div><img class="card-product__img" src="/frontend/dist/img/big-illustrations/large-corporate/guarantees.png" alt="" loading="lazy"><a class="btn btn-primary card-product__button" href="#">Подать заявку</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="card-product card-product--green">
                        <div class="card-product__inner">
                            <div class="tag card-product__tag"><span class="tag__content text-s fw-semibold">Частным клиентам</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <div class="card-product__content">
                                <h4 class="card-product__title">Платежный стикер <br>&laquo;Мир&raquo;</h4>
                                <p class="card-product__description m-0">Полноценная банковская карта с&nbsp;NFC-чипом</p>
                            </div><img class="card-product__img" src="/frontend/dist/img/big-illustrations/large-individual/payment-sticker.png" alt="" loading="lazy"><a class="btn btn-primary card-product__button" href="#">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="card-product card-product--yellow">
                        <div class="card-product__inner">
                            <div class="tag card-product__tag"><span class="tag__content text-s fw-semibold">Малому и среднему бизнесу</span><span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg></span></div>
                            <div class="card-product__content">
                                <h4 class="card-product__title">Экспресс-гарантии <br>44-ФЗ, 223-ФЗ</h4>
                                <p class="card-product__description m-0">Принятие решения за&nbsp;1 день, до&nbsp;30&nbsp;000&nbsp;000&nbsp;рублей, без залога</p>
                            </div><img class="card-product__img" src="/frontend/dist/img/big-illustrations/large-corporate/guarantees.png" alt="" loading="lazy"><a class="btn btn-primary card-product__button" href="#">Подать заявку</a>
                        </div>
                    </div>
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
                <div class="swiper-slide js-swiper-slide"><a class="card-news" href="#">
                        <div class="d-flex column-gap-3 row-gap-4 justify-content-between align-items-end flex-wrap">
                            <div class="tag tag--outline card-news__tag"><span class="tag__content text-s fw-semibold">Пресс-центр</span><span class="tag__triangle">
                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                </svg></span></div><span class="text-s dark-70">07.12.2023</span>
                        </div><span class="dark-100">Новикомбанк рассказал о развитии финансовых инструментов</span></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-news" href="#">
                        <div class="d-flex column-gap-3 row-gap-4 justify-content-between align-items-end flex-wrap">
                            <div class="tag tag--outline card-news__tag"><span class="tag__content text-s fw-semibold">Пресс-центр</span><span class="tag__triangle">
                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                </svg></span></div><span class="text-s dark-70">06.12.2023</span>
                        </div><span class="dark-100">Новикомбанк и Республика Татарстан договорились о сотрудничестве</span></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-news" href="#">
                        <div class="d-flex column-gap-3 row-gap-4 justify-content-between align-items-end flex-wrap">
                            <div class="tag tag--outline card-news__tag"><span class="tag__content text-s fw-semibold">Союз машиностроителей 1234 dfsfasd</span><span class="tag__triangle">
                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                </svg></span></div><span class="text-s dark-70">27.11.2023</span>
                        </div><span class="dark-100">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</span></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-news" href="#">
                        <div class="d-flex column-gap-3 row-gap-4 justify-content-between align-items-end flex-wrap">
                            <div class="tag tag--outline card-news__tag"><span class="tag__content text-s fw-semibold">Пресс-центр</span><span class="tag__triangle">
                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                </svg></span></div><span class="text-s dark-70">20.11.2023</span>
                        </div><span class="dark-100">Новикомбанк и Республика Татарстан договорились о сотрудничестве</span></a>
                </div>
                <div class="swiper-slide js-swiper-slide"><a class="card-news" href="#">
                        <div class="d-flex column-gap-3 row-gap-4 justify-content-between align-items-end flex-wrap">
                            <div class="tag tag--outline card-news__tag"><span class="tag__content text-s fw-semibold">Союз машиностроителей</span><span class="tag__triangle">
                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                </svg></span></div><span class="text-s dark-70">05.11.2023</span>
                        </div><span class="dark-100">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</span></a>
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

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
