import type { ADropDownItemState } from "@components/ui/ADropDown/ADropDownItem/interfaces";

export interface ADropDownMenuCustomEvent {
	value: string;
  displayValue: string;
}

export interface ADropDownMenu extends HTMLDivElement {
	open: () => void;
	close: () => void;
}

export interface ADropDownMenuElements {
  root: ADropDownMenu;
}

export interface ADropDownMenuComponents {
  items: ADropDownItemState[];
}

export interface ADropDownMenuState {
  elements: ADropDownMenuElements;
  components: ADropDownMenuComponents;
	isOpen: boolean;
	currentValue: string;
	selectedItem: ADropDownItemState | null;
  methods: {
    open: () => void;
    close: () => void;
  }
}
