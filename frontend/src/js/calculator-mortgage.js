const ELEMS_MORTGAGE = {
    root: '.js-calculator-mortgage',
    inputProperty: '.js-input-property',
    initialPayment: '.js-input-initial-payment',
    selectRegion: '.js-mort-region',
    selectProgram: '.js-mort-program',
    selectObject: '.js-mort-object',
    selectObjectWrapper: '.js-mort-object-wrapper',
    selectBorrower: '.js-mort-borrower',
    inputMortgageCard: '.js-mort-card',
    inputMortgageInsurance: '.js-mort-insurance',
    name: '.js-program-name',
    inputAmount: '.js-input-amount',
    rate: '.js-calculator-display-rate',
    payment: '.js-calculator-display-payment',
    fullCost: '.js-calculator-display-full-cost',
    income: '.js-calculator-display-income',
    inputPeriod: '.js-input-period',
    inputSlider: '.input-slider',
    hideClass: 'd-none',
    inputSliderRange: '.js-input-slider-input',
}

function calculateMortgage({amount, rate, period}) {
    const monthlyRate = rate / 100 / 12; // Преобразуем годовую ставку в месячную

    // Рассчитываем ежемесячный платеж по формуле аннуитета
    return amount * (monthlyRate * Math.pow(1 + monthlyRate, period)) /
        (Math.pow(1 + monthlyRate, period) - 1);
}

function calculateRequiredIncome(monthlyPayment, expenseRatio) {
    // Рассчитываем необходимый ежемесячный доход
    return monthlyPayment / (expenseRatio / 100);
}

function collectRegions(dataArray) {
    return dataArray
        .map(item => item.region) // Извлекаем значения region
        .filter(region => region !== null) // Удаляем null значения
        .flatMap(region => region.split(" / ")) // Разделяем строки по " / " и распаковываем
        .filter((value, index, self) => self.indexOf(value) === index) // Удаляем дубликаты
        .sort(); // Сортируем по алфавиту
}

function setSelectOptions(select, options, STATE) {
    STATE.elements[select].innerHTML = '';

    options.forEach(item => {
        const option = document.createElement('option');
        option.value = item;
        option.textContent = item;
        STATE.elements[select].appendChild(option);
    });
}

function findMinPropertyValue(data) {
    if (data.sumFromPercent && data.sumFromPercent !== 0) {
        return (data.sumFrom / ((100 - data.sumFromPercent) / 100)).toFixed(0);
    } else if (data.minDownPayment && data.minDownPayment !== 0) {
        return (data.sumFrom + data.sumFrom * (data.minDownPayment / 100)).toFixed(0);
    }
    return data.sumFrom;
}

