import type { ADropDownMenuCustomEvent, ADropDownMenuState } from "../ADropDown/ADropDownMenu/interfaces";
import initADropDownMenu, { JS_CLASSES as JS_DROP_DOWN_MENU_CLASSES } from "@components/ui/ADropDown/ADropDownMenu";
import type { ASelectInputState } from "@components/ui/ASelectInput/interfaces";

export const JS_CLASSES = {
  root: '.js-a-select-input',
  innerEl: '.js-a-select-input-inner',
  buttonEl: '.js-select-input-button'
}

export const ACTION_CLASSES = {
  open: 'is-open'
}

const openHandler = (STATE: ASelectInputState) => {
  document.body.append(STATE.components.dropDownMenu!.elements.root);
  const rect = STATE.elements.innerEl!.getBoundingClientRect();
  STATE.components.dropDownMenu?.methods.open(rect);
  STATE.isOpen = true;
  STATE.elements.root.classList.add(ACTION_CLASSES.open);
  document.addEventListener('click', STATE.clickOutsideHandler);
}

const closeHandler = (STATE: ASelectInputState) => {
  STATE.components.dropDownMenu?.methods.close();
  STATE.isOpen = false;
  STATE.elements.root.classList.remove(ACTION_CLASSES.open);
  STATE.elements.root.append(STATE.components.dropDownMenu!.elements.root);
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
  const innerEl: HTMLDivElement | null = root.querySelector(JS_CLASSES.innerEl);
  const buttonEl: HTMLDivElement | null = innerEl?.querySelector(JS_CLASSES.buttonEl) ?? null;
  const inputHidden: HTMLInputElement | null = root.querySelector('input');
  const dropDownEl: HTMLDivElement | null = root.querySelector(JS_DROP_DOWN_MENU_CLASSES.root);
  const dropDownMenu: ADropDownMenuState | null = dropDownEl ? initADropDownMenu(dropDownEl) : null;

  const STATE: ASelectInputState = {
    elements: {
      root,
      innerEl,
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
});

const setResizeObserver = (STATE: ASelectInputState) => {
  const resizeObserver = new ResizeObserver((entries) => {
    if (STATE.isOpen) {
      const rect = STATE.elements.innerEl!.getBoundingClientRect();
      STATE.components.dropDownMenu?.methods.setPosition(rect);
    }
  });
  resizeObserver.observe(STATE.elements.root);
}

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
    setResizeObserver(STATE);
    return STATE;
  } else {
    throw new Error('Не удалось инициализировать работу компонента ACurrencyInput');
  }
}

export default initSelectInput;
