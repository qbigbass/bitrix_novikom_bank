const MEDIA_QUERIES = {
    'mobile-s': '320px',
    mobile: '375px',
    tablet: '768px',
    'tablet-album': '1200px',
    laptop: '1440px',
    'laptop-x': '1600px',
    desktop: '1920px',
}

/**
 * Selects a plural form based on the number.
 * @param {string[]} forms Array of plural forms. The length of the array should be 3.
 * @param {number} n Number to be used for plural form selection.
 * @returns {string} The selected plural form.
 */
const plural = (forms, n) => {
    let idx;
    // @see http://docs.translatehouse.org/projects/localization-guide/en/latest/l10n/pluralforms.html
    if (n % 10 === 1 && n % 100 !== 11) {
        idx = 0; // many
    } else if (n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20)) {
        idx = 1; // few
    } else {
        idx = 2; // one
    }
    return forms[idx] || '';
};

/**
 * установит переменную --vh,
 * для получения фактической высоты окна браузера (ios fix)
 */
const setVh = () => {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}

function initHeaderSearchForm() {
    const searchInput = document.querySelector("#header-input-search");

    if (!searchInput) return;

    const urlParams = new URLSearchParams(window.location.search);
    const queryParam = urlParams.get('q');

    searchInput.value = queryParam;
}

const ELEM_MBL_SEARCH = {
    searchWrapper: '.js-mobile-search',
    menuBody: '.js-mobile-menu-body'
}

const CLASSES_MBL_SEARCH = {
    active: 'is-active-search'
}

function initMobileSearch() {
    const searchWrapper = document.querySelector(ELEM_MBL_SEARCH.searchWrapper);
    const menuBody = document.querySelector(ELEM_MBL_SEARCH.menuBody);

    if (!searchWrapper || !menuBody) return;

    const searchInput = searchWrapper.querySelector('input');
    searchInput?.addEventListener('focus', () => {
        menuBody.classList.add(CLASSES_MBL_SEARCH.active);
    });
    searchInput?.addEventListener('blur', () => {
        menuBody.classList.remove(CLASSES_MBL_SEARCH.active);
    });
}

const OFFICES_ELEMS = {
    buttonToTop: '.js-scroll-to-top',
    wrapper: '.section-office',
    mapContent: '.map-content',
    mapWrapper: '.map-wrapper',
    showClass: 'is-show'
}

function initOffices() {
    const buttonToTop = document.querySelector(OFFICES_ELEMS.buttonToTop);
    const sectionOffice = document.querySelector(OFFICES_ELEMS.wrapper);
    const mapWrapper = document.querySelector(OFFICES_ELEMS.mapWrapper);

    if (!buttonToTop || !sectionOffice || !mapWrapper) return;

    const mapWrapperHeight = mapWrapper.offsetHeight;

    buttonToTop.addEventListener('click', () => {
        sectionOffice.scrollTo({
            top: 0,
            behavior: 'smooth'
        })
    })

    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            buttonToTop.classList.remove(OFFICES_ELEMS.showClass);
        } else {
            buttonToTop.classList.add(OFFICES_ELEMS.showClass);
        }
    }, {
        root: sectionOffice,
        rootMargin: `${mapWrapperHeight}px`,
        threshold: 1.0
    });

    observer.observe(mapWrapper);
}

const SELECT2_CLASSES = {
    root: '.js-select',
    smallSize: 'form-select--size-small',
    largeSize: 'form-select--size-large',
    lgLargeSize: 'form-select--size-lg-large',
    smallLgSize: 'form-select--size-small-lg',
    selectSmallClass: 'select2-selection--size-small',
    selectLargeClass: 'select2-selection--size-large',
    selectLgLargeClass: 'select2-selection--size-lg-large',
    selectSmallLgClass: 'select2-selection--size-small-lg',
}

const defaultSelectOptions = {
    minimumResultsForSearch: -1,
    width: '100%',
    placeholder: () => {
        $(this).data('placeholder');
    },
}


