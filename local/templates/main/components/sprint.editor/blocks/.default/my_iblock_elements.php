<?php

/** @var $block array */
$elements = Sprint\Editor\Blocks\IblockElements::getList($block, [
    'select' => ['PROPERTY_SVG_ID'],
]);
?>

<section class="section-layout section-benefits section-benefits--bg section-layout--bg-undefined">
    <div class="content-container">
        <div class="section-benefits__container">
            <h3 class="section-benefits__title headline-2">Преимущества карты Мир Supreme</h3>
            <div class="section-benefits__content">
                <div class="benefit-cards-layout max-cols-2">
                    <? foreach ($elements as $element) { ?>
                        <div class="benefit-text-card">
                            <div class="benefit-text-card__icon">
                                <span class="a-icon size-xll">
                                    <svg>
                                        <use xlink:href="/frontend/build/assets/svg-sprite.svg#<?= $element['PROPERTY_SVG_ID_VALUE'] ?>"></use>
                                    </svg>
                                </span>
                            </div>
                            <h3 class="benefit-text-card__title headline-3"><?= $element['NAME'] ?></h3>
                            <p class="benefit-text-card__description body-m-light"><?= $element['PREVIEW_TEXT'] ?></p>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</section>
