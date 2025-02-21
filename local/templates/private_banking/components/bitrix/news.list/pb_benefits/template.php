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
    <div class="col-12 col-md-6 col-lg-4">
        <div class="pb-card d-flex animate js-animation">
            <div class="pb-card__content d-flex flex-column align-items-start">
                <h3 class="pb-card__title dark-0"><?= $document['NAME'] ?></h3>
                <div class="pb-card__footer mt-auto">
                    <?= $document['DETAIL_TEXT'] ?>
                </div>
            </div>
            <img class="pb-card__image" src="<?= $document["DISPLAY_PROPERTIES"]["ICON"]["FILE_VALUE"]["SRC"] ?>" alt="">
        </div>
    </div>
<?php endforeach; ?>
