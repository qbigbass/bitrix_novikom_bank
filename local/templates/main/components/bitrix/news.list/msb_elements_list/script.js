$(document).ready(function () {
    $(document).on('input', '[data-type="search-fondy"]', function (e) {
        let str = e.target.value
        filterFondy(str);
    });
});

function filterFondy(str) {
    // Найдем все названия фондов на странице
    $('.accordion-item').each(function () {
        if ($(this).find('.h4').length > 0) {
            let title = $(this).find('.h4').text();

            if (!title.toLowerCase().includes(str)) {
                $(this).hide();
            } else {
                $(this).show();
            }
        }
    });
}
