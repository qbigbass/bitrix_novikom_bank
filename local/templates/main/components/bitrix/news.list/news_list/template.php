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
$this->setFrameMode(true);
?>

<div class="swiper js-slider-cards slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3,laptop-x:3"
     data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
    <div class="swiper-wrapper js-swiper-wrapper">
        <? foreach ($arResult["ITEMS"] as $arItem) {

            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="swiper-slide js-swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a class="card-news position-relative bg-dark-10 dark-100 h-100 d-flex flex-column overflow-hidden"
                   href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                    <div
                        class="card-news__header w-100 position-absolute top-0 start-0 d-flex align-items-start justify-content-between z-2">
                    </div>
                    <div class="card-news__image-container position-relative z-1 h-100">
                        <img class="card-news__img position-relative z-2" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt=""
                             loading="lazy">
                        <div class="card-news__top-blackout z-3 position-absolute top-0 start-0 w-100"></div>
                    </div>
                    <div class="card-news__body d-flex flex-column gap-2 gap-sm-3 z-3"><span
                            class="text-m dark-70"><?= $arItem['PROPERTIES']['PUBLICATION_DATE']['VALUE'] ?></span>
                        <h5 class="fw-bold"><?= $arItem['~NAME'] ?></h5>
                    </div>
                </a>
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
