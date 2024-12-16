<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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

use Dalee\Helpers\ComponentHelper;

$this->setFrameMode(true);?>

<section class="banner-text banner-text--border-green bg-linear-blue">
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 col-xxl-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                <div class="d-flex flex-column align-items-start gap-3 gap-lg-4">
                    <?
                    $helper = new ComponentHelper($component);
                    $helper->deferredCall('showNavChain', ['.default']);
                    ?>
                    <h1 class="banner-text__title dark-0 text-break"><?=$arResult['IBLOCK_NAME']?></h1>
                    <div class="banner-text__description text-l dark-0"><?=$arResult['IBLOCK_DESCRIPTION']?></div>
                </div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<section class="section-catalog d-flex flex-column gap-7 py-6 py-sm-9 py-md-11">
    <div class="section-catalog__tabs">
        <?php $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "cards_sections_menu",
            Array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "iblock_sections",
                "USE_EXT" => "Y"
            ),
            $component
        );?>
    </div>
    <div class="section-catalog__list">
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "cards_list",
            Array(
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
            ),
            $component
        );?>
    </div>
</section>

<?$APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block.php')?>

<?$APPLICATION->IncludeFile('/local/php_interface/include/request_call.php')?>

<?$helper->saveCache();?>
