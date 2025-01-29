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
<div class="banner-hero__container swiper js-banner-hero" data-autoplay-delay="<?= \COption::GetOptionString( "novikom.settings", "UF_BANNER_DELAY")?>">
    <div class="swiper-wrapper">
        <?foreach ($arResult['ITEMS'] as $item) {?>
            <div class="swiper-slide">
                <div class="banner-hero-content row gx-0">
                    <div class="col-12 col-md-6 col-lg-9 col-xl-8 col-xxl-7 d-flex flex-column gap-3 gap-md-4 gap-xxl-6 align-items-md-start">
                        <div class="banner-hero-content__wrapper">
                            <h1 class="banner-hero-content__title"><?=$item['NAME']?></h1>
                            <p class="text-l mb-0"><?=$item['PROPERTIES']['TEXT']['~VALUE']?></p>
                            <a class="btn btn-secondary btn-lg-lg d-inline-block" href="<?=$item['PROPERTIES']['BUTTON_LINK']['~VALUE']?>">
                                <?=$item['PROPERTIES']['BUTTON_TEXT']['~VALUE']?>
                            </a>
                        </div>
                    </div>
                    <? if (!empty($item["PREVIEW_PICTURE"]["SRC"])) : ?>
                        <img class="banner-hero-content__bg" src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
                    <? elseif ($item["DISPLAY_PROPERTIES"]["FILE_VIDEO"]["FILE_VALUE"]["SRC"]) : ?>
                        <video class="banner-hero-content__bg" autoplay="" loop="" muted="" poster="">
                            <source src="<?= $item["DISPLAY_PROPERTIES"]["FILE_VIDEO"]["FILE_VALUE"]["SRC"] ?>" type="video/mp4">
                        </video>
                    <? endif; ?>
                </div>
            </div>
        <?}?>
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
            <?foreach ($arResult['ITEMS'] as $item) {?>
                <div class="swiper-slide banner-hero-thumb" role="button">
                    <h5><?=$item['NAME']?></h5>
                </div>
            <?}?>
        </div>
    </div>
</div>
