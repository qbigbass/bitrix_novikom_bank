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
?>
<form class="w-100">
    <div class="input-group flex-nowrap d-none d-lg-flex">
        <span class="input-group-icon bg-transparent">
            <span class="icon violet-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                </svg>
            </span>
        </span>
        <input
            class="form-control form-control-lg text-l bg-transparent"
            id="input-search"
            type="text"
            placeholder="<?= $arParams['PLACEHOLDER'] ?>"
            aria-label="<?= $arParams['PLACEHOLDER'] ?>"
            aria-describedby="input-search"
            tabindex="-1"
            data-type="search">
    </div>
    <div class="input-group flex-nowrap d-flex d-lg-none">
        <span class="input-group-icon bg-transparent">
            <span class="icon violet-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                </svg>
            </span>
        </span>
        <input
            class="form-control ps-0 text-s bg-transparent"
            id="input-search-mobile"
            type="text"
            placeholder="<?= $arParams['PLACEHOLDER'] ?>"
            aria-label="<?= $arParams['PLACEHOLDER'] ?>"
            aria-describedby="#input-search-mobile"
            tabindex="-1"
            data-type="search">
    </div>
</form>
