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
    currencyButton: '.nav-link',
    inputCapitalization: '.js-input-deposit-capitalization',
}

const CLASSES_DEPOSIT = {
    hide: 'd-none',
    active: 'active',
}

const MIN_DEPOSIT_VALUE = 50;

const CURRENCIES = {
    "Рубли": "₽",
    "Доллары": "$",
    "Юань": "¥",
    "Евро": "€",
}

const URL = '/local/php_interface/ajax/calc.php';

function getRates({table = null, id = null, name = null}) {
    const params = new URLSearchParams();
    if (table) params.append('table', table);
    if (id) params.append('id', id);
    if (name) params.append('name', name);

    return fetch(URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: params
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Ошибка:', data.error);
            } else if (data.data) {
                return data.data;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        })
}

function handlerClickTabCurrency(event, STATE) {
    const target = event.target;
    if (target.classList.contains(CLASSES_DEPOSIT.active)) return false;
    const buttons = STATE.elements.currencyList.querySelectorAll(ELEMS_DEPOSIT.currencyButton);
    buttons.forEach(button => {
        button.classList.remove(CLASSES_DEPOSIT.active)
    })
    target.classList.add(CLASSES_DEPOSIT.active);
    STATE.currency = target.dataset.name;
    getDepositValues(STATE);
    setDepositValues(STATE, true);
}
function createCurrencyTab(currency, STATE) {
    let activeClass = "";
    if (currency === STATE.currency) {
        activeClass = CLASSES_DEPOSIT.active;
    }
    const tab = document.createElement('li');
    tab.classList.add("nav-item", "flex-grow-1");
    tab.innerHTML = `
        <button type="button" data-name="${currency}" class="nav-link text-center currency ${activeClass}">${CURRENCIES[currency]}</button>
    `;
    return tab;
}
function createCurrencyList(STATE) {
    const tabs = STATE.elements.currencyList.querySelectorAll(ELEMS_DEPOSIT.currencyButton);
    if (tabs.length) return false;

    const uniqueCurrencies = [];
    STATE.calculatorData.forEach(item => {
        if (!uniqueCurrencies.includes(item.currency)) {
            uniqueCurrencies.push(item.currency);
        }
    });
    uniqueCurrencies.forEach(currency => {
        const tab = createCurrencyTab(currency, STATE);
        STATE.elements.currencyList.append(tab);
        tab.addEventListener('click', (event) => {
            handlerClickTabCurrency(event, STATE);
        })
    });
}

function showDepositResult(STATE) {
    STATE.elements.displayPeriod.innerHTML = getFormatedTextByType({value: STATE.period, type: 'day'});
    STATE.elements.displayRate.innerHTML = `${formatNumber(STATE.rate)} %`;
    STATE.elements.displayIncome.innerHTML = `${formatNumberWithSpaces(STATE.income.toFixed(0))} <span class="currency">${CURRENCIES[STATE.currency]}</span>`;
}

function handlerInputDeposit(STATE) {
    STATE.rate = findDepositRate({data: STATE.filteredData, amount: STATE.amount, period: STATE.period});
    STATE.income = calculateDepositIncome(STATE);
    showDepositResult(STATE)
}

function parseDate(dateString) {
    // Разделяем строку на день, месяц и год
    const parts = dateString.split('.');
    const day = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10) - 1; // Месяцы в JavaScript начинаются с 0
    const year = parseInt(parts[2], 10);

    // Создаем объект Date
    return new Date(year, month, day);
}

