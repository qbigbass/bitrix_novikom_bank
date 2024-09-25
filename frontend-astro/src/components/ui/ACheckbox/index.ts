import type {ACheckboxCustomEvent, ACheckboxState} from "@components/ui/ACheckbox/interfaces";

export const JS_CLASSES = {
	root: '.js-a-checkbox'
}

const initState = (checkbox: HTMLDivElement): ACheckboxState => {
	const checkboxEl: HTMLInputElement | null = checkbox.querySelector('input');

	return {
		root: checkbox,
		checkboxEl,
		checked: checkboxEl?.checked ?? false
	}
}

const initACheckbox = (checkbox: HTMLDivElement): ACheckboxState => {
	const STATE = initState(checkbox);

	if (STATE.root && STATE.checkboxEl) {
		STATE.checkboxEl.addEventListener('change', (event) => {
			event.stopPropagation();
			STATE.checked = STATE.checkboxEl?.checked ?? false

			const customEvent = new CustomEvent<ACheckboxCustomEvent>('change', {
				detail: {
					checked: STATE.checked,
				},
			});

			checkbox.dispatchEvent(customEvent);
		});
	} else {
		throw new Error('Не удалось инициализировать работу компонента ACheckbox');
	}

	return STATE;
}

export default initACheckbox