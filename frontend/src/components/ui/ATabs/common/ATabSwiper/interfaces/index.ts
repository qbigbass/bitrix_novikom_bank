import Swiper from 'swiper';
import type { ATabState } from "@components/ui/ATabs/common/ATab/interfaces";

export interface JSDefaultClasses {
	tab: string;
	swiperWrapper: string;
	prevEl: string;
	nextEl: string;
}

export interface ATabSwiperState {
	activeTabIndex: number;
	elements: {
		root: HTMLDivElement;
	},
	components: {
		swiper: Swiper,
		tabs: Array<ATabState>
	}
}