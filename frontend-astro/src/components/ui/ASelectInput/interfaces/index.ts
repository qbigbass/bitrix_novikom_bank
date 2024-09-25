import type { ADropDownMenuState } from '@components/ui/ADropDown/ADropDownMenu/interfaces';

export interface ASelectInputState {
	root: HTMLDivElement;
	inputEl: HTMLDivElement | null;
	inputHidden: HTMLInputElement | null;
	dropDownMenu: ADropDownMenuState | null;
	isOpen: boolean;
	selectedValues: string | null | undefined;
	disabled: boolean;
	value: string;
	clickOutsideHandler: (event: MouseEvent) => void;
}
