import type {ASliderInputTextState} from "@components/ui/ASliderInput/ASliderInputText/interfaces";

export type ASliderInputType = 'price' | 'month' | 'day';

export interface JSClasses {
	root: string,
	displayValue: string,
	textSteps: string,
	innerInput: string,
	textInput: string,
	sliderInput: string,
}

export interface AInputDataAttrs {
	dataStartValue: string;
	dataMinValue: string;
	dataMaxValue: string;
	dataStepSize: string;
	dataType: string;
	dataSteps: string;
}

export interface ASliderInputElements {
	root: HTMLDivElement;
	displayValue: HTMLDivElement | null;
	textStepsContainer: HTMLDivElement | null;
	innerInput: HTMLDivElement;
	textInput: HTMLInputElement | null;
	sliderInput: HTMLInputElement;
	steps: Array<HTMLSpanElement | null>;
	textSteps: Array<HTMLSpanElement | null>;
}

export interface ASliderInputDefaultValues {
	minValue: number;
	maxValue: number;
	steps: Array<number>;
	type: ASliderInputType;
	value: number;
	useSteps: boolean;
	stepSize: number;
}

export interface ASliderInputState extends ASliderInputDefaultValues {
	elements: ASliderInputElements;
	components: {
		inputText: ASliderInputTextState | null
	}
}