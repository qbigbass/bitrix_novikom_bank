<?php /** @var $block array */ ?>
<?if(!empty($block['value'])) {?>
    <?$paddingClass = ($block['settings']['set_padding'] == 'yes') ? '' : ' no-padding-top';?>
    <section class="section-layout section-layout--s<?=$paddingClass?>">
        <div class="content-container">
            <div class="a-polygon-container js-a-polygon-container">
                <div class="a-polygon-container__content">
                    <div class="a-helper dark-10">
                        <img src="/frontend/build/assets/helper-icon.png" class="a-helper__icon" alt="" loading="lazy">
                        <div class="a-helper__content">
                            <?if(!empty($block['heading'])) {?>
                                <h3 class="headline-3"><?=$block['heading']?></h3>
                            <?}?>
                            <p class="body-l-light"><?=$block['value']?></p>
                        </div>
                    </div>
                </div>
                <div class="a-polygon-container__polygon js-a-polygon-container-polygon green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="js-a-polygon-container-svg">
                        <polygon points="" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                    </svg>
                </div>
            </div>
        </div>
    </section>
<?}?>
