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
                <h5 class="modal-title">Заявка на&nbsp;консультирование по&nbsp;Депозиту</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                        class="icon size-m">
                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img//svg-sprite.svg#icon-close"></use>
                      </svg></span></button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="consultation-deposit-form"
                      data-form>
                    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                    <div class="application-form__step" data-form-validate-group>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation-deposit_last-name">Фамилия<span
                                            class="orange-100 ms-1">*</span>
                                    </label>
                                    <input class="form-control form-control-lg-lg"
                                           id="consultation-deposit_last-name" type="text" name="last-name"
                                           placeholder="Введите фамилию" required autocomplete="off"
                                           data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation-deposit_first-name">Имя<span
                                            class="orange-100 ms-1">*</span>
                                    </label>
                                    <input class="form-control form-control-lg-lg"
                                           id="consultation-deposit_first-name" type="text" name="first-name"
                                           placeholder="Введите имя" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0"
                                           for="consultation-deposit_middle-name">Отчество<span
                                            class="orange-100 ms-1">*</span>
                                    </label>
                                    <input class="form-control form-control-lg-lg"
                                           id="consultation-deposit_middle-name" type="text" name="middle-name"
                                           placeholder="Введите отчество" required autocomplete="off"
                                           data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation-deposit_phone">Телефон<span
                                            class="orange-100 ms-1">*</span>
                                    </label>
                                    <input class="js-mask-phone form-control form-control-lg-lg"
                                           id="consultation-deposit_phone" type="tel" name="phone" placeholder="+7"
                                           required autocomplete="off" data-form-input
                                           pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}"
                                           data-error-message="Неверный формат">
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="consultation-deposit_office">Офис
                                        обслуживания<span class="orange-100 ms-1">*</span>
                                    </label>
                                    <select
                                        class="form-select form-select--size-small form-select--size-small-lg js-select"
                                        id="consultation-deposit_office" aria-label="Офис обслуживания" required>
                                        <option value="0" selected>Москва</option>
                                        <option value="1">Москва</option>
                                        <option value="2">Москва</option>
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
                                    <label class="form-check-label" for="mortgage_confirm">Подтверждаю согласие на <a href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку персональных данных</a></label>
                                    <div class="invalid-feedback w-100" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-5 column-gap-lg-6 mt-6 mt-lg-7 px-md-2 px-lg-0">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled
                                    aria-disabled="true" data-form-button>Отправить заявку
                            </button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div class="js-message" hidden aria-hidden="true"
                         data-success-title="Ваша заявка успешно отправлена!"
                         data-success-info="Мы ответим на вашу заявку, по выбранному способу связи, как только получим и обработаем её"
                         data-error-title="Не удалось отправить заявку"
                         data-error-info="Проверьте правильно ли указаны все данные и отправьте обращение снова"></div>
                </form>
            </div>
        </div>
    </div>
</div>
