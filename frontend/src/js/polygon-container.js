const POLYGON_CLASSES = {
    root: '.js-polygon-container',
    polygon: '.js-polygon-container-polygon',
    svg: '.js-polygon-container-svg',
}

const initPolygonContainer = () => {
    const polygonContainers = $(POLYGON_CLASSES.root);

    for (let i = 0; i < polygonContainers.length; i++) {
        const polygonContainer = polygonContainers[i];
        const STATE = initPolygonState(polygonContainer);
        setTimeout(() => {
            resizeSVGElement(STATE);
        }, 500)
        initResizeObservableOnPolygonElement(STATE);
    }
};

const initPolygonState = (polygonContainer) => {
    const $polygon = $(polygonContainer).find(POLYGON_CLASSES.polygon);
    const $svg = $(polygonContainer).find(POLYGON_CLASSES.svg);
    const $svgPolygon = $svg.find('polygon');

    if (!$polygon.length || !$svg.length || !$svgPolygon.length) {
        throw new Error(`Не найдены следующие элементы: ${POLYGON_CLASSES.polygon}, ${POLYGON_CLASSES.svg} или polygon`);
    }

    return {
        elements: {
            root: polygonContainer,
            polygon: $polygon,
            svg: $svg,
            svgPolygon: $svgPolygon,
        },
    };
};

const resizeSVGElement = (STATE) => {
    const $polygon = STATE.elements.polygon;
    const polygonRect = $polygon.get(0).getClientRects();

    if (polygonRect.length) {
        const isChatBot = !!$polygon.closest(".chat-bot").length;
        const {height, width} = polygonRect[0];
        const startPosition = isChatBot ? 1 : 2;
        const pointBevelSize = getSizeBevelByCssVariable(STATE);
        const pointPinSize = 15;

        let points;

        STATE.elements.svg.attr('height', height);
        STATE.elements.svg.attr('width', width);

        const svgPolygonWidth = Math.round(width - startPosition);
        const svgPolygonHeight = Math.round(height - startPosition);

        if (!isChatBot) {
            points = `${startPosition},${startPosition} ${svgPolygonWidth},${startPosition} ${svgPolygonWidth},${svgPolygonHeight - pointBevelSize} ${svgPolygonWidth - pointBevelSize},${svgPolygonHeight} ${startPosition},${svgPolygonHeight}`;
        } else {
            points = `${startPosition} ${startPosition}, ${startPosition} ${svgPolygonHeight - pointPinSize}, ${svgPolygonWidth - pointPinSize} ${svgPolygonHeight - pointPinSize}, ${svgPolygonWidth} ${svgPolygonHeight}, ${svgPolygonWidth} ${startPosition}`;
        }

        STATE.elements.svgPolygon.attr('points', points);
    }
};

const getSizeBevelByCssVariable = () => {
    const root = document.querySelector(':root');
    const rootStyles = getComputedStyle(root);
    let property = rootStyles.getPropertyValue('--polygon-square');

    if (!property) {
        property = '2.5rem';
    }

    return parseFloat(property) * 16;
};

const initResizeObservableOnPolygonElement = (STATE) => {
    const $polygon = STATE.elements.polygon;
    $polygon.on('resize', () => {
        setTimeout(() => {
            resizeSVGElement(STATE);
        }, 800)
    });
};
