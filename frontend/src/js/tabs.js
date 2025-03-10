const ELEMENTS_TAB = {
    collapsedSection: '.js-collapsed-mobile',
    collapse: '.collapse',
    polygonContainer: '.js-polygon-container-polygon',
    tabSlider: '.js-tabs-slider',
    tabContent: '.tab-pane',
    tabLink: '.tabs-panel__list-item-link',
    tabLinkWrapper: '.tabs-panel__list',
    mobileWidth: '767px',
}

const updatePolygonInTabContent = (el) => {
    const event = new Event("resize", {bubbles: true, composed: true});
    el.querySelectorAll(ELEMENTS_TAB.polygonContainer).forEach((polygon) => polygon.dispatchEvent(event));
};

let tabContentIsVisible = (el) => el.clientHeight !== 0;

const resizePolygonInTabContent = (el) => {
    const resizeObserver = new ResizeObserver(entries => {
        if (tabContentIsVisible(el)) {
            updatePolygonInTabContent(el);
            resizeObserver.disconnect();
        }
    });

    // start observing a DOM node
    resizeObserver.observe(el);
}

function initTabsContent() {
    const tabsCollapseArray = document.querySelectorAll('.tabs-with-content .collapse');

    tabsCollapseArray.forEach((el) => {
        const linkEl = document.querySelector(`.tabs-panel__list-item-link[data-bs-target="#${el.id}"`);

        // Fixes initialization of active tab
        if (linkEl.classList.contains('active')) {
            el.classList.add('show');
        }

        // Initializes a polygon when tab content is displayed
        resizePolygonInTabContent(el);

        el.addEventListener('show.bs.collapse', (event) => linkEl.classList.add('active'));
        el.addEventListener('hide.bs.collapse', (event) => linkEl.classList.remove('active'));
    });

    const collapsedSections = document.querySelectorAll(ELEMENTS_TAB.collapsedSection);
    const tabsSections = document.querySelectorAll(ELEMENTS_TAB.tabContent);
    tabsSections.forEach(tab => {
        if (tab.classList.contains('active')) {
            setTimeout(() => resizePolygonInTabContent(tab), 800)
        } else {
            resizePolygonInTabContent(tab);
        }
    });
    const isTabletOrSmaller = window.matchMedia(`(max-width: ${MEDIA_QUERIES.tablet})`).matches;
    if (!isTabletOrSmaller) {return false;}

    collapsedSections.forEach((el) => {
        const collapsedContent = el.querySelector(ELEMENTS_TAB.collapse);
        resizePolygonInTabContent(collapsedContent);
    });
}

function updateHash(event) {
    // Получаем хэш из атрибута href
    const hash = event.currentTarget.getAttribute('href');

    if (hash) {
        // Изменяем хэш в адресной строке
        history.pushState(null, null, hash);
    }
}

function activateTabFromHash() {
    // Получаем фрагмент URL
    const hash = window.location.hash;

    // Проверяем, есть ли фрагмент
    if (!hash) return false;

    // Ищем элемент с соответствующим href
    const tabLink = document.querySelector(`a[href="${hash}"]`);

    if (!tabLink) return false;

    const tabWrapper = tabLink.closest(ELEMENTS_TAB.tabLinkWrapper);
    const tabLinks = tabWrapper?.querySelectorAll(ELEMENTS_TAB.tabLink);

    const isMobile = window.matchMedia(`(max-width: ${ELEMENTS_TAB.mobileWidth})`).matches;
    const tabSlider = document.querySelector(ELEMENTS_TAB.tabSlider);

    if (isMobile) {
        const collapsedSection = tabLink.closest(ELEMENTS_TAB.collapsedSection);
        const collapseTrigger = collapsedSection?.querySelector('[data-bs-toggle="collapse"]');
        collapseTrigger?.click();
    }

    tabLink.click();
    tabLinks.forEach((link, index) => {
        if (link.classList.contains('active') && tabSlider) {
            console.log('index', index);
            setTimeout(() => {
                console.log('tabSlider.swiper', tabSlider.swiper);
                tabSlider.swiper.slideTo(index);
            }, 400)
        }

        link.addEventListener('click', (event) => {
            updateHash(event);
        });

    });

    // Получаем координаты элемента tabLink
    const rect = tabLink.getBoundingClientRect();
    const scrollTop = window.scrollY || window.pageYOffset;

    // Прокручиваем только по вертикали
    window.scrollTo({
        top: rect.top + scrollTop,
        behavior: 'smooth'
    });
}
