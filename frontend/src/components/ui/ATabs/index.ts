import type {
	DefaultActiveClasses,
	ATabsState,
	JSDefaultClasses, ATabsElements, ATabsComponents
} from "@components/ui/ATabs/interfaces";
import { JS_DEFAULT_CLASSES } from "@components/ui/ATabs/config";
import initATabSwiper from "@components/ui/ATabs/common/ATabSwiper";
import type {ATabCustomEventDetail} from "@components/ui/ATabs/common/ATab/interfaces";

export const JS_CLASSES: JSDefaultClasses = {
	...JS_DEFAULT_CLASSES
}

const ACTIVE_CLASSES: DefaultActiveClasses = {
	active: 'is-active',
	hidden: 'is-hidden'
}

const initATabs = (root: HTMLDivElement) => {
	try {
		const STATE = initState(root);

		setupEventListeners(STATE);

		return STATE;
	} catch (e) {
		console.error(e);
	}
}

const initState = (root: HTMLDivElement): ATabsState => {
	const elements = initElements(root);
	const components = initComponents(elements);

	const activeTab = components.tabs.find((tab) => tab.isActive);

	let activePanel: HTMLDivElement | undefined = undefined;
	elements.panels.forEach((panel) => {
		if (panel.dataset.value === activeTab?.value) {
			activePanel = panel;
			panel.classList.add(ACTIVE_CLASSES.active);
			panel.classList.remove(ACTIVE_CLASSES.hidden);
		} else {
			panel.classList.remove(ACTIVE_CLASSES.active);
			panel.classList.add(ACTIVE_CLASSES.hidden);
		}
	});

	return {
		elements,
		components,
		activeTab,
		activePanel
	}
}

const initElements = (root: HTMLDivElement): ATabsElements => {
	const swiper: HTMLDivElement | null = root.querySelector(JS_CLASSES.swiper);

	if (!swiper) {
		throw new Error(`Не найден контейнер с class: ${JS_CLASSES.swiper}`);
	}

	const panel: HTMLDivElement | null = root.querySelector(JS_CLASSES.panels);

	const panels: Array<HTMLDivElement> = panel ? Array.from(panel.querySelectorAll(JS_CLASSES.panel)) : [];

	return {
		root,
		swiper,
		panel,
		panels
	}
}

const initComponents = (elements: ATabsElements): ATabsComponents => {
	const swiperComponent = initATabSwiper(elements.swiper);

	return {
		swiper: swiperComponent,
		tabs: swiperComponent.components.tabs
	}
}

const setupEventListeners = (STATE: ATabsState) => {
	STATE.components.tabs.forEach((tab, index) => {
		tab.elements.root.addEventListener('customClick', (event: Event) => {
			const { detail } = event as CustomEvent<ATabCustomEventDetail>;

			STATE.activeTab?.setActive(false);
			STATE.activeTab = tab;
			STATE.activePanel?.classList.remove(ACTIVE_CLASSES.active);
			STATE.activePanel?.classList.add(ACTIVE_CLASSES.hidden);

			STATE.activePanel = STATE.elements.panels.find((panel) => panel.dataset.value === detail.value);

			STATE.activePanel?.classList.add(ACTIVE_CLASSES.active);
			STATE.activePanel?.classList.remove(ACTIVE_CLASSES.hidden);

			//TODO добавить customEvent 'selected'
			//TODO добавить возможность выставлять выбранный таб снаружи компонента
		});
	});
}
export default initATabs;