import type {ADropDownMenu, ADropDownMenuCustomEvent, ADropDownMenuState} from "../ADropDown/ADropDownMenu/interfaces";
import initADropDownMenu, { JS_CLASSES as JS_DROP_DOWN_MENU_CLASSES } from "@components/ui/ADropDown/ADropDownMenu";
import type { ASelectInputState } from "@components/ui/ASelectInput/interfaces";
import {closeAllOpenCurrencyInputs} from "@components/ui/ACurrencyInput";

export const JS_CLASSES = {
	root: '.js-select',
	input: '.js-select-input'
}

export const ACTION_CLASSES = {
	open: 'is-open'
}

export const closeAllOpenSelectInputs = () => {
	const openSelectInputs = ALL_SELECT.filter((selectInput) => selectInput.isOpen);

	if (openSelectInputs.length > 0) {
		openSelectInputs.forEach((selectInput) => {
			closeHandler(selectInput.root, selectInput.dropDownMenu?.root, selectInput);
		});
	}
}

const ALL_SELECT: Array<ASelectInputState> = [];

const openHandler = (
	selectInput: Element,
	dropDownMenu: ADropDownMenu | undefined,
	STATE: ASelectInputState
) => {
	dropDownMenu?.open();
	STATE.isOpen = true;
	selectInput.classList.add(ACTION_CLASSES.open);
	document.addEventListener('click', STATE.clickOutsideHandler);
}

const closeHandler = (
	selectInput: Element,
	dropDownMenu: ADropDownMenu | undefined,
	STATE: ASelectInputState
) => {
	dropDownMenu?.close();
	STATE.isOpen = false;
	selectInput.classList.remove(ACTION_CLASSES.open);
	setInputValue(STATE.value, STATE);
	document.removeEventListener('click', STATE.clickOutsideHandler);
};

const clickOutsideHandler = (
	event: MouseEvent,
	selectInput: Element,
	dropDownMenu: ADropDownMenu | undefined,
	STATE: ASelectInputState
) => {
	if (!selectInput.contains(event.target as Node)) {
		closeHandler(selectInput, dropDownMenu, STATE);
	}
};

const setInputValue = (value: string, STATE: ASelectInputState) => {
	if (STATE.inputEl && STATE.inputHidden) {
		STATE.selectedValues = value;
		STATE.value = value;
		STATE.inputHidden.value = value;

		if (value) {
			STATE.inputEl.textContent = value;
		}

	}
}

const initState = (selectInput: HTMLDivElement) => {
	const root = selectInput;
	const inputEl: HTMLDivElement | null = root?.querySelector(JS_CLASSES.input);
	const inputHidden: HTMLInputElement | null = root?.querySelector('input');
	const dropDownEl: HTMLDivElement | null = root?.querySelector(JS_DROP_DOWN_MENU_CLASSES.root);
	const dropDownMenu: ADropDownMenuState | null = dropDownEl ? initADropDownMenu(dropDownEl) : null;

	const STATE: ASelectInputState = {
		root,
		inputEl,
		inputHidden,
		dropDownMenu,
		isOpen: false,
		selectedValues: null,
		value: '',
		disabled: inputHidden?.disabled ?? false,
		clickOutsideHandler: (event: MouseEvent) => {}
	}

	STATE.clickOutsideHandler = (event: MouseEvent) => clickOutsideHandler(event, selectInput, STATE.dropDownMenu?.root, STATE);

	ALL_SELECT.push(STATE)
	return STATE;
}

const initSelectInput = (selectInput: HTMLDivElement): ASelectInputState => {
	const STATE: ASelectInputState = initState(selectInput);

	if (STATE.dropDownMenu !== null) {
		STATE.inputEl?.addEventListener('click', (event) => {
			event.stopPropagation();
			if (STATE.isOpen) {
				closeHandler(selectInput, STATE.dropDownMenu?.root, STATE);
			} else {
				closeAllOpenSelectInputs();
				closeAllOpenCurrencyInputs()
				openHandler(selectInput, STATE.dropDownMenu?.root, STATE);
			}
		});

		STATE.dropDownMenu.root?.addEventListener('selected', (event) => {
			const dropDownMenuCustomEvent = event as CustomEvent<ADropDownMenuCustomEvent>;

			setInputValue(dropDownMenuCustomEvent.detail.value, STATE);

			closeHandler(selectInput, STATE.dropDownMenu?.root, STATE);

			const customEvent = new CustomEvent('selected', {
				detail: {
					value: dropDownMenuCustomEvent.detail.value
				}
			});

			selectInput.dispatchEvent(customEvent);
		});

		STATE.inputHidden?.addEventListener('input', (event) => {
			return;
		});

		setInputValue(STATE.dropDownMenu.selectedItem?.value ?? '', STATE);
		return STATE;
	} else {
		throw new Error('Не удалось инициализировать работу компонента ACurrencyInput');
	}
}

export default initSelectInput;