function initSelect2() {
    $(SELECT2_CLASSES.root).each(function () {
        const options = {...defaultSelectOptions};
        if ($(this).hasClass(SELECT2_CLASSES.smallSize)) {
            options.selectionCssClass = SELECT2_CLASSES.selectSmallClass
        }
        if ($(this).hasClass(SELECT2_CLASSES.largeSize)) {
            options.selectionCssClass += ' ' + SELECT2_CLASSES.selectLargeClass
        }
        if ($(this).hasClass(SELECT2_CLASSES.lgLargeSize)) {
            options.selectionCssClass += ' ' + SELECT2_CLASSES.selectLgLargeClass
        }
        if ($(this).hasClass(SELECT2_CLASSES.smallLgSize)) {
            options.selectionCssClass += ' ' + SELECT2_CLASSES.selectSmallLgClass
        }
        $(this).select2(options);
    });
}

const ELEMENTS_NAV_PANEL = {
    menuWrapper: '.js-mobile-main-nav',
    button: '.js-btn-nav-panel',
    buttonText: '.js-btn-nav-panel-text',
    pageWrapper: '.js-page-wrapper'
}

const CLASSES_NAV_PANEL = {
    open: 'is-menu-open',
    openButton: 'is-open',
    blur: 'is-blur',
    overflowHidden: 'overflow-hidden',
}

const STATE_NAV_PANEL= {
    pageWrapper: null,
    mobileMainNav: null,
    buttonNavMobile: null,
}


function handlerButtonClick (event) {
    const button = event.currentTarget;
    const buttonText = button.querySelector(ELEMENTS_NAV_PANEL.buttonText);
    const body = document.querySelector('body');

    if (STATE_NAV_PANEL.mobileMainNav?.classList.contains(CLASSES_NAV_PANEL.open)) {
        STATE_NAV_PANEL.mobileMainNav?.classList.remove(CLASSES_NAV_PANEL.open);
        STATE_NAV_PANEL.pageWrapper?.classList.remove(CLASSES_NAV_PANEL.blur);
        body.classList.remove(CLASSES_NAV_PANEL.overflowHidden)
        button.classList.remove(CLASSES_NAV_PANEL.openButton);
        buttonText.textContent = 'Меню';
    } else {
        STATE_NAV_PANEL.mobileMainNav?.classList.add(CLASSES_NAV_PANEL.open);
        STATE_NAV_PANEL.pageWrapper?.classList.add(CLASSES_NAV_PANEL.blur);
        body.classList.add(CLASSES_NAV_PANEL.overflowHidden)
        button.classList.add(CLASSES_NAV_PANEL.openButton);
        buttonText.textContent = 'Закрыть';
    }
}

function initButtonNavMobile() {
    STATE_NAV_PANEL.buttonNavMobile = document.querySelector(ELEMENTS_NAV_PANEL.button);
    STATE_NAV_PANEL.mobileMainNav = document.querySelector(ELEMENTS_NAV_PANEL.menuWrapper);
    STATE_NAV_PANEL.pageWrapper = document.querySelector(ELEMENTS_NAV_PANEL.pageWrapper);

    if (!STATE_NAV_PANEL.buttonNavMobile) return;

    if (!STATE_NAV_PANEL.pageWrapper) {
        throw new Error(`Не удалось найти wrapper ${ELEMENTS_NAV_PANEL.pageWrapper}`);
    }

    if (!STATE_NAV_PANEL.mobileMainNav) {
        throw new Error(`Не удалось найти мобилное меню ${ELEMENTS_NAV_PANEL.menuWrapper}`);
    }

    STATE_NAV_PANEL.buttonNavMobile.addEventListener('click', handlerButtonClick)
}

const ELEMENTS_ACCORDION = {
    polygonContainer: '.js-polygon-container-polygon',
}

