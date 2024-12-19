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
<div class="application-form__col col-12">
    <div class="d-flex flex-column flex-md-row align-items-start row-gap-2 column-gap-md-3">
        <div class="d-flex flex-column row-gap-2 flex-grow-1 w-100 w-md-auto">
            <input
                class="form-control form-control-lg-lg"
                id="<?= $arParams['FORM_CODE'] ?>_captcha"
                type="text"
                name="captcha_word"
                placeholder="Enter the code from the image"
                maxlength="50"
                required data-form-input
            >
            <div class="invalid-feedback" aria-live="polite"></div>
        </div>
        <div class="captcha d-flex align-items-center column-gap-3 flex-shrink-0">
            <input type="hidden" name="captcha_sid" class="captcha-sid" value="<?= htmlspecialchars($arResult['CAPTCHA_CODE']); ?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult['CAPTCHA_CODE']; ?>" class="captcha-image" alt="" title="Click to refresh the image" style="height: 56px;">
            <button class="icon size-m dark-70 captcha-audio-btn" type="button" aria-label="Click to play the code from the image" title="Click to refresh the image">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-audio-on"></use>
                </svg>
            </button>
        </div>
    </div>
</div>
