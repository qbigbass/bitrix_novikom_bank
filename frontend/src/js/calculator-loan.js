const ELEMS_LOAN = {
    root: '.js-calculator-loan',
    payment: '.js-calculator-display-payment',
}

function initElementsCalculator(root) {
    const displayRate = root.querySelector(ELEMS_DEPOSIT.rate);
    const displayPayment = root.querySelector(ELEMS_LOAN.payment);

    return {
        root,
        displayRate
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
}
