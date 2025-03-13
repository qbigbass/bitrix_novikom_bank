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
            console.error('Error:', error);
        })
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
