const dataTemp = {
    "data": [
        {
            "currency": "Рубли",
            "rate": "18.5",
            "effectiveRate": null,
            "periodFrom": "1100",
            "periodTo": "1100",
            "sumFrom": "30000000",
            "sumTo": "100000000",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "18.2",
            "effectiveRate": null,
            "periodFrom": "550",
            "periodTo": "550",
            "sumFrom": "30000000",
            "sumTo": "100000000",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "17.2",
            "effectiveRate": null,
            "periodFrom": "250",
            "periodTo": "250",
            "sumFrom": "10000",
            "sumTo": "1499999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "18",
            "effectiveRate": null,
            "periodFrom": "550",
            "periodTo": "550",
            "sumFrom": "10000",
            "sumTo": "1499999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "18",
            "effectiveRate": null,
            "periodFrom": "1100",
            "periodTo": "1100",
            "sumFrom": "10000",
            "sumTo": "1499999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "17.4",
            "effectiveRate": null,
            "periodFrom": "250",
            "periodTo": "250",
            "sumFrom": "1500000",
            "sumTo": "4999999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "18",
            "effectiveRate": null,
            "periodFrom": "550",
            "periodTo": "550",
            "sumFrom": "1500000",
            "sumTo": "4999999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "18.2",
            "effectiveRate": null,
            "periodFrom": "1100",
            "periodTo": "1100",
            "sumFrom": "1500000",
            "sumTo": "4999999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "17.5",
            "effectiveRate": null,
            "periodFrom": "250",
            "periodTo": "250",
            "sumFrom": "5000000",
            "sumTo": "29999999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "18.1",
            "effectiveRate": null,
            "periodFrom": "550",
            "periodTo": "550",
            "sumFrom": "5000000",
            "sumTo": "29999999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "18.3",
            "effectiveRate": null,
            "periodFrom": "1100",
            "periodTo": "1100",
            "sumFrom": "5000000",
            "sumTo": "29999999",
            "minimumBalance": null
        },
        {
            "currency": "Рубли",
            "rate": "17.6",
            "effectiveRate": null,
            "periodFrom": "250",
            "periodTo": "250",
            "sumFrom": "30000000",
            "sumTo": "100000000",
            "minimumBalance": null
        }
    ]
}

const ELEMS_DEPOSIT = {
    root: '.js-calculator-deposit',
    replenishment: '.js-replenishment',
    period: '.js-calculator-display-period',
    rate: '.js-calculator-display-rate',
    income: '.js-calculator-display-income',
    inputAmount: '.js-input-amount',
    inputPeriod: '.js-input-period',
    inputSlider: '.input-slider',
    buttonAddReplenishment: '.js-add-replenishment',
    buttonRemoveReplenishment: '.js-remove-replenishment',
    replenishmentItem: '.js-replenishment-item',
    replenishmentTemplate: '#replenishment-template',
    currencyList: '.js-tabs-currency',
}

const ClASSES = {
    hide: 'd-none',
}

const URL = '/local/php_interface/ajax/calc.php';

async function getRates(table = null, elementId = null, name = null) {
    const params = new URLSearchParams();
    if (table !== null) params.append('table', table);
    if (elementId !== null) params.append('elementId', elementId);
    if (name !== null) params.append('name', name);
    return dataTemp.data;
    // TODO: заменить перед пушем
    // fetch(URL, {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/x-www-form-urlencoded'
    //     },
    //     body: params
    // })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.error) {
    //             console.error('Ошибка:', data.error);
    //         } else if (data.data) {
    //             console.log(data.data);
    //             return data.data;
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //     })
}

function isShowCurrency(data) {
    return data.some(item => item.currency !== "Рубли")
}

const toggleVisibility = (target, checked) => {
    checked ? target.classList.remove(ClASSES.hide) : target.classList.add(ClASSES.hide)
}

function setReplenishmentAttr(templateClone, replenishmentCounter) {

    const inputDate = templateClone.querySelector('input[name="date"]');
    const inputSum = templateClone.querySelector('input[name="sum"]');
    const labelDate = templateClone.querySelector('label[for="date"]');
    const labelSum = templateClone.querySelector('label[for="sum"]');

    inputDate.setAttribute('id', `date-${replenishmentCounter}`);
    inputDate.setAttribute('name', `date-${replenishmentCounter}`);
    labelDate.setAttribute('for', `date-${replenishmentCounter}`);
    inputSum.setAttribute('id', `sum-${replenishmentCounter}`);
    inputSum.setAttribute('name', `sum-${replenishmentCounter}`);
    labelSum.setAttribute('for', `sum-${replenishmentCounter}`);
}

function removeReplenishment(event) {
    const buttonRemoveReplenishment = event.target;
    const wrapper = buttonRemoveReplenishment.closest(ELEMS_DEPOSIT.replenishmentItem);
    wrapper.remove();
}

