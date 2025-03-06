<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
use Dalee\Helpers\ComponentRenderer\Renderer;
$renderer = new Renderer($APPLICATION, $component);

?>
<section
    class="banner-text border-green <?=$arResult['DISPLAY_PROPERTIES']['BANNER_STYLE']['VALUE_XML_ID']?>"
    <? if (!empty($arResult['DISPLAY_PROPERTIES']['BONUS_HEADER_BACKGROUND']['FILE_VALUE']['SRC'])): ?>
        style="background: url('<?= $arResult['DISPLAY_PROPERTIES']['BONUS_HEADER_BACKGROUND']['FILE_VALUE']['SRC']; ?>') no-repeat center center / cover;"
    <? endif; ?>
>
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 col-sm-6 col-md-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                <div class="banner-text__content d-flex flex-column align-items-start gap-3 gap-lg-4">
                    <?
                    $helper = new ComponentHelper($component);
                    $helper->deferredCall('showNavChain', ['.default']);
                    ?>
                    <h1 class="banner-text__title dark-0 text-break">
                        <?= $arResult['~NAME']; ?>
                    </h1>
                    <? if ($arResult['DISPLAY_PROPERTIES']['BONUS_HEADER_TEMPLATE']['VALUE_XML_ID'] === 'detailed'): ?>
                        <div class="banner-text__description text-l dark-0">
                            <?= $arResult['DETAIL_TEXT']; ?>
                        </div>
                    <? endif; ?>
                    <? if (!empty($arResult['DISPLAY_PROPERTIES']['BUTTON_SHOW']['VALUE'])): ?>
                        <button
                            class="btn btn-tertiary btn-lg-lg banner-product__button"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-credit-card-form"
                        >
                            <?= $arResult['DISPLAY_PROPERTIES']['BUTTON_TEXT']['VALUE'] ?? 'Оформить заявку'; ?>
                        </button>
                    <? endif; ?>
                </div>
            </div>
            <div class="d-none d-sm-block col-12 col-sm-6 col-md-4">
                <? if (!empty($arResult['DISPLAY_PROPERTIES']['BONUS_HEADER_IMAGE']['FILE_VALUE']['SRC'])): ?>
                    <img
                        class="banner-text__image position-relative w-auto float-end"
                        src="<?= $arResult['DISPLAY_PROPERTIES']['BONUS_HEADER_IMAGE']['FILE_VALUE']['SRC']; ?>"
                        alt="<?= $arResult['NAME']; ?>"
                        loading="lazy"
                    >
                <? endif; ?>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
