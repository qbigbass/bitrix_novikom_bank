import IMask from 'imask';
import type {
	ASliderInputTextActionClasses, ASliderInputTextDefaultValues, ASliderInputTextElements,
	ASliderInputTextJSClasses, ASliderInputTextState, IMaskCustomType
} from "@components/ui/ASliderInput/ASliderInputText/interfaces";
import {plural} from "@js/utils.ts";
import type {ASliderInputType} from "@components/ui/ASliderInput/interfaces";

export const ROOT_JS_CLASS: string = '.js-a-slider-input-text';

const JS_CLASSES: ASliderInputTextJSClasses = {
	root: ROOT_JS_CLASS,
	inputText: '.js-a-slider-input-text-input',
	editButton: '.js-a-slider-input-text-edit',
	closeButton: '.js-a-slider-input-text-close'
}

const ACTION_CLASSES: ASliderInputTextActionClasses = {
	isEditable: 'is-editable'
}

const initASliderInputText = (sliderInputText: HTMLDivElement, defaultValues: ASliderInputTextDefaultValues): ASliderInputTextState => {
	const STATE: ASliderInputTextState = initState(sliderInputText, defaultValues);
	initDefaultEventListeners(STATE);
	STATE.methods.setValue = (value: number) => setValueInputText(STATE, value, true);

	return STATE;
}

const setValueInputText = (STATE: ASliderInputTextState, value: number, outsideCall: boolean = false) => {
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

const initState = (root: HTMLDivElement, defaultValues: ASliderInputTextDefaultValues): ASliderInputTextState => {
	const elements = initElements(root, defaultValues);

	return {
		elements,
		disabled: true,
		methods: {
			setValue: (value: number) => {},
		},
		mask: initMaskInput(elements, defaultValues),
		...defaultValues
	}
}

const initMaskInput = (elements: ASliderInputTextElements, defaultValues: ASliderInputTextDefaultValues) => {
	const currentValue = defaultValues.useSteps ? defaultValues.steps[defaultValues.value] : defaultValues.value;
	let { options, value } = getMaskOptions(currentValue, defaultValues.type, true);

	const mask = IMask(elements.inputText, options) as IMaskCustomType;
	mask.value = value;

	return mask;
}

const initElements = (root: HTMLDivElement, defaultValues: ASliderInputTextDefaultValues): ASliderInputTextElements => {
	const inputText: HTMLInputElement | null = root.querySelector(JS_CLASSES.inputText);
	const editButton: HTMLButtonElement | null = root.querySelector(JS_CLASSES.editButton);
	const closeButton: HTMLButtonElement | null = root.querySelector(JS_CLASSES.closeButton);

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

const initDefaultEventListeners = (STATE: ASliderInputTextState) => {
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

const enableInputTextElement = (STATE: ASliderInputTextState) => {
	STATE.elements.root.classList.add(ACTION_CLASSES.isEditable);
	STATE.elements.inputText.removeAttribute('readonly');
	STATE.elements.inputText.removeAttribute('disabled');
	STATE.elements.inputText.focus();

	STATE.disabled = false;
	setValueInputText(STATE, STATE.value);
}

const disableInputTextElement = (STATE: ASliderInputTextState, value: number) => {
	STATE.elements.root.classList.remove(ACTION_CLASSES.isEditable);
	STATE.elements.inputText.setAttribute('readonly', '');
	STATE.elements.inputText.setAttribute('disabled', '');

	STATE.disabled = true;
	setValueInputText(STATE, value);
}

const updateMaskOptions = (mask: IMaskCustomType, options: any) => {
	if (mask.mask !== options.mask) {
		mask.updateOptions(options);
	}
}

const getMaskOptions = (value: number, type: ASliderInputType, disabled: boolean = false) => {
	let mask: string = '';
	let defaultValue: string = String(value);

	const defaultOptions: {
		lazy: boolean,
		mask: string,
		blocks: {
			num?: object,
			years?: object
			months?: object
		}
	} = {
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
				min: 0
			}
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

const getYearsAndMonth = (value: number) => {
	return {
		years: Math.floor(value / 12),
		months: value % 12
	}
}

const normalizeInputTextValue = (value: string) => {
	return parseInt(value.replace(/\s/g, ''));
}

const findIndexInRange = (arr: number[], target: number) => {
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

export default initASliderInputText;