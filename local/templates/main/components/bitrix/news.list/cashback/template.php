<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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

<div class="container">
    <h3 class="mb-6 mb-lg-7 px-lg-6">Перечень избранных категорий</h3>
    <div class="row px-lg-6 mb-6 mb-lg-7">
        <div class="col-12">
            <div class="tabs-panel js-tabs-slider overflow-hidden position-relative px-1">
                <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                    <span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev h-100 d-flex align-items-center justify-content-start px-1 z-3 position-absolute start-0 top-0">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                            </svg>
                        </span>
                    </span>
                    <span class="tabs-panel__navigation-item js-tabs-slider-navigation-next h-100 d-flex align-items-center justify-content-end px-1 z-3 position-absolute end-0 top-0">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </span>
                    </span>
                </div>
                <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                    <?foreach ($arResult['SECTIONS'] as $key => $section): ?>
                        <?$activeClass = ($key == 0) ? ' active' : '';?>
                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                            <button class="tabs-panel__list-item-link nav-link bg-transparent<?=$activeClass?>" data-bs-toggle="tab" data-bs-target="#section_<?=$section['ID']?>" type="button" role="tab" aria-controls="section_<?=$section['ID']?>" aria-selected="true">
                                <?=$section['NAME']?>
                            </button>
                        </li>
                    <?endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <?foreach ($arResult['ITEMS'] as $sectionId => $items): ?>
            <?$activeClass = ($arResult['SECTIONS'][0]['ID'] == $sectionId) ? ' show active' : ''?>
            <div class="tab-pane fade<?=$activeClass?>" id="section_<?=$sectionId?>" aria-labelledby="section_<?=$sectionId?>" tabindex="0" role="tabpanel">
                <div class="row px-lg-6">
                    <div class="col-12">
                        <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1.5,mobile:1.5,tablet:3,tablet-album:4,laptop:5,laptop-x:5" data-space-between="mobile-s:16,mobile:16,tablet:16,laptop:40,laptop-x:40">
                            <div class="swiper-wrapper">
                                <?foreach ($items as $item): ?>
                                    <?
                                    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                                    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                    ?>
                                    <div class="swiper-slide js-swiper-slide" id="<?= $this->GetEditAreaId($item['ID']); ?>">
                                        <a class="card-sale d-flex flex-column align-items-start gap-2 gap-lg-3" href="#">
                                            <img class="card-sale__image" src="<?=$item['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']?>" alt="" loading="lazy">
                                            <h5 class="dark-100"><?=$item['~NAME']?></h5>
                                            <span class="dark-100"><?=$item['~PREVIEW_TEXT']?></span>
                                        </a>
                                    </div>
                                <?endforeach;?>
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
                </div>
            </div>
        <?endforeach;?>
    </div>
    <div class="row px-lg-6 mt-6 mt-lg-7">
        <div class="col-12">
            <a class="btn btn-lg btn-link btn-icon" href="#">
                Перечень МСС кодов по&nbsp;избранным категориям
                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                </svg>
            </a>
        </div>
    </div>
</div>
