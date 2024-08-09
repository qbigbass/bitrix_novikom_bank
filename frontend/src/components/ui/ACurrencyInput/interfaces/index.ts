import type { ADropDownMenuState } from '@components/ui/ADropDown/ADropDownMenu/interfaces';

export interface ACurrencyInputState {
	root: HTMLDivElement;
	inputEl: HTMLInputElement | null;
	dropDownMenu: ADropDownMenuState | null;
	buttonEl: HTMLButtonElement | null;
	buttonTextEl: HTMLSpanElement | null | undefined;
	isOpen: boolean;
	selectedCurrency: string | null | undefined;
	disabled: boolean;
	value: string;
	clickOutsideHandler: (event: MouseEvent) => void;
}