<?php

namespace Dalee\Helpers\ComponentRenderer\Components;

use CBitrixComponent;
use CMain;
use Dalee\Helpers\ComponentRenderer\Interface\ComponentInterface;

class NewsList implements ComponentInterface
{
    public static function render(CMain $application, CBitrixComponent|bool $component, string $filter, ?array $params = []): void
    {
        ob_start();

        $application->IncludeComponent(
            "bitrix:news.list",
            "news_list",
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
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => ["CODE", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", ""],
                "FILTER_NAME" => $filter,
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => iblock('press_center_ru'),
                "IBLOCK_TYPE" => "about_ru",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "20",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "square",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => ["PUBLICATION_DATE"],
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
            $component,
            ["HIDE_ICONS" => "Y"]
        );

        echo ob_get_clean();
    }
}
