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
<div class="modal modal-xl fade" id="modal-consultation-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заявка на консультацию</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="callback-form" data-form enctype="multipart/form-data">
                    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                    <div class="application-form__step" data-form-validate-group>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation_region">Регион</label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" name="REGION" id="consultation_region" aria-label="Регион" data-placeholder="Выберите регион">
                                        <option></option>
                                        <option value="0">Москва</option>
                                        <option value="1">Москва</option>
                                        <option value="2">Москва</option>
                                    </select>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-8">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation_organization">Наименование организации<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="consultation_organization" type="text" name="ORGANIZATION" placeholder="Укажите организацию" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation_inn">ИНН</label>
                                    <input class="js-mask-inn form-control form-control-lg-lg" id="consultation_inn" type="text" name="INN" placeholder="Введите ИНН" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation_phone">Телефон<span class="orange-100 ms-1">*</span></label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="consultation_phone" type="text" name="PHONE" placeholder="+7" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation_e-mail">E-mail<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="consultation_e-mail" type="email" name="EMAIL" placeholder="Введите почту" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation_subject-question">Тема вопроса<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" name="SUBJECT_QUESTION" id="consultation_subject-question" aria-label="Тема вопроса" required>
                                        <option value="0" selected>Вопрос по резервированию</option>
                                        <option value="1">Вопрос по резервированию</option>
                                        <option value="2">Вопрос по резервированию</option>
                                    </select>
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
                                <div class="form-check">
                                    <input class="form-check-input" id="consultation_confirm" type="checkbox" name="request_confirm" value="" required data-form-checkbox data-form-input>
                                    <label class="form-check-label" for="consultation_confirm">Подтверждаю согласие на <a href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку персональных данных</a></label>
                                    <div class="invalid-feedback w-100" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled aria-disabled="true" data-form-button>Отправить</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div
                        class="js-message"
                        hidden aria-hidden="true"
                        data-success-title="Ваша заявка успешно отправлена!"
                        data-success-info="Мы ответим на вашу заявку, по выбранному способу связи, как только получим и обработаем её"
                        data-error-title="Не удалось отправить заявку"
                        data-error-info="Проверьте правильно ли указаны все данные и отправьте обращение снова"
                    ></div>
                </form>
            </div>
        </div>
    </div>
</div>
