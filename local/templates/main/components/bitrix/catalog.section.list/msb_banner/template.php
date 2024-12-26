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
<?if($arResult["SHOW_BANNER"]):?>
    <?if(!empty($arResult["SECTION"]["BANNER_CONTENT"])):?>
        <div class="banner-product banner-product--heavy-violet banner-product--type-msb banner-product--border-yellow banner-product--size-xl">
            <div class="banner-product__wrapper">
                <div class="banner-product__content">
                    <div class="banner-product__header">
                        <div class="breadcrumbs d-flex flex-wrap gap-2 banner-product__breadcrumbs">
                            <a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s text-white-50 d-none" href="<?= $arResult["SECTION"]["LIST_PAGE_URL"]?>">
                                <span><?= $arParams["MAIN_CHAIN_TITLE"] ?></span>
                            </a>
                            <div class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s text-white-50 d-inline-flex">
                                <svg class="icon size-s d-inline-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                                <span><?= $arResult["SECTION"]["NAME"]?></span>
                            </div>
                        </div>
                        <h1><?= $arResult["SECTION"]["NAME"]?></h1>
                        <p class="banner-product__subtitle text-l"><?= $arResult["SECTION"]["DESCRIPTION"]?></p>
                    </div>
                    <img class="banner-product__image" src="<?= $arResult["SECTION"]["PICTURE_PATH"]?>" alt="" loading="lazy">
                    <?if(!empty($arResult["SECTION"]["BANNER_CONTENT"]["HEADER"])):?>
                        <div class="banner-product__benefits-list">
                            <?foreach ($arResult["SECTION"]["BANNER_CONTENT"]["HEADER"] as $item):?>
                                <div class="d-inline-flex flex-column row-gap-2">
                                    <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 yellow-100">
                                        <?if(!empty($item["NAME"])):?>
                                            <span class="h4"><?= $item["NAME"] ?></span>
                                        <?elseif(!empty($item["DETAIL"])):?>
                                            <?= $item["DETAIL"] ?>
                                        <?endif;?>
                                    </div>
                                    <?if(!empty($item["DESC"])):?>
                                        <span class="d-block"><?= $item["DESC"] ?></span>
                                    <?endif;?>
                                </div>
                            <?endforeach;?>
                        </div>
                    <?endif;?>
                </div>
                <?if(!empty($arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"])):?>
                    <div class="banner-product__footer row gx-md-2 gx-lg-2_5 row-gap-4 row-gap-lg-6 mt-6 mt-lg-16">
                        <?$colXl = $arResult["UF_CNT_ELEM_F"];?>
                        <?foreach ($arResult["SECTION"]["BANNER_CONTENT"]["FOOTER"] as $item):?>
                            <div class="col-12 col-md-6 col-xl-<?= $colXl ?>">
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
                <source srcset="/frontend/dist/img/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
                <source srcset="/frontend/dist/img/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
                <img src="/frontend/dist/img/patterns/section/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        </div>
    <?else:?>
        <section class="banner-text banner-text--border- bg-heavy-violet">
            <div class="container banner-text__container position-relative z-2">
                <div class="row ps-lg-6">
                    <div class="col-12 col-sm-6 col-md-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                        <div class="d-flex flex-column align-items-start gap-3 gap-lg-4">
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
                                    <span><?= $arResult["SECTION"]["NAME"]?></span>
                                </div>
                            </div>
                            <h1 class="banner-text__title text-break h2 text-white dark-0"><?= $arResult["SECTION"]["NAME"]?></h1>
                            <div class="banner-text__description text-l dark-0"><?= $arResult["SECTION"]["DESCRIPTION"]?></div>
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
<?endif;?>
