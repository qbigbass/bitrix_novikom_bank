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

$headerView = new HeaderView($component);
$renderer = new Renderer($APPLICATION, $component);
$helper = $headerView->helper();

$params["COLOR_TITLE_BENEFITS_TOP"] = $arParams["COLOR_TITLE_BENEFITS_TOP"];
$params["VIEW_BENEFITS_TOP_HEADER"] = $arResult["PROPERTIES"]["TYPE_BENEFITS_TOP_HEADER"]["VALUE_XML_ID"] ?? 'simple';

$titleHeader = $arResult['~NAME'];

if (!empty($arResult['PROPERTIES']['TITLE_HEADER']['VALUE'])) {
    $titleHeader = $arResult['PROPERTIES']['TITLE_HEADER']['~VALUE'];
}

if (!empty($arParams["BANNER_H1_COLOR_CLASS"])) {
    $arResult['PARAMS_CLASS']["H1_COLOR_CLASS"] = $arParams["BANNER_H1_COLOR_CLASS"];
}

if (!empty($arParams["BANNER_BREADCRUMBS_COLOR_CLASS"])) {
    $arResult['PARAMS_CLASS']["BREADCRUMBS_COLOR_CLASS"] = $arParams["BANNER_BREADCRUMBS_COLOR_CLASS"];
}

if (!empty($arResult['PROPERTIES']['CNT_COL_BENEFITS_TOP']['VALUE'])) {
    $params["CNT_COL_BENEFITS_TOP"] = $arResult['PROPERTIES']['CNT_COL_BENEFITS_TOP']['VALUE'];
}

if (!empty($arParams["HEADER_COLOR_CLASS"])) {
    $arResult["PARAMS_HEADER_COLOR_CLASS"] = $arParams["HEADER_COLOR_CLASS"];
}

/*
 * Шапка
 */
$headerView->render(
    $titleHeader,
    $arResult['~PREVIEW_TEXT'],
    [
        !empty($arResult['PROPERTIES']['BENEFITS_TOP']['VALUE']) ? 'banner-product--size-xl' : ''
    ],
    1,
    $arResult,
    null,
    null,
    !empty($arResult['PROPERTIES']['BENEFITS_TOP_HEADER']['VALUE'])
        ? renderBenefitsHeaderHeader(
            $APPLICATION,
            $arResult['PROPERTIES']['BENEFITS_TOP_HEADER']['VALUE'],
            params : $params
        ) : null,
    !empty($arResult['PROPERTIES']['BENEFITS_TOP']['VALUE'])
        ? renderBenefitsHeaderFooter(
            $APPLICATION,
            $arResult['PROPERTIES']['BENEFITS_TOP']['VALUE'],
            !empty($arResult['PREVIEW_PICTURE']['SRC']),
            params: $params
        ) : null,
);
?>

