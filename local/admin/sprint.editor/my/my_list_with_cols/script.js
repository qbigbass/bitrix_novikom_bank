sprint_editor.registerBlock('my_list_with_cols', function ($, $el, data, settings) {

    data = $.extend({
        elements: [{name: '', text: ''}, {name: '', text: ''}]
    }, data);

    this.getData = function () {
        return data;
    };

    this.collectData = function () {

        function collectElements($container) {
            var result = [];

            $container.children('.sp-item').each(function () {

                var text = $.trim(
                    $(this).children('.list-row').children('.sp-item-text').val()
                );

                var name = $.trim(
                    $(this).children('.list-row').children('.sp-item-name').val()
                );

                var elements = collectElements(
                    $(this).children('.sp-subitems'),
                );

                result.push({
                    text: text,
                    name: name,
                    elements: elements
                })
            });

            return result;
        }

        data.elements = collectElements(
            $el.find('.sp-lists-result'),
        );

        return data;
    };


    this.afterRender = function () {
        var $res = $el.find('.sp-lists-result');

        $res.sortable({
            items: ".sp-item",
            handle: ".sp-item-handle",
        });

        $res.html(
            renderItems(data)
        )

        function renderItems(block) {
            var html = '';
            if (block.elements && block.elements.length > 0) {
                $.each(block.elements, function (index, item) {
                    var text = sprint_editor.renderString('{{!it.text}}', item)
                    var name = sprint_editor.renderString('{{!it.name}}', item)
                    html += '' +
                        '<div class="sp-item">' +
                        '   <div class="list-row">' +
                        '       <input class="sp-item-name" type="text" placeholder="Название" value="' + name + '"/>' +
                        '       <input class="sp-item-text" type="text" placeholder="Текст" value="' + text + '"/>' +
                        '   </div>' +
                        '   <div class="sp-item-group">' +
                        '       <span class="sp-item-add sp-x-btn">+</span>' +
                        '       <span class="sp-item-handle sp-x-btn">&uarr;&darr;</span>' +
                        '       <span class="sp-item-del sp-x-btn">x</span>' +
                        '   </div>' +
                        '   <div class="sp-subitems">' + renderItems(item) + '</div>' +
                        '</div>';
                });
            }
            return html;
        }


        $el.on('click', '.sp-item-add', function (e) {
            addItem($(this).closest('.sp-item').children('.sp-subitems'));
        });

        $el.on('click', '.sp-item-del', function (e) {
            e.preventDefault();
            $(this).closest('.sp-item').remove();
        });

        $el.on('keypress', '.sp-item-text', function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                addItem($(this).closest('.sp-item').parent(), true);
            }
        });

        $el.on('click', '.sp-lists-add', function (e) {
            e.preventDefault();
            addItem($res, false);
        });

        function addItem($container, focus) {
            $container.append(
                renderItems({
                    elements: [{name: '', text: ''}]
                })
            );

            if (focus) {
                $container.find('.sp-item-text').last().focus();
            }
        }
    }
});
