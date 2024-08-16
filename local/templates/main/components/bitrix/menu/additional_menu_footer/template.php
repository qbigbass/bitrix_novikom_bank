<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)) {?>
    <div class="a-footer-info__nav a-footer-info-nav">
        <?foreach ($arResult as $columnItems) {?>
            <div class="a-footer-info-nav__col">
                <?foreach ($columnItems as $item) {?>
                    <a href="<?=$item['LINK']?>" class="a-footer-nav-link">
                        <?=$item['TEXT']?>
                    </a>
                <?}?>
            </div>
        <?}?>
    </div>
<?php }?>
