<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="row js-calculator-deposit" data-id="<?= $arParams['CALCULATOR_ELEMENT_ID'] ?? '' ?>">
    <div class="col-12 col-lg-6">
        <div class="d-none d-lg-inline-flex">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#loan-consumer" type="button" role="tab" aria-controls="loan-consumer" aria-selected="true">Потребительский кредит</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#refinance" type="button" role="tab" aria-controls="refinance" aria-selected="false" tabindex="-1">Рефинансирование</button>
                </li>
            </ul>
        </div>
        <div class="d-lg-none">
            <select class="form-select form-select--size-small js-select js-select-loan-type select2-hidden-accessible" data-select2-id="select2-data-1-rbro" tabindex="-1" aria-hidden="true">
                <option selected="" value="loan" data-select2-id="select2-data-3-jhc0">Потребительский кредит</option>
                <option value="refinance">Рефинансирование</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-fwov" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single select2-selection--size-small" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-9262-container" aria-controls="select2-9262-container"><span class="select2-selection__rendered" id="select2-9262-container" role="textbox" aria-readonly="true" title="Потребительский кредит">Потребительский кредит</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        </div>
        <div class="tab-content pt-4 pt-md-6 pt-lg-7 pe-xl-6">
            <div class="tab-pane fade show active" id="loan-consumer" role="tabpanel" aria-labelledby="loan" tabindex="0">
                <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7">
                    <div class="input-slider js-input-slider" data-type="price" data-start-value="1000000" data-max-value="5000000" data-min-value="20000" data-step-size="5000">
                        <label class="text-s dark-70 ps-3 mb-2" for="amount-credit">Сумма кредита</label>
                        <div class="input-slider-text js-input-slider-text">
                            <input class="input-slider-text__input h4 js-input-slider-text-input" readonly="" disabled="" value="1000000">
                            <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                                <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                                </svg>
                            </button>
                            <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                                <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="input-slider__inner js-input-slider-inner">
                            <input class="js-input-amount input-slider__item js-input-slider-input" id="amount-credit" type="range" step="5000" min="20000" max="5000000" value="1000000" style="background: linear-gradient(to right, var(--blue-100) 21.05%, var(--blue-30) 21.05%);">
                        </div>
                        <div class="input-slider-text-steps js-input-slider-text-steps"><span class="input-slider-text-step text-s dark-70">20 000 ₽</span><span class="input-slider-text-step text-s dark-70">5 000 000 ₽</span></div>
                    </div>
                    <div class="input-slider js-input-slider" data-type="month" data-start-value="36" data-max-value="60" data-min-value="6">
                        <label class="text-s dark-70 ps-3 mb-2" for="payment-term">Срок выплаты</label>
                        <div class="input-slider-text js-input-slider-text">
                            <input class="input-slider-text__input h4 js-input-slider-text-input" readonly="" disabled="" value="36">
                            <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                                <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                                </svg>
                            </button>
                            <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                                <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="input-slider__inner js-input-slider-inner">
                            <input class="js-input-period input-slider__item js-input-slider-input" id="payment-term" type="range" step="1" min="6" max="60" value="36" style="background: linear-gradient(to right, var(--blue-100) 55.30%, var(--blue-30) 55.30%);">
                        </div>
                        <div class="input-slider-text-steps js-input-slider-text-steps"><span class="input-slider-text-step text-s dark-70">6 месяцев</span><span class="input-slider-text-step text-s dark-70">5 лет</span></div>
                    </div>
                    <div class="d-flex flex-column row-gap-4">
                        <div class="form-check">
                            <input class="form-check-input js-inp-loan-card" id="inp-loan-card" type="checkbox" value="" checked="">
                            <label class="form-check-label" for="inp-loan-card"><a href="#">Получаю зарплату на&nbsp;карту Новиком</a></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input js-loan-insurance" id="inp-loan-insurance" type="checkbox" value="">
                            <label class="form-check-label" for="inp-loan-insurance">Страхование</label>
                        </div>
                        <div class="d-flex flex-column row-gap-4 row-gap-lg-6">
                            <div class="d-flex flex-column row-gap-2">
                                <label class="form-label mb-0" for="select-loan-properties">Особенности</label>
                                <select class="form-select js-select js-select-loan-properties select2-hidden-accessible" id="select-loan-properties" aria-label="Подсказка" data-select2-id="select2-data-select-loan-properties" tabindex="-1" aria-hidden="true">
                                    <option selected="" value="1" data-select2-id="select2-data-5-1p8s">С поручительством физического лица</option>
                                    <option value="2">Без обеспечения</option>
                                    <option value="3">На рефинансирование</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-4-gs9d" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select-loan-properties-container" aria-controls="select2-select-loan-properties-container"><span class="select2-selection__rendered" id="select2-select-loan-properties-container" role="textbox" aria-readonly="true" title="С поручительством физического лица">С поручительством физического лица</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="d-flex flex-column row-gap-2">
                                <label class="form-label mb-0" for="select-loan-payment-type">Тип платежей</label>
                                <select class="form-select js-select js-select-loan-payment-type select2-hidden-accessible" id="select-loan-payment-type" aria-label="Подсказка" data-select2-id="select2-data-select-loan-payment-type" tabindex="-1" aria-hidden="true">
                                    <option selected="" value="1" data-select2-id="select2-data-7-8gqr">Аннуитетные платежи</option>
                                    <option value="2">Дифференцированные платежи</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-6-6bgl" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select-loan-payment-type-container" aria-controls="select2-select-loan-payment-type-container"><span class="select2-selection__rendered" id="select2-select-loan-payment-type-container" role="textbox" aria-readonly="true" title="Аннуитетные платежи">Аннуитетные платежи</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <button class="btn btn-link btn-sm btn-icon js-add-replenishment" type="button">
                            <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-plus"></use>
                            </svg>Добавить пополнение
                        </button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="refinance" role="tabpanel" aria-labelledby="refinance" tabindex="0">
                <p>refinance</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mt-4 mt-md-6 mt-lg-0">
        <div class="ps-xxl-6">
            <div class="polygon-container js-polygon-container">
                <div class="polygon-container__content">
                    <div class="card-calculate-result bg-dark-0">
                        <div class="card-calculate-result__body">
                            <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Процентная ставка</span><span class="text-number-ml fw-bold text-nowrap js-calculator-display-rate">16,5%</span>
                            </div>
                            <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Ежемесячный платеж</span>
                                <div class="d-flex flex-column flex-md-row justify-content-md-between flex-wrap align-items-md-end"><span class="text-number-ml fw-bold text-nowrap js-calculator-display-payment">35 404,38&nbsp;<span class="currency">₽</span></span>
                                    <button class="btn btn-link btn-sm btn-icon mt-2 mt-md-0" type="button"><span>График платежей</span>
                                        <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Диапазон полной стоимости кредита</span><span class="text-number-ml fw-bold text-nowrap js-calculator-display-full-cost">16,464 – 20,474 %</span>
                            </div>
                        </div>
                        <div class="card-calculate-result__footer">
                            <button class="btn btn-primary btn-lg-lg w-100" type="button">Оформить заявку</button>
                            <p class="dark-70 caption-m">Калькулятор не&nbsp;гарантирует точность расчетов. Окончательные параметры кредита определяются по&nbsp;итогам рассмотрения заявки.</p>
                        </div>
                    </div>
                </div>
                <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg" height="511.09375" width="505.5">
                        <polygon points="2,2 504,2 504,469 464,509 2,509" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
