<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
/**
 * @global CMain $APPLICATION
 */
?>
<div class="row js-calculator-loan" data-id="<?= $arParams['CALCULATOR_ELEMENT_ID'] ?? '' ?>" data-table="loans">
    <div class="col-12 col-lg-6">
        <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7">
            <div class="input-slider" data-type="price" data-start-value="1000000"
                 data-step-size="5000">
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
                           id="amount-credit" type="range" step="1" min="0" max="1" value="0">
                </div>
                <div class="input-slider-text-steps js-input-slider-text-steps"></div>
            </div>
            <div class="input-slider" data-type="month" data-start-value="36">
                <label class="text-s dark-70 ps-3 mb-2" for="payment-term">Срок выплаты</label>
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
                           id="payment-term" type="range" step="1" min="0" max="1" value="0">
                </div>
                <div class="input-slider-text-steps js-input-slider-text-steps"></div>
            </div>
            <div class="d-flex flex-column row-gap-4">
                <div class="form-check">
                    <input class="form-check-input js-inp-loan-card" id="inp-loan-card"
                           type="checkbox" value="" checked>
                    <label class="form-check-label" for="inp-loan-card">Получаю
                            зарплату на&nbsp;карту Новиком</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input js-loan-insurance" id="inp-loan-insurance"
                           type="checkbox" value="">
                    <label class="form-check-label" for="inp-loan-insurance" tabindex="0">Страхование</label>
                </div>
                <div class="d-flex flex-column row-gap-4 row-gap-lg-6">
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0"
                               for="select-loan-properties">Особенности</label>
                        <select class="form-select js-select js-select-loan-properties"
                                id="select-loan-properties" aria-label="Подсказка">
                            <option selected value="С поручительством физического лица">С
                                поручительством физического лица
                            </option>
                            <option value="Без обеспечения">Без обеспечения</option>
                            <option value="На рефинансирование">На рефинансирование</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column row-gap-2">
                        <label class="form-label mb-0" for="select-loan-payment-type">Тип
                            платежей</label>
                        <select class="form-select js-select js-select-loan-payment-type"
                                id="select-loan-payment-type" aria-label="Подсказка">
                            <option selected value="annuity">Аннуитетные платежи</option>
                            <option value="differentiated">Дифференцированные платежи</option>
                        </select>
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
                            <h4 class="dark-70 js-loan-name"></h4>
                            <div class="d-flex flex-column row-gap-2"><span
                                    class="card-calculate-result__label text-s">Процентная ставка</span><span
                                    class="text-number-ml fw-bold text-nowrap js-calculator-display-rate">16,5%</span>
                            </div>
                            <div class="d-flex flex-column row-gap-2"><span
                                    class="card-calculate-result__label text-s">Ежемесячный платеж</span><span
                                    class="text-number-ml fw-bold text-nowrap js-calculator-display-payment">35 404,38&nbsp;<span
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
                                data-bs-target="#modal-loan-form"
                            >
                                Оформить заявку
                            </button>
                            <p class="dark-70 caption-m mb-0">Калькулятор не&nbsp;гарантирует
                                точность расчетов. Окончательные параметры кредита определяются
                                по&nbsp;итогам рассмотрения заявки.</p><a
                                class="btn btn-link btn-sm btn-icon mt-md-2 mt-lg-4 align-self-center"
                                data-bs-toggle="collapse" href="#payment-loan-schedule"
                                role="button" aria-expanded="false"
                                aria-controls="payment-loan-schedule"><span>График платежей</span>
                                <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg"
                                     width="100%" height="100%">
                                    <use
                                        xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down-small"></use>
                                </svg>
                            </a>
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
    <div class="col-12 collapse" id="payment-loan-schedule">
        <div class="payment-schedule mt-6 pt-6 mt-md-7 pt-md-7 mt-lg-9 pt-lg-9 custom-overflow-scrollbar">
            <table class="table table--bg-transparent text-center">
                <thead>
                <tr>
                    <th scope="col">Месяц</th>
                    <th scope="col">Оплата процентов</th>
                    <th scope="col">Оплата основного долга</th>
                    <th scope="col">Ежемесячный платеж</th>
                    <th scope="col">Остаток погашения</th>
                </tr>
                </thead>
                <tbody id="payment-loan-table-body"></tbody>
            </table>
        </div>
    </div>
</div>
