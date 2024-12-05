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

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);

$helper = $headerView->helper();
$placeholderManager = $arResult['PLACEHOLDER_CLASS'];

$headerView->render(
    $arResult['~PREVIEW_TEXT'] ?? $arResult['NAME'],
    null,
    ['bg-linear-blue', 'banner-text--border-green'],
    1
);
?>
<section class="section-layout py-lg-11">
    <div class="container">
        <? $placeholderManager->renderHtml($arResult['~DETAIL_TEXT']); ?>
    </div>
</section>
<?
if (!empty($arResult['DISPLAY_PROPERTIES']['TABS']['VALUE'])): ?>
    <section class="section-layout py-md-11 js-collapsed-mobile">
        <div class="container">
            <? if (!empty($arResult['DISPLAY_PROPERTIES']['TABS_HEADER']['~VALUE'])): ?>
                <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?= $arResult['DISPLAY_PROPERTIES']['TABS_HEADER']['~VALUE'] ?></h3>
                <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
                   href="#more-details" role="button" aria-expanded="false" aria-controls="more-details">Подробнее
                    <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </a>
            <? endif; ?>

            <? $renderer->render('Tabs', $arResult['DISPLAY_PROPERTIES']['TABS']['VALUE']); ?>
        </div>
    </section>
<? endif;

if (!empty($arResult['DISPLAY_PROPERTIES']['NEWS_SHOW']['VALUE'])): ?>

    <section class="section-layout py-lg-11 d-none d-lg-block">
        <div class="container">

            <? $renderer->render('NewsList', $arResult['DISPLAY_PROPERTIES']['NEWS_LIST']['VALUE']); ?>

        </div>
    </section>

<? endif;

$helper->saveCache();
