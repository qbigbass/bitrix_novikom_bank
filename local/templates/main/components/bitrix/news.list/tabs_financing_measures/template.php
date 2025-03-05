<?

if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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
<section class="section-catalog section-layout d-flex flex-column bg-purple-10" id="js-measure-block">
    <div class="container">
        <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Меры финансирования</h3>
    </div>
    <section class="section-catalog__tabs mb-4 mb-md-6 mb-lg-7">
        <div class="container">
            <div class="row px-lg-6">
                <div class="col-12">
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
                        <?
                        foreach ($arResult['SECTIONS'] as $key => $tab): ?>
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
                        <?
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-catalog__list">
        <div class="container">
            <div class="tab-content row align-items-stretch cards-gutter" id="js-measure-block-content">
                <?
                foreach ($arResult['SECTIONS'] as $key => $tab): ?>
                    <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>"
                         id="additional-info-<?= $tab['ID'] ?>"
                         aria-labelledby="additional-info-<?= $tab['ID'] ?>"
                         tabindex="0"
                         role="tabpanel">
                        <div class="row row-gap-6 row-gap-lg-7">
                            <?
                            foreach ($tab['ITEMS'] as $itemKey => $item) { ?>
                                <?
                                $addClass = $arParams["ADD_COL_CLASS"] ?? "";
                                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                if (empty($arParams["ADD_COL_CLASS"])) {
                                    if ($itemKey != count($tab['ITEMS']) - 1 || count($tab['ITEMS']) <= 2) {
                                        $addClass = "col-lg-6";
                                    }
                                }
                                ?>
                                <div class="col-12 <?= $addClass ?>" id="<?= $this->GetEditAreaId($item['ID']); ?>">
                                    <div class="card-text d-inline-flex px-3 px-md-4 p-4 p-sm-5 p-lg-6 bg-white w-100 h-100">
                                        <div class="card-text__inner d-flex flex-column gap-6 gap-md-7 justify-content-between h-100">
                                            <div class="card-text__content d-flex flex-column gap-3 gap-md-4">
                                                <h4 class="card-text__title"><?= $item['~NAME'] ?></h4>
                                            </div>
                                            <a class="btn btn-link btn-lg-lg d-inline-flex gap-2 align-items-center card-text__button-more" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                                <span>Подробнее</span>
                                                <svg class="card-product-list__button-icon" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?
                            } ?>
                        </div>
                    </div>
                <?
                endforeach; ?>
            </div>
        </div>
    </section>
</section>

