<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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
<section class="section-layout bg-dark-30">
    <div class="container">
        <h3 class="mb-6 mb-lg-7 px-lg-6"><?= Loc::getMessage("CONTACT_BLOCK_TITLE") ?></h3>
        <div class="row">
            <div class="col-12">
                <div class="swiper slider-cards js-slider-cards"
                     data-slides-per-view="mobile-s:1,mobile:1,tablet:1,tablet-album:2,laptop:2,laptop-x:2"
                     data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:16,laptop:16,laptop-x:16"
                >
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['ITEMS'] as $item): ?>
                            <div class="swiper-slide js-swiper-slide">
                                <div class="contact-block contact-block--bg-white">
                                    <div class="contact-block__content d-flex flex-column justify-content-between row-gap-5 row-gap-md-6 row-gap-lg-7 h-100">
                                        <?if(!empty($item["PROPERTIES"]["DEPARTMENT"]["VALUE"])):?>
                                            <div class="tag tag--outline tag--triangle-absolute contact-block__tag">
                                                <?foreach ($item["DISPLAY_PROPERTIES"]["DEPARTMENT"]["LINK_ELEMENT_VALUE"] as $elemId => $arData):?>
                                                    <span class="tag__content text-s fw-semibold w-100 w-sm-auto"><?= $arData["NAME"] ?></span>
                                                <? endforeach; ?>
                                                <span class="tag__triangle">
                                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        <?endif;?>
                                        <div class="d-flex flex-column row-gap-2">
                                            <h4 class="contact-block__title"><?= $item["NAME"] ?></h4>
                                            <?if (!empty($item["PREVIEW_TEXT"])):?>
                                                <p class="mb-0 contact-block__description"><?= $item["PREVIEW_TEXT"] ?></p>
                                            <?endif;?>
                                        </div>
                                        <div class="mt-auto">
                                            <ul class="list-contact d-flex flex-column row-gap-3">
                                                <?if (!empty($item["PROPERTIES"]["PHONE"]["VALUE"])):?>
                                                    <li class="d-flex column-gap-3">
                                                        <span class="icon size-m flex-shrink-0 violet-100">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                                            </svg>
                                                        </span>
                                                        <div class="list-contact__text d-flex flex-wrap gap-2">
                                                            <a class="list-contact__link" href="tel:<?= $item["PROPERTIES"]["PHONE"]["VALUE"] ?>">
                                                                <span class="text-l"><?= $item["PROPERTIES"]["PHONE"]["VALUE"] ?></span>
                                                            </a>
                                                            <?if(!empty($item["PROPERTIES"]["PHONE_EXT"]["VALUE"])):?>
                                                                <span class="caption-m chip chip--outlined">доб. <?= $item["PROPERTIES"]["PHONE_EXT"]["VALUE"] ?></span>
                                                            <?endif;?>
                                                        </div>
                                                    </li>
                                                <?endif;?>
                                                <?if (!empty($item["PROPERTIES"]["EMAIL"]["VALUE"])):?>
                                                    <li class="d-flex column-gap-3">
                                                        <span class="icon size-m flex-shrink-0 violet-100">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                                                            </svg>
                                                        </span>
                                                        <div class="list-contact__text d-flex flex-wrap gap-2">
                                                            <a class="text-decoration-underline list-contact__link" href="mailto:<?= $item["PROPERTIES"]["EMAIL"]["VALUE"] ?>">
                                                                <span class="text-l"><?= $item["PROPERTIES"]["EMAIL"]["VALUE"] ?></span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?endif;?>
                                                <?if (!empty($item["PROPERTIES"]["ADDRESS"]["VALUE"])):?>
                                                <li class="d-flex column-gap-3">
                                                    <span class="icon size-m flex-shrink-0 violet-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-point"></use>
                                                        </svg>
                                                    </span>
                                                    <div class="list-contact__text d-flex flex-wrap gap-2">
                                                        <span class="text-l"><?= $item["PROPERTIES"]["ADDRESS"]["VALUE"] ?></span>
                                                    </div>
                                                </li>
                                                <?endif;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <div class="slider-controls js-swiper-controls mt-3">
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