function setInputSliderAttributes(STATE) {
    const minPropertyValue = findMinPropertyValue(STATE.filteredData[0]);
    let maxAmountMortgage = STATE.filteredData[0].sumTo;

    if (STATE.filteredData[0].minDownPayment === 0 || !STATE.filteredData[0].minDownPayment) {
        STATE.elements.inputInitialPaymentWrapper.classList.add(ELEMS_MORTGAGE.hideClass);
    } else {
        STATE.elements.inputInitialPaymentWrapper.classList.remove(ELEMS_MORTGAGE.hideClass);
        const initialPaymentValue = (minPropertyValue - STATE.filteredData[0].sumFrom).toFixed(0);
        maxAmountMortgage = minPropertyValue - initialPaymentValue;

        const dataAttrInitialPayment = {
            'minValue': initialPaymentValue,
            'maxValue': initialPaymentValue,
        }

        STATE.elements.inputInitialPaymentWrapper = createNewInputSlider(STATE.elements.inputInitialPaymentWrapper,
            dataAttrInitialPayment);
        STATE.elements.inputInitialPayment = STATE.elements.inputInitialPaymentWrapper.querySelector(ELEMS_MORTGAGE.initialPayment);

        STATE.elements.inputInitialPaymentWrapper.addEventListener('input', (event) => {
            handlerInitialPayment(STATE, event.detail.value);
        })
    }

    const dataAttrPeriod = {
        'minValue': STATE.filteredData[0].periodFrom,
        'maxValue': STATE.filteredData[0].periodTo,
        'startValue' : STATE.filteredData[0].periodFrom
    }

    const dataAttrProperty = {
        'minValue': minPropertyValue,
        'maxValue': STATE.filteredData[0].maxPropertyValue,
        'startValue' : minPropertyValue
    }

    const dataAttrAmount = {
        'minValue': STATE.filteredData[0].sumFrom,
        'maxValue': maxAmountMortgage,
    }

    STATE.elements.inputPeriodWrapper = createNewInputSlider(STATE.elements.inputPeriodWrapper,
        dataAttrPeriod);
    STATE.elements.inputPeriod = STATE.elements.inputPeriodWrapper.querySelector(ELEMS_MORTGAGE.inputPeriod);

    STATE.elements.inputPropertyWrapper = createNewInputSlider(STATE.elements.inputPropertyWrapper,
        dataAttrProperty);
    STATE.elements.inputProperty = STATE.elements.inputPropertyWrapper.querySelector(ELEMS_MORTGAGE.inputProperty);

    STATE.elements.inputAmountWrapper = createNewInputSlider(STATE.elements.inputAmountWrapper,
        dataAttrAmount);
    STATE.elements.inputAmount = STATE.elements.inputAmountWrapper.querySelector(ELEMS_MORTGAGE.inputAmount);

    STATE.elements.inputPeriodWrapper.addEventListener('input', (event) => {
        STATE.period = event.detail.value;
        STATE.payment = calculateMortgage({amount: STATE.amount, rate: STATE.rate, period: STATE.period});
        STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
        showMortgageResult(STATE);
    })

    STATE.elements.inputPropertyWrapper.addEventListener('input', (event) => {
        handlerProperty(STATE, event.detail.value);
    })

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        handlerAmount(STATE, event.detail.value);
    })
}

function setStartAttributesInputMortgage(STATE) {
    STATE.elements.inputPeriodWrapper.setAttribute('data-min-value', STATE.filteredData[0].periodFrom);
    STATE.elements.inputPeriodWrapper.setAttribute('data-max-value', STATE.filteredData[0].periodTo);
    STATE.elements.inputPeriodWrapper.setAttribute('data-start-value', STATE.filteredData[0].periodFrom);

    const minPropertyValue = findMinPropertyValue(STATE.filteredData[0]);
    let maxAmountMortgage = STATE.filteredData[0].sumFrom;

    if (STATE.filteredData[0].minDownPayment === 0 || !STATE.filteredData[0].minDownPayment) {
        STATE.elements.inputInitialPaymentWrapper.classList.add(ELEMS_MORTGAGE.hideClass);
    } else {
        STATE.elements.inputInitialPaymentWrapper.classList.remove(ELEMS_MORTGAGE.hideClass);
        const initialPaymentValue = (minPropertyValue - STATE.filteredData[0].sumFrom).toFixed(0);
        maxAmountMortgage = minPropertyValue - initialPaymentValue;

        STATE.elements.inputInitialPaymentWrapper.setAttribute('data-min-value', initialPaymentValue);
        STATE.elements.inputInitialPaymentWrapper.setAttribute('data-max-value', initialPaymentValue);
    }

    STATE.elements.inputPropertyWrapper.setAttribute('data-min-value', minPropertyValue);
    STATE.elements.inputPropertyWrapper.setAttribute('data-start-value', minPropertyValue);
    STATE.elements.inputPropertyWrapper.setAttribute('data-max-value', STATE.filteredData[0].maxPropertyValue);


    STATE.elements.inputAmountWrapper.setAttribute('data-min-value', STATE.filteredData[0].sumFrom);
    STATE.elements.inputAmountWrapper.setAttribute('data-max-value', maxAmountMortgage);

    initInputSlider([
        STATE.elements.inputPeriodWrapper,
        STATE.elements.inputAmountWrapper,
        STATE.elements.inputPropertyWrapper,
        STATE.elements.inputInitialPaymentWrapper
    ]);
}

