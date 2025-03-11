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
$parentTemplateFolder = $component->GetParent()->getTemplate()->GetFolder();
$helper = new ComponentHelper($component);
?>

<?$APPLICATION->IncludeFile(
    $parentTemplateFolder . '/include/header.php',
    [
        'helper' => $helper,
        'arResult' => $arResult
    ]
)?>

<? if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])) : ?>
    <section class="section-layout">
    <div class="container">
        <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7">
            <?= $arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE'] ?? 'Преимущества'; ?>
        </h3>
        <div class="row px-lg-6">
            <div class="col-12">
                <?$GLOBALS['benefitsFilter'] = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE']
                ];?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "alternative_display_of_benefits",
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
                        "COL_COUNT" => "3",
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
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-bottom">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
<? endif; ?>

<? if(!empty($arResult['DISPLAY_PROPERTIES']['OPPORTUNITY']['VALUE'])) : ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <h3 class="mb-4 mb-md-6 mb-lg-7">
                <?= $arResult['DISPLAY_PROPERTIES']['OPPORTUNITY_HEADING']['~VALUE'] ?? 'Возможности'; ?>
            </h3>
            <div class="row row-gap-6 gx-xl-6">

                <? $renderer->render('Benefits', $arResult['DISPLAY_PROPERTIES']['OPPORTUNITY']['VALUE']); ?>

            </div>
            <div class="collapse d-md-none" id="sms-more-benefits">
                <div class="row row-gap-6 mt-6">
                    <div class="col-12">
                        <div class="benefit d-flex gap-3 flex-column">
                            <img class="icon size-xl" src="/frontend/dist/img/icons/icon-money.svg" alt="icon" loading="lazy">
                            <div class="benefit__content d-flex flex-column gap-3">
                                <div class="benefit__description w-100 text-m">
                                    <span>Отчеты о&nbsp;действиях в&nbsp;интернет-банке</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="benefit d-flex gap-3 flex-column">
                            <img class="icon size-xl" src="/frontend/dist/img/icons/icon-money.svg" alt="icon" loading="lazy">
                            <div class="benefit__content d-flex flex-column gap-3">
                                <div class="benefit__description w-100 text-m">
                                    <span>Напоминания о&nbsp;необходимых платежах по&nbsp;кредитам и&nbsp;кредитным картам</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-md-none mt-6">
                <div class="col-12">
                    <a class="d-flex gap-2 align-items-center justify-content-center violet-100 text-m fw-bold" data-bs-toggle="collapse" href="#sms-more-benefits" role="button" aria-expanded="false" aria-controls="sms-more-benefits">
                        Ещё преимущества
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {
    $renderer->render('Steps', $arResult['PROPERTIES']['STEPS']['VALUE'], null, [
        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
        'stepsTemplate' => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'] ?? '',
    ]);
} ?>

<? if(!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTIONS']['VALUE'])) : ?>
    <section class="section-layout bg-dark-10">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6">
                <?= $arResult['DISPLAY_PROPERTIES']['INSTRUCTIONS_HEADING']['~VALUE'] ?? 'Как подключить'; ?>
            </h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#how-connect" role="button" aria-expanded="false" aria-controls="how-connect">
                <?= $arResult['DISPLAY_PROPERTIES']['INSTRUCTIONS_HEADING']['~VALUE'] ?? 'Как подключить'; ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block mt-6 mt-lg-7" id="how-connect">
                <div class="row row-gap-6 gx-xl-6 px-lg-6">
                    <?$GLOBALS['instructionsFilter'] = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['DISPLAY_PROPERTIES']['INSTRUCTIONS']['VALUE']
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
                            "COL_COUNT" => "2",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => ["PREVIEW_TEXT"],
                            "FILTER_NAME" => "instructionsFilter",
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
                        ],
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<? if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT'])) : ?>
    <section class="section-layout py-lg-11">
        <div class="container">
            <div class="col-12">
                <div class="polygon-container js-polygon-container">
                    <div class="polygon-container__content">
                        <div class="helper bg-dark-10">
                            <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="">
                                <div class="helper__content text-l">
                                    <? if (!empty($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_HEADER']['~VALUE'])): ?>
                                        <h4 class="mb-3">
                                            <?= $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO_HEADER']['~VALUE']; ?>
                                        </h4>
                                    <? endif; ?>
                                    <p class="mb-0">
                                        <?= $arResult['DISPLAY_PROPERTIES']['ADDITIONAL_INFO']['~VALUE']['TEXT']; ?>
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
    </section>
<? endif; ?>

<? $helper->saveCache(); ?>
