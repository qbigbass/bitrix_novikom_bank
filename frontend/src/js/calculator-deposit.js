const ELEMS_DEPOSIT = {
    root: '.js-calculator-deposit',
    replenishment: '.js-replenishment',
    period: '.js-calculator-display-period',
    rate: '.js-calculator-display-rate',
    income: '.js-calculator-display-income',
    percent: '.js-calculator-display-percent',
    resultRow: '.js-calculator-display-row',
    inputAmount: '.js-input-amount',
    inputPeriod: '.js-input-period',
    inputSlider: '.input-slider',
    buttonAddReplenishment: '.js-add-replenishment',
    buttonRemoveReplenishment: '.js-remove-replenishment',
    replenishmentItem: '.js-replenishment-item',
    replenishmentTemplate: '#replenishment-template',
    currencyList: '.js-tabs-currency',
    currencyButton: '.nav-link',
    currencyButtonWrapper: '.nav-item',
    inputCapitalization: '.js-input-deposit-capitalization',
    selectName: '.js-select-deposit-name',
    name: '.js-program-name',
    polygonContainer: '.js-polygon-container',
    resultBlock: '.card-calculate-result'
}

const CLASSES_DEPOSIT = {
    hide: 'd-none',
    active: 'active',
    currency: '.currency',
    smallDifference: 'small-difference',
}

const MIN_DEPOSIT_VALUE = 50;

const CURRENCIES = {
    "Рубли": "₽",
    "Доллары": "$",
    "Юань": "¥",
    "Евро": "€",
}