<!-- Баннер -->
<? if (!empty($arResult['PROPERTIES']['BANNER_HEADER']['VALUE']) && !empty($arResult['PROPERTIES']['BANNER_TEXT']['VALUE'])) { ?>
    <section class="section-layout <?= $arResult['PROPERTIES']['CLASS_BLOCK_BANNER']['VALUE'] ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-promo card-promo--heavy-purple card-promo--padding-banner-img">
                        <div class="card-promo__wrapper">
                            <div class="card-promo__header d-flex flex-column row-gap-3 row-gap-md-4">
                                <h2><?= $arResult['PROPERTIES']['BANNER_HEADER']['~VALUE'] ?></h2>
                                <p class="text-l mb-0"><?= $arResult['PROPERTIES']['BANNER_TEXT']['~VALUE']['TEXT'] ?></p>
                            </div>
                            <? if (!empty($arResult['PROPERTIES']['BANNER_IMG']['VALUE'])) { ?>
                                <img class="card-promo__image" src="<?= CFile::GetPath($arResult['PROPERTIES']['BANNER_IMG']['VALUE']) ?>" alt="" loading="lazy">
                            <? } ?>
                        </div>
                        <picture class="pattern-bg">
                            <source srcset="/frontend/dist/img/patterns/section-2/pattern-dark-s.svg" media="(max-width: 767px)">
                            <source srcset="/frontend/dist/img/patterns/section-2/pattern-dark-m.svg" media="(max-width: 1199px)">
                            <img src="/frontend/dist/img/patterns/section-2/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
        <? if (!empty($arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'])) : ?>
            <picture class="pattern-bg pattern-bg--position-sm-bottom">
                <source srcset="/frontend/dist/img<?= $arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'] ?>-s.svg" media="(max-width: 767px)">
                <source srcset="/frontend/dist/img<?= $arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'] ?>-m.svg" media="(max-width: 1199px)">
                <img src="/frontend/dist/img<?= $arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'] ?>-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        <? endif; ?>
    </section>
<? } elseif (!empty($arResult['PROPERTIES']['BANNER_TEXT']['VALUE']) && $arResult['PROPERTIES']['BANNER_TEXT']['USER_TYPE'] === 'HTML')  { ?>
    <section class="section-layout <?= $arResult['PROPERTIES']['CLASS_BLOCK_BANNER']['VALUE'] ?>">
        <div class="container">
            <?= $arResult['PROPERTIES']['BANNER_TEXT']['~VALUE']['TEXT'] ?>
        </div>
        <? if (!empty($arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'])) : ?>
            <picture class="pattern-bg pattern-bg--position-sm-bottom">
                <source srcset="/frontend/dist/img<?= $arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'] ?>-s.svg" media="(max-width: 767px)">
                <source srcset="/frontend/dist/img<?= $arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'] ?>-m.svg" media="(max-width: 1199px)">
                <img src="/frontend/dist/img<?= $arResult['PROPERTIES']['PATH_IMG_BLOCK_BANNER']['VALUE'] ?>-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        <? endif; ?>
    </section>
<? } ?>

<!-- Преимущества слайдер -->
<? if (!empty($arResult['PROPERTIES']['BENEFITS_SLIDER']['VALUE'])) {
    global $benefitsSliderFilter;
    $benefitsSliderFilter = [
        'ACTIVE' => 'Y',
        'ID' => $arResult['PROPERTIES']['BENEFITS_SLIDER']['VALUE']
    ];

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "benefits_tabs",
        [
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BACKGROUND_COLOR" => $arResult['PROPERTIES']['BENEFITS_SLIDER_BGR']['VALUE'] ?? '',
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COL_COUNT" => "3",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
            "FILTER_NAME" => "benefitsSliderFilter",
            "HEADER" => $arResult['PROPERTIES']['BENEFITS_SLIDER_HEADER']['~VALUE'] ?? '',
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
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
            "PROPERTY_CODE" => ["ICON",""],
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
    );
} ?>

<!-- Сноска (1-ое поле) -->
<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['QUOTE_TEXT']['~VALUE'] as $key => $value) {
        if ($key == 0) {
            renderQuote($value['TEXT']);
        }
    }
} ?>

<!-- Текстовый блок -->
<? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK']['~VALUE'])) { ?>
    <section class="section-layout">
        <div class="container">
            <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7 text-balance"><?= $arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['~VALUE'] ?? '' ?></h3>
            <div class="px-lg-6">
                <?= $arResult['PROPERTIES']['TEXT_BLOCK']['~VALUE']['TEXT'] ?>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<!-- Сноска (2-ое поле) -->
<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['QUOTE_TEXT']['~VALUE'] as $key => $value) {
        if ($key == 1) {
            renderQuote($value['TEXT'], true);
        }
    }
} ?>

