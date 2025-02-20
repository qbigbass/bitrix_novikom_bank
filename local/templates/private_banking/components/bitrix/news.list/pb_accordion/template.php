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
<div class="accordion pb-accordion" id="accordion-documents">
    <?php foreach ($arResult['ITEMS'] as $idx => $accordion) : ?>
        <div class="accordion-item animate js-animation">
            <div class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $idx + 1 ?>" aria-controls="<?= $idx + 1 ?>">
                    <span><?= $accordion['NAME'] ?></span>
                </button>
            </div>
            <div class="accordion-collapse collapse" id="<?= $idx + 1 ?>" data-bs-parent="#accordion-documents">
                <div class="accordion-body">
                    <?= $accordion['DETAIL_TEXT'] ?>

                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "documents_list",
                        [
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => ["",""],
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => iblock("documents"),
                            "IBLOCK_TYPE" => "additional",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "20",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => $accordion["PROPERTIES"]["DOCUMENTS"]["VALUE"][0],
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => [
                                "FILE",
                            ],
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N"
                        ],
                        $component
                    );?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
