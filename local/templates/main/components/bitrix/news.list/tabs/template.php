<?

use Dalee\Libs\Tabs\TabContent;

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

<div class="collapse d-md-block" id="additional-info-content">
    <div class="row mt-4">
        <div class="col-12">
            <div class="ps-lg-6">
                <div class="tabs-panel js-tabs-slider overflow-hidden position-relative">
                    <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                        <span
                            class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                            <span class="icon size-s">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                            </span>
                        </span>
                        <span
                            class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                            <span class="icon size-s">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </div>
                    <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                        <? foreach ($arResult['ITEMS'] as $key => $tab): ?>
                            <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                <button
                                    class="tabs-panel__list-item-link nav-link bg-transparent <?= $key == 0 ? 'active' : '' ?>"
                                    data-bs-toggle="tab"
                                    data-bs-target="#additional-info-<?= $tab['ID'] ?>"
                                    type="button"
                                    role="tab"
                                    aria-controls="additional-info-<?= $tab['ID'] ?>"
                                    aria-selected="true">
                                    <?= $tab['NAME'] ?? '' ?>
                                </button>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="tab-content mt-4 mt-md-6 mt-lg-7 px-lg-6">
                <? foreach ($arResult['ITEMS'] as $key => $tab): ?>
                    <?
                    $this->AddEditAction($tab['ID'], $tab['EDIT_LINK'], CIBlock::GetArrayByID($tab["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($tab['ID'], $tab['DELETE_LINK'], CIBlock::GetArrayByID($tab["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                    ?>
                    <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>"
                         id="additional-info-<?= $tab['ID'] ?>"
                         aria-labelledby="additional-info-<?= $tab['ID'] ?>"
                         tabindex="0"
                         role="tabpanel">
                        <div class="row row-gap-6 row-gap-lg-7" id="<?= $this->GetEditAreaId($tab['ID']); ?>">
                            <?= TabContent::render(
                                $tab['~DETAIL_TEXT'],
                                $tab['DISPLAY_PROPERTIES'],
                                $arParams['ELEMENT_ID'] ?? null
                            ); ?>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</div>

