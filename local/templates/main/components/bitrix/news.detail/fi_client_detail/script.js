$(document).ready(function () {
    $(document).on('input', '[data-type="search"]', function (e) {
        let str = e.target.value
        filter(str);
    });
});

function filter(str) {
    $('.accordion-item').each(function () {
        if ($(this).find('button').length > 0) {
            let title = $(this).find('button').data('item-name');

            if (!title.toLowerCase().includes(str)) {
                $(this).hide();
            } else {
                $(this).show();
            }
        }
    });
}
