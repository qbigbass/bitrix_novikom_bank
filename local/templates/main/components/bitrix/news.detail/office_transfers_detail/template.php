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

$parentElementCode = basename($APPLICATION->GetCurPage());
$element = \Bitrix\Iblock\ElementTable::getList([
    'filter' => [
        'CODE' => $parentElementCode
    ],
    'select' => ['NAME', 'PREVIEW_TEXT']
])->fetch();

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);

$helper = $headerView->helper();

$headerView->render(
    $element['NAME'],
    $element['PREVIEW_TEXT'],
    ['bg-linear-blue', 'banner-text--border-green'],
);
?>

<section class="section-layout pt-xl-11">
    <div class="container">
        <div class="row px-lg-6">
            <div class="col-12">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "iblock_elements_ajax",
                    [
                        "ROOT_MENU_TYPE" => "iblock_sections",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => [
                        ],
                        "COMPONENT_TEMPLATE" => "iblock_elements_ajax",
                    ],
                );
                ?>
            </div>
        </div>
    </div>
</section>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>

        <section class="section-layout <?= $key % 2 != 0 ? 'bg-dark-10' : '' ?>">
            <div class="container">
                <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7"><?= $tab['TAB'] ?></h3>
                <div class="row px-lg-6">
                    <div class="stepper steps-<?= count($tab['VALUES']) > 3 ? 4 : 3 ?>">

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
                                    <p class="text-l mb-0"><?= $value ?></p>
                                </div>
                            </div>
                        <? } ?>

                    </div>
                </div>
            </div>
        </section>

    <? } ?>
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


<? $helper->saveCache(); ?>
