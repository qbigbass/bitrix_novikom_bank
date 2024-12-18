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
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
?>
<? if(!empty($arResult["ITEMS"])) : ?>
    <? foreach ($arResult["ITEMS"] as $item) : ?>
        <? if(!empty($item["BLOCK_RATINGS"])) : ?>
            <!-- Блок "Рейтинг" -->
            <section class="section-layout pt-lg-11 bg-<?= $item["COLOR_BLOCK"] ?>">
                <div class="container">
                    <? foreach ($item["BLOCK_RATINGS"] as $rating): ?>
                        <div class="row">
                            <div class="col-12">
                                <?= $rating["TEMPLATE"] ?>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </section>
        <? endif; ?>
        <? if(!empty($item["BLOCK_POSSIBILITIES"])) : ?>
            <!-- Блок "Возможности" -->
            <section class="section-layout bg-<?= $item["COLOR_BLOCK"] ?>">
                <div class="container">
                    <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Возможности</h3>
                    <div class="row">
                        <div class="col-12 d-flex flex-column flex-md-row flex-md-wrap cards-gap">
                            <? foreach ($item["BLOCK_POSSIBILITIES"] as $possibility): ?>
                                <div class="card-benefit d-inline-flex px-3 px-sm-5 px-lg-6 p-4 p-sm-5 p-lg-6 w-100 bg-blue-10 card-benefit--type-img card-benefit--size-lg-large overflow-visible h-auto flex-grow-1 flex-basis-100 flex-basis-md-33">
                                    <div class="card-benefit__inner d-flex flex-column gap-6 gap-lg-7 justify-content-between h-100 w-100">
                                        <div class="card-benefit__content d-flex flex-column gap-4">
                                            <img class="card-benefit__image" src="<?= $possibility["PICTURE"] ?>" alt="<?= $possibility["TITLE"] ?>" loading="lazy">
                                            <h4 class="card-benefit__title"><?= $possibility["TITLE"] ?></h4>
                                            <div class="rte m-0 gap-3 gap-lg-4">
                                                <?= $possibility["TEXT"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
                <picture class="pattern-bg">
                    <source srcset="/frontend/dist/img/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
                    <source srcset="/frontend/dist/img/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                </picture>
            </section>
        <? endif; ?>
        <? if(!empty($item["BLOCK_QUOTES"])) : ?>
            <!-- Блок с цитатой -->
            <section class="section-layout pt-md-5 pt-lg-6 bg-<?= $item["COLOR_BLOCK"] ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="polygon-container js-polygon-container">
                                <div class="polygon-container__content">
                                    <div class="helper bg-blue-10">
                                        <? foreach ($item["BLOCK_QUOTES"] as $quote): ?>
                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                <img
                                                    class="helper__image w-auto float-end"
                                                    src="<?= $quote["PICTURE"] ?>"
                                                    alt="<?= $quote["TITLE"] ?>"
                                                    loading="lazy"
                                                >
                                                <div class="helper__content text-l">
                                                    <? if(!empty($quote["TITLE"])): ?>
                                                        <h3 class="h4 mb-3"><?= $quote["TITLE"] ?></h3>
                                                    <? endif; ?>
                                                    <div class="rte m-0 gap-3 gap-lg-4">
                                                        <?= $quote["TEXT"] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                                <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                        <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <? endif; ?>
        <? if(!empty($item["BLOCK_CARDS"])) : ?>
            <!-- Блок с простыми карточками -->
            <section class="section-layout pt-md-5 pt-lg-6 bg-<?= $item["COLOR_BLOCK"] ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper slider-cards js-slider-cards swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden swiper-navigation-disabled swiper-pagination-disabled" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,tablet-album:3,laptop:3,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                                <div class="swiper-wrapper">
                                    <? foreach ($item["BLOCK_CARDS"] as $card) : ?>
                                        <div class="swiper-slide js-swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active" style="width: 454px; margin-right: 16px;">
                                        <div class="card-benefit d-inline-flex px-3 px-sm-5 px-lg-6 p-4 p-sm-5 p-lg-6 w-100 bg-white">
                                            <div class="card-benefit__inner d-flex flex-column gap-6 gap-lg-7 justify-content-between h-100 w-100">
                                                <div class="card-benefit__content d-flex flex-column gap-4">
                                                    <h4 class="card-benefit__title"><?= $card["TITLE"] ?></h4>
                                                </div>
                                                <div class="card-benefit__read-more d-flex align-items-end justify-content-between">
                                                    <div class="card-benefit__icon">
                                                        <img class="yellow-100 size-xxl icon" src="<?= $card["PICTURE"] ?>" alt="" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?endforeach;?>
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
        <? endif; ?>
        <? if(!empty($item["BLOCK_GUARANTEES"])) : ?>
            <!-- Блок "Оформление гарантии" -->
            <section class="section-layout pt-0 bg-<?= $item["COLOR_BLOCK"] ?>">
                <div class="container">
                    <div class="row px-lg-6">
                        <div class="d-none d-md-flex justify-content-between">
                            <h3 class="h3">Оформление гарантии</h3>
                            <? if(!empty($item["BLOCK_GUARANTEES"]["TABS"])): ?>
                                <div class="d-inline-flex">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <? $t = 0; ?>
                                        <? foreach ($item["BLOCK_GUARANTEES"]["TABS"] as $tabXml => $tabValue): ?>
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link <? if($t < 1): ?>active<? endif; ?>"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#<?= $tabXml ?>"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="<?= $tabXml ?>"
                                                    aria-selected
                                                ><?= $tabValue ?>
                                                </button>
                                            </li>
                                            <? $t++; ?>
                                        <? endforeach; ?>
                                    </ul>
                                </div>
                            <? endif; ?>
                        </div>
                        <a
                            class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none"
                            data-bs-toggle="collapse"
                            href="#restructuring-steps-content"
                            role="button"
                            aria-expanded="false"
                            aria-controls="restructuring-steps-content"
                        >Оформление гарантии
                            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="collapse d-md-block mt-6 mt-lg-7" id="restructuring-steps-content">
                        <? if(!empty($item["BLOCK_GUARANTEES"]["TABS"])): ?>
                            <div class="d-inline-flex d-md-none w-100 mb-6">
                                <ul class="nav nav-tabs" role="tablist">
                                    <? $s = 0; ?>
                                    <? foreach ($item["BLOCK_GUARANTEES"]["TABS"] as $tabXml => $tabValue): ?>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link <? if($s < 1): ?>active<? endif; ?>"
                                                data-bs-toggle="tab"
                                                data-bs-target="#<?= $tabXml ?>"
                                                type="button"
                                                role="tab"
                                                aria-controls="<?= $tabXml ?>"
                                                aria-selected
                                            ><?= $tabValue ?></button>
                                        </li>
                                        <? $s++; ?>
                                    <? endforeach; ?>
                                </ul>
                            </div>
                        <? endif; ?>
                        <? if(!empty($item["BLOCK_GUARANTEES"]["ITEMS"])): ?>
                            <div class="tab-content">
                                <? $g = 0; ?>
                                <? foreach ($item["BLOCK_GUARANTEES"]["ITEMS"] as $xmlType => $arGuarantees): ?>
                                    <div
                                        class="tab-pane fade show <? if($g < 1): ?>active<? endif; ?>"
                                        id="<?= $xmlType?>"
                                        role="tabpanel"
                                        aria-labelledby="loan"
                                        tabindex="0"
                                    >
                                        <div class="row row-gap-6 row-gap-lg-7 gx-xl-6">
                                            <div class="stepper steps-4">
                                            <? $i = 1; ?>
                                            <? foreach ($arGuarantees as $guarantee): ?>
                                                <div class="stepper-item stepper-item--color-yellow">
                                                    <div class="stepper-item__header">
                                                        <div class="stepper-item__number">
                                                            <? if($i === 1) : ?>
                                                                <div class="stepper-item__number-value"><?= $i ?></div>
                                                                <div class="stepper-item__number-icon">
                                                                    <div class="stepper-item__icon-border" data-level="1">
                                                                        <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? elseif ($i === 2) : ?>
                                                                <div class="stepper-item__number-value"><?= $i ?></div>
                                                                <div class="stepper-item__number-icon">
                                                                    <div class="stepper-item__icon-border" data-level="1">
                                                                        <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="stepper-item__icon-border" data-level="2">
                                                                        <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? elseif ($i === 3) : ?>
                                                                <div class="stepper-item__number-value"><?= $i ?></div>
                                                                <div class="stepper-item__number-icon">
                                                                    <div class="stepper-item__icon-border" data-level="1">
                                                                        <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="stepper-item__icon-border" data-level="2">
                                                                        <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="stepper-item__icon-border" data-level="3">
                                                                        <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.5" d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? elseif ($i === 4) : ?>
                                                                <div class="stepper-item__number-value"><?= $i ?></div>
                                                                <div class="stepper-item__number-icon">
                                                                    <div class="stepper-item__icon-border" data-level="1">
                                                                        <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="stepper-item__icon-border" data-level="2">
                                                                        <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="stepper-item__icon-border" data-level="3">
                                                                        <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.5" d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="stepper-item__icon-border" data-level="4">
                                                                        <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3" d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endif; ?>
                                                        </div>
                                                        <div class="stepper-item__arrow"></div>
                                                    </div>
                                                    <div class="stepper-item__content">
                                                        <p class="text-l mb-0"><?= $guarantee["TITLE"] ?></p>
                                                    </div>
                                                </div>
                                            <? $i++; ?>
                                            <? endforeach; ?>
                                        </div>
                                        </div>
                                    </div>
                                    <? $g++; ?>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </section>
        <? endif; ?>
        <? if(!empty($item["BLOCK_CONTACTS"])): ?>
            <!-- Блок "Контакты" -->
            <section class="section-layout bg-<?= $item["COLOR_BLOCK"] ?>">
                <div class="container">
                    <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Контакты</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper js-slider-cards slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:1,tablet-album:2,laptop:2,laptop-x:2" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                                <div class="swiper-wrapper js-swiper-wrapper">
                                    <? foreach ($item["BLOCK_CONTACTS"] as $contact): ?>
                                        <div class="swiper-slide js-swiper-slide">
                                        <div class="card-about bg-heavy-violet h-100">
                                            <div class="card-about__content d-flex flex-column row-gap-5 row-gap-md-6 row-gap-lg-7 h-100">
                                                <? if(!empty($contact["TYPE"])): ?>
                                                    <div class="d-flex flex-column gap-4 dark-0 mt-0">
                                                        <div class="tag tag--outline-white card-about__tag tag--triangle-absolute">
                                                            <span class="tag__content text-s fw-semibold mw-100 w-sm-auto"><?= $contact["TYPE"] ?></span>
                                                            <span class="tag__triangle">
                                                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                <? endif; ?>
                                                <div class="d-flex flex-column gap-4 dark-0 mt-0">
                                                    <div class="card-about__title-group d-flex flex-column gap-2">
                                                        <h4 class="card-about__title dark-0"><?= $contact["TITLE"] ?></h4>
                                                    </div>
                                                </div>
                                                <? if(!empty($contact["PHONES"]) || !empty($contact["EMAIL"])): ?>
                                                    <div class="d-flex flex-column gap-4 dark-0 mt-0">
                                                        <ul class="list-contact d-flex flex-column row-gap-3">
                                                            <? if(!empty($contact["PHONES"])) : ?>
                                                                <? foreach ($contact["PHONES"] as $phone => $additional): ?>
                                                                    <li class="d-flex column-gap-3">
                                                                        <span class="icon size-m flex-shrink-0 dark-0">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                                                            </svg>
                                                                        </span>
                                                                        <div class="list-contact__text d-flex flex-wrap gap-2">
                                                                            <a class="list-contact__link" href="tel:<?= $phone ?>">
                                                                                <span class="text-l"><?= $phone ?></span>
                                                                            </a>
                                                                            <? if(!empty($additional)): ?>
                                                                                <span class="caption-m chip chip--outlined">доб. <?= $additional ?></span>
                                                                            <? endif; ?>
                                                                        </div>
                                                                    </li>
                                                                <? endforeach; ?>
                                                            <? endif; ?>
                                                            <? if(!empty($contact["EMAIL"])):?>
                                                                <li class="d-flex column-gap-3">
                                                                    <span class="icon size-m flex-shrink-0 dark-0">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                                                                        </svg>
                                                                    </span>
                                                                    <div class="list-contact__text d-flex flex-wrap gap-2">
                                                                        <a class="text-decoration-underline list-contact__link" href="mailto:<?= $contact["EMAIL"] ?>">
                                                                            <span class="text-l"><?= $contact["EMAIL"] ?></span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            <?endif;?>
                                                        </ul>
                                                    </div>
                                                <? endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <? endforeach; ?>
                                    <div class="swiper-slide js-swiper-slide">
                                        <?$APPLICATION->IncludeFile('/local/php_interface/include/call_back.php')?>
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
        <? endif; ?>

        <? if(!empty($item["BLOCK_DETAIL_SERVICE"])) : ?>
            <!-- Блок "Подробнее об услуге" -->
            <? $activeTabCode = ''; ?>
            <section class="section-layout border-top border-blue10">
                <div class="container">
                    <h3 class="mb-4 mb-md-6 mb-lg-7 px-lg-6">Подробнее об услуге</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="ps-lg-6">
                                <div class="tabs-panel js-tabs-slider overflow-hidden position-relative pe-1 pe-lg-0">
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
                                    <? if(!empty($item["BLOCK_DETAIL_SERVICE"]["TABS"])) : ?>
                                        <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                                            <? $tabIndex = 0; ?>
                                            <? foreach ($item["BLOCK_DETAIL_SERVICE"]["TABS"] as $tabId => $arData) : ?>
                                                <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                                    <button
                                                        class="tabs-panel__list-item-link nav-link bg-transparent <? if(!$tabIndex) :?>active<? endif; ?>"
                                                        data-bs-toggle="tab"
                                                        data-bs-target="#<?= $arData["CODE"] ?>"
                                                        type="button"
                                                        role="tab"
                                                        aria-controls="<?= $arData["CODE"] ?>"
                                                        aria-selected="<? if(!$tabIndex) : ?>true<? else : ?>false<? endif; ?>"
                                                    ><?= $arData["NAME"] ?></button>
                                                </li>
                                                <? if(!$tabIndex) : $activeTabCode = $arData["CODE"]; ?><? endif; ?>
                                                <? $tabIndex++; ?>
                                            <? endforeach; ?>
                                        </ul>
                                    <? endif; ?>
                                </div>
                            </div>
                            <? if(!empty($item["BLOCK_DETAIL_SERVICE"]["ELEMENTS"])) : ?>
                                <div class="tab-content mt-4 mt-md-6 mt-lg-7">
                                    <? foreach ($item["BLOCK_DETAIL_SERVICE"]["ELEMENTS"] as $tabCode => $arTabs) : ?>
                                        <div
                                            class="tab-pane fade <? if($activeTabCode === $tabCode) :?>show active<? endif; ?>"
                                            id="<?= $tabCode ?>"
                                            aria-labelledby="<?= $tabCode ?>"
                                            tabindex="0"
                                            role="tabpanel"
                                        >
                                            <? if($tabCode === "voprosy-i-otvety") : ?>
                                                <!-- ТАБ "Вопросы и ответы" -->
                                                <div class="row row-gap-6 row-gap-lg-7">
                                                    <div class="col-12 col-xxl-8">
                                                        <div class="accordion" id="accordion-faq">
                                                            <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                                <div class="accordion-item">
                                                                    <div class="accordion-header">
                                                                        <button
                                                                            class="accordion-button collapsed"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#<?= $elemId ?>"
                                                                            aria-controls="<?= $elemId ?>">
                                                                            <span><?= $arElements["QUESTION"] ?></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="accordion-collapse collapse" id="<?= $elemId ?>" data-bs-parent="#accordion-faq">
                                                                        <div class="accordion-body">
                                                                            <p class="text-m mb-0 dark-70"><?= $arElements["ANSWER"] ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                        <a class="btn btn-link btn-lg d-inline-flex gap-2 align-items-center mt-4 mt-md-6 section-custom-accordion__button-more" href="#">
                                                            <span class="text-m">Все вопросы и ответы</span>
                                                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 col-xxl-4">
                                                        <div class="card-help d-inline-flex p-3 p-sm-5 p-lg-6 w-100 bg-blue-10">
                                                            <div class="card-help__inner d-flex flex-column gap-4 gap-md-6 h-100 w-100">
                                                                <div class="card-help__title-group d-flex flex-column gap-3">
                                                                    <h4 class="card-help__title">Остались вопросы?</h4>
                                                                    <p class="card-help__description text-s m-0">Оставьте свой телефон и мы перезвоним вам, либо задайте вопрос в чате</p>
                                                                </div>
                                                                <form class="form-feedback p-0 gap-3" action="/" method="POST">
                                                                    <div>
                                                                        <label class="form-label" for="mobile-phone-help">Мобильный телефон</label>
                                                                        <input class="card-help__input form-control form-control-lg-lg bg-transparent" id="mobile-phone-help" type="text" aria-describedby="mobile-phone-hint" placeholder="+7">
                                                                    </div>
                                                                    <button class="btn btn-primary btn-lg-lg text-m w-100" type="button">Перезвоните мне</button>
                                                                </form>
                                                                <button class="card-help__button btn btn-link btn-lg-lg btn-icon mx-auto gap-2" type="button">
                                                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chat"></use>
                                                                    </svg>Написать в чат
                                                                </button>
                                                                <p class="card-help__agreement-text m-0 dark-70 fs-4 lh-sm">Нажимая кнопку «Перезвоните мне», вы соглашаетесь с условиями предоставления информации</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "opisanie") : ?>
                                                <!-- ТАБ "Описание" -->
                                                <div class="row rte rte--accordion">
                                                    <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                        <div class="col-12">
                                                            <?= $arElements["TEXT"] ?>
                                                        </div>
                                                    <? endforeach; ?>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "tarify") : ?>
                                                <!-- ТАБ "Тарифы" -->
                                                <div class="row rte rte--accordion">
                                                    <div class="col-12">
                                                        <div class="swiper js-slider-cards w-100" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3,laptop-x:4" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                                                            <div class="swiper-wrapper js-swiper-wrapper">
                                                                <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                                    <div class="swiper-slide js-swiper-slide">
                                                                        <div class="card-tariff d-flex flex-column gap-5 bg-dark-10 w-100">
                                                                            <div class="card-tariff__header border-bottom-dashed pb-4">
                                                                                <h4 class="card-tariff__title"><?= $arElements["NAME"] ?></h4>
                                                                            </div>
                                                                            <div class="card-tariff__content d-flex flex-column gap-4">
                                                                                <? if (!empty($arElements["TARIFS"])) : ?>
                                                                                    <? foreach ($arElements["TARIFS"] as $desc => $value) : ?>
                                                                                        <div class="d-flex flex-column gap-2">
                                                                                            <span class="text-s dark-70"><?= $desc ?></span>
                                                                                            <span class="text-m fb-semibold dark-100"><?= $value ?></span>
                                                                                        </div>
                                                                                    <? endforeach; ?>
                                                                                    <a class="btn btn-yellow w-100" href="#">Подключить</a>
                                                                                <? endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <? endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "svedeniya") : ?>
                                                <!-- ТАБ "Сведения" -->
                                                <div class="row rte rte--accordion">
                                                    <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                        <div class="col-12">
                                                            <?= $arElements["TEXT"] ?>
                                                        </div>
                                                    <? endforeach; ?>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "vidy") : ?>
                                                <!-- ТАБ "Виды" -->
                                                <div class="row rte rte--accordion">
                                                    <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                        <div class="col-12">
                                                            <h4 class="fw-bold"><?= $arElements["TITLE"] ?></h4>
                                                            <?= $arElements["TEXT"] ?>
                                                        </div>
                                                        <div class="col-12"><span class="border-bottom-dashed" aria-hidden="true"></span></div>
                                                    <? endforeach; ?>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "otvetstvennost") : ?>
                                                <!-- ТАБ "Ответственность" -->
                                                <div class="row rte rte--accordion">
                                                    <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                        <div class="col-12">
                                                            <h4 class="fw-bold"><?= $arElements["TITLE"] ?></h4>
                                                            <?= $arElements["TEXT"] ?>
                                                        </div>
                                                        <div class="col-12"><span class="border-bottom-dashed" aria-hidden="true"></span></div>
                                                    <? endforeach; ?>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "pamyatka") : ?>
                                                <!-- ТАБ "Памятка" -->
                                                <div class="row rte rte--accordion">
                                                    <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                        <div class="col-12">
                                                            <h4 class="fw-bold"><?= $arElements["TITLE"] ?></h4>
                                                            <?= $arElements["TEXT"] ?>
                                                        </div>
                                                    <? endforeach; ?>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "usloviya") : ?>
                                                <!-- ТАБ "Условия" -->
                                                <div class="row rte rte--accordion">
                                                    <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                        <div class="col-12">
                                                            <h4 class="fw-bold"><?= $arElements["TITLE"] ?></h4>
                                                            <?= $arElements["TEXT"] ?>
                                                        </div>
                                                    <? endforeach; ?>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "dokumenty-i-tarify") : ?>
                                                <!-- ТАБ "Документы и тарифы" -->
                                                <div class="row rte rte--accordion">
                                                    <div class="accordion" id="accordion-193">
                                                        <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                            <div class="accordion-item">
                                                                <div class="accordion-header">
                                                                    <button
                                                                        class="accordion-button show collapsed"
                                                                        type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#<?= $elemId ?>"
                                                                        aria-controls="<?= $elemId ?>"
                                                                        aria-expanded="false"
                                                                    ><?= $arElements["NAME"] ?>
                                                                    </button>
                                                                </div>
                                                                <div class="accordion-collapse collapse" id="<?= $elemId ?>" data-bs-parent="#accordion-193" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="mt-4">
                                                                            <? if(!empty($arElements["DOCUMENTS"])):?>
                                                                                <? foreach ($arElements["DOCUMENTS"] as $doc) : ?>
                                                                                    <a
                                                                                        class="d-flex flex-column gap-2 py-3 document-download text-m"
                                                                                        href="<?= $doc["SRC"] ?>"
                                                                                        download=""
                                                                                    ><?= $doc["DESC"] ?>
                                                                                        <div class="d-flex gap-1 align-items-center">
                                                                                            <div class="document-download__file caption-m dark-70">
                                                                                                <span class="document-download__date-time"><?= $doc["TIME"] ?></span>
                                                                                                <span class="document-download__file-type"><?= $doc["EXT"] ?></span>
                                                                                            </div>
                                                                                            <span class="icon size-s text-primary">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                                                                                </svg>
                                                                                            </span>
                                                                                        </div>
                                                                                    </a>
                                                                                <? endforeach; ?>
                                                                            <? endif;?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </div>
                                                    <? if (!empty($arTabs["QUOTES"])) : ?>
                                                        <div class="col-12">
                                                            <? foreach ($arTabs["QUOTES"] as $elemId => $arElements) : ?>
                                                                <div class="polygon-container js-polygon-container">
                                                                    <div class="polygon-container__content">
                                                                        <div class="helper bg-blue-10">
                                                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                                <img class="helper__image w-auto float-end" src="<?= $arElements["PICTURE"] ?>" alt="" loading="lazy">
                                                                                <div class="helper__content text-l">
                                                                                    <p class="text-l mb-0"><?= $arElements["TEXT"] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="polygon-container__polygon js-polygon-container-polygon yellow-100">
                                                                        <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                                            <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                            <? if($tabCode === "fondy") : ?>
                                                <!-- ТАБ "Фонды" -->
                                                <div class="row row-gap-6 row-gap-lg-7">
                                                    <div class="col-12">
                                                        <form class="w-100">
                                                            <div class="input-group flex-nowrap d-none d-lg-flex">
                                                                <span class="input-group-icon bg-transparent">
                                                                    <span class="icon violet-100">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                            <use xlink:href="img/svg-sprite.svg#icon-search"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <input class="form-control form-control-lg text-l bg-transparent" id="input-search" type="text" placeholder="Поиск по регионам или названию фонда" aria-label="Поиск по регионам или названию фонда" aria-describedby="input-search" tabindex="-1">
                                                            </div>
                                                            <div class="input-group flex-nowrap d-flex d-lg-none">
                                                                <span class="input-group-icon bg-transparent">
                                                                    <span class="icon violet-100">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                            <use xlink:href="img/svg-sprite.svg#icon-search"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <input class="form-control ps-0 text-s bg-transparent" id="input-search-mobile" type="text" placeholder="Поиск по регионам или названию фонда" aria-label="Поиск по регионам или названию фонда" aria-describedby="#input-search-mobile" tabindex="-1">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-funds-tab">
                                                            <? foreach ($arTabs["ITEMS"] as $elemId => $arElements) : ?>
                                                                <div class="accordion-item">
                                                                    <div class="accordion-header">
                                                                        <button
                                                                            class="accordion-button collapsed"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#<?= $elemId ?>"
                                                                            aria-controls="<?= $elemId ?>"
                                                                        >
                                                                            <div class="d-flex flex-column gap-4 gap-md-5 gap-lg-6">
                                                                                <? if (!empty($arElements["CITY"])) : ?>
                                                                                    <div class="tag tag--outline tag--triangle-absolute">
                                                                                        <span class="tag__content text-s fw-semibold mw-100 w-sm-auto"><?= $arElements["CITY"] ?></span>
                                                                                        <span class="tag__triangle">
                                                                                            <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                                                                            </svg>
                                                                                        </span>
                                                                                    </div>
                                                                                <? endif;?>
                                                                                <span class="fw-bold h4"><?= $arElements["TITLE"] ?></span>
                                                                            </div>
                                                                        </button>
                                                                    </div>
                                                                    <div class="accordion-collapse collapse" id="<?= $elemId ?>" data-bs-parent="#accordion-funds-tab">
                                                                        <div class="accordion-body">
                                                                            <div class="rte rte--accordion">
                                                                                <table class="table table--mobile-row-is-column mb-0">
                                                                                    <tbody>
                                                                                        <? foreach ($arElements["DESC"] as $desc => $value) : ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <div class="text-l dark-70 fw-semibold"><?= $desc ?></div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div class="text-l"><?= $value ?></div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <? endforeach; ?>
                                                                                    </tbody>
                                                                                </table>
                                                                                <? if(!empty($arElements["LINK"])) : ?>
                                                                                    <a class="btn btn-link btn-lg btn-icon" type="button" href="<?= $arElements["LINK"] ?>">Перейти на сайт фонда
                                                                                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download"></use>
                                                                                        </svg>
                                                                                    </a>
                                                                                <? endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? endif; ?>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
                <picture class="pattern-bg pattern-bg--hide-mobile">
                    <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
                    <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                </picture>
            </section>
        <? endif; ?>
        <? if(!empty($item["BLOCK_OTHER_SERVICES"])) : ?>
            <!-- Блок "Другие услуги для бизнеса" -->
            <section class="section-layout bg-<?= $item["COLOR_BLOCK"] ?>">
                <div class="container">
                    <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Другие услуги для бизнеса</h3>
                    <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                        <div class="swiper-wrapper">
                            <? foreach ($item["BLOCK_OTHER_SERVICES"] as $service) : ?>
                                <div class="swiper-slide js-swiper-slide">
                                    <div class="card-product card-product--<?= $service["LINE_COLOR_XML"] ?> bg-dark-10">
                                        <div class="card-product__inner">
                                            <div class="tag card-product__tag">
                                                <span class="tag__content text-s fw-semibold mw-100 w-sm-auto"><?= $service["TAG"] ?></span>
                                                <span class="tag__triangle">
                                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="card-product__content">
                                                <h4 class="card-product__title"><?= $service["TITLE"] ?></h4>
                                                <? if(!empty($service["TEXT"])) : ?>
                                                    <p class="card-product__description m-0"><?= $service["TEXT"] ?></p>
                                                <? elseif (!empty($service["CONDITION_VALUE"])) : ?>
                                                    <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 violet-100">
                                                        <?= $service["CONDITION_DESC"] ?><span class="text-number-l fw-bold"><?= $service["CONDITION_VALUE"] ?></span>
                                                    </div>
                                                <? endif; ?>
                                            </div>
                                            <? if(!empty($service["PICTURE"])) : ?>
                                                <img class="card-product__img" src="<?= $service["PICTURE"] ?>" alt="" loading="lazy">
                                            <? endif; ?>
                                            <a class="btn btn-primary card-product__button" href="<?= $service["LINK"] ?>"><?= $service["BTN_TEXT"] ?></a>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach; ?>
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
            </section>
        <? endif; ?>
    <? endforeach; ?>
<? endif; ?>
