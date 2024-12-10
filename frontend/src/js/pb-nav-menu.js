const ELEMS_PB_NAV = {
  navMenu: '.js-pb-nav-menu',
  button: '.js-pb-menu-btn',
  openClass: 'is-open',
  hideClass: 'd-none',
  overflowClass: 'overflow-hidden',
}

const pbNavMenu = () => {
  const menu = document.querySelector(ELEMS_PB_NAV.navMenu);
  const button = document.querySelector(ELEMS_PB_NAV.button);
  const pageWrapper = document.querySelector('body');

  if (!menu || !button) return;

  button.addEventListener('click', () => {
    if (menu.classList.contains(ELEMS_PB_NAV.hideClass)) {
      button.classList.add(ELEMS_PB_NAV.openClass);
      menu.classList.remove(ELEMS_PB_NAV.hideClass);
      pageWrapper.classList.add(ELEMS_PB_NAV.overflowClass);
    } else {
      button.classList.remove(ELEMS_PB_NAV.openClass);
      menu.classList.add(ELEMS_PB_NAV.hideClass);
      pageWrapper.classList.remove(ELEMS_PB_NAV.overflowClass);
    }
  });
}

export default pbNavMenu;
