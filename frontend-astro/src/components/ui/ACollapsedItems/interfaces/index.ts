import { MEDIA_QUERIES } from "@js/constants.ts";

export type MqType = keyof typeof MEDIA_QUERIES;

export interface JSClasses {
	root: string;
	item: string;
	button: string;
	buttonText: string;
}

export interface ActiveClasses {
	isHidden: string;
	isActive: string;
}

export interface ACollapsedItemsElements {
	root: HTMLDivElement;
	items: HTMLDivElement[];
	button: HTMLButtonElement;
	buttonText: HTMLSpanElement;
}

export interface ACollapsedItemsState {
	elements: ACollapsedItemsElements;
	rebuildingMq: MqType;
	visibleItems: number;
	isVisible: boolean;
	allowRebuilding: boolean;
	rebuildingBreakpoint: number;
	visibleButtonText: string;
	hiddenButtonText: string;
	useCountInButton: boolean;
}