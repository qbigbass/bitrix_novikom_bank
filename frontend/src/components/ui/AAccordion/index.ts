interface JSClasses {
	jsAccordion: string;
	jsAccordionPanel: string;
	jsAccordionHeader: string;
	jsAccordionContent: string;
	jsAccordionCollapsedContent: string;
	jsAccordionCollapsedContentValue: string;
}

interface IState {
	activeAccordion: HTMLDivElement | null;
	isMultiple: boolean;
	timeoutOpenId: NodeJS.Timeout | null;
	timeoutCloseId: NodeJS.Timeout | null;
}

export const JS_CLASSES: JSClasses = {
	jsAccordion: ".js-a-accordion",
	jsAccordionPanel: ".js-a-accordion-panel",
	jsAccordionHeader: ".js-a-accordion-header",
	jsAccordionContent: ".js-a-accordion-content",
	jsAccordionCollapsedContent: ".js-a-collapsed-content",
	jsAccordionCollapsedContentValue: ".js-a-collapsed-content--value",
};

export const ACTION_CLASSES = {
	isExpanded: "is-expanded",
};

const initAAccordion = (accordion: HTMLDivElement) => {
	const STATE: IState = {
		activeAccordion: null,
		isMultiple: accordion.hasAttribute("data-multiple"),
		timeoutOpenId: null,
		timeoutCloseId: null,
	};

	const closeAccordion = (accordion: Element) => {
		const accordionContent = accordion.querySelector(JS_CLASSES.jsAccordionContent) as HTMLDivElement;
		accordionContent.style.maxHeight = `${accordionContent.scrollHeight}px`;

		if (STATE.timeoutCloseId !== null) {
			clearTimeout(STATE.timeoutCloseId);
		}

		STATE.timeoutCloseId = setTimeout(() => {
			accordionContent.style.maxHeight = "0";
			accordionContent.style.overflow = "";
			STATE.timeoutCloseId = null;
		}, 100);

		accordion.classList.remove(ACTION_CLASSES.isExpanded);
	};

	const openAccordion = (accordion: Element) => {
		const accordionContent = accordion.querySelector(JS_CLASSES.jsAccordionContent) as HTMLDivElement;
		accordionContent.style.maxHeight = `${accordionContent.scrollHeight}px`;

		if (STATE.timeoutOpenId !== null) {
			clearTimeout(STATE.timeoutOpenId);
		}

		STATE.timeoutOpenId = setTimeout(() => {
			accordionContent.style.maxHeight = "";
			accordionContent.style.overflow = "visible";
			STATE.timeoutOpenId = null;
		}, 100);

		accordion.classList.add(ACTION_CLASSES.isExpanded);
	};

	const componentPanels = accordion.querySelectorAll(
		`:scope > ${JS_CLASSES.jsAccordionPanel}, :scope > ${JS_CLASSES.jsAccordionCollapsedContent} > ${JS_CLASSES.jsAccordionCollapsedContentValue} > ${JS_CLASSES.jsAccordionPanel}`
	);

	componentPanels.forEach((panel) => {
		const componentHeader = panel.querySelector(JS_CLASSES.jsAccordionHeader) as HTMLDivElement;
		const accordionContent = panel.querySelector(JS_CLASSES.jsAccordionContent) as HTMLDivElement;

		if (accordionContent) {
			accordionContent.style.maxHeight = panel.classList.contains(ACTION_CLASSES.isExpanded)
				? `${accordionContent.scrollHeight}px`
				: "0";
		}

		componentHeader.addEventListener("click", (event) => {
			event.stopPropagation();
			const isCurrentlyExpanded = panel.classList.contains(ACTION_CLASSES.isExpanded) as Boolean;

			if (STATE.activeAccordion && STATE.activeAccordion !== panel && !STATE.isMultiple) {
				closeAccordion(STATE.activeAccordion);
			}

			if (isCurrentlyExpanded) {
				closeAccordion(panel);
				STATE.activeAccordion = null;
			} else {
				openAccordion(panel);
				STATE.activeAccordion = panel as HTMLDivElement;
			}
		});
	});
};

export default initAAccordion;
