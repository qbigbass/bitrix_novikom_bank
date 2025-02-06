<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use Bitrix\Main\Localization\Loc;
use Dalee\Helpers\CardDetailPageHelper;
use Dalee\Helpers\ComponentHelper;
use Dalee\Helpers\ComponentRenderer\Renderer;

$renderer = new Renderer($APPLICATION, $component);
?>

<div class="banner-product is-sticker <?= $arResult['BANNER_STYLE'] ?>">
    <div class="banner-product__wrapper">
        <div class="banner-product__content">
            <div class="banner-product__header">
                <?
                $helper = new ComponentHelper($component);
                $helper->deferredCall('showNavChain', ['.default']);
                ?>
                <h1><?= $arResult['SECTION_NAME'] ?></h1>
                <p class="banner-product__subtitle text-l"><?= $arResult['~DETAIL_TEXT'] ?></p>
            </div>
            <div class="banner-product__benefits-list">
                <? foreach ($arResult['DISPLAY_PROPERTIES']['SHORT_CONDITIONS']['~VALUE'] as $value) : ?>
                    <div class="d-inline-flex flex-column row-gap-2">
                        <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 green-100">
                            <? if (!empty($value[2])) : ?>
                                <span><?= $value[2] ?></span>
                            <? endif; ?>
                            <? if (!empty($value[3])) : ?>
                                <?= getStylizedValue($value[3]) ?>
                            <? endif; ?>
                        </div>
                        <? if (!empty($value[1])): ?>
                            <span class="d-block"><?= $value[1] ?></span>
                        <? endif; ?>
                    </div>
                <? endforeach; ?>
            </div>
            <? if ($arResult['SHOW_BUTTON']) { ?>
                <button
                    class="btn btn-tertiary btn-lg-lg banner-product__button"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-credit-card-form"
                >
                    Оформить карту
                </button>
            <? } ?>
        </div>
    </div>
    <picture class="pattern-bg banner-product__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</div>

<? global $customerCategoriesFilter; ?>
<? $customerCategoriesFilter = [
    'ACTIVE' => 'Y',
    'IBLOCK_SECTION_ID' => $arResult['IBLOCK_SECTION_ID']
]; ?>
<div id="links"></div>
<section class="section-layout">
    <div class="container">
        <? if (!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])) : ?>
            <div class="row mb-6 mb-lg-7 px-lg-6">
                <h3><?= $arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE'] ?></h3>
            </div>
        <? endif; ?>

        <? $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "customer_categories",
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
                "DETAIL_URL" => $arParams['DETAIL_URL'],
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => ["CODE", "NAME"],
                "FILTER_NAME" => "customerCategoriesFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => iblock('cards_detail_pages_ru'),
                "IBLOCK_TYPE" => "for_private_clients_ru",
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
                "PROPERTY_CODE" => ["", ""],
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => CardDetailPageHelper::$customerCategoriesSort['SORT_BY1'],
                "SORT_BY2" => CardDetailPageHelper::$customerCategoriesSort['SORT_BY2'],
                "SORT_ORDER1" => CardDetailPageHelper::$customerCategoriesSort['SORT_ORDER1'],
                "SORT_ORDER2" => CardDetailPageHelper::$customerCategoriesSort['SORT_ORDER2'],
                "STRICT_SECTION_CHECK" => "N",
                "CUSTOMER_CATEGORY_CODE" => $arResult['CODE'],
            ],
            $component
        ); ?>

        <? if (!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])) : ?>
            <div class="row row-gap-6 px-lg-6">
                <? $renderer->render('Benefits', $arResult['PROPERTIES']['BENEFITS']['VALUE'], null, ['colCount' => $arResult['DISPLAY_PROPERTIES']['BENEFITS_COL']['VALUE'] ?? 3]); ?>
            </div>
        <? endif; ?>

    </div>
    <picture class="pattern-bg pattern-bg--position-sm-bottom">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['BONUS_PROGRAMS']['VALUE'])) : ?>
    <section class="section-layout">
        <div class="container">
            <h3 class="px-lg-6 mb-6 mb-lg-7"><?= $arResult['DISPLAY_PROPERTIES']['BONUS_PROGRAMS_HEADING']['~VALUE'] ?></h3>
            <? global $bonusProgramsFilter; ?>
            <? $bonusProgramsFilter = [
                'ACTIVE' => 'Y',
                'ID' => $arResult['DISPLAY_PROPERTIES']['BONUS_PROGRAMS']['VALUE']
            ]; ?>

            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "bonus_programs",
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
                    "FILTER_NAME" => "bonusProgramsFilter",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => iblock('bonus_programs_ru'),
                    "IBLOCK_TYPE" => "for_private_clients_ru",
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
                    "PROPERTY_CODE" => ["ICON", "SHORT_CONDITION"],
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

