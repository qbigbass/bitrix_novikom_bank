const ELEMS_MORTGAGE = {
    root: '.js-calculator-mortgage',
    inputProperty: '.js-input-property',
    initialPayment: '.js-input-initial-payment',
    selectRegion: '.js-mort-region',
    selectProgram: '.js-mort-program',
    selectObject: '.js-mort-object',
    inputMortgageCard: '.js-mort-card',
    inputMortgageInsurance: '.js-mort-card',
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
    const inputPaymentWrapper = inputInitialPayment.closest(ELEMS_DEPOSIT.inputSlider);
    const selectRegion = root.querySelector(ELEMS_MORTGAGE.selectRegion);
    const selectProgram = root.querySelector(ELEMS_MORTGAGE.selectProgram);
    const selectObject = root.querySelector(ELEMS_MORTGAGE.selectObject);
    const inputMortgageCard = root.querySelector(ELEMS_LOAN.inputMortgageCard);
    const inputMortgageInsurance = root.querySelector(ELEMS_LOAN.inputMortgageInsurance);

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
        inputPaymentWrapper,
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
                console.log('STATE', STATE);
                // getMortgageValues(STATE);
                // setMortgageValues(STATE);
            })
            .catch((error) => {
                console.error('error initCalculatorMortgage', error);
            })
    }
}
