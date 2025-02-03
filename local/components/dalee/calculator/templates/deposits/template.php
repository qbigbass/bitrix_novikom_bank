<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="js-calculator-deposit" data-id="<?= $arParams['CALCULATOR_ELEMENT_ID'] ?? '' ?>" data-table="deposits" data-expense-ratio="60">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="pe-xl-6">
                <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7">
                    <div class="d-flex flex-column row-gap-2 js-select-name-wrapper">
                        <label class="form-label mb-0"
                               for="select-deposit-name">Выберите вклад</label>
                        <select class="form-select js-select js-select-deposit-name"
                                id="select-deposit-name" aria-label="Подсказка">
                        </select>
                    </div>
                    <div
                        class="d-flex flex-column flex-md-row-reverse align-items-md-center gap-3 js-input-slider-wrapper">
                        <ul class="nav nav-tabs nav-tabs--type-currency js-tabs-currency"></ul>
                        <div class="input-slider flex-grow-1" data-type="price"
                             data-start-value="1000000" data-step-size="5000">
                            <label class="text-s dark-70 ps-3 mb-2" for="deposit-amount">Сумма
                                вклада</label>
                            <div class="input-slider-text js-input-slider-text">
                                <input
                                    class="input-slider-text__input h4 js-input-slider-text-input">
                                <button
                                    class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit"
                                    type="button" aria-label="Редактировать значение">
                                    <svg class="icon dark-70 size-m"
                                         xmlns="http://www.w3.org/2000/svg" width="100%"
                                         height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-edit"></use>
                                    </svg>
                                </button>
                                <button
                                    class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close"
                                    type="button">
                                    <svg class="icon dark-70 size-m"
                                         xmlns="http://www.w3.org/2000/svg" width="100%"
                                         height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="input-slider__inner js-input-slider-inner">
                                <input
                                    class="js-input-amount input-slider__item js-input-slider-input"
                                    id="deposit-amount" type="range" step="1" min="0" max="1"
                                    value="0">
                            </div>
                            <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                        </div>
                    </div>
                    <div class="input-slider" data-type="day" data-start-value="550">
                        <label class="text-s dark-70 ps-3 mb-2" for="deposit-period">Срок
                            вклада</label>
                        <div
                            class="input-slider__display-value js-input-slider-display-value h4"></div>
                        <div class="input-slider__inner js-input-slider-inner">
                            <input class="js-input-period input-slider__item js-input-slider-input"
                                   id="deposit-period" type="range" step="1" min="0" max="1"
                                   value="0">
                        </div>
                        <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                    </div>
                    <div class="d-flex flex-column align-items-start row-gap-4">
                        <div class="form-check">
                            <input class="form-check-input js-input-deposit-capitalization"
                                   id="input-deposit-capitalization" type="checkbox" value="">
                            <label class="form-check-label" for="input-deposit-capitalization">Капитализация
                                процентов на счет вклада</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input js-replenishment"
                                   id="input-deposit-replenishment" type="checkbox" value=""
                                   data-target="replenishment">
                            <label class="form-check-label" for="input-deposit-replenishment">Планируются
                                пополнения суммы вклада</label>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-start row-gap-4 row-gap-md-6"
                         id="replenishment">
                        <div
                            class="d-flex flex-column flex-md-row gap-4 gap-lg-6 js-replenishment-item"
                            data-id="0">
                            <div class="d-flex flex-column row-gap-2 w-100">
                                <label class="form-label mb-0" for="date">Дата пополнения</label>
                                <div class="position-relative w-100">
                                    <input
                                        class="form-control form-control-lg-lg js-date js-date--today-min"
                                        id="date" type="text" name="date"
                                        placeholder="дд.мм.гг"><span
                                        class="cursor-pointer position-absolute top-0 end-0 violet-70 text-m py-2 px-3 p-lg-3">
                                      <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%"
                                           height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                                      </svg></span>
                                </div>
                            </div>
                            <div class="d-flex flex-column row-gap-2 w-100">
                                <label class="form-label mb-0" for="sum">Сумма пополнения</label>
                                <div class="position-relative w-100">
                                    <input class="form-control form-control-lg-lg" id="sum"
                                           type="text" name="sum"><span
                                        class="currency position-absolute top-0 end-0 dark-70 text-m py-2 px-3 p-lg-3">₽</span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-link btn-sm btn-icon js-add-replenishment"
                                type="button">
                            <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%"
                                 height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-plus"></use>
                            </svg>
                            Добавить пополнение
                        </button>
                        <template id="replenishment-template">
                            <div
                                class="d-flex gap-2 gap-md-4 position-relative js-replenishment-item">
                                <div
                                    class="d-flex flex-column flex-md-row gap-4 gap-lg-6 flex-grow-1">
                                    <div class="d-flex flex-column row-gap-2 w-100">
                                        <label class="form-label mb-0" for="date">Дата
                                            пополнения</label>
                                        <div class="position-relative w-100">
                                            <input
                                                class="form-control form-control-lg-lg js-date js-date--today-min"
                                                type="text" name="date" placeholder="дд.мм.гг"><span
                                                class="cursor-pointer position-absolute top-0 end-0 violet-70 text-m py-2 px-3 p-lg-3">
                                          <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%"
                                               height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                                          </svg></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column row-gap-2 w-100">
                                        <label class="form-label mb-0" for="sum">Сумма
                                            пополнения</label>
                                        <div class="position-relative w-100">
                                            <input class="form-control form-control-lg-lg"
                                                   type="text" name="sum"><span
                                                class="currency position-absolute top-0 end-0 dark-70 text-m py-2 px-3 p-lg-3">₽</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn-remove-replenishment js-remove-replenishment"
                                        type="button">
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg"
                                         width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                                    </svg>
                                </button>
                            </div>
                        </template>
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
                                        class="card-calculate-result__label text-s">Срок вклада</span><span
                                        class="text-number-ml fw-bold text-nowrap js-calculator-display-period"></span>
                                </div>
                                <div class="d-flex flex-column row-gap-2"><span
                                        class="card-calculate-result__label text-s">Процентная ставка</span><span
                                        class="text-number-ml fw-bold text-nowrap js-calculator-display-rate">21 %</span>
                                </div>
                                <div class="d-flex flex-column row-gap-2"><span
                                        class="card-calculate-result__label text-s">Ваш доход составит</span><span
                                        class="text-number-ml fw-bold text-nowrap js-calculator-display-income">6 238&nbsp;<span
                                            class="currency">₽</span></span></div>
                            </div>
                            <div class="card-calculate-result__footer">
                                <button class="btn btn-primary btn-lg-lg w-100" type="button">
                                    Оформить заявку
                                </button>
                                <p class="dark-70 caption-m mb-0">Калькулятор не&nbsp;гарантирует
                                    точность расчетов. Окончательные параметры вклада определяются
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
</div>
