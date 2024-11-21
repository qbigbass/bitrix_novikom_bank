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

<div class="swiper slider-cards js-slider-cards"
     data-auto-height="mobile-s:true,mobile:true,tablet:true"
     data-slides-per-view="mobile-s:1,mobile:1,tablet:1,tablet-album:2,laptop:2,laptop-x:2"
     data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
    <div class="swiper-wrapper">
        <? foreach ($arResult["ITEMS"] as $arItem) {

            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

            $timestamp = strtotime($arItem['PROPERTIES']['DATE']['VALUE']);
            $dateYear = date('Y', $timestamp);
            $dateMonth = FormatDate('f', $timestamp);
            ?>
            <div class="swiper-slide js-swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="card-award bg-dark-30 h-100">
                    <div
                        class="card-award__wrapper d-flex flex-column flex-md-row align-items-center align-items-md-start gap-4 gap-lg-6">
                        <img class="card-award__image w-auto float-end"
                             src="/frontend/dist/img/awards/individual-certificate.png" alt="" loading="lazy">
                        <div class="card-award__content text-l">
                            <div class="d-flex w-100 align-items-end justify-content-between mb-4">
                                <h4 class="violet-100"><?= $dateMonth ?></h4>
                                <div class="d-none d-md-inline h2 violet-100-important"><?= $dateYear ?></div>
                                <div class="d-inline d-md-none h4 violet-100-important"><?= $dateYear ?></div>
                            </div>
                            <p class="mb-0"><?= $arItem['~PREVIEW_TEXT'] ?></p>
                        </div>
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
<div class="d-block w-100 mt-5 mt-lg-7 text-center">
    <a
        class="btn btn-outline-primary btn-lg-lg btn-icon" href="/about/awards/">Смотреть все награды
        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
        </svg>
    </a>
</div>
