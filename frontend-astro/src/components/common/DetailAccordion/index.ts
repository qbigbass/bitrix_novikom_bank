export const JS_CLASSES = {
	ROOT: '.js-detail-accordion'
}

export interface IAccordionDetail {
	isOpen: boolean
}

interface IState {
	isOpen: boolean;
	component: HTMLDetailsElement;
}

const initDetailAccordion = (elementWrapper: HTMLDetailsElement) => {
	if (!(elementWrapper instanceof HTMLDetailsElement)) {
		throw new Error('Переданный HTMLElement не является инстансом HTMLDetailsElement');
	}

	const STATE: IState = {
		isOpen: false,
		component: elementWrapper,
	}

	STATE.component.addEventListener('toggle', () => {
		STATE.isOpen = STATE.component.open;

		const event: CustomEvent<IAccordionDetail> = new CustomEvent('actionToggle', {
			detail: {
				isOpen: STATE.isOpen
			}
		});

		STATE.component.dispatchEvent(event);
	});
}

export default initDetailAccordion;