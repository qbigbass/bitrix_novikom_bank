sprint_editor.registerBlock('my_loan_condition', function ($, $el, data) {
    data = $.extend({
        small_text: '',
        main_text: '',
        condition_name: '',
    }, data);


    this.getData = function () {
        return data;
    };

    this.collectData = function () {
        data.small_text = $el.children('#small_text').val();
        data.main_text = $el.children('#main_text').val();
        data.condition_name = $el.children('#condition_name').val();

        return data;
    };

    this.afterRender = function () {

    };
});
