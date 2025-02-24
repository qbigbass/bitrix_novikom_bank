const ELEMS_BONUS = {
    root: ".js-calculator-bonus",
    displayBonus: ".js-calculator-display-bonus",
    inputAmount: "#amount-bonus",
    cardType: ".js-card-type",
    cardCategory: ".js-card-category",
    inputBonusWrapper: ".js-input-bonus-wrapper",
    hideClass: "d-none",
    inputSlider: '.input-slider',
}

function filterBonusData(STATE) {
    const filterType = STATE.calculatorData.filter(item => item.cardType === STATE.cardType);
    const findCategory = filterType.find(item => item.cardCategory === STATE.cardCategory);

    if (!findCategory) {
        throw new Error('Категория карты не найдена');
    }
    return findCategory;
}

function setBonusValues(STATE) {
    STATE.rate = STATE.filteredData.rateUpTo_15k;

    if (Number(STATE.amount) >= 15000 && Number(STATE.amount) < 75000) {
        STATE.rate = STATE.filteredData.rateUpTo_75k;
    } else if (Number(STATE.amount) >= 75000) {
        STATE.rate = STATE.filteredData.rateUpFrom_75k;
    }

    const limitBonus = Number(STATE.filteredData.valueHelloBonus) + Number(STATE.filteredData.maxSumInMonth) * 12;

    STATE.totalBonus = STATE.amount / 100 * Number(STATE.rate) * 12 + Number(STATE.filteredData.valueHelloBonus);

    if (STATE.totalBonus > limitBonus) {
        STATE.totalBonus = limitBonus;
    }

    STATE.elements.displayBonus.textContent = `${formatNumberWithSpaces(Math.round(STATE.totalBonus))} ${plural(['бонус', 'бонуса', 'бонусов'], STATE.totalBonus)}`;
}

function findBonusCategoryCard(STATE) {
    const filterType = STATE.calculatorData.filter(item => item.cardType === STATE.cardType);

    STATE.cardCategoryOptions = collectSelectOptions(filterType, 'cardCategory');
    setSelectOptions('selectCardCategory', STATE.cardCategoryOptions, STATE);

    STATE.cardCategory = STATE.elements.selectCardCategory.value;
}

function setCloneInputAmount(STATE) {
    STATE.elements.inputAmountClone.dataset.minValue = 15000;
    STATE.elements.inputAmountClone.dataset.startValue = 15000;
    STATE.elements.inputAmountClone.querySelector(JS_CLASSES.textSteps).textContent = '';
    STATE.elements.inputBonusWrapper.prepend(STATE.elements.inputAmountClone);
    STATE.elements.inputAmountClone.classList.add('d-none');
}

function checkBonusRate(STATE) {
    if (STATE.filteredData.rateUpTo_15k === null || Number(STATE.filteredData.rateUpTo_15k) === 0) {
        STATE.rate = STATE.filteredData.rateUpTo_75k;
        STATE.elements.inputAmountWrapper.classList.add(ELEMS_BONUS.hideClass);
        STATE.elements.inputAmountClone.classList.remove(ELEMS_BONUS.hideClass);
        const currentInput = STATE.elements.inputAmountClone.querySelector(ELEMS_BONUS.inputAmount);
        STATE.amount = currentInput.value;

    } else if (STATE.elements.inputAmountWrapper.classList.contains(ELEMS_BONUS.hideClass)) {
        STATE.elements.inputAmountClone.classList.add(ELEMS_BONUS.hideClass);
        STATE.elements.inputAmountWrapper.classList.remove(ELEMS_BONUS.hideClass);
        const currentInput = STATE.elements.inputAmountWrapper.querySelector(ELEMS_BONUS.inputAmount);
        STATE.amount = currentInput.value;
    }
}

function getBonusValues(STATE) {
    STATE.cardTypeOptions = collectSelectOptions(STATE.calculatorData, 'cardType');
    setSelectOptions('selectCardType', STATE.cardTypeOptions, STATE);

    STATE.cardType = STATE.elements.selectCardType.value;

    findBonusCategoryCard(STATE);

    STATE.cardCategory = STATE.elements.selectCardCategory.value;
    STATE.amount = STATE.elements.inputAmountWrapper.dataset.startValue;
    setCloneInputAmount(STATE);
    initInputSlider([STATE.elements.inputAmountWrapper, STATE.elements.inputAmountClone]);

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        STATE.amount = event.detail.value;
        setBonusValues(STATE);
    });

    STATE.elements.inputAmountClone.addEventListener('input', (event) => {
        STATE.amount = event.detail.value;
        setBonusValues(STATE);
    });

    $(ELEMS_BONUS.cardType).on('select2:select', (event) => {
        STATE.cardType = event.target.value;
        findBonusCategoryCard(STATE);
        STATE.filteredData = filterBonusData(STATE);

        checkBonusRate(STATE);
        setBonusValues(STATE);
    });

    $(ELEMS_BONUS.cardCategory).on('select2:select', (event) => {
        STATE.cardCategory = event.target.value;
        STATE.filteredData = filterBonusData(STATE);
        setBonusValues(STATE);
    });
}

function initElementsBonusCalculator(root) {
    const displayBonus = root.querySelector(ELEMS_BONUS.displayBonus);
    const inputAmount = root.querySelector(ELEMS_BONUS.inputAmount);
    const inputAmountWrapper = inputAmount.closest(ELEMS_BONUS.inputSlider);
    const inputAmountClone = inputAmountWrapper.cloneNode(true);
    const selectCardType = root.querySelector(ELEMS_BONUS.cardType);
    const selectCardCategory = root.querySelector(ELEMS_BONUS.cardCategory);
    const inputBonusWrapper = root.querySelector(ELEMS_BONUS.inputBonusWrapper);

    return {
        root,
        displayBonus,
        inputAmount,
        inputAmountWrapper,
        inputAmountClone,
        selectCardType,
        selectCardCategory,
        inputBonusWrapper
    }

}

function initStateBonusCalculator(calculator) {
    return getRates(calculator.dataset)
        .then(calculatorData => {
            const elements = initElementsBonusCalculator(calculator);

            return {
                elements,
                calculatorData
            }
        })
        .catch(error => {
            console.error('Ошибка при получении данных:', error);
        });
}

function initCalculatorBonus() {
    const calculatorsBonus = document.querySelectorAll(ELEMS_BONUS.root);

    for (const calculator of calculatorsBonus) {
        initStateBonusCalculator(calculator)
            .then(STATE => {
                getBonusValues(STATE);
                STATE.filteredData = filterBonusData(STATE);
                setBonusValues(STATE);
            })
            .catch(error => {
                console.error('Ошибка в initCalculatorBonus функции:', error);
            });

    }
}

document.addEventListener('DOMContentLoaded', () => {
    initCalculatorBonus();
})
