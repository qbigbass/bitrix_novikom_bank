import {MEDIA_QUERIES} from "../constants";

const ELEMENTS = {
    collapsedSection: '.js-collapsed-mobile',
    collapse: '.collapse',
    polygonContainer: '.js-polygon-container-polygon',
}

const updatePolygonInTabContent = (el) => {
    const event = new Event("resize", { bubbles: true, composed: true });
    el.querySelectorAll(ELEMENTS.polygonContainer).forEach((polygon) => polygon.dispatchEvent(event));
};

let tabContentIsVisible = (el) => el.clientHeight !== 0;

const resizePolygonInTabContent = (el) => {
    if (!tabContentIsVisible(el)) {
        const resizeObserver = new ResizeObserver(entries => {
            if (tabContentIsVisible(el)) {
                updatePolygonInTabContent(el);
                resizeObserver.disconnect();
            }
        });

        // start observing a DOM node
        resizeObserver.observe(el);
    }
}

export function initTabsContent() {
    const tabsCollapseArray = document.querySelectorAll('.tabs-with-content .collapse');

    tabsCollapseArray.forEach((el, index) => {
        let tabContentIsVisible = () => el.clientHeight !== 0;
        const linkEl = document.querySelector(`.tabs-panel__list-item-link[data-bs-target="#${el.id}"`);
        const swiperEl = linkEl.closest(".js-tabs-slider");

        // Fixes initialization of active tab
        if (linkEl.classList.contains('active')) {
            el.classList.add('show');
        }

        // Initializes a polygon when tab content is displayed
        resizePolygonInTabContent(el);

        el.addEventListener('show.bs.collapse', (event) => {
            linkEl.classList.add('active');

            if (swiperEl && swiperEl.swiper) {
                swiperEl.swiper.slideTo(index);
            }
        });
        el.addEventListener('hide.bs.collapse', (event) => linkEl.classList.remove('active'));
    });

    const collapsedSections = document.querySelectorAll(ELEMENTS.collapsedSection);
    const isTabletOrSmaller = window.matchMedia(`(max-width: ${MEDIA_QUERIES.tablet})`).matches;
    if (!isTabletOrSmaller) {return false;}

    collapsedSections.forEach((el) => {
        const collapsedContent = el.querySelector(ELEMENTS.collapse);
        resizePolygonInTabContent(collapsedContent);
    });
}
