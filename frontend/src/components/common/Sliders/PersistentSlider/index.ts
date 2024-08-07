import Swiper from 'swiper';
import type { DefaultSliderDataAttrs, JSDefaultClasses } from "../interfaces";
import { JS_DEFAULT_CLASSES, createSliderOptionsByAttrs } from "../config";

export const JS_CLASSES: JSDefaultClasses = {
	...JS_DEFAULT_CLASSES,
	slider:'.js-persistent-slider'
}

const initPersistentSlider = (persistentSlider: HTMLDivElement) => {
	const defaultSliderDataAttrs: DefaultSliderDataAttrs = {
		spaceBetween: 'mobile-s:16,mobile:24,tablet:32,laptop:40',
		slidesPerView: 'mobile-s:1,mobile:1,tablet:2,laptop:3',
	};

	const dataAttrs = persistentSlider.dataset;

	const sliderDataAttrs: DefaultSliderDataAttrs = Object.assign(defaultSliderDataAttrs, dataAttrs);

	const slides = persistentSlider.querySelectorAll(JS_CLASSES.slide);
	const slidesLength = slides.length;

	const options = createSliderOptionsByAttrs(sliderDataAttrs, slidesLength);

	new Swiper(persistentSlider, options);
}

export default initPersistentSlider;