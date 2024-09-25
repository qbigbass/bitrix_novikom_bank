import type { ADropDownButtonState } from "@components/ui/ADropDown/ADropDownButton/interfaces";

export interface ADropDownMenuCustomEvent {
	value: string;
}

export interface ADropDownMenu extends HTMLDivElement {
	open: () => void;
	close: () => void;
}

export interface ADropDownMenuState {
	isOpen: boolean;
	currentValue: string;
	selectedItem: ADropDownButtonState | null;
	root: ADropDownMenu;
	buttons: NodeListOf<HTMLButtonElement>;
	items: ADropDownButtonState[];
}