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

<?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_1']['~VALUE']['TEXT'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <div class="row row-gap-5 row-gap-md-6 row-gap-lg-7">
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_1']['~VALUE'])): ?>
                    <div class="col-12">
                        <h3><?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_1']['~VALUE']?></h3>
                    </div>
                <?endif;?>
                <div class="col-12">
                    <p class="text-l m-0 rte"><?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_1']['~VALUE']['TEXT']?></p>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS']['VALUE'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <?if(!empty($arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE'])): ?>
                <div class="row mb-6 mb-lg-7">
                    <h3><?=$arResult['DISPLAY_PROPERTIES']['BENEFITS_HEADING']['~VALUE']?></h3>
                </div>
            <?endif;?>
            <div class="row row-gap-6">
                <?$GLOBALS['benefitsFilter'] = [
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
            <div class="collapse d-md-none" id="biometric-more-benefits">
                <div class="row row-gap-6 mt-6">
                    <div class="col-12">
                        <div class="benefit d-flex gap-3 flex-column">
                            <img class="icon size-xl" src="/frontend/dist/img/icons/icon-money.svg" alt="icon" loading="lazy">
                            <div class="benefit__content d-flex flex-column gap-3">
                                <div class="benefit__description w-100 text-m">
                                    <span>Регистрация в системе является добровольной</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-md-none mt-6">
                <div class="col-12">
                    <a class="d-flex gap-2 align-items-center justify-content-center violet-100 text-m fw-bold" data-bs-toggle="collapse" href="#biometric-more-benefits" role="button" aria-expanded="false" aria-controls="biometric-more-benefits">
                        Ещё преимущества
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['STEPS']['VALUE'])): ?>
    <section class="section-layout bg-dark-10 px-lg-6">
        <div class="container">
            <?if(!empty($arResult['DISPLAY_PROPERTIES']['STEPS_HEADING']['~VALUE'])): ?>
                <div class="row">
                    <div class="d-none d-md-flex justify-content-between">
                        <h3 class="h3"><?=$arResult['DISPLAY_PROPERTIES']['STEPS_HEADING']['~VALUE']?></h3>
                    </div>
                    <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#biometric-steps-content" role="button" aria-expanded="false" aria-controls="biometric-steps-content">
                        <?=$arResult['DISPLAY_PROPERTIES']['STEPS_HEADING']['~VALUE']?>
                        <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </a>
                </div>
            <?endif;?>
            <div class="collapse d-md-block mt-6 mt-lg-7" id="biometric-steps-content">
                <div class="stepper steps-4">
                    <?foreach($arResult['DISPLAY_PROPERTIES']['STEPS']['~VALUE'] as $key => $step): ?>
                        <div class="stepper-item stepper-item--color-green">
                            <div class="stepper-item__header">
                                <div class="stepper-item__number">
                                    <div class="stepper-item__number-value"><?= $key + 1 ?></div>
                                    <div class="stepper-item__number-icon">
                                        <div class="stepper-item__icon-border" data-level="1">
                                            <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <?for($i = 0; $i < $key; $i++) : ?>
                                            <div class="stepper-item__icon-border" data-level="<?=$i + 2?>">
                                                <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                </svg>
                                            </div>
                                        <?endfor;?>
                                    </div>
                                </div>
                                <div class="stepper-item__arrow"></div>
                            </div>
                            <div class="stepper-item__content">
                                <?if ($arResult['DISPLAY_PROPERTIES']['STEPS']['~DESCRIPTION'][$key]) : ?>
                                    <h4><?=$arResult['DISPLAY_PROPERTIES']['STEPS']['~DESCRIPTION'][$key]?></h4>
                                <?endif;?>
                                <p class="text-l no-mb rte"><?=$step['TEXT']?></p>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_2']['~VALUE']['TEXT'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <div class="row row-gap-5 row-gap-md-6 row-gap-lg-7">
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_2']['~VALUE'])): ?>
                    <div class="col-12">
                        <h3><?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_HEADING_2']['~VALUE']?></h3>
                    </div>
                <?endif;?>
                <div class="col-12 m-0 rte">
                    <?=$arResult['DISPLAY_PROPERTIES']['TEXT_BLOCK_2']['~VALUE']['TEXT']?>
                </div>
            </div>
        </div>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['HTML']['~VALUE'])): ?>
    <section class="section-layout bg-dark-10">
        <?=$arResult['DISPLAY_PROPERTIES']['HTML']['~VALUE']?>
    </section>
<?endif;?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['VALUE'])): ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <?if(!empty($arResult['DISPLAY_PROPERTIES']['DOCUMENTS_HEADING']['~VALUE'])): ?>
                <div class="row">
                    <div class="d-none d-md-flex justify-content-between">
                        <h3 class="h3"><?=$arResult['DISPLAY_PROPERTIES']['DOCUMENTS_HEADING']['~VALUE']?></h3>
                    </div>
                    <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#biometric-documents-content" role="button" aria-expanded="false" aria-controls="biometric-documents-content">
                        <?=$arResult['DISPLAY_PROPERTIES']['DOCUMENTS_HEADING']['~VALUE']?>
                        <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                        </svg>
                    </a>
                </div>
            <?endif;?>
            <div class="collapse d-md-block mt-6 mt-lg-7" id="biometric-documents-content">
                <div class="row row-gap-6">
                    <?$GLOBALS['documentsFilter'] = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['VALUE'],
                    ];?>

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "documents",
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
                            "FIELD_CODE" => ["NAME"],
                            "FILTER_NAME" => "documentsFilter",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => iblock('documents'),
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
                            "PROPERTY_CODE" => ["FILE",""],
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
        <picture class="pattern-bg pattern-bg--position-sm-top">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
            <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<?endif;?>

<?$helper->saveCache();?>
