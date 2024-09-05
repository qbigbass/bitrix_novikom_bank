import type {ACheckbox, ACheckboxCustomEvent, ACheckboxState} from "@components/ui/ACheckbox/interfaces";

export const JS_CLASSES = {
	root: '.js-a-checkbox'
}

const initState = (checkbox: HTMLDivElement): ACheckboxState => {
	const checkboxEl: HTMLInputElement | null = checkbox.querySelector('input');

  if (checkboxEl) {
    return {
      elements: {
        root: checkbox,
        checkboxEl
      },
      checked: checkboxEl?.checked ?? false,
      value: checkboxEl?.value ?? ''
    }
  } else {
    throw new Error('Не удалось инициализировать работу компонента ACheckbox');
  }
}

const initACheckbox = (checkbox: HTMLDivElement): ACheckbox | null => {
  try {
    const STATE = initState(checkbox);
    const { elements } = STATE;

    elements.checkboxEl.addEventListener('change', (event) => {
      event.stopPropagation();
      STATE.checked = elements.checkboxEl?.checked ?? false

      const customEvent = new CustomEvent<ACheckboxCustomEvent>('changed', {
        detail: {
          checked: STATE.checked,
          value: STATE.value
        },
      });

      checkbox.dispatchEvent(customEvent);
    });

    const component = (STATE.elements.root as ACheckbox);
    component['$state'] = STATE;
    return component;
  } catch (e) {
    console.error(e);
    return null;
  }
}

export default initACheckbox;
