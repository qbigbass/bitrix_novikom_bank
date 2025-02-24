<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 */
?>
<div class="row js-calculator-mortgage" data-id="<?= $arParams['CALCULATOR_ELEMENT_ID'] ?? '' ?>" data-table="mortgage" data-expense-ratio="60">
    <div class="col-12 col-lg-6">
        <div class="tab-content pe-xl-6">
            <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7">
                <div class="input-slider" data-type="price" data-step-size="1">
                    <label class="text-s dark-70 ps-3 mb-2" for="property-value">Стоимость
                        недвижимости</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input">
                        <button
                            class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit"
                            type="button" aria-label="Редактировать значение">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button
                            class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close"
                            type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="input-slider__inner js-input-slider-inner">
                        <input
                            class="js-input-property input-slider__item js-input-slider-input"
                            id="property-value" type="range" step="1" min="0" max="1" value="0">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                </div>
                <div class="input-slider" data-type="month" data-start-value="36"
                     data-max-value="60" data-min-value="6">
                    <label class="text-s dark-70 ps-3 mb-2" for="payment-term">Срок
                        выплаты</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input">
                        <button
                            class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit"
                            type="button" aria-label="Редактировать значение">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button
                            class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close"
                            type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="input-slider__inner js-input-slider-inner">
                        <input class="js-input-period input-slider__item js-input-slider-input"
                               id="payment-term" type="range" step="1" min="0" max="1"
                               value="0">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                </div>
                <div class="input-slider" data-type="price" data-step-size="1">
                    <label class="text-s dark-70 ps-3 mb-2" for="down-payment">Первоначальный
                        взнос</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input">
                        <button
                            class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit"
                            type="button" aria-label="Редактировать значение">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button
                            class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close"
                            type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="input-slider__inner js-input-slider-inner">
                        <input
                            class="js-input-initial-payment input-slider__item js-input-slider-input"
                            id="down-payment" type="range" step="1" min="0" max="1" value="0">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                </div>
                <div class="input-slider" data-type="price" data-step-size="1">
                    <label class="text-s dark-70 ps-3 mb-2" for="amount-credit">Сумма
                        кредита</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input">
                        <button
                            class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit"
                            type="button" aria-label="Редактировать значение">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button
                            class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close"
                            type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg"
                                 width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="input-slider__inner js-input-slider-inner">
                        <input class="js-input-amount input-slider__item js-input-slider-input"
                               id="amount-credit" type="range" step="1" min="0" max="1"
                               value="0">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                </div>
                <div class="d-flex flex-column row-gap-4 row-gap-lg-6">
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0" for="select-mort-region">Регион</label>
                        <select class="form-select js-select js-mort-region"
                                id="select-mort-region" aria-label="Подсказка"></select>
                    </div>
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0" for="select-mort-program">Программа
                            кредитования</label>
                        <select class="form-select js-select js-mort-program"
                                id="select-mort-program" aria-label="Подсказка"></select>
                    </div>
                    <div class="d-flex flex-column row-gap-2 js-mort-object-wrapper">
                        <label class="form-label mb-0" for="select-mort-object">Объект
                            залога</label>
                        <select class="form-select js-select js-mort-object"
                                id="select-mort-object" aria-label="Подсказка"></select>
                    </div>
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0" for="select-mort-borrower">Тип заемщика</label>
                        <select class="form-select js-select js-mort-borrower"
                                id="select-mort-borrower" aria-label="Подсказка"></select>
                    </div>
                </div>
                <div class="d-flex flex-column row-gap-4">
                    <div class="form-check">
                        <input class="form-check-input js-mort-card" id="input-mort-card"
                               type="checkbox" value="" checked>
                        <label class="form-check-label" for="input-mort-card">Получаю зарплату
                            на&nbsp;карту Новиком</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input js-mort-insurance"
                               id="input-mort-insurance" type="checkbox" value="">
                        <label class="form-check-label"
                               for="input-mort-insurance">Страхование</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mt-4 mt-md-6 mt-lg-0">
        <div class="ps-xxl-6">
            <div class="polygon-container js-polygon-container">
                <div class="polygon-container__content">
                    <div class="card-calculate-result <?= $arParams['BACKGROUND'] ? 'bg-dark-10' : 'bg-dark-0' ?>">
                        <div class="card-calculate-result__body">
                            <h4 class="dark-70 js-program-name"></h4>
                            <div class="d-flex flex-column row-gap-2"><span
                                    class="card-calculate-result__label text-s">Процентная ставка</span><span
                                    class="text-number-ml fw-bold text-nowrap js-calculator-display-rate">16,5%</span>
                            </div>
                            <div class="d-flex flex-column row-gap-2"><span
                                    class="card-calculate-result__label text-s">Ежемесячный платеж</span><span
                                    class="text-number-ml fw-bold text-nowrap js-calculator-display-payment">24 404,38&nbsp;<span
                                        class="currency">₽</span></span></div>
                            <div class="d-flex flex-column row-gap-2"><span
                                    class="card-calculate-result__label text-s">Необходимый ежемесячный доход, от</span><span
                                    class="text-number-ml fw-bold text-nowrap js-calculator-display-income">35 404,38&nbsp;<span
                                        class="currency">₽</span></span></div>
                            <div class="d-flex flex-column row-gap-2"><span
                                    class="card-calculate-result__label text-s">Диапазон полной стоимости кредита</span><span
                                    class="text-number-ml fw-bold text-nowrap js-calculator-display-full-cost">16,464 – 20,474 %</span>
                            </div>
                        </div>
                        <div class="card-calculate-result__footer">
                            <button
                                class="btn btn-primary btn-lg-lg w-100"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-mortgage-form"
                            >
                                Оформить заявку
                            </button>
                            <p class="dark-70 caption-m mb-0">Калькулятор не&nbsp;гарантирует
                                точность расчетов. Окончательные параметры кредита определяются
                                по&nbsp;итогам рассмотрения заявки.</p>
                        </div>
                    </div>
                </div>
                <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-dasharray="10"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "mortgage_form",
    [
        "FORM_CODE" => "mortgage_form",
    ],
    $component
); ?>
