/**
 * Стандартные типы для кнопок, можно импортировать и использоват
 */
export interface ButtonProps {
	element?: "button" | "a";
	class?: string;
	href?: string;
	target?: string;
	color?: string;
	wide?: string | boolean;
	icon?: string;
	disabled?: any;
	size?: "s" | "m" | "l"; // TODO: set required sizes
	theme?: "light" | "dark";
	fullwidth?: boolean;
}