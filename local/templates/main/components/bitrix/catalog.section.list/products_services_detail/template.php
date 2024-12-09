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
<? if (!empty($arResult['SECTIONS'])) : ?>
<div class="tabs-panel js-tabs-slider overflow-hidden position-relative tabs-panel--small">
    <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100"><span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev h-100 d-flex align-items-center justify-content-start px-1 z-3 position-absolute start-0 top-0"><span class="icon size-m">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                  <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                </svg></span></span><span class="tabs-panel__navigation-item js-tabs-slider-navigation-next h-100 d-flex align-items-center justify-content-end px-1 z-3 position-absolute end-0 top-0"><span class="icon size-m">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                  <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                </svg></span></span></div>
    <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2"><a class="tabs-panel__list-item-link nav-link bg-transparent <?if((int)$arResult['SECTION']['DEPTH_LEVEL'] === 1) : ?>active<?endif;?>" aria-current="page" href="<?= $arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL']?>">Все</a>
        </li>
        <?
        foreach ($arResult['SECTIONS'] as $section) {?>
            <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2"><a class="tabs-panel__list-item-link nav-link bg-transparent <?if($section['ACTIVE_PAGE'] === 'Y'):?>active<?endif;?>" href="<?= $section['SECTION_PAGE_URL'] ?>"><?= $section['NAME'] ?></a>
            </li>
            <?
        }?>
    </ul>
</div>
<? endif; ?>
