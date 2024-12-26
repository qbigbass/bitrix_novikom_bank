<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);
?>
<?if (!empty($arResult['ITEMS'])):?>
    <div class="tab-content mt-4 mt-md-6 mt-lg-7">
        <div class="row row-gap-6">
            <div class="col-12">
                <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-insurance-more">
                    <?foreach ($arResult['ITEMS'] as $item): ?>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#<?= $item['ID'] ?>"
                                    aria-controls="<?= $item['ID'] ?>"
                                >
                                    <span class="h4"><?= $item['NAME'] ?></span>
                                </button>
                            </div>
                            <div class="accordion-collapse collapse" id="<?= $item['ID'] ?>"
                                 data-bs-parent="#accordion-insurance-more">
                                <div class="accordion-body">
                                    <div class="rte rte--accordion">
                                        <?= $item['DETAIL_TEXT'] ?>
                                        <?if(!empty($item["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"])):?>
                                            <div>
                                                <h5>Подробнее о программе</h5>
                                                <div class="link-list">
                                                    <a
                                                        class="d-flex flex-column gap-2 py-3 document-download text-m"
                                                        href="<?= $item["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>"
                                                        download="<?= $item["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["ORIGINAL_NAME"]?>"
                                                    ><?= $item["DISPLAY_PROPERTIES"]["FILE"]["DESCRIPTION"] ?>
                                                        <div class="d-flex gap-1 align-items-center">
                                                            <div class="document-download__file caption-m dark-70">
                                                                <span class="document-download__date-time"><?= $item["TIMESTAMP_X"] ?></span>
                                                                <span class="document-download__file-type"><?= pathinfo($item["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"], PATHINFO_EXTENSION )?></span>
                                                            </div>
                                                            <span class="icon size-s text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
        <div class="mt-4 mt-md-6 mt-lg-7">
            <?= $arResult['NAV_STRING'] ?>
        </div>
    </div>
<?endif;?>
