<?php

namespace Dalee\Helpers\ComponentRenderer\Components;

use CBitrixComponent;
use CMain;
use Dalee\Helpers\ComponentRenderer\Interface\ComponentInterface;

class Tabs implements ComponentInterface
{
    public static function render(
        CMain $application,
        CBitrixComponent|bool $component,
        string $filter,
        ?array $params = []
    ): void
    {
        global $filter;
        $padding = false;
        $elementId = false;
        $templateComponent = 'tabs';

        if (!empty($params['padding'])) {
            $padding = $params['padding'];
        }

        if (!empty($params['elementId'])) {
            $elementId = $params['elementId'];
        }

        if (!empty($params['template_component'])) {
            $templateComponent = $params['template_component'];
        }

        ob_start();

        $application->IncludeComponent(
            "bitrix:news.list",
            $templateComponent,
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
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_ID" => $elementId,
                "FIELD_CODE" => [
                    "CODE",
                    "NAME",
                    "PREVIEW_TEXT",
                    "PREVIEW_PICTURE"
                ],
                "FILTER_NAME" => $filter,
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => iblock('tabs'),
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
                    "CALCULATOR",
                    "CONDITIONS_ICONS",
                    "CONDITIONS",
                    "TEXT_FIELD",
                    "CONDITIONS_TABS",
                    "STEPS",
                    "SHORT_INFO",
                    "QUOTES",
                    "ICONS_WITH_DESCRIPTION",
                    "TWO_COLS",
                    "COLS_NAME",
                    "ICON_SHORT_INFO",
                    "HEADING",
                    "RATES_DESCRIPTION",
                    "ICONS_WITH_DESCRIPTION_HEADER",
                    "TEXT_FIELD_HEADER",
                    "BENEFITS",
                    "TEXT_BLOCK_DESCRIPTION",
                    "ACCORDION",
                    "HTML",
                    "QUESTIONS",
                    "DOCUMENTS",
                    "SHOW_TWO_ICONS_IN_ROW",
                    "TARIFFS",
                    "STRATEGIES"
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
                "TABS_PADDING" => $padding,
            ],
            $component,
            ["HIDE_ICONS" => "Y"]
        );

        $content = ob_get_clean();

        if ($params['whole_section'] && strlen(trim($content))) {
            echo '<section class="section-layout js-collapsed-mobile">
                <div class="container">
                    <h3 class="d-none d-md-flex mb-md-6 mb-lg-7 px-lg-6">Подробнее о услугах</h3>
                    <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
                       href="#additional-info-content" role="button" aria-expanded="false" aria-controls="additional-info-content">
                        Подробнее о&nbsp;услугах
                        <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </a>' .
                    $content
                . '</div>
                <picture class="pattern-bg pattern-bg--hide-mobile">
                    <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
                    <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
                    <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                </picture>
            </section>';
        } else {
            echo $content;
        }
    }
}
