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
<div class="modal modal-xl fade" id="modal-feedback-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send an appeal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="application-form" action="<?= $arResult['ACTION_URL'] ?>" method="POST" novalidate id="feedback-form" data-form data-form-feedback>
                    <input type="hidden" name="sessid" value="<?= bitrix_sessid(); ?>">
                    <input type="hidden" name="FORM_CODE" value="<?= $arParams['FORM_CODE'] ?>">
                    <div class="application-form__step" data-form-step data-form-validate-group>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="form-step">
                                    <div class="form-step__item text-m fw-semibold"><span>1/2</span><span>Personal Data</span></div>
                                    <progress class="form-step__progress" value="1" max="2"></progress>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12">
                                <legend class="form-label mb-3">You address yourself as</legend>
                                <div class="d-flex flex-wrap row-gap-3 row-gap-lg-4 column-gap-6 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_physical-person" name="PERSON" value="physical" checked>
                                        <label class="form-check-label" for="feedback_physical-person">Individual</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_legal-person" name="PERSON" value="legal">
                                        <label class="form-check-label" for="feedback_legal-person">Legal entity or sole proprietor</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_last-name">Last Name<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_last-name" type="text" name="LAST_NAME" placeholder="Enter your last name" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_first-name">Name<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_first-name" type="text" name="FIRST_NAME" placeholder="Enter your first name" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_middle-name">Middle Name</label>
                                    <input class="form-control form-control-lg-lg" id="feedback_middle-name" type="text" name="MIDDLE_NAME" placeholder="Enter your middle name" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_birthday">Date of Birth</label>
                                    <div class="position-relative">
                                        <input class="js-mask-date form-control form-control-lg-lg js-date js-date--today-max" id="feedback_birthday" type="text" name="BIRTHDAY" placeholder="Specify the date" autocomplete="off" data-form-input>
                                        <span class="position-absolute top-50 end-0 translate-middle-y violet-70 text-m p-2 px-3 pe-none">
                                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                                            </svg>
                                        </span>
                                        <div class="invalid-feedback" aria-live="polite"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6" hidden>
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_inn">TIN</label>
                                    <input class="form-control form-control-lg-lg" id="feedback_inn" type="text" name="INN" placeholder="Enter TIN" autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12" hidden>
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_organization">Organization Name<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_organization" type="text" name="ORGANIZATION" placeholder="Specify the organization" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_e-mail">E-mail<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_e-mail" type="email" name="EMAIL" placeholder="Enter your email" required autocomplete="off" data-form-input pattern="[a-zA-Z0-9._%\+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" data-error-message="Enter a valid email address">
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12 col-md-6">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_phone">Phone</label>
                                    <input class="js-mask-phone form-control form-control-lg-lg" id="feedback_phone" type="tel" name="PHONE" placeholder="+7" autocomplete="off" data-form-input pattern="\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}" data-error-message="Enter a valid phone number">
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12">
                                <legend class="form-label mb-3">Receive a response via E-mail</legend>
                                <div class="d-flex flex-wrap row-gap-3 row-gap-lg-4 column-gap-6 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_other-email-false" name="OTHER_EMAIL" value="false" checked>
                                        <label class="form-check-label" for="feedback_other-email-false">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_other-email-true" name="OTHER_EMAIL" value="true">
                                        <label class="form-check-label" for="feedback_other-email-true">No, to another address</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12" hidden>
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="feedback_reply-email">Address where the response should be sent (e.g., email address)<span class="orange-100 ms-1">*</span></label>
                                    <input class="form-control form-control-lg-lg" id="feedback_reply-email" type="email" name="REPLY_EMAIL" placeholder="Enter the address" required autocomplete="off" data-form-input>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7 px-md-2 px-lg-0">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="button" disabled aria-disabled="true" data-form-button data-form-step-button-next>Continue</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div class="application-form__step" data-form-step data-form-validate-group hidden>
                        <div class="row g-1 g-md-2 g-lg-2_5">
                            <div class="application-form__col col-12">
                                <div class="form-step">
                                    <div class="form-step__item text-m fw-semibold"><span>2/2</span><span>Request</span></div>
                                    <progress class="form-step__progress" value="2" max="2"></progress>
                                </div>
                            </div>
                            <fieldset class="application-form__col col-12">
                                <legend class="visually-hidden">Request reason</legend>
                                <div class="d-flex flex-wrap row-gap-3 row-gap-lg-4 column-gap-6 column-gap-md-5 column-gap-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_topic-claim" name="TOPIC" value="claim" checked>
                                        <label class="form-check-label" for="feedback_topic-claim">Submit a complaint</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_topic-question" name="TOPIC" value="question">
                                        <label class="form-check-label" for="feedback_topic-question">Ask a question</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feedback_topic-gratitude" name="TOPIC" value="gratitude">
                                        <label class="form-check-label" for="feedback_topic-gratitude">Express gratitude</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="application-form__col col-12">
                                <p class="text-m m-0">Thank you for contacting Novikom! Improving the quality of service is very important to us. You can read about the procedure and processing time for requests via <a href="/appeal-order/" target="_blank">this link</a></p>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="d-flex flex-column row-gap-2">
                                    <label class="form-label mb-0" for="undefined_message">Your message<span class="orange-100 ms-1">*</span></label>
                                    <textarea class="form-control form-control-lg-lg" id="undefined_message" name="MESSAGE" placeholder="Enter your message" required autocomplete="off" data-form-input></textarea>
                                    <div class="invalid-feedback" aria-live="polite"></div>
                                </div>
                            </div>
                            <div class="application-form__col col-12">
                                <div class="upload-file d-flex flex-column row-gap-2" data-upload>
                                    <label class="form-label mb-0" for="feedback_upload-file">Attach files</label>
                                    <div class="upload-file__box p-3 p-md-4" data-upload-box>
                                        <p class="text-m text-center">You can attach files up to 3 MB in size, with a total of no more than 5 files</p>
                                        <input class="d-none" id="feedback_upload-file" type="file" name="ATTACH_FILE[]" data-max-files="5" data-max-size="3145728" data-form-input data-upload-input>
                                        <button class="btn btn-link btn-icon" type="button" data-upload-button>
                                            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-attach"></use>
                                            </svg>
                                            Attach
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
                            <?php endif;?>
                            <div class="application-form__col col-12">
                                <div class="form-check">
                                    <input class="form-check-input" id="feedback_confirm" type="checkbox" name="request_confirm" value="" required data-form-checkbox data-form-input>
                                    <label class="form-check-label" for="feedback_confirm">I confirm consent to the <a href="<?= $arResult['PRIVACY_POLICY_LINK'] ?>" target="_blank">processing of personal data</a></label>
                                    <div class="invalid-feedback w-100" aria-live="polite"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center flex-md-row row-gap-3 column-gap-6 mt-6 mt-lg-7 px-md-2 px-lg-0">
                            <button class="btn btn-primary btn-lg-lg w-100 w-md-auto" type="submit" disabled aria-disabled="true" data-form-button>Submit</button>
                            <button class="btn btn-outline-primary btn-lg-lg w-100 w-md-auto" type="button" data-form-step-button-prev="">Back</button>
                            <div class="text-m orange-100 text-center" data-form-error></div>
                        </div>
                    </div>
                    <div
                        class="js-message"
                        hidden aria-hidden="true"
                        data-success-title="Your request has been successfully sent!"
                        data-success-info="We will respond to your request via the selected contact method as soon as we receive and process it"
                        data-error-title="Failed to send the request"
                        data-error-info="Please check if all the data is entered correctly and resend the request"
                    ></div>
                </form>
            </div>
        </div>
    </div>
</div>