const updatePolygonInAccordionContent = (el) => {
    const event = new Event("resize", {bubbles: true, composed: true});
    el.querySelectorAll(ELEMENTS_ACCORDION.polygonContainer).forEach((polygon) => polygon.dispatchEvent(event));
};

let accordionContentIsVisible = (el) => el.clientHeight !== 0;

const resizePolygonInAccordionContent = (el) => {
    if (!accordionContentIsVisible(el)) {
        const resizeObserver = new ResizeObserver(entries => {
            if (accordionContentIsVisible(el)) {
                updatePolygonInAccordionContent(el);
                resizeObserver.disconnect();
            }
        });

        resizeObserver.observe(el);
    }
}

function initResizePolygonAccordions() {
    const accordionCollapseArray = document.querySelectorAll('.accordion-collapse.collapse');

    accordionCollapseArray.forEach((el) => {
        resizePolygonInAccordionContent(el);
    });
}

const ELEMS_SHOW_MORE = {
    links: '.js-more-content-link',
    removeClass: 'd-none',
}

function removeHideClass(id) {
    if (!id) return false;
    const wrapper = document.getElementById(id);
    if (!wrapper) return false;

    const hideColumns = wrapper.querySelectorAll(`.${ELEMS_SHOW_MORE.removeClass}`);
    hideColumns.forEach((column) => {
        column.classList.remove(ELEMS_SHOW_MORE.removeClass);
    })
}

function handlerClickMoreLink(e) {
    const thisLink = e.target.closest(ELEMS_SHOW_MORE.links);
    const idWrapper = thisLink.dataset.target;

    removeHideClass(idWrapper);
    thisLink.classList.add(ELEMS_SHOW_MORE.removeClass);
}

function showMoreContent() {
    const moreLinks = document.querySelectorAll(ELEMS_SHOW_MORE.links);

    moreLinks.forEach((link) => {
        link.addEventListener('click', handlerClickMoreLink)
    })
}

const MASK_ELEMS = {
    phone: '.js-mask-phone',
    date: '.js-mask-date',
    money: '.js-mask-money',
    inn: '.js-mask-inn',
    latin: '.js-mask-latin',
}

function initMask() {
    const $inputPhone = $(MASK_ELEMS.phone);
    const $inputDate = $(MASK_ELEMS.date);
    const $inputMoney = $(MASK_ELEMS.money);
    const $inputInn = $(MASK_ELEMS.inn);
    const $inputLatin = $(MASK_ELEMS.latin);

    $inputPhone.mask('+7 (000) 000-00-00', {
        placeholder: "+7",
    });

    $inputDate.mask('00.00.0000', {
        placeholder: "__.__.____",
    });

    $inputMoney.mask('# ##0', {
        reverse: true
    });

    $inputInn.mask('000000000000');

    $inputLatin.on('input', function () {
        this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
    });
}

const CAPTCHA_ELEMS = {
    audioButton: ".captcha-audio-btn"
}

function initCaptcha() {
    const captchaAudioButtons = document.querySelectorAll(CAPTCHA_ELEMS.audioButton)

    if (!captchaAudioButtons.length) return

    captchaAudioButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            btn.classList.add('is-active')

            setTimeout(() => {
                btn.classList.remove('is-active')
            }, 5500)
        })
    })
}

const ACCORDION_ELEMS = {
    collapse: '.accordion-collapse'
}

function initFixScrollAccordions() {
    const accordionsCollapse = document.querySelectorAll(ACCORDION_ELEMS.collapse)

    if (!accordionsCollapse.length) return;

    accordionsCollapse.forEach(accordion => {
        accordion.addEventListener('shown.bs.collapse', (e) => {
            accordion.scrollIntoView({
                block: 'nearest',
                behavior: 'auto'
            })
        })

        accordion.addEventListener('hide.bs.collapse', (e) => {
            accordion.scrollIntoView({
                block: 'nearest',
                behavior: 'auto'
            })
        })
    })
}

