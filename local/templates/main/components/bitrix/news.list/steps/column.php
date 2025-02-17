<?php
/** @var array $arParams */
/** @var array $arResult */

foreach ($arResult['SECTIONS'] as $key => $section) { ?>

    <section class="section-layout <?= $key % 2 != 0 || $arParams['DARK_BG'] ? 'bg-dark-10' : '' ?>">
        <div class="container">
            <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7"><?= $section['NAME'] ?></h3>
            <div class="row px-lg-6">
                <? $elementsFiltered = array_values(array_filter($arResult['ITEMS'], function ($item) use ($section) {
                    return $item['IBLOCK_SECTION_ID'] == $section['ID'];
                }));
                ?>
                <div class="stepper steps-<?= count($elementsFiltered) > 3 ? 4 : 3 ?>">

                    <? foreach ($elementsFiltered as $innerKey => $value) { ?>
                        <div class="stepper-item stepper-item--color-green">
                            <div class="stepper-item__header">
                                <div class="stepper-item__number">
                                    <div class="stepper-item__number-value"><?= $innerKey + 1 ?></div>
                                    <div class="stepper-item__number-icon">
                                        <?= getStepperIcons($innerKey) ?>
                                    </div>
                                </div>
                                <div class="stepper-item__arrow"></div>
                            </div>
                            <div class="stepper-item__content">
                                <? if(!empty($arParams['WITH_H4'])) { ?>
                                    <h4><?= $value['~NAME'] ?></h4>
                                <? } ?>
                                <p class="text-l mb-0"><?= $value['~PREVIEW_TEXT'] ?></p>
                            </div>
                        </div>
                    <? } ?>

                </div>
            </div>
        </div>
    </section>

<? } ?>


