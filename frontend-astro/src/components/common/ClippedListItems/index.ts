interface IState {
	component: null | HTMLElement;
	componentButton: null | HTMLButtonElement;
	componentContent: null | HTMLElement;
	isOpen: boolean;
}

export interface ClippedListItems {
	state: IState;
	appendLink: (element: HTMLLinkElement) => void;
	mount: (rootElement: HTMLElement) => void;
	unMount: () => void;
}

enum STATUS_CLASSES {
	ACTIVE = 'active'
}

enum JS_CLASSES {
	ROOT = '.js-clipped-links',
	BUTTON = '.js-clipped-links-button',
	CONTENT = '.js-clipped-links-content'
}

enum ROOT_CLASSES {
	ROOT = 'clipped-links'
}

const STATE: IState = {
	component: null,
	componentButton: null,
	componentContent: null,
	isOpen: false
}

const createStatusRoot = (status: STATUS_CLASSES): string => {
	return `${ROOT_CLASSES.ROOT}--${status}`
}

const outsideHandler = (e: Event): void => {
	const target = e.target as HTMLElement;

	if (target.closest(JS_CLASSES.ROOT)) return;

	closeHandler();
}

const openHandler = (): void => {
	if (STATE.component instanceof HTMLElement) {
		STATE.component.classList.add(createStatusRoot(STATUS_CLASSES.ACTIVE));
		STATE.isOpen = true;

		document.addEventListener('click', outsideHandler);
	} else {
		throw new Error('Не удалось изменить состояние компонента. STATE.component не инициализирован!');
	}
}

const closeHandler = (): void => {
	if (STATE.component instanceof HTMLElement) {
		STATE.component.classList.remove(createStatusRoot(STATUS_CLASSES.ACTIVE));
		STATE.isOpen = false;

		document.removeEventListener('click', outsideHandler);
	} else {
		throw new Error('Не удалось изменить состояние компонента. STATE.component не инициализирован!');
	}
}

const createRootElement = (template: HTMLTemplateElement): HTMLElement | null => {
	const wrapper = document.createElement('div');
	let content = template.content.cloneNode(true);
	wrapper.append(content);

	return wrapper.querySelector(JS_CLASSES.ROOT) as HTMLElement | null;
}

const initClippedListItems = (): ClippedListItems => {
	const template = document.getElementById('TemplateHiddenLinks') as HTMLTemplateElement | null;

	if (!template) {
		throw new Error('Не удалось инициализировать работу компонента ClippedListItems! Не найден шаблон создания корневого элемента');
	}

	STATE.component = createRootElement(template);

	if (!STATE.component) {
		throw new Error('Не удалось инициализировать работу компонента ClippedListItems! Не найден корневой элемент');
	}

	STATE.componentButton = STATE.component.querySelector(JS_CLASSES.BUTTON) as HTMLButtonElement;
	STATE.componentContent = STATE.component.querySelector(JS_CLASSES.CONTENT) as HTMLElement;

	STATE.componentButton.addEventListener('click', (): void => {
		STATE.isOpen ? closeHandler() : openHandler();
	});

	return {
		state: STATE,
		appendLink: (element: HTMLLinkElement) => {
			STATE.componentContent?.append(element);
		},
		mount: (rootElement: HTMLElement) => {
			// rootElement.append(STATE.component as Node);
			rootElement.insertAdjacentElement('afterend', STATE.component as HTMLElement);
		},
		unMount: () => {
			STATE.component?.remove();
			closeHandler();
		}
	}
}

export default initClippedListItems;
