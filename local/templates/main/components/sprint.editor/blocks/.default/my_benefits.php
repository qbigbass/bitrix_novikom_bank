<?php /**
 * @var $block array
 * @var $this  SprintEditorBlocksComponent
 */ ?>
<?if(!empty($block['blocks'])) {?>
    <section class="section-layout section-benefits">
        <div class="content-container">
            <div class="section-benefits__container">
                <h3 class="section-benefits__title headline-2"><?=$block['block_heading']?></h3>
                <div class="section-benefits__content">
                    <div class="benefit-cards-layout max-cols-3">
                        <?php foreach ($block['blocks'] as $benefit) { ?>
                            <div class="benefit-text-card">
                                <div class="benefit-text-card__icon">
                                    <img src="<?=$benefit['image']['file']['SRC']?>" alt="<?=$benefit['heading']?>">
                                </div>
                                <h3 class="benefit-text-card__title headline-3"><?=$benefit['heading']?></h3>
                                <div class="benefit-text-card__description body-m-light"><?=Sprint\Editor\Blocks\Text::getValue($benefit['text'])?></div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
        <picture class="pattern-bg">
            <source srcset="/frontend/dist/assets/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/assets/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/assets/patterns/section/pattern-light-l.svg" alt="bg pattenr" loading="lazy">
        </picture>
    </section>
<?}?>
