export interface ADropDownItemCustomEvent {
	value: string;
  displayValue: string;
}

export interface ADropDownItemState {
  elements: {
    root: HTMLDivElement | HTMLLinkElement;
  }
  methods: {
    select: () => void;
    unselect: () => void;
  }
	value: string;
  displayValue: string;
	selected: boolean;
}