function showMortgageResult(STATE) {
    STATE.elements.displayName.textContent = STATE.filteredData[0].name;
    STATE.elements.displayRate.textContent = `${formatNumber(STATE.rate)} %`;
    STATE.elements.displayPayment.innerHTML = `${formatNumber(STATE.payment.toFixed(2))} <span class="currency">₽</span>`;
    STATE.elements.displayIncome.innerHTML = `${formatNumber(STATE.requiredIncome.toFixed(2))} <span class="currency">₽</span>`;
}

function getMortgageRegions(STATE) {
    return STATE.calculatorData.filter(item =>
        item.region && item.region.split(" / ").includes(STATE.region)
    );
}

function getMortgagePrograms(dataArray, STATE) {
    const programs = collectSelectOptions(dataArray, 'name');

    setSelectOptions('selectProgram', programs, STATE);
    STATE.program = STATE.elements.selectProgram.value;

    return dataArray.filter(item =>
        item.name && item.name === STATE.program
    );
}

function getMortgageObjects(dataArray, STATE) {
    STATE.objects = collectSelectOptions(dataArray, 'object');

    if (STATE.objects.length > 1) {
        STATE.elements.selectObjectWrapper.classList.remove(ELEMS_MORTGAGE.hideClass);
        setSelectOptions('selectObject', STATE.objects, STATE);
        STATE.object = STATE.elements.selectObject.value;
    } else {
        STATE.elements.selectObjectWrapper.classList.add(ELEMS_MORTGAGE.hideClass);
        STATE.object = STATE.objects[0];
    }

    return dataArray.filter(item =>
        item.object && item.object === STATE.object
    );
}

function getMortgageBorrower(dataArray, STATE) {
    STATE.borrower = collectSelectOptions(dataArray, 'borrowerType');
    setSelectOptions('selectBorrower', STATE.borrower, STATE);
    STATE.borrower = STATE.elements.selectBorrower.value;

    return dataArray.filter(item =>
        item.borrowerType && item.borrowerType === STATE.borrower
    );
}

function createNewInputSlider(inputSlider, dataAttr) {
    const cloneInputSlider = inputSlider.cloneNode(true);
    Object.entries(dataAttr).forEach(([key, value]) => {
        cloneInputSlider.dataset[key] = value;
    })
    cloneInputSlider.querySelector(JS_CLASSES.textSteps).textContent = '';
    cloneInputSlider.querySelector(ELEMS_MORTGAGE.inputSliderRange).style = '';
    initInputSlider([cloneInputSlider]);
    inputSlider.replaceWith(cloneInputSlider);
    return cloneInputSlider;
}

function handlerInitialPayment(STATE, value) {
    if (STATE.isDispatchingEvent) return;
    STATE.isDispatchingEvent = true;

    STATE.initialPayment = value;
    STATE.amount = STATE.property - STATE.initialPayment;
    STATE.payment = calculateMortgage({amount: STATE.amount, rate: STATE.rate, period: STATE.period});
    STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
    showMortgageResult(STATE);
    STATE.elements.inputAmount.value = (STATE.amount);

    const customEvent = new CustomEvent('input', {
        bubbles: false
    });

    STATE.elements.inputAmount.dispatchEvent(customEvent);

    STATE.isDispatchingEvent = false;

}

function handlerAmount(STATE, value) {
    if (STATE.isDispatchingEvent) return;

    STATE.isDispatchingEvent = true;
    STATE.amount = value;
    STATE.payment = calculateMortgage({amount: STATE.amount, rate: STATE.rate, period: STATE.period});
    STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
    showMortgageResult(STATE);
    STATE.elements.inputInitialPayment.value = (STATE.property - STATE.amount);
    const customEvent = new CustomEvent('input', {
        bubbles: false
    });
    STATE.elements.inputInitialPayment.dispatchEvent(customEvent);
    STATE.isDispatchingEvent = false;
}

function findMinAmount(data, value) {
    let minAmount;
    if (data.sumFromPercent && data.sumFromPercent !== 0) {
        minAmount = Math.round(value * (data.sumFromPercent / 100));
    } else if (data.minDownPayment && data.minDownPayment !== 0) {
        minAmount = Math.round(value * (data.minDownPayment / 100));
    }
    return (minAmount < data.sumFrom) ? data.sumFrom : minAmount;
}

