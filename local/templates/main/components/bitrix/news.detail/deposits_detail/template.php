<?
use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$terms = [
    'RATE_TO' => [
        'SIGN' => 'При ключевой ставке<br>Банка России на ' . date('d.m.Y'),
        'FROM_TO' => 'до&nbsp;',
    ],
    'PERIOD_FROM' => [
        'SIGN' => 'Минимальный срок вклада',
        'FROM_TO' => 'от&nbsp;',
        'PERIOD' => 'days'
    ],
    'SUM_FROM' => [
        'SIGN' => 'Минимальная сумма вклада',
        'FROM_TO' => 'от&nbsp;',
    ],
];

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);

$helper = $headerView->helper();

$headerView->render(
    "Вклад «" . $arResult["~NAME"] . "»",
    $arResult['~PREVIEW_TEXT'],
    null,
    0,
    $arResult,
    $terms
);
?>

<? if (!empty($arResult['PROPERTIES']['BENEFITS']['VALUE'])) { ?>
    <section class="section-benefits px-0 px-lg-6 py-6 py-sm-9 py-md-11 py-xl-16 position-relative overflow-hidden">
        <div class="container">
            <div class="row mb-6 mb-lg-7">
                <h3><?= $arResult['PROPERTIES']['BENEFITS_HEADER']['~VALUE'] ?></h3>
            </div>
            <div class="row row-gap-6">

                <? $renderer->render('Benefits', $arResult['PROPERTIES']['BENEFITS']['VALUE']); ?>

            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom section-restructuring-benefits__pattern">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['VALUE']) && !empty($arResult['PROPERTIES']['TEXT_BLOCK']['VALUE'])) { ?>
    <section class="section-layout py-lg-11 bg-blue-10">
        <div class="container">
            <div class="banner-product-info ps-lg-6">
                <div class="banner-product-info__header">
                    <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE'])) { ?>
                        <div class="tag tag--outline">
                            <span class="tag__content text-s fw-semibold"><?= $arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE'] ?></span>
                            <span class="tag__triangle">
                                  <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                  </svg>
                            </span>
                        </div>
                    <? } ?>
                    <h3><?= $arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['~VALUE'] ?></h3>
                </div>
                <div class="banner-product-info__body">
                    <p class="text-l m-0"><?= $arResult['PROPERTIES']['TEXT_BLOCK']['VALUE']['TEXT'] ?></p>
                    <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE']) && !empty($arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE'])) { ?>
                        <a class="btn btn-lg-lg btn-outline-primary fw-bold w-100 w-md-auto mt-6 mt-lg-7" href="<?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE'] ?>">
                            <?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE'] ?>
                        </a>
                    <? } ?>
                </div>
                <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE'])) { ?>
                    <div class="banner-product-info__image">
                        <div class="polygon-container js-polygon-container">
                            <div class="polygon-container__content">
                                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE']) ?>" alt="<?= $arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['ALT'] ?>" loading="lazy">
                            </div>
                            <div class="polygon-container__polygon js-polygon-container-polygon purple-70">
                                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['TABS']['VALUE'])) { ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-flex mb-md-6 mb-lg-7 px-lg-6"><?= $arResult['PROPERTIES']['TABS_HEADER']['~VALUE'] ?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#additional-info-content" role="button" aria-expanded="false" aria-controls="additional-info-content">
                <?= $arResult['PROPERTIES']['TABS_HEADER']['~VALUE'] ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>

            <? $renderer->render('Tabs', $arResult['PROPERTIES']['TABS']['VALUE']); ?>

        </div>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) { ?>
    <section class="section-restructuring-steps section-layout bg-dark-10">
        <div class="container">
            <div class="row px-lg-6">
                <div class="d-none d-md-flex justify-content-between">
                    <h3 class="h3"><?= $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?></h3>
                    <div class="d-inline-flex">
                        <ul class="nav nav-tabs" role="tablist">
                            <? foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link<?= $key == 0 ? ' active' : '' ?>"
                                        data-bs-toggle="tab"
                                        data-bs-target="#<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                        type="button"
                                        role="tab"
                                        aria-controls="<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                        <?= $key == 0 ? ' aria-selected' : '' ?>
                                    >
                                        <?= $tab['TAB'] ?>
                                    </button>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#restructuring-steps-content" role="button" aria-expanded="false" aria-controls="restructuring-steps-content">
                    <?= $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?>
                    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </a>
            </div>
            <div class="section-restructuring-steps__wrapper collapse d-md-block mt-6 mt-lg-7" id="restructuring-steps-content">
                <div class="d-inline-flex d-md-none w-100 mb-6">
                    <ul class="nav nav-tabs" role="tablist">
                        <? foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link<?= $key == 0 ? ' active' : '' ?>"
                                    data-bs-toggle="tab"
                                    data-bs-target="#<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                    type="button"
                                    role="tab"
                                    aria-controls="<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                    <?= $key == 0 ? ' aria-selected' : '' ?>
                                >
                                    <?= $tab['TAB'] ?>
                                </button>
                            </li>
                        <? } ?>
                    </ul>
                </div>
                <div class="tab-content">

                    <? foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>
                        <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>" id="<?= Cutil::translit($tab['TAB'], "ru") ?>" role="tabpanel" aria-labelledby="loan" tabindex="0">
                            <div class="row row-gap-6 px-lg-6">
                                <div class="stepper steps-3">

                                    <? foreach ($tab['VALUES'] as $innerKey => $value) { ?>
                                        <div class="stepper-item stepper-item--color-green">
                                            <div class="stepper-item__header">
                                                <div class="stepper-item__number">
                                                    <div class="stepper-item__number-value"><?= $innerKey + 1 ?></div>
                                                    <div class="stepper-item__number-icon">
                                                        <?= getStepperIcons($innerKey) ?>
                                                    </div>
                                                </div>
                                                <div class="stepper-item__arrow"></div>
                                            </div>
                                            <div class="stepper-item__content">
                                                <h4><?= $tab['DESCRIPTIONS'][$innerKey] ?></h4>
                                                <p class="text-l no-mb">
                                                    <?= $value ?>
                                                </p>
                                            </div>
                                        </div>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    <? } ?>

                </div>
            </div>
        </div>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE']) && !empty($arResult['PROPERTIES']['QUOTE_HEADER']['VALUE'])) { ?>
    <section class="section-layout py-lg-11 px-lg-6 bg-blue-10">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-start gap-4 gap-sm-5 gap-md-6">
                <div class="banner-product-info-alternative__image flex-shrink-0">
                    <img src="<?= CFile::GetPath($arResult['PROPERTIES']['QUOTE_IMG']['VALUE']) ?>" width="160" height="160" alt="" loading="lazy">
                </div>
                <div class="banner-product-info-alternative d-flex flex-column gap-4 gap-md-6">
                    <div class="banner-product-info-alternative__header">
                        <h3><?= $arResult['PROPERTIES']['QUOTE_HEADER']['~VALUE'] ?></h3>
                    </div>
                    <div class="banner-product-info-alternative__body d-flex flex-column gap-4 gap-md-6">
                        <p class="m-0 text-l pe-0 col-lg-8"><?= $arResult['PROPERTIES']['QUOTE_TEXT']['~VALUE']['TEXT'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-top">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? $helper->saveCache(); ?>
