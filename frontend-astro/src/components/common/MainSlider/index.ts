import Swiper from "swiper";
import { Autoplay, Navigation, Pagination, Thumbs } from "swiper/modules";
import "swiper/css";
import { MEDIA_QUERIES } from "@js/constants";
import type { AutoplayOptions } from "swiper/types";

/**
 * Слайдер на главной странице, с превью на пк
 */

const VARIABLES = {
	delay: 5000,
};

export const initMainSlider = () => {
	const thumbs = new Swiper(".main-slider__thumbs", {
		spaceBetween: 0,
		slidesPerView: 4,
		freeMode: false,
		watchSlidesProgress: true,
	});

	new Swiper(".main-slider__container", {
		autoplay: {
			enabled: false,
		} as AutoplayOptions,
		loop: true,
		freeMode: false,
		modules: [Autoplay, Thumbs, Pagination, Navigation],
		thumbs: {
			swiper: thumbs,
		},
		controller: {
			control: thumbs,
		},
		pagination: {
			el: ".main-slider-pagination",
			type: "bullets",
			clickable: true,
		},
		navigation: {
			prevEl: ".main-slider-control__prev",
			nextEl: ".main-slider-control__next",
		},
		breakpoints: {
			[Number.parseInt(MEDIA_QUERIES['tablet-album'])]: {
				pagination: false,
				autoplay: {
					enabled: true,
					delay: VARIABLES.delay,
				} as AutoplayOptions,
			},
		}
	});
};
