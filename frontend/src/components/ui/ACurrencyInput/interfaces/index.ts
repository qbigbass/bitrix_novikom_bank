import type { ADropDownMenuState } from '@components/ui/ADropDown/ADropDownMenu/interfaces';

export interface ACurrencyInputElements {
  root: HTMLDivElement;
  inputEl: HTMLInputElement | null;
  buttonEl: HTMLButtonElement | null;
  buttonTextEl: HTMLSpanElement | null | undefined;
}

export interface ACurrencyInputComponents {
  dropDownMenu: ADropDownMenuState | null;
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
