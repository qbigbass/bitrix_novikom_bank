export function initTabsContentEvents() {
    const tabsCollapseArray = document.querySelectorAll('.tabs-with-content .collapse');

    tabsCollapseArray.forEach((el) => {
        const linkEl = document.querySelector(`.tabs-panel__list-item-link[data-bs-target="#${el.id}"`);

        el.addEventListener('show.bs.collapse', event => linkEl.classList.add('active'))
        el.addEventListener('hide.bs.collapse', event => linkEl.classList.remove('active'))
    });
}