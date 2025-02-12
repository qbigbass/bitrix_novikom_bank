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
$this->setFrameMode(true);?>
<?
global $MAIN_SECTION;
$bg = "bg-purple-10";

if ($MAIN_SECTION === "msb") {
    $bg = "bg-blue-10";
} elseif ($MAIN_SECTION === "fi") {
    $bg = "bg-dark-30";
}
?>
<? $i = 0; ?>
<? foreach ($arResult['ITEMS'] as $benefit) : ?>
    <div class="col-12<? if ($i < 2) : ?> col-md-6 col-xl-4 <? endif ?><? if ($i === 2) : ?> col-xl-4 <? endif ?><? if ($i > 2) : ?> col-md-6<? endif ?>">
        <div class="card-benefit d-inline-flex px-3 px-sm-5 px-lg-6 p-4 p-sm-5 p-lg-6 w-100 h-100 <?= $bg ?>">
            <div class="card-benefit__inner d-flex flex-column gap-6 gap-lg-7 justify-content-between h-100 w-100">
                <div class="card-benefit__content d-flex flex-column gap-4">
                    <h4 class="card-benefit__title"><?= $benefit['~NAME'] ?></h4>
                    <p class="card-benefit__description m-0 text-m"><?= $benefit['~PREVIEW_TEXT'] ?></p>
                </div>
                <? if (!empty($benefit["PROPERTIES"]["ICON"]["VALUE"])) : ?>
                    <? $arFile = CFile::GetByID($benefit["PROPERTIES"]["ICON"]["VALUE"])->Fetch(); ?>
                    <div class="card-benefit__read-more d-flex align-items-end justify-content-between">
                        <div class="card-benefit__icon">
                            <img class="size-xxl icon" src="<?= $arFile["SRC"] ?>" alt="" loading="lazy">
                        </div>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </div>
    <?$i++;?>
<?endforeach;?>

