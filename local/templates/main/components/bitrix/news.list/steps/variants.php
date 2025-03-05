<?php
/** @var array $arParams */
/** @var array $arResult */

global $APPLICATION;
$stepperColor = $APPLICATION->GetProperty("stepperItemColor") ?: "stepper-item--color-orange";

foreach ($arResult['ITEMS'] as $key => $section) :
    if (!empty($section['PROPERTIES']['STEPS']['VALUE'])) : ?>

        <div class="row row-gap-6">
            <h5><?= $section['NAME'] ?></h5>
            <div class="stepper steps-<?= count($section['PROPERTIES']['STEPS']['VALUE'] ?? []) > 3 ? 4 : 3 ?>">
                <? foreach ($section['PROPERTIES']['STEPS']['~VALUE'] as $innerKey => $value) : ?>
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
                <? endforeach; ?>
            </div>
        </div>

    <? endif;
endforeach; ?>
