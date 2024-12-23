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

AddMessage2Log('here');

?>
<form class="pb-form d-flex flex-column row-gap-4 row-gap-lg-5" action="#">
    <h4 class="pb-form__title dark-0 text-center">Стать клиентом</h4>
    <div class="row g-1">
        <div class="col-12 col-md-6">
            <div class="d-flex flex-column row-gap-1 row-gap-lg-2">
                <label class="form-label form-label--pb mb-0" for="name">Имя</label>
                <input class="form-control form-control--pb" id="name" type="text" name="name" placeholder="Введите имя">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="d-flex flex-column row-gap-1 row-gap-lg-2">
                <label class="form-label form-label--pb mb-0" for="phone">Телефон</label>
                <input class="js-mask-phone form-control form-control--pb" id="phone" type="text" name="phone" aria-describedby="mobile-phone-hint" placeholder="+7">
            </div>
        </div>
    </div>
    <div class="row g-1">
        <div class="col-12 col-md-8">
            <div class="d-flex flex-column row-gap-1 row-gap-lg-2">
                <label class="form-label form-label--pb mb-0" for="select-date">Удобное время для звонка</label>
                <select class="form-select js-select js-select-date" id="select-date" aria-label="Выберите дату"></select>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-control-time">
                <input class="form-control form-control--pb" id="hours" type="number" name="hours" min="1" max="24" placeholder="19">
                <input class="form-control form-control--pb" id="minutes" type="number" name="minutes" min="0" max="59" placeholder="00">
            </div>
        </div>
    </div>
    <div class="form-check form-check--pb">
        <input class="form-check-input" id="personal" type="checkbox" checked>
        <label class="form-check-label" for="personal">Я&nbsp;согласен с&nbsp;условиями использования банком моих персональных данных для обработки данного обращения</label>
    </div>
    <div class="pb-form__footer d-flex justify-content-center">
        <button class="btn btn-pb btn-pb--primary w-100 w-md-auto" type="submit">Отправить</button>
    </div>
</form>
