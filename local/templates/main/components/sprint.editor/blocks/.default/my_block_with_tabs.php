<?php
/**
 * @var $block array
 * @var $this SprintEditorBlocksComponent
 */
?>
<?if(!empty($block['items'])) {?>
    <section class="section-layout section-help-layout">
        <div class="content-container">
            <div class="a-accordion js-a-accordion a-accordion-layout">
                <div class="a-accordion-panel js-a-accordion-panel">
                    <button class="a-accordion-header js-a-accordion-header section-help-layout__accordion-header">
                        <h3 class="headline-2"><?=$block['block_heading']?></h3>
                        <span class="a-icon a-accordion-header__icon size-m">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                            </svg>
                        </span>
                    </button>
                    <div class="a-accordion-content js-a-accordion-content section-help-layout__accordion-content">
                        <div class="a-tabs a-tabs--layout js-a-tabs">
                            <div class="section-help-layout__content">
                                <h3 class="section-help-layout__title headline-2"><?=$block['block_heading']?></h3>
                                <div class="section-help-layout__tabs">
                                    <div class="a-tab-swiper swiper js-a-tab-swiper section-help-layout__swiper">
                                        <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">
                                            <?foreach ($block['items'] as $index => $item) {?>
                                                <button type="button" data-value="<?=$index?>" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab<?=($index == 0) ? ' is-active' : ''?>">
                                                    <?=$item['title']?>
                                                </button>
                                            <?}?>
                                        </div>
                                        <button class="a-tab-nav-button js-a-tab-prev is-prev">
                                            <span class="a-icon size-m">
                                                <svg>
                                                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="a-tab-nav-button js-a-tab-next is-next">
                                            <span class="a-icon size-m">
                                                <svg>
                                                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="a-tab-panels js-a-tab-panels">
                                    <?foreach ($block['items'] as $index => $item) {?>
                                        <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="<?=$index?>">
                                            <?foreach ($item['blocks'] as $itemBlock) {?>
                                                <?$this->includeBlock($itemBlock)?>
                                            <?}?>
                                        </div>
                                    <?}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?}?>
