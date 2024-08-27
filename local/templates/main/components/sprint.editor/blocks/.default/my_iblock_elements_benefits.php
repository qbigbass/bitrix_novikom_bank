<?php

/** @var $block array */
$elements = Sprint\Editor\Blocks\IblockElements::getList($block, [
    'select' => ['PREVIEW_PICTURE','PROPERTY_TITLE', 'PROPERTY_BUTTON', 'PROPERTY_BUTTON_LINK','PROPERTY_TITLE_VALUE'],
]);
?>

<section class="section-layout">
    <div class="content-container">
        <div class="section-title section-title--padding">
            <h3 class="section-title__text headline-2">
                Подключите выгоду
            </h3>
        </div>
        <div class="slider-skeleton swiper persistent-slider js-persistent-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:40">
            <div class="swiper-wrapper js-swiper-wrapper">
                <? foreach($elements as $element) { ?>
                    <div class="swiper-slide js-swiper-slide">
                        <div class="offer-card offer-card--green">
                            <div class="offer-card__inner">
                                <div class="offer-card__content">
                                    <h3 class="offer-card__title headline-3"><?= $element['NAME'] ?></h3>
                                    <div class="text-indicating-benefits">
                                        <div class="text-indicating-benefits-head violet-100">
                                            <span class="body-l-heavy">до</span>
                                            <span class="number-l-heavy"><?= $element['PROPERTY_TITLE_VALUE'] ?></span>
                                            <? if (!empty($element['PROPERTY_TITLE_VALUE_VALUE'])) { ?>
                                                <span class="body-l-heavy"><?= $element['PROPERTY_TITLE_VALUE_VALUE'] ?></span>
                                            <? } ?>
                                        </div>
                                    </div>
                                    <p class="offer-card__description body-m-light"><?= htmlspecialchars_decode($element['PREVIEW_TEXT']) ?></p>
                                </div>
                                <img class="offer-card__img" src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="" loading="lazy">
                                <? if ($element['PROPERTY_BUTTON_VALUE'] == 'Да') { ?>
                                    <a class="a-button offer-card__link a-button--m a-button--primary a-button--link">Участвовать</a>
                                <? } ?>
                            </div>
                        </div>
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
