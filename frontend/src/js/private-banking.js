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
    btnAnchor: '.js-scroll-to',
    tabButton: '#pills-tab button',
}

const ELEMS_PB_SELECT = {
    select: ".js-select-date",
}

const ELEMS_PB_ACCORDION = {
    header: ".accordion-header",
}

const FOOTER_MARGIN = 20;

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

function pbScrollTo() {
    $(ELEMS_PB_BUTTON.btnAnchor).on('click', function (event) {
        event.preventDefault();

        const menu = document.querySelector(ELEMS_PB_NAV.navMenu);
        const button = document.querySelector(ELEMS_PB_NAV.button);


        if (!menu.classList.contains(ELEMS_PB_NAV.hideClass)) {
            button.click();
        }

        const target = this.hash;
        const $target = $(target);

        if ($target.length === 0) return false;

        $('html, body').animate({
            scrollTop: $target.offset().top
        }, 1000);
    })

    const $scrollToTopButton = $('#scrollToTop');
    const $footer = $('footer');
    const isDesktop = window.matchMedia(`(min-width: ${MEDIA_QUERIES['tablet-album']})`).matches;

    if (!$scrollToTopButton) {
        return false
    }

    let lastScroll = 0;

    $(window).on('scroll', function () {
        const windowHeight = $(window).height();
        const scrollY = $(this).scrollTop();
        let currentScroll = $(this).scrollTop();
        const footerTop = $footer.offset().top;

        if (isDesktop) {
            if (scrollY > windowHeight) {
                $scrollToTopButton.fadeIn();
            } else {
                $scrollToTopButton.fadeOut();
            }
        } else {
            if (currentScroll > lastScroll || currentScroll === 0) {
                $scrollToTopButton.fadeOut();
            } else {
                $scrollToTopButton.fadeIn();
            }
            lastScroll = currentScroll;
        }

        if (footerTop < windowHeight + scrollY - FOOTER_MARGIN) {
            $scrollToTopButton.addClass('btn-pb-up--absolute')
        } else {
            $scrollToTopButton.removeClass('btn-pb-up--absolute')
        }
    });
}

function addSelectDateOptions() {
    const select = document.querySelector(ELEMS_PB_SELECT.select);

    if (!select) return false;

    let today = new Date();

    const formatDate = (date) => {
        const day = date.getDate();
        const month = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'][date.getMonth()];
        const year = date.getFullYear();
        const daysDiff = Math.round((date - today) / (1000 * 60 * 60 * 24));
        if (daysDiff === 0) {
            return `Сегодня, ${day} ${month} ${year}`;
        } else if (daysDiff === 1) {
            return `Завтра, ${day} ${month} ${year}`;
        } else {
            const daysOfWeek = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
            const dayOfWeek = daysOfWeek[date.getDay()];
            return `${dayOfWeek}, ${day} ${month} ${year}`;
        }
    }

    const optionToday = document.createElement('option');
    optionToday.value = today;
    optionToday.text = formatDate(today);
    select.appendChild(optionToday);

    for (let i = 1; i <= 14; i++) {
        const date = new Date(today.getTime() + i * 24 * 60 * 60 * 1000);
        const option = document.createElement('option');
        option.value = formatDate(date);
        option.text = formatDate(date);
        select.appendChild(option);
    }
}

function triggerPbTab() {
    const triggerTabList = document.querySelectorAll(ELEMS_PB_BUTTON.tabButton);
    let idContent = [];
    triggerTabList.forEach(triggerEl => {
        const id = triggerEl.getAttribute('data-bs-target');
        idContent.push(id);
        triggerEl.addEventListener('click', event => {
            const id = triggerEl.getAttribute('data-bs-target');
            const filteredId = idContent.filter(item => item !== id);
            filteredId.forEach((id) => {
                const content = document.querySelector(id);
                content.querySelectorAll(`.${ELEMS_PB_ANIMATION.animateClass}`).forEach((elem) => {
                    elem.classList.remove(ELEMS_PB_ANIMATION.animateClass);
                })
            })
        })
    })
}

function scrollPbAccordion() {
    const accordionsHeader = document.querySelectorAll(ELEMS_PB_ACCORDION.header);

    if (!accordionsHeader.length) return;

    accordionsHeader.forEach(accordionHeader => {
        const observer = new IntersectionObserver(
            ([e]) => e.target.classList.toggle("is-pinned", e.intersectionRatio < 1),
            {threshold: [1]}
        );

        observer.observe(accordionHeader);
    })

}

document.addEventListener('DOMContentLoaded', () => {
    addSelectDateOptions();
    pbNavMenu();
    pbScrollTo();
    triggerPbTab();
    scrollPbAccordion();
})

window.addEventListener('load', function() {
    pbAnimation();
});
