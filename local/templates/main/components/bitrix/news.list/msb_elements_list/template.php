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
<?if(!empty($arResult["ITEMS"])):?>
    <?foreach ($arResult["ITEMS"] as $item): ?>
        <?if(!empty($item["BLOCK_POSSIBILITIES"])):?>
            <!-- Блок "Возможности" -->
            <section class="section-layout">
                <div class="container">
                    <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Возможности</h3>
                    <div class="row">
                        <div class="col-12 d-flex flex-column flex-md-row flex-md-wrap cards-gap">
                            <?foreach ($item["BLOCK_POSSIBILITIES"] as $possibility):?>
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
                            <?endforeach;?>
                        </div>
                    </div>
                </div>
                <picture class="pattern-bg">
                    <source srcset="/frontend/dist/img/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
                    <source srcset="/frontend/dist/img/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                </picture>
            </section>
        <?endif;?>
        <?if(!empty($item["BLOCK_QUOTES"])):?>
            <!-- Блок с цитатой -->
            <section class="section-layout pt-md-5 pt-lg-6">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="polygon-container js-polygon-container">
                                <div class="polygon-container__content">
                                    <div class="helper bg-blue-10">
                                        <?foreach ($item["BLOCK_QUOTES"] as $quote):?>
                                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6"><img class="helper__image w-auto float-end" src="<?=$quote["PICTURE"] ?>" alt="<?=$quote["TITLE"] ?>" loading="lazy">
                                                <div class="helper__content text-l">
                                                    <h3 class="h4 mb-3"><?=$quote["TITLE"] ?></h3>
                                                    <div class="rte m-0 gap-3 gap-lg-4">
                                                        <?=$quote["TEXT"] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?endforeach;?>
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
        <?endif;?>
        <?if(!empty($item["BLOCK_CONTACTS"])):?>
            <!-- Блок "Контакты" -->
            <section class="section-layout bg-blue-10">
                <div class="container">
                    <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Контакты</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper js-slider-cards slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:1,tablet-album:2,laptop:2,laptop-x:2" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                                <div class="swiper-wrapper js-swiper-wrapper">
                                    <?foreach ($item["BLOCK_CONTACTS"] as $contact):?>
                                        <div class="swiper-slide js-swiper-slide">
                                        <div class="card-about bg-heavy-violet h-100">
                                            <div class="card-about__content d-flex flex-column row-gap-5 row-gap-md-6 row-gap-lg-7 h-100">
                                                <?if(!empty($contact["TYPE"])):?>
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
                                                <?endif;?>
                                                <div class="d-flex flex-column gap-4 dark-0 mt-0">
                                                    <div class="card-about__title-group d-flex flex-column gap-2">
                                                        <h4 class="card-about__title dark-0"><?= $contact["TITLE"] ?></h4>
                                                    </div>
                                                </div>
                                                <?if(!empty($contact["PHONES"]) || !empty($contact["EMAIL"])):?>
                                                    <div class="d-flex flex-column gap-4 dark-0 mt-0">
                                                        <ul class="list-contact d-flex flex-column row-gap-3">
                                                            <?if(!empty($contact["PHONES"])):?>
                                                                <?foreach ($contact["PHONES"] as $phone => $additional):?>
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
                                                                            <?if(!empty($additional)):?>
                                                                                <span class="caption-m chip chip--outlined">доб. <?= $additional ?></span>
                                                                            <?endif;?>
                                                                        </div>
                                                                    </li>
                                                                <?endforeach;?>
                                                            <?endif;?>
                                                            <?if(!empty($contact["EMAIL"])):?>
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
                                                <?endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    <?endforeach;?>
                                    <div class="swiper-slide js-swiper-slide">
                                        <div class="card-feedback position-relative overflow-hidden d-inline-flex p-3 p-sm-5 p-lg-6 w-100 bg-white h-100">
                                            <div class="card-feedback__inner d-flex flex-column row-gap-7 h-100 w-100 z-2">
                                                <div class="card-feedback__title-group d-flex flex-column gap-3 gap-md-4">
                                                    <h4 class="card-feedback__title">Остались вопросы?</h4>
                                                    <p class="card-feedback__description text-l m-0">Оставьте свой телефон и мы перезвоним вам, <br class="d-none d-md-block d-lg-none d-xl-block">либо задайте вопрос в чате</p>
                                                </div>
                                                <div class="d-flex flex-column flex-md-row p-0 gap-3 gap-md-4">
                                                    <button class="btn btn-outline-primary btn-lg-lg text-ls overflow-visible w-100 w-md-auto" type="button">Открыть чат</button>
                                                    <button class="btn btn-primary btn-lg-lg text-ls overflow-visible w-100 w-md-auto" type="button">Перезвоните мне</button>
                                                </div>
                                            </div>
                                            <picture class="pattern-bg pattern-bg--position-top z-1">
                                                <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
                                                <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                                            </picture>
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
                    </div>
                </div>
            </section>
        <?endif;?>
        <?if(!empty($item["BLOCK_OTHER_SERVICES"])):?>
            <!-- Блок "Другие услуги для бизнеса" -->
            <section class="section-layout">
                <div class="container">
                    <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Другие услуги для бизнеса</h3>
                    <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                        <div class="swiper-wrapper">
                            <?foreach ($item["BLOCK_OTHER_SERVICES"] as $service):?>
                                <div class="swiper-slide js-swiper-slide">
                                    <div class="card-product card-product--<?= $service["LINE_COLOR_XML"]?> bg-dark-10">
                                        <div class="card-product__inner">
                                            <div class="tag card-product__tag">
                                                <span class="tag__content text-s fw-semibold mw-100 w-sm-auto"><?= $service["TAG"]?></span>
                                                <span class="tag__triangle">
                                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                                    </svg>
                                                </span></div>
                                            <div class="card-product__content">
                                                <h4 class="card-product__title"><?= $service["TITLE"]?></h4>
                                                <?if(!empty($service["TEXT"])):?>
                                                    <p class="card-product__description m-0"><?= $service["TEXT"]?></p>
                                                <?elseif (!empty($service["CONDITION_VALUE"])):?>
                                                    <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 violet-100">
                                                        <?= $service["CONDITION_DESC"]?><span class="text-number-l fw-bold"><?= $service["CONDITION_VALUE"]?></span>
                                                    </div>
                                                <?endif;?>
                                            </div>
                                            <?if(!empty($service["PICTURE"])):?>
                                                <img class="card-product__img" src="<?= $service["PICTURE"]?>" alt="" loading="lazy">
                                            <?endif;?>
                                            <a class="btn btn-primary card-product__button" href="<?= $service["LINK"]?>"><?= $service["BTN_TEXT"]?></a>
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
            </section>
        <?endif;?>
    <?endforeach;?>
<?endif;?>
