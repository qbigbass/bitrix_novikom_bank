import type { ADropDownMenuCustomEvent, ADropDownMenuState } from "../ADropDown/ADropDownMenu/interfaces";
import initADropDownMenu, { JS_CLASSES as JS_DROP_DOWN_MENU_CLASSES } from "@components/ui/ADropDown/ADropDownMenu";
import type { ASelectInputState } from "@components/ui/ASelectInput/interfaces";

export const JS_CLASSES = {
  root: '.js-a-select-input',
  buttonEl: '.js-select-input-button'
}

export const ACTION_CLASSES = {
  open: 'is-open'
}

const openHandler = (STATE: ASelectInputState) => {
  STATE.components.dropDownMenu?.methods.open();
  STATE.isOpen = true;
  STATE.elements.root.classList.add(ACTION_CLASSES.open);
  document.addEventListener('click', STATE.clickOutsideHandler);
}

const closeHandler = (STATE: ASelectInputState) => {
  STATE.components.dropDownMenu?.methods.close();
  STATE.isOpen = false;
  STATE.elements.root.classList.remove(ACTION_CLASSES.open);

  document.removeEventListener('click', STATE.clickOutsideHandler);
};

const clickOutsideHandler = (
  event: MouseEvent,
  STATE: ASelectInputState
) => {
  if (!STATE.elements.root.contains(event.target as Node)) {
    closeHandler(STATE);
  }
};

const setInputValue = (
  { value, displayValue }: { value: string; displayValue: string },
  STATE: ASelectInputState
) => {
  if (STATE.elements.buttonEl && STATE.elements.inputHidden) {
    STATE.selectedValues = value;
    STATE.value = value;
    STATE.displayValue = displayValue;
    STATE.elements.inputHidden.value = value;
    STATE.elements.inputHidden.setAttribute('value', value);

    if (value) {
      STATE.elements.buttonEl.textContent = displayValue;
    }
  }
}

const initState = (selectInput: HTMLDivElement) => {
  const root = selectInput;
  const buttonEl: HTMLDivElement | null = root?.querySelector(JS_CLASSES.buttonEl);
  const inputHidden: HTMLInputElement | null = root?.querySelector('input');
  const dropDownEl: HTMLDivElement | null = root?.querySelector(JS_DROP_DOWN_MENU_CLASSES.root);
  const dropDownMenu: ADropDownMenuState | null = dropDownEl ? initADropDownMenu(dropDownEl) : null;

  const STATE: ASelectInputState = {
    elements: {
      root,
      buttonEl,
      inputHidden,
    },
    components: {
      dropDownMenu,
    },
    isOpen: false,
    selectedValues: null,
    value: '',
    displayValue: '',
    disabled: inputHidden?.disabled ?? false,
    clickOutsideHandler: (event: MouseEvent) => {}
  }

  STATE.clickOutsideHandler = (event: MouseEvent) => clickOutsideHandler(event, STATE);

  return STATE;
}

const makeValues = (value: string, displayValue: string) => ({
  value,
  displayValue
})

const initSelectInput = (selectInput: HTMLDivElement): ASelectInputState => {
  const STATE: ASelectInputState = initState(selectInput);
  const { components, elements } = STATE;

  if (components.dropDownMenu !== null) {
    elements.buttonEl?.addEventListener('click', (event) => {
      if (STATE.isOpen) {
        closeHandler(STATE);
      } else {
        openHandler(STATE);
      }
    });

    components.dropDownMenu.elements.root.addEventListener('selected', (event) => {
      const { detail} = event as CustomEvent<ADropDownMenuCustomEvent>;
      const values = makeValues(detail.value, detail.displayValue);

      setInputValue(values, STATE);
      closeHandler(STATE);

      const customEvent = new CustomEvent('selected', { detail: values });

      elements.root.dispatchEvent(customEvent);
    });

    elements.inputHidden?.addEventListener('input', (event) => {
      return;
    });

    const { selectedItem } = components.dropDownMenu;
    const values = makeValues(selectedItem?.value ?? '', selectedItem?.displayValue ?? '');

    setInputValue(values, STATE);
    return STATE;
  } else {
    throw new Error('Не удалось инициализировать работу компонента ACurrencyInput');
  }
}

export default initSelectInput;
