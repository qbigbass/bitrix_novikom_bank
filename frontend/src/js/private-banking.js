const ELEMS_PB_NAV = {
    navMenu: '.js-pb-nav-menu',
    button: '.js-pb-menu-btn',
    openClass: 'is-open',
    hideClass: 'd-none',
    overflowClass: 'overflow-hidden',
}

const ELEMS_PB_ANIMATION = {
    animation: '.js-animation',
    animationStart: '.js-animation-start',
    animateClass: 'animate-show',
}

const ELEMS_PB_BUTTON = {
    btnTop: '.js-scroll-to-top',
}

const pbNavMenu = () => {
    const menu = document.querySelector(ELEMS_PB_NAV.navMenu);
    const button = document.querySelector(ELEMS_PB_NAV.button);
    const pageWrapper = document.querySelector('body');

    if (!menu || !button) return;

    button.addEventListener('click', () => {
        if (menu.classList.contains(ELEMS_PB_NAV.hideClass)) {
            button.classList.add(ELEMS_PB_NAV.openClass);
            menu.classList.remove(ELEMS_PB_NAV.hideClass);
            pageWrapper.classList.add(ELEMS_PB_NAV.overflowClass);
        } else {
            button.classList.remove(ELEMS_PB_NAV.openClass);
            menu.classList.add(ELEMS_PB_NAV.hideClass);
            pageWrapper.classList.remove(ELEMS_PB_NAV.overflowClass);
        }
    });
}

function pbAnimation() {
    const onEntry = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add(ELEMS_PB_ANIMATION.animateClass);
            }
        })
    }

    const options = {
        threshold: 0
    }

    const observer = new IntersectionObserver(onEntry, options);

    document.querySelectorAll(ELEMS_PB_ANIMATION.animation).forEach(el => {
        observer.observe(el);
    });

    document.querySelectorAll(ELEMS_PB_ANIMATION.animationStart).forEach(el => {
        el.classList.add(ELEMS_PB_ANIMATION.animateClass);
    });
}

function pbScrollToTop() {
    const button = document.querySelector(ELEMS_PB_BUTTON.btnTop);

    if (!button) return false;

    button.addEventListener('click', () => {
        $("html").animate({ scrollTop: 0 }, "slow");
    })
}
