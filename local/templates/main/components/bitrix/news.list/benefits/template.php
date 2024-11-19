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
    <div class="col-12 col-md-6 col-lg-<?= 12 / $arParams['COL_COUNT']?>">
        <div class="benefit d-flex gap-3 flex-column">
            <img class="icon size-xl" src="<?= $benefit['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $benefit['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
            <div class="benefit__content d-flex flex-column gap-3">
                <? if (!empty($benefit['~PREVIEW_TEXT'])) { ?>
                    <h4 class="benefit__title"><?= $benefit['~NAME'] ?></h4>
                <? }

                $text = $benefit['~PREVIEW_TEXT'] ?: $benefit['~NAME'];

                if ($arParams['HEADER_TAG'] == 'h4') { ?>
                    <h4 class="benefit__title"><?= $text ?></h4>
                <? } else { ?>
                    <div class="benefit__description w-100 text-m rte mt-0"><?= $text ?></div>
                <? } ?>
                </span>
            </div>
        </div>
    </div>
<? } ?>


