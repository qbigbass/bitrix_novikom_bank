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

use Bitrix\Main\Context;

$this->setFrameMode(true);

if (empty($arParams['PARENT_DEPTH'])) {
    $path = basename($APPLICATION->GetCurPage());
} else {
    $path = explode('/', $APPLICATION->GetCurPage())[$arParams['PARENT_DEPTH']];
}

$request = Context::getCurrent()->getRequest();
$section = $request->getQuery('path');

$targetLink = $arParams["TARGET_LINK"] ?? "";
?>

<div class="tabs-panel js-tabs-slider overflow-hidden position-relative" id="links">
    <? if (count($arResult) >= 4) { ?>
        <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
            <span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </span>
            </span>
            <span class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </span>
        </div>
    <? } ?>
    <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded section-catalog__tab-list">
        <? foreach ($arResult as $key => $menuItem) {
            if ($menuItem['PARAMS']['show_only_in_header'] == 'Y') {
                continue;
            }
            if ($menuItem['PARAMS']['DEPTH_LEVEL'] === 0) continue;
            ?>
            <? if (!empty($section)) {
                $class = basename($menuItem['LINK']) == $section ? ' active' : '';
            } else {
                $class = basename($menuItem['LINK']) == $path ? ' active' : '';
            } ?>

            <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                <a class="tabs-panel__list-item-link nav-link bg-transparent section-catalog__tab-list-item<?= $class ?>" href="<?= $menuItem['LINK']. $targetLink . "#links" ?>">
                    <?= $menuItem['TEXT'] ?>
                </a>
            </li>
        <? } ?>
    </ul>
</div>
