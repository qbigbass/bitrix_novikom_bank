import Swiper from "swiper";
import type { SwiperOptions } from "swiper/types";
import { JS_DEFAULT_CLASSES, createSliderOptionsByAttrs  } from "../config";
import type { DefaultSliderDataAttrs } from "@components/common/Sliders/interfaces";
import type {
	ExpandableSliderDataAttrs,
	ExpandableSliderJSClasses,
	ExpandableSliderOptions
} from "@components/common/Sliders/ExpandableSlider/interfaces";
import {MEDIA_QUERIES} from "@js/constants.ts";

export const JS_CLASSES: ExpandableSliderJSClasses = {
	...JS_DEFAULT_CLASSES,
	slider: '.js-expandable-slider',
	trigger: '.js-expandable-slider-trigger'
}

const ACTION_CLASSES = {
	isExpanded: 'is-expanded',
	isHidden: 'is-hidden',
	swiperDisabled: 'swiper-disabled',
}

const toggleHiddenClassForSlides = (count: number, slides: NodeListOf<HTMLDivElement>, boolean: boolean = true) => {
	slides.forEach((slide: HTMLDivElement, index: number) => {
		if (index >= count) {
			slide.classList.toggle(ACTION_CLASSES.isHidden, boolean);
		}
	});
}

const initExpandedSlider = (expandableSlider: HTMLDivElement) => {
	const defaultSliderDataAttrs: ExpandableSliderDataAttrs = {
		spaceBetween: 'mobile-s:0,mobile:0,tablet:32,laptop:40',
		slidesPerView: 'mobile-s:1,mobile:1,tablet:2,laptop:3',
		visibleSlides: 3,
		rebuildingSlides: 'mobile'
	};

	const dataAttrs = expandableSlider.dataset;

	const sliderDataAttrs: ExpandableSliderDataAttrs = Object.assign(defaultSliderDataAttrs, dataAttrs);

	const sliderOptionDataAttrs: DefaultSliderDataAttrs = {
		spaceBetween: sliderDataAttrs.spaceBetween,
		slidesPerView: sliderDataAttrs.slidesPerView
	}

	const sliderExpandableOptions: ExpandableSliderOptions = {
		visibleSlides: Number(sliderDataAttrs.visibleSlides),
		rebuildingSlides: sliderDataAttrs.rebuildingSlides,
	}

	const rebuildingBreakpoint = Number.parseInt(MEDIA_QUERIES[sliderExpandableOptions.rebuildingSlides]);

	const slides: NodeListOf<HTMLDivElement> = expandableSlider.querySelectorAll(JS_CLASSES.slide);
	const slidesLength = slides.length;

	const trigger = expandableSlider.querySelector(JS_CLASSES.trigger);

	if (slidesLength <= sliderExpandableOptions.visibleSlides) {
		trigger?.remove();
	} else {
		trigger?.addEventListener('click', () => {
			expandableSlider.classList.add(ACTION_CLASSES.isExpanded);
		});
	}


	const options: SwiperOptions = createSliderOptionsByAttrs(sliderOptionDataAttrs, slidesLength);

	options.on = {
		breakpoint: (swiper: Swiper, breakpoint: SwiperOptions) => {
			const currentBreakpoint: number = Number.parseInt(swiper.currentBreakpoint);

			// @ts-ignore
			// Свойство на самом деле присутствует
			const isEnabled = swiper.enabled;

			if (currentBreakpoint <= rebuildingBreakpoint && isEnabled) {
				swiper.slideTo(0, 0);
				swiper.disable();
				swiper.el.classList.add(ACTION_CLASSES.swiperDisabled);
				toggleHiddenClassForSlides(sliderExpandableOptions.visibleSlides, slides, true);
			} else if (currentBreakpoint > rebuildingBreakpoint && !isEnabled) {
				swiper.enable()
				swiper.el.classList.remove(ACTION_CLASSES.swiperDisabled);
				toggleHiddenClassForSlides(sliderExpandableOptions.visibleSlides, slides, false);
				expandableSlider.classList.remove(ACTION_CLASSES.isExpanded);
			}
		}
	}

	new Swiper(expandableSlider, options);
}

export default initExpandedSlider;