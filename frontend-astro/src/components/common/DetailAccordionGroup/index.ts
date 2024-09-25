import type { IAccordionDetail } from "@components/common/DetailAccordion";
import { JS_CLASSES as JS_CLASSES_ACCORDION }  from "@components/common/DetailAccordion";

const JS_CLASSES = {
	ROOT: '.js-detail-accordion-group'
}

const initDetailAccordionGroups = () => {
	const accordionGroups = document.querySelectorAll(JS_CLASSES.ROOT);

	accordionGroups.forEach((accordionGroup) => {
		const accordions: HTMLDetailsElement[] = Array.from(accordionGroup.querySelectorAll(JS_CLASSES_ACCORDION.ROOT));
		let activeIndex: null | number = null;

		accordions.forEach((accordion: HTMLDetailsElement, index: number) => {
			accordion.addEventListener('actionToggle', ((event: CustomEvent<IAccordionDetail>) => {
				if (!event.detail.isOpen && activeIndex === index) {
					activeIndex = null;
					return;
				}

				if (event.detail.isOpen) {
					if (activeIndex !== null) {
						accordions[activeIndex].open = false;
					}

					activeIndex = index;
				}
			}) as EventListener) ;
		});
	});
}

export default initDetailAccordionGroups;