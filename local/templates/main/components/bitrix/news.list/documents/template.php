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
<div class="col-12 col-xxl-8 pe-xxl-6">
    <?foreach($arResult["ITEMS"] as $arItem):?>

        <?$file = $arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'];?>

        <?if(!empty($file)): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a class="d-flex flex-column gap-2 py-3 document-download text-m" href="<?=$file['SRC']?>" download="<?=$file['NAME']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <?=$arItem['NAME']?>
                <div class="d-flex gap-1 align-items-center">
                    <div class="document-download__file caption-m dark-70">
                        <span class="document-download__date-time"><?=!empty($arItem['ACTIVE_FROM']) ? date('d.m.Y H:m', strtotime($arItem['ACTIVE_FROM'])) : ''?></span>
                        <span class="document-download__file-type"><?=explode('.', $file['ORIGINAL_NAME'])[1]?></span>
                    </div>
                    <span class="icon size-s text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                        </svg>
                    </span>
                </div>
            </a>
        <?endif;?>

    <?endforeach;?>
</div>
<div class="col-12 col-xxl-4">
    <?$APPLICATION->IncludeFile('/local/php_interface/include/protection_from_scammers.php');?>
</div>
