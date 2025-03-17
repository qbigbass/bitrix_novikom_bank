<?
use Dalee\Helpers\ComponentRenderer\Renderer;
use Dalee\Helpers\ComponentHelper;
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

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
?>
<div
    class="banner-text bg-linear-blue border-green"
    <? if (!empty($arResult['DISPLAY_PROPERTIES']['BANNER_BACKGROUND']['FILE_VALUE']['SRC'])): ?>
        style="background: url('<?= $arResult['DISPLAY_PROPERTIES']['BANNER_BACKGROUND']['FILE_VALUE']['SRC']; ?>') no-repeat center center / cover;"
    <? endif; ?>
>
    <div class="banner-product__wrapper">
        <div class="banner-product__content">
            <div class="banner-product__header">
                <?
                $helper = new ComponentHelper($component);
                $helper->deferredCall('showNavChain', ['.default']);
                ?>
                <h1>
                    <?= $arResult['~NAME'] ?>
                </h1>
                <p class="banner-product__subtitle text-l"><?= $arResult['~DETAIL_TEXT'] ?></p>
            </div>
            <? if (
                !empty($arResult['DISPLAY_PROPERTIES']['SHORT_CONDITIONS']['~VALUE']['TEXT'])
                && $arResult['DISPLAY_PROPERTIES']['CARD_HEADER_TEMPLATE']['VALUE_XML_ID'] === 'detailed'
            ): ?>
                <div class="banner-product__benefits-list">
                    <?= $arResult['DISPLAY_PROPERTIES']['SHORT_CONDITIONS']['~VALUE']['TEXT'] ?>
                </div>
            <? endif; ?>
            <? if (!empty($arResult['DISPLAY_PROPERTIES']['BANNER_IMAGE']['FILE_VALUE']['SRC'])): ?>
                <img
                    class="banner-product__image"
                    src="<?= $arResult['DISPLAY_PROPERTIES']['BANNER_IMAGE']['FILE_VALUE']['SRC']; ?>"
                    alt="<?= htmlspecialchars($arResult['~NAME']); ?>"
                >
            <? endif; ?>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</div>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['DETAIL_HTML']['~VALUE']['TEXT'])): ?>
    <section class="section-layout py-lg-11 px-lg-6">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-start gap-4 gap-sm-5 gap-md-6">
                <div class="banner-product-info-alternative d-flex flex-column gap-4 gap-md-6">
                    <?= $arResult['DISPLAY_PROPERTIES']['DETAIL_HTML']['~VALUE']['TEXT'] ?>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT'])): ?>
    <section class="section-layout pt-0 pb-xxl-11">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper bg-dark-10">
                                <div
                                    class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end"
                                         src="/frontend/dist/img/restructuring-additional-info.png" alt="">
                                    <div class="helper__content text-l">
                                        <? if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_HEADER']['~VALUE'])): ?>
                                            <h4 class="mb-3"><?= $arResult['PROPERTIES']['ADDITIONAL_INFO_HEADER']['~VALUE'] ?></h4>
                                        <? endif; ?>
                                        <p class="mb-0"><?= $arResult['PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['PROPERTIES']['BENEFITS']['VALUE'])): ?>
    <section class="section-layout">
        <div class="container">
            <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7"><?= $arResult['PROPERTIES']['BENEFITS_HEADER']['~VALUE'] ?></h3>
            <div class="row row-gap-6 row-gap-md-7 px-lg-6">

                <? $renderer->render('Benefits', $arResult['PROPERTIES']['BENEFITS']['VALUE'], null, ['colCount' => 2]); ?>

            </div>

            <? if (!empty($arResult['PROPERTIES']['MOBILE_APP']['VALUE']) && $arResult['PROPERTIES']['MOBILE_APP']['VALUE'] == 'Y') { ?>
                <div class="row mt-6 mt-lg-11 row-gap-2">
                    <div class="col-12 col-xl-8 pe-xl-0">
                        <? $APPLICATION->IncludeFile('/local/php_interface/include/mobile_app_block.php'); ?>
                    </div>
            <? } ?>
            <? if (!empty($arResult['PROPERTIES']['ONLINE_BANK']['VALUE']) && $arResult['PROPERTIES']['ONLINE_BANK']['VALUE'] == 'Y') { ?>
                <? if (empty($arResult['PROPERTIES']['MOBILE_APP']['VALUE']) && $arResult['PROPERTIES']['MOBILE_APP']['VALUE'] != 'Y') { ?>
                    <div class="row mt-6 mt-lg-11 row-gap-2">
                <? } ?>
                    <div class="col-12 col-xl-4 ps-xl-2">
                        <? $APPLICATION->IncludeFile('/local/php_interface/include/online_bank_block.php'); ?>
                    </div>
                </div>
            <? } else { ?>
                </div>
            <? } ?>

        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom section-restructuring-benefits__pattern">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['CONVENIENCES']['VALUE'])) : ?>
    <section class="section-layout">
        <div class="container">
            <? if (!empty($arResult['DISPLAY_PROPERTIES']['CONVENIENCES_HEADER']['~VALUE'])): ?>
                <h3 class="px-lg-6 mb-6 mb-lg-7">
                    <?= $arResult['DISPLAY_PROPERTIES']['CONVENIENCES_HEADER']['~VALUE']; ?>
                </h3>
            <? endif; ?>
            <?
            global $conveniencesFilter;
            $conveniencesFilter = [
                'ACTIVE' => 'Y',
                'ID' => $arResult['DISPLAY_PROPERTIES']['CONVENIENCES']['VALUE']
            ];

            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "conveniences",
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
                    "FIELD_CODE" => ["PREVIEW_TEXT"],
                    "FILTER_NAME" => "conveniencesFilter",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => iblock('reliable_and_convenient_ru'),
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
                    "PROPERTY_CODE" => ["ICON"],
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
            ); ?>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['CARD_RECEIPT_OPTIONS']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile bg-dark-10">
        <div class="container">
            <? if (!empty($arResult['DISPLAY_PROPERTIES']['CARD_RECEIPT_OPTIONS_HEADER']['~VALUE'])): ?>
                <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6">
                    <?= $arResult['DISPLAY_PROPERTIES']['CARD_RECEIPT_OPTIONS_HEADER']['~VALUE']; ?>
                </h3>
                <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
                   href="#how-apply" role="button" aria-expanded="false" aria-controls="how-apply">
                    <?= $arResult['DISPLAY_PROPERTIES']['CARD_RECEIPT_OPTIONS_HEADER']['~VALUE'] ?>
                    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </a>
            <? endif; ?>
            <div class="collapse d-md-block mt-4 mt-md-6 mt-lg-7" id="how-apply">
                <div class="row px-lg-6 row-gap-6">
                    <?
                    global $cardReceiptOptionsFilter;
                    $cardReceiptOptionsFilter = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['DISPLAY_PROPERTIES']['CARD_RECEIPT_OPTIONS']['VALUE']
                    ];
                    $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "instructions",
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
                            "FIELD_CODE" => ["PREVIEW_TEXT"],
                            "FILTER_NAME" => "cardReceiptOptionsFilter",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => iblock('instructions_ru'),
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
                            "PROPERTY_CODE" => ["ICON", "LINK_TITLE", "LINK", "SHOW_ONLY_DESCRIPTION"],
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
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT_BOTTOM']['VALUE'])) { ?>
    <section class="section-layout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper bg-dark-10">
                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6"><img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="">
                                    <div class="helper__content text-l">
                                        <p class="mb-0"><?= $arResult['PROPERTIES']['QUOTE_TEXT_BOTTOM']['~VALUE']['TEXT'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? } ?>

<? $helper->saveCache(); ?>
