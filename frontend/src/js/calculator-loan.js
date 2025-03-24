const ELEMS_LOAN = {
    root: '.js-calculator-loan',
    payment: '.js-calculator-display-payment',
    fullCost: '.js-calculator-display-full-cost',
    loanType: '.js-select-loan-type',
    selectLoanProperties: '.js-select-loan-properties',
    selectLoanPropertiesWrapper: '.js-select-loan-properties-wrapper',
    selectLoanPaymentType: '.js-select-loan-payment-type',
    selectBorrowerType: '.js-select-borrower-type',
    selectBorrowerTypeWrapper: '.js-select-borrower-type-wrapper',
    tableSchedule: '#payment-loan-table-body',
    loanName: ".js-program-name",
    rate: '.js-calculator-display-rate',
    inputAmount: '.js-input-amount',
    inputPeriod: '.js-input-period',
    inputSlider: '.input-slider',
}

function calculateDifferentiatedPayments({amount, rate, period}) {
    const monthlyRate = rate / 100 / 12; // Преобразуем годовую ставку в месячную
    const principalPayment = amount / period; // Фиксированная оплата основного долга
    let balance = amount;
    const paymentSchedule = [];

    for (let i = 1; i <= period; i++) {
        const interestPayment = balance * monthlyRate; // Оплата процентов
        const monthlyPayment = principalPayment + interestPayment; // Общий ежемесячный платеж
        balance -= principalPayment; // Обновляем остаток погашения

        // Добавляем данные в расписание платежей
        paymentSchedule.push({
            month: i,
            interestPayment: interestPayment,
            principalPayment: principalPayment,
            monthlyPayment: monthlyPayment,
            remainingBalance: balance > 0 ? balance : 0 // Остаток погашения
        });
    }

    return paymentSchedule;
}

function calculatePayments({amount, rate, period}) {
    const monthlyRate = rate / 100 / 12; // Преобразуем годовую ставку в месячную
    const monthlyPayment = (amount * monthlyRate * Math.pow(1 + monthlyRate, period)) /
        (Math.pow(1 + monthlyRate, period) - 1);

    let balance = amount;
    const paymentSchedule = [];

    for (let i = 1; i <= period; i++) {
        const interestPayment = balance * monthlyRate; // Оплата процентов
        const principalPayment = monthlyPayment - interestPayment; // Оплата основного долга
        balance -= principalPayment; // Обновляем остаток погашения

        // Добавляем данные в расписание платежей
        paymentSchedule.push({
            month: i,
            interestPayment: interestPayment,
            principalPayment: principalPayment,
            monthlyPayment: monthlyPayment,
            remainingBalance: balance > 0 ? balance : 0 // Остаток погашения
        });
    }

    return paymentSchedule;
}

function handlerInputLoan(STATE) {
    STATE.rate = STATE.filteredData.rate;
    STATE.payment = calculateMonthlyPayment(STATE);

    showLoanResult(STATE);
}