<? if (!empty($arResult['DISPLAY_PROPERTIES']['CONVENIENCES']['VALUE'])) : ?>
    <section class="section-layout">
        <div class="container">
            <h3 class="px-lg-6 mb-6 mb-lg-7"><?= $arResult['DISPLAY_PROPERTIES']['CONVENIENCES_HEADING']['~VALUE'] ?></h3>
            <? global $conveniencesFilter; ?>
            <? $conveniencesFilter = [
                'ACTIVE' => 'Y',
                'ID' => $arResult['DISPLAY_PROPERTIES']['CONVENIENCES']['VALUE']
            ]; ?>

            <? $APPLICATION->IncludeComponent(
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

<? if (
    !empty($arResult['DISPLAY_PROPERTIES']['BANNER_HEADING']['~VALUE']) &&
    !empty($arResult['DISPLAY_PROPERTIES']['BANNER_TEXT']['~VALUE']) &&
    !empty($arResult['DISPLAY_PROPERTIES']['BANNER_IMG']['FILE_VALUE'])
) : ?>
    <section class="section-layout section-banner-product-info py-lg-11 bg-blue-10">
        <div class="container">
            <div class="banner-product-info ps-lg-6">
                <div class="banner-product-info__header">
                    <? if (!empty($arResult['DISPLAY_PROPERTIES']['BANNER_TAG']['VALUE'])) : ?>
                        <div class="d-flex flex-row gap-3">
                            <div class="tag tag--outline">
                                <span
                                    class="tag__content text-s fw-semibold"><?= $arResult['DISPLAY_PROPERTIES']['BANNER_TAG']['VALUE'] ?></span>
                                <span class="tag__triangle">
                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                          <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    <? endif; ?>

                    <h3><?= $arResult['DISPLAY_PROPERTIES']['BANNER_HEADING']['~VALUE'] ?></h3>
                </div>
                <div class="banner-product-info__body">
                    <p class="text-l m-0"><?= $arResult['DISPLAY_PROPERTIES']['BANNER_TEXT']['~VALUE']['TEXT'] ?></p>
                    <? if (
                        !empty($arResult['DISPLAY_PROPERTIES']['BANNER_LINK']['VALUE']) &&
                        !empty($arResult['DISPLAY_PROPERTIES']['BANNER_LINK_TEXT']['~VALUE'])
                    ) : ?>
                        <? if ($arResult['DISPLAY_PROPERTIES']['LINK_IS_BUTTON']['VALUE'] == 'Y'): ?>
                            <a class="btn btn-lg-lg btn-outline-primary fw-bold w-100 w-md-auto mt-6 mt-lg-7"
                               href="<?= $arResult['DISPLAY_PROPERTIES']['BANNER_LINK']['VALUE'] ?>">
                                <?= $arResult['DISPLAY_PROPERTIES']['BANNER_LINK_TEXT']['~VALUE'] ?>
                            </a>
                        <? else: ?>
                            <a class="btn btn-link btn-lg d-inline-flex gap-2 align-items-center mt-6 mt-lg-7"
                               href="<?= $arResult['DISPLAY_PROPERTIES']['BANNER_LINK']['VALUE'] ?>">
                                <span
                                    class="text-m fw-bold"><?= $arResult['DISPLAY_PROPERTIES']['BANNER_LINK_TEXT']['~VALUE'] ?></span>
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </a>
                        <? endif; ?>
                    <? endif; ?>
                </div>
                <div class="banner-product-info__image">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <img src="<?= $arResult['DISPLAY_PROPERTIES']['BANNER_IMG']['FILE_VALUE']['SRC'] ?>" alt="">
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT'])) : ?>
    <section class="section-layout bg-blue-10 pt-0 pb-lg-11">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper bg-dark-0">
                                <div
                                    class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                    <img class="helper__image w-auto float-end"
                                         src="/frontend/dist/img/restructuring-additional-info.png" alt=""
                                         loading="lazy">
                                    <div class="helper__content text-l">
                                        <p class="mb-0"><?= $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
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

<? if (!empty($arResult['DISPLAY_PROPERTIES']['DISCOUNTS']['VALUE'])) : ?>
    <section class="section-layout">
        <div class="container">
            <h3 class="px-lg-6 mb-6 mb-lg-7"><?= $arResult['DISPLAY_PROPERTIES']['DISCOUNTS_HEADING']['~VALUE'] ?></h3>
            <div class="row px-lg-6">
                <? global $discountsFilter; ?>
                <? $discountsFilter = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['DISPLAY_PROPERTIES']['DISCOUNTS']['VALUE']
                ]; ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "discounts",
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
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => [],
                        "FILTER_NAME" => "discountsFilter",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => iblock("discounts_ru"),
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
                        "STRICT_SECTION_CHECK" => "N"
                    ],
                    $component
                ); ?>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['TABS']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?= $arResult['DISPLAY_PROPERTIES']['TABS_HEADING']['~VALUE'] ?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
               href="#additional-info-content" role="button" aria-expanded="false"
               aria-controls="additional-info-content">
                <?= $arResult['DISPLAY_PROPERTIES']['TABS_HEADING']['~VALUE'] ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <? $renderer->render('Tabs', $arResult['PROPERTIES']['TABS']['VALUE'], null, ['elementId' => $arResult['ID']]); ?>
        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? endif; ?>

