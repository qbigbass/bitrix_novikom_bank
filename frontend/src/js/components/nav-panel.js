
const ELEMENTS = {
    menuWrapper: '.js-mobile-main-nav',
    button: '.js-btn-nav-panel',
    buttonText: '.js-btn-nav-panel-text',
    pageWrapper: '.js-page-wrapper'
}

const CLASSES = {
    open: 'is-menu-open',
    openButton: 'is-open',
    blur: 'is-blur',
    overflowHidden: 'overflow-hidden',
}

const STATE= {
    pageWrapper: null,
    mobileMainNav: null,
    buttonNavMobile: null,
}


function handlerButtonClick (event) {
    const button = event.currentTarget;
    const buttonText = button.querySelector(ELEMENTS.buttonText);
    const body = document.querySelector('body');

    if (STATE.mobileMainNav?.classList.contains(CLASSES.open)) {
        STATE.mobileMainNav?.classList.remove(CLASSES.open);
        STATE.pageWrapper?.classList.remove(CLASSES.blur);
        body.classList.remove(CLASSES.overflowHidden)
        button.classList.remove(CLASSES.openButton);
        buttonText.textContent = 'Меню';
    } else {
        STATE.mobileMainNav?.classList.add(CLASSES.open);
        STATE.pageWrapper?.classList.add(CLASSES.blur);
        body.classList.add(CLASSES.overflowHidden)
        button.classList.add(CLASSES.openButton);
        buttonText.textContent = 'Закрыть';
    }
}

function initButtonNavMobile() {
    STATE.buttonNavMobile = document.querySelector(ELEMENTS.button);
    STATE.mobileMainNav = document.querySelector(ELEMENTS.menuWrapper);
    STATE.pageWrapper = document.querySelector(ELEMENTS.pageWrapper);

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