<? if (!empty($arResult['DISPLAY_PROPERTIES']['BONUS_BENEFITS']['VALUE'])): ?>
    <section class="section-layout">
        <div class="container">
            <div class="row row-gap-6 row-gap-md-7 px-lg-6">
                <? if (!empty($arResult['DISPLAY_PROPERTIES']['BONUS_BENEFITS_HEADING']['~VALUE'])): ?>
                    <h3>
                        <?= $arResult['DISPLAY_PROPERTIES']['BONUS_BENEFITS_HEADING']['~VALUE']; ?>
                    </h3>
                <? endif; ?>
                <? $renderer->render('Benefits', $arResult['PROPERTIES']['BONUS_BENEFITS']['VALUE'], null, ['colCount' => $arResult['DISPLAY_PROPERTIES']['BENEFITS_COL']['VALUE'] ?? 3]); ?>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS_INFO_BOX']['~VALUE']['TEXT'])) :?>
    <section class="section-layout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper bg-dark-10">
                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="">
                                    <div class="helper__content text-l">
                                        <p class="mb-0"><?=$arResult['DISPLAY_PROPERTIES']['BENEFITS_INFO_BOX']['~VALUE']['TEXT']?></p>
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
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['CASHBACK_CATEGORIES']['VALUE'])) : ?>
    <section class="section-layout bg-blue-10">
        <?$GLOBALS['cashbackFilter'] = [
            'ACTIVE' => 'Y',
            'IBLOCK_SECTION_ID' => $arResult['DISPLAY_PROPERTIES']['CASHBACK_CATEGORIES']['VALUE']
        ];?>

        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "cashback",
            [
                "CASHBACK_HEADER" => $arResult['DISPLAY_PROPERTIES']['CASHBACK_CATEGORIES_HEADER']['~VALUE'],

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
                "FILTER_NAME" => "cashbackFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => iblock('cashback_categories_ru'),
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
    </section>
<?endif;?>

<?if($arResult['DISPLAY_PROPERTIES']['SHOW_BONUSES_CALC']['VALUE'] === 'Y'): ?>
    <section class="section-layout">
        <div class="container">
            <h3 class="px-lg-6 mb-6 mb-lg-7">Калькулятор бонусов</h3>
            <? $APPLICATION->IncludeComponent(
                "dalee:calculator",
                "bonuses",
                array(
                    "CALCULATOR_ELEMENT_ID" => $arResult['ID'],
                )
            ); ?>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTION_1']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile bg-dark-10">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_1_HEADING']['~VALUE']?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#instruction-1" role="button" aria-expanded="false" aria-controls="instruction-1">
                <?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_1_HEADING']['~VALUE']?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block" id="instruction-1">
                <div class="row px-lg-6 row-gap-6 row-gap-lg-7 mt-4 mt-md-6 mt-lg-7">
                    <?$GLOBALS['cardReceiptOptionsFilter'] = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['DISPLAY_PROPERTIES']['INSTRUCTION_1']['VALUE']
                    ];?>

                    <?$APPLICATION->IncludeComponent(
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
                            "PROPERTY_CODE" => ["ICON","LINK_TITLE", "LINK", "SHOW_ONLY_DESCRIPTION"],
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
                            "COL_COUNT" => (!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTION_1_COLS']['VALUE'])) ? $arResult['DISPLAY_PROPERTIES']['INSTRUCTION_1_COLS']['VALUE'] : '3',
                        ],
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['BONUS_TABS']['VALUE'])): ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6">
                <?= $arResult['DISPLAY_PROPERTIES']['BONUS_TABS_HEADING']['~VALUE']; ?>
            </h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#additional-info-content" role="button" aria-expanded="false" aria-controls="additional-info-content">
                <?= $arResult['DISPLAY_PROPERTIES']['BONUS_TABS_HEADING']['~VALUE']; ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <? $renderer->render('Tabs', $arResult['PROPERTIES']['BONUS_TABS']['VALUE'], null, ['elementId' => $arResult['ID']]); ?>
        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile bg-dark-10">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2_HEADING']['~VALUE']?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#instruction-2" role="button" aria-expanded="false" aria-controls="instruction-2">
                <?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2_HEADING']['~VALUE']?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block" id="instruction-2">
                <div class="row px-lg-6 row-gap-6 row-gap-lg-7 mt-4 mt-md-6 mt-lg-7">
                    <?$GLOBALS['cardReceiptOptionsFilter'] = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2']['VALUE']
                    ];?>

                    <?$APPLICATION->IncludeComponent(
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
                            "PROPERTY_CODE" => ["ICON","LINK_TITLE", "LINK", "SHOW_ONLY_DESCRIPTION"],
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
                            "COL_COUNT" => (!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2_COLS']['VALUE'])) ? $arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2_COLS']['VALUE'] : '3',
                        ],
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['INFO_BOX']['~VALUE']['TEXT'])) :?>
    <section class="section-layout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper bg-dark-10">
                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="">
                                    <div class="helper__content text-l">
                                        <? if (!empty($arResult['DISPLAY_PROPERTIES']['INFO_BOX_HEADER']['~VALUE'])): ?>
                                            <h4 class="mb-3">
                                                <?= $arResult['DISPLAY_PROPERTIES']['INFO_BOX_HEADER']['~VALUE']; ?>
                                            </h4>
                                        <? endif; ?>
                                        <p class="mb-0">
                                            <?= $arResult['DISPLAY_PROPERTIES']['INFO_BOX']['~VALUE']['TEXT']; ?>
                                        </p>
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
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTION_3']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile bg-dark-10">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_3_HEADING']['~VALUE']?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#instruction-3" role="button" aria-expanded="false" aria-controls="instruction-3">
                <?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_3_HEADING']['~VALUE']?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block" id="instruction-3">
                <div class="row px-lg-6 row-gap-6 row-gap-lg-7 mt-4 mt-md-6 mt-lg-7">
                    <?$GLOBALS['cardReceiptOptionsFilter'] = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['DISPLAY_PROPERTIES']['INSTRUCTION_3']['VALUE']
                    ];?>

                    <?$APPLICATION->IncludeComponent(
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
                            "PROPERTY_CODE" => ["ICON","LINK_TITLE", "LINK", "SHOW_ONLY_DESCRIPTION"],
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
                            "COL_COUNT" => (!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTION_3_COLS']['VALUE'])) ? $arResult['DISPLAY_PROPERTIES']['INSTRUCTION_3_COLS']['VALUE'] : '3',
                        ],
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "credit_card_form",
    [
        "FORM_CODE" => "credit_card_form",
    ],
    $component
); ?>

<? $helper->saveCache(); ?>
