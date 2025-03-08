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
                  id="callback-form"
                  data-form enctype="multipart/form-data">
                <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                <div class="application-form__step" data-form-validate-group>
                    <div class="row g-1 g-md-2 g-lg-2_5">
                        <div class="application-form__col col-12 col-md-6">
                            <div class="d-flex flex-column row-gap-2">
                                <label class="form-label mb-0" for="callback_first-name">Имя<span
                                        class="orange-100 ms-1">*</span></label>
                                <input class="form-control form-control-lg-lg" id="callback_first-name" type="text"
                                       name="FIRST_NAME" placeholder="Введите имя" required autocomplete="off"
                                       data-form-input>
                                <div class="invalid-feedback" aria-live="polite"></div>
                            </div>
                        </div>
                        <div class="application-form__col col-12 col-md-6">
                            <div class="d-flex flex-column row-gap-2">
                                <label class="form-label mb-0" for="callback_phone">Телефон<span
                                        class="orange-100 ms-1">*</span></label>
                                <input class="js-mask-phone form-control form-control-lg-lg" id="callback_phone"
                                       type="tel"
                                       name="PHONE" placeholder="+7" required autocomplete="off" data-form-input
                                       pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}" data-error-message="Неверный формат"
                                       data-input-call>
                                <div class="invalid-feedback" aria-live="polite"></div>
                            </div>
                        </div>
                        <div class="application-form__col col-12">
                            <div class="d-flex flex-column row-gap-2">
                                <label class="form-label mb-0" for="callback_time-call">Удобное время для звонка</label>
                                <select class="form-select form-select--size-small form-select--size-small-lg js-select"
                                        id="callback_time-call" name="CALL_TIME" aria-label="Удобное время для звонка">
                                    <option value="Любое" selected>Любое</option>
                                    <option value="Ближайшее">Ближайшее</option>
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
                        <?php endif; ?>
                        <div class="application-form__col col-12">
                            <div class="form-check">
                                <input class="form-check-input" id="callback_confirm" type="checkbox"
                                       name="request_confirm"
                                       value="" required data-form-checkbox data-form-input>
                                <label class="form-check-label" for="callback_confirm">Подтверждаю согласие на <a
                                        href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку
                                        персональных
                                        данных</a></label>
                                <div class="invalid-feedback w-100" aria-live="polite"></div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7 px-md-2 px-lg-0">
                        <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled
                                aria-disabled="true"
                                data-form-button>Отправить
                        </button>
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
</section>
