<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {?>
    <div class="swiper js-swiper-mobile-menu">
        <div class="swiper-wrapper">
            <?foreach ($arResult as $item) {?>
                <div class="swiper-slide">
                    <?$isActive = ($item['SELECTED']) ? ' is-active' : '';?>
                    <a class="text-s<?=$isActive?>" href="<?=$item['LINK']?>"><?=$item['TEXT']?></a>
                </div>
            <?}?>
        </div>
    </div>
<?}?>
