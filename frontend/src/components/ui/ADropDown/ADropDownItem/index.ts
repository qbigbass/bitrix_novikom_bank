import type {
	ADropDownItemCustomEvent,
	ADropDownItemState
} from './interfaces';

export const JS_CLASSES = {
	root: '.js-a-drop-down-item'
}

const initState = (root: HTMLDivElement | HTMLLinkElement): ADropDownItemState => {
	return {
    elements: {
      root
    },
		selected: root.getAttribute('aria-selected') === 'true',
		value: root.getAttribute('data-value') ?? '',
		displayValue: root.getAttribute('data-display-value') ?? '',
    methods: {
      select: () => {},
      unselect: () => {}
    }
	}
}

const selectHandler = (STATE: ADropDownItemState) => {
	if (STATE.elements.root !== null) {
		STATE.elements.root.setAttribute('aria-selected', 'true');
		STATE.selected = true;

		const customEvent: CustomEvent<ADropDownItemCustomEvent> = new CustomEvent('select', {
			detail: {
				value: STATE.value,
        displayValue: STATE.displayValue
			}
		});

    STATE.elements.root.dispatchEvent(customEvent);
	}
}

const unselectHandler = (STATE: ADropDownItemState) => {
	if (STATE.elements.root !== null) {
		STATE.selected = false;
    STATE.elements.root.setAttribute('aria-selected', 'false');
	}
}

const initDropDownItem = (element: HTMLDivElement | HTMLLinkElement): ADropDownItemState => {
	const STATE: ADropDownItemState = initState(element);

  STATE.methods.select = () => selectHandler(STATE);
  STATE.methods.unselect= () => unselectHandler(STATE);

  STATE.elements.root.addEventListener('click', () => {
		if (!STATE.selected) {
			selectHandler(STATE);
		}
	});

	return STATE;
}

export default initDropDownItem;
