<?php
/** @var $block array */
?>
<div class="a-table col-2 md:in-column">
    <div class="a-table-body">
        <?foreach($block['elements'] as $element){?>
            <div class="a-table-row">
                <div class="a-table-cell body-l-heavy dark-70">
                    <?=$element['name']?>
                </div>
                <div class="a-table-cell body-l-light">
                    <?=$element['text']?>
                </div>
            </div>
        <?}?>
    </div>
</div>

