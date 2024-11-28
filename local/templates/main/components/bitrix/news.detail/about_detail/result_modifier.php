<?php
/** @var array $arResult */

use Dalee\Services\ContentPlaceholderManager;

$properties = [
    'IMAGES' => fn($value) => '<img src="' . $value . '" class="mobile-element-full-width" alt="" loading="lazy">',
    'QUOTE' => fn($value) => '
        <div class="polygon-container js-polygon-container quote-polygon-container">
            <div class="polygon-container__content quote-polygon-container__content">
                <div class="quote bg-blue-10">
                    <div class="quote__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-md-2 gap-lg-4">
                        <img src="/frontend/dist/img/small-quote-sticker.png" class="quote__image my-md-auto mt-md-0 position-relative" alt="" loading="lazy">
                        <div class="quote__content text-l">' . $value['TEXT'] . '</div>
                    </div>
                </div>
            </div>
            <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-dasharray="10"></polygon>
                </svg>
            </div>
        </div>',
    'EXCLAMATION' => fn($value) => '
        <div class="polygon-container js-polygon-container">
            <div class="polygon-container__content">
                <div class="helper bg-dark-10">
                    <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                        <img alt="Обратите внимание" src="/frontend/dist/img/restructuring-additional-info.png" class="helper__image w-auto float-end" loading="lazy">
                        <div class="helper__content text-l">' . $value['TEXT'] . '</div>
                    </div>
                </div>
            </div>
            <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-dasharray="10"></polygon>
                </svg>
            </div>
        </div>',
    'BENEFITS' => function($value) {
        global $benefitsFilter;
        global $APPLICATION;

        $benefitsFilter = [
            'ACTIVE' => 'Y',
            'ID' => $value
        ];

        ob_start();

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "benefits",
            [
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "COL_COUNT" => "3",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => ["CODE", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", ""],
                "FILTER_NAME" => "benefitsFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => iblock('benefits'),
                "IBLOCK_TYPE" => "additional",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
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
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => ["", ""],
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
                "STRICT_SECTION_CHECK" => "N",
            ],
            false
        );

        return ob_get_clean();
    }
];

$placeholderManager = new ContentPlaceholderManager($properties);
$placeholderManager->processResult($arResult);

$arResult['PLACEHOLDER_CLASS'] = $placeholderManager;
