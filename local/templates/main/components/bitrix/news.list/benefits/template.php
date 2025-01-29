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
$this->setFrameMode(true); ?>

<? foreach ($arResult['ITEMS'] as $arItem) : ?>
    <div class="col-12 col-md-6 col-lg-<?= 12 / $arParams['COL_COUNT'] ?>">
        <div class="benefit d-flex gap-3 flex-column">
            <? if (!empty($arItem['PREVIEW_PICTURE'])) : ?>
                <img class="icon size-xxl" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                 alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
            <? endif; ?>
            <div class="benefit__content d-flex flex-column gap-3">
                <? if (!empty($arItem['~PREVIEW_TEXT'])) : ?>
                    <h4 class="benefit__title"><?= $arItem['~NAME'] ?></h4>
                    <div class="benefit__description w-100 text-m>"><?= $arItem['~PREVIEW_TEXT'] ?></div>
                <? else: ?>
                    <div class="benefit__description w-100 text-m>"><?= $arItem['~NAME'] ?></div>
                <? endif; ?>
            </div>
        </div>
    </div>
<? endforeach; ?>
