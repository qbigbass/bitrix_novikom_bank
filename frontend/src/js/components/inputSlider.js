import {formatNumberWithSpaces, plural} from "../utils";
import initInputSliderText, {ROOT_JS_CLASS} from "./inputSliderText";

export const JS_CLASSES = {
    root: '.js-input-slider',
    displayValue: '.js-input-slider-display-value',
    textSteps: '.js-input-slider-text-steps',
    innerInput: '.js-input-slider-inner',
    textInput: ROOT_JS_CLASS,
    sliderInput: '.js-input-slider-input',
}

const DATA_ATTRS = {
    dataStartValue: 'data-start-value',
    dataMinValue: 'data-min-value',
    dataMaxValue: 'data-max-value',
    dataStepSize: 'data-step-size',
    dataType: 'data-type',
    dataSteps: 'data-steps',
}

const initElements = (root) => {
    const sliderInput = root.querySelector(JS_CLASSES.sliderInput);
    const innerInput = root.querySelector(JS_CLASSES.innerInput);

    if (!sliderInput || !innerInput) {
        throw new Error(`Не найдены следующие элементы: ${JS_CLASSES.innerInput} или ${JS_CLASSES.sliderInput}`);
    }

    const displayValue = root.querySelector(JS_CLASSES.displayValue);
    const textInput = root.querySelector(JS_CLASSES.textInput);
    const textStepsContainer = root.querySelector(JS_CLASSES.textSteps)
    const steps= [];
    const textSteps = [];

    return {
        root,
        displayValue,
        innerInput,
        sliderInput,
        textInput,
        steps,
        textSteps,
        textStepsContainer
    }
}

const generateStepsFromAttrs = (attr) => {
    if (attr.length > 0) {
        return attr.split(',')?.map((step) => Number(step)) ?? [];
    } else {
        return [];
    }
}

const initDefaultValues = (root) => {
    let value= Number(root.getAttribute(DATA_ATTRS.dataStartValue) ?? 0);
    let minValue = Number(root.getAttribute(DATA_ATTRS.dataMinValue) ?? 0);
    let maxValue = Number(root.getAttribute(DATA_ATTRS.dataMaxValue) ?? 100);
    let stepSize = Number(root.getAttribute(DATA_ATTRS.dataStepSize) ?? 1);
    let type = root?.getAttribute(DATA_ATTRS.dataType) ?? 'price'

    const steps = generateStepsFromAttrs(root.getAttribute(DATA_ATTRS.dataSteps) ?? '');
    const useSteps = steps.length > 0;

    if (useSteps) {
        value = steps.findIndex((step) => step === value) ?? 0;
        minValue = 0;
        maxValue = steps.length - 1;
        stepSize = 1;
    }

    value = Math.min(Math.max(value, minValue), maxValue);

    return {
        maxValue,
        minValue,
        stepSize,
        steps,
        type,
        useSteps,
        value
    }
}

const initState = (sliderInput) => {
    const elements = initElements(sliderInput);
    const defaultValues = initDefaultValues(sliderInput);

    return {
        elements,
        components: {
            inputText: null
        },
        ...defaultValues
    }
}

const initSliderInputAttrs = (STATE) => {
    STATE.elements.sliderInput.setAttribute('value', String(STATE.value));
    STATE.elements.sliderInput.setAttribute('step', String(STATE.stepSize));
    STATE.elements.sliderInput.setAttribute('max', String(STATE.maxValue));
    STATE.elements.sliderInput.setAttribute('min', String(STATE.minValue));
}

const setPositionStepElements = (STATE) => {
    STATE.elements.steps.forEach((step, index) => {
        if (!step) return;
        const leftPercent = calculatePercent(STATE, index);
        step.style.left = `${leftPercent}%`;
    })
}

const initResizeObserverForRootElement = (STATE) => {
    const resizeObserver = new ResizeObserver((entries) => {
        setBackgroundSliderInputElement(STATE);
        setPositionStepElements(STATE);
    });

    resizeObserver.observe(STATE.elements.root);
}

const setTextContentToDisplayValueElement = (STATE) => {
    let value = STATE.useSteps ? STATE.steps[STATE.value] : STATE.value;

    if (STATE.elements.displayValue) {
        STATE.elements.displayValue.innerHTML = getFormatedTextByType(value, STATE.type);
    }
}

export const getFormatedTextByType = (value, type, isFocus = false) => {
    let result = '';

    switch (type) {
        case 'price':
            result = `${formatNumberWithSpaces(value)} ₽`;
            break;
        case 'month':
            if (isFocus) {
                result = `${value} ${plural(['месяц', 'месяца', 'месяцев'], value)}`;
            } else {
                const years = Math.floor(value / 12);
                const months = value % 12;

                if (years >= 1) {
                    result = `${years} ${plural(['год', 'года', 'лет'], years)}`;

                    if (months > 0) {
                        result += ` ${months} ${plural(['месяц', 'месяца', 'месяцев'], months)}`;
                    }
                } else {
                    result = `${months} ${plural(['месяц', 'месяца', 'месяцев'], months)}`;
                }
            }

            break;
        case 'day':
            result = `${formatNumberWithSpaces(value)} ${plural(['день', 'дня', 'дней'], value)}`;
            break;
    }

    return result;
}

