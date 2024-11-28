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

$regionProperty = [];
$specProperty = [];

foreach ($arResult['ITEMS'] as $item) {
    $regionProperty[] = $item['PROPERTIES']['REGION']['VALUE'];
    $specProperty[] = $item['PROPERTIES']['SPECIALIZATION']['VALUE'];
}
?>

<div class="row row-gap-4 row-gap-md-6 row-gap-lg-7 px-lg-6">
    <div class="col-12">
        <h3><? $APPLICATION->IncludeFile('/about/career/list_header.php'); ?></h3>
    </div>
    <div class="col-12">
        <div class="d-flex flex-wrap flex-xl-nowrap justify-content-between gap-3 gap-md-4 gap-xl-6">
            <form class="w-100">
                <div class="input-group flex-nowrap d-none d-lg-flex">
                    <span class="input-group-icon">
                        <span class="icon violet-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                            </svg>
                        </span>
                    </span>
                    <input class="form-control form-control-lg text-l" id="input-search" type="text"
                           placeholder="Поиск по вакансиям" aria-label="Поиск по вакансиям"
                           aria-describedby="input-search" tabindex="-1">
                </div>
                <div class="input-group flex-nowrap d-flex d-lg-none">
                    <span class="input-group-icon">
                        <span class="icon violet-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                            </svg>
                        </span>
                    </span>
                    <input class="form-control ps-0 text-s" id="input-search-mobile" type="text"
                           placeholder="Поиск по вакансиям" aria-label="Поиск по вакансиям"
                           aria-describedby="#input-search-mobile" tabindex="-1">
                </div>
            </form>
            <form class="w-100">
                <div class="d-flex flex-column flex-md-row w-100 gap-3 gap-lg-4 gap-xl-6">
                    <div class="w-100 w-md-50 w-xxl-400w flex-shrink-lg-0">
                        <select class="form-select form-select--size-small form-select--size-lg-large js-select"
                                id="selectCity" aria-label="Выбор города" data-placeholder="Все города">
                            <? foreach (array_unique($regionProperty) as $key => $value): ?>
                                <option <?= $value == 'Москва' ? 'selected' : '' ?> value="<?= $value ?>"><?= $value ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                    <div class="w-100 w-md-50 w-xxl-400w flex-shrink-lg-0">
                        <select class="form-select form-select--size-small form-select--size-lg-large js-select"
                                id="selectSpecialization" aria-label="Выбор специализации"
                                data-placeholder="Все специализации">
                            <option></option>
                            <? foreach (array_unique($specProperty) as $key => $value): ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row px-lg-6">
    <div class="col-12 col-lg-8">
        <div class="d-flex flex-column gap-4">

            <? foreach ($arResult['ITEMS'] as $key => $item): ?>
                <?
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="search-item d-flex flex-column gap-3 gap-md-4 pb-3 pb-md-4 border-bottom-dashed"
                     id="<?= $this->GetEditAreaId($item['ID']); ?>">
                    <div class="search-item__header">
                        <div
                            class="breadcrumbs d-flex flex-wrap gap-2 breadcrumbs--without-mobile-arrow search-item__breadcrumbs">
                            <a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex"
                               href="#">
                                <span><?= $item['PROPERTIES']['REGION']['VALUE'] ?></span>
                            </a>
                            <a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex"
                               href="#">
                                <span><?= $item['PROPERTIES']['SPECIALIZATION']['VALUE'] ?></span>
                            </a>
                        </div>
                    </div>
                    <a class="search-item__content d-flex gap-2 gap-md-3 justify-content-between" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                        <div class="d-flex flex-column flex-md-row gap-2 gap-md-3">
                            <span class="search-item__date text-m dark-70"><?= $key + 1 ?>.</span>
                            <span class="search-item__name text-m dark-100"><?= $item['~NAME'] ?></span>
                        </div>
                        <div class="d-none d-md-block">
                            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%"
                                 height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
<div class="row px-lg-6">
    <?= $arResult["NAV_STRING"] ?>
</div>
<? } ?>
