<?

use Dalee\Libs\Tabs\TabContent;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="px-lg-6">
    <div class="tabs-panel js-tabs-slider overflow-hidden position-relative swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden">
        <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
            <span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled swiper-button-lock" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-289f9e3bbe6c43eb" aria-disabled="true">
                <span class="icon size-s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </span>
            </span>
            <span class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled swiper-button-lock" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-289f9e3bbe6c43eb" aria-disabled="true">
                <span class="icon size-s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </span>
        </div>
        <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded" id="swiper-wrapper-289f9e3bbe6c43eb" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);" role="tablist">
            <? foreach ($arResult['ITEMS'] as $key => $tab): ?>
                <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2" role="group" aria-label="1 / 5">
                    <button
                        class="tabs-panel__list-item-link nav-link bg-transparent <?= $key == 0 ? 'active' : '' ?>"
                        data-bs-toggle="tab"
                        data-bs-target="#<?= $tab['ID'] ?>"
                        type="button"
                        role="tab"
                        aria-controls="<?= $tab['ID'] ?>"
                        aria-selected="true"
                    ><?= $tab['NAME'] ?? '' ?></button>
                </li>
            <? endforeach; ?>
        </ul>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
</div>
<div class="tab-content mt-4 mt-md-6 mt-lg-7">
    <? foreach ($arResult['ITEMS'] as $key => $tab): ?>
        <div
            class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>"
            id="<?= $tab['ID'] ?>"
            aria-labelledby="<?= $tab['ID'] ?>"
            tabindex="0"
            role="tabpanel"
        >
        <div class="px-lg-6">
            <?= TabContent::render(
                $tab['~DETAIL_TEXT'],
                $tab['DISPLAY_PROPERTIES'],
                $arParams['ELEMENT_ID'] ?? null,
                false
            ); ?>
        </div>
    </div>
    <? endforeach; ?>
</div>
