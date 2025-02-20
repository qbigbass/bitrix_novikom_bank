<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
$this->setFrameMode(true);
?>
<?php foreach ($arResult['ITEMS'] as $idx => $arItem) : ?>
    <div class="pb-card-benefit d-flex align-items-center animate js-animation">
        <img class="pb-card-benefit__icon" src="<?= $arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC'] ?>" alt="<?= htmlspecialchars($arItem['~NAME']) ?>">
        <div class="m-0 pr-text-color pb-card-benefit__description"><?= $arItem['NAME'] ?></div>
    </div>
<?php endforeach; ?>
