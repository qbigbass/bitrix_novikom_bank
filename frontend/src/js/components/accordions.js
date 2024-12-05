const ELEMENTS = {
    polygonContainer: '.js-polygon-container-polygon',
}

const updatePolygonInAccordionContent = (el) => {
    const event = new Event("resize", {bubbles: true, composed: true});
    el.querySelectorAll(ELEMENTS.polygonContainer).forEach((polygon) => polygon.dispatchEvent(event));
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

export function initResizePolygonAccordions() {
    const accordionCollapseArray = document.querySelectorAll('.accordion-collapse.collapse');

    accordionCollapseArray.forEach((el) => {
        resizePolygonInAccordionContent(el);
    });
}