function setCurrencyToReplenishment(STATE) {
    const replenishmentBlocks = STATE.elements.root.querySelectorAll(ELEMS_DEPOSIT.replenishmentItem);
    replenishmentBlocks.forEach(block => {
        block.querySelectorAll(CLASSES_DEPOSIT.currency).forEach(elem => {
            elem.textContent = CURRENCIES[STATE.currency];
        })
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
    setCurrencyToReplenishment(STATE);
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
    const tabs = STATE.elements.currencyList.querySelectorAll(ELEMS_DEPOSIT.currencyButtonWrapper);
    tabs.forEach((tab) => tab.remove());
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
    STATE.elements.displayName.textContent = STATE.filteredData[0].name;
    STATE.elements.displayPeriod.innerHTML = getFormatedTextByType({value: STATE.period, type: 'day'});
    STATE.elements.displayRate.innerHTML = `${formatNumber(STATE.rate)} %`;
    STATE.elements.displayIncome.innerHTML = `${formatNumberWithSpaces(STATE.income.toFixed(0))} <span class="currency">${CURRENCIES[STATE.currency]}</span>`;
    const percentRowWrapper = STATE.elements.displayPercent.closest(ELEMS_DEPOSIT.resultRow);
    if (STATE.filteredData[0].interestPayment) {
        percentRowWrapper.classList.remove('d-none');
        STATE.elements.displayPercent.textContent = STATE.filteredData[0].interestPayment;
    } else {
        percentRowWrapper.classList.add('d-none');
        STATE.elements.displayPercent.textContent = '';
    }
}

function handlerInputDeposit(STATE) {
    STATE.rate = findDepositRate({data: STATE.filteredData, amount: STATE.amount, period: STATE.period});
    STATE.income = calculateDepositIncome(STATE);
    showDepositResult(STATE);
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
function setStartValues(STATE) {
    STATE.amount = STATE.minAmount;
    STATE.period = STATE.minPeriod;
}

function calculateDepositIncome(STATE) {
    let { amount, period, rate, capitalization, filteredData, additionalDeposits, hideAdditional = false } = STATE;
    let totalAmount = amount; // Общая сумма вклада, начиная с первоначальной
    let totalIncome = 0; // Переменная для хранения общего дохода

    // TODO: убраить после тестирования
    const hash = window.location.hash;
    const startDateString = hash.replace('#startDate=', ''); // Удаляем символ #
    let startDate;

    if (startDateString) {
        startDate = parseDate(startDateString);
    } else {
        startDate = new Date(); // Если дата не указана в URL, используем текущую дату
    }

    // const startDate = new Date(); // Начальная дата
    const endDate = startDate;
    endDate.setDate(endDate.getDate() + period);

    // Начисление процентов начинается со следующего дня после зачисления вклада
    const dailyInitialRate = (rate / 100) / calculateDaysInYear(startDate.getFullYear());

    if (capitalization) {
        // Рассчеты с капитализацией
        const n = 12; // Количество периодов капитализации в год (ежемесячно)
        const t = period / calculateDaysInYear(startDate.getFullYear()); // Количество лет

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
            // Количество дней, на которые вкладывается пополнение (начиная со следующего дня)
            const daysOnDeposit = Math.max(0, Math.floor((endDate - depositDate) / (1000 * 60 * 60 * 24))) - 1;

            // Обновляем общую сумму
            totalAmount += Number(amountItem);

            // Получаем новую процентную ставку в зависимости от общей суммы
            let newRate = findDepositRate({ data: filteredData, amount: totalAmount, period });
            // Если новая процентная ставка не определена, используем текущую
            if (!newRate) { newRate = rate; }

            STATE.rate = newRate;
            const dailyNewRate = (newRate / 100) / calculateDaysInYear(depositDate.getFullYear());

            // Расчет дохода от пополнения
            if (capitalization) {
                const n = 12; // Количество периодов капитализации в год (ежемесячно)
                const t = daysOnDeposit / calculateDaysInYear(depositDate.getFullYear()); // Количество лет

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
        amountItem: Number(input.value.replace(/\s+/g, '')), // Удаляем все пробелы,
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
    templateClone.querySelector(CLASSES_DEPOSIT.currency).textContent = CURRENCIES[STATE.currency];
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
        inputSum.value = formatNumberWithSpaces(validateNumberInput(inputSum));
        handlerInputReplenishmentSum(inputSum, STATE);
    });

    inputDate.addEventListener('select', () => {
        handlerInputReplenishmentSum(inputSum, STATE);
    })

}

function validateNumberInput(input) {
    // Удаляем все символы, кроме цифр
    input.value = input.value.replace(/[^0-9]/g, '');

    // Проверяем, чтобы строка не начиналась с 0 и содержала хотя бы одну цифру
    if (input.value.length === 1) {
        input.value = input.value.replace(/[^1-9]/g, '');
    }

    return input.value;

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
        inputReplenishmentSum.value = formatNumberWithSpaces(validateNumberInput(inputReplenishmentSum));
        handlerInputReplenishmentSum(inputReplenishmentSum, STATE);
    });

    inputReplenishmentDate.addEventListener('select', (event) => {
        handlerInputReplenishmentSum(inputReplenishmentSum, STATE);
    });
}

function collectOptionsName(dataArray) {
    return dataArray
        .map(item => item.name) // Извлекаем значения name
        .filter(region => region !== null) // Удаляем null значения
        .filter((value, index, self) => self.indexOf(value) === index) // Удаляем дубликаты
}

const initElementsDepositCalculator = (root) => {
    const displayPeriod = root.querySelector(ELEMS_DEPOSIT.period);
    const displayRate = root.querySelector(ELEMS_DEPOSIT.rate);
    const displayIncome = root.querySelector(ELEMS_DEPOSIT.income);
    const displayName = root.querySelector(ELEMS_DEPOSIT.name);
    const displayPercent = root.querySelector(ELEMS_DEPOSIT.percent);
    const inputAmount = root.querySelector(ELEMS_DEPOSIT.inputAmount);
    const inputPeriod = root.querySelector(ELEMS_DEPOSIT.inputPeriod);
    const inputPeriodWrapper = inputPeriod.closest(ELEMS_DEPOSIT.inputSlider);
    const inputAmountWrapper = inputAmount.closest(ELEMS_DEPOSIT.inputSlider);
    const currencyList = root.querySelector(ELEMS_DEPOSIT.currencyList);
    const inputCapitalization = root.querySelector(ELEMS_DEPOSIT.inputCapitalization);
    const selectName = root.querySelector(ELEMS_DEPOSIT.selectName);

    return {
        root,
        displayPeriod,
        displayRate,
        displayIncome,
        displayName,
        displayPercent,
        inputAmount,
        inputPeriod,
        inputPeriodWrapper,
        inputAmountWrapper,
        currencyList,
        inputCapitalization,
        selectName
    }
}

function initStateDepositCalculator(calculator) {
    return getRates(calculator.dataset)
        .then(depositData => {

            // обработка поля sumFrom, когда значение не задано
            depositData.forEach((elem) => {
                if (elem.sumFrom === "не ограничен") {
                    elem.sumFrom = MIN_DEPOSIT_VALUE;
                }
            })
            let calculatorData = depositData;
            const elements = initElementsDepositCalculator(calculator);
            const depositNameOptions = collectOptionsName(calculatorData);
            if (depositNameOptions.length > 1) {
                depositNameOptions.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item;
                    option.textContent = item;
                    elements.selectName.appendChild(option);
                });
                calculatorData = calculatorData.filter(item => item.name === depositNameOptions[0]);
            }

            return {
                elements,
                calculatorData,
                depositData
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

// проверка соседних значений периода вклада,
// если у соседних значений в массиве разница <= 2, то возвращаем только первое и последнее
// для влкадов с нежескими сроками (<=2 т.к. есть кейс 365 и 367)
function filterStepsArray(arr, STATE) {
    if (arr.length === 0) return [];

    let hasSmallDifference = false;

    // Проверяем разницу между соседними элементами
    for (let i = 1; i < arr.length; i++) {
        if (Math.abs(arr[i] - arr[i - 1]) <= 2) {
            hasSmallDifference = true;
            break; // Прерываем цикл, если нашли такую разницу
        }
    }

    // Если найдена разница <= 2, возвращаем только первое и последнее значение
    if (hasSmallDifference) {
        STATE.elements.inputPeriodWrapper.classList.add(CLASSES_DEPOSIT.smallDifference);
        STATE.elements.inputPeriodWrapper.setAttribute('data-start-value', arr[0]);
        STATE.elements.inputPeriodWrapper.setAttribute('data-min-value', arr[0]);
        STATE.elements.inputPeriodWrapper.setAttribute('data-max-value', arr[arr.length - 1]);
        return [arr[0], arr[arr.length - 1]];
    }

    STATE.elements.inputPeriodWrapper.classList.remove(CLASSES_DEPOSIT.smallDifference);
    // Если разницы не найдены, возвращаем оригинальный массив
    return arr;
}

const getStepsPeriod = (STATE) => {
    const data = STATE.filteredData;
    const allValues = [];
    data.forEach(obj => {
        allValues.push(obj.periodFrom);
        allValues.push(obj.periodTo);
    });
    const uniqueValues = [...new Set(allValues)];
    let sortedValues = uniqueValues.sort((a, b) => a - b);
    sortedValues = filterStepsArray(sortedValues, STATE);

    return sortedValues.join(', ');
}

const getDepositValues = (STATE) => {
    STATE.showCurrency = isShowCurrency(STATE.calculatorData);

    if (!STATE.currency) {
        STATE.currency = STATE.calculatorData[0].currency ? STATE.calculatorData[0].currency : "Рубли";
    }
    if (STATE.showCurrency) {
        setCurrencyToReplenishment(STATE);
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
        STATE.steps = getStepsPeriod(STATE);
    } else {
        STATE.steps = '';
    }

    STATE.amount = STATE.minAmount;
    STATE.period = STATE.minPeriod;
}

const setDepositValues = (STATE, currencyTrigger) => {
    if (currencyTrigger) {
        const cloneInputAmount = STATE.elements.inputAmountWrapper.cloneNode(true);
        // Добавляем клонированный элемент перед оригинальным
        STATE.elements.inputAmountWrapper.insertAdjacentElement('beforebegin', cloneInputAmount);
        STATE.elements.inputAmountWrapper.remove();
        const steps = cloneInputAmount.querySelector(JS_CLASSES.textSteps);
        steps.innerHTML = '';
        STATE.elements.inputAmountWrapper = cloneInputAmount;

        const cloneInputPeriod = STATE.elements.inputPeriodWrapper.cloneNode(true);
        // Добавляем клонированный элемент перед оригинальным
        STATE.elements.inputPeriodWrapper.insertAdjacentElement('beforebegin', cloneInputPeriod);
        STATE.elements.inputPeriodWrapper.remove();
        STATE.elements.inputPeriodWrapper = cloneInputPeriod;
        STATE.elements.inputPeriod = STATE.elements.inputPeriodWrapper.querySelector(ELEMS_DEPOSIT.inputPeriod);
    }

    if (STATE.steps) {
        STATE.elements.inputPeriodWrapper.classList.remove(CLASSES_DEPOSIT.hide);
        const periodStepsText = STATE.elements.inputPeriodWrapper.querySelector(JS_CLASSES.textSteps);
        const periodSteps = STATE.elements.inputPeriodWrapper.querySelectorAll(JS_CLASSES.sliderSteps);
        periodSteps.forEach((step) => {
            step.remove();
        })
        periodStepsText.innerHTML = '';
        // депозиты с нежескими сроками
        if (STATE.elements.inputPeriodWrapper.classList.contains(CLASSES_DEPOSIT.smallDifference)) {
            STATE.elements.inputPeriodWrapper.removeAttribute('data-steps');
        } else { // депозиты с жескими сроками
            STATE.elements.inputPeriodWrapper.setAttribute('data-steps', STATE.steps);
        }
        initInputSlider([STATE.elements.inputPeriodWrapper]);
        STATE.period = getPeriodValue(STATE.elements.inputPeriod);
    } else { // если период вклада не меняется
        STATE.elements.inputPeriodWrapper.classList.add(CLASSES_DEPOSIT.hide);
        STATE.period = STATE.minPeriod;
    }

    STATE.elements.inputAmountWrapper.setAttribute('data-min-value', STATE.minAmount);
    STATE.elements.inputAmountWrapper.setAttribute('data-max-value', STATE.maxAmount);
    STATE.elements.inputAmountWrapper.setAttribute('data-start-value', STATE.amount);
    // показываем или нет валюту
    if (!STATE.showCurrency) {
        STATE.elements.currencyList.innerHTML = '';
        STATE.elements.currencyList.classList.add(CLASSES_DEPOSIT.hide);
    } else {
        STATE.elements.currencyList.classList.remove(CLASSES_DEPOSIT.hide);
        createCurrencyList(STATE);
    }
    initInputSlider([STATE.elements.inputAmountWrapper]);

    // поиск процентной ставки
    STATE.rate = findDepositRate({data: STATE.filteredData, amount: STATE.amount, period: STATE.period});

    // расчеты дохода
    STATE.income = calculateDepositIncome(STATE);

    // выводим результаты
    showDepositResult(STATE);

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        STATE.amount = event.detail.value;
        handlerInputDeposit(STATE);
    })

    STATE.elements.inputPeriodWrapper.addEventListener('input', () => {
        STATE.period = getPeriodValue(STATE.elements.inputPeriod);
        handlerInputDeposit(STATE);
    })
}

function setDepositTriggerListener(STATE) {
    $(STATE.elements.selectName).on('select2:select', function (event) {
        STATE.name = event.target.value;
        STATE.calculatorData = STATE.depositData.filter(item => item.name === STATE.name);
        STATE.currency = "";
        getDepositValues(STATE);
        setDepositValues(STATE, true);
    });

    STATE.elements.inputCapitalization.addEventListener('change', (event) => {
        STATE.capitalization = event.target.checked;
        handlerInputDeposit(STATE);
    })
}

const updatePolygonInResult = (el) => {
    const event = new Event("resize", {bubbles: true, composed: true});
    el.closest(ELEMS_DEPOSIT.polygonContainer).dispatchEvent(event);
}

const resizePolygonInResult = (el) => {
    const resizeObserver = new ResizeObserver(entries => {
        updatePolygonInResult(el);
    });

    resizeObserver.observe(el);
}

function initResizePolygonInResult(root) {
    const resultBlock = root.querySelector(ELEMS_DEPOSIT.resultBlock);
    if (!resultBlock) return false;

    resizePolygonInResult(resultBlock);
}

function initCalculatorDeposit() {
    const calculatorsDeposit = document.querySelectorAll(ELEMS_DEPOSIT.root);

    for (const calculator of calculatorsDeposit) {
        initStateDepositCalculator(calculator)
            .then(STATE => {
                getDepositValues(STATE);
                initReplenishment(calculator, STATE);
                setDepositValues(STATE);
                setDepositTriggerListener(STATE);
                initResizePolygonInResult(STATE.elements.root);
            })
            .catch(error => {
                console.error('Ошибка в initCalculatorDeposit функции:', error);
            });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initCalculatorDeposit();
})
