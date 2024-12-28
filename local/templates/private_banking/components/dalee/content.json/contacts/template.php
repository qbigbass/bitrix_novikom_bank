<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
$this->setFrameMode(true);

global $pbModel;

$pbModel = $arResult['CONTENT_JSON'] ?? null;

?>
<section class="pb-section pb-section--bg-black">
    <div class="container">
        <div class="pb-card-office animate js-animation">
            <div class="pb-card-office__content d-flex flex-column align-items-start">
                <h3 class="pb-card-office__title mb-3 mb-lg-4">Контакты</h3>
                <p class="pb-card-office__text pr-text-color mb-0"><?= $pbModel['full_address'] ?></p>
                <div class="mt-auto d-flex justify-content-between align-items-center w-100">
                    <ul class="pb-card-office__list d-flex flex-column row-gap-2 row-gap-md-3 align-items-start">
                        <li><a href="mailto:<?= $pbModel['email'] ?>"><?= $pbModel['email'] ?></a></li>
                        <li><a href="tel:+<?= preg_replace('/\D+/', '', $pbModel['phone']); ?>"><?= $pbModel['phone'] ?></a></li>
                    </ul>
                    <div class="pb-card-office__qr d-none d-xl-block"><img src="<?= $pbModel['image'] ?>" alt="qr-код" loading="lazy" width="80" height="80"></div>
                </div>
            </div>
            <div class="pb-card-office__map"><img src="<?= $pbModel['map'] ?>" alt="qr-код" loading="lazy" width="80" height="80">" alt="карта" loading="lazy"></div>
        </div>
    </div>
</section>