function findMaxAmount(data, value) {
    let maxAmount;
    if (data.sumToPercent && data.sumToPercent !== 0) {
        maxAmount = Math.round(value * (data.sumToPercent / 100));
    } else if (data.minDownPayment && data.minDownPayment !== 0) {
        maxAmount = Math.round(value - value * (data.minDownPayment / 100));
    }
    maxAmount = (maxAmount > data.sumTo) ? data.sumTo : maxAmount;
    return (maxAmount < data.sumFrom) ? data.sumFrom : maxAmount;
}

function findMinInitialPayment(data, value, maxAmount) {
    let minInitialPayment = Math.round(value * (data.minDownPayment / 100));
    return ((value - maxAmount) > minInitialPayment) ? value - maxAmount : minInitialPayment;

}

function handlerProperty(STATE, value) {
    STATE.property = value;
    let minAmount = findMinAmount(STATE.filteredData[0], value);
    let maxAmount = findMaxAmount(STATE.filteredData[0], value);
    STATE.amount = minAmount;

    // если есть первоначальный взнос
    if (STATE.filteredData[0].minDownPayment && STATE.filteredData[0].minDownPayment !== 0) {
        const minInitialPayment = findMinInitialPayment(STATE.filteredData[0], value, maxAmount);
        STATE.initialPayment = STATE.property - STATE.amount;

        const dataAttrInitial = {
            'minValue': minInitialPayment,
            'maxValue': STATE.initialPayment,
            'startValue': STATE.initialPayment
        }

        STATE.elements.inputInitialPaymentWrapper = createNewInputSlider(STATE.elements.inputInitialPaymentWrapper,
            dataAttrInitial);

        STATE.elements.inputInitialPayment = STATE.elements.inputInitialPaymentWrapper.querySelector(ELEMS_MORTGAGE.initialPayment);

        STATE.elements.inputInitialPaymentWrapper.addEventListener('input', (event) => {
            handlerInitialPayment(STATE, event.detail.value);
        })
    }

    const dataAttrAmount = {
        'minValue': minAmount,
        'maxValue': maxAmount,
        'startValue' : minAmount
    }

    STATE.elements.inputAmountWrapper = createNewInputSlider(STATE.elements.inputAmountWrapper,
        dataAttrAmount);
    STATE.elements.inputAmount = STATE.elements.inputAmountWrapper.querySelector(ELEMS_MORTGAGE.inputAmount);

    STATE.payment = calculateMortgage({amount: STATE.amount, rate: STATE.rate, period: STATE.period});
    STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
    showMortgageResult(STATE);

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        handlerAmount(STATE, event.detail.value);
    })
}

function mortgageFilter(STATE) {
    STATE.filteredData = STATE.calculatorData.filter(item =>
        item.region && item.region.split(" / ").includes(STATE.region) &&
        item.name && item.name === STATE.program &&
        item.object && item.object === STATE.object &&
        item.borrowerType && item.borrowerType === STATE.borrower
    );

    STATE.filteredData = STATE.filteredData.filter(item => {
        if (!item.insurance) item.insurance = 'N';
        if (!item.salaryBankCard) item.salaryBankCard = 'N';
        return (item.insurance === STATE.insurance) && (item.salaryBankCard === STATE.card);
    });
}

function handlerMortgageCheckbox(STATE) {
    mortgageFilter(STATE);

    STATE.rate = STATE.filteredData[0].rate;
    STATE.payment = calculateMortgage(STATE);
    STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
    showMortgageResult(STATE);
}

