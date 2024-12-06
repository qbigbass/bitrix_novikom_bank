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

<div class="d-none d-lg-flex w-100">
    <div class="tabs-panel js-tabs-slider overflow-hidden position-relative pe-1 pe-lg-0">
        <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100"><span
                class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                    <span class="icon size-s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                    </span>
                </span>
            <span
                class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                    <span class="icon size-s">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </span>
                </span>
        </div>
        <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
            <? foreach ($arResult["SECTIONS"] as $key => $arSection) { ?>
                <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                    <button
                        class="tabs-panel__list-item-link nav-link bg-transparent<?= $key == array_key_first($arResult["SECTIONS"]) ? ' active' : '' ?>"
                        data-bs-toggle="tab" data-bs-target="#<?= $key ?>" type="button" role="tab"
                        aria-controls="<?= $key ?>"
                        aria-selected="<?= $key == array_key_first($arResult["SECTIONS"]) ? 'true' : 'false' ?>"><?= $arSection ?>
                    </button>
                </li>
            <? } ?>
        </ul>
    </div>
</div>

<? foreach ($arResult["SECTIONS"] as $key => $arSection) { ?>
    <div class="tab-content mt-5 mt-lg-7">
        <div class="tab-pane fade show<?= $key == array_key_first($arResult["SECTIONS"]) ? ' active' : '' ?>" id="<?= $key ?>" aria-labelledby="<?= $key ?>" tabindex="0"
             role="tabpanel">
            <div class="d-flex flex-wrap gap-4 gap-md-5 gap-xl-6">

                <? foreach ($arResult["ITEMS"] as $arItem) {
                    if ($arItem["IBLOCK_SECTION_ID"] != $key) {
                        continue;
                    }

                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                    $timestamp = strtotime($arItem['PROPERTIES']['DATE']['VALUE']);
                    $dateYear = date('Y', $timestamp);
                    $dateMonth = FormatDate('f', $timestamp);
                    ?>
                    <div class="card-award bg-dark-30 h-auto flex-basis-100 flex-basis-lg-33 flex-grow-1" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div
                            class="card-award__wrapper d-flex flex-column flex-md-row align-items-center align-items-md-start gap-4 gap-lg-6">
                            <? if (!empty($arItem['PREVIEW_PICTURE']['SRC'])) { ?>
                                <img class="card-award__image w-auto float-end"
                                     src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                     alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                            <? } ?>
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
                <? } ?>
            </div>
        </div>
    </div>
<? } ?>
