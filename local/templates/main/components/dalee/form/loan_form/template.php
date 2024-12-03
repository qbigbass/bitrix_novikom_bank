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
<div class="modal modal-xl fade" id="modal-loan-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заявка на кредит</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="loan-form" data-form enctype="multipart/form-data">
                    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                    <div class="application-form__step" data-form-step data-form-validate-group>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="form-step">
                                    <div class="form-step__item text-m fw-semibold"><span>1/3</span><span>Личные данные</span></div>
                                    <progress class="form-step__progress" value="1" max="3"></progress>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_last-name">Фамилия<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="loan_last-name" type="text" name="LAST_NAME" placeholder="Введите фамилию" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_first-name">Имя<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="loan_first-name" type="text" name="FIRST_NAME" placeholder="Введите имя" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_middle-name">Отчество</label>
                                    <input class="form-control form-control-lg-lg" id="loan_middle-name" type="text" name="MIDDLE_NAME" placeholder="Введите отчество" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_birthday">Дата рождения</label>
                                    <div class="position-relative">
                                        <input class="js-mask-date form-control form-control-lg-lg js-date js-date--today-max" id="loan_birthday" type="text" name="BIRTHDAY" placeholder="Укажите дату" autocomplete="off" data-form-input>
                                        <span class="position-absolute top-50 end-0 translate-middle-y violet-70 text-m p-2 px-3 pe-none">
                                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                                            </svg>
                                        </span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_phone">Телефон<span class="orange-100 ms-1">*</span></label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="loan_phone" type="text" name="PHONE" placeholder="+7" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_e-mail">E-mail<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="loan_e-mail" type="email" name="EMAIL" placeholder="Введите почту" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12 col-md-6">
                                <legend class="form-label mb-3">Пол</legend>
                                <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="loan_person-male-sex" name="PERSON_SEX" value="male" checked>
                                        <label class="form-check-label" for="loan_person-male-sex">Мужской</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="loan_person-female-sex" name="PERSON_SEX" value="female">
                                        <label class="form-check-label" for="loan_person-female-sex">Женский</label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="application-form__col col-12 col-md-6">
                                <legend class="form-label mb-3">Гражданство</legend>
                                <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="loan_person-citizenship_RU" name="CITIZENSHIP" value="RU" checked>
                                        <label class="form-check-label" for="loan_person-citizenship_RU">РФ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="loan_person-citizenship_other" name="CITIZENSHIP" value="other">
                                        <label class="form-check-label" for="loan_person-citizenship_other">Другое</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="button" disabled aria-disabled="true" data-form-button data-form-step-button-next>Продолжить</button>
                            <button class="btn btn-outline-primary btn-lg-lg w-100 w-md-auto" type="button" data-form-step-button-prev="">Назад</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div class="application-form__step" data-form-step data-form-validate-group hidden>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="form-step">
                                    <div class="form-step__item text-m fw-semibold"><span>2/3</span><span>Данные о работе</span></div>
                                    <progress class="form-step__progress" value="2" max="3"></progress>
                                </div>
                            </div>
                            <div class="row g-1 g-md-2 g-lg-2_5">
                                <div class="application-form__col col-12 col-md-4">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="loan_employment-history">Общий трудовой стаж<span class="orange-100 ms-1">*</span></label>
                                        <div class="input-group row-gap-2 has-validation">
                                            <input class="form-control form-control-lg-lg" id="loan_employment-history" type="number" min="0" name="EMPLOYMENT_HISTORY" placeholder="Кол-во лет" required autocomplete="off" aria-describedby="loan_employment-history-suffix" data-form-input>
                                            <span class="input-group-text" id="loan_employment-history-suffix">лет</span>
                                            <div class="invalid-feedback" aria-live="polite"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12 col-md-4">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="loan_employment-last-work">Стаж на последнем месте работы<span class="orange-100 ms-1">*</span></label>
                                        <div class="input-group row-gap-2 has-validation">
                                            <input class="form-control form-control-lg-lg" id="loan_employment-last-work" type="number" min="0" name="EMPLOYMENT_LAST_WORK" placeholder="Кол-во лет" required autocomplete="off" aria-describedby="loan_employment-last-work-suffix" data-form-input>
                                            <span class="input-group-text" id="loan_employment-last-work-suffix">лет</span>
                                            <div class="invalid-feedback" aria-live="polite"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12 col-md-4">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="loan_monthly-income">Ежемесячный доход</label>
                                        <div class="input-group row-gap-2 has-validation">
                                            <input class="js-mask-money form-control form-control-lg-lg" id="loan_monthly-income" type="text" name="MONTHLY_INCOME" placeholder="Сумма" autocomplete="off" aria-describedby="loan_monthly-income-suffix" data-form-input>
                                            <span class="input-group-text" id="loan_monthly-income-suffix">₽</span>
                                            <div class="invalid-feedback" aria-live="polite"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="loan_employer-name">Наименование организации-работодателя<span class="orange-100 ms-1">*</span></label>
                                        <input class="form-control form-control-lg-lg" id="loan_employer-name" type="text" name="EMPLOYER_NAME" placeholder="" required autocomplete="off" data-form-input>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="button" disabled aria-disabled="true" data-form-button data-form-step-button-next>Продолжить</button>
                            <button class="btn btn-outline-primary btn-lg-lg w-100 w-md-auto" type="button" data-form-step-button-prev="">Назад</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div class="application-form__step" data-form-step data-form-validate-group hidden>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="form-step">
                                    <div class="form-step__item text-m fw-semibold"><span>3/3</span><span>Настройка кредита</span></div>
                                    <progress class="form-step__progress" value="3" max="3"></progress>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_loan-amount">Сумма кредита<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="js-mask-money form-control form-control-lg-lg" id="loan_loan-amount" type="text" name="LOAN_AMOUNT" placeholder="Сумма" required autocomplete="off" aria-describedby="loan_loan-amount-suffix" data-form-input>
                                        <span class="input-group-text" id="loan_loan-amount-suffix">₽</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_loan-term">Срок кредита<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="form-control form-control-lg-lg" id="loan_loan-term" type="number" min="0" name="LOAN_TERM" placeholder="Срок" required autocomplete="off" aria-describedby="loan_loan-term-suffix" data-form-input>
                                        <span class="input-group-text" id="loan_loan-term-suffix">мес.</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_office-obtaining">Офис получения кредита<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" id="loan_office-obtaining" name="OFFICE_OBTAINING" aria-label="Офис получения кредита" required>
                                        <option value="0" selected>Москва</option>
                                        <option value="1">Санкт-Петербург</option>
                                        <option value="2">Казань</option>
                                        <option value="3">Самара</option>
                                    </select>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="loan_loan-program">Кредитная программа<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" id="loan_loan-program" name="LOAN_PROGRAM" aria-label="Кредитная программа" required>
                                        <option value="0" selected>С поручительством физического лица</option>
                                        <option value="1">С поручительством физического лица</option>
                                        <option value="2">С поручительством физического лица</option>
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
                                    <input class="form-check-input" id="loan_confirm" type="checkbox" name="request_confirm" value="" required data-form-checkbox data-form-input>
                                    <label class="form-check-label" for="loan_confirm">Подтверждаю согласие на <a href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку персональных данных</a></label>
                                    <div class="invalid-feedback w-100" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled aria-disabled="true" data-form-button>Отправить заявку</button>
                            <button class="btn btn-outline-primary btn-lg-lg w-100 w-md-auto" type="button" data-form-step-button-prev="">Назад</button>
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
