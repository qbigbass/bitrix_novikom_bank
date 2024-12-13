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

<section class="pt-6 px-lg-6 border-top border-blue10 mb-11">
    <div class="container">
        <div class="row row-gap-6 row-gap-lg-7">
            <div class="col-12">
                <? $helper->deferredCall('showNavChain', ['press_center_detail', 1]); ?>
            </div>
            <div class="col-12">
                <h1 class="h2 mb-4 mb-md-5 mb-lg-6"><?= $arResult['~NAME'] ?></h1>
                <div class="d-flex gap-3 gap-md-4 align-items-center">
                    <span class="text-m dark-70"><?= $arResult['PROPERTIES']['PUBLICATION_DATE']['VALUE'] ?></span>
                </div>
            </div>
        </div>
        <div
            <? $placeholderManager->renderHtml($arResult['~DETAIL_TEXT']); ?>
        </div>

    </div>
</section>

<? $helper->saveCache(); ?>
