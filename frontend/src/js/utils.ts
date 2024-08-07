import { MEDIA_QUERIES } from '@js/constants';

type Breakpoint = keyof typeof MEDIA_QUERIES;

export const isMatchMedia = (breakpoint: Breakpoint) => {
	const isExist = Object.keys(MEDIA_QUERIES).includes(breakpoint);

	if (isExist) {
		return window.matchMedia(`(min-width: ${MEDIA_QUERIES[breakpoint]})`).matches
	}

	throw Error(`breakpoint ${breakpoint} not exist in MEDIA_QUERIES`);
}

export const useMatchMedia = (breakpoint: Breakpoint, cb: (p: boolean) => void) => {
	const isMatch = window.matchMedia(`(min-width: ${MEDIA_QUERIES[breakpoint]})`);
	isMatch.addEventListener('change', (mql) => {
		cb(mql.matches);
	});
};

export const plural = (forms: string[], n: number) => {
	let idx;
	// @see http://docs.translatehouse.org/projects/localization-guide/en/latest/l10n/pluralforms.html
	if (n % 10 === 1 && n % 100 !== 11) {
		idx = 0; // many
	} else if (n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20)) {
		idx = 1; // few
	} else {
		idx = 2; // one
	}
	return forms[idx] || '';
};

export function formatNumberWithSpaces(number: number) {
	return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

/**
 * установит переменную --vh,
 * для получения фактической высоты окна браузера (ios fix)
 */
export const setVh = () => {
	const vh = window.innerHeight * 0.01;
	document.documentElement.style.setProperty('--vh', `${vh}px`);
}
