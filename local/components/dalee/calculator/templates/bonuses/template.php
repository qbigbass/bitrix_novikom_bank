<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="row js-calculator-bonus" data-id="<?= $arParams['CALCULATOR_ELEMENT_ID'] ?? '' ?>" data-table="program_bonuses">
    <div class="col-12 col-lg-6">
        <div class="pe-xl-6">
            <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7 js-input-bonus-wrapper">
                <div class="input-slider" data-type="price" data-start-value="5000" data-max-value="500000" data-min-value="5000" data-step-size="1000">
                    <label class="text-s dark-70 ps-3 mb-2" for="amount-bonus">Ваши покупки по карте в месяц</label>
                    <div class="input-slider-text js-input-slider-text">
                        <input class="input-slider-text__input h4 js-input-slider-text-input">
                        <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button" aria-label="Редактировать значение">
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
                        <input class="input-slider__item js-input-slider-input" id="amount-bonus" type="range" step="1" min="0" max="1" value="0">
                    </div>
                    <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                </div>
                <div class="row row-gap-4 row-gap-lg-6">
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-column row-gap-2">
                            <label class="form-label mb-0" for="select-type">Тип карты</label>
                            <select class="form-select js-select js-card-type" id="select-type" aria-label="Тип карты"></select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-column row-gap-2">
                            <label class="form-label mb-0" for="select-category">Категория основной карты</label>
                            <select class="form-select js-select js-card-category" id="select-category" aria-label="Категория основной карты"></select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mt-4 mt-md-6 mt-lg-0">
        <div class="ps-xxl-6">
            <div class="polygon-container js-polygon-container">
                <div class="polygon-container__content">
                    <div class="card-calculate-result bg-gradient-violet card-calculate-result--type-bonus">
                        <div class="card-calculate-result__body">
                            <div class="d-flex flex-column row-gap-2"><span class="card-calculate-result__label text-s">За год будет начислено</span><span class="text-number-ml fw-bold text-nowrap js-calculator-display-bonus">600 бонусов</span></div>
                        </div>
                    </div>
                </div>
                <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
