const DATEPICKER_CLASSES = {
    root: '.js-date',
    todayIsMaxDate: 'js-date--today-max',
    todayIsMinDate: 'js-date--today-min',
    isRange: 'js-date--range',
}

const datepickerPrevButton = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"> <path stroke="#55246A" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m14.5 6-5 6 5 6"/> </svg>';
const datepickerNextButton = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"> <path stroke="#55246A" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9.5 6 5 6-5 6"/> </svg>';

const defaultDatepickerOptions = {
    multipleDatesSeparator: ' - ',
    prevHtml: datepickerPrevButton,
    nextHtml: datepickerNextButton,
    navTitles: {
        days: 'MMMM, yyyy',
    },
    onRenderCell({date, cellType}) {
        let cellText = '';

        if (cellType === 'day') {
            cellText = date.getDate();
        } else if (cellType === 'year') {
            cellText = date.getFullYear();
        } else if (cellType === 'month') {
            cellText = date.toLocaleString('default', { month: 'long' }).slice(0, 3);
        }

        return {
            html: `<div class="air-datepicker-cell-text">${cellText}</div>`
        }
    },
    onHide(isFinished) {
        const hideCustomEvent = new CustomEvent('hide');
        hideCustomEvent.isFinished = isFinished;

        document.querySelector(DATEPICKER_CLASSES.root).dispatchEvent(hideCustomEvent);
    }
}


function initDatepicker() {
    $(DATEPICKER_CLASSES.root).each(function(index, element) {
        const options = {...defaultDatepickerOptions};
        if ($(this).hasClass(DATEPICKER_CLASSES.isRange)) {
            options.range = true;
        }
        if ($(this).hasClass(DATEPICKER_CLASSES.todayIsMaxDate)) {
            options.maxDate = new Date();
        }
        if ($(this).hasClass(DATEPICKER_CLASSES.todayIsMinDate)) {
            options.minDate = new Date();
        }

        new AirDatepicker(element, options);
    });
}
