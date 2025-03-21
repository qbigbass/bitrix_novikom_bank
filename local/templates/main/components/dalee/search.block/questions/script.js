$(document).ready(function () {
    let input = $('[data-type="search"]');
    let form = $('form#search');

    if (input.val().length) {
        filter(input.val());
    }

    input.on('input', function () {
        filter($(this).val().trim());
    });

    form.on('submit', function (e) {
        e.preventDefault();
        let str = input.val().trim();
        let action = $(this).attr('action');
        window.location.href = action + (str ? '?q=' + str : '') + "#links";
    });
});

function filter(str) {
    $('.accordion-item').each(function () {
        if ($(this).find('button').length > 0) {
            let title = $(this).find('button').data('item-name');

            if (!title.toLowerCase().includes(str.toLowerCase())) {
                $(this).parent('.accordion').parent('div').hide();
            } else {
                $(this).parent('.accordion').parent('div').show();
            }
        }
    });
}
