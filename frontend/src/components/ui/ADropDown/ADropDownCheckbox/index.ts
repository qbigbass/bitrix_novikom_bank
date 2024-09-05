import type {
  ACheckbox,
  ACheckboxCustomEvent
} from "@components/ui/ACheckbox/interfaces";
import type {
  ADropDownCheckbox,
  ADropDownCheckboxEvent,
  ADropDownCheckboxState
} from "@components/ui/ADropDown/ADropDownCheckbox/interfaces";

export const JS_CLASSES = {
  root: '.js-drop-down-checkbox',
  checkbox: '.js-a-checkbox',
}

const initState = (root: HTMLDivElement): ADropDownCheckboxState => {
  const checkboxComponent: ACheckbox | null = root.querySelector(JS_CLASSES.checkbox);

  if (checkboxComponent?.$state) {
    return {
      elements: {
        root
      },
      components: {
        checkbox: checkboxComponent
      }
    }
  } else {
    throw new Error('Не удалось инициализировать работу компонента ADropDownCheckbox');
  }
}


const initADropDownCheckbox = (element: HTMLDivElement): ADropDownCheckbox | null => {
  try {
    const STATE = initState(element);
    const { components, elements } = STATE;

    components.checkbox.addEventListener('changed', (event) => {
      event.stopPropagation();
      const { detail } = event as CustomEvent<ACheckboxCustomEvent>;

      const customEvent = new CustomEvent<ADropDownCheckboxEvent>('changed', { detail })

      elements.root.dispatchEvent(customEvent);
    });

    const component = (STATE.elements.root as ADropDownCheckbox);
    component['$state'] = STATE;
    return component;
  } catch (e) {
    console.error(e);
    return null;
  }
}

export default initADropDownCheckbox;
