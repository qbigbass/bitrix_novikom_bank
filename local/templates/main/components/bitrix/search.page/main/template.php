<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

use Bitrix\Main\Grid\Declension;
use Bitrix\Main\Localization\Loc;

$resultsDeclension = new Declension('результат', 'результата', 'результатов');

?>
<section class="section-search-result section-layout py-lg-12 border-top border-blue10">
    <div class="container d-flex flex-column row-gap-6 row-gap-lg-7">
        <form class="row row-gap-4 row-gap-md-6 row-gap-lg-7 px-lg-6" method="get" id="search-form">
            <div class="col-12">
                <div class="input-group flex-nowrap d-none d-lg-flex">
                    <span class="input-group-icon">
                        <span class="icon violet-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                            </svg>
                        </span>
                    </span>
                    <input
                        class="form-control form-control-lg text-l"
                        id="input-search-desktop"
                        type="text"
                        name="q"
                        placeholder="Поиск по сайту"
                        aria-label="Поиск по сайту"
                        aria-describedby="input-search-desktop"
                        tabindex="-1"
                        value="<?= $arResult["REQUEST"]["QUERY"] ?>"
                    >
                </div>
                <div class="input-group flex-nowrap d-flex d-lg-none">
                    <span class="input-group-icon">
                        <span class="icon violet-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                            </svg>
                        </span>
                    </span>
                    <input
                        class="form-control ps-0 text-s"
                        id="input-search-mobile"
                        type="text"
                        placeholder="Поиск по сайту"
                        aria-label="Поиск по сайту"
                        aria-describedby="#input-search-mobile"
                        tabindex="-1"
                        value="<?= $arResult["REQUEST"]["QUERY"] ?>"
                    >
                </div>
                <button type="submit" style="visibility: hidden"><?= Loc::getMessage('SEARCH_GO'); ?></button>
            </div>
            <?if (!empty($arResult["REQUEST"]["QUERY"])) : ?>
                <div class="col-12">
                    <div class="text-l fw-bold">
                        <?if ($arResult["NAV_RESULT"]->NavRecordCount) : ?>
                            Найдено <?= $arResult["NAV_RESULT"]->NavRecordCount ?>&nbsp;<?= $resultsDeclension->get($arResult["NAV_RESULT"]->NavRecordCount) ?>
                        <?else : ?>
                            <?= Loc::getMessage("SEARCH_NOTHING_TO_FOUND"); ?>
                        <?endif;?>
                    </div>
                </div>
            <?endif;?>
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="d-flex flex-column flex-md-row gap-4 gap-md-6 align-items-start align-items-md-center">
                    <div class="position-relative w-100 w-md-50 w-lg-240w">
                        <input
                            class="js-date js-date--range js-date--today-max w-100 form-control"
                            id="search-datepicker"
                            type="text"
                            name="date"
                            placeholder="Показать за период"
                            value="<?= htmlspecialchars($arParams['REQUEST_DATE']); ?>"
                        >
                        <label class="cursor-pointer position-absolute top-0 end-0 violet-70 text-m p-2 px-3" for="search-datepicker">
                          <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                          </svg>
                        </label>
                    </div>
                    <div class="tabs-panel js-tabs-slider overflow-hidden position-relative tabs-panel--small w-auto px-0 ms-0">
                        <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                            <span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                                <span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg>
                                </span>
                            </span>
                            <span class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                                <span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                            </span>
                        </div>
                        <input type="hidden" name="how" value="<?= $arResult['REQUEST']['HOW'] ?>" id="search-how-input">
                        <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded" id="search-how-selector">
                            <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                <a class="tabs-panel__list-item-link nav-link bg-transparent <?= $arResult['REQUEST']['HOW'] === '' ? 'active' : ''; ?>" aria-current="page" href="#to-rel">
                                    По релевантности
                                </a>
                            </li>
                            <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                <a class="tabs-panel__list-item-link nav-link bg-transparent <?= $arResult['REQUEST']['HOW'] === 'd' ? 'active' : ''; ?>" href="#to-date">
                                    По дате
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
        <div class="row px-lg-6">
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="d-flex flex-column gap-4">
                    <?php foreach ($arResult['SEARCH'] as $arItem) : ?>
                        <div class="search-item d-flex flex-column gap-3 gap-md-4 pb-3 pb-md-4 border-bottom-dashed">
                            <div class="search-item__header">
                                <?if ($arItem["CHAIN_PATH"]) : ?>
                                    <div class="breadcrumbs d-flex flex-wrap gap-2 breadcrumbs--without-mobile-arrow search-item__breadcrumbs">
                                        <?= $arItem["CHAIN_PATH"] ?>
                                    </div>
                                <?endif;?>
                            </div>
                            <a class="search-item__content d-flex gap-2 gap-md-3 justify-content-between" href="<?= $arItem["URL"] ?>">
                                <div class="d-flex flex-column flex-md-row gap-2 gap-md-3">
                                    <span class="search-item__date text-m dark-70"><?= $arItem['DATE_CHANGE'] ?></span>
                                    <span class="search-item__name text-m dark-100" title="<?= $arItem["BODY_FORMATED"] ?>"><?= $arItem["TITLE_FORMATED"] ?></span>
                                </div>
                                <div class="d-none d-md-block">
                                    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <?if ($arParams["DISPLAY_BOTTOM_PAGER"] != "N" && $arResult["NAV_RESULT"]->NavPageCount > 1) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-search-result__pagination">
                        <?= $arResult["NAV_STRING"] ?>
                    </div>
                </div>
            </div>
        <?endif;?>
    </div>
</section>
