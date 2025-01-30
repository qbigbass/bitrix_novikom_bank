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
<form class="pb-form" action="#" data-form>
    <div class="d-flex flex-column row-gap-4 row-gap-lg-5" data-form-validate-group>
        <h4 class="pb-form__title dark-0 text-center">Стать клиентом</h4>
        <div class="row g-1">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column row-gap-1 row-gap-lg-2 position-relative">
                    <label class="form-label form-label--pb mb-0" for="name">Имя</label>
                    <input class="form-control form-control--pb" id="name" type="text" name="name" placeholder="Введите имя" autocomplete="off" data-form-input required>
                    <div class="invalid-feedback" aria-live="polite"></div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column row-gap-1 row-gap-lg-2 position-relative">
                    <label class="form-label form-label--pb mb-0" for="phone">Телефон</label>
                    <input class="js-mask-phone form-control form-control--pb" id="phone" type="tel" name="phone" aria-describedby="mobile-phone-hint" placeholder="+7" required autocomplete="off" data-form-input pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}" data-error-message="Неверный формат">
                    <div class="invalid-feedback" aria-live="polite"></div>
                </div>
            </div>
        </div>
        <div class="row g-1">
            <div class="col-12 col-md-8">
                <div class="d-flex flex-column row-gap-1 row-gap-lg-2 position-relative">
                    <label class="form-label form-label--pb mb-0" for="select-date">Удобное время для звонка</label>
                    <select class="form-select js-select js-select-date" id="select-date" aria-label="Выберите дату"></select>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column row-gap-1 row-gap-lg-2 position-relative">
                    <div class="form-label form-label--pb mb-0" aria-hidden="true">&nbsp;</div>
                    <div class="form-control-time">
                        <div class="d-flex flex-column row-gap-1 row-gap-lg-2 position-relative">
                            <input class="form-control form-control--pb" id="hours" type="number" name="hours" min="1" max="24" placeholder="19" data-form-input>
                            <div class="invalid-feedback" aria-live="polite"></div>
                        </div>
                        <div class="d-flex flex-column row-gap-1 row-gap-lg-2 position-relative">
                            <input class="form-control form-control--pb" id="minutes" type="number" name="minutes" min="0" max="59" placeholder="00" data-form-input>
                            <div class="invalid-feedback" aria-live="polite"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-check form-check--pb">
            <input class="form-check-input" id="personal" type="checkbox" checked required data-form-checkbox data-form-input>
            <label class="form-check-label" for="personal">Я&nbsp;согласен с&nbsp;условиями использования банком моих персональных данных для обработки данного обращения</label>
            <div class="invalid-feedback" aria-live="polite"></div>
        </div>
        <div class="pb-form__footer d-flex flex-column align-items-center justify-content-center gap-5">
            <button class="btn btn-pb btn-pb--primary w-100 w-md-auto" type="submit" data-form-button aria-disabled="true" disabled>Отправить</button>
            <div class="text-m orange-100 text-center" data-form-error></div>
        </div>
    </div>
    <div class="js-message"
         hidden aria-hidden="true"
         data-success-title="Заявка отправлена"
         data-success-info="Ваша заявка отправлена, наш специалист свяжется с&amp;nbsp;вами в&amp;nbsp;выбранное время"
         data-error-title="Не удалось отправить заявку"
         data-error-info="Проверьте, правильно ли указаны все данные и отправьте заявку снова">
    </div>
</form>
