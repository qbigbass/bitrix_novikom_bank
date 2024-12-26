const ELEMS_BONUS = {
    root: '.js-calculator-bonus',
    displayBonus: ".js-calculator-display-bonus",
    inputAmount: "#amount-bonus",
    cardType: ".js-card-type",
    cardCategory: ".js-card-category",
    inputBonusWrapper: ".js-input-bonus-wrapper",
}

function setBonusValues(STATE) {
    const filterType = STATE.calculatorData.filter(item => item.cardType === STATE.cardType);
    const findCategory = filterType.find(item => item.cardCategory === STATE.cardCategory);

    if (!findCategory) {
        throw new Error('Категория карты не найдена');
    }
    STATE.filteredData = findCategory;

    STATE.rate = STATE.filteredData.rateUpTo15k;

    // TODO: надо переделать, когда апи будет работать
    // if (STATE.filteredData.rateUpTo15k === null) {
    //     STATE.rate = STATE.filteredData.rateUpTo75k;
    //     const inputClone = STATE.elements.inputAmountWrapper.cloneNode(true);
    //     STATE.elements.inputAmountWrapper.remove();
    //     inputClone.dataset.minValue = 15000;
    //     inputClone.dataset.startValue = 15000;
    //     inputClone.querySelector(JS_CLASSES.textSteps).textContent = '';
    //     STATE.elements.inputBonusWrapper.prepend(inputClone);
    //     initInputSlider([inputClone]);
    // }

    if (Number(STATE.amount) >= 15000 && Number(STATE.amount) < 75000) {
        STATE.rate = STATE.filteredData.rateUpTo75k;
    } else if (Number(STATE.amount) >= 75000) {
        STATE.rate = STATE.filteredData.rateUpFrom75k;
    }

    const limitBonus = Number(STATE.filteredData.valueHelloBonus) + Number(STATE.filteredData.maxSumInMonth) * 12;

    STATE.totalBonus = STATE.amount / 100 * Number(STATE.rate) * 12 + Number(STATE.filteredData.valueHelloBonus);

    if (STATE.totalBonus > limitBonus) {
        STATE.totalBonus = limitBonus;
    }

    STATE.elements.displayBonus.textContent = `${formatNumberWithSpaces(STATE.totalBonus)} ${plural(['бонус', 'бонуса', 'бонусов'], STATE.totalBonus)}`;
}

function collectSelectOptions(data, field) {
    return [...new Set(data.map(item => item[field]))];
}

function findCategoryCard(STATE) {
    const filterType = STATE.calculatorData.filter(item => item.cardType === STATE.cardType);

    STATE.cardCategoryOptions = collectSelectOptions(filterType, 'cardCategory');
    setSelectOptions('selectCardCategory', STATE.cardCategoryOptions, STATE);

    STATE.cardCategory = STATE.elements.selectCardCategory.value;
}

function getBonusValues(STATE) {
    STATE.cardTypeOptions = collectSelectOptions(STATE.calculatorData, 'cardType');
    setSelectOptions('selectCardType', STATE.cardTypeOptions, STATE);

    STATE.cardType = STATE.elements.selectCardType.value;

    findCategoryCard(STATE);

    STATE.cardCategory = STATE.elements.selectCardCategory.value;
    STATE.amount = STATE.elements.inputAmountWrapper.dataset.startValue;
    initInputSlider([STATE.elements.inputAmountWrapper]);

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        STATE.amount = event.detail.value;
        setBonusValues(STATE);
    });

    $(ELEMS_BONUS.cardType).on('select2:select', (event) => {
        STATE.cardType = event.target.value;
        findCategoryCard(STATE);
        setBonusValues(STATE);
    });

    $(ELEMS_BONUS.cardCategory).on('select2:select', (event) => {
        STATE.cardCategory = event.target.value;
        setBonusValues(STATE);
    });
}

function initElementsBonusCalculator(root) {
    const displayBonus = root.querySelector(ELEMS_BONUS.displayBonus);
    const inputAmount = root.querySelector(ELEMS_BONUS.inputAmount);
    const inputAmountWrapper = inputAmount.closest(ELEMS_DEPOSIT.inputSlider);
    const selectCardType = root.querySelector(ELEMS_BONUS.cardType);
    const selectCardCategory = root.querySelector(ELEMS_BONUS.cardCategory);
    const inputBonusWrapper = root.querySelector(ELEMS_BONUS.inputBonusWrapper);

    return {
        root,
        displayBonus,
        inputAmount,
        inputAmountWrapper,
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
                setBonusValues(STATE);
            })
            .catch(error => {
                console.error('Ошибка в initCalculatorBonus функции:', error);
            });

    }
}
