import type {
  ADropDownMenuCustomEvent,
  ADropDownMenu
} from "../ADropDown/ADropDownMenu/interfaces";
import type {
  ACurrencyInput,
  ACurrencyInputState
} from "./interfaces";
import initADropDownMenu, { JS_CLASSES as JS_DROP_DOWN_MENU_CLASSES } from "@components/ui/ADropDown/ADropDownMenu";

//TODO В будущем скорее всего необходимо будет добавить методы:
// 1) Работу с подсказками(Ошибка/текст)

export const JS_CLASSES = {
	root: '.js-a-currency-input',
  innerEl: '.js-a-currency-input-inner',
	button: '.js-a-currency-input-button',
	buttonText: '.js-a-currency-input-button-text'
}

const ACTION_CLASSES = {
	open: 'is-open'
}

const openHandler = (STATE: ACurrencyInputState) => {
  document.body.append(STATE.components.dropDownMenu);
  const rect = STATE.elements.innerEl!.getBoundingClientRect();
  STATE.components.dropDownMenu.$state.methods.open(rect);
	STATE.elements.root.classList.add(ACTION_CLASSES.open);
  STATE.isOpen = true;
  document.addEventListener('click', STATE.clickOutsideHandler);
};

const closeHandler = (STATE: ACurrencyInputState) => {
  STATE.components.dropDownMenu.$state.methods.close();
  STATE.elements.root.classList.remove(ACTION_CLASSES.open);
  STATE.elements.root.append(STATE.components.dropDownMenu);
  STATE.isOpen = false;
  document.removeEventListener('click', STATE.clickOutsideHandler);
};

const clickOutsideHandler = (
	event: MouseEvent,
	STATE: ACurrencyInputState
) => {
	if (!STATE.elements.root.contains(event.target as Node)) {
		closeHandler(STATE);
	}
};

const setButtonText = (STATE: ACurrencyInputState, text: string) => {
	if (STATE.elements.buttonTextEl) {
		STATE.elements.buttonTextEl.innerHTML = text;
	}
}

const setResizeObserver = (STATE: ACurrencyInputState) => {
  const resizeObserver = new ResizeObserver((entries) => {
    if (STATE.isOpen) {
      const rect = STATE.elements.innerEl!.getBoundingClientRect();
      STATE.components.dropDownMenu.$state.methods.setPosition(rect);
    }
  });
  resizeObserver.observe(STATE.elements.root);
}

const initState = (root: HTMLDivElement) => {
	const innerEl: HTMLInputElement | null = root.querySelector(JS_CLASSES.innerEl);
	const inputEl: HTMLInputElement | null = root.querySelector('input');
	const buttonEl: HTMLButtonElement | null = root.querySelector(JS_CLASSES.button);
  const dropDownMenuElement: HTMLDivElement | null = root.querySelector(JS_DROP_DOWN_MENU_CLASSES.root);
	const dropDownMenuComponent: ADropDownMenu | null = dropDownMenuElement ? initADropDownMenu(dropDownMenuElement) : null;

  if (dropDownMenuComponent) {
    const STATE: ACurrencyInputState = {
      elements: {
        root,
        innerEl,
        inputEl,
        buttonEl,
        buttonTextEl: buttonEl?.querySelector(JS_CLASSES.buttonText)
      },
      components: {
        dropDownMenu: dropDownMenuComponent,
      },
      isOpen: false,
      selectedCurrency: null,
      value: '',
      disabled: inputEl?.disabled ?? false,
      clickOutsideHandler: (event: MouseEvent) => {}
    }

    STATE.clickOutsideHandler = (event: MouseEvent) => clickOutsideHandler(event, STATE)

    return STATE;
  } else {
    throw new Error('Не удалось инициализировать работу компонента ACurrencyInput');
  }
}

const initACurrencyInput = (currencyInput: HTMLDivElement): ACurrencyInput | null => {
  try {
    const STATE: ACurrencyInputState = initState(currencyInput);

    const { components, elements } = STATE;

    elements.buttonEl?.addEventListener('click', (event) => {
      if (STATE.isOpen) {
        closeHandler(STATE);
      } else {
        openHandler(STATE);
      }
    });

    elements.inputEl?.addEventListener('click', (event) => {
      if (STATE.isOpen) {
        event.stopPropagation();
        closeHandler(STATE);
      }
    });

    components.dropDownMenu?.addEventListener('selected', (event) => {
      const { detail } = event as CustomEvent<ADropDownMenuCustomEvent>;

      if (elements.buttonTextEl) {
        setButtonText(STATE, String(detail.value));
      }

      STATE.selectedCurrency = detail.value;

      closeHandler(STATE);

      const customEvent = new CustomEvent('selected', { detail });

      currencyInput.dispatchEvent(customEvent);
    });

    elements.inputEl?.addEventListener('input', (event) => {
      event.stopPropagation();

      STATE.value = elements.inputEl?.value ?? '';

      const customEvent = new CustomEvent('input', {
        detail: {
          value: elements.inputEl?.value
        }
      });

      currencyInput.dispatchEvent(customEvent);
    });

    setResizeObserver(STATE);
    setButtonText(STATE, String(components.dropDownMenu.$state?.selectedItem?.$state?.value ?? ''));
    STATE.selectedCurrency = components.dropDownMenu.$state?.selectedItem?.$state?.value;

    const component = elements.root as ACurrencyInput;
    component['$state'] = STATE;
    return component;
  } catch (e) {
    console.error(e);
    return null;
  }
}

export default initACurrencyInput;
