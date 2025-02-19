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
<? if (!empty($arResult["ITEMS"])) : ?>
    <div class="banner-hero <?= $arParams["CLASS_SECTION"] ?>">
        <div class="banner-hero__container swiper js-banner-hero" data-autoplay-delay="<?= UF_BANNER_DELAY ?>">
        <div class="swiper-wrapper">
            <? foreach($arResult["ITEMS"] as $item) : ?>
                <div class="swiper-slide">
                    <div class="banner-hero-content row gx-0">
                        <div class="col-12 col-md-6 col-lg-9 col-xl-8 col-xxl-7 d-flex flex-column gap-3 gap-md-4 gap-xxl-6 align-items-md-start">
                            <div class="banner-hero-content__wrapper">
                                <h1 class="banner-hero-content__title">
                                    <? if ($item["DETAIL_TEXT"]) : ?>
                                        <?= $item["DETAIL_TEXT"] ?>
                                    <? else : ?>
                                        <?= $item["NAME"] ?>
                                    <? endif; ?>
                                </h1>
                                <p class="text-l mb-0"><?= $item["PREVIEW_TEXT"] ?></p>
                                <? if (!empty($item["PROPERTIES"]["BUTTON_LINK"]["~VALUE"]) && !empty($item["PROPERTIES"]["BUTTON_TEXT"]["~VALUE"])) : ?>
                                    <a class="btn btn-secondary btn-lg-lg d-inline-block" href="<?= $item["PROPERTIES"]["BUTTON_LINK"]["~VALUE"] ?>">
                                        <?= $item["PROPERTIES"]["BUTTON_TEXT"]["~VALUE"] ?>
                                    </a>
                                <? endif; ?>
                            </div>
                            <? if (!empty($item["DISPLAY_PROPERTIES"]["FILE_VIDEO"]["FILE_VALUE"]["SRC"])) : ?>
                                <!-- Видео -->
                                <video class="banner-hero-content__bg" autoplay="" loop="" muted="" poster="">
                                    <source src="<?= $item["DISPLAY_PROPERTIES"]["FILE_VIDEO"]["FILE_VALUE"]["SRC"] ?>" type="video/mp4">
                                </video>
                            <? elseif (!empty($item["PREVIEW_PICTURE"]["SRC"])) : ?>
                                <!-- Изображение -->
                                <img class="banner-hero-content__bg" src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
                            <? elseif (!empty($item["DETAIL_PICTURE"]["SRC"])) : ?>
                                <!-- Иконка -->
                                <img class="banner-hero-content__image" src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $item["PROPERTIES"]["TEXT"]["~VALUE"] ?>">
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
        <div class="banner-hero-pagination"></div>
        <div class="banner-hero-controls">
            <button class="banner-hero-control banner-hero-control__prev" type="button">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </span>
            </button>
            <button class="banner-hero-control banner-hero-control__next" type="button">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </button>
        </div>
    </div>
    <div class="banner-hero__thumbs d-none d-lg-block">
        <div class="swiper js-banner-hero-thumbs">
            <div class="banner-hero__thumbs-wrapper swiper-wrapper">
                <? foreach ($arResult["ITEMS"] as $item) : ?>
                    <div class="swiper-slide banner-hero-thumb" role="button">
                        <h5><?= $item["NAME"]?></h5>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
    <? if (!empty(!empty($arParams["PATH_IMG_BG"]))) : ?>
        <picture class="pattern-bg">
            <source srcset="<?= $arParams["PATH_IMG_BG"] ?>-s.svg" media="(max-width: 767px)">
            <source srcset="<?= $arParams["PATH_IMG_BG"] ?>-m.svg" media="(max-width: 1199px)">
            <img src="<?= $arParams["PATH_IMG_BG"] ?>-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    <? endif; ?>
</div>
<? endif; ?>
