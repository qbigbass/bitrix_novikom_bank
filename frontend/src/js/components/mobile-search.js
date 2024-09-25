const ELEMENTS = {
    searchWrapper: '.js-mobile-search',
    menuBody: '.js-mobile-menu-body'
}

const CLASSES = {
    active: 'is-active-search'
}

function initMobileSearch() {
    const searchWrapper = document.querySelector(ELEMENTS.searchWrapper);
    const menuBody = document.querySelector(ELEMENTS.menuBody);

    if (!searchWrapper || !menuBody) return;

    const searchInput = searchWrapper.querySelector('input');
    searchInput?.addEventListener('focus', () => {
        menuBody.classList.add(CLASSES.active);
    });
    searchInput?.addEventListener('blur', () => {
        menuBody.classList.remove(CLASSES.active);
    });
}

export default initMobileSearch;
