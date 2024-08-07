import type {
	ATabState,
	JSClasses,
	ActiveClasses,
	ATabCustomEventDetail
} from "@components/ui/ATabs/common/ATab/interfaces";
import { DEFAULT_JS_CLASSES, DEFAULT_ACTIVE_CLASSES } from "@components/ui/ATabs/common/ATab/config";

export const JS_CLASSES: JSClasses = {
	...DEFAULT_JS_CLASSES
}

const ACTIVE_CLASSES: ActiveClasses = {
	...DEFAULT_ACTIVE_CLASSES
}

const initATab = (root: HTMLButtonElement | HTMLLinkElement) => {
	const STATE = initState(root);

	setupEventListeners(STATE);
	return STATE;
}

const initState = (root: HTMLButtonElement | HTMLLinkElement): ATabState => {
	const state: ATabState = {
		elements: { root },
		isActive: root.classList.contains(ACTIVE_CLASSES.active),
		value: root.dataset.value,
		setActive: (value: boolean) => {},
	}

	state.setActive = (value: boolean) => {
		root.classList.toggle(ACTIVE_CLASSES.active);
		state.isActive = value;
	};

	return state;
}

const setupEventListeners = (STATE: ATabState) => {
	STATE.elements.root.addEventListener('click', (event: Event) => {
		if (STATE.isActive) return;

		STATE.setActive(true);

		const customEvent = new CustomEvent<ATabCustomEventDetail>('customClick', {
			detail: {
				isActive: STATE.isActive,
				value: STATE.value
			},
			bubbles: false
		});

		STATE.elements.root.dispatchEvent(customEvent);

		// Убираем фокус с кнопки, чтобы работали события передвижения Swiper
		STATE.elements.root.blur();
	});
}

export default initATab;