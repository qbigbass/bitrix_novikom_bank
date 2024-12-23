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
<div class="container">
    <div class="row row-gap-5">
        <div class="col-12 col-md-6">
            <div class="d-flex flex-column row-gap-5 flex-lg-row gap-lg-6 align-items-lg-center"><img src="/frontend/dist/img/logo-pb-footer.svg" alt="Новиком" width="196" height="56" loading="lazy">
                <p class="pb-footer__copyright m-0"><?= $pbModel['copyright'] ?></p>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="d-flex flex-column row-gap-2 align-items-start align-items-lg-end">
                <a class="pb-footer__text pb-footer__text--phone" href="tel:+<?= preg_replace('/\D+/', '', $pbModel['phone']); ?>"><?= $pbModel['phone'] ?></a>
                <p class="m-0 pb-footer__text"><?= $pbModel['full_address'] ?></p>
            </div>
        </div>
    </div>
</div>
