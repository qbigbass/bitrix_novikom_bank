import IMask from "imask";
import { VALIDATION_ERRORS, INPUT_MASKS } from "../../../js/constants.ts";
import { isEmail, isPhone, notEmpty } from "../../../js/validations.ts";

interface IInput extends HTMLInputElement {
	isValid: boolean;
	validationRules: string[];
}

export const JS_CLASSES = {
	root: '.js-a-input'
}

const ROOT_CLASSES = {
	root: 'a-input'
}

enum CLASSES_STATES {
	ERROR = 'error',
	VALID = 'valid',
	FOCUSED = 'focused',
	DISABLED = 'disabled'
}

const createStatusInput = (status: CLASSES_STATES): string => {
	return `${ROOT_CLASSES.root}--${status}`;
}

const validateInput = (input: IInput): string[] => {
	let errors: string[] = [];

	input.validationRules.forEach((rule) => {
		switch (rule) {
			case 'notEmpty':
				if (!notEmpty(input.value)) {
					errors.push(VALIDATION_ERRORS.notEmpty)
				}
				break;
			case 'isEmail':
				if (!isEmail(input.value)) {
					errors.push(VALIDATION_ERRORS.isEmail)
				}
				break;
			case 'isPhone':
				if (!isPhone(input.value)) {
					errors.push(VALIDATION_ERRORS.isPhone)
				}
				break;
		}
	});

	input.isValid = !Boolean(errors.length);

	return errors;
};

const toggleErrorInput = (inputWrapper: HTMLElement, boolean: boolean) => {
	inputWrapper.classList.toggle(createStatusInput(CLASSES_STATES.ERROR), boolean);
	//TODO возможно в будущем тут можно будет написать создание текстовой ошибки у input
}

const toggleValidInput = (inputWrapper: HTMLElement, boolean: boolean) => {
	inputWrapper.classList.toggle(createStatusInput(CLASSES_STATES.VALID), boolean);
	//TODO возможно в будущем тут можно будет написать удаление текстовой ошибки у input
}

const validate = (inputWrapper: HTMLElement, input: IInput) => {
	const validationErrors = validateInput(input);
	const hasError = Boolean(validationErrors.length);
	toggleErrorInput(inputWrapper, hasError);
	toggleValidInput(inputWrapper, !hasError);

	input.dispatchEvent(new CustomEvent('validate', {
		detail: {
			errors: validationErrors,
			isValid: !hasError
		},
		bubbles: true,
		cancelable: true,
		composed: true
	}));
}

const initAInput = (inputWrapper: HTMLElement) => {
	const input = inputWrapper.querySelector('input') as IInput;

	const { validations, mask } = input.dataset as any;

	inputWrapper.classList.toggle(createStatusInput(CLASSES_STATES.DISABLED), input.disabled);

	const validationRules = validations?.split(',') ?? [];

	if (validations && validationRules.length) {
		input.validationRules = validationRules;

		input.addEventListener('focusin', () => {
			inputWrapper.classList.add(createStatusInput(CLASSES_STATES.FOCUSED));

			if (input?.isValid === false) {
				toggleErrorInput(inputWrapper, false);
			}
		});

		input.addEventListener('focusout', () => {
			inputWrapper.classList.remove(createStatusInput(CLASSES_STATES.FOCUSED));
		});

		input.addEventListener('blur', () => {
			validate(inputWrapper, input);
		});
	}

	if (mask) {
		const pattern = INPUT_MASKS[mask];

		if (pattern) {
			const maskOptions = {
				mask: pattern
			};

			IMask(input, maskOptions);
		} else {
			console.warn(`Маска: ${mask} не была инициализирована. Маска не найдена!`);
		}
	}

	return {
		inputWrapper,
		input,
		validate: () => validate(inputWrapper, input)
	};
}

export default initAInput;
