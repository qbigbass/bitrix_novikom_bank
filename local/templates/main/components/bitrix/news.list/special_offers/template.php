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

<div class="col-12">
    <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,tablet-album:2,laptop:2,laptop-x:2" data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:16,laptop:16,laptop-x:16">
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
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="swiper-slide js-swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <a class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                        <div class="card-special__header d-flex flex-row-reverse align-items-start justify-content-between">
                            <div class="tag tag--outline">
                                <span class="tag__content text-s fw-semibold"><?=$arItem['SECTION_TAG']?></span>
                                <span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg>
                                </span>
                            </div>
                            <span class="text-s dark-70 my-auto mb-0"><?=$arItem['DISPLAY_PROPERTIES']['PUBLICATION_DATE']['DISPLAY_VALUE']?></span>
                        </div>
                        <div class="card-special__body">
                            <span class="text-l fw-semibold"><?=$arItem['NAME']?></span>
                        </div>
                    </a>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
