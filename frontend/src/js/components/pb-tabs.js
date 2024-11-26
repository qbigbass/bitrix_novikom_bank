const ELEMENTS = {
  wrapper: '.pb__services',
  nav: '.pb__services-header',
  tabs: '.pb__services-tabs',
  btn: '.pb__services-header-item',
  tab: '.pb__services-tab',
  active: '.tab-active'
}

const CLASSES = {
  active: 'tab-active'
}

export const initPbServicesTabs = () => {
  const wrapper = document.querySelector(ELEMENTS.wrapper);
  if (!wrapper) return;

  const navElem = wrapper.querySelector(ELEMENTS.nav);
  const tabsElem = wrapper.querySelector(ELEMENTS.tabs);
  if (!navElem || !tabsElem) return;

  navElem.addEventListener('click', (event) => {
    const btn = event.target.closest(ELEMENTS.btn);
    if (!btn || btn.classList.contains(ELEMENTS.active)) return;
    navElem.querySelector(ELEMENTS.active).classList.remove(CLASSES.active);
    tabsElem.querySelector(ELEMENTS.active).classList.remove(CLASSES.active);
    btn.classList.add(CLASSES.active);
    tabsElem.querySelector(`[data-order='${btn.dataset.order}']`).classList.add(CLASSES.active);
  });
};
