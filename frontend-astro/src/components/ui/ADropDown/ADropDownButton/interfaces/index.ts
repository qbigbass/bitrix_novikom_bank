export interface ADropDownButtonCustomEvent {
	value: string;
}

export interface ADropDownButton extends HTMLButtonElement {
	select: () => void;
	unselect: () => void;
}

export interface ADropDownButtonState {
	button: ADropDownButton;
	value: string;
	selected: boolean;
}