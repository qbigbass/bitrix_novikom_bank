<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="swiper-wrapper js-swiper-wrapper">
    <div class="swiper-slide js-swiper-slide">
        <div class="card-about bg-linear-blue">
            <div class="card-about__content d-flex flex-column row-gap-5 row-gap-md-6 row-gap-lg-7 h-100">

                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <div class="mt-auto d-flex flex-column gap-4 dark-0">
                        <div class="card-about__title-group d-flex flex-column gap-2">
                            <h4 class="card-about__title dark-0"><?= $arItem["NAME"] ?></h4>
                            <? if (!empty($arItem["PREVIEW_TEXT"])): ?>
                                <p class="mb-0 card-about__description text-white-50"><?= $arItem["PREVIEW_TEXT"] ?></p>
                            <? endif; ?>
                        </div>
                        <ul class="list-contact d-flex flex-column row-gap-3">
                            <? foreach ($arItem["PROPERTIES"]["PHONE"]["VALUE"] as $phone): ?>
                                <li class="d-flex column-gap-3">
                                    <span class="icon size-m flex-shrink-0 dark-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                        </svg>
                                    </span>
                                    <div class="list-contact__text d-flex flex-wrap gap-2">
                                        <a class="list-contact__link"
                                           href="tel:<?= preg_replace('/[^\d+]/', '', $phone) ?>">
                                            <span class="text-l"><?= $phone ?></span>
                                        </a>
                                    </div>
                                </li>
                            <? endforeach; ?>
                        </ul>
                    </div>
                <? endforeach; ?>

            </div>
        </div>
    </div>
    <div class="swiper-slide js-swiper-slide">
        <?$APPLICATION->IncludeFile('/local/php_interface/include/request_call_form.php');?>
    </div>
</div>
