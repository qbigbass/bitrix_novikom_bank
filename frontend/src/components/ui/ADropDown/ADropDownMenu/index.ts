import type {
  ADropDownMenu,
  ADropDownMenuCustomEvent,
  ADropDownMenuState
} from './interfaces';
import type {
  ADropDownItem,
  ADropDownItemCustomEvent,
  ADropDownItemState
} from '@components/ui/ADropDown/ADropDownItem/interfaces';
import type {
  ADropDownCheckbox,
  ADropDownCheckboxEvent,
  ADropDownCheckboxState
} from "@components/ui/ADropDown/ADropDownCheckbox/interfaces";
import initADropDownItem, { JS_CLASSES as JS_ITEM_CLASSES } from '@components/ui/ADropDown/ADropDownItem';
import initADropDownCheckbox, { JS_CLASSES as JS_CHECKBOX_CLASSES } from "@components/ui/ADropDown/ADropDownCheckbox";

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

const setSelectedItem = (STATE: ADropDownMenuState, item: ADropDownItem) => {
	STATE.selectedItem = item;
	STATE.currentValue = item.$state!.value;
}

const initState = (element: HTMLDivElement): ADropDownMenuState => {
	const root = element;
  const dropDownItemElements: NodeListOf<HTMLDivElement | HTMLLinkElement> = element?.querySelectorAll(JS_ITEM_CLASSES.root);
  const dropDownCheckboxElements: NodeListOf<HTMLDivElement> = element?.querySelectorAll(JS_CHECKBOX_CLASSES.root);
  let items: ADropDownItem[] = [];
  let checkboxes: ADropDownCheckbox[] = [];

  dropDownItemElements.forEach((item) => {
    const component = initADropDownItem(item);
    if (component) {
      items.push(component);
    } else {
      console.warn('Не удалось инициализировать компонент ADropDownItem: ', item);
    }
  });

  dropDownCheckboxElements.forEach((checkbox) => {
    const component = initADropDownCheckbox(checkbox);
    if (component) {
      checkboxes.push(component);
    } else {
      console.warn('Не удалось инициализировать компонент ADropDownCheckbox: ', checkbox);
    }
  });

	return {
    elements: {
      root,
    },
    components: {
      items,
      checkboxes
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

const initADropDownMenu = (element: HTMLDivElement): ADropDownMenu => {
	const STATE = initState(element);
  const { components, elements } = STATE;

	STATE.methods.open = (rect) => openHandler(STATE, rect);
	STATE.methods.close = () => closeHandler(STATE);
  STATE.methods.setPosition = (rect) => setPositionHandler(STATE, rect);

  components.items?.forEach((item: ADropDownItem) => {
		item.addEventListener('selected', (event) => {
			const { detail } = event as CustomEvent<ADropDownItemCustomEvent>;
			STATE.selectedItem?.$state?.methods.unselect();

			setSelectedItem(STATE, item);

			const customEvent = new CustomEvent<ADropDownMenuCustomEvent>('selected', { detail });

			elements.root.dispatchEvent(customEvent);
		});

		if (item.$state?.selected) {
			setSelectedItem(STATE, item);
		}
	});

  components.checkboxes?.forEach((item: ADropDownCheckbox) => {
    item.addEventListener('changed', (event) => {
      const { detail } = event as CustomEvent<ADropDownCheckboxEvent>

      const customEvent = new CustomEvent<ADropDownCheckboxEvent>('changed', { detail });

      elements.root.dispatchEvent(customEvent);
    });
  });

  const component = elements.root as ADropDownMenu;
  component['$state'] = STATE;
  return component;
}

export default initADropDownMenu;
