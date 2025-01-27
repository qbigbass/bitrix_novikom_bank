<?
function showBlockFinancingMeasures()
{
    ob_start();
    global $APPLICATION; ?>
    <section class="section-catalog section-layout d-flex flex-column bg-purple-10">
        <div class="container">
            <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">Меры финансирования</h3>
        </div>
        <section class="section-catalog__tabs mb-4 mb-md-6 mb-lg-7">
            <div class="container">
                <div class="row px-lg-6">
                    <div class="col-12">
                        <!-- Меню -->
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "iblock_sections",
                            [
                                "ROOT_MENU_TYPE" => "measures_iblock_sections",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_TIME" => "3600000",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => [
                                ],
                                "COMPONENT_TEMPLATE" => "iblock_sections",
                            ],
                            false
                        ); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-catalog__list">
            <div class="container">
                <div class="row align-items-stretch cards-gutter">
                    <!-- Список элементов -->
                    <?
                    $curPage = $APPLICATION->GetCurPage();
                    $arCurPage = array_filter(explode("/", $curPage));
                    $sectionCode = $arCurPage[array_key_last($arCurPage)];

                    if (!empty($sectionCode)) {
                        global $arrFilterSection;
                        $arrFilterSection = [
                            "SECTION_CODE" => $sectionCode
                        ];
                    }

                    $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "restructuring_list",
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
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => ["ID", "NAME", "PREVIEW_TEXT"],
                            "FILTER_NAME" => "arrFilterSection",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => iblock('financing_measures'),
                            "IBLOCK_TYPE" => "for_corporate_clients_ru",
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
                            "PROPERTY_CODE" => [],
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
                            "ADD_COL_CLASS" => "col-lg-6"
                        ]
                    );?>
                </div>
            </div>
        </section>
    </section>
    <?
    $GLOBALS["BLOCK_FINANCING_MEASURES"] = ob_get_contents();
    ob_end_clean();
}
