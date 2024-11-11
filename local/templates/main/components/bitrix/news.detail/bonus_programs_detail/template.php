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
?>
<section class="banner-text banner-text--border-green <?=$arResult['DISPLAY_PROPERTIES']['BANNER_STYLE']['VALUE_XML_ID']?>">
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 col-sm-6 col-md-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                <div class="d-flex flex-column align-items-start gap-3 gap-md-4">
                    <?
                    $helper = new ComponentHelper($component);
                    $helper->deferredCall('showNavChain', ['.default']);
                    ?>
                    <h1 class="banner-text__title dark-0 text-break"><?=$arResult['NAME']?></h1>
                    <div class="banner-text__description text-l dark-0"><?=$arResult['DETAIL_TEXT']?></div>
                </div>
            </div>
            <div class="d-none d-sm-block col-12 col-sm-6 col-md-4">
                <img class="banner-text__image position-relative w-auto float-end" src="<?=$arResult['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']?>" alt="">
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])) : ?>
    <section class="section-layout">
        <div class="container">
            <div class="row row-gap-6 row-gap-md-7 px-lg-6">
                <? global $benefitsFilter;?>
                <?$benefitsFilter = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE']
                ];?>

                <?$APPLICATION->IncludeComponent(
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
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "COL_COUNT" => !empty($arResult['DISPLAY_PROPERTIES']['BENEFITS_COL']['VALUE']) ? $arResult['DISPLAY_PROPERTIES']['BENEFITS_COL']['VALUE'] : '3',
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
                                    <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="" loading="lazy">
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
        <? global $cashbackFilter;?>
        <?$cashbackFilter = [
            'ACTIVE' => 'Y',
            'IBLOCK_SECTION_ID' => $arResult['DISPLAY_PROPERTIES']['CASHBACK_CATEGORIES']['VALUE']
        ];?>

        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "cashback",
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
            <div class="row px-lg-6">
                <div class="col-12 col-lg-6">
                    <div class="pe-xl-6">
                        <div class="d-flex flex-column row-gap-4 row-gap-md-6 row-gap-lg-7">
                            <div class="input-slider js-input-slider" data-type="price" data-start-value="2000" data-max-value="100000" data-min-value="2000" data-step-size="1000">
                                <label class="text-s dark-70 ps-3 mb-2" for="amount-bonus">Ваши покупки по карте в месяц</label>
                                <div class="input-slider-text js-input-slider-text">
                                    <input class="input-slider-text__input h4 js-input-slider-text-input">
                                    <button class="input-slider-text__button input-slider-text__button--edit js-input-slider-text-edit" type="button">
                                        <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="img/svg-sprite.svg#icon-edit"></use>
                                        </svg>
                                    </button>
                                    <button class="input-slider-text__button input-slider-text__button--close js-input-slider-text-close" type="button">
                                        <svg class="icon dark-70 size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="img/svg-sprite.svg#icon-close"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="input-slider__inner js-input-slider-inner">
                                    <input class="input-slider__item js-input-slider-input" id="amount-bonus" type="range" step="1" min="0" max="1" value="0">
                                </div>
                                <div class="input-slider-text-steps js-input-slider-text-steps"></div>
                            </div>
                            <div class="row row-gap-4 row-gap-lg-6">
                                <div class="col-12 col-md-6">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="select1">Тип карты</label>
                                        <select class="form-select js-select" id="select1" aria-label="Тип карты">
                                            <?foreach ($arResult['CARD_TYPES'] as $key => $type): ?>
                                                <?$isSelected = ($key == 0) ? 'selected' : '';?>
                                                <option <?=$isSelected?> value="<?=$type['ID']?>"><?=$type['VALUE']?></option>
                                            <?endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex flex-column row-gap-2">
                                        <label class="form-label mb-0" for="select2">Категория основной карты</label>
                                        <select class="form-select js-select" id="select2" aria-label="Категория основной карты">
                                            <?foreach ($arResult['CARD_CATEGORIES'] as $key => $category): ?>
                                                <?$isSelected = ($key == 0) ? 'selected' : '';?>
                                                <option <?=$isSelected?> value="<?=$category['ID']?>"><?=$category['VALUE']?></option>
                                            <?endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-md-6 mt-lg-0">
                    <div class="ps-xxl-6">
                        <div class="polygon-container js-polygon-container">
                            <div class="polygon-container__content">
                                <div class="card-calculate-result bg-gradient-violet card-calculate-result--type-bonus">
                                    <div class="card-calculate-result__body">
                                        <div class="d-flex flex-column row-gap-2">
                                            <span class="card-calculate-result__label text-s">За год будет начислено</span>
                                            <span class="text-number-ml fw-bold text-nowrap">
                                                <?$firstCardType = $arResult['CARD_TYPES'][0]['ID'];?>
                                                <?$firstCardCategory = $arResult['CARD_CATEGORIES'][0]['ID'];?>
                                                <?=$arResult['BONUS_RATES'][$firstCardType][$firstCardCategory]['HELLO_BONUS_VALUE']?> бонусов
                                                </span>
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
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#how-connect" role="button" aria-expanded="false" aria-controls="how-connect">
                <?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_1_HEADING']['~VALUE']?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block mt-4 mt-md-6 mt-lg-7" id="how-connect">
                <div class="row px-lg-6 row-gap-6 row-gap-lg-7">
                    <? global $cardReceiptOptionsFilter;?>
                    <?$cardReceiptOptionsFilter = [
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

<?if(!empty($arResult['DISPLAY_PROPERTIES']['TABS']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?=$arResult['DISPLAY_PROPERTIES']['TABS_HEADING']['~VALUE']?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#conditions" role="button" aria-expanded="false" aria-controls="conditions">
                <?=$arResult['DISPLAY_PROPERTIES']['TABS_HEADING']['~VALUE']?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block mt-4 mt-md-6 mt-lg-7" id="conditions">
                <? global $tabsFilter;
                $tabsFilter = [
                    'ACTIVE' => 'Y',
                    'ID' => $arResult['DISPLAY_PROPERTIES']['TABS']['VALUE']
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
                        "CACHE_FILTER" => "N",
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
                        "PROPERTY_CODE" => [
                            "CONDITIONS_ICONS",
                            "CONDITIONS",
                            "RATES_DESCRIPTION",
                            "TEXT_FIELD",
                            "HEADING",
                            "STEPS",
                            "SHORT_INFO",
                            "QUOTES",
                            "QUESTIONS",
                            "ICONS_WITH_DESCRIPTION",
                            "ICON_SHORT_INFO",
                            "DOCUMENTS"
                        ],
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
        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2']['VALUE'])) : ?>
    <section class="section-layout js-collapsed-mobile bg-dark-10">
        <div class="container">
            <h3 class="d-none d-md-block mb-md-6 mb-lg-7 px-lg-6"><?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2_HEADING']['~VALUE']?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#how-connect" role="button" aria-expanded="false" aria-controls="how-connect">
                <?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_2_HEADING']['~VALUE']?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block mt-4 mt-md-6 mt-lg-7" id="how-connect">
                <div class="row px-lg-6 row-gap-6 row-gap-lg-7">
                    <? global $cardReceiptOptionsFilter;?>
                    <?$cardReceiptOptionsFilter = [
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
                                    <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="" loading="lazy">
                                    <div class="helper__content text-l">
                                        <p class="mb-0"><?=$arResult['DISPLAY_PROPERTIES']['INFO_BOX']['~VALUE']['TEXT']?></p>
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
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#how-connect" role="button" aria-expanded="false" aria-controls="how-connect">
                <?=$arResult['DISPLAY_PROPERTIES']['INSTRUCTION_3_HEADING']['~VALUE']?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <div class="collapse d-md-block mt-4 mt-md-6 mt-lg-7" id="how-connect">
                <div class="row px-lg-6 row-gap-6 row-gap-lg-7">
                    <? global $cardReceiptOptionsFilter;?>
                    <?$cardReceiptOptionsFilter = [
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

<?$helper->saveCache();?>
