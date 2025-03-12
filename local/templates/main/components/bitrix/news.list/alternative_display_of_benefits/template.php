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

<div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,tablet-album:2,laptop:2,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:16,laptop:40,laptop-x:40">
    <div class="slider-controls js-swiper-controls mb-3 mb-md-4">
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
    <div class="swiper-wrapper">
        <?foreach($arResult['ITEMS'] as $benefit): ?>
            <div class="swiper-slide js-swiper-slide">
            <div class="card-benefit d-inline-flex px-3 px-sm-5 px-lg-6 p-4 p-sm-5 p-lg-6 bg-dark-10 w-100 card-benefit--type-img">
                <div class="card-benefit__inner d-flex flex-column gap-6 gap-lg-7 justify-content-between h-100 w-100">
                    <div class="card-benefit__content d-flex flex-column gap-4">
                        <img class="card-benefit__image" src="<?=$benefit['PREVIEW_PICTURE']['SRC']?>" alt="<?=$benefit['PREVIEW_PICTURE']['ALT']?>">
                        <h4 class="card-benefit__title"><?=$benefit['~NAME']?></h4>
                        <p class="card-benefit__description text-m m-0"><?=$benefit['~PREVIEW_TEXT']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>

