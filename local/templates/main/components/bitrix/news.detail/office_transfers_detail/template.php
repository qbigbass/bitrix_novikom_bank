<?
use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$parentElementCode = basename($APPLICATION->GetCurPage());
$element = \Bitrix\Iblock\ElementTable::getList([
    'filter' => [
        'CODE' => $parentElementCode
    ],
    'select' => ['NAME', 'PREVIEW_TEXT']
])->fetch();

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);

$helper = $headerView->helper();

$headerView->render(
    $element['NAME'],
    $element['PREVIEW_TEXT'],
    ['bg-linear-blue', 'banner-text--border-green'],
);
?>

<section class="section-layout pt-xl-11">
    <div class="container">
        <div class="row px-lg-6">
            <div class="col-12">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "iblock_elements_ajax",
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
                        "MENU_CACHE_GET_VARS" => [
                        ],
                        "COMPONENT_TEMPLATE" => "iblock_elements_ajax",
                    ],
                );
                ?>
            </div>
        </div>
    </div>
</section>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "steps",
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
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => iblock('steps'),
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
            "PAGER_TEMPLATE" => "square",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => $arResult['PROPERTIES']['STEPS']['VALUE'],
            "STEPS_HEADER" => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'],
            "STEPS_TEMPLATE" => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'],
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => "",
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
} ?>

<? if (!empty($arResult['PROPERTIES']['TABS']['VALUE'])) { ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-flex mb-md-6 mb-lg-7 px-lg-6"><?= $arResult['PROPERTIES']['TABS_HEADER']['~VALUE'] ?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#additional-info-content" role="button" aria-expanded="false" aria-controls="additional-info-content">
                <?= $arResult['PROPERTIES']['TABS_HEADER']['~VALUE'] ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>

            <? $renderer->render('Tabs', $arResult['PROPERTIES']['TABS']['VALUE']); ?>

        </div>
    </section>
<? } ?>


<? $helper->saveCache(); ?>
