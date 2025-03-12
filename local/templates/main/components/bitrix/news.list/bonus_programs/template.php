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
$itemCols = (count($arResult["ITEMS"]) > 2) ? '3' : '2';
?>
<div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:<?=$itemCols?>" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:40">
    <div class="slider-controls js-swiper-controls mb-3 mb-md-4">
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
    <div class="swiper-wrapper">
        <?foreach($arResult["ITEMS"] as $arItem) : ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="swiper-slide js-swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="card-product card-product--green">
                    <div class="card-product__inner">
                        <div class="card-product__content">
                            <h4 class="card-product__title"><?=$arItem['~NAME']?></h4>
                            <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 violet-100">
                                <?if (!empty($arItem['DISPLAY_PROPERTIES']['SHORT_CONDITION']['~VALUE']['TEXT'])) : ?>
                                    <?= $arItem['DISPLAY_PROPERTIES']['SHORT_CONDITION']['~VALUE']['TEXT'] ?>
                                <? endif; ?>
                            </div>
                            <p class="card-product__description m-0"><?=$arItem['PREVIEW_TEXT']?></p>
                        </div>
                        <? if (!empty($arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'])): ?>
                            <img class="card-product__img" src="<?= $arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']; ?>" alt="">
                        <? endif; ?>
                        <a class="btn btn-primary card-product__button" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>
