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

<? foreach ($arResult['ITEMS'] as $item) { ?>
    <?
    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="col-12 col-md-6" id="<?=$this->GetEditAreaId($item['ID']);?>">
        <div class="card-product card-product--transparent card-product--bg-white">
            <div class="card-product__inner">
                <div class="card-product__content">
                    <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                    <p class="card-product__description m-0"><?= $item['~PREVIEW_TEXT'] ?></p>
                </div>
                <?if (!empty($item['PREVIEW_PICTURE']['SRC'])):?>
                    <img class="card-product__img" src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                <?endif;?>
                <a class="btn btn-link btn-icon m-auto m-md-0" href="<?= $item['DETAIL_PAGE_URL'] ?>"><span><?= $item['CODE'] == 'online-transfer' ? 'Перевести онлайн' : 'Подробнее' ?></span>
                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
<? } ?>
