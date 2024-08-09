import type {
	ASliderInputDefaultValues,
	ASliderInputElements,
	ASliderInputState,
	JSClasses,
	ASliderInputType,
	AInputDataAttrs
} from "@components/ui/ASliderInput/interfaces";
import { formatNumberWithSpaces, plural } from "@js/utils.ts";
import { ROOT_JS_CLASS as ROOT_ASIT_JS_CLASS } from "@components/ui/ASliderInput/ASliderInputText";
import initASliderInputText from "./ASliderInputText";

export const JS_CLASSES: JSClasses = {
	root: '.js-a-slider-input',
	displayValue: '.js-a-slider-input-display-value',
	textSteps: '.js-a-slider-input-text-steps',
	innerInput: '.js-a-slider-input-inner',
	textInput: ROOT_ASIT_JS_CLASS,
	sliderInput: '.js-a-slider-input-slider',
}

const DATA_ATTRS: AInputDataAttrs = {
	dataStartValue: 'data-start-value',
	dataMinValue: 'data-min-value',
	dataMaxValue: 'data-max-value',
	dataStepSize: 'data-step-size',
	dataType: 'data-type',
	dataSteps: 'data-steps',
}

const initASliderInput = (sliderInput: HTMLDivElement) => {
	try {
		const STATE: ASliderInputState = initState(sliderInput);
		initSliderInputAttrs(STATE);
		initDisplaySteps(STATE);
		initResizeObserverForRootElement(STATE);
		setValue(STATE, STATE.value);
		initASliderInputTextComponent(STATE);

		STATE.elements.sliderInput.addEventListener('input', function (event) {
			event.stopPropagation();

			setValue(STATE, Number(this.value));

			STATE.components.inputText?.methods.setValue(STATE.value);
		});

		STATE.components.inputText?.elements.root.addEventListener('input', (event) => {
			event.stopPropagation();
			const customEvent = event as CustomEvent<{value: number}>;
			setValue(STATE, customEvent.detail.value);
		});

		return STATE;
	} catch (e) {
		console.error(e);
	}
}

