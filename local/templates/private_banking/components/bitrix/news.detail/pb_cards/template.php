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

$model = [
    'contact_phone' => $APPLICATION->GetProperty('contact_phone'),
    'contact_email' => $APPLICATION->GetProperty('contact_email'),
    'contact_address' => $APPLICATION->GetProperty('contact_address'),
    'online_bank_url' => $APPLICATION->GetProperty('online_bank_url'),
];

?>

<?$this->SetViewTarget('PB_HEADER');?>
    <div class="container">
        <?php if (!empty($arResult['NAME'])) : ?>
            <h3 class="pb-section__title dark-0 text-center my-4 my-md-6 mt-lg-0 animate js-animation"><?= $arResult['NAME'] ?></h3>
        <?php endif; ?>
        <?php if (!empty($arResult['PREVIEW_TEXT'])) : ?>
            <p class="pb-section__subtitle dark-0 text-center m-0 px-xl-11 animate js-animation"><?= $arResult['PREVIEW_TEXT'] ?></p>
        <?php endif; ?>
        <?php if (!empty($arResult['PROPERTIES']['CARD_IMAGES']['~VALUE'])) : ?>
            <?= $arResult['PROPERTIES']['CARD_IMAGES']['~VALUE'] ?>
        <?php endif; ?>
        <div class="pb-benefits d-flex flex-column flex-lg-row flex-wrap gap-4 align-items-md-start justify-content-lg-center">
            <?php $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "pb_features",
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
                    "IBLOCK_ID" => iblock("benefits"),
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
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "pb-mir-card-features",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => [
                        "ICON",
                    ],
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "SORT",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                ],
                $component
            );?>
        </div>
        <div class="mt-6 mb-4 text-center">
            <button class="btn btn-pb btn-pb--primary btn-pb--size-lg w-100 w-md-auto animate js-animation" type="button" data-bs-toggle="modal" data-bs-target="#modal-become-client" aria-label="Стать клиентом">Стать клиентом</button>
        </div>
    </div>
    <div class="pb-section-hero__overlay pb-section-hero__overlay--size-small"></div>
<?$this->EndViewTarget();?>

<section class="pb-section pb-section--gradient-raial">
    <div class="container">
        <div class="d-flex flex-column row-gap-6">
            <h2 class="pb-section__title dark-0 text-center animate js-animation">Преимущества Мир Supreme</h2>
            <div class="row row-gap-6">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "pb_benefits",
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
                        "IBLOCK_ID" => iblock("benefits"),
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
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "pb-mir-card-benefits",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => [
                            "ICON",
                        ],
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "ID",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N"
                    ],
                    $component
                );?>
                <div class="col-12">
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "pb_accordion",
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
                            "IBLOCK_ID" => iblock("tabs"),
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
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "mir-supreme-card",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => [
                                "DOCUMENTS",
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
                <div class="col-12 pb-section__footer animate js-animation">
                    <div class="d-flex flex-column row-gap-4 align-items-center py-4">
                        <button class="btn btn-pb btn-pb--primary w-100 w-md-auto" type="button" data-bs-toggle="modal" data-bs-target="#modal-become-client" aria-label="Стать клиентом">Заказать карту</button>
                        <p class="pb-text-notes mb-0 pr-text-color text-center">Время изготовления карты <br class="d-md-none">до&nbsp;10 рабочих дней</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal modal-pb fade" id="modal-become-client" tabindex="-1" aria-hidden="true">
    <div class="container modal-pb__container">
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close-small"></use>
                </svg>
            </span>
        </button>
        <div class="modal-dialog">
            <div class="modal-content">
                <?php
                $APPLICATION->IncludeComponent(
                    "dalee:form",
                    "become_client_form",
                    [
                        "FORM_CODE" => "become_client_form",
                    ],
                    $component
                ); ?>
            </div>
        </div>
    </div>
</div>
