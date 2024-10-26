<?php

/** @var $block array */
?>
<?if(!empty($block['text']['value']) && !empty($block['image']['file'])) {?>
<section class="section-layout page-banner section-layout--s">
    <div class="content-container">
        <div class="page-banner__container">
            <?if(!empty($block['tag'])) {?>
                <div class="page-banner__tag">
                    <div class="a-tag a-tag--outline href">
                        <span class="a-tag__content body-s-heavy">
                            <?= $block['tag'] ?>
                        </span>
                        <span class="a-tag__triangle">
                            <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            <?}?>
            <div class="page-banner__title">
                <<?= $block['htag']['type'] ?> class="headline-2"><?= $block['htag']['value'] ?></<?= $block['htag']['type'] ?>>
            </div>
            <div class="page-banner__content">
                <div class="page-banner__text">
                    <div class="a-rte body-l-light">
                        <?=Sprint\Editor\Blocks\Text::getValue($block['text'])?>
                    </div>
                </div>
                <? if (!empty($block['button_name']) && !empty($block['button_link'])) { ?>
                    <a href="<?= $block['button_link'] ?>" class="a-button a-button--lm a-button--primary a-button--link a-button--outline"><?= $block['button_name'] ?></a>
                <? } ?>
            </div>
            <div class="page-banner__photo">
                <div class="a-polygon-container js-a-polygon-container">
                    <div class="a-polygon-container__content">
                        <img class="a-polygon-container__img" src="<?= $block['image']['file']['SRC'] ?>" alt="" loading="lazy">
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
            <source srcset="/frontend/dist/assets/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/assets/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/assets/patterns/section-heavy/pattern-light-l.svg" alt="bg pattenr" loading="lazy">
        </picture>
    </div>
</section>
<?}?>
