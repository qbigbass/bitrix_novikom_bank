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

$headerView->render(
    $arResult['~NAME'],
    $arResult['~PREVIEW_TEXT'],
    [
        'banner-product--border-orange',
        !empty($arResult['PROPERTIES']['BENEFITS_TOP']['VALUE']) ? 'banner-product--size-xl' : '',
        $arResult['PROPERTIES']['HEADER_TEMPLATE']['VALUE_XML_ID'] == 'compact' || empty($arResult['PROPERTIES']['HEADER_TEMPLATE']['VALUE_XML_ID'])
            ? 'banner-text--border-orange banner-product--heavy-purple' : ''
    ],
    1,
    $arResult,
    null,
    null,
    !empty($arResult['PROPERTIES']['BENEFITS_TOP']['VALUE'])
        ? renderBenefitsTop($APPLICATION, $arResult['PROPERTIES']['BENEFITS_TOP']['VALUE'], !empty($arResult['PREVIEW_PICTURE']['SRC']))
        : null
);
?>

<? if (!empty($arResult['PROPERTIES']['BANNER_HEADER']['VALUE']) && !empty($arResult['PROPERTIES']['BANNER_TEXT']['VALUE'])) { ?>
    <section class="section-layout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-promo card-promo--heavy-purple">
                        <div class="card-promo__wrapper d-flex flex-column h-100 row-gap-4 row-gap-md-6 row-gap-lg-7">
                            <div class="card-promo__header d-flex flex-column row-gap-3 row-gap-md-4">
                                <h2><?= $arResult['PROPERTIES']['BANNER_HEADER']['VALUE'] ?></h2>
                                <p class="text-l mb-0 w-md-70 w-lg-100"><?= $arResult['PROPERTIES']['BANNER_TEXT']['VALUE']['TEXT'] ?></p>
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
    </section>
<? } ?>

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
    );
} ?>

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['QUOTE_TEXT']['~VALUE'] as $key => $value) {
        if ($key == 0) {
            renderQuote($value['TEXT']);
        }
    }
} ?>

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

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['QUOTE_TEXT']['~VALUE'] as $key => $value) {
        if ($key == 1) {
            renderQuote($value['TEXT'], true);
        }
    }
} ?>

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

<? if (!empty($arResult['PROPERTIES']['SUPPORT_OPTIONS']['VALUE'])) { ?>
<section class="section-layout bg-dark-10 px-lg-6">
    <div class="container">
        <h3 class="mb-4 mb-md-6 mb-lg-7">Варианты банковского сопровождения</h3>
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
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['QUOTE_TEXT']['~VALUE'] as $key => $value) {
        if ($key > 1) {
            renderQuote($value['TEXT'], $key % 2 != 0);
        }
    }
} ?>

<? if (!empty($arResult['PROPERTIES']['CONTACTS']['VALUE'])) {
    global $contactsFilter;
    $contactsFilter = [
        'ACTIVE' => 'Y',
        'ID' => $arResult['PROPERTIES']['CONTACTS']['VALUE']
    ];

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
        ],
        $component
    );
}

if (!empty($arResult['PROPERTIES']['SHOW_ANNOUNCEMENTS']['VALUE'])): ?>

<section class="section-layout bg-dark-10">
    <div class="container">
        <div class="row">
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
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--hide-mobile">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<? endif;

$helper->saveCache();
