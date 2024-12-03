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
<div class="modal modal-xl fade" id="modal-vacancy-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заполните форму, мы свяжемся с вами</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="vacancy-form" data-form enctype="multipart/form-data">
                    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                    <div class="application-form__step" data-form-validate-group>
                        <div class="d-flex flex-column gap-4 gap-md-5 gap-lg-6">
                            <div class="row g-1 g-md-2 g-lg-2_5">
                                <div class="application-form__col col-12 col-md-6">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="vacancy_lastName">Фамилия<span class="orange-100 ms-1">*</span></label>
                                        <input class="form-control form-control-lg-lg" id="vacancy_lastName" type="text" name="LAST_NAME" placeholder="Введите фамилию" required autocomplete="off" data-form-input>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12 col-md-6">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="vacancy_firstName">Имя и отчество<span class="orange-100 ms-1">*</span></label>
                                        <input class="form-control form-control-lg-lg" id="vacancy_firstName" type="text" name="FIRST_NAME" placeholder="Введите имя и отчество" required autocomplete="off" data-form-input>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12 col-md-6">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="vacancy_email">E-mail<span class="orange-100 ms-1">*</span></label>
                                        <input class="form-control form-control-lg-lg" id="vacancy_email" type="email" name="EMAIL" placeholder="Введите почту" required autocomplete="off" data-form-input>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12 col-md-6">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="vacancy_phone">Телефон<span class="orange-100 ms-1">*</span></label>
                                        <input class="js-mask-phone form-control form-control-lg-lg" id="vacancy_phone" type="text" name="PHONE" placeholder="+7" required autocomplete="off" data-form-input>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12">
                                    <div class="upload-file d-flex flex-column row-gap-2" data-upload>
                                        <label class="form-label mb-0" for="vacancy_upload-file">Прикрепить файлы</label>
                                        <div class="upload-file__box p-3 p-md-4" data-upload-box>
                                            <p class="text-m text-center">Вы&nbsp;можете прикрепить файлы размером не&nbsp;более 3&nbsp;мб, всего не&nbsp;более 5&nbsp;файлов.</p>
                                            <input class="d-none" id="vacancy_upload-file" type="file" name="ATTACH_FILE[]" multiple data-max-files="5" data-max-size="3145728" data-form-input data-upload-input>
                                            <button class="btn btn-link btn-icon" type="button" data-upload-button>
                                                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-attach"></use>
                                                </svg>Прикрепить
                                            </button>
                                        </div>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                                <div class="application-form__col col-12">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="vacancy_cvLink">Или вставьте ссылку на online-резюме</label>
                                        <input class="form-control form-control-lg-lg" id="vacancy_cvLink" type="text" name="CV_LINK" placeholder="Любое" autocomplete="off" data-form-input>
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
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="vacancy_confirm" type="checkbox" name="request_confirm" value="" required data-form-checkbox data-form-input>
                                <label class="form-check-label" for="vacancy_confirm">Подтверждаю согласие на <a href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">обработку персональных данных</a></label>
                                <div class="invalid-feedback w-100" aria-live="polite"></div>
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
