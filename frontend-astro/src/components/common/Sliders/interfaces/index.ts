import { MEDIA_QUERIES } from "@js/constants.ts";

export type MqType = keyof typeof MEDIA_QUERIES;

export interface DefaultSliderProps {
	className?: string;
	class?: string;
	spaceBetween?: string;
	slidesPerView?: string;
}

export interface JSDefaultClasses {
	slider: string;
	slide: string;
	wrapper: string;
	controls: string;
	pagination: string;
	nav: string;
	prevEl: string;
	nextEl: string;
}

export interface DefaultSeparators {
	mediaQuery: string;
	mediaItem: string;
}

export interface DefaultSliderDataAttrs {
	spaceBetween: string;
	slidesPerView: string;
}