// пополнение
const initReplenishment = () => {
    const replenishmentTrigger = document.querySelector(ELEMS_DEPOSIT.replenishment);
    const buttonAddReplenishment = document.querySelectorAll(ELEMS_DEPOSIT.buttonAddReplenishment);
    let replenishmentCounter = 1;
    if (!replenishmentTrigger) return;

    const replenishmentBlock = document.querySelector(`#${replenishmentTrigger.dataset.target}`);

    if (!replenishmentBlock) {
        throw new Error(`Не найден блок с пополнением: #${replenishmentTrigger.dataset.target}`);
    }

    toggleVisibility(replenishmentBlock, replenishmentTrigger.checked)

    replenishmentTrigger.addEventListener('click', (event) => {
        toggleVisibility(replenishmentBlock, event.target.checked)
    })


    buttonAddReplenishment.forEach(button => {
        button.addEventListener('click', () => {
            const template = replenishmentBlock.querySelector(ELEMS_DEPOSIT.replenishmentTemplate);

            if (!template) {
                throw new Error(`Не найден template: ${ELEMS_DEPOSIT.replenishmentTemplate}`);
            }

            const templateClone = replenishmentBlock.querySelector(ELEMS_DEPOSIT.replenishmentTemplate).content.cloneNode(true);
            setReplenishmentAttr(templateClone, replenishmentCounter);
            const buttonRemoveReplenishment = templateClone.querySelector(ELEMS_DEPOSIT.buttonRemoveReplenishment);
            replenishmentCounter++;

            button.before(templateClone);
            buttonRemoveReplenishment.addEventListener('click', removeReplenishment);
        })
    })

}

const initElementsCalculator = (root) => {
    const displayPeriod = root.querySelector(ELEMS_DEPOSIT.period);
    const displayRate = root.querySelector(ELEMS_DEPOSIT.rate);
    const displayIncome = root.querySelector(ELEMS_DEPOSIT.income);
    const inputAmount = root.querySelector(ELEMS_DEPOSIT.inputAmount);
    const inputPeriod = root.querySelector(ELEMS_DEPOSIT.inputPeriod);
    const inputPeriodWrapper = inputPeriod.closest(ELEMS_DEPOSIT.inputSlider);
    const inputAmountWrapper = inputAmount.closest(ELEMS_DEPOSIT.inputSlider);
    const currencyList = root.querySelector(ELEMS_DEPOSIT.currencyList);

    return {
        root,
        displayPeriod,
        displayRate,
        displayIncome,
        inputAmount,
        inputPeriod,
        inputPeriodWrapper,
        inputAmountWrapper,
        currencyList
    }
}

async function initStateCalculator(calculator) {
    const {table, id, name } = calculator.dataset;

    const calculatorData = await getRates(table, id, name);

    if (!calculatorData) { return false }

    const elements = initElementsCalculator(calculator);

    return {
        elements,
        calculatorData
    }
}

const getPeriodValue = (input) => {
    const inputSlider = input.closest(ELEMS_DEPOSIT.inputSlider);
    const steps = generateStepsFromAttrs(inputSlider.getAttribute('data-steps') ?? '');
    if (steps.length > 0) {
        return steps[Number(input.value)];
    }
    return Number(input.value);
}

const findMinValue = (key, data) => {
    return Math.min(...data.map(obj => obj[key]));
}

const findMaxValue = (key, data) => {
    return Math.max(...data.map(obj => obj[key]));
}

const getStepsPeriod = (data) => {
    const allValues = [];
    data.forEach(obj => {
        allValues.push(obj.periodFrom);
        allValues.push(obj.periodTo);
    });
    const uniqueValues = [...new Set(allValues)];
    const sortedValues = uniqueValues.sort((a, b) => a - b);
    return sortedValues.join(', ');
}

const getStartValues = (STATE) => {
    STATE.minPeriod = findMinValue('periodFrom', STATE.calculatorData);
    STATE.maxPeriod = findMaxValue('periodTo', STATE.calculatorData);
    STATE.minAmount = findMinValue('sumFrom', STATE.calculatorData);
    STATE.maxAmount = findMaxValue('sumTo', STATE.calculatorData);
    STATE.steps = getStepsPeriod(STATE.calculatorData);
    STATE.amount = Number(STATE.minAmount);
    STATE.showCurrency = isShowCurrency(STATE.calculatorData)
}

const setStartValues = (STATE) => {
    STATE.elements.inputPeriodWrapper.setAttribute('data-steps', STATE.steps);
    STATE.elements.inputPeriodWrapper.setAttribute('data-start-value', STATE.maxPeriod);
    STATE.elements.inputAmountWrapper.setAttribute('data-min-value', STATE.minAmount);
    STATE.elements.inputAmountWrapper.setAttribute('data-max-value', STATE.maxAmount);
    STATE.elements.inputAmountWrapper.setAttribute('data-start-value', STATE.amount);
    initInputSlider([STATE.elements.inputPeriodWrapper, STATE.elements.inputAmountWrapper]);
    // показываем или нет валюту
    if (!STATE.showCurrency) {
        STATE.elements.currencyList.remove();
    }

    STATE.period = getPeriodValue(STATE.elements.inputPeriod);
    STATE.elements.displayPeriod.innerHTML = getFormatedTextByType(STATE.period, 'day');

    // TODO: поиск процентной ставки и рассчеты
    console.log('amount', STATE.amount);
}

async function initCalculatorDeposit() {
    const calculatorsDeposit = document.querySelectorAll(ELEMS_DEPOSIT.root);

    for (const calculator of calculatorsDeposit) {
        const STATE = await initStateCalculator(calculator);

        if (!STATE) {
            return false;
        }

        getStartValues(STATE);
        setStartValues(STATE);
        // initReplenishment(calculator);

        // STATE.elements.inputAmount.addEventListener('input', (event) => {
        //   setValue(STATE);
        // })
        // STATE.elements.inputPeriod.addEventListener('input', (event) => {
        //   setValue(STATE);
        // })
    }
}
