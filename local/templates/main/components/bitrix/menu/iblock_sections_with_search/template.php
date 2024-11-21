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

$path = basename($APPLICATION->GetCurPage()); ?>

<div class="w-100 d-flex align-items-center flex-column flex-xl-row gap-4 gap-xl-6">
    <div class="w-100 w-xl-auto">
        <div
            class="tabs-panel js-tabs-slider overflow-hidden position-relative px-1 tabs-panel--small">
            <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                <span
                    class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev h-100 d-flex align-items-center justify-content-start px-1 z-3 position-absolute start-0 top-0">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                        </svg>
                    </span>
                </span>
                <span
                    class="tabs-panel__navigation-item js-tabs-slider-navigation-next h-100 d-flex align-items-center justify-content-end px-1 z-3 position-absolute end-0 top-0">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </span>
                </span>
            </div>
            <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded section-catalog__tab-list">
                <? foreach ($arResult as $key => $menuItem) { ?>

                    <? $class = basename($menuItem['LINK']) == $path ? ' active' : ''; ?>

                    <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                        <a class="tabs-panel__list-item-link nav-link bg-transparent section-catalog__tab-list-item<?= $class ?>"
                           href="<?= $menuItem['LINK'] ?>">
                            <?= $menuItem['TEXT'] ?>
                        </a>
                    </li>
                <? } ?>
            </ul>
        </div>
    </div>
    <div class="d-inline-flex flex-column flex-sm-row w-100 gap-2 gap-md-6">
        <select class="form-select form-select--size-small js-select" id="select-product"
                aria-label="Все продукты" data-placeholder="Все продукты">
            <option></option>
            <option value="1">Продукт 1</option>
            <option value="2" disabled>Продукт 2</option>
            <option value="3">Продукт 3</option>
            <option value="4">Продукт 4</option>
        </select>
        <select class="form-select form-select--size-small js-select" id="select-region"
                aria-label="Все регионы" data-placeholder="Все регионы">
            <option></option>
            <option value="1">Регион 1</option>
            <option value="2" disabled>Регион 2</option>
            <option value="3">Регион 3</option>
            <option value="4">Регион 4</option>
        </select>
    </div>
</div>
