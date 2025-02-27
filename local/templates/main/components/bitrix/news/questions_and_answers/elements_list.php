<? use Dalee\Helpers\HeaderView;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use Bitrix\Main\Application;

$headerView = new HeaderView($component);
$helper = $headerView->helper();

$headerView->render(
    $APPLICATION->GetTitle(),
    null,
    ['border-green'],
    1,
);
$context = Application::getInstance()->getContext();
$request = $context->getRequest();
$delFilter = "";

if (!empty($request["arrQuestionFilter_pf"]["TYPE_Q"])) {
    $typeSelected = $request["arrQuestionFilter_pf"]["TYPE_Q"];
    $delFilter = $request["del_filter"];
}

if (!empty($delFilter)) {
    $typeSelected = 0;
}
?>

<section class="section-catalog d-flex flex-column py-6 py-sm-9 py-md-11 gap-4 gap-md-6 gap-lg-7" id="catalog-tabs">
    <!-- Табы -->
    <section class="section-catalog__tabs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "iblock_sections",
                        [
                            "ROOT_MENU_TYPE" => "iblock_sections",
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "Y",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => [],
                            "COMPONENT_TEMPLATE" => "iblock_sections",
                            "ALL_LINK" => "Y",
                            "ALL_LINK_TEXT" => "Все " . mb_strtolower($APPLICATION->GetTitle())
                        ],
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-catalog__list">
        <div class="container">
            <div class="row row-gap-4 row-gap-md-6 row-gap-lg-7">
                <div class="col-12">
                    <!-- Строка поиска -->
                    <?$APPLICATION->IncludeComponent(
                        "dalee:search.block",
                        "",
                        [
                            "PLACEHOLDER" => "Поиск по вопросам и ответам"
                        ],
                        $component
                    ); ?>
                </div>
                <div class="col-12">
                    <!-- Фильтры по свойствам -->
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "iblock_sections_subsections",
                        [
                            "ROOT_MENU_TYPE" => "iblock_subsections",
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "Y",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "MENU_CACHE_GET_VARS" => [],
                            "COMPONENT_TEMPLATE" => "iblock_sections_subsections",
                            "ALL_LINK" => "Y",
                            "ALL_LINK_TEXT" => "Все " . mb_strtolower($APPLICATION->GetTitle())
                        ],
                        $component
                    ); ?>
                </div>
                <div class="col-12 position-relative z-1 d-flex flex-column align-items-start gap-1 gap-md-1">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "questions_and_answers",
                        [
                            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                            "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                            "SORT_BY1" => $arParams["SORT_BY1"],
                            "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                            "SORT_BY2" => $arParams["SORT_BY2"],
                            "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                            "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                            "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                            "SET_TITLE" => $arParams["SET_TITLE"],
                            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                            "MESSAGE_404" => $arParams["MESSAGE_404"],
                            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                            "SHOW_404" => $arParams["SHOW_404"],
                            "FILE_404" => $arParams["FILE_404"],
                            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                            "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
                            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                            "CACHE_TIME" => $arParams["CACHE_TIME"],
                            "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                            "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                            "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                            "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                            "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                            "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                            "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                            "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                            "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                            "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                            "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                            "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                            "FILTER_NAME" => $arParams["FILTER_NAME"],
                            "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                            "CHECK_DATES" => $arParams["CHECK_DATES"],
                            "STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
                            "PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
                            "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                            "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                            "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                            "IBLOCK_SECTIONS" => $arResult["IBLOCK_SECTIONS"],
                        ],
                        $component,
                        ['HIDE_ICONS' => 'Y']
                    );?>
                </div>
            </div>
        </div>
    </section>
</section>

<? $helper->saveCache(); ?>
