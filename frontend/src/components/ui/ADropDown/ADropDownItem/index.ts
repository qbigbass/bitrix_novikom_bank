import type {
  ADropDownItem,
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
  STATE.elements.root.setAttribute('aria-selected', 'true');
  STATE.selected = true;

  const customEvent: CustomEvent<ADropDownItemCustomEvent> = new CustomEvent('selected', {
    detail: {
      value: STATE.value,
      displayValue: STATE.displayValue
    }
  });

  STATE.elements.root.dispatchEvent(customEvent);
}

const unselectHandler = (STATE: ADropDownItemState) => {
  STATE.selected = false;
  STATE.elements.root.setAttribute('aria-selected', 'false');
}

const initADropDownItem = (element: HTMLDivElement | HTMLLinkElement): ADropDownItem | null => {
  try {
    const STATE: ADropDownItemState = initState(element);

    STATE.methods.select = () => selectHandler(STATE);
    STATE.methods.unselect= () => unselectHandler(STATE);

    STATE.elements.root.addEventListener('click', () => {
      if (!STATE.selected) {
        selectHandler(STATE);
      }
    });

    const component = (STATE.elements.root as ADropDownItem);
    component['$state'] = STATE;
    return component;
  } catch (e) {
    console.error(e);
    return null;
  }
}

export default initADropDownItem;
