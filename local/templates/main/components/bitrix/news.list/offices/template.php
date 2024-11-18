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

<?php foreach ($arResult['ITEMS'] as $arItem) : ?>
    <div class="mb-4">
        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
            <div><?= $arItem['NAME'] ?></div>
            <div><?= $arItem['DISPLAY_PROPERTIES']['ADDRESS']['VALUE'] ?></div>
        </a>
    </div>
<?php endforeach; ?>
