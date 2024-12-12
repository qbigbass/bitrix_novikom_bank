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
require_once __DIR__ . '/functions.php';
?>

<? foreach ($arResult['ITEMS'] as $key => $item) { ?>
    <?
    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
    ?>

    <?= renderStartTags($key); ?>
    <? $classes = renderClasses($key, $item['DETAIL_PICTURE']); ?>

    <? if (!empty($item['DETAIL_PICTURE']['SRC'])) { ?>
        <div class="<?= $classes ?>" id="<?= $this->GetEditAreaId($item['ID']); ?>">
    <? } else { ?>
        <a class="<?= $classes ?>" href="<?= $item['DETAIL_PAGE_URL'] ?>" id="<?= $this->GetEditAreaId($item['ID']); ?>">
    <? } ?>
        <div class="card-product__inner">
            <? if (!empty($item['DETAIL_PICTURE']['SRC'])) { ?>
                <div class="card-product__content">
                    <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                </div>
                    <img class="card-product__img" src="<?= $item['DETAIL_PICTURE']['SRC'] ?>"
                         alt="<?= $item['DETAIL_PICTURE']['ALT'] ?>" loading="lazy">
                <a class="btn btn-link btn-icon m-auto m-lg-0" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                    <span>Подробнее</span>
                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </a>
            <? } else { ?>
                <div class="card-product__content mw-100">
                    <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                </div>
                <div class="card-product__footer">
                    <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                        <span>Подробнее</span>
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </span>
                    <? if (!empty($item['PREVIEW_PICTURE']['SRC'])) { ?>
                        <img class="icon size-xxl ms-auto" src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>"
                             alt="<?= $item['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                    <? } ?>
                </div>
            <? } ?>
        </div>
    <? if (!empty($item['DETAIL_PICTURE']['SRC'])) { ?>
        </div>
    <? } else { ?>
        </a>
    <? } ?>

    <?= renderEndTags($key, $arResult['ITEMS']); ?>

<? } ?>
