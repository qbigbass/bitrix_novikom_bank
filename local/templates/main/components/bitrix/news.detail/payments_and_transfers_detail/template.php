<? use Dalee\Helpers\ComponentHelper;

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

use Dalee\Helpers\HeaderView;

$headerView = new HeaderView($component);
$helper = $headerView->helper();

$headerView->render(
    $arResult['~NAME'],
    $arResult['~PREVIEW_TEXT'],
    ['bg-linear-blue', 'banner-text--border-green'],
);
?>

<? if (!empty($arResult['PROPERTIES']['BENEFITS']['VALUE'])) { ?>
    <section class="section-layout">
        <div class="container">
            <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7"><?= $arResult['PROPERTIES']['BENEFITS_HEADER']['~VALUE'] ?></h3>
            <div class="row row-gap-6 row-gap-md-7 px-lg-6">
                <? global $benefitsFilter;
                $benefitsFilter = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['PROPERTIES']['BENEFITS']['VALUE']
                ];

                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "benefits",
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
                        "FILTER_NAME" => "benefitsFilter",
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
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? if (
    !empty($arResult['PROPERTIES']['STEPS']['VALUE'])
    && !empty($arResult['PROPERTIES']['STEPS']['DESCRIPTION'])
    && count($arResult['PROPERTIES']['STEPS']['VALUE']) == count($arResult['PROPERTIES']['STEPS']['DESCRIPTION'])) { ?>

    <section class="section-restructuring-steps bg-dark-10 py-6 py-sm-9 py-md-11 py-xl-16">
        <div class="container">
            <div class="row px-lg-6">
                <h3 class="d-none d-md-flex"><?= $arResult['PROPERTIES']['STEPS_HEADER']['VALUE'] ?></h3>
                <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#restructuring-steps-content" role="button" aria-expanded="false" aria-controls="restructuring-steps-content">
                    <?= $arResult['PROPERTIES']['STEPS_HEADER']['VALUE'] ?></h3>
                    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </a>
            </div>
            <div class="section-restructuring-steps__wrapper collapse d-md-block mt-6 mt-lg-7" id="restructuring-steps-content">
                <div class="row row-gap-6 px-lg-6">
                    <div class="stepper steps-3">
                        <? foreach ($arResult['PROPERTIES']['STEPS']['~VALUE'] as $key => $step) {?>

                            <div class="stepper-item stepper-item--color-green">
                                <div class="stepper-item__header">
                                    <div class="stepper-item__number">
                                        <div class="stepper-item__number-value"><?= $key + 1 ?></div>
                                        <div class="stepper-item__number-icon">
                                            <?= getStepperIcons($key) ?>
                                        </div>
                                    </div>
                                    <div class="stepper-item__arrow"></div>
                                </div>
                                <div class="stepper-item__content">
                                    <h4><?= $arResult['PROPERTIES']['STEPS']['~DESCRIPTION'][$key] ?></h4>
                                    <p class="text-l no-mb"><?= $step ?></p>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
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

            <? global $tabsFilter;
            $tabsFilter = [
                'ACTIVE' => 'Y',
                'ID' => $arResult['PROPERTIES']['TABS']['VALUE']
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
                    "CACHE_FILTER" => "Y",
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
                    "PROPERTY_CODE" => ["CONDITIONS_ICONS","CONDITIONS","CONDITIONS_TABS","TEXT_FIELD","SHORT_INFO","QUOTES","QUESTIONS","DOCUMENTS"],
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
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT_BOTTOM']['VALUE'])) { ?>
    <section class="section-layout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="helper bg-dark-10">
                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6"><img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="" loading="lazy">
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
