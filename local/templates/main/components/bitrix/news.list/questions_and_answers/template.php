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

foreach ($arResult['ITEMS'] as $key => $item) {

    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
    ?>
    <div class="col-12 col-xxl-8">
        <div class="accordion" id="accordion-qa">
            <div class="accordion-item">
                <div class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $item['ID'] ?>" aria-controls="<?= $item['ID'] ?>">
                        <?= $item['NAME'] ?>
                    </button>
                </div>
                <div class="accordion-collapse collapse" id="<?= $item['ID'] ?>" data-bs-parent="#accordion-qa">
                    <div class="accordion-body">
                        <p class="text-m mb-0 dark-70">
                            <?= $item['PREVIEW_TEXT'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? } ?>
