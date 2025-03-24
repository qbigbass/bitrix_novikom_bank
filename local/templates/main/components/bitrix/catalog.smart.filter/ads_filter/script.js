function setFilter(select) {
    window.location.href = select.value;
}

$(document).ready(function () {
    $('.js-date').on('select', function () {
        const selectedDate = $(this).val();
        if (selectedDate.includes(' - ')) {
            $(this).closest('form').submit();
        }
    });
});
