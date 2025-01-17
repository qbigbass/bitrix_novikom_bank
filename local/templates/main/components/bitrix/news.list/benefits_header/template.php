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

<div class="banner-product__benefits-list">
    <? foreach ($arResult['ITEMS'] as $arItem) : ?>
    <div class="d-inline-flex flex-column row-gap-2">
        <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 orange-100">
            <span class="h4"><?= $arItem['NAME'] ?></span>
        </div>
        <span class="d-block"><?= $arItem['PREVIEW_TEXT'] ?></span>
    </div>
    <? endforeach; ?>
</div>
