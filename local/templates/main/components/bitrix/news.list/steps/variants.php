<?php
/** @var array $arParams */
/** @var array $arResult */

global $APPLICATION;
$stepperColor = $APPLICATION->GetProperty("stepperItemColor") ?: "stepper-item--color-orange";
?>
<? if (!empty($arResult['SECTIONS'])) : ?>
    <? foreach ($arResult['SECTIONS'] as $key => $section) : ?>
        <div class="row row-gap-6">
            <? if (!empty($arParams['STEPS_HEADER'])) : ?>
                <h5><?= $arParams['STEPS_HEADER'] ?></h5>
            <? endif; ?>
            <?
            $elementsFiltered = array_values(array_filter($arResult['ITEMS'], function ($item) use ($section) {
                return (int)$item['IBLOCK_SECTION_ID'] === (int)$section['ID'];
            }));
            ?>
            <div class="stepper steps-3">
                <? foreach ($elementsFiltered as $innerKey => $value) : ?>
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
                            <p class="text-l mb-0"><?= $value['~PREVIEW_TEXT'] ?></p>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    <? endforeach; ?>
<? endif; ?>
