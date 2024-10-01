/**
 * установит переменную --vh,
 * для получения фактической высоты окна браузера (ios fix)
 */
export const setVh = () => {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}
