import {getFormatedTextByType} from './inputSlider';
import {plural} from '../utils';

export const ROOT_JS_CLASS = '.js-input-slider-text';

const JS_CLASSES = {
    root: ROOT_JS_CLASS,
    inputText: '.js-input-slider-text-input',
    editButton: '.js-input-slider-text-edit',
    closeButton: '.js-input-slider-text-close'
}

const ACTION_CLASSES = {
    isEditable: 'is-editable'
}

const findIndexInRange = (arr, target) => {
    if (target < arr[0]) {
        return 0;
    }

    if (target > arr[arr.length - 1]) {
        return arr.length - 1;
    }

    for (let i = 0; i < arr.length; i++) {
        if (arr[i] >= target) {
            return i;
        }
    }

    return -1;
}

const normalizeInputTextValue = (value) => {
    return parseInt(value.replace(/\s/g, ''));
}

const setValueInputText = (STATE, value, outsideCall = false, isFocus = false) => {
    const isInvalidValue = isNaN(value);
    const adjustedValue = isInvalidValue ? STATE.minValue : value;

    if (STATE.useSteps && STATE.disabled) {
        if (outsideCall) {
            STATE.value = adjustedValue;
        } else {
            STATE.value = findIndexInRange(STATE.steps, adjustedValue);
        }
    } else {
        STATE.value = Math.min(Math.max(adjustedValue, STATE.minValue), STATE.maxValue);
    }
    const currentValue = STATE.useSteps ? STATE.steps[STATE.value] : STATE.value;

    STATE.elements.inputText.setAttribute('value', currentValue);
    STATE.elements.inputText.value =  getFormatedTextByType(currentValue, STATE.type, isFocus);
}

const initElements = (root, defaultValues) => {
    const inputText = root.querySelector(JS_CLASSES.inputText);
    const editButton = root.querySelector(JS_CLASSES.editButton);
    const closeButton = root.querySelector(JS_CLASSES.closeButton);

    if (!inputText || !editButton || !closeButton) {
        throw new Error(`Не найдены следующие элементы: ${JS_CLASSES.inputText}, ${JS_CLASSES.editButton} или ${JS_CLASSES.closeButton}`);
    }

    inputText.setAttribute('readonly', '');
    inputText.setAttribute('disabled', '');
    inputText.setAttribute('value', String(defaultValues.value));
    inputText.value = String(defaultValues.value);

    return {
        root,
        inputText,
        editButton,
        closeButton
    }
}

const formatInputValue = (value, type) => {
    // Удалить все пробелы из значения
    value = String(value).replace(/\s/g, '');

    // Преобразовать значение в число
    value = parseFloat(value);

    return getFormatedTextByType(value, type);
}

const initMaskInput = (elements, defaultValues) => {
    const currentValue = defaultValues.useSteps ? defaultValues.steps[defaultValues.value] : defaultValues.value;
    elements.inputText.value = formatInputValue(currentValue, defaultValues.type);

    return {value: formatInputValue(currentValue, defaultValues.type)};
}

const initState = (root, defaultValues) => {
    const elements = initElements(root, defaultValues);

    return {
        elements,
        disabled: true,
        methods: {
            setValue: (value) => {},
        },
        mask: initMaskInput(elements, defaultValues),
        ...defaultValues
    }
}

const enableInputTextElement = (STATE) => {
    STATE.elements.root.classList.add(ACTION_CLASSES.isEditable);
    STATE.elements.inputText.removeAttribute('readonly');
    STATE.elements.inputText.removeAttribute('disabled');
    STATE.elements.inputText.focus();
    STATE.disabled = false;
    setValueInputText(STATE, STATE.value, false, true);
}

const disableInputTextElement = (STATE, value) => {
    STATE.elements.root.classList.remove(ACTION_CLASSES.isEditable);
    STATE.elements.inputText.setAttribute('readonly', '');
    STATE.elements.inputText.setAttribute('disabled', '');
    STATE.disabled = true;
    setValueInputText(STATE, value);
}

const initDefaultEventListeners = (STATE) => {
    STATE.elements.editButton.addEventListener('click', (event) => {
        event.stopPropagation();
        enableInputTextElement(STATE);
    });

    STATE.elements.inputText.addEventListener('keypress', (event) => {
        event.stopPropagation();

        if (event.key === 'Enter') {
            STATE.elements.inputText.blur();
        }
    });

    STATE.elements.inputText.addEventListener('input', (event) => {
        // Останавливаем событие для того чтобы изменения все работали через blur
        event.stopPropagation();
    });

    STATE.elements.inputText.addEventListener('blur', (event) => {
        const inputValue = normalizeInputTextValue(STATE.elements.inputText.value)
        disableInputTextElement(STATE, inputValue);

        const customEvent = new CustomEvent('input', {
            detail: { value: STATE.value },
            bubbles: false
        });

        STATE.elements.root.dispatchEvent(customEvent);
    });
}

/**
 * Initializes a component for editing a number in a text input. The component
 * consists of a text input, an edit button and a close button. The user can edit
 * the number by clicking on the edit button. The component also supports a
 * "steps" mode, where the user can select a value from a predefined list of
 * values.
 *
 * @param {HTMLElement} sliderInputText - The root element of the component.
 * @param {Object} defaultValues - The default values for the component. The
 * object should have the following properties:
 *   - `value`: The initial value of the component.
 *   - `minValue`: The minimum value of the component.
 *   - `maxValue`: The maximum value of the component.
 *   - `stepSize`: The step size of the component.
 *   - `type`: The type of the component. Can be one of the following:
 *     - `price`: The component is for editing a price.
 *     - `count`: The component is for editing a count.
 *   - `useSteps`: A boolean indicating whether the component should use steps.
 *   - `steps`: An array of values that the user can select from.
 *
 * @return {Object} An object containing the state of the component and methods
 * for interacting with the component. The object has the following properties:
 *   - `value`: The current value of the component.
 *   - `setValue`: A function for setting the value of the component. The
 *     function takes a single argument, which is the value to set.
 */
const initInputSliderText = (sliderInputText, defaultValues) => {
    const STATE = initState(sliderInputText, defaultValues);
    initDefaultEventListeners(STATE);
    STATE.methods.setValue = (value) => setValueInputText(STATE, value, true);

    return STATE;
}

export default initInputSliderText;
