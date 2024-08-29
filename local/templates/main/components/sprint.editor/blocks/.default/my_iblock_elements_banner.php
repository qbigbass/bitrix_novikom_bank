<?php

/** @var $block array */
$element = Sprint\Editor\Blocks\IblockElements::getList($block, [
    'select' => ['PREVIEW_PICTURE','PROPERTY_TAG_NAME', 'PROPERTY_BUTTON', 'PROPERTY_BUTTON_LINK'],
])[0];
?>

<section class="section-layout page-banner section-layout--s">
    <div class="content-container">
        <div class="page-banner__container">
            <div class="page-banner__tag">
                <div class="a-tag a-tag--outline href">
                    <? if (!empty($element['PROPERTY_TAG_NAME_VALUE'])) { ?>
                        <span class="a-tag__content body-s-heavy">
                            <?= $element['PROPERTY_TAG_NAME_VALUE'] ?>
                        </span>
                    <? } ?>
                    <span class="a-tag__triangle">
                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <? if (!empty($element['NAME'])) { ?>
                <div class="page-banner__title">
                    <h3 class="headline-2"><?= $element['NAME'] ?></h3>
                </div>
            <? } ?>
            <div class="page-banner__content">
                <? if (!empty($element['PREVIEW_TEXT'])) { ?>
                    <div class="page-banner__text">
                        <div class="body-l-light"><?= $element['PREVIEW_TEXT'] ?></div>
                    </div>
                <? } ?>

                <? if ($element['PROPERTY_BUTTON_VALUE'] == 'Да') { ?>
                    <a class="a-button a-button--lm a-button--primary a-button--link a-button--outline">Подробнее</a>
                <? } ?>
            </div>
            <div class="page-banner__photo">
                <div class="a-polygon-container js-a-polygon-container" size="ms">
                    <div class="a-polygon-container__content">
                        <img class="a-polygon-container__img" src="/frontend/build/assets/banners/page-banner-3.png" alt="" loading="lazy">
                    </div>
                    <div class="a-polygon-container__polygon js-a-polygon-container-polygon violet-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="js-a-polygon-container-svg">
                            <polygon points="" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <picture class="pattern-bg">
            <source srcset="/frontend/build/assets/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/build/assets/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/build/assets/patterns/section-heavy/pattern-light-l.svg" alt="bg pattenr" loading="lazy">
        </picture>
    </div>
</section>
