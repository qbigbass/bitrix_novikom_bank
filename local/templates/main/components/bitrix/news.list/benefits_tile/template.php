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

<? foreach ($arResult['ITEMS'] as $benefit) { ?>
    <div class="col-12 col-md-6">
        <div class="card-benefit d-inline-flex px-3 px-sm-5 px-lg-6 p-4 p-sm-5 p-lg-6 w-100 bg-purple-10 card-benefit--type-img h-100">
            <div class="card-benefit__inner d-flex flex-column gap-3 gap-md-4 justify-content-between h-100 w-100">
                <div class="card-benefit__content d-flex flex-column gap-3 gap-md-4">
                    <img class="card-benefit__image" src="<?= $benefit['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $benefit['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                    <h4 class="card-benefit__title"><?= $benefit['~NAME'] ?></h4>
                    <?= $benefit['~PREVIEW_TEXT'] ?>
                </div>
            </div>
        </div>
    </div>
<? } ?>
