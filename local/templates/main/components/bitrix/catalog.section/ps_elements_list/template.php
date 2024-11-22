<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['ITEMS'])) {?>
    <div class="tab-content mt-4 mt-md-6 mt-lg-7">
        <div class="row row-gap-6">
            <div class="col-12">
                <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-insurance-more">
                    <?
                    foreach ($arResult['ITEMS'] as $item) {?>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $item['ID'] ?>" aria-controls="11"><span class="h4"><?= $item['NAME'] ?></span></button>
                            </div>
                            <div class="accordion-collapse collapse" id="<?= $item['ID'] ?>" data-bs-parent="#accordion-insurance-more">
                                <div class="accordion-body">
                                    <div class="d-flex flex-column gap-4 gap-md-5 gap-lg-7">
                                        <?= $item['PREVIEW_TEXT'] ?>
                                        <?= $item['DETAIL_TEXT'] ?>
                                    </div>
                                </div>
                            </div>
                        </div><?
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="mt-4 mt-md-6 mt-lg-7">
            <?=$arResult['NAV_STRING']?>
        </div>
    </div><?
}?>
