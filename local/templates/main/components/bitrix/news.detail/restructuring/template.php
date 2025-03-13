<?
use Dalee\Helpers\ComponentRenderer\Renderer;

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

$renderer = new Renderer($APPLICATION, $component);

if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['VALUE']) && !empty($arResult['PROPERTIES']['TEXT_BLOCK']['VALUE'])) { ?>
    <section class="section-layout py-lg-11 bg-blue-10">
        <div class="container">
            <div class="banner-product-info ps-lg-6">
                <div class="banner-product-info__header">
                    <? if ($arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE']) { ?>
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
