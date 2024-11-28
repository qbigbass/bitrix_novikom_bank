import {generateStepsFromAttrs, getFormatedTextByType} from "./inputSlider";
import {fetchDepositCalcData} from "../api/depositCalculator";
import initInputSlider from "./inputSlider";

const ELEMS = {
  root: '.js-calculator-deposit',
  replenishment: '.js-replenishment',
  period: '.js-calculator-deposit-period',
  rate: '.js-calculator-deposit-rate',
  income: '.js-calculator-deposit-income',
  inputAmount: '.js-input-amount',
  inputPeriod: '.js-input-period',
  inputSlider: '.input-slider',
}

const ClASSES = {
  hide: 'd-none',
}

const URL = '/api/data';

const toggleVisibility = (target, checked) => {
  checked ? target.classList.remove(ClASSES.hide) : target.classList.add(ClASSES.hide)
}

// пополнение
const initReplenishment = (calculator) => {
  const replenishmentTrigger = calculator.querySelector(ELEMS.replenishment);

  if (!replenishmentTrigger) return;

  const replenishmentBlock = document.querySelector(`#${replenishmentTrigger.dataset.target}`);

  if (!replenishmentBlock) {
    throw new Error(`Не найден блок с пополнением: #${replenishmentTrigger.dataset.target}`);
  }

  toggleVisibility(replenishmentBlock, replenishmentTrigger.checked)

  replenishmentTrigger.addEventListener('click', (event) => {
    toggleVisibility(replenishmentBlock, event.target.checked)
  })
}

const initElements = (root) => {
  const displayPeriod = root.querySelector(ELEMS.period);
  const displayRate = root.querySelector(ELEMS.rate);
  const displayIncome = root.querySelector(ELEMS.income);
  const inputAmount = root.querySelector(ELEMS.inputAmount);
  const inputPeriod = root.querySelector(ELEMS.inputPeriod);
  const inputPeriodWrapper = inputPeriod.closest(ELEMS.inputSlider);
  const inputAmountWrapper = inputAmount.closest(ELEMS.inputSlider);

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
  const inputSlider = input.closest(ELEMS.inputSlider);
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
  const calculatorsDeposit = document.querySelectorAll(ELEMS.root);

  for (const calculator of calculatorsDeposit) {
    const STATE = await initState(calculator);

    if (!STATE) { return false; }

    getStartValues(STATE);
    setStartValues(STATE);
    initReplenishment(calculator);

    // STATE.elements.inputAmount.addEventListener('input', (event) => {
    //   setValue(STATE);
    // })
    // STATE.elements.inputPeriod.addEventListener('input', (event) => {
    //   setValue(STATE);
    // })
  }
}

export default initCalculatorDeposit
