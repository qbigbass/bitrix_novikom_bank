$(document).ready(function () {
    /* Фильтр по типу объявления для desktop */
    $(document).on('click', '[data-setFilter=Y]', function(e){
        e.preventDefault();
        let link = $(this).data('filter');
        let dateFilter = '';
        let arDateFilter = [];

        if ($('input[name=date1]').val()) {
            dateFilter = $('input[name=date1]').val();
            arDateFilter = dateFilter.split(' - ');
        }

        link = addFilterLink(arDateFilter, link);
        location.href = link;
    });

    $(document).on('click', '[data-clearFilter=Y]', function(e){
        e.preventDefault();
        let link = $(this).data('filter');
        location.href = link;
    });
});

/* Фильтр по типу объявления для mobile */
function setFilter(select) {
    let link = '';
    let dateFilter = '';
    let arDateFilter = [];

    if ($('input[name=date1]').val()) {
        dateFilter = $('input[name=date1]').val();
        arDateFilter = dateFilter.split(' - ');
    }

    let clearFilter = true;

    for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].selected) {
            link = $(select.options[i]).data('filter');

            if ($(select.options[i]).data('setfilter')) {
                clearFilter = false;
            }
        }
    }

    if (clearFilter) {
        location.href = link;
    }

    link = addFilterLink(arDateFilter, link);
    location.href = link;
}

function addFilterLink(arDateFilter, strLink) {
    let link = strLink;

    if (arDateFilter.length > 0 && arDateFilter[0] !== "" && link !== "") {
        let dFrom = arDateFilter[0];
        link += '&propDateFrom=' + dFrom;

        if (arDateFilter[1]) {
            let dTo = arDateFilter[1];
            link += '&propDateTo=' + dTo;
        }
    }

    return link;
}
