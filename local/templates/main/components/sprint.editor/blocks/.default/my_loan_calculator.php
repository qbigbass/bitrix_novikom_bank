<?php
/** @var $block array */
?>
<div class="calculator-layout loan-calculator">
    <div class="calculator-layout__form">
        <div class="a-slider-input js-a-slider-input" data-type="price" data-steps="" data-start-value="1000000" data-max-value="5000000" data-min-value="20000" data-step-size="5000">
            <label for="amount-credit" class="a-slider-input__label body-s-light dark-70">Сумма кредита</label>
            <div class="a-slider-input-text js-a-slider-input-text">
                <input class="a-slider-input-text__input headline-3 js-a-slider-input-text-input">
                <button class="a-slider-input-text__button a-slider-input-text__button--edit js-a-slider-input-text-edit">
                    <span class="a-icon size-m">
                        <svg>
                            <use xlink:href="assets/svg-sprite.svg#icon-edit"></use>
                        </svg>
                    </span>
                </button>
                <button class="a-slider-input-text__button a-slider-input-text__button--close js-a-slider-input-text-close">
                    <span class="a-icon size-m">
                        <svg>
                            <use xlink:href="assets/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="a-slider-input__inner js-a-slider-input-inner">
                <input id="amount-credit" class="a-slider-input__slider js-a-slider-input-slider" type="range" step="1" min="0" max="1" value="0">
            </div>
            <div class="a-slider-input-text-steps js-a-slider-input-text-steps"></div>
        </div>
        <div class="a-slider-input js-a-slider-input" data-type="month" data-steps="" data-start-value="36" data-max-value="60" data-min-value="1" data-step-size="1">
            <label for="payment-term" class="a-slider-input__label body-s-light dark-70">Срок выплаты</label>
            <div class="a-slider-input-text js-a-slider-input-text">
                <input class="a-slider-input-text__input headline-3 js-a-slider-input-text-input">
                <button class="a-slider-input-text__button a-slider-input-text__button--edit js-a-slider-input-text-edit">
                    <span class="a-icon size-m">
                        <svg>
                            <use xlink:href="assets/svg-sprite.svg#icon-edit"></use>
                        </svg>
                    </span>
                </button>
                <button class="a-slider-input-text__button a-slider-input-text__button--close js-a-slider-input-text-close">
                    <span class="a-icon size-m">
                        <svg>
                            <use xlink:href="assets/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="a-slider-input__inner js-a-slider-input-inner">
                <input id="payment-term" class="a-slider-input__slider js-a-slider-input-slider" type="range" step="1" min="0" max="1" value="0">
            </div>
            <div class="a-slider-input-text-steps js-a-slider-input-text-steps"></div>
        </div>
        <div class="a-select-input js-a-select-input a-select-input--size-m">
            <label class="a-select-input__label body-s-heavy">Особенности</label>
            <div class="a-select-input__inner js-a-select-input-inner">
                <button class="a-select-input__button js-select-input-button">
                    <span class="a-select-input__placeholder js-select-input-placeholder">Выберите</span>
                </button>
                <input type="hidden" aria-describedby="undefined-hint">
                <span class="a-icon a-select-input__icon size-s">
                    <svg>
                        <use xlink:href="assets/svg-sprite.svg#icon-chevron-down-small"></use>
                    </svg>
                </span>
            </div>
            <div class="a-drop-down-menu custom-scrollbar js-a-drop-down">
                <div data-value="with-individual" data-display-value="С поручительством физического лица" aria-selected="true" class="a-drop-down-item js-a-drop-down-item">
                    С поручительством физического лица
                </div>
                <div data-value="variant-2" data-display-value="Вариант 2" aria-selected="false" class="a-drop-down-item js-a-drop-down-item">
                    Вариант 2
                </div>
            </div>
        </div>
        <div class="a-select-input js-a-select-input a-select-input--size-m">
            <label class="a-select-input__label body-s-heavy">Тип платежей</label>
            <div class="a-select-input__inner js-a-select-input-inner">
                <button class="a-select-input__button js-select-input-button">
                    <span class="a-select-input__placeholder js-select-input-placeholder">Выберите</span>
                </button>
                <input type="hidden" aria-describedby="undefined-hint">
                <span class="a-icon a-select-input__icon size-s">
                    <svg>
                        <use xlink:href="assets/svg-sprite.svg#icon-chevron-down-small"></use>
                    </svg>
                </span>
            </div>
            <div class="a-drop-down-menu custom-scrollbar js-a-drop-down">
                <div data-value="annuity" data-display-value="Аннуитетные" aria-selected="true" class="a-drop-down-item js-a-drop-down-item">
                    Аннуитетные
                </div>
                <div data-value="variant-2" data-display-value="Вариант 2" aria-selected="false" class="a-drop-down-item js-a-drop-down-item">
                    Вариант 2
                </div>
            </div>
        </div>
        <div class="calculator-layout__agreements">
            <div class="a-checkbox js-a-checkbox a-checkbox--size-m">
                <label class="a-checkbox__inner" for="insurance">
                    <input class="a-checkbox__input" id="insurance" type="checkbox">
                    <span class="a-checkbox__box">
                        <span class="a-icon a-checkbox__icon size-s">
                            <svg>
                                <use xlink:href="assets/svg-sprite.svg#icon-check"></use>
                            </svg>
                        </span>
                    </span>
                    <span class="a-checkbox__label">
                        <div class="body-m-light">Страховка</div>
                    </span>
                </label>
            </div>
        </div>
    </div>
    <div class="calculator-layout__card">
        <div class="calculator-card js-calculator-card calculator-card--grey">
            <div class="a-polygon-container js-a-polygon-container">
                <div class="a-polygon-container__content">
                    <div class="calculator-card__inner">
                        <div class="calculator-card-item js-calculator-card-item">
                            <div class="calculator-card-item__hint body-s-light">Процентная ставка</div>
                            <div class="calculator-card-item__value">
                                <div class="calculator-card-item__text number-l-heavy">
                                    <span class="calculator-card-item__number js-calculator-card-item-number">16,5%</span>
                                </div>
                            </div>
                        </div>
                        <div class="calculator-card-item js-calculator-card-item">
                            <div class="calculator-card-item__hint body-s-light">Ежемесячный платеж</div>
                            <div class="calculator-card-item__value">
                                <div class="calculator-card-item__text number-l-heavy">
                                    <span class="calculator-card-item__number js-calculator-card-item-number">35 404,38</span>
                                    <span class="calculator-card-item__currency currency">₽</span>
                                </div>
                                <a href="#" class="a-button calculator-card-item__link js-calculator-card-item-link a-button--s a-button--primary a-button--link a-button--text">График платежей
                                    <span class="a-icon a-button__icon">
                                        <svg>
                                            <use xlink:href="assets/svg-sprite.svg#icon-chevron-right"></use>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="calculator-card-item js-calculator-card-item">
                            <div class="calculator-card-item__hint body-s-light">Диапазон полной стоимости кредита</div>
                            <div class="calculator-card-item__value">
                                <div class="calculator-card-item__text number-l-heavy">
                                    <span class="calculator-card-item__number js-calculator-card-item-number">16,464 – 20,474 %</span>
                                </div>
                            </div>
                        </div>
                        <div class="calculator-card__footer">
                            <button class="a-button js-calculator-card-button a-button--lm a-button--primary a-button--full">Оформить заявку</button>
                            <div class="calculator-card__note body-s-light"></div>
                        </div>
                    </div>
                </div>
                <div class="a-polygon-container__polygon js-a-polygon-container-polygon green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="js-a-polygon-container-svg">
                        <polygon points="" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

