interface IState {
    pageWrapper: null | HTMLElement;
    mobileMainNav: null | HTMLElement;
    buttonNavMobile: null | HTMLButtonElement;
}

const ELEMENTS = {
    menuWrapper: '.js-mobile-main-nav',
    button: '.js-button-nav-mobile',
    buttonText: '.js-button-nav-mobile-text',
    pageWrapper: '.js-page-wrapper'
}

const CLASSES = {
    open: 'is-menu-open',
    openButton: 'is-open',
    blur: 'is-blur',
}

const STATE: IState = {
    pageWrapper: null,
    mobileMainNav: null,
    buttonNavMobile: null,
}

function handlerButtonClick (event: Event) {
    const button = event.currentTarget as HTMLButtonElement;
    const buttonText = button.querySelector(ELEMENTS.buttonText) as HTMLElement;

    if (STATE.mobileMainNav?.classList.contains(CLASSES.open)) {
        STATE.mobileMainNav?.classList.remove(CLASSES.open);
        STATE.pageWrapper?.classList.remove(CLASSES.blur);
        button.classList.remove(CLASSES.openButton);
        buttonText.textContent = 'Меню';
    } else {
        STATE.mobileMainNav?.classList.add(CLASSES.open);
        STATE.pageWrapper?.classList.add(CLASSES.blur);
        button.classList.add(CLASSES.openButton);
        buttonText.textContent = 'Закрыть';
    }
}

function initButtonNavMobile() {
    STATE.buttonNavMobile = document.querySelector(ELEMENTS.button) as HTMLButtonElement;
    STATE.mobileMainNav = document.querySelector(ELEMENTS.menuWrapper) as HTMLElement;
    STATE.pageWrapper = document.querySelector(ELEMENTS.pageWrapper) as HTMLElement;

    if (!STATE.buttonNavMobile) return;

    if (!STATE.pageWrapper) {
        throw new Error(`Не удалось найти wrapper ${ELEMENTS.pageWrapper}`);
    }

    if (!STATE.mobileMainNav) {
        throw new Error(`Не удалось найти мобилное меню ${ELEMENTS.menuWrapper}`);
    }

    STATE.buttonNavMobile.addEventListener('click', handlerButtonClick)
}

export default initButtonNavMobile;
