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
$this->setFrameMode(true); ?>

<? foreach ($arResult['ITEMS'] as $arItem) { ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="col-12 col-md-6 col-lg-<?= 12 / $arParams['COL_COUNT'] ?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="benefit d-flex gap-3 flex-column">
            <img class="icon size-xxl" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                 alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
            <div class="benefit__content d-flex flex-column gap-3">
                <? if (!empty($arItem['~PREVIEW_TEXT'])) { ?>
                    <h4 class="benefit__title"><?= $arItem['~NAME'] ?></h4>
                <? }

                $text = $arItem['~PREVIEW_TEXT'] ?: $arItem['~NAME'];

                if ($arParams['HEADER_TAG'] == 'h4') { ?>
                    <h4 class="benefit__title"><?= $text ?></h4>
                <? } else { ?>
                    <div
                        class="benefit__description w-100 <?= !empty($arItem['~PREVIEW_TEXT']) ? 'text-m' : 'text-l' ?>"><?= $text ?></div>
                <? } ?>
                </span>
            </div>
        </div>
    </div>
<? } ?>


