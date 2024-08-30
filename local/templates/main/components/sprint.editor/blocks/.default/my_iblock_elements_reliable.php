<?php

/** @var $block array */
$elements = Sprint\Editor\Blocks\IblockElements::getList($block, [
    'select' => ['PREVIEW_PICTURE','PROPERTY_SVG_FILE'],
]);
?>
<section class="section-layout">
    <div class="content-container">
        <div class="section-title section-title--padding">
            <h3 class="section-title__text headline-2">
                Надёжно и удобно
            </h3>
        </div>
        <div class="slider-skeleton swiper expandable-slider js-expandable-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3" data-space-between="mobile-s:8,mobile:8,tablet:8,laptop:8" data-rebuilding-slides="mobile" data-visible-slides="3">
            <div class="swiper-wrapper js-swiper-wrapper">
                <? foreach ($elements as $element) { ?>
                    <div class="swiper-slide js-swiper-slide">
                        <div class="benefit-card benefit-card--grey">
                            <div class="benefit-card__title">
                                <div class="headline-3"><?= $element['NAME'] ?></div>
                            </div>
                            <div class="benefit-card__description body-m-light"><?= $element['PREVIEW_TEXT'] ?></div>
                            <div class="benefit-card__footer">
                                <img src="<?= CFile::GetPath($element['PROPERTY_SVG_FILE_VALUE']) ?>" class="a-icon green-100 size-xxl" alt="" loading="lazy">
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <button class="a-button expandable-slider__trigger js-expandable-slider-trigger a-button--m a-button--primary a-button--text">Все предложения
                <span class="a-icon a-button__icon">
                    <svg>
                        <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </span>
            </button>
            <div class="slider-skeleton__controls">
                <div class="slider-controls js-swiper-controls">
                    <div class="slider-controls__pagination js-swiper-pagination"></div>
                    <div class="slider-controls__navigation js-swiper-nav">
                        <button type="button" class="swiper-button-prev js-swiper-prev">
                            <span class="a-icon size-m">
                                <svg>
                                    <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                            </span>
                        </button>
                        <button type="button" class="swiper-button-next js-swiper-next">
                            <span class="a-icon size-m">
                                <svg>
                                    <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
