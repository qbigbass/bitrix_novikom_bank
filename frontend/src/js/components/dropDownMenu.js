import $ from 'jquery';

const MENU_CLASSES = {
    links: '.js-dropdown-link',
    dropDownNav: '.js-dropdown-nav',
    activeClass: 'is-active',
    openClass: 'is-open',
}

function closeAllLinks() {
    const $links = $(MENU_CLASSES.links);
    if ($links.length) {
        $links.removeClass(MENU_CLASSES.activeClass);
    }
}

function hideAllDropDownMenu() {
    const $allDropDownNav = $(MENU_CLASSES.dropDownNav);
    if ($allDropDownNav.length) {
        $allDropDownNav.removeClass(MENU_CLASSES.openClass);
        closeAllLinks();
    }
}

function toggleDropDownMenu(id, open) {
    const dropDownNav = $(id);
    if (!dropDownNav) return false;

    if (open) {
        dropDownNav.addClass(MENU_CLASSES.openClass);
    } else {
        dropDownNav.removeClass(MENU_CLASSES.openClass);
    }
}

function toggleDropMenu($links, currentLink) {
    const id = currentLink.data('target');

    if (currentLink.hasClass(MENU_CLASSES.activeClass)) {
        currentLink.removeClass(MENU_CLASSES.activeClass);
        toggleDropDownMenu(id, false)
    } else {
        $links.removeClass(MENU_CLASSES.activeClass);
        hideAllDropDownMenu();
        currentLink.addClass(MENU_CLASSES.activeClass);
        toggleDropDownMenu(id, true)
    }
}

function initDropdownMenu() {
    const $links = $(MENU_CLASSES.links);

    if (!$links.length) {
        return false;
    }

    $links.on('click', function() {
        toggleDropMenu($links, $(this));
    });

    $(document).on('click', function(event) {
        if ((!$(event.target).closest(MENU_CLASSES.dropDownNav).length) && (!$(event.target).closest(MENU_CLASSES.links).length)) {
            hideAllDropDownMenu();
        }
    });
}

export default initDropdownMenu;
