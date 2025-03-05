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

use Dalee\Helpers\ComponentHelper;
use Dalee\Helpers\ComponentRenderer\Renderer;

$parentTemplateFolder = $component->GetParent()->getTemplate()->GetFolder();
$helper = new ComponentHelper($component);
$renderer = new Renderer($APPLICATION, $component);
?>

<?$APPLICATION->IncludeFile(
    $parentTemplateFolder . '/include/header.php',
    [
        'helper' => $helper,
        'arResult' => $arResult
    ]
)?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_1']['~VALUE']['TEXT'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <div class="row row-gap-5 row-gap-md-6 row-gap-lg-7">
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_1']['~VALUE'])): ?>
                    <div class="col-12">
                        <h3><?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_1']['~VALUE']?></h3>
                    </div>
                <?endif;?>
                <div class="col-12">
                    <p class="text-l m-0 rte"><?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_1']['~VALUE']['TEXT']?></p>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE'])): ?>
                <div class="row mb-6 mb-lg-7">
                    <h3><?=$arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE']?></h3>
                </div>
            <?endif;?>
            <div class="row row-gap-6">

                <? $renderer->render('Benefits', $arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE']); ?>

            </div>
            <div class="collapse d-md-none" id="biometric-more-benefits">
                <div class="row row-gap-6 mt-6">
                    <div class="col-12">
                        <div class="benefit d-flex gap-3 flex-column">
                            <img class="icon size-xl" src="/frontend/dist/img/icons/icon-money.svg" alt="icon" loading="lazy">
                            <div class="benefit__content d-flex flex-column gap-3">
                                <div class="benefit__description w-100 text-m">
                                    <span>Регистрация в системе является добровольной</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-md-none mt-6">
                <div class="col-12">
                    <a class="d-flex gap-2 align-items-center justify-content-center violet-100 text-m fw-bold" data-bs-toggle="collapse" href="#biometric-more-benefits" role="button" aria-expanded="false" aria-controls="biometric-more-benefits">
                        Ещё преимущества
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {

    $renderer->render('Steps', $arResult['PROPERTIES']['STEPS']['VALUE'], null, [
        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
        'stepsTemplate' => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'] ?? '',
    ]);

} ?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_2']['~VALUE']['TEXT'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <div class="row row-gap-5 row-gap-md-6 row-gap-lg-7">
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_2']['~VALUE'])): ?>
                    <div class="col-12">
                        <h3><?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_2']['~VALUE']?></h3>
                    </div>
                <?endif;?>
                <div class="col-12 m-0 rte">
                    <div>
                        <?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_2']['~VALUE']['TEXT']?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<? if(!empty($arResult['DISPLAY_PROPERTIES']['HTML']['~VALUE']['TEXT'])): ?>
    <section class="section-layout bg-dark-10">
        <? if (!empty($arResult['DISPLAY_PROPERTIES']['HTML_HEADING']['~VALUE'])): ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="px-lg-6 mb-4">
                            <?= $arResult['DISPLAY_PROPERTIES']['HTML_HEADING']['~VALUE']; ?>
                        </h3>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <?= $arResult['DISPLAY_PROPERTIES']['HTML']['~VALUE']['TEXT']; ?>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['TABS']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?= $arResult['DISPLAY_PROPERTIES']['TABS_HEADING']['~VALUE'] ?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
               href="#additional-info-content" role="button" aria-expanded="false"
               aria-controls="additional-info-content">
                <?= $arResult['DISPLAY_PROPERTIES']['TABS_HEADING']['~VALUE'] ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>

            <? $renderer->render('Tabs', $arResult['PROPERTIES']['TABS']['VALUE'], null, ['elementId' => $arResult['ID']]); ?>

        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<?$helper->saveCache();?>
