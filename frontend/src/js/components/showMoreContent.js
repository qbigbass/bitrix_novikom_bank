const ELEMS = {
    links: '.js-more-content-link',
    removeClass: 'd-none',
}

function removeHideClass(id) {
    if (!id) return false;
    const wrapper = document.getElementById(id);
    if (!wrapper) return false;

    const hideColumns = wrapper.querySelectorAll(`.${ELEMS.removeClass}`);
    hideColumns.forEach((column) => {
        column.classList.remove(ELEMS.removeClass);
    })
}

function handlerClickMoreLink(e) {
    const thisLink = e.target.closest(ELEMS.links);
    const idWrapper = thisLink.dataset.target;

    removeHideClass(idWrapper);
    thisLink.classList.add(ELEMS.removeClass);
}

function showMoreContent() {
    const moreLinks = document.querySelectorAll(ELEMS.links);

    moreLinks.forEach((link) => {
      link.addEventListener('click', handlerClickMoreLink)
    })
}

export default showMoreContent;
