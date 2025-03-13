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
<section class="section-layout py-lg-9 border-top border-blue10">
    <div class="container">
        <div class="row mb-6 mb-lg-7 px-lg-6 col-12 col-md-7 mx-auto mx-auto">
            <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate
                  id="feedback-form" data-form data-form-feedback>
                <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                <div class="application-form__step" data-form-step data-form-validate-group>
                    <div class="row ">
                        <fieldset class="application-form__col col-12">
                            <legend class="form-label mb-3">Вы обращаетесь как</legend>
                            <div
                                class="d-flex flex-wrap row-gap-3 row-gap-lg-4 column-gap-6 column-gap-md-5 column-gap-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="feedback_physical-person"
                                           name="PERSON" value="physical" >
                                    <label class="form-check-label" for="feedback_physical-person">Физическое
                                        лицо</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="feedback_legal-person"
                                           name="PERSON" value="legal">
                                    <label class="form-check-label" for="feedback_legal-person">Юридическое лицо или
                                        ИП</label>
                                </div>
                            </div>
                        </fieldset>
                        <div id="js-feedback-fields" class="d-none row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_last-name">Фамилия<span
                                            class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_last-name" type="text"
                                           name="LAST_NAME" placeholder="Введите фамилию" required autocomplete="off"
                                           data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_first-name">Имя<span
                                            class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_first-name" type="text"
                                           name="FIRST_NAME" placeholder="Введите имя" required autocomplete="off"
                                           data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_middle-name">Отчество</label>
                                    <input class="form-control form-control-lg-lg" id="feedback_middle-name" type="text"
                                           name="MIDDLE_NAME" placeholder="Введите отчество" autocomplete="off"
                                           data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_birthday">Дата рождения</label>
                                    <div class="position-relative">
                                        <input
                                            class="js-mask-date form-control form-control-lg-lg js-date js-date--today-max"
                                            id="feedback_birthday" type="text" name="BIRTHDAY" placeholder="Укажите дату"
                                            autocomplete="off" data-form-input>
                                        <span
                                            class="position-absolute top-50 end-0 translate-middle-y violet-70 text-m p-2 px-3 pe-none">
                                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%"
                                                     height="100%">
                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                                                </svg>
                                            </span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6" hidden>
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_inn">ИНН</label>
                                    <input class="form-control form-control-lg-lg" id="feedback_inn" type="text" name="INN"
                                           placeholder="Введите ИНН" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12" hidden>
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_organization">Наименование организации<span
                                            class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_organization" type="text"
                                           name="ORGANIZATION" placeholder="Укажите организацию" required autocomplete="off"
                                           data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_e-mail">E-mail<span
                                            class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_e-mail" type="email"
                                           name="EMAIL" placeholder="Введите почту" required autocomplete="off"
                                           data-form-input pattern="[a-zA-Z0-9._%\+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}"
                                           data-error-message="Введите корректный адрес электронной почты">
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_phone">Телефон</label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="feedback_phone"
                                           type="tel" name="PHONE" placeholder="+7" autocomplete="off" data-form-input
                                           pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}" data-error-message="Неверный формат">
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12">
                                <legend class="form-label mb-3">Получить ответ на E-mail</legend>
                                <div
                                    class="d-flex flex-wrap row-gap-3 row-gap-lg-4 column-gap-6 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_other-email-false"
                                               name="OTHER_EMAIL" value="false" checked>
                                        <label class="form-check-label" for="feedback_other-email-false">Да</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_other-email-true"
                                               name="OTHER_EMAIL" value="true">
                                        <label class="form-check-label" for="feedback_other-email-true">Нет, на иной
                                            адрес</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12" hidden>
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_reply-email">Адрес, по которому должен быть
                                        направлен ответ (например, адрес электронной почты)<span
                                            class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_reply-email" type="email"
                                           name="REPLY_EMAIL" placeholder="Введите адрес" required autocomplete="off"
                                           data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <hr>
                            <fieldset class="application-form__col col-12">
                                <legend class="visually-hidden">Причина обращения</legend>
                                <div
                                    class="d-flex flex-wrap row-gap-3 row-gap-lg-4 column-gap-6 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_topic-claim" name="TOPIC"
                                               value="claim" checked>
                                        <label class="form-check-label" for="feedback_topic-claim">Направить
                                            претензию</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_topic-question"
                                               name="TOPIC" value="question">
                                        <label class="form-check-label" for="feedback_topic-question">Задать вопрос</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_topic-gratitude"
                                               name="TOPIC" value="gratitude">
                                        <label class="form-check-label" for="feedback_topic-gratitude">Выразить
                                            благодарность</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12 js-topic-text" id="feedback_topic-claim-text">
                                <p class="text-m m-0">Спасибо, что обратились в Новиком! Повышение качества
                                    обслуживания для нас очень важно. С информацией о порядке и сроках
                                    рассмотрения обращения Вы можете ознакомиться по <a href="/appeal-order/"
                                                                                                  target="_blank">ссылке</a>.
                                </p>
                            </div>
                            <div class="application-form__col col-12 js-topic-text" id="feedback_topic-question-text" hidden>
                                <p class="text-m m-0">Спасибо за Ваш вопрос! Сотрудник банка ответит Вам в кратчайшие
                                    сроки. С информацией о порядке и сроках рассмотрения обращения
                                    Вы можете ознакомиться по <a href="/appeal-order/" target="_blank">ссылке</a>.
                                </p>
                            </div>
                            <div class="application-form__col col-12 js-topic-text" id="feedback_topic-gratitude-text" hidden>
                                <p class="text-m m-0">Благодарим Вас за теплые слова! Будем рады передать их адресату!
                                </p>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="undefined_message">Ваше сообщение<span
                                            class="orange-100 ms-1">*</span></label>
                                    <textarea class="form-control form-control-lg-lg" id="undefined_message" name="MESSAGE"
                                              placeholder="Введите сообщение" required autocomplete="off"
                                              data-form-input></textarea>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="upload-file d-flex flex-column row-gap-2" data-upload>
                                    <label class="form-label mb-0" for="feedback_upload-file">Прикрепить файлы</label>
                                    <div class="upload-file__box p-3 p-md-4" data-upload-box>
                                        <p class="text-m text-center">Вы можете прикрепить файлы размером не более
                                            3 мб, всего не более 5 файлов.</p>
                                        <input class="d-none" id="feedback_upload-file" type="file" name="ATTACH_FILE[]"
                                               data-max-files="5" data-max-size="3145728" data-form-input data-upload-input>
                                        <button class="btn btn-link btn-icon" type="button" data-upload-button>
                                            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg"
                                                 width="100%" height="100%">
                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-attach"></use>
                                            </svg>
                                            Прикрепить
                                        </button>
                                    </div>
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
                            <?php endif; ?>
                            <div class="application-form__col col-12">
                                <div class="form-check">
                                    <input class="form-check-input" id="feedback_confirm" type="checkbox"
                                           name="request_confirm" value="" required data-form-checkbox data-form-input>
                                    <label class="form-check-label" for="feedback_confirm">Подтверждаю согласие на <a
                                            href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку
                                            персональных данных</a></label>
                                    <div class="invalid-feedback w-100" aria-live="polite"></div>
                                </div>
                            </div>

                            <div
                                class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7 px-md-2 px-lg-0">
                                <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled
                                        aria-disabled="true" data-form-button>Отправить
                                </button>
                                <div class="text-m orange-100 text-center" data-form-error></div>
                            </div>
                        </div>
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
</section>
