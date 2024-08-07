import Swiper from 'swiper';
import { DEFAULT_SLIDER_OPTIONS } from "@components/ui/ATabs/common/ATabSwiper/config";
import type { ATabSwiperState } from "@components/ui/ATabs/common/ATabSwiper/interfaces";
import type { ATabState } from "@components/ui/ATabs/common/ATab/interfaces";
import { JS_DEFAULT_CLASSES } from "@components/ui/ATabs/common/ATabSwiper/config";
import initATab from  "@components/ui/ATabs/common/ATab";

const JS_CLASSES = {
	...JS_DEFAULT_CLASSES
}

const initATabSwiper = (root: HTMLDivElement) => {
	const STATE = initState(root);

	setupEventListeners(STATE);

	return STATE;
}

const initState = (root: HTMLDivElement): ATabSwiperState => {
	const swiper = new Swiper(root, DEFAULT_SLIDER_OPTIONS);
	const tabComponents = initTabComponents(root);
	const activeTabIndex = tabComponents.findIndex((tabComponent) => tabComponent.isActive);

	return {
		activeTabIndex,
		elements: {
			root
		},
		components: {
			swiper,
			tabs: tabComponents
		}
	}
}

const initTabComponents = (root: HTMLDivElement): Array<ATabState> => {
	const tabElements: NodeListOf<HTMLButtonElement | HTMLLinkElement> = root.querySelectorAll(JS_CLASSES.tab);
	let tabComponents: Array<ATabState> = [];

	tabElements.forEach(tabElement => {
		const tabComponent = initATab(tabElement);
		tabComponents.push(tabComponent);
	});

	return tabComponents;
}

const setupEventListeners = (STATE: ATabSwiperState) => {
	STATE.components.tabs.forEach((tabComponent, index) => {
		tabComponent.elements.root.addEventListener('customClick', () => {
			STATE.activeTabIndex = index;
			STATE.components.swiper.slideTo(STATE.activeTabIndex);
		});
	});

	STATE.components.swiper.on('resize', () => {
		STATE.components.swiper.slideTo(STATE.activeTabIndex);
	});

	STATE.components.swiper.slideTo(STATE.activeTabIndex);
}

export default initATabSwiper;