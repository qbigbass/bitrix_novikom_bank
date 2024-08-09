import type {
	APolygonContainerElements,
	APolygonContainerState,
	JSDefaultClasses
} from "@components/common/APolygonContainer/interfeces";

export const JS_CLASSES: JSDefaultClasses = {
	root: '.js-a-polygon-container',
	polygon: '.js-a-polygon-container-polygon',
	svg: '.js-a-polygon-container-svg',
}

const initAPolygonContainer = (aPolygonContainer: HTMLDivElement) => {
	try	{
		const STATE = initState(aPolygonContainer);
		resizeSVGElement(STATE);
		initResizeObservableOnPolygonElement(STATE);
	} catch (e) {
		console.error(e);
	}
}

const initState = (root: HTMLDivElement): APolygonContainerState => {
	const elements = initElements(root);

	const getComputedStyles = getComputedStyle(document.documentElement);

	return {
		elements,
		getComputedStyles
	}
}

const initElements = (root: HTMLDivElement): APolygonContainerElements => {
	const polygon: HTMLDivElement | null = root.querySelector(JS_CLASSES.polygon);
	const svg: SVGElement | null = root.querySelector(JS_CLASSES.svg);
	const svgPolygon: SVGPolygonElement | undefined | null = svg?.querySelector('polygon');

	if (!polygon || !svg || !svgPolygon) {
		throw new Error(`Не найдены следующие элементы: ${JS_CLASSES.polygon}, ${JS_CLASSES.svg} или polygon`);
	}

	return {
		root,
		polygon,
		svg,
		svgPolygon
	}
}

const resizeSVGElement = (STATE: APolygonContainerState) => {
	const polygonRect = STATE.elements.polygon.getClientRects();

	if (polygonRect.length) {
		const { height, width } = polygonRect[0];
		const startPosition = 2;
		const pointBevelSize = getSizeBevelByCssVariable(STATE);

		STATE.elements.svg.setAttribute('height', String(height));
		STATE.elements.svg.setAttribute('width', String(width));

		const svgPolygonWidth = Math.round(width - startPosition);
		const svgPolygonHeight = Math.round(height - startPosition);
		const points = `${startPosition},${startPosition} ${svgPolygonWidth},${startPosition} ${svgPolygonWidth},${svgPolygonHeight - pointBevelSize} ${svgPolygonWidth - pointBevelSize},${svgPolygonHeight} ${startPosition},${svgPolygonHeight}`;

		STATE.elements.svgPolygon.setAttribute('points', points);
	}
}

const getSizeBevelByCssVariable = (STATE: APolygonContainerState): number => {
	let property = STATE.getComputedStyles.getPropertyValue('--polygon-square');

	if (!property) {
		property = '2.5rem';
	}

	return parseFloat(property) * 16
}

const initResizeObservableOnPolygonElement = (STATE: APolygonContainerState) => {
	const resizeObserver = new ResizeObserver(() => {
		resizeSVGElement(STATE);
	});

	resizeObserver.observe(STATE.elements.polygon);
}

export default initAPolygonContainer;