function setMortgageValues(STATE) {
    STATE.elements.inputMortgageCard.addEventListener('change', (event) => {
        STATE.card = event.target.checked ? 'Y' : 'N';

        handlerMortgageCheckbox(STATE);
    })

    STATE.elements.inputMortgageInsurance.addEventListener('change', (event) => {
        STATE.insurance = event.target.checked ? 'Y' : 'N';

        handlerMortgageCheckbox(STATE);
    })

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        handlerAmount(STATE, event.detail.value);
    })

    STATE.elements.inputPropertyWrapper.addEventListener('input', (event) => {
        handlerProperty(STATE, event.detail.value);
    })

    STATE.elements.inputPeriodWrapper.addEventListener('input', (event) => {
        STATE.period = event.detail.value;
        STATE.payment = calculateMortgage({amount: STATE.amount, rate: STATE.rate, period: STATE.period});
        STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
        showMortgageResult(STATE);
    })

    $(ELEMS_MORTGAGE.selectRegion).on('select2:select', function (event) {
        STATE.region = event.target.value;
        STATE.filteredData = getMortgageRegions(STATE);
        STATE.filteredData = getMortgagePrograms(STATE.filteredData, STATE);
        STATE.filteredData = getMortgageObjects(STATE.filteredData, STATE);
        STATE.filteredData = getMortgageBorrower(STATE.filteredData, STATE);

        STATE.filteredData = STATE.filteredData.filter(item => {
            if (!item.insurance) item.insurance = 'N';
            if (!item.salaryBankCard) item.salaryBankCard = 'N';
            return (item.insurance === STATE.insurance) && (item.salaryBankCard === STATE.card);
        });

        setInputSliderAttributes(STATE);

        STATE.rate = STATE.filteredData[0].rate;
        STATE.payment = calculateMortgage(STATE);
        STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
        showMortgageResult(STATE);
    })

    $(ELEMS_MORTGAGE.selectProgram).on('select2:select', function (event) {
        STATE.program = event.target.value;
        STATE.filteredData = getMortgageRegions(STATE);
        STATE.filteredData = STATE.filteredData.filter(item =>
            item.name && item.name === STATE.program
        );
        STATE.filteredData = getMortgageObjects(STATE.filteredData, STATE);
        STATE.filteredData = getMortgageBorrower(STATE.filteredData, STATE);

        STATE.filteredData = STATE.filteredData.filter(item => {
            if (!item.insurance) item.insurance = 'N';
            if (!item.salaryBankCard) item.salaryBankCard = 'N';
            return (item.insurance === STATE.insurance) && (item.salaryBankCard === STATE.card);
        });

        setInputSliderAttributes(STATE);

        STATE.rate = STATE.filteredData[0].rate;
        STATE.payment = calculateMortgage(STATE);
        STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
        showMortgageResult(STATE);
    })

    $(ELEMS_MORTGAGE.selectObject).on('select2:select', function (event) {
        STATE.object = event.target.value;
        STATE.filteredData = getMortgageRegions(STATE);
        STATE.filteredData = STATE.filteredData.filter(item =>
            item.name && item.name === STATE.program
        );
        STATE.filteredData = STATE.filteredData.filter(item =>
            item.object && item.object === STATE.object
        );

        STATE.filteredData = getMortgageBorrower(STATE.filteredData, STATE);

        STATE.filteredData = STATE.filteredData.filter(item => {
            if (!item.insurance) item.insurance = 'N';
            if (!item.salaryBankCard) item.salaryBankCard = 'N';
            return (item.insurance === STATE.insurance) && (item.salaryBankCard === STATE.card);
        });

        setInputSliderAttributes(STATE);

        STATE.rate = STATE.filteredData[0].rate;
        STATE.payment = calculateMortgage(STATE);
        STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
        showMortgageResult(STATE);
    })

    $(ELEMS_MORTGAGE.selectBorrower).on('select2:select', function (event) {
        STATE.borrower = event.target.value;
        mortgageFilter(STATE);

        STATE.rate = STATE.filteredData[0].rate;
        STATE.payment = calculateMortgage(STATE);
        STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);
        showMortgageResult(STATE);
    })
}