<!-- Преимущества иконки -->
<? if (!empty($arResult['PROPERTIES']['BENEFITS_ICONS']['VALUE'])) { ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <div class="row mb-6 mb-lg-7">
                <h3><?= $arResult['PROPERTIES']['BENEFITS_ICONS_HEADER']['~VALUE'] ?? '' ?></h3>
            </div>
            <div class="row row-gap-6 gx-xl-6">

                <? $renderer->render('Benefits', $arResult['PROPERTIES']['BENEFITS_ICONS']['VALUE']); ?>

            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom section-restructuring-benefits__pattern">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<!-- Преимущества плитка с крупной картинкой -->
<? if (!empty($arResult['PROPERTIES']['BENEFITS_TILE']['VALUE'])) { ?>
    <section class="section-layout">
        <div class="container">
            <div class="row mb-6 mb-lg-7 px-lg-6">
                <h3><?= $arResult['PROPERTIES']['BENEFITS_TILE_HEADER']['~VALUE'] ?? '' ?></h3>
            </div>
            <div class="row cards-gutter">
                <? global $benefitsTileFilter;
                $benefitsTileFilter = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['PROPERTIES']['BENEFITS_TILE']['VALUE']
                ];

                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "benefits_tile",
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
                        "COL_COUNT" => "2",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
                        "FILTER_NAME" => "benefitsTileFilter",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
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
                        "PROPERTY_CODE" => ["",""],
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
        <picture class="pattern-bg pattern-bg--position-sm-bottom section-restructuring-benefits__pattern">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<!-- Преимущества плитка с иконкой -->
<? if (!empty($arResult['PROPERTIES']['BENEFITS_TILE_ICON']['VALUE'])) { ?>
    <section class="section-layout">
        <div class="container">
            <div class="row mb-6 mb-lg-7 px-lg-6">
                <h3><?= $arResult['PROPERTIES']['BENEFITS_TILE_ICON_HEADER']['~VALUE'] ?? '' ?></h3>
            </div>
            <div class="row cards-gutter">
                <? global $benefitsTileIconFilter;
                $benefitsTileIconFilter = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['PROPERTIES']['BENEFITS_TILE_ICON']['VALUE']
                ];

                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "benefits_tile_icon",
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
                        "COL_COUNT" => "2",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
                        "FILTER_NAME" => "benefitsTileIconFilter",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
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
                        "PROPERTY_CODE" => ["ICON",""],
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
        <picture class="pattern-bg pattern-bg--position-sm-bottom section-restructuring-benefits__pattern">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<!-- Варианты банковского сопровождения -->
<? if (!empty($arResult['PROPERTIES']['SUPPORT_OPTIONS']['VALUE'])) { ?>
    <section class="section-layout bg-dark-10 px-lg-6">
        <div class="container">
            <h3 class="mb-4 mb-md-6 mb-lg-7">
                <?= $arResult['PROPERTIES']['SUPPORT_OPTIONS_HEADER']['~VALUE'] ?? 'Варианты банковского сопровождения' ?>
            </h3>
            <div class="col-12">
                <?
                global $supportOptionsFilter;
                $supportOptionsFilter = [
                    'ID' => $arResult['PROPERTIES']['SUPPORT_OPTIONS']['VALUE']
                ];

                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "support_options",
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
                        "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
                        "FILTER_NAME" => "supportOptionsFilter",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => iblock('banking_support_options'),
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
                        "PROPERTY_CODE" => ["BENEFITS", "STEPS_HEADER", "STEPS", "QUOTE", "TEXT_FIELD", "BUTTON_TEXT", "BUTTON_LINK"],
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
                );
                ?>
            </div>
    </div>
</section>
<? } ?>

<!-- Меры финансирования -->
<? if ($arResult["PROPERTIES"]["SHOW_FINANCING_MEASURES"]["VALUE_XML_ID"] === "Y"):?>
    <!-- Блок "Меры финансирования" -->
    <? showBlockFinancingMeasures(); ?>
    <?= $GLOBALS["BLOCK_FINANCING_MEASURES"] ?>
<?endif;?>

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

<!-- Вкладки -->
<? if (!empty($arResult['PROPERTIES']['TABS']['VALUE'])) { ?>
    <section class="section-layout js-collapsed-mobile <?= $arResult['PROPERTIES']['CLASS_BLOCK_TABS']['VALUE'] ?>">
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
        <?
        $imgPath ="/patterns/section-2/pattern-light";

        if (!empty($arResult["PROPERTIES"]["PATH_IMG_BLOCK_TABS"]["VALUE"])) {
            $imgPath = $arResult["PROPERTIES"]["PATH_IMG_BLOCK_TABS"]["VALUE"];
        }
        ?>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img<?= $imgPath ?>-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img<?= $imgPath ?>-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img<?= $imgPath ?>-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<!-- Сноска (3-ое поле и далее) -->
<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['QUOTE_TEXT']['~VALUE'] as $key => $value) {
        if ($key > 1) {
            renderQuote($value['TEXT'], $key % 2 != 0);
        }
    }
} ?>

