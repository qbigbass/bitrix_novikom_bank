import type { ADropDownMenu, ADropDownMenuCustomEvent, ADropDownMenuState } from './interfaces';
import type { ADropDownButtonCustomEvent, ADropDownButtonState } from '@components/ui/ADropDown/ADropDownButton/interfaces';

import initDropDownButton, {JS_CLASSES as JS_BUTTON_CLASSES} from '@components/ui/ADropDown/ADropDownButton'

export const JS_CLASSES = {
	root: '.js-a-drop-down'
}

const ACTION_CLASSES = {
	open: 'is-open'
}

const openHandler = (STATE: ADropDownMenuState,
) => {
	STATE.root.classList.add(ACTION_CLASSES.open);
	STATE.isOpen = true;
}

const closeHandler = (STATE: ADropDownMenuState) => {
	STATE.root.classList.remove(ACTION_CLASSES.open);
	STATE.isOpen = false;
}

const setSelectedItem = (STATE: ADropDownMenuState, item: ADropDownButtonState) => {
	STATE.selectedItem = item;
	STATE.currentValue = item.value;
}

const initState = (element: HTMLDivElement): ADropDownMenuState => {
	const dropDown = element as ADropDownMenu;

	return {
		isOpen: false,
		currentValue: '',
		selectedItem: null,
		root: dropDown,
		buttons: element?.querySelectorAll(JS_BUTTON_CLASSES.root),
		items: [],
	}
}

const initADropDownMenu = (element: HTMLDivElement): ADropDownMenuState => {
	const STATE = initState(element);

	STATE.root['open'] = () => openHandler(STATE);
	STATE.root['close'] = () => closeHandler(STATE);

	STATE.buttons.forEach((button: HTMLButtonElement) => {
		const dropDownButton = initDropDownButton(button) as ADropDownButtonState;
		STATE.items.push(dropDownButton);
	});

	STATE.items.forEach((item: ADropDownButtonState) => {
		item.button?.addEventListener('select', (event) => {
			const buttonEvent = event as CustomEvent<ADropDownButtonCustomEvent>;

			if (STATE.selectedItem !== null) {
				STATE.selectedItem.button.unselect();
			}

			setSelectedItem(STATE, item);

			const customEvent = new CustomEvent<ADropDownMenuCustomEvent>('selected', {
				detail: {
					value: buttonEvent.detail.value
				}
			});

			STATE.root.dispatchEvent(customEvent);
		});

		if (item.selected) {
			setSelectedItem(STATE, item);
		}
	});

	return STATE;
}

export default initADropDownMenu;