function calculateDepositIncome({amount, period, rate, capitalization, filteredData, additionalDeposits, hideAdditional = false}) {
    let totalAmount = amount; // Общая сумма вклада, начиная с первоначальной
    let totalIncome = 0; // Переменная для хранения общего дохода
    const dailyInitialRate = (rate / 100) / 365;

    if (capitalization) {
        // рассчеты с капитализацией
        const n = 12; // Количество периодов капитализации в год (ежемесячно)
        const t = period / 365; // Количество лет

        // Расчет итоговой суммы с учетом капитализации
        const A = amount * Math.pow(1 + (rate / 100) / n, n * t);

        // Расчет дохода
        totalIncome += A - amount;
    } else {
        totalIncome += amount * dailyInitialRate * period;
    }
    if (!hideAdditional) {
        // Обработка каждого пополнения
        additionalDeposits.forEach(deposit => {
            const { amountItem, date } = deposit;
            const depositDate = parseDate(date);
            const endDate = new Date();
            endDate.setDate(endDate.getDate() + period);

            // Обновляем общую сумму
            totalAmount += Number(amountItem);

            // Получаем новую процентную ставку в зависимости от общей суммы
            let newRate = findDepositRate({data: filteredData, amount: totalAmount, period});
            // Если новая процентная ставка не определена, используем текущую
            if (!newRate) {newRate = rate}
            const dailyNewRate = (newRate / 100) / 365;

            // Количество дней, на которые вкладывается пополнение
            const daysOnDeposit = Math.max(0, (endDate - depositDate) / (1000 * 60 * 60 * 24));

            // Расчет дохода от пополнения
            if (capitalization) {
                const n = 12; // Количество периодов капитализации в год (ежемесячно)
                const t = daysOnDeposit / 365; // Количество лет

                // Расчет итоговой суммы с учетом капитализации
                const A = Number(amountItem) * Math.pow(1 + (newRate / 100) / n, n * t);

                // Расчет дохода
                totalIncome += A - Number(amountItem);

            } else {
                totalIncome += Number(amountItem) * dailyNewRate * daysOnDeposit;
            }
        });
    }

    return totalIncome;
}
function findDepositRate({data, amount, period}) {
    const findAmount = data.filter(item => item.sumFrom <= amount && item.sumTo >= amount);
    const findPeriod = findAmount.find(item => item.periodFrom <= period && item.periodTo >= period);
    return findPeriod?.rate;
}

function isShowCurrency(data) {
    return data.some(item => item.currency !== "Рубли")
}

const toggleVisibility = (target, checked) => {
    checked ? target.classList.remove(CLASSES_DEPOSIT.hide) : target.classList.add(CLASSES_DEPOSIT.hide)
}

function handlerInputReplenishmentSum(input, STATE) {
    const wrapper = input.closest(ELEMS_DEPOSIT.replenishmentItem);
    const inputDate = wrapper.querySelector(DATEPICKER_CLASSES.root);
    let id = wrapper.dataset.id;

    if (!id) {
        throw new Error(`Не найден data-id у: ${wrapper}`);
    }

    const newItem = {
        id,
        amountItem: input.value,
        date: inputDate.value
    }
    // Находим индекс объекта с нужным id
    const index = STATE.additionalDeposits.findIndex(item => item.id === id);

    if (!input.value || !inputDate.value) {
        if (index !== -1) {
            STATE.additionalDeposits.splice(index, 1);
        } else {
            return false;
        }
    }

    if (index !== -1) {
        STATE.additionalDeposits[index] = newItem;
    } else {
        STATE.additionalDeposits.push(newItem)
    }

    STATE.income = calculateDepositIncome(STATE);

    // выводим результаты
    showDepositResult(STATE);
}

function setReplenishmentAttr(templateClone, replenishmentCounter) {

    const itemReplenishment = templateClone.querySelector(ELEMS_DEPOSIT.replenishmentItem);
    const inputDate = templateClone.querySelector('input[name="date"]');
    const inputSum = templateClone.querySelector('input[name="sum"]');
    const labelDate = templateClone.querySelector('label[for="date"]');
    const labelSum = templateClone.querySelector('label[for="sum"]');

    itemReplenishment.dataset.id = replenishmentCounter;
    inputDate.setAttribute('id', `date-${replenishmentCounter}`);
    inputDate.setAttribute('name', `date-${replenishmentCounter}`);
    labelDate.setAttribute('for', `date-${replenishmentCounter}`);
    inputSum.setAttribute('id', `sum-${replenishmentCounter}`);
    inputSum.setAttribute('name', `sum-${replenishmentCounter}`);
    labelSum.setAttribute('for', `sum-${replenishmentCounter}`);
}

function removeReplenishment(id, STATE) {
    // Находим индекс объекта с нужным id
    const index = STATE.additionalDeposits.findIndex(item => item.id === id);

    if (index !== -1) {
        STATE.additionalDeposits.splice(index, 1);
    } else {
        return false;
    }
    STATE.income = calculateDepositIncome(STATE);

    // выводим результаты
    showDepositResult(STATE);
}

