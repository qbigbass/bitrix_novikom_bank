import {MEDIA_QUERIES} from "../constants";

const ELEMENTS = {
    collapsedSection: '.js-collapsed-mobile',
    collapse: '.collapse',
    polygonContainer: '.js-polygon-container-polygon',
    tabSlider: '.js-tabs-slider',
    tabContent: '.tab-pane',
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

    const collapsedSections = document.querySelectorAll(ELEMENTS.collapsedSection);
    const tabsSections = document.querySelectorAll(ELEMENTS.tabContent);
    tabsSections.forEach(tab => {
        resizePolygonInTabContent(tab);
    });
    const isTabletOrSmaller = window.matchMedia(`(max-width: ${MEDIA_QUERIES.tablet})`).matches;
    if (!isTabletOrSmaller) {return false;}

    collapsedSections.forEach((el) => {
        const collapsedContent = el.querySelector(ELEMENTS.collapse);
        resizePolygonInTabContent(collapsedContent);
    });
}