<!-- Блок с информацией в виде аккордеона -->
<? if (!empty($arResult['PROPERTIES']['INFORMATION_LIST']['VALUE']) && !empty($arResult["INFORMATION_LIST"])) : ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <? if (!empty($arResult['PROPERTIES']['INFORMATION_TITLE']['VALUE'])) : ?>
                        <h2 class="h3 mb-4 mb-md-6 mb-lg-7"><?= $arResult['PROPERTIES']['INFORMATION_TITLE']['~VALUE'] ?></h2>
                    <? endif; ?>
                    <div class="accordion accordion--size-lg accordion--bg-transparent px-lg-6" id="accordion-trust-management">
                        <? $i = 0;?>
                        <? foreach ($arResult["INFORMATION_LIST"] as $elemId => $arData) : ?>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button
                                        class="accordion-button <? if ($i !== 0) : ?> collapsed<? endif ?>"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?= $elemId?>"
                                        aria-expanded
                                        aria-controls="<?= $elemId?>"
                                    >
                                        <span class="fw-bold h4"><?= $arData["TITLE"]?></span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse <? if ($i === 0) : ?> show <? endif ?>" id="<?= $elemId ?>" data-bs-parent="#accordion-trust-management">
                                    <div class="accordion-body">
                                        <div class="rte rte--accordion">
                                            <?= $arData["TEXT"]?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? $i++; ?>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<!-- Блок с якорными ссылками -->
<? if (!empty($arResult['PROPERTIES']['ANCHOR_LINKS']['VALUE'])) : ?>
    <?
    $renderer->render('Anchors', $arResult['PROPERTIES']['ANCHOR_LINKS']['VALUE']);
    ?>
<? endif; ?>

<!-- Блок Контакты -->
<? if (!empty($arResult['PROPERTIES']['CONTACTS']['VALUE'])) {
    global $contactsFilter;
    $contactsFilter = [
        'ACTIVE' => 'Y',
        'ID' => $arResult['PROPERTIES']['CONTACTS']['VALUE']
    ];

    $classBlockContacts = "";

    if (!empty($arResult['PROPERTIES']['CLASS_BLOCK_CONTACTS']['VALUE'])) {
        $classBlockContacts = $arResult['PROPERTIES']['CLASS_BLOCK_CONTACTS']['VALUE'];
    }

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "corporate_contacts",
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
            "FILTER_NAME" => "contactsFilter",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => iblock('contacts_ru'),
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
            "PROPERTY_CODE" => ["EMAIL", "PHONE", "ADDRESS"],
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
            "COLOR_SECTION" => $classBlockContacts,
            "COLOR_CARD" => $arParams["BLOCK_CONTACT_COLOR_CARD"],
            "COLOR_TAG" => $arParams["BLOCK_CONTACT_COLOR_TAG"],
            "COLOR_H4" => $arParams["BLOCK_CONTACT_COLOR_H4"],
            "COLOR_SPAN" => $arParams["BLOCK_CONTACT_COLOR_SPAN"],
            "COLOR_ICON" => $arParams["BLOCK_CONTACT_COLOR_ICON"],
        ],
        $component
    );
} ?>

<!-- Блок "Объявления для клиентов" -->
<? if (!empty($arResult['PROPERTIES']['SHOW_ANNOUNCEMENTS']['VALUE'])): ?>
    <?
    global $announcementsDetailFilter;
    $announcementsDetailFilter = [
        'ACTIVE' => 'Y',
    ];
    if (!empty($component->arParams['SECTION_URL'])) {
        $announcementsDetailFilter['SECTION_CODE'] = basename($component->arParams['SECTION_URL']);
    }

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "customer_announcements",
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
            "DETAIL_URL" => "/support/announcements_for_clients/#SECTION_CODE#/#ELEMENT_CODE#/",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
            "FILTER_NAME" => "announcementsDetailFilter",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => iblock('ads_for_customers_ru'),
            "IBLOCK_TYPE" => "support",
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
            "PROPERTY_CODE" => [""],
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
    );?>
<? endif; ?>

<!-- Блок "Другие услуги" -->
<? if (!empty($arResult['PROPERTIES']['SHOW_CROSS_SALE']['VALUE'])): ?>
    <? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale_detail.php',
        [
            'HEADER_TEXT' => $arParams["TITLE_BLOCK_CROSS_SALE"],
        ]
    ); ?>
<? endif; ?>

<? $helper->saveCache(); ?>
