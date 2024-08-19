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
<img src="/frontend/build/assets/slides/hero_banner_bg_desktop.png" class="main-slider__bg" alt="">
<div class="main-slider__container swiper swiper-container">
    <div class="main-slider__wrapper swiper-wrapper">
        <?foreach ($arResult['ITEMS'] as $item) {?>
            <div class="swiper-slide main-slider__slide">
                <div class="main-slider__content">
                    <div class="main-slider-content">
                        <div class="main-slider-content__text">
                            <h2 class="main-slider-content__title"><?=$item['NAME']?></h2>
                            <p class="body-l-light"><?=$item['PROPERTIES']['TEXT']['~VALUE']?></p>
                            <a href="<?=$item['PROPERTIES']['BUTTON_LINK']['~VALUE']?>" theme="dark" class="a-button main-slider-content__button a-button--m a-button--secondary a-button--link">
                                <?=$item['PROPERTIES']['BUTTON_TEXT']['~VALUE']?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?}?>
    </div>

    <div class="main-slider-pagination"></div>
    <div class="main-slider-controls">
        <button type="button" class="main-slider-control main-slider-control__prev">
            <span class="a-icon">
                <svg>
                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                </svg>
            </span>
        </button>
        <button type="button" class="main-slider-control main-slider-control__next">
            <span class="a-icon">
                <svg>
                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                </svg>
            </span>
        </button>
    </div>
</div>

<div class="main-slider__thumbs swiper">
    <div class="main-slider__thumbs-wrapper swiper-wrapper">
        <?foreach ($arResult['ITEMS'] as $item) {?>
            <button class="swiper-slide main-slider-thumb">
                <span class="headline-4"><?=$item['NAME']?></span>
            </button>
        <?}?>
    </div>
</div>