const setValue = (STATE: ASliderInputState, value: number) => {
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

const initState = (sliderInput: HTMLDivElement): ASliderInputState => {
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

const initElements = (root: HTMLDivElement): ASliderInputElements => {
	const sliderInput: HTMLInputElement | null = root.querySelector(JS_CLASSES.sliderInput);
	const innerInput: HTMLDivElement | null = root.querySelector(JS_CLASSES.innerInput);

	if (!sliderInput || !innerInput) {
		throw new Error(`Не найдены следующие элементы: ${JS_CLASSES.innerInput} или ${JS_CLASSES.sliderInput}`);
	}

	const displayValue: HTMLDivElement | null = root.querySelector(JS_CLASSES.displayValue);
	const textInput: HTMLInputElement | null = root.querySelector(JS_CLASSES.textInput);
	const textStepsContainer: HTMLDivElement | null = root.querySelector(JS_CLASSES.textSteps)
	const steps: Array<HTMLSpanElement | null> = [];
	const textSteps: Array<HTMLSpanElement | null> = [];

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

const initDefaultValues = (root: HTMLDivElement): ASliderInputDefaultValues => {
	let value: number = Number(root.getAttribute(DATA_ATTRS.dataStartValue) ?? 0);
	let minValue: number = Number(root.getAttribute(DATA_ATTRS.dataMinValue) ?? 0);
	let maxValue: number = Number(root.getAttribute(DATA_ATTRS.dataMaxValue) ?? 100);
	let stepSize: number = Number(root.getAttribute(DATA_ATTRS.dataStepSize) ?? 1);
	let type: ASliderInputType = root?.getAttribute(DATA_ATTRS.dataType) as ASliderInputType ?? 'price'

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

const initSliderInputAttrs = (STATE: ASliderInputState) => {
	STATE.elements.sliderInput.setAttribute('value', String(STATE.value));
	STATE.elements.sliderInput.setAttribute('step', String(STATE.stepSize));
	STATE.elements.sliderInput.setAttribute('max', String(STATE.maxValue));
	STATE.elements.sliderInput.setAttribute('min', String(STATE.minValue));
}

const initDisplaySteps = (STATE: ASliderInputState) => {
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
		const values: number[] = [STATE.minValue, STATE.maxValue];

		values.forEach((value: number) => {
			const textStepContent = getFormatedTextByType(value, STATE.type);
			const textStepElement = createTextStepElement(textStepContent);

			STATE.elements.textStepsContainer?.append(textStepElement);
			STATE.elements.textSteps.push(textStepElement);
		});
	}
}

const getFormatedTextByType = (value: number, type: ASliderInputType): string => {
	let result = '';

	switch (type) {
		case 'price':
			result = formatNumberWithSpaces(value) + ' ₽';
			break;
		case 'month':
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

			break;
		case 'day':
			result = `${formatNumberWithSpaces(value)} ${plural(['день', 'дня', 'дней'], value)}`;
			break;
	}

	return result;
}

const createTextStepElement = (text: string) => {
	const span = document.createElement('span');
	span.classList.add('a-slider-input-text-step', 'body-s-light', 'dark-70');
	span.textContent = text;

	return span;
}

const calculatePercent = (STATE: ASliderInputState, value: number) => {
	const thumbWidth = 24;
	const trackWidth = STATE.elements.root.offsetWidth;
	const thumbPercent = (thumbWidth / trackWidth) * 100;

	const usableRange = 100 - thumbPercent;
	const percentage = ((value - STATE.minValue) / (STATE.maxValue - STATE.minValue)) * usableRange + thumbPercent / 2;

	return Math.max(0, Math.min(100, percentage));
}

const createStepElement = (leftPercent: number) => {
	const span = document.createElement('span');
	span.classList.add('a-slider-input-step');
	span.style.left = `${leftPercent}%`;

	return span;
}

const initResizeObserverForRootElement = (STATE: ASliderInputState) => {
	const resizeObserver = new ResizeObserver((entries) => {
		setBackgroundSliderInputElement(STATE);
		setPositionStepElements(STATE);
	});

	resizeObserver.observe(STATE.elements.root);
}

const setBackgroundSliderInputElement = (STATE: ASliderInputState) => {
	const percentage = calculatePercent(STATE, STATE.value);
	STATE.elements.sliderInput!.style.background = `linear-gradient(to right, var(--blue-100) ${percentage}%, var(--blue-30) ${percentage}%)`;
}

const setPositionStepElements = (STATE: ASliderInputState) => {
	STATE.elements.steps.forEach((step, index) => {
		if (!step) return;
		const leftPercent = calculatePercent(STATE, index);
		step.style.left = `${leftPercent}%`;
	})
}

const setTextContentToDisplayValueElement = (STATE: ASliderInputState) => {
	let value = STATE.useSteps ? STATE.steps[STATE.value] : STATE.value;

	if (STATE.elements.displayValue) {
		STATE.elements.displayValue.textContent = getFormatedTextByType(value, STATE.type);
	}
}

const setSliderInputValue = (STATE: ASliderInputState, value: number) => {
	const stringValue = String(value);
	STATE.value = value;
	STATE.elements.sliderInput.value = stringValue;
	STATE.elements.sliderInput.setAttribute('value', stringValue);
}

const generateStepsFromAttrs = (attr: string) => {
	if (attr.length > 0) {
		return attr.split(',')?.map((step) => Number(step)) ?? [];
	} else {
		return [];
	}
}

const setBackgroundStepElements = (STATE: ASliderInputState) => {
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

const initASliderInputTextComponent = (STATE: ASliderInputState) => {
	if (STATE.elements.textInput) {
		STATE.components.inputText = initASliderInputText(STATE.elements.textInput, {
			minValue: STATE.minValue,
			maxValue: STATE.maxValue,
			value: STATE.value,
			type: STATE.type,
			useSteps: STATE.useSteps,
			steps: STATE.steps
		});
	}
}

export default initASliderInput