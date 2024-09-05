import initACheckbox, { JS_CLASSES as JS_A_CHECKBOX_CLASSES } from '@components/ui/ACheckbox';
import initSelectInput, { JS_CLASSES as JS_A_SELECT_INPUT_CLASSES } from '@components/ui/ASelectInput';
import initACurrencyInput, { JS_CLASSES as JS_A_CURRENCY_INPUT } from '@components/ui/ACurrencyInput';

const initUIComponents = () => {
  const ACheckboxElements: NodeListOf<HTMLDivElement> = document.querySelectorAll(JS_A_CHECKBOX_CLASSES.root);

  ACheckboxElements?.forEach((checkbox) => {
    const component = initACheckbox(checkbox);

    component?.addEventListener('changed', (event) => {
      console.log('Changed', event);
    });
  });

  const ASelectInputElements: NodeListOf<HTMLDivElement> = document.querySelectorAll(JS_A_SELECT_INPUT_CLASSES.root);

  ASelectInputElements?.forEach((currencyInput) => {
    const component = initSelectInput(currencyInput);

    component?.addEventListener('selected', (event) => {
      console.log('Selected', event);
    });

    component?.addEventListener('changed', (event) => {
      console.log('Changed', event);
    });
  });

  const ACurrencyInputComponents: NodeListOf<HTMLDivElement> = document.querySelectorAll(JS_A_CURRENCY_INPUT.root);

  ACurrencyInputComponents?.forEach((input) => {
    const component = initACurrencyInput(input);

    component?.addEventListener('input', (event) => {
      console.log('Input', event)
    });

    component?.addEventListener('selected', (event) => {
      console.log('Selected', event)
    });
  });
}



export default initUIComponents;
