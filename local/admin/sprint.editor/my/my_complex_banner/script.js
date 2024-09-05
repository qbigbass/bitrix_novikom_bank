sprint_editor.registerBlock('my_complex_banner', function ($, $el, data) {
    var areas = [
      {
        "blockName": "htag",
        "dataKey": "htag",
        "container": ".sp-area-2"
      },
      {
        "blockName": "text",
        "dataKey": "text",
        "container": ".sp-area-3"
      },
      {
          "blockName": "image",
          "dataKey": "image",
          "container": ".sp-area-4"
      }
];

    this.getData = function () {
        return data;
    };

    this.collectData = function () {
        data.tag = $el.find('input[name=tag]').val();
        data.button_name = $el.find('input[name=button_name]').val();
        data.button_link = $el.find('input[name=button_link]').val();
        return data;
    };

    this.getAreas = function () {
        return areas;
    };
});
