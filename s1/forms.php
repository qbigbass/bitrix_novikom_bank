<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
/**
 * @global CMain $APPLICATION
 */
$APPLICATION->SetTitle('Формы');
?>
<section class="section-layout" id="modals">
    <div class="container">
        <div class="d-flex flex-column row-gap-5">
            <h2>Формы</h2>
            <div class="d-flex flex-column align-items-start row-gap-3">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-success">Результаты - успешно</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-error">Результаты - ошибка</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-callback-form">Заказать звонок</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-feedback-form">Направить обращение</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-loan-form">Заявка на кредит</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-credit-card-form">Заявка на кредитную карту</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-mortgage-form">Заявка на ипотеку</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-consultation-form">Заявка на консультацию</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-vacancy-form">Заявка на вакансию</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-fraud-form">Отправить обращение о мошенничестве</button>
            </div>
        </div>
    </div>
</section>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "callback_form",
    [
        "FORM_CODE" => "callback_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "feedback_form",
    [
        "FORM_CODE" => "feedback_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "loan_form",
    [
        "FORM_CODE" => "loan_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "credit_card_form",
    [
        "FORM_CODE" => "credit_card_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "mortgage_form",
    [
        "FORM_CODE" => "mortgage_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "consultation_form",
    [
        "FORM_CODE" => "consultation_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "vacancy_form",
    [
        "FORM_CODE" => "vacancy_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "fraud_form",
    [
        "FORM_CODE" => "fraud_form",
    ]
); ?>

<div class="modal fade" id="modal-success" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable align-items-end align-items-md-center">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column row-gap-4 row-gap-md-5 row-gap-lg-6"><img class="modal-img" src="/frontend/dist/img/modals/success.png" alt="">
                <div class="modal-title h4 text-center js-success-title"></div>
                <p class="text-l text-center m-0 js-success-info"></p>
            </div>
            <div class="modal-footer border-0 justify-content-md-center">
                <button class="btn btn-primary btn-lg-lg m-0 w-100 w-md-auto" type="button" data-bs-dismiss="modal">Ок, спасибо!</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-error" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable align-items-end align-items-md-center">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column row-gap-4 row-gap-md-5 row-gap-lg-6"><img class="modal-img" src="/frontend/dist/img/modals/error.png" alt="">
                <div class="modal-title h4 text-center js-error-title"></div>
                <p class="text-l text-center m-0 js-error-info"></p>
            </div>
            <div class="modal-footer border-0 justify-content-md-center">
                <button class="btn btn-primary btn-lg-lg m-0 w-100 w-md-auto js-error-btn" type="button">Вернуться</button>
            </div>
        </div>
    </div>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
