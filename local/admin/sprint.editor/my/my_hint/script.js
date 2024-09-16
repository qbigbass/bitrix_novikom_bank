sprint_editor.registerBlock('my_hint', function ($, $el, data) {
    data = $.extend({
        heading: '',
        value: '',
    }, data);

    this.getData = function () {
        return data;
    };

    this.collectData = function () {
        data.heading = $el.children('.sp-heading-hint').val();
        data.value = $el.children('.sp-hint').val();
        return data;
    };

    this.afterRender = function () {};
});
