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
$this->setFrameMode(true);
?>
<?php
//pre($arResult);
?>
<div class="banner-product banner-product--heavy-violet">
    <div class="banner-product__wrapper">
        <div class="banner-product__content">
            <div class="banner-product__header">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "",
                    Array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                );?>
                <h1><?= $arResult["NAME"] ?></h1>
                <p class="banner-product__subtitle"><?= $arResult["PREVIEW_TEXT"] ?></p>
            </div>
            <img class="banner-product__image" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>" loading="lazy">
            <div class="banner-product__benefits-list">
                <div class="d-inline-flex flex-column row-gap-2">
                    <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 green-100">
                        <span><?= $arResult["PROPERTIES"]["RATE_DETAIL"]["DESCRIPTION"] ?></span>
                        <span class="text-number-l fw-bold text-nowrap"><?= $arResult["PROPERTIES"]["RATE_DETAIL"]["VALUE"] ?></span>
                    </div>
                    <span class="d-block">Минимальная ставка</span>
                </div>
                <div class="d-inline-flex flex-column row-gap-2">
                    <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 green-100">
                        <span><?= $arResult["PROPERTIES"]["AMOUNT_DETAIL"]["DESCRIPTION"] ?></span>
                        <span class="text-number-l fw-bold text-nowrap"><?= $arResult["PROPERTIES"]["AMOUNT_DETAIL"]["VALUE"] ?></span>
                        <span class="text-number-l currency fw-bold">₽</span>
                    </div>
                    <span class="d-block">Максимальная сумма кредита</span>
                </div>
                <div class="d-inline-flex flex-column row-gap-2">
                    <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 green-100">
                        <span><?= $arResult["PROPERTIES"]["AMOUNT_DETAIL"]["DESCRIPTION"] ?></span>
                        <span class="text-number-l fw-bold text-nowrap"><?= $arResult["PROPERTIES"]["AMOUNT_DETAIL"]["VALUE"] ?></span>
                    </div>
                    <span class="d-block">Максимальный срок выплаты</span>
                </div>
            </div>
            <? if ($arResult['PROPERTIES']['BUTTON_DETAIL']['VALUE']) { ?>
                <a class="btn btn-tertiary btn-lg banner-product__button" href="#"><?= $arResult['PROPERTIES']['BUTTON_TEXT_DETAIL']['VALUE'] ?></a>
            <? } ?>
        </div>
    </div>
    <picture class="pattern-bg banner-product__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</div>
