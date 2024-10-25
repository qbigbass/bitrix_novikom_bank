<?php

/** @var $block array */
$elements = Sprint\Editor\Blocks\IblockElements::getList($block, [
    'select' => ['PREVIEW_PICTURE'],
]);
?>
<section class="section-layout section-discount-links">
    <div class="content-container">
        <div class="section-discount-links__container">
            <div class="section-title">
                <h3 class="section-title__text headline-2">
                    Скидки
                </h3>
            </div>
            <div class="slider-skeleton swiper persistent-slider js-persistent-slider" data-slides-per-view="mobile-s:1.5,mobile:1.5,tablet:3,tablet-album:4,laptop:5" data-space-between="mobile-s:16,mobile:16,tablet:16,laptop:40">
                <div class="swiper-wrapper js-swiper-wrapper">
                    <? foreach ($elements as $element) {?>
                        <div class="swiper-slide js-swiper-slide">
                            <a class="discount-link" href="#">
                                <img class="discount-link__icon" src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="<?= $element['NAME'] ?>" loading="lazy">
                                <span class="discount-link__text headline-4"><?= $element['NAME'] ?></span>
                            </a>
                        </div>
                    <? } ?>
                </div>
                <div class="slider-skeleton__controls">
                    <div class="slider-controls js-swiper-controls">
                        <div class="slider-controls__pagination js-swiper-pagination"></div>
                        <div class="slider-controls__navigation js-swiper-nav">
                            <button type="button" class="swiper-button-prev js-swiper-prev">
                                <span class="a-icon size-m">
                                    <svg>
                                        <use xlink:href="/frontend/dist/assets/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg>
                                </span>
                            </button>
                            <button type="button" class="swiper-button-next js-swiper-next">
                                <span class="a-icon size-m">
                                    <svg>
                                        <use xlink:href="/frontend/dist/assets/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
