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
<?php foreach ($arResult['ITEMS'] as $document) : ?>
    <?php if (!empty($document["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"])) : ?>
        <a
            class="document-download"
            href="/documents/<?= $document["CODE"] . '.' . pathinfo($document["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_NAME"], PATHINFO_EXTENSION); ?>"
            data-download
        >
            <span class="me-2"><?= $document['NAME'] ?></span>
            <div class="d-inline-flex gap-2 align-items-center">
                <div class="document-download__file caption-m dark-70">
                    <span class="document-download__date-time"><?= FormatDate('d.m.y H:i', strtotime($document["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["TIMESTAMP_X"])); ?></span>
                    <span class="document-download__file-type"><?= mb_strtolower(pathinfo($document["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_NAME"], PATHINFO_EXTENSION)); ?></span>
                </div>
                <span class="icon size-s pr-text-color">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                    </svg>
                </span>
            </div>
        </a>
    <?php endif; ?>
<?php endforeach; ?>
