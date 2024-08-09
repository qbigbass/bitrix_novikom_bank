export interface ACheckboxCustomEvent {
	checked: boolean;
}

export interface ACheckboxState {
	root: HTMLDivElement,
	checkboxEl:  HTMLInputElement | null,
	checked: boolean,
}