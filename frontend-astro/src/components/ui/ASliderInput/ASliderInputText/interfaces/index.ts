import type {ASliderInputType} from "@components/ui/ASliderInput/interfaces";

export interface ASliderInputTextJSClasses {
	root: string;
	inputText: string;
	editButton: string;
	closeButton: string;
}

export interface ASliderInputTextActionClasses {
	isEditable: string;
}

export interface ASliderInputTextElements {
	root: HTMLDivElement;
	inputText: HTMLInputElement;
	editButton: HTMLButtonElement;
	closeButton: HTMLButtonElement;
}

export interface ASliderInputTextDefaultValues {
	minValue: number;
	maxValue: number;
	value: number;
	type: ASliderInputType;
	useSteps: boolean,
	steps: number[]
}

export interface IMaskCustomType {
	value: string;
	unmaskedValue: string;
	typedValue: string;
	displayValue: string;
	mask: string;
	on: (type: string, handler: (event: InputEvent) => void) => void;
	updateOptions: (options: object) => void;
}

export interface ASliderInputTextState extends ASliderInputTextDefaultValues {
	elements: ASliderInputTextElements;
	disabled: boolean;
	methods: {
		setValue: (value: number) => void
	},
	mask: IMaskCustomType;
}

