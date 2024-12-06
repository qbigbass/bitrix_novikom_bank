import {generateStepsFromAttrs, getFormatedTextByType} from "./inputSlider";
import {fetchDepositCalcData} from "../api/depositCalculator";
import initInputSlider from "./inputSlider";

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
}

const ClASSES = {
  hide: 'd-none',
}

const URL = '/api/data';

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
export const initReplenishment = () => {
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
            console.log('buttonRemoveReplenishment', buttonRemoveReplenishment)
            buttonRemoveReplenishment.addEventListener('click', removeReplenishment);
        })
    })

}

const initElements = (root) => {
  const displayPeriod = root.querySelector(ELEMS_DEPOSIT.period);
  const displayRate = root.querySelector(ELEMS_DEPOSIT.rate);
  const displayIncome = root.querySelector(ELEMS_DEPOSIT.income);
  const inputAmount = root.querySelector(ELEMS_DEPOSIT.inputAmount);
  const inputPeriod = root.querySelector(ELEMS_DEPOSIT.inputPeriod);
  const inputPeriodWrapper = inputPeriod.closest(ELEMS_DEPOSIT.inputSlider);
  const inputAmountWrapper = inputAmount.closest(ELEMS_DEPOSIT.inputSlider);

  return {
    root,
    displayPeriod,
    displayRate,
    displayIncome,
    inputAmount,
    inputPeriod,
    inputPeriodWrapper,
    inputAmountWrapper
  }
}

async function initState(calculator){
  const { data } = await fetchDepositCalcData(URL);

  if (!data) { return false; }

  const elements = initElements(calculator);
  const calculatorId = calculator.dataset.id;
  const calculatorData = data.find(item => item.id === Number(calculatorId));

  return {
    elements,
    calculatorId,
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
    allValues.push(obj.periodMin);
    allValues.push(obj.periodMax);
  });
  const uniqueValues = [...new Set(allValues)];
  const sortedValues = uniqueValues.sort((a, b) => a - b);
  return sortedValues.join(', ');
}

const getStartValues = (STATE) => {
  STATE.minPeriod = findMinValue('periodMin', STATE.calculatorData.values);
  STATE.maxPeriod = findMaxValue('periodMax', STATE.calculatorData.values);
  STATE.minAmount = findMinValue('amountMin', STATE.calculatorData.values);
  STATE.maxAmount = findMaxValue('amountMax', STATE.calculatorData.values);
  STATE.steps = getStepsPeriod(STATE.calculatorData.values);
  STATE.amount = Number(STATE.minAmount);
}

const setStartValues = (STATE) => {
  console.log('minPeriod', STATE.minPeriod)
  console.log('maxPeriod', STATE.maxPeriod)
  console.log('minAmount', STATE.minAmount)
  console.log('maxAmount', STATE.maxAmount)
  console.log('steps', STATE.steps)

  STATE.elements.inputPeriodWrapper.setAttribute('data-steps', STATE.steps);
  STATE.elements.inputPeriodWrapper.setAttribute('data-start-value', STATE.maxPeriod);
  STATE.elements.inputAmountWrapper.setAttribute('data-min-value', STATE.minAmount);
  STATE.elements.inputAmountWrapper.setAttribute('data-max-value', STATE.maxAmount);
  initInputSlider([STATE.elements.inputPeriodWrapper, STATE.elements.inputAmountWrapper]);
  STATE.period = getPeriodValue(STATE.elements.inputPeriod);
  STATE.elements.displayPeriod.innerHTML = getFormatedTextByType(STATE.period, 'day');

  // TODO: поиск процентной ставки и рассчеты
  console.log('amount', STATE.amount);
}

async function initCalculatorDeposit() {
  const calculatorsDeposit = document.querySelectorAll(ELEMS_DEPOSIT.root);

  for (const calculator of calculatorsDeposit) {
    const STATE = await initState(calculator);

    if (!STATE) { return false; }

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

export default initCalculatorDeposit
