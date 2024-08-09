import type { SwiperOptions } from 'swiper/types';
import { Navigation } from 'swiper/modules';
import { JS_DEFAULT_CLASSES as JDC } from "@components/ui/ATabs/config";
import type { JSDefaultClasses } from "@components/ui/ATabs/common/ATabSwiper/interfaces";

export const JS_DEFAULT_CLASSES: JSDefaultClasses = {
	tab: JDC.tab,
	swiperWrapper: '.js-a-tab-swiper-wrapper',
	prevEl: '.js-a-tab-prev',
	nextEl: '.js-a-tab-next'
}

export const DEFAULT_SLIDER_OPTIONS: SwiperOptions = {
	modules: [Navigation],
	slidesPerView: 'auto',
	spaceBetween: 0,
	navigation: {
		prevEl: JS_DEFAULT_CLASSES.prevEl,
		nextEl: JS_DEFAULT_CLASSES.nextEl,
		navigationDisabledClass: 'swiper-navigation-disabled',
	}
}