import { Navigation, Pagination } from 'swiper/modules';
import type { SwiperOptions } from 'swiper/types';
import { DEFAULT_SEPARATORS, JS_DEFAULT_CLASSES } from "@components/common/Sliders/config/constants.ts";
import type { DefaultSliderDataAttrs, MqType } from "@components/common/Sliders/interfaces";
import { MEDIA_QUERIES } from "@js/constants.ts";
export * from './constants';

export const DEFAULT_SLIDER_OPTIONS: SwiperOptions = {
	modules: [Navigation, Pagination],
	slidesPerView: 'auto',
	spaceBetween: 8,
	navigation: {
		prevEl: JS_DEFAULT_CLASSES.prevEl,
		nextEl: JS_DEFAULT_CLASSES.nextEl,
		navigationDisabledClass: 'swiper-navigation-disabled',
	},
	pagination: {
		el: JS_DEFAULT_CLASSES.pagination,
		paginationDisabledClass: 'swiper-pagination-disabled',
		type: 'bullets',
		clickable: true
	},
	breakpoints: {},
}

export const createSliderOptionsByAttrs = (dataAttrs: DefaultSliderDataAttrs, slidesLength: number): SwiperOptions => {
	if (dataAttrs) {
		const options: SwiperOptions = { ...DEFAULT_SLIDER_OPTIONS };

		for (const attrKey in dataAttrs) {
			const attrValue = dataAttrs[attrKey as keyof typeof dataAttrs];
			const breakpointItems = attrValue.split(DEFAULT_SEPARATORS.mediaItem);

			breakpointItems.forEach((breakpoint: string) => {
				const [mqKey, mqValue]: [MqType, string] = breakpoint.split(DEFAULT_SEPARATORS.mediaQuery) as [MqType, string];

				if (MEDIA_QUERIES[mqKey]) {
					const optionBreakpointKey = Number.parseInt(MEDIA_QUERIES[mqKey]);

					const optionBreakpointValue = {
						[attrKey]: mqValue
					}

					if (!options?.breakpoints) {
						options.breakpoints = {};
					}

					let payload = {
						...options.breakpoints[optionBreakpointKey] = {
							...options.breakpoints[optionBreakpointKey],
							...optionBreakpointValue,
						}
					}

					if (attrKey === 'slidesPerView') {
						payload = {
							...payload,
							navigation: {
								enabled: slidesLength > Number(mqValue)
							},
							pagination: {
								enabled: slidesLength > Number(mqValue)
							}
						}
					}

					options.breakpoints[optionBreakpointKey] = payload;
				}
			});
		}

		return options;
	} else {
		return DEFAULT_SLIDER_OPTIONS;
	}
}