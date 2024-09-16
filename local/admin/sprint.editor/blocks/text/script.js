sprint_editor.registerBlock('text', function ($, $el, data) {
    let editor;

    data = $.extend({
        value: ''
    }, data);

    this.getData = function () {
        return data;
    };

    this.collectData = function () {
      data.value = editor.getData();
      return data;
    };

    this.afterRender = function () {
        ClassicEditor
          .create(
            $el.find('.sp-text').get(0)
          ).then(newEditor => {
          editor = newEditor;
        });
    };
});
