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
<div class="modal modal-xl fade" id="modal-mortgage-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заявка на ипотеку</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="mortgage-form" data-form enctype="multipart/form-data">
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
                                    <label class="form-label mb-0" for="mortgage_last-name">Фамилия<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="mortgage_last-name" type="text" name="LAST_NAME" placeholder="Введите фамилию" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_first-name">Имя<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="mortgage_first-name" type="text" name="FIRST_NAME" placeholder="Введите имя" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_middle-name">Отчество</label>
                                    <input class="form-control form-control-lg-lg" id="mortgage_middle-name" type="text" name="MIDDLE_NAME" placeholder="Введите отчество" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_birthday">Дата рождения</label>
                                    <div class="position-relative">
                                        <input class="js-mask-date form-control form-control-lg-lg js-date js-date--today-max" id="mortgage_birthday" type="text" name="BIRTHDAY" placeholder="Укажите дату" autocomplete="off" data-form-input>
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
                                    <label class="form-label mb-0" for="mortgage_phone">Телефон<span class="orange-100 ms-1">*</span></label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="mortgage_phone" type="text" name="PHONE" placeholder="+7" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_e-mail">E-mail<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="mortgage_e-mail" type="email" name="EMAIL" placeholder="Введите почту" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12 col-md-6">
                                <legend class="form-label mb-3">Пол</legend>
                                <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_person-male-sex" name="PERSON_SEX" value="male" checked>
                                        <label class="form-check-label" for="mortgage_person-male-sex">Мужской</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_person-female-sex" name="PERSON_SEX" value="female">
                                        <label class="form-check-label" for="mortgage_person-female-sex">Женский</label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="application-form__col col-12 col-md-6">
                                <legend class="form-label mb-3">Гражданство</legend>
                                <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_person-citizenship_RU" name="CITIZENSHIP" value="RU" checked>
                                        <label class="form-check-label" for="mortgage_person-citizenship_RU">РФ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_person-citizenship_other" name="CITIZENSHIP" value="other">
                                        <label class="form-check-label" for="mortgage_person-citizenship_other">Другое</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="button" disabled aria-disabled="true" data-form-button data-form-step-button-next>Продолжить</button>
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
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_employment-history">Общий трудовой стаж<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="form-control form-control-lg-lg" id="mortgage_employment-history" type="number" min="0" name="EMPLOYMENT_HISTORY" placeholder="Кол-во лет" required autocomplete="off" aria-describedby="mortgage_employment-history-suffix" data-form-input><span class="input-group-text" id="mortgage_employment-history-suffix">лет</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_employment-last-work">Стаж на последнем месте работы<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="form-control form-control-lg-lg" id="mortgage_employment-last-work" type="number" min="0" name="EMPLOYMENT_LAST_WORK" placeholder="Кол-во лет" required autocomplete="off" aria-describedby="mortgage_employment-last-work-suffix" data-form-input><span class="input-group-text" id="mortgage_employment-last-work-suffix">лет</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_monthly-income">Ежемесячный доход</label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="js-mask-money form-control form-control-lg-lg" id="mortgage_monthly-income" type="text" name="MONTHLY_INCOME" placeholder="Сумма" autocomplete="off" aria-describedby="mortgage_monthly-income-suffix" data-form-input><span class="input-group-text" id="mortgage_monthly-income-suffix">₽</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_employer-name">Наименование организации-работодателя<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="mortgage_employer-name" type="text" name="EMPLOYER_NAME" placeholder="" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
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
                                    <div class="form-step__item text-m fw-semibold"><span>3/3</span><span>Настройка ипотеки</span></div>
                                    <progress class="form-step__progress" value="3" max="3"></progress>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12">
                                <legend class="form-label mb-3">Тип жилья</legend>
                                <div class="d-flex flex-column flex-wrap flex-md-row row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_housing-flat" name="TYPE_HOUSING" value="flat" checked>
                                        <label class="form-check-label" for="mortgage_housing-flat">Квартира</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_housing-apartments" name="TYPE_HOUSING" value="apartments">
                                        <label class="form-check-label" for="mortgage_housing-apartments">Апартаменты</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_housing-townhouse" name="TYPE_HOUSING" value="townhouse">
                                        <label class="form-check-label" for="mortgage_housing-townhouse">Жилой дом (таунхаус) с земельным участком</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_housing-garage" name="TYPE_HOUSING" value="garage">
                                        <label class="form-check-label" for="mortgage_housing-garage">Гараж или машиноместо</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_housing-refinancing" name="TYPE_HOUSING" value="refinancing">
                                        <label class="form-check-label" for="mortgage_housing-refinancing">Рефинансирование</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_mortgage-amount">Сумма ипотеки<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="js-mask-money form-control form-control-lg-lg" id="mortgage_mortgage-amount" type="text" name="MORTGAGE_AMOUNT" placeholder="Сумма" required autocomplete="off" aria-describedby="mortgage_mortgage-amount-suffix" data-form-input><span class="input-group-text" id="mortgage_mortgage-amount-suffix">₽</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_mortgage-initial-payment">Первоначальный взнос<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="js-mask-money form-control form-control-lg-lg" id="mortgage_mortgage-initial-payment" type="text" name="MORTGAGE_INITIAL_PAYMENT" placeholder="Сумма" required autocomplete="off" aria-describedby="mortgage_mortgage-initial-payment-suffix" data-form-input><span class="input-group-text" id="mortgage_mortgage-initial-payment-suffix">₽</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_mortgage-term">Срок ипотеки<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="form-control form-control-lg-lg" id="mortgage_mortgage-term" type="number" min="0" name="MORTGAGE_TERM" placeholder="Срок" required autocomplete="off" aria-describedby="mortgage_mortgage-term-suffix" data-form-input><span class="input-group-text" id="mortgage_mortgage-term-suffix">мес.</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12">
                                <legend class="form-label mb-3">Страхование</legend>
                                <div class="d-flex flex-column flex-md-row row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_insurance-health" name="INSURANCE" value="health" checked>
                                        <label class="form-check-label" for="mortgage_insurance-health">Страхование жизни и здоровья</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="mortgage_insurance-risk" name="INSURANCE" value="risk">
                                        <label class="form-check-label" for="mortgage_insurance-risk">Страхование риска утраты права собственности</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="mortgage_office-obtaining">Офис получения кредита<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" name="OFFICE_OBTAINING" id="mortgage_office-obtaining" aria-label="Офис получения кредита" required>
                                        <option value="0" selected>Москва</option>
                                        <option value="1">Санкт-Петербург</option>
                                        <option value="2">Казань</option>
                                        <option value="3">Самара</option>
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
                                    <input class="form-check-input" id="mortgage_confirm" type="checkbox" name="request_confirm" value="" required data-form-checkbox data-form-input>
                                    <label class="form-check-label" for="mortgage_confirm">Подтверждаю согласие на <a href="#">обработку персональных данных</a></label>
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
