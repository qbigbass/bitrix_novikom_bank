import type {
  ADropDownMenu, ADropDownMenuChangedEvent,
  ADropDownMenuSelectedEvent,
  ADropDownMenuState
} from './interfaces';
import type {
  ADropDownItem,
  ADropDownItemCustomEvent
} from '@components/ui/ADropDown/ADropDownItem/interfaces';
import type {
  ADropDownCheckbox,
  ADropDownCheckboxEvent
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
}

const unsetSelectedItem = (STATE: ADropDownMenuState) => {
  STATE.selectedItem?.$state.methods.unselect();
}

const setSelectedItems = (STATE: ADropDownMenuState, item: ADropDownCheckbox) => {
  STATE.selectedItems.push(item);
}

const unsetSelectedItems = (STATE: ADropDownMenuState, item: ADropDownCheckbox) => {
  STATE.selectedItems = [...STATE.selectedItems].filter((s: ADropDownCheckbox) => s.$state.name !== item.$state.name);
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
		selectedItem: null,
    selectedItems: [],
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

      unsetSelectedItem(STATE);
			setSelectedItem(STATE, item);

			const customEvent = new CustomEvent<ADropDownMenuSelectedEvent>('selected', { detail });

			elements.root.dispatchEvent(customEvent);
		});

		if (item.$state.selected) {
			setSelectedItem(STATE, item);
		}
	});

  components.checkboxes?.forEach((item: ADropDownCheckbox) => {
    item.addEventListener('changed', (event) => {
      const { detail } = event as CustomEvent<ADropDownCheckboxEvent>

      if (detail.checked) {
        setSelectedItems(STATE, item);
      } else {
        unsetSelectedItems(STATE, item);
      }

      const customEvent = new CustomEvent<ADropDownMenuChangedEvent>('changed', {
        detail: { values: STATE.selectedItems}
      });

      elements.root.dispatchEvent(customEvent);
    });

    if (item.$state.checked) {
      setSelectedItems(STATE, item);
    }
  });

  const component = elements.root as ADropDownMenu;
  component['$state'] = STATE;
  return component;
}

export default initADropDownMenu;
