const ELEMENTS = {
    searchInput: '#header-input-search',
}

function initHeaderSearchForm() {
    const searchInput = document.querySelector(ELEMENTS.searchInput);

    if (!searchInput) return;

    const urlParams = new URLSearchParams(window.location.search);
    const queryParam = urlParams.get('q');

    searchInput.value = queryParam;
}

export default initHeaderSearchForm;
