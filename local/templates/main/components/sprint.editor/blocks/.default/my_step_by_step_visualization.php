<?php
/**
 * @var $block array
 */
?>
<section class="section-layout section-layout--bg-gray">
    <div class="content-container">
        <div class="a-accordion js-a-accordion a-accordion-layout">
            <div class="a-accordion-panel js-a-accordion-panel">
                <button class="a-accordion-header js-a-accordion-header a-accordion-header--mobile-only">
                    <h3 class="headline-2"><?=$block['heading']?></h3>
                    <span class="a-icon a-accordion-header__icon size-m">
                        <svg>
                            <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </span>
                </button>
                <div class="a-accordion-content js-a-accordion-content a-accordion-content--hide-mobile">
                    <div class="a-accordion-content__wrapper">
                        <h3 class="headline-2 a-accordion-content__title">
                            <?=$block['heading']?>
                        </h3>
                        <div class="display-stepper steps-3">
                            <?foreach ($block['items'] as $index => $item) {?>
                                <?$stepNumber = $index + 1;?>
                                <div class="display-stepper-item">
                                    <div class="display-stepper-item__header">
                                        <div class="display-stepper-item__number">
                                            <div class="display-stepper-item__number-value dark-0"><?=$stepNumber?></div>
                                            <div class="display-stepper-item__number-icon">
                                                <div class="display-stepper-icon" data-level="1">
                                                    <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="#76B82A"></path>
                                                    </svg>
                                                </div>
                                                <?for($i = 2; $i <= $stepNumber; $i++){?>
                                                    <div class="display-stepper-icon" data-level="<?=$i?>">
                                                        <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                        </svg>
                                                    </div>
                                                <?}?>
                                            </div>
                                        </div>
                                        <div class="display-stepper-item__arrow">
                                            <div class="display-stepper-icon-arrow">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="display-stepper-item__content">
                                        <?if(!empty($item['step_heading'])) {?>
                                            <h3 class="headline-3"><?=$item['step_heading']?></h3>
                                        <?}?>
                                        <p class="body-l-light">
                                            <?=$item['step_description']?>
                                        </p>
                                    </div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


