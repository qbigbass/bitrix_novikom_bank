sprint_editor.registerBlock('my_step_by_step_visualization', function ($, $el, data) {

    data = $.extend({
        heading: '',
        items: [{
          step_heading: '',
          step_description: '',
        }],
    }, data);

    this.getData = function () {
        return data;
    };

    this.collectData = function () {
        data.heading = $el.children('.sp-heading').val();
        data.items = [];

        var $container = $el.children('.sp-acc-container');

        $container.children('.sp-acc-tab').each(function () {
            var $tabBlocks = $(this).children('.sp-acc-blocks');

            var tab = {
                collapsed: $(this).hasClass('sp-collapsed'),
                step_heading: $tabBlocks.find('.sp-step-heading').val(),
                step_description: $tabBlocks.find('.sp-step-description').val(),
            };

            data.items.push(tab);
        });

        return data;
    };

    this.afterRender = function () {
        var $container = $el.children('.sp-acc-container');
        var $addTabBtn = $el.children('.sp-acc-add');

        $.each(data.items, function (index, item) {
          addTab(item);
        });

        $container.sortable({
            items: "> .sp-acc-tab",
            handle: ".sp-acc-tab-handle",
        });

        $addTabBtn.on('click', function (e) {
            addTab({
                step_heading: '',
                step_description: '',
            });
        });

        $el.on('click', '.sp-acc-collapse', function (e) {
            e.preventDefault();
            var $target = $(this).closest('.sp-acc-tab');

            toggleTab($target);
        });

        $el.on('click', '.sp-acc-del', function (e) {
            e.preventDefault();
            var $target = $(this).closest('.sp-acc-tab');

            $target.animate({opacity: 0}, 250, function () {
                $target.remove();
            })
        });

        $el.on('click', '.sp-acc-up', function (e) {
            e.preventDefault();
            var $block = $(this).closest('.sp-acc-tab');
            var $nblock = $block.prev('.sp-acc-tab');
            if ($nblock.length > 0) {
                $block.insertBefore($nblock);
            }
        });

        $el.on('click', '.sp-acc-dn', function (e) {
            e.preventDefault();
            var $block = $(this).closest('.sp-acc-tab');
            var $nblock = $block.next('.sp-acc-tab');
            if ($nblock.length > 0) {
                $block.insertAfter($nblock);
            }
        });

        $el.on('click', '.sp-acc-box-del', function (e) {
            e.preventDefault();
            var $box = $(this).closest('.sp-x-box');

            var uid = $box.data('uid');
            sprint_editor.beforeDelete(uid);

            $box.animate({opacity: 0}, 250, function () {
                $box.remove();
            })
        });

        $el.on('click', '.sp-acc-box-up', function (e) {
            e.preventDefault();

            var $block = $(this).closest('.sp-x-box');

            var $nblock = $block.prev('.sp-x-box');
            if ($nblock.length > 0) {
                $block.insertBefore($nblock);
                sprint_editor.afterSort($block.data('uid'));
            }
        });

        $el.on('click', '.sp-acc-box-dn', function (e) {
            e.preventDefault();

            var $block = $(this).closest('.sp-x-box');

            var $nblock = $block.next('.sp-x-box');
            if ($nblock.length > 0) {
                $block.insertAfter($nblock);
                sprint_editor.afterSort(
                    $block.data('uid')
                );
            }
        });

        function addTab(tabData) {
          var $tab = $(sprint_editor.renderTemplate('my_step_by_step_visualization-tab', {
                step_heading: tabData.step_heading,
                step_description: tabData.step_description,
            }));

            if (tabData.collapsed) {
                hideTab($tab);
            }

            $container.append($tab);

            var $tabblocks = $tab.children('.sp-acc-blocks');
            var $header = $tab.children('.sp-acc-header');

            $header.on('dblclick', function () {
                toggleTab($tab)
            });

            $tabblocks.sortable({
                items: "> .sp-x-box",
                handle: ".sp-acc-box-handle",
                connectWith: ".sp-acc-blocks",
            });
        }

        function toggleTab($tab) {
            if ($tab.hasClass('sp-collapsed')) {
                showTab($tab);
            } else {
                hideTab($tab);
            }
            sprint_editor.fireEvent('popup:hide');
        }

        function showTab($tab) {
            var $tabblocks = $tab.children('.sp-acc-blocks');

            $tabblocks.show(250, function () {
                $tab.removeClass('sp-collapsed')
            })
        }

        function hideTab($tab) {
            var $tabblocks = $tab.children('.sp-acc-blocks');

            $tabblocks.hide(250, function () {
                $tab.addClass('sp-collapsed')
            })
        }
    };
});
