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
$this->setFrameMode(true);

use Dalee\Helpers\ComponentHelper;

$helper = new ComponentHelper($component);
$placeholderManager = $arResult['PLACEHOLDER_CLASS'];
?>

<section class="pt-6 px-lg-6 border-top border-blue10">
    <div class="container">
        <div class="row row-gap-6 row-gap-lg-7">
            <div class="col-12">
                <? $helper->deferredCall('showNavChain', ['press_center_detail', 1]); ?>
            </div>
            <div class="col-12">
                <h1 class="h2 mb-4 mb-md-5 mb-lg-6"><?= $arResult['~NAME'] ?></h1>
                <div class="d-flex gap-3 gap-md-4 align-items-center">
                    <? if (!empty($arResult['PROPERTIES']['TAG']['VALUE'])) : ?>
                        <div class="tag tag--outline tag--triangle-absolute">
                            <span class="tag__content text-s fw-semibold"><?= $arResult['PROPERTIES']['TAG']['VALUE'] ?></span>
                            <span class="tag__triangle">
                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                </svg>
                            </span>
                        </div>
                    <? endif; ?>
                    <span class="text-m dark-70"><?= $arResult['PROPERTIES']['PUBLICATION_DATE']['VALUE'] ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-layout py-lg-11">
    <div class="container">
        <? $placeholderManager->renderHtml($arResult['~DETAIL_TEXT']); ?>
    </div>
</section>

<? $helper->saveCache(); ?>
