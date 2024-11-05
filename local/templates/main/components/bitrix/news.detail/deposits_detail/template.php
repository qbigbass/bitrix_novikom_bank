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
$this->setFrameMode(true);

$terms = [
    'RATE_TO' => [
        'SIGN' => 'При ключевой ставке<br>Банка России на ' . date('d.m.Y'),
        'FROM_TO' => 'до&nbsp;',
    ],
    'SUM_FROM' => [
        'SIGN' => 'Минимальная сумма вклада',
        'FROM_TO' => 'от&nbsp;',
    ],
    'PERIOD_FROM' => [
        'SIGN' => 'Минимальный срок вклада',
        'FROM_TO' => 'от&nbsp;',
        'PERIOD' => 'days'
    ],
];

$headerH1 = "Вклад «" . $arResult["~NAME"] . "»";
$headerColorClass = 'banner-product--heavy-purple';

$headerTemplate = $arResult['PROPERTIES']['HEADER_TEMPLATE']['VALUE_XML_ID'] ?? 'detailed';
$headerFilePath = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/header/news_detail/" . $headerTemplate . ".php";

if (file_exists($headerFilePath)) {
    include($headerFilePath);
} else {
    echo "Шаблон шапки $headerTemplate не найден";
}?>

<? if (!empty($arResult['PROPERTIES']['BENEFITS']['VALUE'])) { ?>
    <section class="section-benefits px-0 px-lg-6 py-6 py-sm-9 py-md-11 py-xl-16 position-relative overflow-hidden">
        <div class="container">
            <div class="row mb-6 mb-lg-7">
                <h3><?= $arResult['PROPERTIES']['BENEFITS_HEADER']['~VALUE'] ?></h3>
            </div>
            <div class="row row-gap-6">
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
        <picture class="pattern-bg pattern-bg--position-sm-bottom section-restructuring-benefits__pattern">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['VALUE']) && !empty($arResult['PROPERTIES']['TEXT_BLOCK']['VALUE'])) { ?>
    <section class="section-layout py-lg-11 bg-blue-10">
        <div class="container">
            <div class="banner-product-info ps-lg-6">
                <div class="banner-product-info__header">
                    <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE'])) { ?>
                        <div class="tag tag--outline">
                            <span class="tag__content text-s fw-semibold"><?= $arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE'] ?></span>
                            <span class="tag__triangle">
                                  <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                  </svg>
                            </span>
                        </div>
                    <? } ?>
                    <h3><?= $arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['~VALUE'] ?></h3>
                </div>
                <div class="banner-product-info__body">
                    <p class="text-l m-0"><?= $arResult['PROPERTIES']['TEXT_BLOCK']['VALUE']['TEXT'] ?></p>
                    <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE']) && !empty($arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE'])) { ?>
                        <a class="btn btn-lg-lg btn-outline-primary fw-bold w-100 w-md-auto mt-6 mt-lg-7" href="<?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE'] ?>">
                            <?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE'] ?>
                        </a>
                    <? } ?>
                </div>
                <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE'])) { ?>
                    <div class="banner-product-info__image">
                        <div class="polygon-container js-polygon-container">
                            <div class="polygon-container__content">
                                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE']) ?>" alt="<?= $arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['ALT'] ?>" loading="lazy">
                            </div>
                            <div class="polygon-container__polygon js-polygon-container-polygon purple-70">
                                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
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

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) { ?>
    <section class="section-restructuring-steps section-layout bg-dark-10">
        <div class="container">
            <div class="row px-lg-6">
                <div class="d-none d-md-flex justify-content-between">
                    <h3 class="h3"><?= $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?></h3>
                    <div class="d-inline-flex">
                        <ul class="nav nav-tabs" role="tablist">
                            <? foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link<?= $key == 0 ? ' active' : '' ?>"
                                        data-bs-toggle="tab"
                                        data-bs-target="#<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                        type="button"
                                        role="tab"
                                        aria-controls="<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                        <?= $key == 0 ? ' aria-selected' : '' ?>
                                    >
                                        <?= $tab['TAB'] ?>
                                    </button>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#restructuring-steps-content" role="button" aria-expanded="false" aria-controls="restructuring-steps-content">
                    <?= $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?>
                    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </a>
            </div>
            <div class="section-restructuring-steps__wrapper collapse d-md-block mt-6 mt-lg-7" id="restructuring-steps-content">
                <div class="d-inline-flex d-md-none w-100 mb-6">
                    <ul class="nav nav-tabs" role="tablist">
                        <? foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link<?= $key == 0 ? ' active' : '' ?>"
                                    data-bs-toggle="tab"
                                    data-bs-target="#<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                    type="button"
                                    role="tab"
                                    aria-controls="<?= Cutil::translit($tab['TAB'], "ru") ?>"
                                    <?= $key == 0 ? ' aria-selected' : '' ?>
                                >
                                    <?= $tab['TAB'] ?>
                                </button>
                            </li>
                        <? } ?>
                    </ul>
                </div>
                <div class="tab-content">

                    <? foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>
                        <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>" id="<?= Cutil::translit($tab['TAB'], "ru") ?>" role="tabpanel" aria-labelledby="loan" tabindex="0">
                            <div class="row row-gap-6 px-lg-6">
                                <div class="stepper steps-3">

                                    <? foreach ($tab['VALUES'] as $innerKey => $value) { ?>
                                        <div class="stepper-item stepper-item--color-green">
                                            <div class="stepper-item__header">
                                                <div class="stepper-item__number">
                                                    <div class="stepper-item__number-value"><?= $innerKey + 1 ?></div>
                                                    <div class="stepper-item__number-icon">
                                                        <div class="stepper-item__icon-border" data-level="1">
                                                            <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
                                                            </svg>
                                                        </div>
                                                        <? for ($i = 0; $i < $innerKey; $i++) {?>
                                                            <div class="stepper-item__icon-border" data-level="<?= $i + 2 ?>">
                                                                <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                                </svg>
                                                            </div>
                                                        <? } ?>
                                                    </div>
                                                </div>
                                                <div class="stepper-item__arrow"></div>
                                            </div>
                                            <div class="stepper-item__content">
                                                <h4><?= $tab['DESCRIPTIONS'][$innerKey] ?></h4>
                                                <p class="text-l no-mb">
                                                    <?= $value ?>
                                                </p>
                                            </div>
                                        </div>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    <? } ?>

                </div>
            </div>
        </div>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['QUOTE_TEXT']['VALUE']) && !empty($arResult['PROPERTIES']['QUOTE_HEADER']['VALUE'])) { ?>
    <section class="section-layout py-lg-11 bg-blue-10">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-start gap-4 gap-sm-5 gap-md-6">
                <div class="banner-product-info-alternative__image flex-shrink-0">
                    <img src="<?= CFile::GetPath($arResult['PROPERTIES']['QUOTE_IMG']['VALUE']) ?>" width="160" height="160" alt="" loading="lazy">
                </div>
                <div class="banner-product-info-alternative d-flex flex-column gap-4 gap-md-6">
                    <div class="banner-product-info-alternative__header">
                        <h3><?= $arResult['PROPERTIES']['QUOTE_HEADER']['~VALUE'] ?></h3>
                    </div>
                    <div class="banner-product-info-alternative__body d-flex flex-column gap-4 gap-md-6">
                        <p class="m-0 text-l pe-0 col-lg-8"><?= $arResult['PROPERTIES']['QUOTE_TEXT']['VALUE']['TEXT'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-top">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>

<? $helper->saveCache(); ?>
