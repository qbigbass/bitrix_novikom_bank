$(document).ready(function () {
    $(document).on('select2:select', '.js-select', function () {
        saveFilter($(this));
    });
    $(document).on('keydown', '[data-type="search"]', function (e) {
        if (e.which === 13 || e.key === 'Enter') {
            e.preventDefault();
            saveFilter($(this));
        }
    });
});

function saveFilter(element) {
    const type = element.data('type');
    const property = element.data('property');
    const value = element.val();

    const currentUrl = new URL(window.location.href);

    if (value === 'all' || value === '') {
        currentUrl.searchParams.delete(property);
    } else {
        currentUrl.searchParams.set(property, value);
    }

    window.history.replaceState({}, '', currentUrl);
    location.reload();
}


