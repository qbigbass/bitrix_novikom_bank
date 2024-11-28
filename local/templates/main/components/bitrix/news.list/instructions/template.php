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
$classColsCount = ($arParams['COL_COUNT'] == '2') ? 'col-lg-6' : 'col-lg-4';
?>
<?foreach($arResult["ITEMS"] as $arItem) : ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="col-12 <?=$classColsCount?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="d-flex flex-column flex-md-row flex-lg-column gap-2 gap-md-4 gap-lg-3 align-items-start align-items-md-center align-items-lg-start pe-xxl-11">
            <img class="icon size-xl" src="<?=$arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']?>" alt="" loading="lazy">
            <div class="d-flex flex-column gap-2 align-items-start">
                <?if ($arItem['DISPLAY_PROPERTIES']['SHOW_ONLY_DESCRIPTION']['VALUE'] != 'Y'): ?>
                    <h4><?=$arItem['~NAME']?></h4>
                <?endif;?>
                <span class="text-l"><?=$arItem['PREVIEW_TEXT']?></span>
                <?if (!empty($arItem['DISPLAY_PROPERTIES']['LINK_TITLE']['~VALUE'])) : ?>
                    <a class="btn btn-link d-inline-flex gap-2 align-items-center mt-md-2" href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>">
                        <?=$arItem['DISPLAY_PROPERTIES']['LINK_TITLE']['~VALUE']?>
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </a>
                <?endif;?>
            </div>
        </div>
    </div>
<?endforeach;?>
