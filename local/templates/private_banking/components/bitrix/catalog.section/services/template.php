<?php
use \Bitrix\Main\Localization\Loc;
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<section class="pb-section pb-section--gradient-linear py-xxl-16">
    <div class="container">
        <h3 class="pb-section__title dark-0 text-center mb-4 d-md-none animate js-animation">Премиум-услуги</h3>
        <div class="pb-services d-flex flex-column row-gap-4 row-gap-md-5 row-gap-lg-11">
            <ul class="pb-services__header nav nav-tabs flex-nowrap justify-content-center w-100 animate js-animation" role="tablist">
                <?foreach ($arResult['SECTIONS'] as $item) :
                    $key = $item['CODE'];
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $key==='finance' ? 'active' : '' ?>" <?= $key==='finance' ? 'aria-selected="true"' : '' ?> id="<?= $key ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $key ?>" type="button" role="tab" aria-controls="<?= $key ?>"><?= $item['NAME'] ?></button>
                    </li>
                <?endforeach; ?>
            </ul>
            <div class="tab-content">
                <?$i = 0;
                foreach ($arResult['SECTIONS'] as $service) {
                    $key = $service['CODE'];
                    ?>
                    <div class="tab-pane fade <?= $i===0 ? 'active show' : ''; ?>" id="<?= $key ?>" role="tabpanel" aria-labelledby="<?= $key ?>-tab" tabindex="<?= $i++ ?>">
                        <div class="js-pb-tags-thumbs swiper pb-tags-wrapper animate js-animation">
                            <div class="swiper-wrapper d-flex flex-wrap row-gap-2">
                                <?foreach ($service['ITEMS'] as $li) : ?>
                                    <div class="swiper-slide pb-tags" role="button"><span><?= $li['NAME'] ?></span></div>
                                <?endforeach; ?>
                            </div>
                        </div>
                        <div class="pb-services__slider js-pb-slider swiper animate js-animation">
                            <div class="swiper-wrapper">
                                <?foreach ($service['ITEMS'] as $itemKey => $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="pb-card-service">
                                            <div class="d-flex flex-column row-gap-3 align-items-start">
                                                <?php if (!empty($item['NAME'])) : ?>
                                                    <h3 class="pb-card-service__title"><?= $item['NAME'] ?></h3>
                                                <?php endif; ?>
                                                <?php if (!empty($item['PREVIEW_TEXT'])) : ?>
                                                    <p class="pb-card-service__text"><?= $item['PREVIEW_TEXT'] ?></p>
                                                <?php endif; ?>
                                                <?php if (!empty($item['URL'])) : ?>
                                                    <a class="pb-card-service__button btn-pb btn-pb--size-m btn-pb--secondary mt-auto" href="<?= $item['URL'] ?>">
                                                        <?= Loc::getMessage('MAIN_PB_SLIDER_MORE') ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <?
                                            if($item['PREVIEW_PICTURE']['SRC']){
                                            ?>
                                            <div class="pb-card-service__image mt-auto mt-md-0">
                                                <img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['NAME'] ?>">
                                            </div>
                                            <?

                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?endforeach; ?>
                            </div>
                            <div class="pb-services__pagination d-flex gap-2 justify-content-center mt-4"></div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</section>

