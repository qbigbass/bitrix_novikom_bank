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

<section class="section-layout bg-dark-10">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xxl-6 d-flex flex-column gap-6 gap-lg-7">
                <a class="h3 d-flex align-items-center ps-lg-6 pt-xxl-6" href="/for-corporate-clients/customer-announcements/">
                    <span><?= $arResult["NAME"] ?></span>
                    <span class="icon size-m violet-100 ms-auto ms-md-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </span>
                </a>
                <div class="ps-lg-6 mt-xxl-auto mw-100">
                    <div class="swiper js-announcement-slider">
                        <div class="swiper-wrapper">
                            <? foreach ($arResult["ITEMS"] as $item) { ?>
                                <div class="swiper-slide js-announcement-slide">
                                    <a class="announcement" href="<?= $item["DETAIL_PAGE_URL"] ?>" tabIndex="-1">
                                        <span class="dark-70"><?= date('d.m.Y', strtotime($item["TIMESTAMP_X"])) ?></span>
                                        <span class="dark-100"><?= $item["NAME"] ?></span>
                                        <span class="icon size-m d-none d-md-inline-block ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            <? } ?>
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
    </div>
    <picture class="pattern-bg pattern-bg--hide-mobile">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