function calculateMonthlyPayment({amount, rate, period, paymentType}) {
    const monthlyRate = rate / 100 / 12; // Преобразуем годовую ставку в месячную

    if (paymentType === 'annuity') {
        // Аннуитетный платеж
        return (amount * monthlyRate * Math.pow(1 + monthlyRate, period)) /
            (Math.pow(1 + monthlyRate, period) - 1);
    } else if (paymentType === 'differentiated') {
        // Дифференцированный платеж
        let totalPayment = 0;
        for (let i = 1; i <= period; i++) {
            const principalPayment = amount / period; // Основной долг
            const interestPayment = (amount - (principalPayment * (i - 1))) * monthlyRate; // Проценты
            const monthlyPayment = principalPayment + interestPayment;
            totalPayment += monthlyPayment;
        }
        return totalPayment / period; // Возвращаем средний платеж
    } else {
        throw new Error("Не указан тип платже. Использовать 'annuity' или 'differentiated'.");
    }
}
function showLoanResult(STATE) {
    STATE.elements.loanName.innerHTML = STATE.filteredData.name;
    STATE.elements.displayRate.textContent = `${formatNumber(STATE.rate.toFixed(2))} %`;
    STATE.elements.displayPayment.innerHTML = `${formatNumber(STATE.payment.toFixed(2))} <span class="currency">₽</span>`;
    STATE.elements.displayFullCost.innerHTML = `${STATE.fullCost} %`;

    // Рассчитываем платежи
    const paymentSchedule = STATE.paymentType === 'differentiated' ? calculateDifferentiatedPayments(STATE) : calculatePayments(STATE);
    // Заполняем таблицу
    STATE.elements.tableSchedule.innerHTML = '';
    paymentSchedule.forEach(payment => {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${payment.month}</td>
        <td>${formatNumber(payment.interestPayment.toFixed(2))}</td>
        <td>${formatNumber(payment.principalPayment.toFixed(2))}</td>
        <td>${formatNumber(payment.monthlyPayment.toFixed(2))}</td>
        <td>${formatNumber(payment.remainingBalance.toFixed(2))}</td>
    `;
        STATE.elements.tableSchedule.appendChild(row);
    });
}

function checkInputRangeSlider(STATE) {
    if ((STATE.minAmount !== STATE.filteredData.sumFrom) || (STATE.maxAmount !== STATE.filteredData.sumTo)) {
        STATE.minAmount = STATE.filteredData.sumFrom;
        STATE.maxAmount = STATE.filteredData.sumTo;
        STATE.amount = STATE.minAmount;
        const dataAttrAmount = {
            'minValue': STATE.minAmount,
            'maxValue': STATE.maxAmount,
            'startValue': STATE.minAmount
        }
        STATE.elements.inputAmountWrapper = createNewInputSlider(STATE.elements.inputAmountWrapper,
            dataAttrAmount);
        STATE.elements.inputAmount = STATE.elements.inputAmountWrapper.querySelector(ELEMS_LOAN.inputAmount);

        STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
            STATE.amount = event.detail.value;
            handlerInputLoan(STATE);
        })
    }
    if ((STATE.minPeriod !== STATE.filteredData.periodFrom) || (STATE.maxPeriod !== STATE.filteredData.periodTo)) {
        STATE.minPeriod = STATE.filteredData.periodFrom;
        STATE.maxPeriod = STATE.filteredData.periodTo;
        STATE.period = STATE.minPeriod;
        const dataAttrPeriod = {
            'minValue': STATE.minPeriod,
            'maxValue': STATE.maxPeriod,
            'startValue': STATE.minPeriod
        }
        STATE.elements.inputPeriodWrapper = createNewInputSlider(STATE.elements.inputPeriodWrapper,
            dataAttrPeriod);
        STATE.elements.inputPeriod = STATE.elements.inputPeriodWrapper.querySelector(ELEMS_LOAN.inputPeriod);

        STATE.elements.inputPeriodWrapper.addEventListener('input', (event) => {
            STATE.period = event.detail.value;
            handlerInputLoan(STATE);
        })
    }
}

const setLoanValues = (STATE) => {
    STATE.elements.inputPeriodWrapper.setAttribute('data-min-value', STATE.minPeriod);
    STATE.elements.inputPeriodWrapper.setAttribute('data-max-value', STATE.maxPeriod);
    STATE.elements.inputAmountWrapper.setAttribute('data-min-value', STATE.minAmount);
    STATE.elements.inputAmountWrapper.setAttribute('data-max-value', STATE.maxAmount);
    STATE.elements.inputPeriodWrapper.setAttribute('data-start-value', STATE.period);
    STATE.elements.inputAmountWrapper.setAttribute('data-start-value', STATE.amount);

    initInputSlider([STATE.elements.inputAmountWrapper, STATE.elements.inputPeriodWrapper]);

    showLoanResult(STATE);

    STATE.elements.inputPeriodWrapper.addEventListener('input', (event) => {
        STATE.period = event.detail.value;
        handlerInputLoan(STATE);
    })

    STATE.elements.inputAmountWrapper.addEventListener('input', (event) => {
        STATE.amount = event.detail.value;
        handlerInputLoan(STATE);
    })

    $(ELEMS_LOAN.selectLoanPaymentType).on('select2:select', (event) => {
        STATE.paymentType = event.target.value;
        handlerInputLoan(STATE);
    });


    $(ELEMS_LOAN.selectLoanProperties).on('select2:select', (event) => {
        STATE.loanType = event.target.value;
        STATE.filteredData = findLoanData(STATE);
        checkInputRangeSlider(STATE);
        handlerInputLoan(STATE);
    });

    $(ELEMS_LOAN.selectBorrowerType).on('select2:select', (event) => {
        STATE.borrowerType = event.target.value;
        STATE.filteredData = findLoanData(STATE);
        checkInputRangeSlider(STATE);
        handlerInputLoan(STATE);
    });
}

function findLoanRate(amount, data) {
    const result =   data.find(item => amount >= item.sumForm && amount <= item.SumTo);
    return result ? result.rate : data[0].rate;
}

function findLoanData({calculatorData, loanType, borrowerType, amount}) {
    // Фильтруем по loanType
    const resultType = calculatorData.filter(item => item.loanType === loanType);

    // Фильтруем по borrowerType
    const result = resultType.filter(item => item.borrowerType === borrowerType);

    // Проверяем, есть ли результаты
    if (result.length > 0) {
        if (result.length === 1) return result[0];
        let newResult = result[0];
        newResult.sumFrom = findMinValue('sumFrom', result);
        newResult.sumTo = findMaxValue('sumTo', result);
        newResult.rate = findLoanRate(amount, result);
        return newResult;
    } else {
        return resultType[0]; // Возвращаем первый элемент из resultType, если нет результатов
    }
}

function setStartValues(STATE) {
    STATE.amount = STATE.minAmount;
    STATE.period = STATE.minPeriod;
}

const getLoanValues = (STATE) => {
    const loanType = collectSelectOptions(STATE.calculatorData, 'loanType');
    const borrowerType = collectSelectOptions(STATE.calculatorData, 'borrowerType');
    setSelectOptions('selectLoanProperties', loanType, STATE);
    setSelectOptions('selectBorrowerType', borrowerType, STATE);
    if (loanType.length <= 1) { // когда одна программа кредита
        const selectProperties = STATE.elements.selectLoanProperties.closest(ELEMS_LOAN.selectLoanPropertiesWrapper);
        const selectBorrower = STATE.elements.selectBorrowerType.closest(ELEMS_LOAN.selectBorrowerTypeWrapper);
        selectProperties.remove();
        selectBorrower.remove();
        STATE.filteredData = STATE.calculatorData[0];
    } else { // несколько программ кредита на Главной стр
        STATE.loanType = STATE.elements.selectLoanProperties.value;
        STATE.paymentType = STATE.elements.selectLoanPaymentType.value;
        STATE.borrowerType = STATE.elements.selectBorrowerType.value;

        STATE.filteredData = findLoanData(STATE);


    }

    if (!STATE.filteredData) {
        STATE.filteredData = STATE.calculatorData[0];
    }

    STATE.minPeriod = STATE.filteredData.periodFrom;
    STATE.maxPeriod = STATE.filteredData.periodTo;
    STATE.minAmount = STATE.filteredData.sumFrom;
    STATE.maxAmount = STATE.filteredData.sumTo;
    STATE.rate = STATE.filteredData.rate;
    STATE.fullCost = STATE.filteredData.totalCostCreditRange;

    setStartValues(STATE);
    STATE.payment = calculateMonthlyPayment(STATE);
}

function initElementsLoanCalculator(root) {
    const displayRate = root.querySelector(ELEMS_LOAN.rate);
    const displayPayment = root.querySelector(ELEMS_LOAN.payment);
    const displayFullCost = root.querySelector(ELEMS_LOAN.fullCost);
    const inputAmount = root.querySelector(ELEMS_LOAN.inputAmount);
    const inputPeriod = root.querySelector(ELEMS_LOAN.inputPeriod);
    const inputPeriodWrapper = inputPeriod.closest(ELEMS_LOAN.inputSlider);
    const inputAmountWrapper = inputAmount.closest(ELEMS_LOAN.inputSlider);
    const selectLoanProperties = root.querySelector(ELEMS_LOAN.selectLoanProperties);
    const selectLoanPaymentType = root.querySelector(ELEMS_LOAN.selectLoanPaymentType);
    const selectBorrowerType = root.querySelector(ELEMS_LOAN.selectBorrowerType);
    const tableSchedule = root.querySelector(ELEMS_LOAN.tableSchedule);
    const loanName = root.querySelector(ELEMS_LOAN.loanName);

    return {
        root,
        displayRate,
        displayPayment,
        displayFullCost,
        inputAmount,
        inputPeriod,
        selectLoanProperties,
        selectLoanPaymentType,
        selectBorrowerType,
        inputPeriodWrapper,
        inputAmountWrapper,
        tableSchedule,
        loanName
    }
}

function initStateLoanCalculator(calculator) {
    return getRates(calculator.dataset)
        .then(calculatorData => {
            const elements = initElementsLoanCalculator(calculator);

            return {
                elements,
                calculatorData
            }
        })
        .catch((error) => {
            console.error('error initStateLoanCalculator', error);
        })
}

function initCalculatorLoan() {
    const calculatorsLoan = document.querySelectorAll(ELEMS_LOAN.root);

    for (const calculator of calculatorsLoan) {
        initStateLoanCalculator(calculator)
            .then(STATE => {
                getLoanValues(STATE);
                setLoanValues(STATE);
            })
            .catch((error) => {
                console.error('error initCalculatorLoan', error);
            })
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initCalculatorLoan();
})
