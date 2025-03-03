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

use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
$helper = $headerView->helper();

$headerView->render(
    $arResult['~NAME'],
    $arResult['~PREVIEW_TEXT'],
    ['border-green'],
    0,
    $arResult,
);
?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])) : ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <h3 class="mb-4 mb-md-6 mb-lg-7">
                <?= $arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADER']['VALUE'] ?? 'Преимущества'; ?>
            </h3>
            <div class="row row-gap-6">
                <? $renderer->render('Benefits', $arResult['PROPERTIES']['BENEFITS']['VALUE']); ?>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT'])) : ?>
    <section class="section-layout py-6 py-lg-11">
        <div class="container">
            <div class="card-regal d-flex flex-column flex-md-row row-gap-3 column-gap-md-6 bg-dark-30">
                <img class="card-regal__image" src="<?= $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_IMG']['SRC'] ?>" width="200" height="200"
                     alt="" loading="lazy">
                <div class="card-regal__content d-flex flex-column row-gap-4">
                    <? if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_HEADING']['~VALUE'])): ?>
                        <div class="d-flex justify-content-between align-items-end violet-100">
                            <h4><?= $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_HEADING']['~VALUE'] ?></h4>
                        </div>
                    <? endif; ?>
                    <p class="text-l mb-0"><?= $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT'] ?></p>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['TABS']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6">
                <?= $arResult['DISPLAY_PROPERTIES']['TABS_HEADER']['VALUE'] ?? 'Установка'; ?>
            </h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
               href="#additional-info-content" role="button" aria-expanded="false"
               aria-controls="additional-info-content">
                Установка
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>

            <? $renderer->render('Tabs', $arResult['PROPERTIES']['TABS']['VALUE']); ?>

        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<? $helper->saveCache(); ?>
