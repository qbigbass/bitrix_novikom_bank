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

<?$helper->saveCache();?>
