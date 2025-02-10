<?php

namespace Dalee\Helpers\ComponentRenderer\Components;

use CBitrixComponent;
use CMain;
use Dalee\Helpers\ComponentRenderer\Interface\ComponentInterface;

class Benefits implements ComponentInterface
{
    public static function render(CMain $application, CBitrixComponent|bool $component, string $filter, ?array $params = []): void
    {
        $colCount = 3;
        $headerTag = false;
        $calcCols = 'Y';

        if (!empty($params['colCount'])) {
            $colCount = $params['colCount'];
        }

        if (!empty($params['headerTag'])) {
            $headerTag = $params['headerTag'];
        }

        if ($params['calcCols'] === 'N') {
            $calcCols = $params['calcCols'];
        }

        if (!empty($params['template'])) {
            $template = $params['template'];
        } else {
            $template = 'benefits';
        }

        ob_start();

        $application->IncludeComponent(
            "bitrix:news.list",
            $template,
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
                "COL_COUNT" => $colCount,
                "CALC_COLS" => $calcCols,
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => [
                    "CODE",
                    "NAME",
                    "PREVIEW_TEXT",
                    "PREVIEW_PICTURE",
                    "DETAIL_TEXT"
                ],
                "FILTER_NAME" => $filter,
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "HEADER_TAG" => $headerTag,
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
                "PROPERTY_CODE" => [
                    "FILE"
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
                "STRICT_SECTION_CHECK" => "N",
                "COLOR_TITLE_BENEFITS_TOP" => $params["colorTitleBenefitsTop"] ?? "orange-100",
                "VIEW_BENEFITS_TOP_HEADER" => $params["viewBenefits"]
            ],
            $component,
            ["HIDE_ICONS" => "Y"]
        );

        echo ob_get_clean();
    }
}
