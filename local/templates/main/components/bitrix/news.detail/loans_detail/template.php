<?
use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;

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

if (!empty($arParams["HEADER_COLOR_CLASS"])) {
    $arResult["PARAMS_HEADER_COLOR_CLASS"] = $arParams["HEADER_COLOR_CLASS"];
}

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
$helper = $headerView->helper();
$headerView
    ->setBtnClasses('btn-tertiary')
    ->render(
    $arResult['~NAME'],
    $arResult['~PREVIEW_TEXT'],
    null,
    0,
    $arResult
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
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE']) && !empty($arResult['PROPERTIES']['QUOTE_HEADER']['VALUE'])) { ?>
    <section class="section-layout pt-0 pb-xxl-11">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper bg-dark-10">
                                <div
                                    class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end"
                                         src="/frontend/dist/img/restructuring-additional-info.png" alt="">
                                    <div class="helper__content text-l">
                                        <h4 class="mb-3"><?= $arResult['PROPERTIES']['QUOTE_HEADER']['~VALUE'] ?></h4>
                                        <p class="mb-0"><?= $arResult['PROPERTIES']['QUOTE_TEXT']['VALUE']['TEXT'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['VALUE']) && !empty($arResult['PROPERTIES']['TEXT_BLOCK']['VALUE'])) { ?>
    <section class="section-layout py-lg-11 bg-blue-10">
        <div class="container">
            <div class="banner-product-info ps-lg-6">
                <div class="banner-product-info__header">
                    <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE'])) { ?>
                        <div class="tag tag--outline">
                            <span
                                class="tag__content text-s fw-semibold"><?= $arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE'] ?></span>
                            <span class="tag__triangle">
                                  <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                  </svg>
                            </span>
                        </div>
                    <? } ?>
                    <h3><?= $arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['~VALUE'] ?></h3>
                </div>
                <div class="banner-product-info__body">
                    <p class="text-l m-0"><?= $arResult['PROPERTIES']['TEXT_BLOCK']['~VALUE']['TEXT'] ?></p>
                    <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE']) && !empty($arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE'])) { ?>
                        <a class="btn btn-lg-lg btn-outline-primary fw-bold w-100 w-md-auto mt-6 mt-lg-7"
                           href="<?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE'] ?>">
                            <?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE'] ?>
                        </a>
                    <? } ?>
                </div>
                <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE'])) { ?>
                    <div class="banner-product-info__image">
                        <div class="polygon-container js-polygon-container">
                            <div class="polygon-container__content">
                                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE']) ?>"
                                     alt="<?= $arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['ALT'] ?>">
                            </div>
                            <div class="polygon-container__polygon js-polygon-container-polygon purple-70">
                                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-dasharray="10"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {
    $renderer->render('Steps', $arResult['PROPERTIES']['STEPS']['VALUE'], null, [
        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
        'stepsTemplate' => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'] ?? '',
    ]);
} ?>

<? $helper->saveCache(); ?>
