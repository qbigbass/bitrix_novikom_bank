import type { ActiveClasses, JSClasses } from "@components/ui/ACollapsedItems/interfaces";

export const DEFAULT_JS_CLASSES: JSClasses = {
	root: '.js-a-collapsed-items',
	item: '.js-a-collapsed-item',
	button: '.js-a-collapsed-button',
	buttonText: '.js-a-collapsed-button-text'
}

export const DEFAULT_ACTIVE_CLASSES: ActiveClasses = {
	isHidden: 'is-hidden',
	isActive: 'is-active'
}