function addReplenishment({buttonAddReplenishment, replenishmentBlock}, STATE) {
    const template = replenishmentBlock.querySelector(ELEMS_DEPOSIT.replenishmentTemplate);

    if (!template) {
        throw new Error(`Не найден template: ${ELEMS_DEPOSIT.replenishmentTemplate}`);
    }

    const templateClone = replenishmentBlock.querySelector(ELEMS_DEPOSIT.replenishmentTemplate).content.cloneNode(true);
    const buttonRemoveReplenishment = templateClone.querySelector(ELEMS_DEPOSIT.buttonRemoveReplenishment);
    const inputDate = templateClone.querySelector(DATEPICKER_CLASSES.root);
    const inputSum = templateClone.querySelector('input[name="sum"]');
    setReplenishmentAttr(templateClone, STATE.replenishmentCounter);
    STATE.replenishmentCounter++;

    buttonAddReplenishment.before(templateClone);
    buttonRemoveReplenishment.addEventListener('click', () => {
        const wrapper = buttonRemoveReplenishment.closest(ELEMS_DEPOSIT.replenishmentItem);
        let id = wrapper.dataset.id;

        if (!id) {
            throw new Error(`Не найден data-id у: ${wrapper}`);
        }
        wrapper.remove();
        removeReplenishment(id, STATE);
    });
    initDatepicker([inputDate]);
    inputSum.addEventListener('input', () => {
        handlerInputReplenishmentSum(inputSum, STATE);
    });
    inputDate.addEventListener('hide', () => {
        handlerInputReplenishmentSum(inputSum, STATE);
    });
}

const initReplenishment = (root, STATE) => {
    const replenishmentTrigger = root.querySelector(ELEMS_DEPOSIT.replenishment);
    const buttonAddReplenishment = root.querySelector(ELEMS_DEPOSIT.buttonAddReplenishment);
    STATE.replenishmentCounter = 1;
    STATE.additionalDeposits = [];
    if (!replenishmentTrigger || !buttonAddReplenishment) return;

    const replenishmentBlock = root.querySelector(`#${replenishmentTrigger.dataset.target}`);

    if (!replenishmentBlock) {
        throw new Error(`Не найден блок с пополнением: #${replenishmentTrigger.dataset.target}`);
    }

    const inputReplenishmentSum = replenishmentBlock.querySelector('input[name="sum"]');
    const inputReplenishmentDate = replenishmentBlock.querySelector(DATEPICKER_CLASSES.root);

    toggleVisibility(replenishmentBlock, replenishmentTrigger.checked)

    replenishmentTrigger.addEventListener('click', (event) => {
        toggleVisibility(replenishmentBlock, event.target.checked)
        STATE.hideAdditional = !event.target.checked

        STATE.income = calculateDepositIncome(STATE);

        // выводим результаты
        showDepositResult(STATE);
    })

    buttonAddReplenishment.addEventListener('click', () =>{
        addReplenishment({buttonAddReplenishment, replenishmentBlock}, STATE)
    })

    inputReplenishmentSum.addEventListener('input', () => {
        handlerInputReplenishmentSum(inputReplenishmentSum, STATE);
    });

    inputReplenishmentDate.addEventListener('hide', () => {
        handlerInputReplenishmentSum(inputReplenishmentSum, STATE);
    });
}

const initElementsDepositCalculator = (root) => {
    const displayPeriod = root.querySelector(ELEMS_DEPOSIT.period);
    const displayRate = root.querySelector(ELEMS_DEPOSIT.rate);
    const displayIncome = root.querySelector(ELEMS_DEPOSIT.income);
    const inputAmount = root.querySelector(ELEMS_DEPOSIT.inputAmount);
    const inputPeriod = root.querySelector(ELEMS_DEPOSIT.inputPeriod);
    const inputPeriodWrapper = inputPeriod.closest(ELEMS_DEPOSIT.inputSlider);
    const inputAmountWrapper = inputAmount.closest(ELEMS_DEPOSIT.inputSlider);
    const currencyList = root.querySelector(ELEMS_DEPOSIT.currencyList);
    const inputCapitalization = root.querySelector(ELEMS_DEPOSIT.inputCapitalization);

    return {
        root,
        displayPeriod,
        displayRate,
        displayIncome,
        inputAmount,
        inputPeriod,
        inputPeriodWrapper,
        inputAmountWrapper,
        currencyList,
        inputCapitalization,
    }
}

