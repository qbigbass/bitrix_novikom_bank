$(function () {

    $('#pagination-select')
        .select2({
            minimumResultsForSearch: -1,
            width: '100%',
            placeholder: () => {
                $(this).data('placeholder');
            },
            selectionCssClass: 'select2-selection--size-small'
        })
        .on('select2:select', function (e) {
            location.href = e.target.value
        })

})
