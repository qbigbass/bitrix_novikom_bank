const ELEMENTS = {
	group: '.js-spoiler-group',
	button: '.js-spoiler-button'
}

const STATE_CLASSES = {
	buttonActive: 'js-spoiler-button-active',
	spoilerOpen: 'js-spoiler-open'
};

const CSS_VARIABLES = {
	spoilerAnimationDuration: '--spoiler-animation-duration'
};

const SPOILER_BUTTON_HOVER_TIMEOUT = 300;

type isSpoilerButton = HTMLElement & {
	isSpoilerOpen?: boolean;
	isSpoilerActive?: boolean;
	isSpoilerHover?: boolean;
	spoiler?: HTMLElement | null;
};

const handleSpoilerState = ({button, isActive = true}: {
	button: isSpoilerButton,
	isActive?: boolean
}): void => {
	const {classList, spoiler} = button;
	const {buttonActive, spoilerOpen} = STATE_CLASSES;

	classList.toggle(buttonActive, isActive);
	spoiler?.classList.toggle(spoilerOpen, isActive);
};

const findSpoilerById = (spoilerId: string | undefined): HTMLElement | null => {
	return document.querySelector(`[data-spoiler="${spoilerId}"]`);
};

const initSpoilerGroupEvents = (group: HTMLElement) => {
	const spoilerButtons: NodeListOf<isSpoilerButton> = group.querySelectorAll(ELEMENTS.button);
	const actionEvent = group.dataset.spoilerEvent || 'click';

	for (const button of spoilerButtons) {
		const spoilerId: string | undefined = button.dataset.spoilerId;
		button.spoiler = findSpoilerById(spoilerId);

		if (button.spoiler) {
			button.spoiler.style.setProperty(CSS_VARIABLES.spoilerAnimationDuration, `${SPOILER_BUTTON_HOVER_TIMEOUT}ms`);

			addSpoilerButtonEvents(button, actionEvent);
		} else {
			throw new Error(`Не удалось найти спойлер с id: ${spoilerId}`);
		}

		group.addEventListener('close-opened-spoiler', (e) => {
			const targetButton = e.target as isSpoilerButton;
			if (targetButton) {
				const activeButton = Array.from(spoilerButtons)
					.find((btn) => btn !== targetButton && btn.isSpoilerOpen);

				if (activeButton) {
					handleSpoilerState({button: activeButton, isActive: false});
				}
			}

		}, true);
	}
}

const addSpoilerButtonEvents = (button: isSpoilerButton, actionEvent: string = 'click') => {
	switch (actionEvent) {
		case 'hover':
			const mouseleaveCloseSpoiler = (button: isSpoilerButton) => {
				if (!button.isSpoilerHover) {
					handleSpoilerState({button, isActive: false});
					button.isSpoilerOpen = false;
				}
			};

			const resetSpoiler = (button: isSpoilerButton) => {
				button.isSpoilerActive = false;
				button.isSpoilerOpen = false;
				handleSpoilerState({button, isActive: false});
			};

			const buttonMouseEnterHandler = (button: isSpoilerButton) => {
				handleSpoilerState({button});
				button.isSpoilerOpen = true;
				button.dispatchEvent(new CustomEvent('close-opened-spoiler'));
			};

			const buttonMouseLeaveHandler = (button: isSpoilerButton) => {
				if (!button.isSpoilerOpen) {
					mouseleaveCloseSpoiler(button);
				} else {
					setTimeout(() => mouseleaveCloseSpoiler(button), SPOILER_BUTTON_HOVER_TIMEOUT);
				}
			};

			const spoilerEnterHandler = (button: isSpoilerButton) => {
				button.isSpoilerActive = true;
				button.isSpoilerHover = true;
			};

			const spoilerLeaveHandler = (button: isSpoilerButton) => {
				resetSpoiler(button);
				button.isSpoilerHover = false;
			};

			button.isSpoilerOpen = false;

			button.addEventListener('mouseenter', buttonMouseEnterHandler.bind(null, button));
			button.addEventListener('mouseleave', buttonMouseLeaveHandler.bind(null, button));
			button.spoiler?.addEventListener('mouseenter', spoilerEnterHandler.bind(null, button));
			button.spoiler?.addEventListener('mouseleave', spoilerLeaveHandler.bind(null, button));
			break;
		default:
			const closeByClickOutside = (button: isSpoilerButton, event: MouseEvent): void => {
				const { target }: { target: EventTarget | null } = event;
				if (!button.contains(target as Node) && !button.spoiler?.contains(target as Node)) {
					clickCloseSpoiler(button);
				}
			};

			const clickCloseSpoiler = (button: isSpoilerButton) => {
				handleSpoilerState({button, isActive: false});
				button.isSpoilerOpen = false;
				document.removeEventListener('click', closeByClickOutside.bind(null, button));
			};

			const buttonClickHandler = (button: isSpoilerButton) => {
				if (!button.isSpoilerOpen) {
					handleSpoilerState({button});
					button.isSpoilerOpen = true;
					document.addEventListener('click', closeByClickOutside.bind(null, button));
				} else {
					clickCloseSpoiler(button);
				}
			};

			button.addEventListener('click', buttonClickHandler.bind(null, button));
			break;
	}
}

const spoilersInit = () => {
	const spoilerGroups: NodeListOf<HTMLElement> = document.querySelectorAll(ELEMENTS.group);

	spoilerGroups?.forEach((group) => {
		initSpoilerGroupEvents(group);
	})

}

export default spoilersInit;
