<?php
/** @var array $arParams */
/** @var array $arResult */

global $APPLICATION;
$stepperColor = $APPLICATION->GetProperty("stepperItemColor") ?: "stepper-item--color-green";

foreach ($arResult['ITEMS'] as $key => $section) { ?>

    <section class="section-layout <?= $key % 2 != 0 || $arParams['DARK_BG'] ? 'bg-dark-10' : '' ?>">
        <div class="container">
            <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7"><?= $section['NAME'] ?></h3>
            <div class="row px-lg-6">
                <div class="stepper steps-<?= count($section['PROPERTIES']['STEPS']['VALUE']) > 3 ? 4 : 3 ?>">

                    <? foreach ($section['PROPERTIES']['STEPS']['~VALUE'] as $innerKey => $value) { ?>
                        <div class="stepper-item <?= $stepperColor ?>">
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
                                <? if (!empty($section['PROPERTIES']['STEPS']['~DESCRIPTION'][$innerKey])) { ?>
                                    <h4><?= $section['PROPERTIES']['STEPS']['~DESCRIPTION'][$innerKey] ?></h4>
                                <? } ?>
                                <p class="text-l mb-0"><?= $value['TEXT'] ?></p>
                            </div>
                        </div>
                    <? } ?>

                </div>
            </div>
        </div>
    </section>

<? } ?>


