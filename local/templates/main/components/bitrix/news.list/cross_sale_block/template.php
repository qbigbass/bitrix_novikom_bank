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
$this->setFrameMode(true);
?>

<section class="section-layout">
    <div class="container">
        <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7"><?= $arParams['HEADER_TEXT'] ?></h3>
        <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
            <div class="swiper-wrapper">
                <? foreach ($arResult['ITEMS'] as $item) { ?>
                    <?
                    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="swiper-slide js-swiper-slide" id="<?=$this->GetEditAreaId($item['ID']);?>">
                        <div class="card-product card-product--<?= $item['PROPERTIES']['LINE_COLOR']['VALUE_XML_ID'] ?> bg-dark-10">
                            <div class="card-product__inner">
                                <div class="tag card-product__tag">
                                    <span class="tag__content text-s fw-semibold"><?= $item['PROPERTIES']['TAG']['VALUE'] ?></span>
                                    <span class="tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="card-product__content">
                                    <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                                    <? if(!empty($item['PROPERTIES']['CONDITION']['VALUE'])) { ?>
                                        <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 violet-100">
                                            <?= $item['PROPERTIES']['CONDITION']['DESCRIPTION'] ?>
                                            <span class="text-number-l fw-bold"><?= $item['PROPERTIES']['CONDITION']['VALUE'] ?></span>
                                        </div>
                                    <? } ?>
                                    <? if(!empty($item['PREVIEW_TEXT'])) { ?>
                                        <p class="card-product__description m-0"><?= $item['~PREVIEW_TEXT'] ?></p>
                                    <? } ?>
                                </div>
                                <img class="card-product__img" src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                                <? if (empty($item['PROPERTIES']['BTN_TYPE']['VALUE']) || $item['PROPERTIES']['BTN_TYPE']['VALUE'] == 'С фоном') { ?>
                                    <a class="btn btn-primary card-product__button" href="<?= $item['PROPERTIES']['LINK']['VALUE'] ?>">
                                        <?= $item['PROPERTIES']['BTN_TEXT']['VALUE'] ?>
                                    </a>
                                <? } else { ?>
                                    <a class="btn btn-link btn-icon m-auto m-md-0" href="<?= $item['PROPERTIES']['LINK']['VALUE'] ?>">
                                        <span><?= $item['PROPERTIES']['BTN_TEXT']['VALUE'] ?></span>
                                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                        </svg>
                                    </a>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="slider-controls js-swiper-controls mt-3 mt-md-4">
                <div class="slider-controls__pagination js-swiper-pagination"></div>
                <div class="slider-controls__navigation js-swiper-nav">
                    <button class="swiper-button-prev js-swiper-prev" type="button">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                            </svg>
                        </span>
                    </button>
                    <button class="swiper-button-next js-swiper-next" type="button">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

