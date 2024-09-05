import type { ADropDownItem } from "@components/ui/ADropDown/ADropDownItem/interfaces";
import type { ADropDownCheckbox } from "@components/ui/ADropDown/ADropDownCheckbox/interfaces";

export interface ADropDownMenuCustomEvent {
	value: string;
  displayValue: string;
}


export interface ADropDownMenuElements {
  root: HTMLDivElement;
}

export interface ADropDownMenuComponents {
  items: ADropDownItem[];
  checkboxes: ADropDownCheckbox[];
}

export interface ADropDownMenuState {
  elements: ADropDownMenuElements;
  components: ADropDownMenuComponents;
	isOpen: boolean;
	currentValue: string;
	selectedItem: ADropDownItem | null;
  methods: {
    open: (rect: DOMRect) => void;
    close: () => void;
    setPosition: (rect: DOMRect) => void;
  }
}

export interface ADropDownMenu extends HTMLDivElement {
  $state: ADropDownMenuState;
}
