import type { ADropDownMenu, ADropDownMenuCustomEvent, ADropDownMenuState } from './interfaces';
import type { ADropDownItemCustomEvent, ADropDownItemState } from '@components/ui/ADropDown/ADropDownItem/interfaces';

import initDropDownButton, {JS_CLASSES as JS_BUTTON_CLASSES} from '@components/ui/ADropDown/ADropDownItem'

export const JS_CLASSES = {
	root: '.js-a-drop-down'
}

const ACTION_CLASSES = {
	open: 'is-open'
}

const openHandler = (STATE: ADropDownMenuState, rect: DOMRect) => {
  setPositionHandler(STATE, rect);

	STATE.elements.root.classList.add(ACTION_CLASSES.open);
	STATE.isOpen = true;
}

const setPositionHandler = (STATE: ADropDownMenuState, rect: DOMRect) => {
  STATE.elements.root.style.position = 'absolute';
  STATE.elements.root.style.top = `${rect.bottom + window.scrollY}px`;
  STATE.elements.root.style.left = `${rect.left + window.scrollX}px`;
  STATE.elements.root.style.width = `${rect.width}px`;
}

const closeHandler = (STATE: ADropDownMenuState) => {
	STATE.elements.root.classList.remove(ACTION_CLASSES.open);
	STATE.elements.root.removeAttribute('style')
	STATE.isOpen = false;
}

const setSelectedItem = (STATE: ADropDownMenuState, item: ADropDownItemState) => {
	STATE.selectedItem = item;
	STATE.currentValue = item.value;
}

const initState = (element: HTMLDivElement): ADropDownMenuState => {
	const root = element as ADropDownMenu;
  const dropDownItems: NodeListOf<HTMLDivElement | HTMLLinkElement> = element?.querySelectorAll(JS_BUTTON_CLASSES.root);
  let items: ADropDownItemState[] = [];

  dropDownItems.forEach((item) => {
    const dropDownButton = initDropDownButton(item);
    items.push(dropDownButton);
  });

	return {
    elements: {
      root,
    },
    components: {
      items
    },
		isOpen: false,
		currentValue: '',
		selectedItem: null,
    methods: {
      open: (rect) => {},
      close: () => {},
      setPosition: (rect) => {}
    }
	}
}

const initADropDownMenu = (element: HTMLDivElement): ADropDownMenuState => {
	const STATE = initState(element);

	STATE.methods.open = (rect) => openHandler(STATE, rect);
	STATE.methods.close = () => closeHandler(STATE);
  STATE.methods.setPosition = (rect) => setPositionHandler(STATE, rect);

	STATE.components.items.forEach((item: ADropDownItemState) => {
		item.elements.root.addEventListener('select', (event) => {
			const { detail } = event as CustomEvent<ADropDownItemCustomEvent>;
			STATE.selectedItem?.methods.unselect();

			setSelectedItem(STATE, item);

			const customEvent = new CustomEvent<ADropDownMenuCustomEvent>('selected', { detail });

			STATE.elements.root.dispatchEvent(customEvent);
		});

		if (item.selected) {
			setSelectedItem(STATE, item);
		}
	});

	return STATE;
}

export default initADropDownMenu;
