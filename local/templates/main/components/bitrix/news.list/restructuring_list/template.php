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

<? foreach ($arResult['ITEMS'] as $key => $item) { ?>
    <? $addClass = $arParams["ADD_COL_CLASS"] ?? ""; ?>
    <?
    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    if (empty($arParams["ADD_COL_CLASS"])) {
        if ($key != count($arResult['ITEMS']) - 1 || count($arResult['ITEMS']) <= 2) {
            $addClass = "col-lg-6";
        }
    }
    ?>
    <div class="col-12 <?= $addClass ?>" id="<?=$this->GetEditAreaId($item['ID']);?>">
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
<? } ?>
