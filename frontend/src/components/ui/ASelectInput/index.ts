import type { ADropDownMenuCustomEvent, ADropDownMenuState, ADropDownMenu } from "../ADropDown/ADropDownMenu/interfaces";
import initADropDownMenu, { JS_CLASSES as JS_DROP_DOWN_MENU_CLASSES } from "@components/ui/ADropDown/ADropDownMenu";
import type { ASelectInput, ASelectInputState } from "@components/ui/ASelectInput/interfaces";

export const JS_CLASSES = {
  root: '.js-a-select-input',
  innerEl: '.js-a-select-input-inner',
  buttonEl: '.js-select-input-button'
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

const initState = (selectInput: HTMLDivElement): ASelectInputState => {
  const root = selectInput;
  const innerEl: HTMLDivElement | null = root.querySelector(JS_CLASSES.innerEl);
  const buttonEl: HTMLDivElement | null = innerEl?.querySelector(JS_CLASSES.buttonEl) ?? null;
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
      },
      components: {
        dropDownMenu: dropDownMenuComponent,
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

    components.dropDownMenu.addEventListener('selected', (event) => {
      const { detail} = event as CustomEvent<ADropDownMenuCustomEvent>;
      const values = makeValues(detail.value, detail.displayValue);

      setInputValue(values, STATE);
      closeHandler(STATE);

      const customEvent = new CustomEvent('selected', { detail: values });

      elements.root.dispatchEvent(customEvent);
    });

    components.dropDownMenu.addEventListener('changed', (event) => {
      console.log(event);
    });

    elements.inputHidden?.addEventListener('input', (event) => {
      return;
    });

    const selectedItem = components.dropDownMenu.$state?.selectedItem;
    const values = makeValues(selectedItem?.$state?.value ?? '', selectedItem?.$state?.displayValue ?? '');

    setInputValue(values, STATE);
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
