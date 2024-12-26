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

use Dalee\Helpers\HeaderView;

$headerView = new HeaderView($component);
$helper = $headerView->helper();
$result['DETAIL_PICTURE']['SRC'] = '/frontend/dist/img/big-illustrations/large-individual/fraud-protection.png';
$headerView->render(
    $APPLICATION->GetTitle(),
    $APPLICATION->GetProperty("description"),
    ['bg-linear-blue'],
    0,
    $result
);

if (!empty($arResult['SECTIONS_FRAUD_PROTECTION'])) {
    foreach ($arResult['SECTIONS_FRAUD_PROTECTION'] as $section) {
        if ($section['CODE'] === 'safety-rules' && !empty($section['ITEMS'])) {?>
            <section class="section-layout px-lg-6">
                <div class="container">
                    <h3 class="mb-6 mb-lg-7"><?= $section['NAME'] ?></h3>
                    <div class="row row-gap-6 gx-xl-6"><?
                        foreach ($section['ITEMS'] as $item) {?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="benefit d-flex gap-3 flex-column">
                                    <? if (!empty($item['ICON'])) : ?>
                                        <img class="icon size-xxl" src="<?= $item['ICON'] ?>" alt="icon" loading="lazy">
                                    <? endif; ?>
                                    <div class="benefit__content d-flex flex-column gap-3">
                                        <div class="benefit__description w-100 text-m">
                                            <span>
                                                <?= $item['NAME'] ?>
                                                <br class="d-block">
                                                <br class="d-block"><?= $item['PREVIEW_TEXT'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><?
                        }?>
                    </div>
                </div>
            </section>
        <?}
        if ($section['CODE'] === 'signs-fraudulent-call' && !empty($section['ITEMS'])) {?>
            <section class="section-layout px-lg-6">
                <div class="container">
                    <h3 class="mb-6 mb-lg-7"><?= $section['NAME'] ?></h3>
                    <div class="table-tab cell-2">
                        <div class="table-tab__body"><?
                            foreach ($section['ITEMS'] as $item) {?>
                                <div class="table-tab__row">
                                    <div class="table-tab__cell text-l fw-semibold dark-70"><?= $item['NAME'] ?></div>
                                    <div class="table-tab__cell">
                                        <p class="text-l"><?= $item['PREVIEW_TEXT'] ?></p>
                                    </div>
                                </div><?
                            }?>
                        </div>
                    </div>
                </div>
                <picture class="pattern-bg">
                    <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                </picture>
            </section>
        <?}
        if ($section['CODE'] === 'keep-data-secret' && !empty($section['ITEMS'])) {?>
            <section class="section-layout bg-dark-10">
                <div class="container">
                    <h3 class="mb-6 mb-md-7 px-md-6"><?= $section['NAME'] ?></h3>
                    <div class="row cards-gutter"><?
                        foreach ($section['ITEMS'] as $item) {?>
                            <div class="col-12 col-md-6 col-xl-3"><a class="card-product card-product--transparent card-product--bg-white" href="#">
                                    <div class="card-product__inner">
                                        <div class="card-product__content mw-100">
                                            <h4 class="card-product__title"><?= $item['NAME'] ?></h4>
                                            <p class="card-product__description m-0 mw-100"><?= $item['PREVIEW_TEXT'] ?></p>
                                        </div>
                                        <div class="card-product__footer"><img class="icon size-xxl" src="<?= $item['ICON'] ?>" alt="" loading="lazy">
                                        </div>
                                    </div></a>
                            </div><?
                        }?>
                    </div>
                </div>
            </section>
        <?}
        if ($section['CODE'] === 'most-common-types-fraud' && !empty($section['ITEMS'])) {?>
            <section class="section-layout">
                <div class="container">
                    <h3 class="mb-6 mb-lg-7 px-lg-6"><?= $section['NAME'] ?></h3>
                    <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1" data-space-between="mobile-s:8,mobile:8" data-slider-breakpoint-destroy="tablet">
                        <div class="swiper-wrapper js-swiper-wrapper cards-gutter"><?
                            foreach ($section['ITEMS'] as $item) {?>
                                <div class="swiper-slide js-swiper-slide col-md-6 col-xl-4">
                                    <div class="card-benefit d-inline-flex px-3 px-sm-5 px-lg-6 p-4 p-sm-5 p-lg-6 w-100 bg-dark-10 card-benefit--type-img">
                                        <div class="card-benefit__inner d-flex flex-column gap-6 gap-lg-7 justify-content-between h-100 w-100">
                                            <div class="card-benefit__content d-flex flex-column gap-4"><img class="card-benefit__image" src="<?= $item['ICON'] ?>" alt="<?= $item['NAME'] ?>" loading="lazy">
                                                <h4 class="card-benefit__title"><?= $item['NAME'] ?></h4>
                                            </div>
                                            <div class="card-benefit__read-more d-flex align-items-end justify-content-between"><a class="text-m btn btn-link btn-lg d-inline-flex gap-2 align-items-center" href><span class="fw-bold">Подробнее</span>
                                                    <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><?
                            }?>
                        </div>
                        <div class="slider-controls js-swiper-controls mt-3 mt-md-4">
                            <div class="slider-controls__pagination js-swiper-pagination"></div>
                            <div class="slider-controls__navigation js-swiper-nav">
                                <button class="swiper-button-prev js-swiper-prev" type="button"><span class="icon size-m">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                  </svg></span></button>
                                <button class="swiper-button-next js-swiper-next" type="button"><span class="icon size-m">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                  </svg></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?}
        if ($section['CODE'] === 'call-urgently' && !empty($section['ITEMS'])) {?>
            <section class="section-layout px-lg-6">
                <div class="container">
                    <div class="row row-gap-6">
                        <div class="col-12">
                            <h3><?= $section['NAME'] ?></h3>
                        </div>
                        <div class="col-12">
                            <ul class="list list--size-l"><?
                                foreach ($section['ITEMS'] as $item) {?>
                                    <li><?= $item['NAME'] ?></li><?
                                }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <?}
    }
}

$helper->saveCache();
