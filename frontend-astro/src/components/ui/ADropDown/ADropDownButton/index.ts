import type {
	ADropDownButton,
	ADropDownButtonCustomEvent,
	ADropDownButtonState
} from './interfaces';

export const JS_CLASSES = {
	root: '.js-a-drop-down-button'
}

const initState = (button: ADropDownButton): ADropDownButtonState => {
	return {
		button,
		selected: button.getAttribute('aria-selected') === 'true',
		value: button.getAttribute('data-value') ?? ''
	}
}

const selectHandler = (STATE: ADropDownButtonState) => {
	if (STATE.button !== null) {
		STATE.button.setAttribute('aria-selected', 'true');
		STATE.selected = true;

		const customEvent: CustomEvent<ADropDownButtonCustomEvent> = new CustomEvent('select', {
			detail: {
				value: STATE.value
			}
		});

		STATE.button.dispatchEvent(customEvent);
	}
}

const unselectHandler = (STATE: ADropDownButtonState) => {
	if (STATE.button !== null) {
		STATE.selected = false;
		STATE.button.setAttribute('aria-selected', 'false');
	}
}

const initDropDownButton = (button: HTMLButtonElement): ADropDownButtonState => {
	const dropDownButton = button as ADropDownButton;

	const STATE: ADropDownButtonState = initState(dropDownButton)

	initState(dropDownButton);

	STATE.button['select'] = () => selectHandler(STATE);
	STATE.button['unselect'] = () => unselectHandler(STATE);

	STATE.button.addEventListener('click', () => {
		if (!STATE.selected) {
			selectHandler(STATE);
		}
	});

	return STATE;
}

export default initDropDownButton;
