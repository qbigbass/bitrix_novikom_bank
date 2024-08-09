export interface JSClasses {
	root: string;
}

export interface ActiveClasses {
	active: string;
}

export interface ATabCustomEventDetail {
	isActive: boolean;
	value: string | undefined;
}

export interface ATabState {
	elements: {
		root: HTMLButtonElement | HTMLLinkElement
	},
	isActive: boolean;
	setActive: (value: boolean) => void;
	value: string | undefined;
}