import { DEFAULT_ACTIVE_CLASSES, DEFAULT_JS_CLASSES } from "@components/ui/ACollapsedItems/config";
import type { ACollapsedItemsElements, ACollapsedItemsState, MqType } from "@components/ui/ACollapsedItems/interfaces";
import { MEDIA_QUERIES } from "@js/constants.ts";

const initACollapsedItems = (root: HTMLDivElement): ACollapsedItemsState | undefined => {
	try {
		const STATE: ACollapsedItemsState = initState(root);
		setupEventListeners(STATE);
		return STATE;
	} catch (e) {
		console.error(e);
	}
}

const initState = (root: HTMLDivElement): ACollapsedItemsState => {
	const elements = initElements(root);
	const rebuildingMq: MqType = root.dataset.rebuildingMq as MqType ?? 'tablet';

	const dataVisibleItems = root.dataset.visibleItems;
	const visibleItems: number = dataVisibleItems ? parseInt(dataVisibleItems) : 4;

	const dataUseCountInButton = root.dataset.useCount;
	const useCountInButton = dataUseCountInButton ? dataUseCountInButton === 'true' : false;

	const rebuildingBreakpoint = Number.parseInt(MEDIA_QUERIES[rebuildingMq]);

	const dataVisibleButtonText = elements.button.dataset.visibleText;
	const visibleButtonText = dataVisibleButtonText ? dataVisibleButtonText : 'Показать';

	const dataHiddenButtonText = elements.button.dataset.hiddenText;
	const hiddenButtonText = dataHiddenButtonText ? dataHiddenButtonText : 'Скрыть';

	return {
		elements,
		rebuildingMq,
		visibleItems,
		isVisible: true,
		allowRebuilding: true,
		rebuildingBreakpoint,
		visibleButtonText,
		hiddenButtonText,
		useCountInButton
	}
}

const initElements = (root: HTMLDivElement): ACollapsedItemsElements => {
	const nodeListOfItems: NodeListOf<HTMLDivElement> = root.querySelectorAll(DEFAULT_JS_CLASSES.item);
	const items = Array.from(nodeListOfItems);
	const button: HTMLButtonElement | null = root.querySelector(DEFAULT_JS_CLASSES.button);
	const buttonText: HTMLSpanElement | null | undefined = button?.querySelector(DEFAULT_JS_CLASSES.buttonText);

	if (!button || !buttonText) {
		throw new Error(`Не удалось найти кнопку действия с class: ${DEFAULT_JS_CLASSES.button}, или вложенный элемент ${DEFAULT_JS_CLASSES.buttonText}`);
	}

	return {
		root,
		items,
		button,
		buttonText
	}
}

const setupEventListeners = (STATE: ACollapsedItemsState) => {
	STATE.elements.button.addEventListener('click', () => {
		if (STATE.allowRebuilding) {
			toggleVisibility (STATE, STATE.isVisible);
		}
	});

	resizeHandler(STATE);
}

const resizeHandler = (STATE: ACollapsedItemsState) => {
	const updateVisibility = (isDesktop: boolean) => {
		if (STATE.elements.items.length <= STATE.visibleItems) {
			STATE.elements.button.classList.add(DEFAULT_ACTIVE_CLASSES.isHidden);
			return;
		}

		if (isDesktop) {
			STATE.allowRebuilding = false;
			STATE.elements.button.classList.add(DEFAULT_ACTIVE_CLASSES.isHidden);
			toggleVisibility(STATE, false);
		} else {
			STATE.allowRebuilding = true;
			STATE.elements.button.classList.remove(DEFAULT_ACTIVE_CLASSES.isHidden);
			toggleVisibility(STATE, true);
		}
	}

	let lastIsBreakpoint = window.innerWidth >= STATE.rebuildingBreakpoint;
	updateVisibility(lastIsBreakpoint);

	window.addEventListener('resize', () => {
		const breakpoint = window.innerWidth >= STATE.rebuildingBreakpoint;
		if (breakpoint !== lastIsBreakpoint) {
			lastIsBreakpoint = breakpoint;
			updateVisibility(breakpoint);
		}
	});
}

const toggleVisibility = (STATE: ACollapsedItemsState, isHidden: boolean) => {
	for (let i = STATE.visibleItems; i <= STATE.elements.items.length - 1; i++) {
		const item = STATE.elements.items[i];
		item.classList.toggle(DEFAULT_ACTIVE_CLASSES.isHidden, isHidden);
	}

	toggleButton(STATE, !isHidden);

	STATE.isVisible = !isHidden;
}

const toggleButton = (STATE: ACollapsedItemsState, isVisible: boolean) => {
	if (isVisible) {
		STATE.elements.buttonText.innerText = STATE.hiddenButtonText;
	} else {
		if (STATE.useCountInButton) {
			STATE.elements.buttonText.innerText = STATE.visibleButtonText + ` (${STATE.elements.items.length - STATE.visibleItems})`;
		} else {
			STATE.elements.buttonText.innerText = STATE.visibleButtonText;
		}
	}

	STATE.elements.button.classList.toggle(DEFAULT_ACTIVE_CLASSES.isActive, isVisible);
}



export default initACollapsedItems;