const ELEMS_LOAN = {
    root: '.js-calculator-loan',
    payment: '.js-calculator-display-payment',
    fullCost: '.js-calculator-display-full-cost',
    loanType: '.js-select-loan-type',
    inputLoanCard: '.js-inp-loan-card',
    inputLoanInsurance: '.js-loan-insurance',
    selectLoanProperties: '.js-select-loan-properties',
    selectLoanPaymentType: '.js-select-loan-payment-type',
    tableSchedule: '#payment-loan-table-body',
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
        const monthlyPayment = (amount * monthlyRate * Math.pow(1 + monthlyRate, period)) /
            (Math.pow(1 + monthlyRate, period) - 1);
        return monthlyPayment;
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
    STATE.elements.displayRate.textContent = `${formatNumber(STATE.rate)} %`;
    STATE.elements.displayPayment.innerHTML = `${formatNumber(STATE.payment.toFixed(2))} <span class="currency">₽</span>`;

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
        STATE.filteredData = findLoanData({data: STATE.calculatorData, type: STATE.loanType, strategicClient: STATE.strategicClient});
        handlerInputLoan(STATE);
    });

    STATE.elements.inputLoanCard.addEventListener('change', (event) => {
        STATE.strategicClient = !event.target.checked;
        STATE.filteredData = findLoanData({data: STATE.calculatorData, type: STATE.loanType, strategicClient: STATE.strategicClient});
        handlerInputLoan(STATE);
    })
}

function findLoanData({data, type, strategicClient}) {
    strategicClient ? strategicClient = 'Y' : strategicClient = null;
    const resultType = data.filter(item => item.loanType === type);
    const result = resultType.find(item => item.strategicClient === strategicClient);
    if (result !== -1) {
        return result;
    } else {
        return resultType[0];
    }
}

function setStartValues(STATE) {
    const startValueAmount = STATE.elements.inputAmountWrapper.getAttribute('data-start-value');
    const startValuePeriod = STATE.elements.inputPeriodWrapper.getAttribute('data-start-value');
    startValueAmount ? STATE.amount = Number(startValueAmount) : STATE.amount = STATE.minAmount;
    startValuePeriod ? STATE.period = Number(startValuePeriod) : STATE.period = STATE.maxPeriod;
}

const getLoanValues = (STATE) => {
    STATE.loanType = STATE.elements.selectLoanProperties.value;
    STATE.paymentType = STATE.elements.selectLoanPaymentType.value;
    STATE.strategicClient = !STATE.elements.inputLoanCard.checked;
    STATE.filteredData = findLoanData({data: STATE.calculatorData, type: STATE.loanType, strategicClient: STATE.strategicClient});

    if (!STATE.filteredData) {
        console.error(`Не удалось найти данные по ${STATE.loanType}`)
        STATE.filteredData = STATE.calculatorData[0];
    }

    STATE.minPeriod = STATE.filteredData.periodFrom;
    STATE.maxPeriod = STATE.filteredData.periodTo;
    STATE.minAmount = STATE.filteredData.sumFrom;
    STATE.maxAmount = STATE.filteredData.sumTo;
    STATE.rate = STATE.filteredData.rate;

    setStartValues(STATE);
    STATE.payment = calculateMonthlyPayment(STATE);
}

function initElementsCalculator(root) {
    const displayRate = root.querySelector(ELEMS_DEPOSIT.rate);
    const displayPayment = root.querySelector(ELEMS_LOAN.payment);
    const displayFullCost = root.querySelector(ELEMS_LOAN.fullCost);
    const inputAmount = root.querySelector(ELEMS_DEPOSIT.inputAmount);
    const inputPeriod = root.querySelector(ELEMS_DEPOSIT.inputPeriod);
    const inputPeriodWrapper = inputPeriod.closest(ELEMS_DEPOSIT.inputSlider);
    const inputAmountWrapper = inputAmount.closest(ELEMS_DEPOSIT.inputSlider);
    const inputLoanCard = root.querySelector(ELEMS_LOAN.inputLoanCard);
    const inputLoanInsurance = root.querySelector(ELEMS_LOAN.inputLoanInsurance);
    const selectLoanProperties = root.querySelector(ELEMS_LOAN.selectLoanProperties);
    const selectLoanPaymentType = root.querySelector(ELEMS_LOAN.selectLoanPaymentType);
    const tableSchedule = root.querySelector(ELEMS_LOAN.tableSchedule);

    return {
        root,
        displayRate,
        displayPayment,
        displayFullCost,
        inputAmount,
        inputPeriod,
        inputLoanCard,
        inputLoanInsurance,
        selectLoanProperties,
        selectLoanPaymentType,
        inputPeriodWrapper,
        inputAmountWrapper,
        tableSchedule
    }
}

async function initStateCalculator(calculator) {
    const {table } = calculator.dataset;

    const calculatorData = await getRates(table);

    if (!calculatorData) { return false }

    const elements = initElementsCalculator(calculator);

    return {
        elements,
        calculatorData
    }
}

async function initCalculatorLoan() {
    const calculatorsLoan = document.querySelectorAll(ELEMS_LOAN.root);

    for (const calculator of calculatorsLoan) {
        const STATE = await initStateCalculator(calculator);

        if (!STATE) {
            return false;
        }

        getLoanValues(STATE);
        setLoanValues(STATE);
    }
}
