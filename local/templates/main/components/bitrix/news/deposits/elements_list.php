<?
use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\HeaderView;
use Dalee\Helpers\IblockHelper;

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

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
$helper = $headerView->helper();
$headerView->render(
    $APPLICATION->GetTitle(),
    $APPLICATION->GetProperty("description"),
    ['border-green']
);
?>

<section class="section-catalog d-flex flex-column gap-7 py-6 py-sm-9 py-md-11" id="catalog-tabs">
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
                <div class="col-12 position-relative z-1 d-flex flex-column align-items-start gap-4 gap-md-6 gap-lg-7">
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
                        $component,
                        ["HIDE_ICONS" => "Y"]
                    );?>
                </div>
            </div>
        </div>
    </section>
</section>

<? $arItems = getHlBlockEntries('DepositsInfo'); ?>
<? if (!empty($arItems)) : ?>
    <? $arItem = reset($arItems); ?>
    <section class="section-layout py-lg-11 px-lg-6 bg-blue-10">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-start gap-4 gap-sm-5 gap-md-6">
                <? if (!empty($arItem['UF_IMG'])) : ?>
                    <div class="banner-product-info-alternative__image flex-shrink-0">
                        <img src="<?= CFile::GetPath($arItem['UF_IMG']) ?>" width="160" height="160" alt="" loading="lazy">
                    </div>
                <? endif; ?>
                <div class="banner-product-info-alternative d-flex flex-column gap-4 gap-md-6">
                    <div class="banner-product-info-alternative__header">
                        <h3><?= $arItem['UF_HEADER'] ?? '' ?></h3>
                    </div>
                    <div class="banner-product-info-alternative__body d-flex flex-column gap-4 gap-md-6 text-l">
                        <?= $arItem['UF_TEXT'] ?? '' ?>
                    </div>
                </div>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-top">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<section class="section-layout js-collapsed-mobile">
    <div class="container">
        <h3 class="d-none d-md-flex mb-md-6 mb-lg-7 px-lg-6"><? $APPLICATION->IncludeFile('/deposits/tabs_title.php') ?></h3>
        <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#additional-info-content" role="button" aria-expanded="false" aria-controls="additional-info-content">
            <? $APPLICATION->IncludeFile('/deposits/tabs_title.php') ?>
            <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
            </svg>
        </a>
        <? $renderer->render('Tabs', null, 'deposit-list'); ?>
    </div>
    <picture class="pattern-bg pattern-bg--hide-mobile">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/request_call.php'); ?>

<? $helper->saveCache(); ?>
