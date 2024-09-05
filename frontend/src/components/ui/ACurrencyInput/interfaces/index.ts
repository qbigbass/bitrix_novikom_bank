import type { ADropDownMenu } from '@components/ui/ADropDown/ADropDownMenu/interfaces';

export interface ACurrencyInputElements {
  root: HTMLDivElement;
  innerEl: HTMLInputElement | null;
  inputEl: HTMLInputElement | null;
  buttonEl: HTMLButtonElement | null;
  buttonTextEl: HTMLSpanElement | null | undefined;
}

export interface ACurrencyInputComponents {
  dropDownMenu: ADropDownMenu;
}

export interface ACurrencyInputState {
  elements: ACurrencyInputElements;
  components: ACurrencyInputComponents;
	isOpen: boolean;
	selectedCurrency: string | null | undefined;
	disabled: boolean;
	value: string;
	clickOutsideHandler: (event: MouseEvent) => void;
}

export interface ACurrencyInput extends HTMLDivElement {
  $state: ACurrencyInputState;
}
