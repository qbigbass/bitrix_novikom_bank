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
<form class="form-feedback bg-white simple-callback-form" data-simple-callback-form>
    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
    <div>
        <label class="form-label" for="mobile-phone">Мобильный телефон</label>
        <input class="form-control form-control-lg-lg js-mask-phone" type="text" name="PHONE" id="mobile-phone" aria-describedby="mobile-phone-hint" placeholder="+7" data-input-call>
    </div>
    <button class="btn btn-primary btn-lg-lg w-100" type="button" data-bs-toggle="modal" data-bs-target="#callback_form">Перезвоните мне</button>
</form>

