<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
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
    "request_callback",
    [
        "FORM_ID" => 1,
        "USE_CAPTCHA" => "Y",
    ]
); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
