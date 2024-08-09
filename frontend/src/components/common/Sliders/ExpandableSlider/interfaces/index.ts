import type {
	DefaultSliderDataAttrs,
	DefaultSliderProps,
	JSDefaultClasses,
	MqType
} from "@components/common/Sliders/interfaces";

export interface ExpandableSliderJSClasses extends JSDefaultClasses {
	trigger: string;
}

export interface ExpandableSliderProps extends DefaultSliderProps {
	visibleSlides: number;
	rebuildingSlides: MqType;
	expandableButtonText: string;
}

export interface ExpandableSliderOptions {
	visibleSlides: number;
	rebuildingSlides: MqType;
}

export interface ExpandableSliderDataAttrs extends DefaultSliderDataAttrs, ExpandableSliderOptions {}
