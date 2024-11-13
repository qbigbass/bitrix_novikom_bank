<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>

<section class="section-layout bg-purple-10">
    <div class="container">
        <h3 class="mb-4 mb-md-6 mb-lg-7 px-lg-6">Контакты</h3>
        <div class="row">
            <div class="col-12">
                <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:1,tablet-album:2,laptop:2,laptop-x:2" data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:40,laptop:40,laptop-x:40">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['ITEMS'] as $item) { ?>
                            <div class="swiper-slide js-swiper-slide">
                                <div class="contact-block contact-block--bg-heavy-purple">
                                    <div class="d-flex flex-column row-gap-5 row-gap-md-6 row-gap-lg-7 h-100">
                                        <div class="d-flex flex-column row-gap-2">
                                            <h4 class="contact-block__title"><?= $item['~NAME'] ?></h4>
                                        </div>
                                        <div class="mt-auto">
                                            <ul class="list-contact d-flex flex-column row-gap-4">
                                                <li class="d-flex column-gap-3">
                                                    <span class="icon size-m flex-shrink-0 dark-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                                        </svg>
                                                    </span>
                                                    <div class="list-contact__text d-flex flex-wrap gap-2">
                                                        <a class="list-contact__link" href="tel:+74959747187">
                                                            <span class="text-l">+7 (495) 974-71-87</span>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="d-flex column-gap-3">
                                                    <span class="icon size-m flex-shrink-0 dark-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                                                        </svg>
                                                    </span>
                                                    <div class="list-contact__text d-flex flex-wrap gap-2">
                                                        <a class="text-decoration-underline list-contact__link" href="emailto:corp@novikom.ru">
                                                            <span class="text-l">corp@novikom.ru</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        <div class="swiper-slide js-swiper-slide">
                            <div class="contact-block contact-block--bg-white">
                                <div class="contact-block__content d-flex flex-column justify-content-between row-gap-5 row-gap-md-6 row-gap-lg-7 h-100">
                                    <div class="d-flex flex-column row-gap-2">
                                        <h4 class="contact-block__title">Остались вопросы</h4>
                                        <p class="mb-0 contact-block__description">Оставьте свой телефон и мы перезвоним вам, либо задайте вопрос в чате</p>
                                    </div>
                                    <div class="contact-block__buttons d-flex flex-column flex-sm-row gap-4">
                                        <a class="btn btn-lg-lg btn-outline-primary" href="#">Открыть чат</a>
                                        <a class="btn btn-lg-lg btn-primary" href="#">Перезвоните мне</a>
                                    </div>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-top">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)">
                                    <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                                </picture>
                            </div>
                        </div>
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


