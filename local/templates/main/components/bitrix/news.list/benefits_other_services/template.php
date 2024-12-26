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
?>
<div class="rte">
    <div>
        <h4>Выгоды Клиента</h4>
        <div class="w-100 d-flex flex-column flex-lg-row align-items-stretch gap-4 gap-lg-12">
            <? foreach ($arResult['ITEMS'] as $arItem) : ?>
                <div class="benefit d-flex gap-3 flex-column">
                    <img class="icon size-xl" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>" loading="lazy">
                    <div class="benefit__content d-flex flex-column gap-3">
                        <h4 class="benefit__title"><?= $arItem['~NAME'] ?></h4>
                        <?if (!empty($arItem['~PREVIEW_TEXT'])) : ?>
                            <div class="benefit__description w-100 text-m">
                                <p class="mb-0 text-m"><?= $arItem['~PREVIEW_TEXT'] ?></p>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
