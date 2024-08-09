import type {ADropDownMenu, ADropDownMenuCustomEvent, ADropDownMenuState} from "../ADropDown/ADropDownMenu/interfaces";
import type { ACurrencyInputState } from "./interfaces";
import initADropDownMenu, { JS_CLASSES as JS_DROP_DOWN_MENU_CLASSES } from "@components/ui/ADropDown/ADropDownMenu";

//TODO В будущем скорее всего необходимо будет добавить методы:
// 1) Перерисовка DropDownMenu и его элементов
// 2) Отрисовка ошибки
// 3) Отрисовка подсказки
// 4) отрисовка ошибки вместо подсказки

export const JS_CLASSES = {
	root: '.js-a-currency-input',
	button: '.js-a-currency-input-button',
	buttonText: '.js-a-currency-input-button-text'
}

const ACTION_CLASSES = {
	open: 'is-open'
}

const openHandler = (
	currencyInput: Element,
	dropDownMenu: ADropDownMenu | undefined,
	STATE: ACurrencyInputState
) => {
	dropDownMenu?.open();
	STATE.isOpen = true;
	currencyInput.classList.add(ACTION_CLASSES.open);
	document.addEventListener('click', STATE.clickOutsideHandler);
};

const closeHandler = (
	currencyInput: Element,
	dropDownMenu: ADropDownMenu | undefined,
	STATE: ACurrencyInputState
) => {
	dropDownMenu?.close();
	STATE.isOpen = false;
	currencyInput.classList.remove(ACTION_CLASSES.open);
	document.removeEventListener('click', STATE.clickOutsideHandler);
};

const clickOutsideHandler = (
	event: MouseEvent,
	currencyInput: Element,
	dropDownMenu: ADropDownMenu | undefined,
	STATE: ACurrencyInputState
) => {
	if (!currencyInput.contains(event.target as Node)) {
		closeHandler(currencyInput, dropDownMenu, STATE);
	}
};

const setButtonText = (STATE: ACurrencyInputState, text: string) => {
	if (STATE.buttonTextEl) {
		STATE.buttonTextEl.innerHTML = text;
	}
}

const initState = (currencyInput: HTMLDivElement) => {
	const root = currencyInput;
	const inputEl: HTMLInputElement | null = root?.querySelector('input');
	const buttonEl: HTMLButtonElement | null = root?.querySelector(JS_CLASSES.button);
	const dropDownEl: HTMLDivElement | null = root?.querySelector(JS_DROP_DOWN_MENU_CLASSES.root);
	const dropDownMenu: ADropDownMenuState | null = dropDownEl ? initADropDownMenu(dropDownEl) : null;

	const STATE: ACurrencyInputState = {
		root,
		inputEl,
		dropDownMenu,
		buttonEl,
		buttonTextEl: buttonEl?.querySelector(JS_CLASSES.buttonText),
		isOpen: false,
		selectedCurrency: null,
		value: '',
		disabled: inputEl?.disabled ?? false,
		clickOutsideHandler: (event: MouseEvent) => {}
	}

	STATE.clickOutsideHandler = (event: MouseEvent) => clickOutsideHandler(event, currencyInput, STATE.dropDownMenu?.root, STATE)

	return STATE;
}

const initACurrencyInput = (currencyInput: HTMLDivElement): ACurrencyInputState => {
	const STATE: ACurrencyInputState = initState(currencyInput);

	if (STATE.dropDownMenu !== null) {
		STATE.buttonEl?.addEventListener('click', (event) => {
			event.stopPropagation();
			if (STATE.isOpen) {
				closeHandler(currencyInput, STATE.dropDownMenu?.root, STATE);
			} else {
				openHandler(currencyInput, STATE.dropDownMenu?.root, STATE);
			}
		});

		STATE.inputEl?.addEventListener('click', (event) => {
			if (STATE.isOpen) {
				event.stopPropagation();
				closeHandler(currencyInput, STATE.dropDownMenu?.root, STATE);
			}
		});

		STATE.dropDownMenu.root?.addEventListener('selected', (event) => {
			const dropDownMenuCustomEvent = event as CustomEvent<ADropDownMenuCustomEvent>;

			if (STATE.buttonTextEl) {
				setButtonText(STATE, String(dropDownMenuCustomEvent.detail.value));
			}

			STATE.selectedCurrency = dropDownMenuCustomEvent.detail.value;

			closeHandler(currencyInput, STATE.dropDownMenu?.root, STATE);

			const customEvent = new CustomEvent('selected', {
				detail: {
					value: dropDownMenuCustomEvent.detail.value
				}
			});

			currencyInput.dispatchEvent(customEvent);
		});

		STATE.inputEl?.addEventListener('input', (event) => {
			event.stopPropagation();

			STATE.value = STATE.inputEl?.value ?? '';

			const customEvent = new CustomEvent('input', {
				detail: {
					value: STATE.inputEl?.value
				}
			});

			currencyInput.dispatchEvent(customEvent);
		});

		setButtonText(STATE, String(STATE.dropDownMenu.selectedItem?.value));
		STATE.selectedCurrency = STATE.dropDownMenu.selectedItem?.value;

		return STATE;
	} else {
		throw new Error('Не удалось инициализировать работу компонента ACurrencyInput');
	}
}

export default initACurrencyInput;