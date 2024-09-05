import type { ADropDownMenu } from '@components/ui/ADropDown/ADropDownMenu/interfaces';

export interface ASelectInputElements {
  root: HTMLDivElement;
  innerEl: HTMLDivElement | null;
  buttonEl: HTMLDivElement | null;
  inputHidden: HTMLInputElement | null;
}

export interface ASelectInputComponents {
  dropDownMenu: ADropDownMenu;
}

export interface ASelectInputState {
  elements: ASelectInputElements;
  components: ASelectInputComponents;
	isOpen: boolean;
	selectedValues: string | null | undefined;
	disabled: boolean;
	value: string;
  displayValue: string;
	clickOutsideHandler: (event: MouseEvent) => void;
}

export interface ASelectInput extends HTMLDivElement {
  $state?: ASelectInputState;
}
