<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)) {?>
    <div data-slides-per-view="mobile-s:auto,mobile:auto,tablet:auto,laptop:auto" data-space-between="mobile-s:16,mobile:16,tablet:16,laptop:16" data-active-on-mq="mobile-s" class="swiper slider-skeleton js-slider">
        <div class="swiper-wrapper js-swiper-wrapper">
            <?foreach ($arResult as $item) {?>
                <div class="swiper-slide">
                    <?$isActive = ($item['SELECTED']) ? ' is-active' : '';?>
                    <a href="<?=$item['LINK']?>" class="bosy-s-light<?=$isActive?>"><?=$item['TEXT']?></a>
                </div>
            <?}?>
        </div>
        <div class="slider-skeleton__controls">
            <div class="slider-controls js-swiper-controls">
                <div class="slider-controls__pagination js-swiper-pagination"></div>
                <div class="slider-controls__navigation js-swiper-nav">
                    <button type="button" class="swiper-button-prev js-swiper-prev">
                        <span class="a-icon size-m">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                            </svg>
                        </span>
                    </button>
                    <button type="button" class="swiper-button-next js-swiper-next">
                        <span class="a-icon size-m">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php }?>
