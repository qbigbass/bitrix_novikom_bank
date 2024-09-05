import type {ADropDownMenuChangedEvent, ADropDownMenuSelectedEvent} from "../ADropDown/ADropDownMenu/interfaces";
import initADropDownMenu, { JS_CLASSES as JS_DROP_DOWN_MENU_CLASSES } from "@components/ui/ADropDown/ADropDownMenu";
import type { ASelectInput, ASelectInputState } from "@components/ui/ASelectInput/interfaces";
import type {ADropDownCheckbox} from "@components/ui/ADropDown/ADropDownCheckbox/interfaces";

export const JS_CLASSES = {
  root: '.js-a-select-input',
  innerEl: '.js-a-select-input-inner',
  buttonEl: '.js-select-input-button',
  placeholder: '.js-select-input-placeholder'
}

export const ACTION_CLASSES = {
  open: 'is-open'
}

const openHandler = (STATE: ASelectInputState) => {
  document.body.append(STATE.components.dropDownMenu!);
  const rect = STATE.elements.innerEl!.getBoundingClientRect();
  STATE.components.dropDownMenu.$state.methods.open(rect);
  STATE.isOpen = true;
  STATE.elements.root.classList.add(ACTION_CLASSES.open);
  document.addEventListener('click', STATE.clickOutsideHandler);
}

const closeHandler = (STATE: ASelectInputState) => {
  STATE.components.dropDownMenu.$state.methods.close();
  STATE.isOpen = false;
  STATE.elements.root.classList.remove(ACTION_CLASSES.open);
  STATE.elements.root.append(STATE.components.dropDownMenu);
  document.removeEventListener('click', STATE.clickOutsideHandler);
};

const clickOutsideHandler = (
  event: MouseEvent,
  STATE: ASelectInputState
) => {
  if (
    !STATE.elements.root.contains(event.target as Node)
    && !STATE.components.dropDownMenu.contains(event.target as Node)
  ) {
    closeHandler(STATE);
  }
};

const setInputValueByItemComponent = (
  { value, displayValue }: { value: string; displayValue: string },
  STATE: ASelectInputState
) => {
  if (STATE.elements.buttonEl && STATE.elements.inputHidden) {
    STATE.value = value;
    STATE.displayValue = displayValue;
    STATE.elements.inputHidden.value = value;
    STATE.elements.inputHidden.setAttribute('value', value);

    if (value) {
      STATE.elements.buttonEl.textContent = displayValue;
    }
  }
}

const setInputValueByCheckboxComponent = (STATE: ASelectInputState, items: ADropDownCheckbox[]) => {
  if (STATE.elements.buttonEl && STATE.elements.inputHidden) {
    STATE.selectedValues = items;
    const displayValue = items.map((item: ADropDownCheckbox) => item.$state.displayValue).join(', ');
    const value = items.map((item: ADropDownCheckbox) => item.$state.name).join(',');
    STATE.elements.inputHidden.value = value;
    STATE.elements.inputHidden.setAttribute('value', value);

    if (displayValue.length) {
      STATE.elements.buttonEl.textContent = displayValue;
    } else {
      STATE.elements.buttonEl.textContent = '';

      if (STATE.elements.placeholderEl) {
        STATE.elements.buttonEl.append(STATE.elements.placeholderEl);
      }
    }
  }
}

const initState = (selectInput: HTMLDivElement): ASelectInputState => {
  const root = selectInput;
  const innerEl: HTMLDivElement | null = root.querySelector(JS_CLASSES.innerEl);
  const buttonEl: HTMLDivElement | null = innerEl?.querySelector(JS_CLASSES.buttonEl) ?? null;
  const placeholderEl: HTMLSpanElement | null = buttonEl?.querySelector(JS_CLASSES.placeholder) ?? null;
  const inputHidden: HTMLInputElement | null = root.querySelector('input');
  const dropDownMenuElement: HTMLDivElement | null = root.querySelector(JS_DROP_DOWN_MENU_CLASSES.root) ?? null;
  const dropDownMenuComponent = dropDownMenuElement ? initADropDownMenu(dropDownMenuElement) : null;

  if (dropDownMenuComponent) {
    const STATE: ASelectInputState = {
      elements: {
        root,
        innerEl,
        buttonEl,
        inputHidden,
        placeholderEl
      },
      components: {
        dropDownMenu: dropDownMenuComponent,
      },
      isOpen: false,
      selectedValues: [],
      value: '',
      displayValue: '',
      disabled: inputHidden?.disabled ?? false,
      clickOutsideHandler: (event: MouseEvent) => {}
    }

    STATE.clickOutsideHandler = (event: MouseEvent) => clickOutsideHandler(event, STATE);

    return STATE;
  } else {
    throw new Error('Не удалось инициализировать работу компонента ASelectInput');
  }
}

const makeValues = (value: string, displayValue: string) => ({
  value,
  displayValue
});

const setResizeObserver = (STATE: ASelectInputState) => {
  const resizeObserver = new ResizeObserver((entries) => {
    if (STATE.isOpen) {
      const rect = STATE.elements.innerEl!.getBoundingClientRect();
      STATE.components.dropDownMenu.$state?.methods.setPosition(rect);
    }
  });
  resizeObserver.observe(STATE.elements.root);
}

const initSelectInput = (selectInput: HTMLDivElement): ASelectInput | null => {
  try {
    const STATE: ASelectInputState = initState(selectInput);
    const { components, elements } = STATE;

    elements.buttonEl?.addEventListener('click', (event) => {
      if (STATE.isOpen) {
        closeHandler(STATE);
      } else {
        openHandler(STATE);
      }
    });

    if (components.dropDownMenu.$state.components.items.length) {
      components.dropDownMenu.addEventListener('selected', (event) => {
        const { detail} = event as CustomEvent<ADropDownMenuSelectedEvent>;
        const values = makeValues(detail.value, detail.displayValue);

        setInputValueByItemComponent(values, STATE);
        closeHandler(STATE);

        const customEvent = new CustomEvent('selected', { detail: values });

        elements.root.dispatchEvent(customEvent);
      });

      const selectedItem = components.dropDownMenu.$state.selectedItem;
      const values = makeValues(selectedItem?.$state.value ?? '', selectedItem?.$state.displayValue ?? '');

      setInputValueByItemComponent(values, STATE);
    }

    if (components.dropDownMenu.$state.components.checkboxes.length) {
      components.dropDownMenu.addEventListener('changed', (event) => {
        const { detail } = event as CustomEvent<ADropDownMenuChangedEvent>;

        const customEvent = new CustomEvent<ADropDownMenuChangedEvent>('changed', { detail });

        setInputValueByCheckboxComponent(STATE, detail.values);

        elements.root.dispatchEvent(customEvent);
      });

      const selectedItems = components.dropDownMenu.$state.selectedItems;
      setInputValueByCheckboxComponent(STATE, selectedItems);
    }

    elements.inputHidden?.addEventListener('input', (event) => {
      return;
    });

    setResizeObserver(STATE);

    const component = STATE.elements.root as ASelectInput;
    component['$state'] = STATE;
    return component;
  } catch (e) {
    console.error(e);
    return null;
  }
}

export default initSelectInput;
