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
<section class="section-layout <?= $arParams["CLASS_SECTION_POS_1"] ?>">
    <div class="container">
        <div class="row row-gap-4 row-gap-md-5 row-gap-lg-7">
            <? if(!empty($arResult["SECTIONS_UP_POSITION"])) : ?>
                <div class="card-offer-grid">
                    <? foreach ($arResult["SECTIONS_UP_POSITION"] as $key => $item) : ?>
                        <div class="card-product card-product--transparent <?if($key === 0):?>card-product--size-large<?endif;?> bg-dark-10 card-product--bg-white">
                            <div class="card-product__inner">
                                <div class="card-product__content">
                                    <h4 class="card-product__title"><?= $item["NAME"]?></h4>
                                    <? if (!empty($item["DESCRIPTION"])) : ?>
                                        <div class="rte m-0 gap-3 gap-lg-4">
                                            <p><?= $item["DESCRIPTION"] ?></p>
                                        </div>
                                    <? endif; ?>
                                </div>
                                <?if (!empty($item["PICTURE"])) :?>
                                    <img class="card-product__img" src="<?= $item["PICTURE"]["SRC"]?>" alt="" loading="lazy">
                                <?endif;?>
                                <a class="btn btn-link btn-icon m-auto m-lg-0 py-2 py-lg-0<?if($key === 0):?> m-md-0<?endif;?>" href="<?= $item["SECTION_PAGE_URL"] ?>">
                                    <span><?= Loc::getMessage("FL_CATALOG_LINK_DETAIL_TITLE")?></span>
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
            <? if ($arParams["SHOW_AD_INTERNET_BANK"] === "Y") : ?>
                <? $APPLICATION->IncludeFile('/local/php_interface/include/internet_bank_for_business.php'); ?>
            <? endif; ?>
            <? if(!empty($arResult["SECTIONS_CENTER_POSITION_1"]) || !empty($arResult["SECTIONS_CENTER_POSITION_2"])) : ?>
                <div class="col-12">
                    <div class="d-flex flex-column cards-gap">
                        <div class="row cards-gutter">
                            <? foreach ($arResult["SECTIONS_CENTER_POSITION_1"] as $key => $item): ?>
                                <div class="col-12 <? if($key <= 1) : ?>col-md-6<? endif; ?> col-lg-4">
                                    <a class="card-product card-product--transparent bg-white" href="<?= $item["SECTION_PAGE_URL"] ?>">
                                        <div class="card-product__inner">
                                            <div class="card-product__content mw-100">
                                                <h4 class="card-product__title"><?= $item["NAME"]?></h4>
                                            </div>
                                            <div class="card-product__footer">
                                                <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                                    <span><?= Loc::getMessage("FL_CATALOG_LINK_DETAIL_TITLE")?></span>
                                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                                    </svg>
                                                </span>
                                                <? if(!empty($item["ICON_PATH"])) : ?>
                                                    <img class="ms-auto icon size-xxl" src="<?= $item["ICON_PATH"]?>" alt="" loading="lazy">
                                                <? endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <? if(!empty($arResult["SECTIONS_CENTER_POSITION_2"])): ?>
                            <div class="collapse d-md-block" id="more-finorg">
                                <div class="row cards-gutter">
                                    <?foreach ($arResult["SECTIONS_CENTER_POSITION_2"] as $key => $item):?>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <a class="card-product card-product--transparent card-product--size-height-auto bg-white" href="<?= $item["SECTION_PAGE_URL"] ?>">
                                                <div class="card-product__inner">
                                                    <div class="card-product__content mw-100">
                                                        <h4 class="card-product__title"><?= $item["NAME"]?></h4>
                                                    </div>
                                                    <div class="card-product__footer">
                                                        <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                                            <span><?= Loc::getMessage("FL_CATALOG_LINK_DETAIL_TITLE")?></span>
                                                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                                            </svg>
                                                        </span>
                                                        <?if(!empty($item["ICON_PATH"])):?>
                                                            <img class="ms-auto icon size-xxl" src="<?= $item["ICON_PATH"]?>" alt="" loading="lazy">
                                                        <?endif;?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?endforeach;?>
                                </div>
                            </div>
                        <?endif;?>
                    </div>
                    <div class="col-12 d-md-none mt-4">
                        <a
                            class="d-flex gap-2 align-items-center justify-content-center violet-100 text-m fw-bold"
                            data-bs-toggle="collapse"
                            href="#more-finorg"
                            role="button"
                            aria-expanded="false"
                            aria-controls="more-finorg"><?= Loc::getMessage("FL_CATALOG_SHOW_ALL_TITLE")?>
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            <? endif; ?>
        </div>
    </div>
</section>
<? if ($arParams["SHOW_AD_OPEN_ACC_NOVIKOM"] === "Y") : ?>
    <? $APPLICATION->IncludeFile('/local/php_interface/include/open_account_novikom.php'); ?>
<? endif; ?>
<? if(!empty($arResult["SECTIONS_DOWN_POSITION"])) : ?>
    <section class="section-layout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:2" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                        <div class="swiper-wrapper">
                            <? foreach ($arResult["SECTIONS_DOWN_POSITION"] as $key => $item) : ?>
                                <div class="swiper-slide js-swiper-slide">
                                <div class="card-product card-product--yellow bg-dark-10">
                                    <div class="card-product__inner">
                                        <div class="card-product__content">
                                            <h4 class="card-product__title"><?= $item["NAME"]?></h4>
                                            <p class="card-product__description m-0"><?= $item["DESCRIPTION"]?></p>
                                        </div>
                                        <?if (!empty($item["PICTURE"])) :?>
                                            <img class="card-product__img" src="<?= $item["PICTURE"]["SRC"]?>" alt="" loading="lazy">
                                        <?endif;?>
                                        <a class="btn btn-link btn-icon m-auto m-lg-0" href="<?= $item["SECTION_PAGE_URL"] ?>">
                                            <span><?= Loc::getMessage("FL_CATALOG_LINK_DETAIL_TITLE_DOWN")?></span>
                                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                            </svg>
                                        </a>
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
            </div>
        </div>
    </section>
<? endif; ?>
