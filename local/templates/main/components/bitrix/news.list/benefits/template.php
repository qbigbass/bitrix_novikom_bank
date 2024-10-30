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
$this->setFrameMode(true);?>


<div class="row row-gap-6">

    <? foreach ($arResult['ITEMS'] as $benefit) { ?>
        <div class="col-12 col-md-6 col-lg-<?= 12 / $arParams['COL_COUNT']?>">
            <div class="benefit d-flex gap-3 flex-column">
                <img class="icon size-xl" src="<?= $benefit['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $benefit['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                <div class="benefit__content d-flex flex-column gap-3">
                    <? if (!empty($benefit['~PREVIEW_TEXT'])) { ?>
                        <h4 class="benefit__title"><?= $benefit['~NAME'] ?></h4>
                    <? } ?>
                    <span class="benefit__description w-100 w-md-75 text-m">
                        <?= $benefit['~PREVIEW_TEXT'] ?: $benefit['~NAME'] ?>
                    </span>
                </div>
            </div>
        </div>
    <? } ?>

</div>

