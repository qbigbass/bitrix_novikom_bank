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

<div class="row px-lg-6">
    <div class="col-12 col-lg-9 col-xl-8">
        <div class="d-flex flex-column gap-4 gap-md-6">

            <? foreach ($arResult['ITEMS'] as $key => $item): ?>
                <?
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <a class="announcement" href="<?= $item['DETAIL_PAGE_URL'] ?>" tabIndex="-1" id="<?=$this->GetEditAreaId($item['ID']);?>">
                    <span class="dark-70"><?= $item['PROPERTIES']['PUBLICATION_DATE']['VALUE'] ?></span>
                    <span class="dark-100"><?= $item['NAME'] ?></span>
                    <span class="icon size-m d-none d-md-inline-block ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                        </svg>
                    </span>
                </a>
            <? endforeach; ?>

        </div>
    </div>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
<div class="row px-lg-6">
    <?= $arResult["NAV_STRING"] ?>
</div>
<? } ?>
