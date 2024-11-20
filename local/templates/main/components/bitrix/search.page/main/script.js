$(function () {

    const searchForm = $('#search-form');
    const searchHowSelector = $('#search-how-selector');
    const searchHowInput = $('#search-how-input');
    const searchDatepicker = $('#search-datepicker');

    // Синхронизируем строки запроса мобильной и десктопной версии
    $('#input-search-mobile').on('input', function () {
        $('#input-search-desktop').val($(this).val());
    });
    $('#input-search-desktop').on('input', function () {
        $('#input-search-mobile').val($(this).val());
    });

    // Переключатель сортировки по релевантности или дате
    searchHowSelector.find('.nav-item').click(function (e) {
        e.preventDefault();
        searchHowSelector.find('.nav-link').each(function () {
            $(this).removeClass('active');
        });
        const activeLink = $(this).find('.nav-link');
        activeLink.addClass('active');
        if (activeLink.attr('href') === '#to-date') {
            searchHowInput.val('d');
        } else {
            searchHowInput.val('');
        }
        searchForm.submit();
    });

    // Смена даты в дейтепикере
    const searchDatepickerValue = searchDatepicker.val();

    searchDatepicker.on('hide', (event, isFinished) => {
        const searchDatepickerNewValue = searchDatepicker.val();

        if (isFinished && searchDatepickerNewValue !== searchDatepickerValue) {
            searchForm.submit();
        }
    });

});
