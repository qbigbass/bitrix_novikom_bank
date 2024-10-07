export function initTabsContent() {
    const tabsCollapseArray = document.querySelectorAll('.tabs-with-content .collapse');

    tabsCollapseArray.forEach((el) => {
        const linkEl = document.querySelector(`.tabs-panel__list-item-link[data-bs-target="#${el.id}"`);

        if (linkEl.classList.contains('active')) {
            el.classList.add('show');
        }

        el.addEventListener('show.bs.collapse', event => linkEl.classList.add('active'))
        el.addEventListener('hide.bs.collapse', event => linkEl.classList.remove('active'))
    });
}