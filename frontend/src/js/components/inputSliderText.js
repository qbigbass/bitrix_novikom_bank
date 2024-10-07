import IMask from 'imask';
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

const updateMaskOptions = (mask, options) => {
    if (mask.mask !== options.mask) {
        mask.updateOptions(options);
    }
}

const getYearsAndMonth = (value) => {
    return {
        years: Math.floor(value / 12),
        months: value % 12
    }
}

const normalizeInputTextValue = (value) => {
    return parseInt(value.replace(/\s/g, ''));
}

const getMaskOptions = (value, type, disabled = false) => {
    let mask = '';
    let defaultValue = String(value);

    const defaultOptions = {
        lazy: false,
        mask: '',
        blocks: {}
    }

    switch (type) {
        case 'price':
            mask = 'num ₽';
            defaultOptions.blocks['num'] = {
                mask: Number,
                thousandsSeparator: ' ',
                min: 0,
            }
            // defaultOptions.format = (value) => `${value} <span class="currency">₽</span>`;
            break;
        case 'day':
            mask = `num ${plural(['день', 'дня', 'дней'], value)}`;
            defaultOptions.blocks['num'] = {
                mask: Number,
                thousandsSeparator: ' ',
                min: 0
            }
            break;
        case 'month':
            if (!disabled) {
                const pluralWord = plural(['месяц', 'месяца', 'месяцев'], value);
                mask = `num ${ pluralWord }`;

                defaultOptions.blocks['num'] = {
                    mask: Number,
                    thousandsSeparator: ' ',
                    min: 1
                }
            } else {
                const { years, months } = getYearsAndMonth(value);

                if (years >= 1) {
                    mask = `years ${plural(['год', 'года', 'лет'], years)}`;

                    defaultOptions.blocks['years'] = {
                        mask: Number,
                        thousandsSeparator: ' ',
                        min: 0,
                        max: 5
                    }

                    if (months > 0) {
                        mask += ` months ${plural(['месяц', 'месяца', 'месяцев'], months)}`

                        defaultOptions.blocks['months'] = {
                            mask: Number,
                            thousandsSeparator: ' ',
                            min: 1,
                            max: 11
                        }
                    }
                } else {
                    mask = `months ${plural(['месяц', 'месяца', 'месяцев'], months)}`;

                    defaultOptions.blocks['months'] = {
                        mask: Number,
                        thousandsSeparator: ' ',
                        min: 1,
                        max: 11
                    }
                }

                defaultValue = `${years}${months}`;
            }

            break;
    }

    defaultOptions.mask = mask;

    return { options: defaultOptions, value: defaultValue };
}


const setValueInputText = (STATE, value, outsideCall = false) => {
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
    const { options, value: maskValue } = getMaskOptions(currentValue, STATE.type, STATE.disabled);

    updateMaskOptions(STATE.mask, options);

    STATE.elements.inputText.setAttribute('value', maskValue);
    STATE.elements.inputText.value = maskValue;
    STATE.mask.value = maskValue;
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

const initMaskInput = (elements, defaultValues) => {
    const currentValue = defaultValues.useSteps ? defaultValues.steps[defaultValues.value] : defaultValues.value;
    let { options, value } = getMaskOptions(currentValue, defaultValues.type, true);

    const mask = IMask(elements.inputText, options);
    // const mask = elements.inputText;
    mask.value = value;

    return mask;
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
    setValueInputText(STATE, STATE.value);
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
        //Останавливаем событие для того чтобы изменения все работали через blur
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

const initInputSliderText = (sliderInputText, defaultValues) => {
    const STATE = initState(sliderInputText, defaultValues);
    initDefaultEventListeners(STATE);
    STATE.methods.setValue = (value) => setValueInputText(STATE, value, true);

    return STATE;
}

export default initInputSliderText;
