<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<? if (!empty($arResult['DESCRIPTION'])): ?>
    <h3 class="ps-lg-6 mb-6 mb-lg-7 px-lg-6"><?= $arResult['DESCRIPTION'] ?></h3>
<? endif; ?>
<div class="swiper js-slider-cards slider-cards"
     data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:2"
     data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
    <div class="slider-controls js-swiper-controls mb-3 mb-md-4">
        <div class="slider-controls__pagination js-swiper-pagination"></div>
        <div class="slider-controls__navigation js-swiper-nav">
            <button class="swiper-button-prev js-swiper-prev" type="button" aria-label="Листать влево">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </span>
            </button>
            <button class="swiper-button-next js-swiper-next" type="button" aria-label="Листать вправо">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </button>
        </div>
    </div>
    <div class="swiper-wrapper js-swiper-wrapper">
        <?
        foreach ($arResult['ITEMS'] as $key => $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="swiper-slide js-swiper-slide" id="<?= $this->GetEditAreaId($item['ID']); ?>">
                <a class="card-special bg-dark-10 dark-100 h-100 d-flex flex-column row-gap-6 row-gap-lg-9">
                    <div class="card-special__body">
                        <img class="card-special__image mb-3" src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="" loading="lazy">
                        <span class="dark-100"><?= $item['~NAME'] ?></span>
                    </div>
                </a>
            </div>
        <? endforeach; ?>
    </div>
</div>
