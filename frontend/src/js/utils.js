import { MEDIA_QUERIES } from './constants';

/**
 * установит переменную --vh,
 * для получения фактической высоты окна браузера (ios fix)
 */
export const setVh = () => {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}

/**
 * Format a number with spaces (thousands separators)
 * @param {number} number Number to be formatted
 * @returns {string} Formatted number as string
 */
export function formatNumberWithSpaces(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}


    /**
     * Selects a plural form based on the number.
     * @param {string[]} forms Array of plural form. The length of the array should be 3.
     * @param {number} n Number to be used for plural form selection.
     * @returns {string} The selected plural form.
     */
export const plural = (forms, n) => {
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

export const isMatchMedia = (breakpoint) => {
    const isExist = Object.keys(MEDIA_QUERIES).includes(breakpoint);

    if (isExist) {
        return window.matchMedia(`(min-width: ${MEDIA_QUERIES[breakpoint]})`).matches
    }

    throw Error(`breakpoint ${breakpoint} not exist in MEDIA_QUERIES`);
}

export const useMatchMedia = (breakpoint, cb) => {
    const isMatch = window.matchMedia(`(min-width: ${MEDIA_QUERIES[breakpoint]})`);
    isMatch.addEventListener('change', (mql) => {
        cb(mql.matches);
    });
};
