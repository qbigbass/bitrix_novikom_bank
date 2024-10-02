import $ from "jquery"
import select2 from "select2";
import "select2/dist/css/select2.css";

const SELECT2_CLASSES = {
    root: '.js-select2',
}


function initSelect2() {
    $(SELECT2_CLASSES.root).each(function() {
        $(this).select2({
            minimumResultsForSearch: -1,
        });
    });
}

export default initSelect2;
