const ELEMENTS = {
    button: '.js-drop-down-button',
    menu: '.js-drop-down-menu'
};

const STATE_CLASSES = {
    active: 'is-active'
};

function openDropDownMenu(dropDownMenu: HTMLElement) {
    const openDropDownMenu = findActiveDropDownMenu();
    if (openDropDownMenu) closeDropDownMenu(openDropDownMenu);

    dropDownMenu.classList.add(STATE_CLASSES.active);
    document.addEventListener('click', outsideHandler);
}

function closeDropDownMenu(dropDownMenu: HTMLElement) {
    dropDownMenu.classList.remove(STATE_CLASSES.active);
    document.removeEventListener('click', outsideHandler);
}

function findActiveDropDownMenu() {
    return document.querySelector(`${ELEMENTS.menu}.${STATE_CLASSES.active}`) as HTMLElement;
}

function handlerClickButton(event: Event) {
    const targetElement = event.currentTarget as HTMLElement;
    const dropDownMenu = targetElement.querySelector(ELEMENTS.menu) as HTMLElement;

    if (!dropDownMenu) return;

    if (dropDownMenu.classList.contains(STATE_CLASSES.active)) {
        closeDropDownMenu(dropDownMenu);
    } else {
        openDropDownMenu(dropDownMenu);
    }
}

function outsideHandler(event: Event) {
    const targetElement = event.target as HTMLElement;

    if (targetElement.closest(ELEMENTS.button)) return;

    closeDropDownMenu(findActiveDropDownMenu());
}

function initDropDownMenu() {
    const dropDownButtons = document.querySelectorAll(ELEMENTS.button);

    if (!dropDownButtons.length) return;

    dropDownButtons.forEach((button) => {
        button.addEventListener('click', handlerClickButton);
    });
}

export default initDropDownMenu;
