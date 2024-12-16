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
?>
<?if(!empty($arResult["SECTION"]["BANNER_CONTENT"])):?>
    <div class="banner-product banner-product--graphite banner-product--border-violet banner-product--size-xl">
        <div class="banner-product__wrapper">
            <div class="banner-product__content">
                <div class="banner-product__header">
                    <div class="breadcrumbs d-flex flex-wrap gap-2 banner-product__breadcrumbs">
                        <a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex" href="<?= $arResult["SECTION"]["LIST_PAGE_URL"]?>">
                            <svg class="icon size-s d-inline-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                            </svg>
                            <span><?= $arParams["MAIN_CHAIN_TITLE"] ?></span>
                        </a>
                        <div class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex">
                            <svg class="icon size-s text-white-50 d-inline-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                            </svg>
                            <span><?= strip_tags($arResult["SECTION"]["~NAME"])?></span>
                        </div>
                    </div>
                    <h1><?= $arResult["SECTION"]["~NAME"]?></h1>
                    <p class="banner-product__subtitle text-l"><?= $arResult["SECTION"]["DESCRIPTION"]?></p>
                </div>
                <img class="banner-product__image" src="<?= $arResult["SECTION"]["PICTURE_PATH"]?>" alt="" loading="lazy">
                <?if(!empty($arResult["SECTION"]["BANNER_CONTENT"]["HEADER"])):?>
                    <div class="banner-product__lists">
                        <?foreach ($arResult["SECTION"]["BANNER_CONTENT"]["HEADER"] as $item):?>
                            <ul class="list list--heavy list--size-m violet-100">
                                <li><?= $item["NAME"]?></li>
                            </ul>
                        <?endforeach;?>
                    </div>
                <?endif;?>
            </div>
            <?if(!empty($arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"])):?>
                <div class="banner-product__footer row gx-md-2 gx-lg-0 row-gap-4 row-gap-lg-6 mt-6 mt-lg-16 mt-xl-26">
                    <?foreach ($arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"] as $item):?>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="benefit d-flex gap-3 flex-column">
                                <img class="icon size-xxl" src="<?= $item["ICON"]?>" alt="icon" loading="lazy">
                                <div class="benefit__content d-flex flex-column gap-3">
                                    <h4 class="benefit__title"><?= $item["NAME"]?></h4>
                                    <div class="benefit__description w-100 text-m">
                                        <p class="mb-0 text-m"><?= $item["DESC"]?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            <?endif;?>
        </div>
        <picture class="pattern-bg banner-product__pattern pattern-bg--position-top">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </div>
<?else:?>
    <section class="banner-text banner-text--border-violet bg-gradient-graphite">
        <div class="container banner-text__container position-relative z-2">
            <div class="row ps-lg-6">
                <div class="col-12 col-sm-6 col-md-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                    <div class="d-flex flex-column align-items-start gap-3 gap-md-4">
                        <div class="breadcrumbs d-flex flex-wrap gap-2">
                            <a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex" href="<?= $arResult["SECTION"]["LIST_PAGE_URL"]?>">
                                <svg class="icon size-s d-inline-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                                <span><?= $arParams["MAIN_CHAIN_TITLE"] ?></span>
                            </a>
                            <div class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex">
                                <svg class="icon size-s text-white-50 d-inline-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                                <span><?= strip_tags($arResult["SECTION"]["~NAME"])?></span>
                            </div>
                        </div>
                        <h1 class="banner-text__title text-break dark-100"><?= $arResult["SECTION"]["~NAME"]?></h1>
                    </div>
                </div>
                <div class="d-none d-sm-block col-12 col-sm-6 col-md-4">
                    <img class="banner-text__image position-relative w-auto float-end" src="<?= $arResult["SECTION"]["PICTURE_PATH"]?>" alt="">
                </div>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<?endif;?>
