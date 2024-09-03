import type { ADropDownMenuState } from '@components/ui/ADropDown/ADropDownMenu/interfaces';

export interface ASelectInputElements {
  root: HTMLDivElement;
  buttonEl: HTMLDivElement | null;
  inputHidden: HTMLInputElement | null;
}

export interface ASelectInputComponents {
  dropDownMenu: ADropDownMenuState | null;
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
