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
}

const ELEMS_PB_SELECT = {
    select: ".js-select-date",
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

function pbScrollTo() {
    $(ELEMS_PB_BUTTON.btnAnchor).on('click', function(event) {
        event.preventDefault();

        const menu = document.querySelector(ELEMS_PB_NAV.navMenu);
        const button = document.querySelector(ELEMS_PB_NAV.button);

        if (!menu.classList.contains(ELEMS_PB_NAV.hideClass)) {
            button.click();
        }

        const target = this.hash;
        const $target = $(target);

        $('html, body').animate({
            scrollTop: $target.offset().top
        }, 1000);
    })

    $(window).scroll(function() {
        if ($(this).scrollTop() > window.innerHeight) {
            $('#scrollToTop').fadeIn();
        } else {
            $('#scrollToTop').fadeOut();
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
    optionToday.value = formatDate(today);
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
