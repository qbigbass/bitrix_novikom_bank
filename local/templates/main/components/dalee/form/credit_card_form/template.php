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
<div class="modal modal-xl fade" id="modal-credit-card-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заявка на кредитную карту</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="credit-card-form" data-form enctype="multipart/form-data">
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
                                    <label class="form-label mb-0" for="credit-card_last-name">Фамилия<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="credit-card_last-name" type="text" name="LAST_NAME" placeholder="Введите фамилию" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_first-name">Имя<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="credit-card_first-name" type="text" name="FIRST_NAME" placeholder="Введите имя" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_middle-name">Отчество</label>
                                    <input class="form-control form-control-lg-lg" id="credit-card_middle-name" type="text" name="MIDDLE_NAME" placeholder="Введите отчество" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_birthday">Дата рождения</label>
                                    <div class="position-relative">
                                        <input class="js-mask-date form-control form-control-lg-lg js-date js-date--today-max" id="credit-card_birthday" type="text" name="BIRTHDAY" placeholder="" autocomplete="off" data-form-input>
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
                                    <label class="form-label mb-0" for="credit-card_first-name_latin">Имя в латинской транскрипции<span class="orange-100 ms-1">*</span></label>
                                    <input class="js-mask-latin form-control form-control-lg-lg" id="credit-card_first-name_latin" type="text" name="FIRST_NAME_LATIN" placeholder="Введите имя" required autocomplete="off" data-form-input>
                                    <span class="caption-m dark-70 d-block">Как в заграничном паспорте</span>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_last-name_latin">Фамилия в латинской транскрипции<span class="orange-100 ms-1">*</span></label>
                                    <input class="js-mask-latin form-control form-control-lg-lg" id="credit-card_last-name_latin" type="text" name="LAST_NAME_LATIN" placeholder="Введите фамилию" required autocomplete="off" data-form-input><span class="caption-m dark-70 d-block">Как в заграничном паспорте</span>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_phone">Телефон<span class="orange-100 ms-1">*</span>
                                    </label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="credit-card_phone" type="text" name="PHONE" placeholder="+7" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_e-mail">E-mail<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="credit-card_e-mail" type="email" name="EMAIL" placeholder="Введите почту" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12 col-md-6">
                                <legend class="form-label mb-3">Пол</legend>
                                <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="credit-card_person-male-sex" name="PERSON_SEX" value="male" checked>
                                        <label class="form-check-label" for="credit-card_person-male-sex">Мужской</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="credit-card_person-female-sex" name="PERSON_SEX" value="female">
                                        <label class="form-check-label" for="credit-card_person-female-sex">Женский</label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="application-form__col col-12 col-md-6">
                                <legend class="form-label mb-3">Гражданство</legend>
                                <div class="d-flex flex-column flex-md-row flex-wrap row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="credit-card_person-citizenship_RU" name="CITIZENSHIP" value="RU" checked>
                                        <label class="form-check-label" for="credit-card_person-citizenship_RU">РФ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="credit-card_person-citizenship_other" name="CITIZENSHIP" value="other">
                                        <label class="form-check-label" for="credit-card_person-citizenship_other">Другое</label>
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
                                    <label class="form-label mb-0" for="credit-card_employment-history">Общий трудовой стаж<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="form-control form-control-lg-lg" id="credit-card_employment-history" type="number" min="0" name="EMPLOYMENT_HISTORY" placeholder="Кол-во лет" required autocomplete="off" aria-describedby="credit-card_employment-history-suffix" data-form-input>
                                        <span class="input-group-text" id="credit-card_employment-history-suffix">лет</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_employment-last-work">Стаж на последнем месте работы<span class="orange-100 ms-1">*</span></label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="form-control form-control-lg-lg" id="credit-card_employment-last-work" type="number" min="0" name="EMPLOYMENT_LAST_WORK" placeholder="Кол-во лет" required autocomplete="off" aria-describedby="credit-card_employment-last-work-suffix" data-form-input>
                                        <span class="input-group-text" id="credit-card_employment-last-work-suffix">лет</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_monthly-income">Ежемесячный доход</label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="js-mask-money form-control form-control-lg-lg" id="credit-card_monthly-income" type="text" name="MONTHLY_INCOME" placeholder="Сумма" autocomplete="off" aria-describedby="credit-card_monthly-income-suffix" data-form-input>
                                        <span class="input-group-text" id="credit-card_monthly-income-suffix">₽</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_employer-name">Наименование организации-работодателя<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="credit-card_employer-name" type="text" name="EMPLOYER_NAME" placeholder="" required autocomplete="off" data-form-input>
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
                                    <div class="form-step__item text-m fw-semibold"><span>3/3</span><span>Настройка карты</span></div>
                                    <progress class="form-step__progress" value="3" max="3"></progress>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="alert d-flex align-items-center gap-3 bg-dark-10" role="alert">
                                    <svg class="icon dark-70 size-m flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-alert"></use>
                                    </svg>
                                    <div class="text-m dark-70">Оформление карты для новых клиентов Банка осуществляется при личном присутствии клиента в&nbsp;офисе Банка с&nbsp;документом, удостоверяющим личность</div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-8">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_card">Карта<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" id="credit-card_card" name="CARD" aria-label="Карта" required>
                                        <option value="0" selected>МИР Премиальная</option>
                                        <option value="1">МИР Премиальная</option>
                                        <option value="2">МИР Премиальная</option>
                                    </select>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-4">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_currency">Валюта<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" id="credit-card_currency" name="CURRENCY" aria-label="Валюта" required>
                                        <option value="0" selected>Рубли</option>
                                        <option value="1">Рубли</option>
                                        <option value="2">Рубли</option>
                                    </select>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12">
                                <legend class="form-label mb-3">Тип заемщика</legend>
                                <div class="d-flex flex-column flex-md-row row-gap-3 row-gap-lg-4 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="credit-card_borrower-bank-account" name="TYPE_BORROWER" value="bank-account" checked>
                                        <label class="form-check-label" for="credit-card_borrower-bank-account">Получаю зарплату на&nbsp;счет в&nbsp;Банке</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="credit-card_borrower-corporate" name="TYPE_BORROWER" value="corporate">
                                        <label class="form-check-label" for="credit-card_borrower-corporate">Являюсь сотрудником организации — корпоративного клиента Банка</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_receipt-office">Офис получения карты<span class="orange-100 ms-1">*</span></label>
                                    <select class="form-select form-select--size-small form-select--size-small-lg js-select" id="credit-card_receipt-office" name="RECEIPT_OFFICE" aria-label="Офис получения карты" required>
                                        <option value="0" selected>Москва</option>
                                        <option value="1">Москва</option>
                                        <option value="2">Москва</option>
                                    </select>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="credit-card_credit-limit">Кредитный лимит по карте</label>
                                    <div class="input-group row-gap-2 has-validation">
                                        <input class="js-mask-money form-control form-control-lg-lg" id="credit-card_credit-limit" type="text" name="CREDIT_LIMIT" placeholder="Сумма" autocomplete="off" aria-describedby="credit-card_credit-limit-suffix" data-form-input>
                                        <span class="input-group-text" id="credit-card_credit-limit-suffix">₽</span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
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
                                    <input class="form-check-input" id="credit-card_confirm" type="checkbox" name="request_confirm" value="" required data-form-checkbox data-form-input>
                                    <label class="form-check-label" for="credit-card_confirm">Подтверждаю согласие на <a href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку персональных данных</a></label>
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
