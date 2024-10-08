<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)) {?>
    <?$xlCollSize = 4;?>
    <?foreach ($arResult as $columnItems) {?>
        <div class="col-12 col-md-6 col-lg-4 col-xl-<?=$xlCollSize++?>">
            <div class="d-flex flex-column row-gap-3">
                <?foreach ($columnItems as $item) {?>
                    <a href="<?=$item['LINK']?>" class="text-s dark-70">
                        <?=$item['TEXT']?>
                    </a>
                <?}?>
            </div>
        </div>
    <?}?>
<?php }?>
