import {MEDIA_QUERIES} from "@js/constants.ts";

const ELEMENTS = {
    dropDownMenu: '.js-drop-down-menu',
    dropDownButton: '.js-drop-down-button',
    link: '.js-desktop-move-link'
}

const CLASSES = {
    dropDownLinkClass: 'drop-down-menu__link'
}

const moveLinksToDropDownMenu = (menuClass: string, linkClass: string) => {
    const menu = document.querySelector(menuClass) as HTMLElement;
    const dropDownMenu = menu?.querySelector(ELEMENTS.dropDownMenu) as HTMLElement;

    if (!menu || !dropDownMenu) return;

    const links = menu.querySelectorAll(ELEMENTS.link) as NodeListOf<HTMLElement>;
    const arrayLinks = Array.from(links);

    if (window.innerWidth < Number.parseInt(MEDIA_QUERIES['laptop-x'])) {
        if (links[0].closest(ELEMENTS.dropDownMenu)) return;

        arrayLinks.reverse().forEach(link => {
            link.classList.remove(linkClass);
            link.classList.add(CLASSES.dropDownLinkClass);
            dropDownMenu.prepend(link);
        });
    } else {
        if (!links[0].closest(ELEMENTS.dropDownMenu)) return;
        const dropDownButton = menu.querySelector(ELEMENTS.dropDownButton) as HTMLElement;
        if (!dropDownButton) return;

        arrayLinks.forEach(link => {
            link.classList.add(linkClass);
            link.classList.remove(CLASSES.dropDownLinkClass);

            dropDownButton.before(link);
        });
    }
};


export default moveLinksToDropDownMenu;
