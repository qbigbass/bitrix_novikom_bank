export interface ACheckboxCustomEvent {
	checked: boolean;
  value: string;
}

export interface ACheckboxElements {
  root: HTMLDivElement;
  checkboxEl:  HTMLInputElement;
}

export interface ACheckboxState {
  elements: ACheckboxElements;
	checked: boolean,
  value: string;
}

export interface ACheckbox extends HTMLDivElement {
  $state?: ACheckboxState;
}
