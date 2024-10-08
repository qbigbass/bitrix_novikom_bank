export function initTabsContent() {
    const updatePolygonInTabContent = (el) => {
        const polygonArray = el.querySelectorAll('.js-polygon-container-polygon');

        polygonArray.forEach((polygon) => polygon.dispatchEvent(new Event("resize")));
    };

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
        if (!tabContentIsVisible()) {
            const resizeObserver = new ResizeObserver(entries => {
                if (tabContentIsVisible()) {
                    updatePolygonInTabContent(el);
                    resizeObserver.disconnect();
                }
            });

            // start observing a DOM node
            resizeObserver.observe(el);
        }

        el.addEventListener('show.bs.collapse', (event) => {
            linkEl.classList.add('active');
            
            if (swiperEl && swiperEl.swiper) {
                swiperEl.swiper.slideTo(index);
            }
        });
        el.addEventListener('hide.bs.collapse', (event) => linkEl.classList.remove('active'));
    });
}