function getMortgageValues(STATE) {
    STATE.regions = collectRegions(STATE.calculatorData);
    setSelectOptions('selectRegion', STATE.regions, STATE);
    STATE.region = STATE.elements.selectRegion.value;

    STATE.filteredData = getMortgageRegions(STATE);
    STATE.filteredData = getMortgagePrograms(STATE.filteredData, STATE);
    STATE.filteredData = getMortgageObjects(STATE.filteredData, STATE);
    STATE.filteredData = getMortgageBorrower(STATE.filteredData, STATE);

    setStartAttributesInputMortgage(STATE);

    STATE.insurance = STATE.elements.inputMortgageInsurance.checked ? 'Y' : 'N';
    STATE.card = STATE.elements.inputMortgageCard.checked ? 'Y' : 'N';
    STATE.filteredData = STATE.filteredData.filter(item => {
        if (!item.insurance) item.insurance = 'N';
        if (!item.salaryBankCard) item.salaryBankCard = 'N';
        return (item.insurance === STATE.insurance) && (item.salaryBankCard === STATE.card);
    });


    STATE.expenseRatio = STATE.elements.root.dataset.expenseRatio;
    STATE.rate = STATE.filteredData[0].rate;
    STATE.period = STATE.elements.inputPeriod.value;
    STATE.amount = STATE.elements.inputAmount.value;
    STATE.payment = calculateMortgage(STATE);
    STATE.requiredIncome = calculateRequiredIncome(STATE.payment, STATE.expenseRatio);

    showMortgageResult(STATE);
}

function initElementsMortgageCalculator(root) {
    const displayRate = root.querySelector(ELEMS_MORTGAGE.rate);
    const displayPayment = root.querySelector(ELEMS_MORTGAGE.payment);
    const displayFullCost = root.querySelector(ELEMS_MORTGAGE.fullCost);
    const displayIncome = root.querySelector(ELEMS_MORTGAGE.income);
    const displayName = root.querySelector(ELEMS_MORTGAGE.name);
    const inputAmount = root.querySelector(ELEMS_MORTGAGE.inputAmount);
    const inputPeriod = root.querySelector(ELEMS_MORTGAGE.inputPeriod);
    const inputPropertyValue = root.querySelector(ELEMS_MORTGAGE.inputProperty);
    const inputInitialPayment = root.querySelector(ELEMS_MORTGAGE.initialPayment);
    const inputPeriodWrapper = inputPeriod.closest(ELEMS_MORTGAGE.inputSlider);
    const inputAmountWrapper = inputAmount.closest(ELEMS_MORTGAGE.inputSlider);
    const inputPropertyWrapper = inputPropertyValue.closest(ELEMS_MORTGAGE.inputSlider);
    const inputInitialPaymentWrapper = inputInitialPayment.closest(ELEMS_MORTGAGE.inputSlider);
    const selectRegion = root.querySelector(ELEMS_MORTGAGE.selectRegion);
    const selectProgram = root.querySelector(ELEMS_MORTGAGE.selectProgram);
    const selectObject = root.querySelector(ELEMS_MORTGAGE.selectObject);
    const selectObjectWrapper = selectObject.closest(ELEMS_MORTGAGE.selectObjectWrapper);
    const selectBorrower = root.querySelector(ELEMS_MORTGAGE.selectBorrower);
    const inputMortgageCard = root.querySelector(ELEMS_MORTGAGE.inputMortgageCard);
    const inputMortgageInsurance = root.querySelector(ELEMS_MORTGAGE.inputMortgageInsurance);

    return {
        root,
        displayRate,
        displayPayment,
        displayFullCost,
        displayIncome,
        displayName,
        inputAmount,
        inputPeriod,
        inputPropertyValue,
        inputInitialPayment,
        inputPeriodWrapper,
        inputAmountWrapper,
        inputPropertyWrapper,
        inputInitialPaymentWrapper,
        selectRegion,
        selectProgram,
        selectObject,
        selectObjectWrapper,
        selectBorrower,
        inputMortgageCard,
        inputMortgageInsurance
    }
}

function initStateMortgageCalculator(calculator) {
    return getRates(calculator.dataset)
        .then(calculatorData => {
            const elements = initElementsMortgageCalculator(calculator);

            return {
                elements,
                calculatorData
            }
        })
        .catch((error) => {
            console.error('error initStateMortgageCalculator', error);
        })
}

async function initCalculatorMortgage() {
    const calculatorsMortgage = document.querySelectorAll(ELEMS_MORTGAGE.root);

    for (const calculator of calculatorsMortgage) {
        initStateMortgageCalculator(calculator)
            .then(STATE => {
                getMortgageValues(STATE);
                setMortgageValues(STATE);
            })
            .catch((error) => {
                console.error('error initCalculatorMortgage', error);
            })
    }
}
