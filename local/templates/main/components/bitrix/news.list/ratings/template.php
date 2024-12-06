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
$this->setFrameMode(true); ?>

<section class="section-layout py-lg-11">
    <div class="container">
        <h3 class="mb-5 mb-lg-7"><?= $arResult['NAME'] ?></h3>
        <div class="row">
            <div class="col-12">
                <div class="d-none d-lg-flex w-100">
                    <div class="tabs-panel js-tabs-slider overflow-hidden position-relative pe-1 pe-lg-0">
                        <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                            <span
                                class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                                <span class="icon size-s">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg>
                                </span>
                            </span>
                            <span
                                class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                                <span class="icon size-s">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                            </span>
                        </div>
                        <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                            <? foreach ($arResult['SECTIONS'] as $key => $section) {
                                $isFirst = $key == array_key_first($arResult['SECTIONS']); ?>

                                <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                    <button
                                        class="tabs-panel__list-item-link nav-link bg-transparent <?= $isFirst ? 'active' : '' ?>"
                                        data-bs-toggle="tab" data-bs-target="#<?= $key ?>" type="button" role="tab"
                                        aria-controls="<?= $key ?>"
                                        aria-selected="<?= $isFirst ? 'true' : 'false' ?>"><?= $section ?>
                                    </button>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <div class="d-block d-lg-none w-100">
                    <div
                        class="tabs-panel js-tabs-slider overflow-hidden position-relative pe-1 pe-lg-0 tabs-panel--small">
                        <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                            <span
                                class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                                <span class="icon size-s">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg>
                                </span>
                            </span>
                            <span
                                class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                                <span class="icon size-s">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                            </span>
                        </div>
                        <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                            <? foreach ($arResult['SECTIONS'] as $key => $section) {
                                $isFirst = $key == array_key_first($arResult['SECTIONS']); ?>

                                <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                    <button
                                        class="tabs-panel__list-item-link nav-link bg-transparent <?= $isFirst ? 'active' : '' ?>"
                                        data-bs-toggle="tab" data-bs-target="#<?= $key ?>" type="button" role="tab"
                                        aria-controls="<?= $key ?>"
                                        aria-selected="<?= $isFirst ? 'true' : 'false' ?>"><?= $section ?>
                                    </button>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <div class="tab-content mt-5 mt-lg-7">
                    <? foreach ($arResult['SECTIONS'] as $key => $section) {
                        $isFirst = $key == array_key_first($arResult['SECTIONS']); ?>
                        <div class="tab-pane fade show <?= $isFirst ? 'active' : '' ?>" id="<?= $key ?>"
                             aria-labelledby="<?= $key ?>" tabindex="0"
                             role="tabpanel">
                            <div class="swiper slider-cards js-slider-cards"
                                 data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3,laptop-x:3"
                                 data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                                <div class="swiper-wrapper">
                                    <? foreach ($arResult['ITEMS'] as $arItem) {

                                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                                        if ($arItem['IBLOCK_SECTION_ID'] != $key) continue; ?>
                                        <div class="swiper-slide js-swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                            <div class="card-top-list__col bg-blue-10 h-100 overflow-hidden">
                                                <div class="d-flex flex-column gap-4">
                                                    <div class="d-flex flex-column">
                                                        <img src="/frontend/dist/img/top-sm.svg" alt="Топ" width="138"
                                                             height="40"
                                                             loading="lazy">
                                                        <? if (!empty($arItem['DISPLAY_PROPERTIES']['IMAGE']['FILE_VALUE']['SRC'])) { ?>
                                                            <img
                                                                src="<?= $arItem['DISPLAY_PROPERTIES']['IMAGE']['FILE_VALUE']['SRC'] ?>"
                                                                alt="15" width="138"
                                                                height="86" loading="lazy">
                                                        <? } ?>
                                                    </div>
                                                    <p class="card-top-list__description dark-100 text-m mt-auto mb-0">
                                                        <?= $arItem['~PREVIEW_TEXT'] ?? '' ?>
                                                    </p>
                                                </div>
                                                <picture class="pattern-bg z-1 pattern-bg--position-sm-top">
                                                    <source
                                                        srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                                        media="(max-width: 767px)">
                                                    <source
                                                        srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                                        media="(max-width: 1199px)">
                                                    <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg"
                                                         alt="bg pattern"
                                                         loading="lazy">
                                                </picture>
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                                <div class="slider-controls js-swiper-controls mt-3 mt-md-4">
                                    <div class="slider-controls__pagination js-swiper-pagination"></div>
                                    <div class="slider-controls__navigation js-swiper-nav">
                                        <button class="swiper-button-prev js-swiper-prev" type="button">
                                            <span class="icon size-m">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use
                                                        xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="swiper-button-next js-swiper-next" type="button">
                                            <span class="icon size-m">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use
                                                        xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</section>


