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
<div class="modal modal-xl fade" id="modal-fraud-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Сообщить в банк телефон(ы) мошенников</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="fraud-form" data-form enctype="multipart/form-data">
                    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                    <div class="application-form__step" data-form-validate-group>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12 col-md-6">
                                <fieldset>
                                    <legend class="form-label mb-3">Вы&nbsp;являетесь клиентом банка НОВИКОМ?<span class="orange-100 ms-1">*</span></legend>
                                    <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="feedback_bank-client-true" name="BANK_CLIENT" value="true" checked>
                                            <label class="form-check-label" for="feedback_bank-client-true">Клиент Банка</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="feedback_bank-client-false" name="BANK_CLIENT" value="false">
                                            <label class="form-check-label" for="feedback_bank-client-false">Не Клиент Банка</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="fraud_phone">Укажите ваш номер телефона<span class="orange-100 ms-1">*</span></label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="fraud_phone" type="text" name="PHONE" placeholder="+7" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="fraud_phone-frauds">Телефоны мошенников<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="fraud_phone-frauds" type="text" name="PHONE_FRAUDS" placeholder="" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <fieldset>
                                    <legend class="form-label mb-3">Мошенникам озвучивались коды из&nbsp;СМС, пароли или&nbsp;были несанкционированные списания по&nbsp;картам?<span class="orange-100 ms-1">*</span></legend>
                                    <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="feedback_fraud-interaction-true" name="FRAUD_INTERACTION" value="true" checked>
                                            <label class="form-check-label" for="feedback_fraud-interaction-true">Да</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="feedback_fraud-interaction-false" name="FRAUD_INTERACTION" value="false">
                                            <label class="form-check-label" for="feedback_fraud-interaction-false">Нет</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="fraud_date-call">Дата звонка мошенников<span class="orange-100 ms-1">*</span></label>
                                    <div class="position-relative">
                                        <input class="js-mask-date form-control form-control-lg-lg js-date js-date--today-max" id="fraud_date-call" type="text" name="DATE_CALL" placeholder="" required autocomplete="off" data-form-input>
                                        <span class="position-absolute top-50 end-0 translate-middle-y violet-70 text-m p-2 px-3 pe-none">
                                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                                            </svg>
                                        </span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="undefined_add-info">Дополнительная информация (опишите ситуацию)<span class="orange-100 ms-1">*</span></label>
                                    <textarea class="form-control form-control-lg-lg" id="undefined_add-info" name="ADD_INFO" placeholder="Введите сообщение" required autocomplete="off" data-form-input></textarea>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <?php if ($arResult['USE_CAPTCHA'] === 'Y') : ?>
                                <?php $APPLICATION->IncludeComponent(
                                    "dalee:captcha",
                                    ".default",
                                    [
                                        "FORM_CODE" => $arParams['FORM_CODE'],
                                    ],
                                    $component
                                ); ?>
                            <?php endif;?>
                            <div class="application-form__col col-12">
                                <p class="text-m m-0">В&nbsp;ближайшее время для уточнения с&nbsp;Вами свяжется специалист Банка</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled aria-disabled="true" data-form-button>Отправить</button>
                            <button class="btn btn-outline-primary btn-lg-lg w-100 w-md-auto" type="button" data-bs-dismiss="modal">Отменить</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div
                        class="js-message"
                        hidden aria-hidden="true"
                        data-success-title="Ваше обращение успешно отправлено!"
                        data-success-info="Мы ответим на ваше обращение, по выбранному способу связи, как только получим и обработаем его"
                        data-error-title="Не удалось отправить обращение" data-error-info="Проверьте правильно ли указаны все данные и отправьте обращение снова"
                    ></div>
                </form>
            </div>
        </div>
    </div>
</div>
