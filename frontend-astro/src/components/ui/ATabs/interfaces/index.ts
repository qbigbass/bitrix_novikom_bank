import type { ATabState } from "@components/ui/ATabs/common/ATab/interfaces";
import type { ATabSwiperState } from "@components/ui/ATabs/common/ATabSwiper/interfaces";

export interface JSDefaultClasses {
	root: string;
	tab: string;
	swiper: string;
	panels: string;
	panel: string;
}

export interface DefaultActiveClasses {
	active: string;
	hidden: string;
}

export interface ATabsElements {
	root: HTMLDivElement;
	swiper: HTMLDivElement;
	panel: HTMLDivElement | null;
	panels: Array<HTMLDivElement>;
}

export interface ATabsComponents {
	swiper: ATabSwiperState;
	tabs: Array<ATabState>;
}

export interface ATabsState {
	elements: ATabsElements;
	components: ATabsComponents;
	activeTab: ATabState | undefined;
	activePanel: HTMLDivElement | undefined;
}