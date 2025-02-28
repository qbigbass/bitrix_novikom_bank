<?php
/** @var array $arParams */
/** @var array $arResult */

global $APPLICATION;
$stepperColor = $APPLICATION->GetProperty("stepperItemColor") ?: "stepper-item--color-green";
?>

<section class="section-restructuring-steps section-layout bg-dark-10">
    <div class="container">
        <div class="row px-lg-6">
            <div class="d-none d-md-flex justify-content-between">
                <? if (!empty($arParams['STEPS_HEADER'])) { ?>
                    <h3 class="h3"><?= $arParams['STEPS_HEADER'] ?></h3>
                <? } ?>

                <? if ($arResult['WITH_TABS']) { ?>
                    <div class="d-inline-flex">
                        <ul class="nav nav-tabs" role="tablist">
                            <? foreach ($arResult['ITEMS'] as $key => $section) { ?>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link<?= $key == 0 ? ' active' : '' ?>"
                                        data-bs-toggle="tab"
                                        data-bs-target="#<?= $section['CODE'] ?>"
                                        type="button"
                                        role="tab"
                                        aria-controls="<?= $section['CODE'] ?>"
                                        <?= $key == 0 ? ' aria-selected' : '' ?>
                                    >
                                        <?= $section['NAME'] ?>
                                    </button>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                <? } ?>

            </div>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none"
               data-bs-toggle="collapse" href="#restructuring-steps-content" role="button" aria-expanded="false"
               aria-controls="restructuring-steps-content">
                <? if (!empty($arParams['STEPS_HEADER'])) { ?>
                    <?= $arParams['STEPS_HEADER'] ?>
                <? } ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%"
                     height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
        </div>
        <div class="section-restructuring-steps__wrapper collapse d-md-block mt-6 mt-lg-7"
             id="restructuring-steps-content">

            <? if ($arResult['WITH_TABS']) { ?>
                <div class="d-inline-flex d-md-none w-100 mb-6">
                    <ul class="nav nav-tabs" role="tablist">
                        <? foreach ($arResult['ITEMS'] as $key => $section) { ?>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link<?= $key == 0 ? ' active' : '' ?>"
                                    data-bs-toggle="tab"
                                    data-bs-target="#<?= $section['CODE'] ?>"
                                    type="button"
                                    role="tab"
                                    aria-controls="<?= $section['CODE'] ?>"
                                    <?= $key == 0 ? ' aria-selected' : '' ?>
                                >
                                    <?= $section['NAME'] ?>
                                </button>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            <? } ?>

            <div class="tab-content">

                <? foreach ($arResult['ITEMS'] as $key => $section) { ?>
                    <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>"
                         id="<?= $section['CODE'] ?>" role="tabpanel" aria-labelledby="steps" tabindex="0">
                        <div class="row row-gap-6 px-lg-6">
                            <div class="stepper steps-<?= count($section['PROPERTIES']['STEPS']['VALUE']) > 3 ? 4 : 3 ?>">

                                <? foreach ($section['PROPERTIES']['STEPS']['~VALUE'] as $innerKey => $value) { ?>
                                    <div class="stepper-item <?= $stepperColor ?>">
                                        <div class="stepper-item__header">
                                            <div class="stepper-item__number">
                                                <div
                                                    class="stepper-item__number-value"><?= $innerKey + 1 ?></div>
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
                                            <p class="text-l no-mb">
                                                <?= $value['TEXT'] ?>
                                            </p>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</section>