const setBackgroundStepElements = (STATE) => {
    if (STATE.useSteps) {
        STATE.elements.steps.forEach((step, index) => {
            if (!step) return;

            if (index <= STATE.value) {
                step.classList.add('is-active');
            } else {
                step.classList.remove('is-active');
            }
        });
    }
}

const calculatePercent = (STATE, value) => {
    const thumbWidth = 24;
    const trackWidth = STATE.elements.root.offsetWidth;
    const thumbPercent = (thumbWidth / trackWidth) * 100;

    const usableRange = 100 - thumbPercent;
    const percentage = ((value - STATE.minValue) / (STATE.maxValue - STATE.minValue)) * usableRange + thumbPercent / 2;

    return Math.max(0, Math.min(100, percentage)).toFixed(2);
}

const setSliderInputValue = (STATE, value) => {
    const stringValue = String(value);
    STATE.value = value;
    STATE.elements.sliderInput.value = stringValue;
    STATE.elements.sliderInput.setAttribute('value', stringValue);
}


const setValue = (STATE, value) => {
    setSliderInputValue(STATE, value);
    setBackgroundSliderInputElement(STATE);
    setTextContentToDisplayValueElement(STATE);
    setBackgroundStepElements(STATE);

    const customEvent = new CustomEvent('input', {
        detail: { value: STATE.value },
        bubbles: false
    });

    STATE.elements.root.dispatchEvent(customEvent);
}

const setBackgroundSliderInputElement = (STATE) => {
    const percentage = calculatePercent(STATE, STATE.value);
    STATE.elements.sliderInput.style.background = `linear-gradient(to right, var(--blue-100) ${percentage}%, var(--blue-30) ${percentage}%)`;
}

const initSliderInputTextComponent = (STATE) => {
    if (STATE.elements.textInput) {
        STATE.components.inputText = initInputSliderText(STATE.elements.textInput, {
            minValue: STATE.minValue,
            maxValue: STATE.maxValue,
            value: STATE.value,
            type: STATE.type,
            useSteps: STATE.useSteps,
            steps: STATE.steps
        });
    }
}

const createTextStepElement = (text) => {
    const span = document.createElement('span');
    span.classList.add('input-slider-text-step', 'text-s', 'dark-70');
    span.innerHTML = text;

    return span;
}

const createStepElement = (leftPercent) => {
    const span = document.createElement('span');
    span.classList.add('input-slider-step');
    span.style.left = `${leftPercent}%`;

    return span;
}

const initDisplaySteps = (STATE) => {
    if (STATE.useSteps) {
        STATE.steps.forEach((step, index) => {
            const textStepContent = getFormatedTextByType(step, STATE.type);
            const textStepElement = createTextStepElement(textStepContent);
            STATE.elements.textStepsContainer?.append(textStepElement);
            STATE.elements.textSteps.push(textStepElement);

            if (index !== 0 && index !== STATE.steps.length - 1) {
                const leftPercent = calculatePercent(STATE, index);
                const stepElement = createStepElement(leftPercent);
                STATE.elements.innerInput.append(stepElement);
                STATE.elements.steps.push(stepElement);
            } else {
                STATE.elements.steps.push(null);
            }
        });
    } else {
        const values = [STATE.minValue, STATE.maxValue];

        values.forEach((value) => {
            const textStepContent = getFormatedTextByType(value, STATE.type);
            const textStepElement = createTextStepElement(textStepContent);

            STATE.elements.textStepsContainer?.append(textStepElement);
            STATE.elements.textSteps.push(textStepElement);
        });
    }
}

function initInputSlider() {
    const sliderInputs= document.querySelectorAll(JS_CLASSES.root);

    sliderInputs.forEach((sliderInput) => {
        const STATE = initState(sliderInput);
        initSliderInputAttrs(STATE);
        initDisplaySteps(STATE);
        initResizeObserverForRootElement(STATE);
        setValue(STATE, STATE.value);
        initSliderInputTextComponent(STATE);

        STATE.elements.sliderInput.addEventListener('input', function (event) {
            event.stopPropagation();

            setValue(STATE, Number(this.value));

            STATE.components.inputText?.methods.setValue(STATE.value);
        });

        STATE.components.inputText?.elements.root.addEventListener('input', (event) => {
            event.stopPropagation();
            setValue(STATE, event.detail.value);
        });
        return STATE;
    });
}

export default initInputSlider
