sprint_editor.registerBlock('my_benefit_item', function ($, $el, data) {
    var areas = [
        {
            "blockName": "image",
            "dataKey": "image",
            "container": ".sp-area-1"
        },
        {
            "blockName": "text",
            "dataKey": "text",
            "container": ".sp-area-2"
        }
    ];

    data = $.extend({
        heading: '',
    }, data);

    this.getData = function () {
        return data;
    };

    this.collectData = function () {
        data.heading = $el.find('.sp-heading').val();
        return data;
    };

    this.getAreas = function () {
        return areas;
    };
});
