const ELEMS_MORTGAGE = {
    root: '.js-calculator-mortgage',
    inputProperty: '.js-input-property',
    initialPayment: '.js-input-initial-payment',
    selectRegion: '.js-mort-region',
    selectProgram: '.js-mort-program',
    selectObject: '.js-mort-object',
    inputMortgageCard: '.js-mort-card',
    inputMortgageInsurance: '.js-mort-insurance',
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

function setAttributesInputMortgage(STATE) {

    STATE.elements.inputPeriodWrapper.setAttribute('data-min-value', STATE.filteredData[0].periodFrom);
    STATE.elements.inputPeriodWrapper.setAttribute('data-max-value', STATE.filteredData[0].periodTo);
    STATE.elements.inputPeriodWrapper.setAttribute('data-start-value', STATE.filteredData[0].periodFrom);

    const minPropertyValue = (STATE.filteredData[0].sumFrom / ((100 - STATE.filteredData[0].sumFromPercent) / 100)).toFixed(0);
    const initialPaymentValue = (minPropertyValue - STATE.filteredData[0].sumFrom).toFixed(0);

    STATE.elements.inputInitialPaymentWrapper.setAttribute('data-min-value', initialPaymentValue);
    STATE.elements.inputInitialPaymentWrapper.setAttribute('data-max-value', initialPaymentValue);

    STATE.elements.inputPropertyWrapper.setAttribute('data-min-value', minPropertyValue);
    STATE.elements.inputPropertyWrapper.setAttribute('data-start-value', minPropertyValue);
    STATE.elements.inputPropertyWrapper.setAttribute('data-max-value', STATE.filteredData[0].maxPropertyValue);

    const maxAmountMortgage = minPropertyValue - initialPaymentValue;
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
    setSelectOptions('selectObject', STATE.objects, STATE);
    STATE.object = STATE.elements.selectObject.value;

    return dataArray.filter(item =>
        item.object && item.object === STATE.object
    );
}

function setMortgageValues(STATE) {
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

    setAttributesInputMortgage(STATE);

    STATE.insurance = STATE.elements.inputMortgageInsurance.checked ? 'Y' : 'N';
    STATE.card = STATE.elements.inputMortgageCard.checked ? 'Y' : 'N';

    STATE.filteredData = STATE.filteredData.filter(item => {
        if (!item.insurance) item.insurance = 'N';
        if (!item.salaryBankCard) item.salaryBankCard = 'N';
        return (item.insurance === STATE.insurance) && (item.salaryBankCard === STATE.card)
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
    const displayRate = root.querySelector(ELEMS_DEPOSIT.rate);
    const displayPayment = root.querySelector(ELEMS_LOAN.payment);
    const displayFullCost = root.querySelector(ELEMS_LOAN.fullCost);
    const displayIncome = root.querySelector(ELEMS_DEPOSIT.income);
    const inputAmount = root.querySelector(ELEMS_DEPOSIT.inputAmount);
    const inputPeriod = root.querySelector(ELEMS_DEPOSIT.inputPeriod);
    const inputPropertyValue = root.querySelector(ELEMS_MORTGAGE.inputProperty);
    const inputInitialPayment = root.querySelector(ELEMS_MORTGAGE.initialPayment);
    const inputPeriodWrapper = inputPeriod.closest(ELEMS_DEPOSIT.inputSlider);
    const inputAmountWrapper = inputAmount.closest(ELEMS_DEPOSIT.inputSlider);
    const inputPropertyWrapper = inputPropertyValue.closest(ELEMS_DEPOSIT.inputSlider);
    const inputInitialPaymentWrapper = inputInitialPayment.closest(ELEMS_DEPOSIT.inputSlider);
    const selectRegion = root.querySelector(ELEMS_MORTGAGE.selectRegion);
    const selectProgram = root.querySelector(ELEMS_MORTGAGE.selectProgram);
    const selectObject = root.querySelector(ELEMS_MORTGAGE.selectObject);
    const inputMortgageCard = root.querySelector(ELEMS_MORTGAGE.inputMortgageCard);
    const inputMortgageInsurance = root.querySelector(ELEMS_MORTGAGE.inputMortgageInsurance);

    return {
        root,
        displayRate,
        displayPayment,
        displayFullCost,
        displayIncome,
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