<? if (
    !empty($arResult['DISPLAY_PROPERTIES']['STEPS']['VALUE']) ||
    !empty($arResult['DISPLAY_PROPERTIES']['STEPS']['DESCRIPTION'])
) : ?>
    <section class="section-restructuring-steps bg-dark-10 py-6 py-sm-9 py-md-11 py-xl-16">
        <div class="container">
            <div class="row px-lg-6">
                <h3 class="d-none d-md-flex"><?= $arResult['DISPLAY_PROPERTIES']['STEPS_HEADING']['~VALUE'] ?></h3>
                <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none"
                   data-bs-toggle="collapse" href="#restructuring-steps-content" role="button" aria-expanded="false"
                   aria-controls="restructuring-steps-content">
                    <?= $arResult['DISPLAY_PROPERTIES']['STEPS_HEADING']['~VALUE'] ?>
                    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </a>
            </div>
            <div class="section-restructuring-steps__wrapper collapse d-md-block mt-6 mt-lg-7"
                 id="restructuring-steps-content">
                <div class="row row-gap-6 px-lg-6">
                    <div class="stepper steps-3">
                        <? foreach ($arResult['DISPLAY_PROPERTIES']['STEPS']['~VALUE'] as $key => $step) : ?>
                            <div class="stepper-item stepper-item--color-green">
                                <div class="stepper-item__header">
                                    <div class="stepper-item__number">
                                        <div class="stepper-item__number-value"><?= $key + 1 ?></div>
                                        <div class="stepper-item__number-icon">
                                            <div class="stepper-item__icon-border" data-level="1">
                                                <svg width="76" height="44" viewBox="0 0 76 44" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </div>
                                            <? for ($i = 0; $i < $key; $i++) : ?>
                                                <div class="stepper-item__icon-border" data-level="<?= $i + 2 ?>">
                                                    <svg width="80" height="46" viewBox="0 0 80 46" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z"
                                                            stroke="currentColor" stroke-linecap="round"
                                                            stroke-dasharray="4 4"></path>
                                                    </svg>
                                                </div>
                                            <? endfor; ?>
                                        </div>
                                    </div>
                                    <div class="stepper-item__arrow"></div>
                                </div>
                                <div class="stepper-item__content">
                                    <? if ($arResult['DISPLAY_PROPERTIES']['STEPS']['~DESCRIPTION'][$key]) : ?>
                                        <h4><?= $arResult['DISPLAY_PROPERTIES']['STEPS']['~DESCRIPTION'][$key] ?></h4>
                                    <? endif; ?>
                                    <p class="text-l no-mb"><?= $step['TEXT'] ?></p>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['CARD_RECEIPT_OPTIONS']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile bg-dark-10">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?= $arResult['DISPLAY_PROPERTIES']['OPTIONS_BLOCK_HEADING']['~VALUE'] ?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
               href="#how-apply" role="button" aria-expanded="false" aria-controls="how-apply">
                <?= $arResult['DISPLAY_PROPERTIES']['OPTIONS_BLOCK_HEADING']['~VALUE'] ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block mt-4 mt-md-6 mt-lg-7" id="how-apply">
                <div class="row px-lg-6 row-gap-6">
                    <? global $cardReceiptOptionsFilter; ?>
                    <? $cardReceiptOptionsFilter = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['DISPLAY_PROPERTIES']['CARD_RECEIPT_OPTIONS']['VALUE']
                    ]; ?>

                    <? $APPLICATION->IncludeComponent(
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

<? if (!empty($arResult['DISPLAY_PROPERTIES']['SPECIAL_OFFERS']['VALUE'])) : ?>
    <section class="section-layout bg-blue-10">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between px-lg-6 mb-6 mb-lg-7">
                <h3><?= $arResult['DISPLAY_PROPERTIES']['SPECIAL_OFFERS_HEADING']['~VALUE'] ?></h3>
                <a class="btn btn-sm btn-link btn-icon d-none d-md-inline-flex" href="/special-offers/">
                    <?= Loc::getMessage("WATCH_ALL"); ?>
                    <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                    </svg>
                </a>
            </div>
            <div class="row">
                <? global $specialOffersFilter; ?>
                <? $specialOffersFilter = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['DISPLAY_PROPERTIES']['SPECIAL_OFFERS']['VALUE']
                ]; ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "special_offers",
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
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => [],
                        "FILTER_NAME" => "specialOffersFilter",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => iblock("special_offers_ru"),
                        "IBLOCK_TYPE" => "for_private_clients_ru",
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
                        "PROPERTY_CODE" => ["PUBLICATION_DATE"],
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
                        "STRICT_SECTION_CHECK" => "N"
                    ],
                    $component
                ); ?>
            </div>
        </div>
    </section>
<? endif; ?>

<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "credit_card_form",
    [
        "FORM_CODE" => "credit_card_form",
    ],
    $component
); ?>

<? $helper->saveCache(); ?>

