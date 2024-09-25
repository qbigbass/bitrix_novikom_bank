export interface ACheckboxCustomEvent {
	checked: boolean;
  name: string;
}

export interface ACheckboxElements {
  root: HTMLDivElement;
  checkboxEl:  HTMLInputElement;
}

export interface ACheckboxState {
  elements: ACheckboxElements;
	checked: boolean;
  name: string;
}

export interface ACheckbox extends HTMLDivElement {
  $state: ACheckboxState;
}
