const MENU_CLASSES = {
    links: '.js-dropdown-link',
    dropDownNav: '.js-dropdown-nav',
    dropDownMenu: '.js-dropdown-menu',
    dropDownLinks: '.dropdown-item',
    activeClass: 'is-active',
    openClass: 'is-open show',
    hideXlClass: 'd-xl-none'
}

function setTabIdx(elem, value) {
    const inputs = $(elem).find('input');
    const links = $(elem).find('a');

    $(inputs).each(function () {
        $(this).attr('tabindex', value);
    });

    $(links).each(function () {
        $(this).attr('tabindex', value);
    });
}

function closeAllLinks() {
    const $links = $(MENU_CLASSES.links);
    if ($links.length) {
        $links.removeClass(MENU_CLASSES.activeClass);
        $links.attr('aria-expanded', 'false');
    }
}

function hideAllDropDownMenu() {
    const $allDropDownNav = $(MENU_CLASSES.dropDownNav);
    if ($allDropDownNav.length) {
        $allDropDownNav.removeClass(MENU_CLASSES.openClass);
        closeAllLinks();
        for (let i = 0; i < $allDropDownNav.length; i++) {
            setTabIdx($allDropDownNav[i], "-1")
        }
    }
}

function toggleDropDownMenu(id, open) {
    const dropDownNav = $(id);
    if (!dropDownNav) return false;

    if (open) {
        dropDownNav.addClass(MENU_CLASSES.openClass);
        setTabIdx(dropDownNav, "0")
    } else {
        dropDownNav.removeClass(MENU_CLASSES.openClass);
        setTabIdx(dropDownNav, "-1")
    }
}

function toggleDropMenu($links, currentLink) {
    let id = currentLink.data('target');
    if (!id) {
        id = currentLink.attr('href');
    }

    if (currentLink.hasClass(MENU_CLASSES.activeClass)) {
        currentLink.removeClass(MENU_CLASSES.activeClass);
        currentLink.attr('aria-expanded', 'false');
        toggleDropDownMenu(id, false)
    } else {
        $links.removeClass(MENU_CLASSES.activeClass);
        $links.attr('aria-expanded', 'false');
        hideAllDropDownMenu();
        currentLink.addClass(MENU_CLASSES.activeClass);
        currentLink.attr('aria-expanded', 'true');
        toggleDropDownMenu(id, true)
    }
}

function initDropdownMenu() {
    const $links = $(MENU_CLASSES.links);

    if (!$links.length) {
        return false;
    }

    $links.on('click', function (e) {
        e.preventDefault();
        toggleDropMenu($links, $(this));
    });

    $(document).on('click', function (event) {
        if ((!$(event.target).closest(MENU_CLASSES.dropDownNav).length) && (!$(event.target).closest(MENU_CLASSES.links).length)) {
            hideAllDropDownMenu();
        }
    });
}

function hideDropDownMenu() {
    const dropDown = document.querySelector(MENU_CLASSES.dropDownMenu);

    if (!dropDown) return false;

    const dropDownLinks = dropDown.querySelectorAll(MENU_CLASSES.dropDownLinks);
    const linksLength = dropDownLinks.length;
    let hideLinksLength = 0;

    for (let i = 0; i < linksLength; i++) {
        if (dropDownLinks[i].classList.contains(MENU_CLASSES.hideXlClass)) {
            hideLinksLength++;
        }
    }

    if (hideLinksLength === linksLength) {
        dropDown.classList.add(MENU_CLASSES.hideXlClass);
    } else {
        dropDown.classList.remove(MENU_CLASSES.hideXlClass);
    }
}
