<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
require_once __DIR__ . '/functions.php';
?>

<div class="row mb-4 mb-md-6 mb-lg-7">
    <div class="col-12 col-lg-6">
        <h3 class="mb-3"><?= $arResult['~NAME'] ?></h3>
        <p class="m-0"><?= $arResult['~DESCRIPTION'] ?></p>
    </div>
</div>
<div class="row">
    <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-documents">
        <? foreach ($arResult['ITEMS'] as $key => $item): ?>
            <div class="accordion-item" id="charter-and-regulations">
                <div class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $key?>"
                            aria-expanded="false" aria-controls="<?= $key?>"><span
                        class="fw-bold h4"><?= $item['NAME'] ?></span>
                    </button>
                </div>
                <div class="accordion-collapse collapse" id="<?= $key?>" data-bs-parent="#accordion-documents">
                    <div class="accordion-body">
                        <div class="d-flex flex-column gap-4 gap-md-5 gap-lg-7">

                            <? if (!empty($item['DISPLAY_PROPERTIES']['STRING_DESCRIPTION']['VALUE'])): ?>
                                <div class="table-tab cell-2 px-lg-6">
                                    <div class="table-tab__body">
                                        <?= renderDescription($item['DISPLAY_PROPERTIES']['STRING_DESCRIPTION']); ?>
                                    </div>
                                </div>
                            <? endif; ?>

                            <? if (!empty($item['DISPLAY_PROPERTIES']['HEADER_TEXT']['VALUE'])): ?>
                                <div class="px-lg-6">
                                    <div class="h5 mb-3"><?= $item['PROPERTIES']['HEADER_TEXT']['~DESCRIPTION'] ?></div>
                                    <p class="mb-0"><?= $item['PROPERTIES']['HEADER_TEXT']['~VALUE'] ?></p>
                                </div>
                            <? endif; ?>

                            <? if (!empty($item['DISPLAY_PROPERTIES']['FILES']['VALUE'])): ?>
                                <div>
                                    <? if (!empty($item['PROPERTIES']['HEADER_FILES']['VALUE'])): ?>
                                        <div class="h5 mb-3"><?= $item['PROPERTIES']['HEADER_FILES']['VALUE'] ?></div>
                                    <? endif; ?>
                                    <?= renderFiles($item['DISPLAY_PROPERTIES']['FILES']['FILE_VALUE']); ?>
                                </div>
                            <? endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>
