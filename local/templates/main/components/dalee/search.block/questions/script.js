$(document).ready(function () {
    let input = $(document).find('[data-type="search"]');
    let str = input.val();

    if (str.length) {
        filter(str);
    }

    $(document).on('input', input, function (e) {
        let str = e.target.value
        filter(str);
        setFilterHref(str, $('#btn-search'));
    });
});

function filter(str) {
    $('.accordion-item').each(function () {
        if ($(this).find('button').length > 0) {
            let title = $(this).find('button').data('item-name');

            if (!title.toLowerCase().includes(str)) {
                $(this).parent('.accordion').parent('div').hide();
            } else {
                $(this).parent('.accordion').parent('div').show();
            }
        }
    });
}

function setFilterHref(str, btn) {
    let baseUrl = btn.attr('href').split('?')[0].split('#')[0];
    let query = str ? '?q=' + encodeURIComponent(str) : '';
    let anchor = '#links';

    btn.attr('href', baseUrl + query + anchor);
}
