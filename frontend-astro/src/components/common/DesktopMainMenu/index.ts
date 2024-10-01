import {MEDIA_QUERIES} from "@js/constants.ts";

interface IState {
    mainMenu: null | HTMLElement;
    dropDownMenu: null | HTMLElement;
    links: null | NodeListOf<HTMLElement>;
    activeLinkInfo: null | object;
    isMove: boolean;
    cloneLink: null | HTMLElement;
}

const ELEMENTS = {
    menu: '.js-desktop-main-menu',
    dropDownMenu: '.js-drop-down-menu',
}

const CLASSES = {
    activeClass: 'is-active',
    hideClass: 'is-hide',
    dropDownLinkClass: 'drop-down-menu__link',
    desktopLinkClass: 'desktop-main-menu-link',
    moveClass: 'js-desktop-move-link',
    linkStyleClass: 'body-s-light'
}

const STATE: IState = {
    mainMenu: null,
    links: null,
    dropDownMenu: null,
    activeLinkInfo: null,
    cloneLink: null,
    isMove: false
}

function findActiveLink(links: NodeListOf<HTMLElement>) {
    for(let i = 0; i < links.length; i++) {
        const link = links[i];

        if (link.classList.contains(CLASSES.activeClass)) {
            return { link, position: (i + 1) };
        }
    }
}

function moveLinkToDropDownMenu() {
    if (!STATE.links?.length) return;
    const linkInMenu = STATE.links[0] as HTMLElement;

    linkInMenu.remove();
    linkInMenu.classList.add(CLASSES.dropDownLinkClass);
    STATE.dropDownMenu?.prepend(linkInMenu);
}

function moveLinkToMainMenu(link: HTMLElement) {
    STATE.cloneLink = link.cloneNode(true) as HTMLElement;
    link.classList.add(CLASSES.hideClass)
    STATE.cloneLink.classList.add(CLASSES.desktopLinkClass);
    STATE.cloneLink.classList.add(CLASSES.linkStyleClass);
    STATE.cloneLink.classList.remove(CLASSES.dropDownLinkClass);
    STATE.cloneLink.classList.remove(CLASSES.moveClass);
    STATE.mainMenu?.prepend(STATE.cloneLink);
    STATE.isMove = true;
}

function moveLinks(): void {
    const activeLinkInfo = findActiveLink(STATE.links as NodeListOf<HTMLElement>);
    if (!activeLinkInfo) return;

    const { link, position } = activeLinkInfo;

    if (window.innerWidth < Number.parseInt(MEDIA_QUERIES['tablet-album']) || position === 1) {
        return
    }

    if ((window.innerWidth < Number.parseInt(MEDIA_QUERIES['laptop-x']))
        && (window.innerWidth >= Number.parseInt(MEDIA_QUERIES['tablet-album']))) {
        if (STATE.isMove) return;
        moveLinkToDropDownMenu();
        moveLinkToMainMenu(link);
    } else {
        if (STATE.isMove) {
            if (STATE.links?.length) {
                const firstLink = STATE.links[0] as HTMLElement;

                firstLink.classList.add(CLASSES.desktopLinkClass);
                firstLink.classList.remove(CLASSES.dropDownLinkClass);
                STATE.mainMenu?.prepend(firstLink);
            }

            if (STATE.cloneLink) {
                STATE.cloneLink.remove();
                link.classList.remove(CLASSES.hideClass)
            }

            STATE.isMove = false;
        }
    }
}

const moveActiveLink = () => {
    STATE.mainMenu = document.querySelector(ELEMENTS.menu) as HTMLElement;
    STATE.links = STATE.mainMenu?.querySelectorAll('a') as NodeListOf<HTMLElement>;
    STATE.dropDownMenu = STATE.mainMenu?.querySelector(ELEMENTS.dropDownMenu) as HTMLElement;


    if (!STATE.mainMenu || !STATE.links.length || !STATE.dropDownMenu) return;

    moveLinks();

    window.addEventListener('resize', () => {
        if (window.innerWidth >= Number.parseInt(MEDIA_QUERIES['tablet-album'])) {
            moveLinks();
        }
    })
}

export default moveActiveLink;
