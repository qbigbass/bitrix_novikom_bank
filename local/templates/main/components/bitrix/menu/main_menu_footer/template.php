<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)) {?>
    <div class="a-footer-nav a-footer__nav">
        <?foreach ($arResult as $col => $items) {?>
            <div class="a-footer-nav__col">
                <?foreach ($items as $item) {?>
                    <?$class = ($item['HEAD_LINK']) ? 'a-footer-nav-head-link' : 'a-footer-nav-link'?>
                    <a href="<?=$item['LINK']?>" class="<?=$class?>">
                        <?=$item['TEXT']?>
                    </a>
                <?}?>
            </div>
        <?}?>
    </div>
<?php }?>
