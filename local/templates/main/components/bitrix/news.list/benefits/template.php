<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<section class="section-benefits px-0 px-lg-6 py-6 py-sm-9 py-md-11 py-xl-16 position-relative overflow-hidden">
    <div class="container">
        <div class="row mb-6 mb-lg-7">
            <h3><?= $arParams['HEADER_TEXT'] ?></h3>
        </div>
        <div class="row row-gap-6">

            <? foreach ($arResult['ITEMS'] as $benefit) { ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="benefit d-flex gap-3 flex-column">
                        <img class="icon size-xl" src="<?= $benefit['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $benefit['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                        <div class="benefit__content d-flex flex-column gap-3">
                            <h4 class="benefit__title"><?= $benefit['~NAME'] ?></h4>
                            <span class="benefit__description w-100 w-md-75 text-m">
                                <?= $benefit['~PREVIEW_TEXT'] ?>
                            </span>
                        </div>
                    </div>
                </div>
            <? } ?>

        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-bottom section-restructuring-benefits__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
