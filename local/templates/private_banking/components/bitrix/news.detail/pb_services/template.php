<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
$this->setFrameMode(true);
?>
<?$this->SetViewTarget('PB_HEADER');?>
    <div class="container">
        <h3 class="pb-section__title dark-0 text-center my-4 animate js-animation">
            <?= $arResult['SECTION']['NAME'] ?>
        </h3>
        <div class="swiper pb-tags-wrapper animate js-animation js-pb-tabs-slider">
            <ul class="nav nav-pills swiper-wrapper d-md-flex flex-md-wrap flex-md-row gap-md-3 justify-content-md-center" id="pills-tab" role="tablist">
                <?php foreach ($arResult['MENU_ELEMENTS'] as $arItem) : ?>
                    <li class="nav-item swiper-slide w-auto" role="presentation">
                        <a
                            href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                            class="pb-tags <?= $arResult['ID'] === $arItem['ID'] ? 'active' : ''; ?>"
                            aria-controls="brokerage-services"
                            <?= $arResult['ID'] === $arItem['ID'] ? 'aria-selected' : ''; ?>
                        >
                            <?= $arItem['NAME'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="pb-section-hero__overlay pb-section-hero__overlay--size-small"></div>
<?$this->EndViewTarget();?>

<section class="pb-section pb-section--bg-lines">
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active">
                <h2 class="pb-section__title pb-section__title--size-small dark-0 mb-6 ps-xxl-6 animate js-animation">
                    <?= $arResult['NAME'] ?>
                </h2>
                <div class="d-flex flex-column row-gap-6">
                    <?= $arResult['DETAIL_TEXT'] ?>
                    <?php if (!empty($arResult['PROPERTIES']['INFODOCS']['VALUE'])) : ?>
                        <div class="d-flex flex-column row-gap-6 pt-6 pb-additional-info animate js-animation">
                            <h3 class="pb-additional-info__title dark-0 ps-xxl-6">Информация и&nbsp;документы</h3>
                            <div class="accordion pb-accordion" id="accordion-additional-info">
                                <?php foreach ($arResult['PROPERTIES']['INFODOCS']['~VALUE'] as $index => $arItem) : ?>
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $index ?>" aria-controls="<?= $index ?>">
                                                <span><?= $arResult['PROPERTIES']['INFODOCS']['DESCRIPTION'][$index] ?></span>
                                            </button>
                                        </div>
                                        <div class="accordion-collapse collapse" id="<?= $index ?>" data-bs-parent="#accordion-additional-info">
                                            <div class="accordion-body">
                                                <div class="col-12 col-xxl-8 rte rte--accordion">
                                                    <?= $arItem['TEXT'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