function initStateDepositCalculator(calculator) {
    console.log('calculator', calculator.dataset)
    return getRates(calculator.dataset)
        .then(calculatorData => {

            // обработка поля sumFrom, когда значение не задано
            calculatorData.forEach((elem) => {
                if (elem.sumFrom === "не ограничен") {
                    elem.sumFrom = MIN_DEPOSIT_VALUE;
                }
            })

            const elements = initElementsDepositCalculator(calculator);

            return {
                elements,
                calculatorData
            }
        })
        .catch(error => {
            console.error('error initStateDepositCalculator', error);
        });
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

const getDepositValues = (STATE) => {
    STATE.showCurrency = isShowCurrency(STATE.calculatorData);

    if (!STATE.currency) {
        STATE.currency = "Рубли";
    }
    // делаем выборку по валюте
    STATE.filteredData = STATE.calculatorData.filter(item => item.currency === STATE.currency);
    if (STATE.filteredData.length === 0) {
        console.error(`Не удалось найти данные по типу валюты ${STATE.currency}`);
        STATE.filteredData = STATE.calculatorData[0];
    }

    STATE.minPeriod = findMinValue('periodFrom', STATE.filteredData);
    STATE.maxPeriod = findMaxValue('periodTo', STATE.filteredData);
    STATE.minAmount = findMinValue('sumFrom', STATE.filteredData);
    STATE.maxAmount = findMaxValue('sumTo', STATE.filteredData);
    STATE.capitalization = STATE.elements.inputCapitalization.checked;

    if (STATE.minPeriod !== STATE.maxPeriod) {
        STATE.steps = getStepsPeriod(STATE.filteredData);
    }

    setStartValues(STATE);
}

const setDepositValues = (STATE, currencyTrigger) => {
    if (STATE.steps) {
        STATE.elements.inputPeriodWrapper.setAttribute('data-steps', STATE.steps);
        initInputSlider([STATE.elements.inputPeriodWrapper]);
    } else { // если период вклада не меняется
        STATE.elements.inputPeriodWrapper.remove();
    }

    if (currencyTrigger) {
        const cloneInputAmount = STATE.elements.inputAmountWrapper.cloneNode(true);
        // Добавляем клонированный элемент перед оригинальным
        STATE.elements.inputAmountWrapper.insertAdjacentElement('beforebegin', cloneInputAmount);
        STATE.elements.inputAmountWrapper.remove();
        const steps = cloneInputAmount.querySelector(JS_CLASSES.textSteps);
        steps.innerHTML = '';
        STATE.elements.inputAmountWrapper = cloneInputAmount;
    }
    STATE.elements.inputAmountWrapper.setAttribute('data-min-value', STATE.minAmount);
    STATE.elements.inputAmountWrapper.setAttribute('data-max-value', STATE.maxAmount);
    STATE.elements.inputAmountWrapper.setAttribute('data-start-value', STATE.amount);
    // показываем или нет валюту
    if (!STATE.showCurrency) {
        STATE.elements.currencyList.remove();
    } else {
        createCurrencyList(STATE);
    }
    initInputSlider([STATE.elements.inputAmountWrapper]);

    // поиск процентной ставки
    STATE.rate = findDepositRate({data: STATE.filteredData, amount: STATE.amount, period: STATE.period});

    // расчеты дохода
    STATE.income = calculateDepositIncome(STATE);

    // выводим результаты
    showDepositResult(STATE);

    STATE.elements.inputPeriodWrapper.addEventListener('input', (event) => {
        STATE.period = getPeriodValue(STATE.elements.inputPeriod);
        handlerInputDeposit(STATE);
    })

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        STATE.amount = event.detail.value;
        handlerInputDeposit(STATE);
    })

    STATE.elements.inputCapitalization.addEventListener('change', (event) => {
        STATE.capitalization = event.target.checked;
        handlerInputDeposit(STATE);
    })
}

function initCalculatorDeposit() {
    const calculatorsDeposit = document.querySelectorAll(ELEMS_DEPOSIT.root);

    for (const calculator of calculatorsDeposit) {
        initStateDepositCalculator(calculator)
            .then(STATE => {
                getDepositValues(STATE);
                initReplenishment(calculator, STATE);
                setDepositValues(STATE);
            })
            .catch(error => {
                console.error('Ошибка в initCalculatorDeposit функции:', error);
            });
    }
}
