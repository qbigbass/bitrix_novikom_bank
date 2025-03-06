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
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#callback_form">Заказать звонок</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#feedback_form">Направить обращение</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#loan_form">Заявка на кредит</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#credit_card_form">Заявка на кредитную карту</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mortgage_form">Заявка на ипотеку</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#consultation_form">Заявка на консультацию</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#vacancy_form">Заявка на вакансию</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#fraud_form">Отправить обращение о мошенничестве</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#state_support_form">Заявка на господдержку</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#express_guarantee_form">Заявка на экспресс-гарантию</button>
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

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "state_support_form",
    [
        "FORM_CODE" => "state_support_form",
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "express_guarantee_form",
    [
        "FORM_CODE" => "express_guarantee_form",
    ]
); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
