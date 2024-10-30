<? use Dalee\Helpers\ComponentHelper;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>

<!-- Баннер в шапке -->
<section class="text-banner pe-lg-0 px-0 px-lg-6 bg-linear-blue text-banner--border-green">
    <div class="container text-banner__container position-relative z-2">
        <div class="row">
            <div class="col-12 position-relative z-1 mb-5 mb-md-0 pt-6">
                <div class="d-flex flex-column align-items-start gap-3 gap-md-4">

                    <?
                        $helper = new ComponentHelper($component);
                        $helper->deferredCall('showNavChain', ['.default']);
                    ?>

                    <h1 class="text-banner__title dark-0 text-break"><?=$APPLICATION->GetTitle()?></h1>
                    <div class="text-banner__description text-l dark-0"><?=$APPLICATION->GetProperty("description")?></div>
                </div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top text-banner__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<section class="section-catalog d-flex flex-column gap-7 py-6 py-sm-9 py-md-11">

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
                            "MENU_CACHE_GET_VARS" => [
                            ],
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

    <!-- Список элементов -->
    <section class="section-catalog__list">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative z-1 d-flex flex-column align-items-start gap-5 gap-md-7">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "deposits_list",
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
                        $component
                    );?>
                </div>
            </div>
        </div>
    </section>

</section>

<section class="section-layout js-collapsed-mobile">
    <div class="container">
        <h3 class="d-none d-md-flex mb-md-6 mb-lg-7 px-lg-6">Подробнее о вкладах</h3>
        <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#additional-info-content" role="button" aria-expanded="false" aria-controls="additional-info-content">
            Подробнее о вкладах
            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
            </svg>
        </a>

        <?global $tabsFilter;
        $tabsFilter = [
            'ACTIVE' => 'Y',
            'SECTION_CODE' => 'deposit-list'
        ];

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "tabs",
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
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
                "FILTER_NAME" => "tabsFilter",
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
                "PROPERTY_CODE" => ["CONDITIONS_ICONS","CONDITIONS","TEXT_FIELD","SHORT_INFO","QUOTES","QUESTIONS","DOCUMENTS"],
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
            $component
        );?>

    </div>
    <picture class="pattern-bg pattern-bg--hide-mobile">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<?
$iblock = Bitrix\Iblock\IblockTable::getList([
    'select' => ['DESCRIPTION'],
    'filter' => ['CODE' => 'deposits']
])->fetch();
?>

<section class="section-layout py-lg-11 bg-blue-10">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-start gap-4 gap-sm-5 gap-md-6">
            <div class="banner-product-info-alternative__image flex-shrink-0">
                <img src="/frontend/dist/img/footer-insurance.png" width="160" height="160" alt="" loading="lazy">
            </div>
            <div class="banner-product-info-alternative d-flex flex-column gap-4 gap-md-6">
                <?= $iblock['DESCRIPTION'] ?>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-top">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<?$APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block.php', ['HEADER_TEXT' => 'Смотрите также']);?>
<?$APPLICATION->IncludeFile('/local/php_interface/include/request_call.php');?>

<? $helper->saveCache(); ?>
