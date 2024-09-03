<?php

/** @var $block array */
$elements = Sprint\Editor\Blocks\IblockElements::getList($block, [
    'select' => [
        'PROPERTY_SVG_FILE',
        'PROPERTY_BUTTON_OUTPUT',
        'PROPERTY_BUTTON_TEXT',
        'PROPERTY_BUTTON_LINK',
        'PROPERTY_LINK',
        'PROPERTY_LINK_TEXT',
    ],
]);
?>

<section class="section-layout section-how-apply-card">
    <div class="content-container">
        <div class="section-how-apply-card__container">
            <div class="a-accordion js-a-accordion a-accordion-layout">
                <div class="a-accordion-panel js-a-accordion-panel">
                    <button class="a-accordion-header js-a-accordion-header section-how-apply-card__accordion-header">
                        <h3 class="headline-2">Как оформить карту</h3>
                        <span class="a-icon a-accordion-header__icon size-m">
                            <svg>
                                <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                            </svg>
                        </span>
                    </button>
                    <div class="a-accordion-content js-a-accordion-content section-how-apply-card__accordion-content">
                        <div class="section-how-apply-card__content">
                            <h3 class="section-how-apply-card__title headline-2">Как оформить карту</h3>
                            <div class="display-stepper steps-3">
                                <? foreach ($elements as $element) { ?>
                                    <div class="display-stepper-item">
                                        <div class="display-stepper-item__header">
                                            <div class="display-stepper-item__icon">
                                                <img src="<?= CFile::GetPath($element['PROPERTY_SVG_FILE_VALUE']) ?>" class="a-icon size-xl" alt="<?= $element['NAME'] ?>" loading="lazy">
                                            </div>
                                        </div>
                                        <div class="display-stepper-item__content">
                                            <div class="headline-3"><?= $element['NAME'] ?></div>
                                            <div class="a-rte body-l-light">
                                                <p><?= $element['PREVIEW_TEXT'] ?></p>
                                            </div>
                                            <? if (!empty($element['PROPERTY_BUTTON_TEXT_VALUE']) && $element['PROPERTY_BUTTON_OUTPUT_VALUE'] == 'Да') { ?>
                                                <a href="<?= $element['PROPERTY_BUTTON_LINK_VALUE'] ?>" class="a-button a-button--lm a-button--primary a-button--link">Оформить карту</a>
                                            <? } ?>
                                            <? if (!empty($element['PROPERTY_LINK_VALUE']) && !empty($element['PROPERTY_LINK_TEXT_VALUE'])) { ?>
                                                <a href="<?= $element['PROPERTY_LINK_VALUE'] ?>" class="a-button a-button--lm a-button--primary a-button--link a-button--text"><?= $element['PROPERTY_LINK_TEXT_VALUE'] ?>
                                                    <span class="a-icon a-button__icon">
                                                        <svg>
                                                            <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                                                        </svg>
                                                    </span>
                                                </a>
                                            <? } ?>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
