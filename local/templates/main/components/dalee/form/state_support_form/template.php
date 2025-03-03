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
<div class="modal modal-xl fade" id="<?=$arResult['FORM_CODE']?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заявка на&nbsp;господдержку</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="state-support-form" data-form data-form-feedback enctype="multipart/form-data">
                    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                    <div class="application-form__step" data-form-step data-form-validate-group>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="form-step">
                                    <div class="form-step__item text-m fw-semibold"><span>1/2</span><span>Об организации</span></div>
                                    <progress class="form-step__progress" value="1" max="2"></progress>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_organization">Наименование организации<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="state-support_organization" type="text" name="ORGANIZATION" placeholder="Введите наименование" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_subject">Субъект МСП<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="state-support_subject" type="text" name="SUBJECT" placeholder="Укажите субъект" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_inn">ИНН<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="state-support_inn" type="text" name="INN" placeholder="Укажите ИНН" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_okved">ОКВЭД<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="state-support_okved" type="text" name="OKVED" placeholder="Укажите ОКВЭД" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_location">Местоположение компании<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="state-support_location" type="text" name="LOCATION" placeholder="Введите полный адрес компании" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-1 g-md-2 gy-lg-1 gx-lg-2_5 mt-2">
                            <legend class="text-m fw-semibold dark-100 mb-0">Контактное лицо</legend>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_contact-name">ФИО<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="state-support_contact-name" type="text" name="CONTACT_NAME" placeholder="Введите ФИО" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_e-mail">E-mail<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="state-support_e-mail" type="email" name="EMAIL" placeholder="Введите e-mail" required autocomplete="off" data-form-input pattern="[a-zA-Z0-9._%\+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" data-error-message="Введите корректный адрес электронной почты">
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_phone">Номер телефона<span class="orange-100 ms-1">*</span></label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="state-support_phone" type="tel" name="PHONE" placeholder="+7" required autocomplete="off" data-form-input pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}" data-error-message="Неверный формат">
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_phone-additional">Добавочный (при наличии)</label>
                                    <input class="form-control form-control-lg-lg" id="state-support_phone-additional" type="number" name="PHONE_ADDITIONAL" placeholder="" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-5 column-gap-lg-6 mt-6 mt-lg-7 px-md-2 px-lg-0">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="button" disabled aria-disabled="true" data-form-button data-form-step-button-next>Продолжить</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div class="application-form__step" data-form-step data-form-validate-group hidden>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="form-step">
                                    <div class="form-step__item text-m fw-semibold"><span>2/2</span><span>Настройки поддержки</span></div>
                                    <progress class="form-step__progress" value="2" max="2"></progress>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_support-measure">Мера поддержки<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" id="state-support_support-measure" aria-label="Мера поддержки" required>
                                        <option value="0" selected>Льготное кредитование проектов, направленных на экспорт продукции (экспортеров и покупателей данной продукции)</option>
                                        <option value="1">Вариант 2</option>
                                        <option value="2">Вариант 3</option>
                                        <option value="3">Вариант 4</option>
                                    </select>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_loan-payment">Сумма кредита</label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="js-mask-money form-control form-control-lg-lg" id="state-support_loan-payment" type="text" name="LOAN_PAYMENT" placeholder="Сумма" autocomplete="off" aria-describedby="state-support_loan-payment-suffix" data-form-input><span class="input-group-text" id="state-support_loan-payment-suffix">₽</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_loan-term">Срок кредита</label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="form-control form-control-lg-lg" id="state-support_loan-term" type="number" name="LOAN_TERM" placeholder="Срок" autocomplete="off" aria-describedby="state-support_loan-term-suffix" data-form-input min="0"><span class="input-group-text" id="state-support_loan-term-suffix">мес.</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="state-support_message">Цель финансирования / Комментарии<span class="orange-100 ms-1">*</span></label>
                                    <textarea class="form-control form-control-lg-lg" id="state-support_message" name="MESSAGE" placeholder="Введите сообщение" required autocomplete="off" data-form-input></textarea>
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
                                    <input class="form-check-input" id="state-support_confirm" type="checkbox" name="request_confirm" value="" required data-form-checkbox data-form-input>
                                    <label class="form-check-label" for="state-support_confirm">Подтверждаю согласие на <a class="text-decoration-none" href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку персональных данных</a></label>
                                    <div class="invalid-feedback w-100" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-5 column-gap-lg-6 mt-6 mt-lg-7 px-md-2 px-lg-0">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled aria-disabled="true" data-form-button>Отправить заявку</button>
                            <button class="btn btn-outline-primary btn-lg-lg w-100 w-md-auto" type="button" data-form-step-button-prev>Назад</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div
                        class="js-message"
                        hidden aria-hidden="true"
                        data-success-title="Ваше обращение успешно отправлено!"
                        data-success-info="Мы ответим на ваше обращение, по выбранному способу связи, как только получим и обработаем его"
                        data-error-title="Не удалось отправить обращение"
                        data-error-info="Проверьте правильно ли указаны все данные и отправьте обращение снова"
                    ></div>
                </form>
            </div>
        </div>
    </div>
</div>
