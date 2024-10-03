sprint_editor.registerBlock('my_loan_calculator', function ($, $el, data) {

    data = $.extend({
        items: [{
          rate: '',
          sum_from: '',
          sum_up_to: '',
          term_from: '',
          term_up_to: '',
          program_type_id: '',
          insurance: false,
        }],
    }, data);

    this.getData = function () {
      return data;
    };

    this.collectData = function () {
        data.items = [];

        var $container = $el.children('.sp-acc-container');

        $container.children('.sp-acc-tab').each(function () {
            var $tabBlocks = $(this).children('.sp-acc-blocks');
            var $tabBtn1 = $(this).children('.sp-acc-header')

            var tab = {
                collapsed: $(this).hasClass('sp-collapsed'),
                rate: $tabBlocks.find('.sp-rate').val(),
                sum_from: $tabBlocks.find('.sp-sum-from').val(),
                sum_up_to: $tabBlocks.find('.sp-sum-up-to').val(),
                term_from: $tabBlocks.find('.sp-term-from').val(),
                term_up_to: $tabBlocks.find('.sp-term-up-to').val(),
                insurance: $tabBlocks.find('.sp-insurance').prop('checked'),
                program_type_id: $tabBtn1.find('.sp-program-type-value option:selected').val()
            };

            data.items.push(tab);
        });

        return data;
    };

    this.afterRender = function () {
        var $container = $el.children('.sp-acc-container');
        var $addTabBtn = $el.children('.sp-acc-add');
        let loanProgramTypes = getLoanProgramTypes();

        $.each(data.items, function (index, item) {
          item.loan_program_types = loanProgramTypes;
          addTab(item);
        });

        $container.sortable({
            items: "> .sp-acc-tab",
            handle: ".sp-acc-tab-handle",
        });

        $addTabBtn.on('click', function (e) {
            addTab({
                rate: '',
                sum_from: '',
                sum_up_to: '',
                term_from: '',
                term_up_to: '',
                program_type_id: '',
                insurance: false,
                loan_program_types: loanProgramTypes,
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
          var $tab = $(sprint_editor.renderTemplate('my_loan_calculator-tab', {
                rate: tabData.rate,
                sum_from: tabData.sum_from,
                sum_up_to: tabData.sum_up_to,
                term_from: tabData.term_from,
                term_up_to: tabData.term_up_to,
                loan_program_types: tabData.loan_program_types,
                program_type_id: tabData.program_type_id,
                insurance: tabData.insurance
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

        function getLoanProgramTypes() {
            let loanProgramTypes = [];

            $.ajax({
                url: sprint_editor.getBlockWebPath('my_loan_calculator') + '/loan_program_types.php',
                type: 'post',
                data: {},
                async: false,
                dataType: 'json',
                success: function (result) {
                  loanProgramTypes = result;
                },
                error: function (error) {
                  console.error(error.responseText);
                }
            });

            return loanProgramTypes;
        }
    };
});
