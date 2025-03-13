<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(true); ?>

<div class="d-flex flex-row justify-content-between">
    <div class="swiper slider-cards d-flex flex-column js-slider-cards"
         data-slides-per-view="mobile-s:1.5,mobile:1.5,tablet:3,tablet-album:4,laptop:5,laptop-x:5"
         data-space-between="mobile-s:16,mobile:16,tablet:16,laptop:40,laptop-x:40">
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
            <? foreach ($arResult['ITEMS'] as $item) { ?>
                <?
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                ?>
                <div class="swiper-slide js-swiper-slide" id="<?= $this->GetEditAreaId($item['ID']); ?>">
                    <a class="card-sale d-flex flex-column align-items-start gap-2 gap-lg-3"
                       href="<?= $item['PROPERTIES']['HREF']['VALUE'] ?? '#' ?>">
                        <? if (!empty($item['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'])) { ?>
                            <img class="card-sale__image"
                                 src="<?= $item['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'] ?>" alt="">
                        <? } ?>
                        <h5 class="dark-100"><?= $item['~NAME'] ?></h5>
                        <span class="dark-100"><?= $item['~PREVIEW_TEXT'] ?></span>
                    </a>
                </div>
            <? } ?>
        </div>
    </div>
</div>
