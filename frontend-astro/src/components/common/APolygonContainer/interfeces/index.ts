export interface JSDefaultClasses {
	root: string;
	polygon: string;
	svg: string;
}

export interface APolygonContainerElements {
	root: HTMLDivElement;
	polygon: HTMLDivElement;
	svg: SVGElement;
	svgPolygon: SVGPolygonElement;
}

export interface APolygonContainerState {
	elements: APolygonContainerElements;
	getComputedStyles: CSSStyleDeclaration;
}