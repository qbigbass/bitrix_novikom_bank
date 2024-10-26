// import $ from "../vendors/jquery.min";
import $ from "jquery";
// import "select2/dist/css/select2.css";
import select2 from "../vendors/select2.min";

const SELECT2_CLASSES = {
    root: '.js-select',
    smallSize: 'form-select--size-small',
    selectSmallClass: 'select2-selection--size-small',
}

const defaultSelectOptions = {
    minimumResultsForSearch: -1,
    width: '100%',
}


function initSelect2() {
    $(SELECT2_CLASSES.root).each(function() {
        const options = {...defaultSelectOptions};
        if ($(this).hasClass(SELECT2_CLASSES.smallSize)) {
            options.selectionCssClass = SELECT2_CLASSES.selectSmallClass
        }
        $(this).select2(options);
    });
}

export default initSelect2;
