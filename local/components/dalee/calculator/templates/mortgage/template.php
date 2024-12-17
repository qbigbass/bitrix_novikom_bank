<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="row js-calculator-deposit" data-id="<?= $arParams['CALCULATOR_ELEMENT_ID'] ?? '' ?>">
    <div class="col-12 col-lg-6">
        <div class="tab-content pe-xl-6">
            <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7">
                <div class="input-slider js-input-slider" data-type="price" data-start-value="1000000" data-max-value="5000000" data-min-value="20000" data-step-size="5000">
                    <label class="text-s dark-70 ps-3 mb-2" for="amount-credit">Сумма кредита</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input" readonly="" disabled="" value="1000000">
                        <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="img/svg-sprite.svg#icon-close"></use>
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
                                <use xlink:href="img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="img/svg-sprite.svg#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="input-slider__inner js-input-slider-inner">
                        <input class="js-input-period input-slider__item js-input-slider-input" id="payment-term" type="range" step="1" min="6" max="60" value="36" style="background: linear-gradient(to right, var(--blue-100) 55.30%, var(--blue-30) 55.30%);">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"><span class="input-slider-text-step text-s dark-70">6 месяцев</span><span class="input-slider-text-step text-s dark-70">5 лет</span></div>
                </div>
                <div class="input-slider js-input-slider" data-type="price" data-start-value="3534321" data-max-value="5000000" data-min-value="20000" data-step-size="10000">
                    <label class="text-s dark-70 ps-3 mb-2" for="property-value">Стоимость недвижимости</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input" readonly="" disabled="" value="3534321">
                        <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="img/svg-sprite.svg#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="input-slider__inner js-input-slider-inner">
                        <input class="js-input-property input-slider__item js-input-slider-input" id="property-value" type="range" step="10000" min="20000" max="5000000" value="3534321" style="background: linear-gradient(to right, var(--blue-100) 69.64%, var(--blue-30) 69.64%);">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"><span class="input-slider-text-step text-s dark-70">20 000 ₽</span><span class="input-slider-text-step text-s dark-70">5 000 000 ₽</span></div>
                </div>
                <div class="input-slider js-input-slider" data-type="price" data-start-value="120000" data-max-value="3000000" data-min-value="20000" data-step-size="10000">
                    <label class="text-s dark-70 ps-3 mb-2" for="down-payment">Первоначальный взнос</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input" readonly="" disabled="" value="120000">
                        <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="img/svg-sprite.svg#icon-edit"></use>
                            </svg>
                        </button>
                        <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                            <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="img/svg-sprite.svg#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="input-slider__inner js-input-slider-inner">
                        <input class="js-input-initial-payment input-slider__item js-input-slider-input" id="down-payment" type="range" step="10000" min="20000" max="3000000" value="120000" style="background: linear-gradient(to right, var(--blue-100) 5.47%, var(--blue-30) 5.47%);">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"><span class="input-slider-text-step text-s dark-70">20 000 ₽</span><span class="input-slider-text-step text-s dark-70">3 000 000 ₽</span></div>
                </div>
                <div class="d-flex flex-column row-gap-4 row-gap-lg-6">
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0" for="select-mort-region">Регион</label>
                        <select class="form-select js-select js-mort-region select2-hidden-accessible" id="select-mort-region" aria-label="Подсказка" data-select2-id="select2-data-select-mort-region" tabindex="-1" aria-hidden="true">
                            <option selected="" value="1" data-select2-id="select2-data-9-o0ou">Дальневосточный федеральный округ</option>
                            <option value="2">Список 2</option>
                            <option value="3">Список 3</option>
                            <option value="4">Список 4</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-8-9lm7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select-mort-region-container" aria-controls="select2-select-mort-region-container"><span class="select2-selection__rendered" id="select2-select-mort-region-container" role="textbox" aria-readonly="true" title="Дальневосточный федеральный округ">Дальневосточный федеральный округ</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0" for="select-mort-program">Программа кредитования</label>
                        <select class="form-select js-select js-mort-program select2-hidden-accessible" id="select-mort-program" aria-label="Подсказка" data-select2-id="select2-data-select-mort-program" tabindex="-1" aria-hidden="true">
                            <option selected="" value="1" data-select2-id="select2-data-11-8skh">Ипотека по программе «Первичный рынок»</option>
                            <option value="2">Список 2</option>
                            <option value="3">Список 3</option>
                            <option value="4">Список 4</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-10-u4j0" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select-mort-program-container" aria-controls="select2-select-mort-program-container"><span class="select2-selection__rendered" id="select2-select-mort-program-container" role="textbox" aria-readonly="true" title="Ипотека по программе «Первичный рынок»">Ипотека по программе «Первичный рынок»</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0" for="select-mort-object">Объект залога</label>
                        <select class="form-select js-select js-mort-object select2-hidden-accessible" id="select-mort-object" aria-label="Подсказка" data-select2-id="select2-data-select-mort-object" tabindex="-1" aria-hidden="true">
                            <option selected="" value="1" data-select2-id="select2-data-13-q7fc">Квартира</option>
                            <option value="2">Список 2</option>
                            <option value="3">Список 3</option>
                            <option value="4">Список 4</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-12-k2ns" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select-mort-object-container" aria-controls="select2-select-mort-object-container"><span class="select2-selection__rendered" id="select2-select-mort-object-container" role="textbox" aria-readonly="true" title="Квартира">Квартира</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                </div>
                <button class="btn btn-link btn-sm btn-icon js-add-replenishment" type="button">
                    <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="img/svg-sprite.svg#icon-plus"></use>
                    </svg>Добавить пополнение
                </button>
                <div class="d-flex flex-column row-gap-4">
                    <div class="form-check">
                        <input class="form-check-input js-mort-card" id="input-mort-card" type="checkbox" value="" checked="">
                        <label class="form-check-label" for="input-mort-card">Получаю зарплату на&nbsp;карту Новиком</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input js-mort-insurance" id="input-mort-insurance" type="checkbox" value="">
                        <label class="form-check-label" for="input-mort-insurance">Страхование</label>
                    </div>
                </div>
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
                                <div class="d-flex flex-column flex-md-row justify-content-md-between flex-wrap align-items-md-end"><span class="text-number-ml fw-bold text-nowrap js-calculator-display-payment">24 404,38&nbsp;<span class="currency">₽</span></span>
                                    <button class="btn btn-link btn-sm btn-icon mt-2 mt-md-0" type="button"><span>График платежей</span>
                                        <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="img/svg-sprite.svg#icon-chevron-right-small"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">Необходимый ежемесячный доход, от</span><span class="text-number-ml fw-bold text-nowrap js-calculator-display-income">35 404,38&nbsp;<span class="currency">₽</span></span>
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
                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg" height="610.296875" width="505.5">
                        <polygon points="2,2 504,2 504,568 464,608 2,608" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