function checkWidth() {
    if (window.innerWidth < 768) {
        initPbTabsSlider();
    } else {
        destroyPbTabSwiper();
    }
}

function collectSelectOptions(data, field) {
    return [...new Set(data
        .map(item => item[field])
        .filter(value => value !== null && value !== '')
    )];
}

function setSelectOptions(select, options, STATE) {
    STATE.elements[select].innerHTML = '';

    options.forEach(item => {
        const option = document.createElement('option');
        option.value = item;
        option.textContent = item;
        STATE.elements[select].appendChild(option);
    });
}

function createNewInputSlider(inputSlider, dataAttr) {
    const cloneInputSlider = inputSlider.cloneNode(true);
    Object.entries(dataAttr).forEach(([key, value]) => {
        cloneInputSlider.dataset[key] = value;
    })
    cloneInputSlider.querySelector(JS_CLASSES.textSteps).textContent = '';
    cloneInputSlider.querySelector(ELEMS_MORTGAGE.inputSliderRange).style = '';
    initInputSlider([cloneInputSlider]);
    inputSlider.replaceWith(cloneInputSlider);
    return cloneInputSlider;
}

function checkPattern() {
    // Получаем все секции с классом .section-layout
    const sections = document.querySelectorAll('.section-layout');

    // Проходим по секциям, начиная со второй
    for (let i = 0; i < sections.length - 1; i++) {
        if (sections[i].querySelector('.pattern-bg')) {
            // Получаем следующую секцию
            const nextSection = sections[i + 1];

            if (nextSection.lastElementChild && nextSection.lastElementChild.classList.contains('pattern-bg')) {
                // Удаляем паттерн
                nextSection.lastElementChild.remove();
            }
        }
    }
}

function isLeapYear(year) {
    return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
}

function calculateDaysInYear(year) {
    return isLeapYear(year) ? 366 : 365;
}

const findMinValue = (key, data) => {
    return Math.min(...data.map(obj => obj[key]));
}

const findMaxValue = (key, data) => {
    return Math.max(...data.map(obj => obj[key]));
}

const URL = '/local/php_interface/ajax/calc.php';

function getRates({table = null, id = null, name = null}) {
    const params = new URLSearchParams();
    if (table) params.append('table', table);
    if (id) params.append('id', id);
    if (name) params.append('name', name);

    return fetch(URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: params
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Ошибка:', data.error);
            } else if (data.data) {
                return data.data;
            }
        })
        .catch(error => {
            // console.error('Error:', error);
            // TODO: убрать перед пушем
            return dataTemp.data;
        })
}

