// import $ from "../vendors/jquery.min";
// import $ from "jquery";
// import "select2/dist/css/select2.css";
import select2 from "../vendors/select2.min";

const SELECT2_CLASSES = {
    root: '.js-select',
    smallSize: 'form-select--size-small',
    largeSize: 'form-select--size-large',
    lgLargeSize: 'form-select--size-lg-large',
    smallLgSize: 'form-select--size-small-lg',
    selectSmallClass: 'select2-selection--size-small',
    selectLargeClass: 'select2-selection--size-large',
    selectLgLargeClass: 'select2-selection--size-lg-large',
    selectSmallLgClass: 'select2-selection--size-small-lg',
}

const defaultSelectOptions = {
    minimumResultsForSearch: -1,
    width: '100%',
    placeholder: () => {
        $(this).data('placeholder');
    },
}


function initSelect2() {
    $(SELECT2_CLASSES.root).each(function () {
        const options = {...defaultSelectOptions};
        if ($(this).hasClass(SELECT2_CLASSES.smallSize)) {
            options.selectionCssClass = SELECT2_CLASSES.selectSmallClass
        }
        if ($(this).hasClass(SELECT2_CLASSES.largeSize)) {
            options.selectionCssClass += ' ' + SELECT2_CLASSES.selectLargeClass
        }
        if ($(this).hasClass(SELECT2_CLASSES.lgLargeSize)) {
            options.selectionCssClass += ' ' + SELECT2_CLASSES.selectLgLargeClass
        }
        if ($(this).hasClass(SELECT2_CLASSES.smallLgSize)) {
            options.selectionCssClass += ' ' + SELECT2_CLASSES.selectSmallLgClass
        }
        $(this).select2(options);
    });
}

export default initSelect2;
