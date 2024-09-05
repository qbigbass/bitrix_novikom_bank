import type { ACheckboxCustomEvent } from "@components/ui/ACheckbox/interfaces";
import type { ACheckbox } from "@components/ui/ACheckbox/interfaces";

export interface ADropDownCheckboxEvent extends ACheckboxCustomEvent {}

export interface ADropDownCheckboxElements {
  root: HTMLDivElement;
}

export interface ADropDownCheckboxComponents {
  checkbox: ACheckbox
}

export interface ADropDownCheckboxState {
  elements: ADropDownCheckboxElements,
  components: ADropDownCheckboxComponents,
}

export interface ADropDownCheckbox extends HTMLDivElement {
  $state: ADropDownCheckboxState;
}