const dataTemp = {
    "data": [
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 17,
            "effectiveRate": 18.38,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 12,
            "effectiveRate": 13.48,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21.5,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 30000000,
            "sumTo": 100000000,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 18,
            "effectiveRate": 18.66,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 12,
            "effectiveRate": 13.07,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 18.3,
            "effectiveRate": 18.98,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 17.3,
            "effectiveRate": 18.73,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 12.2,
            "effectiveRate": 13.3,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Рубли",
            "rate": 12.2,
            "effectiveRate": 13.73,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4.3,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 21.5,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 18.8,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 22.4,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 21.7,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 19,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 12.5,
            "effectiveRate": 13.23,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": 10000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 11,
            "effectiveRate": 11.89,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": 10000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 21.5,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал Социальный",
            "currency": "Рубли",
            "rate": 22.2,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4.8,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 3.6,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4.6,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4.2,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 3.8,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 18.8,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4.2,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Юань",
            "rate": 4.5,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 10,
            "effectiveRate": 11.1,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": 10000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 15.5,
            "effectiveRate": 14.38,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": 1000000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 20.6,
            "effectiveRate": null,
            "periodFrom": 250,
            "periodTo": 250,
            "sumFrom": 30000000,
            "sumTo": 100000000,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21.3,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 5000000,
            "sumTo": 29999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Premium Капитал",
            "currency": "Доллары",
            "rate": 0.15,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 500000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 15,
            "effectiveRate": 13.85,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": 10000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 3.7,
            "effectiveRate": 3.83,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 2.5,
            "effectiveRate": 2.51,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 2.8,
            "effectiveRate": 2.83,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 3.2,
            "effectiveRate": 3.27,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 3.5,
            "effectiveRate": 3.61,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 10000,
            "sumTo": 99999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 2.7,
            "effectiveRate": 2.71,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 3,
            "effectiveRate": 3.03,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21.2,
            "effectiveRate": null,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 30000000,
            "sumTo": 100000000,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21.1,
            "effectiveRate": null,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 5000000,
            "sumTo": 29999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21.5,
            "effectiveRate": null,
            "periodFrom": 250,
            "periodTo": 250,
            "sumFrom": 5000000,
            "sumTo": 29999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": 13.79,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": 1000000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 11.5,
            "effectiveRate": 12.48,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": 1000000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Комфорт",
            "currency": "Рубли",
            "rate": 10.5,
            "effectiveRate": 11.62,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": 1000000,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21,
            "effectiveRate": null,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 1500000,
            "sumTo": 4999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Перспектива",
            "currency": "Рубли",
            "rate": 18.5,
            "effectiveRate": null,
            "periodFrom": 220,
            "periodTo": 220,
            "sumFrom": 100000,
            "sumTo": 3499999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Перспектива",
            "currency": "Рубли",
            "rate": 19,
            "effectiveRate": null,
            "periodFrom": 220,
            "periodTo": 220,
            "sumFrom": 3500000,
            "sumTo": 100000000,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 20.2,
            "effectiveRate": null,
            "periodFrom": 250,
            "periodTo": 250,
            "sumFrom": 10000,
            "sumTo": 1499999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21,
            "effectiveRate": null,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 10000,
            "sumTo": 1499999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 10000,
            "sumTo": 1499999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 20.4,
            "effectiveRate": null,
            "periodFrom": 250,
            "periodTo": 250,
            "sumFrom": 1500000,
            "sumTo": 4999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рантье",
            "currency": "Рубли",
            "rate": 21.2,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 1500000,
            "sumTo": 4999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная выплата на счет или карту"
        },
        {
            "name": "Рост",
            "currency": "Юань",
            "rate": 3.4,
            "effectiveRate": 3.47,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 100000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 22.4,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Доллары",
            "rate": 2,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Юань",
            "rate": 4.4,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Юань",
            "rate": 4,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Юань",
            "rate": 4.4,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Юань",
            "rate": 4.7,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Юань",
            "rate": 5,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 14,
            "effectiveRate": 14.92,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": 3500000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 12,
            "effectiveRate": 13.07,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": 3500000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 10.7,
            "effectiveRate": 11.86,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": 3500000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 16.5,
            "effectiveRate": 17.06,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": 10000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 14.3,
            "effectiveRate": 15.26,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": 10000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 12.5,
            "effectiveRate": 13.66,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": 10000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 10.8,
            "effectiveRate": 11.99,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": 10000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Капитал",
            "currency": "Доллары",
            "rate": 0.25,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 1000000,
            "sumTo": 39999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Доллары",
            "rate": 1,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 500000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 21.7,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 19,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 22.5,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 21.8,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 19.5,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 22.7,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 22,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 20,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 17.5,
            "effectiveRate": 18.13,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": 100000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 14.5,
            "effectiveRate": 15.49,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": 100000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 18,
            "effectiveRate": 19.55,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 19.5,
            "effectiveRate": 20.28,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 18.5,
            "effectiveRate": 20.14,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Юань",
            "rate": 2.9,
            "effectiveRate": 2.91,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "До востребования",
            "currency": "Юань",
            "rate": 0.01,
            "effectiveRate": null,
            "periodFrom": 365,
            "periodTo": 365,
            "sumFrom": 5,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "До востребования",
            "currency": "Евро",
            "rate": 0.01,
            "effectiveRate": null,
            "periodFrom": 365,
            "periodTo": 365,
            "sumFrom": 5,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "До востребования",
            "currency": "Рубли",
            "rate": 0.1,
            "effectiveRate": null,
            "periodFrom": 365,
            "periodTo": 365,
            "sumFrom": 50,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "До востребования",
            "currency": "Доллары",
            "rate": 0.01,
            "effectiveRate": null,
            "periodFrom": 365,
            "periodTo": 365,
            "sumFrom": 5,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 22,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 21.3,
            "effectiveRate": null,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 18.5,
            "effectiveRate": null,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": null,
            "periodFrom": 1100,
            "periodTo": 1100,
            "sumFrom": 10000,
            "sumTo": 999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 19,
            "effectiveRate": 19.74,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 17.5,
            "effectiveRate": 18.96,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 18.5,
            "effectiveRate": 19.2,
            "periodFrom": 61,
            "periodTo": 180,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 13,
            "effectiveRate": 14.26,
            "periodFrom": 550,
            "periodTo": 550,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": 100000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 11,
            "effectiveRate": 12.23,
            "periodFrom": 730,
            "periodTo": 730,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": 100000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Доллары",
            "rate": 0.7,
            "effectiveRate": 0.7,
            "periodFrom": 367,
            "periodTo": 367,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": 1000000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Комфорт",
            "currency": "Рубли",
            "rate": 16,
            "effectiveRate": 16.62,
            "periodFrom": 181,
            "periodTo": 181,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": 3500000,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 13.2,
            "effectiveRate": 14.5,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 13.2,
            "effectiveRate": 15,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 3500000,
            "sumTo": 9999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 13.4,
            "effectiveRate": 14.75,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 13.4,
            "effectiveRate": 15.26,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 10000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 13.7,
            "effectiveRate": 15.11,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Рубли",
            "rate": 13.7,
            "effectiveRate": 15.65,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 100000000,
            "sumTo": 999999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Юань",
            "rate": 3.2,
            "effectiveRate": 3.24,
            "periodFrom": 181,
            "periodTo": 365,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Юань",
            "rate": 3.6,
            "effectiveRate": 3.69,
            "periodFrom": 367,
            "periodTo": 550,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Premium Рост",
            "currency": "Юань",
            "rate": 4,
            "effectiveRate": 4.15,
            "periodFrom": 551,
            "periodTo": 730,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "Ежемесячная капитализация"
        },
        {
            "name": "Капитал",
            "currency": "Рубли",
            "rate": 22.2,
            "effectiveRate": null,
            "periodFrom": 91,
            "periodTo": 91,
            "sumFrom": 1000000,
            "sumTo": 99999999,
            "minimumBalance": null,
            "interestPayment": "В конце срока"
        }
    ]
}



let isInitialLoad = true;

document.addEventListener('DOMContentLoaded', () => {
    initDropdownMenu();
    setVh();
    initSwiperMenu();
    initButtonNavMobile();
    initMobileSearch();
    initHeroBanner();
    initCardSlider();
    initAnnouncementSlider();
    initTabsSlider();
    initSelect2();
    initTabsContent();
    initInputSlider();
    showMoreContent();
    initDatepicker();
    setPage();
    initFormSteps();
    initFormFeedback();
    initFormExpressGuarantee();
    initFormSend();
    initCaptcha();
    initUploadFile();
    initMask();
    initResizePolygonAccordions();
    initHeaderSearchForm();
    hideDropDownMenu();
    initOffices();
    initChatBot();
    initCharts();
    initFixScrollAccordions();
    checkWidth();
    updateHash();
    checkPattern();
});

window.addEventListener('load', function() {
    initPolygonContainer();
    activateTabFromHash();

    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))


    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});

window.addEventListener('resize', () => {
    if (isInitialLoad) {
        isInitialLoad = false;
    } else {
        initPolygonContainer();
        setVh();
        hideDropDownMenu();
        checkWidth();
    }
});
