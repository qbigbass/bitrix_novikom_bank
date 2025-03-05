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

<div class="card-offer-grid">
    <? $upIndex = 0;
    foreach ($arResult['ITEMS'] as $item) {
        $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] == 'Сверху') { ?>
            <a
                href="<?= $item['DETAIL_PAGE_URL'] ?>"
                class="card-product card-product--transparent <?= $upIndex == 0 ? 'card-product--size-large ' : '' ?>card-product--bg-white"
                id="<?= $this->GetEditAreaId($item['ID']); ?>">
                <div class="card-product__inner">
                    <div class="card-product__content">
                        <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                        <p class="card-product__description m-0"><?= $item['~PREVIEW_TEXT'] ?></p>
                    </div>
                    <? if (!empty($item['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['FILE_VALUE']['SRC'])) { ?>
                        <img class="card-product__img" src="<?=$item['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['FILE_VALUE']['SRC']?>"
                             alt="<?=$item['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['FILE_VALUE']['DESCRIPTION']?>" loading="lazy">
                    <? } ?>
                    <span class="btn btn-link btn-icon m-auto m-lg-0 py-2 py-lg-0" >
                        <span>Подробнее</span>
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </span>
                </div>
            </a>
            <? $upIndex++;
        }
    } ?>
</div>

<? $APPLICATION->IncludeFile('/local/php_interface/include/internet_bank_for_business.php'); ?>

<div class="col-12">
    <div class="row cards-gutter">
        <? $downIndex = 0;
        foreach ($arResult['ITEMS'] as $item) {
            if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] == 'Снизу') {

                $classList = match ($downIndex) {
                    0, 1 => 'col-12 col-md-6 col-lg-4',
                    default => 'col-12 col-lg-4',
                };

                if ($downIndex > 2) {
                    $classList = 'col-12 col-md-6 col-xl-3';
                }
                ?>

                <div class="<?= $classList ?>" id="<?= $this->GetEditAreaId($item['ID']); ?>">
                    <a class="card-product card-product--transparent card-product--bg-white"
                       href="<?= $item['DETAIL_PAGE_URL'] ?>">
                        <div class="card-product__inner">
                            <div class="card-product__content mw-100">
                                <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                                <p class="card-product__description m-0 mw-100"><?= $item['~PREVIEW_TEXT'] ?></p>
                            </div>
                            <div class="card-product__footer">
                            <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                            <span>Подробнее</span>
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%"
                                     height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                                <? if (!empty($item['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['FILE_VALUE']['SRC'])) { ?>
                                    <img class="icon size-xxl ms-auto" src="<?= $item['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['FILE_VALUE']['SRC'] ?>"
                                         alt="<?= $item['DISPLAY_PROPERTIES']['PREVIEW_PICTURE']['FILE_VALUE']['DESCRIPTION'] ?>" loading="lazy">
                                <? } ?>
                            </div>
                        </div>
                    </a>
                </div>
                <? $downIndex++;
            }
        } ?>
    </div>
</div>
