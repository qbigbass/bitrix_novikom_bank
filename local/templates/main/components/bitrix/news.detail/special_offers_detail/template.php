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
$this->setFrameMode(true);

use Dalee\Helpers\ComponentHelper;
use Dalee\Helpers\ComponentRenderer\Renderer;

$helper = new ComponentHelper($component);
$renderer = new Renderer($APPLICATION, $component);
?>

<section
    class="section-layout section-banner-product-info py-lg-11 pt-6 pt-lg-6 section-banner-product-info--border-green">
    <div class="container">
        <? $helper->deferredCall('showNavChain', ['dark']); ?>
        <div
            class="banner-product-info ps-lg-6<?= empty($arResult['PREVIEW_PICTURE']['SRC']) ? ' d-flex flex-column' : '' ?>">
            <div class="banner-product-info__header">
                <div class="d-flex flex-row gap-3">
                    <div class="tag tag--outline">
                        <span class="tag__content text-s fw-semibold">
                            <?= $arResult['PROPERTIES']['TAG']['VALUE'] ?>
                        </span>
                        <span class="tag__triangle">
                            <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                            </svg>
                        </span>
                    </div>
                    <span class="text-s dark-100 mt-1 mt-md-2">
                        <?= $arResult['PROPERTIES']['PUBLICATION_DATE']['VALUE'] ?>
                    </span>
                </div>
                <h3><?= $arResult['~NAME'] ?></h3>
            </div>
            <div class="banner-product-info__body">
                <p class="text-m m-0"><?= $arResult['~PREVIEW_TEXT'] ?></p>
                <? if ($arResult['PROPERTIES']['BUTTON_DETAIL']['VALUE_XML_ID'] == 'Y' && !empty($arResult['PROPERTIES']['BUTTON_HREF_DETAIL']['VALUE'])): ?>
                    <a class="btn btn-lg-lg btn-outline-primary fw-bold w-100 w-md-auto mt-6 mt-lg-7"
                       href="<?= $arResult['PROPERTIES']['BUTTON_HREF_DETAIL']['VALUE'] ?? '#' ?>">
                        <?= $arResult['PROPERTIES']['BUTTON_TEXT_DETAIL']['~VALUE'] ?>
                    </a>
                <? elseif ($arResult['PROPERTIES']['BUTTON_DETAIL']['VALUE_XML_ID'] == 'Y' && !empty($arResult['PROPERTIES']['BUTTON_CODE_FORM']['VALUE'])): ?>
                    <button class="btn btn-lg-lg btn-outline-primary fw-bold w-100 w-md-auto mt-6 mt-lg-7"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#<?= $arResult['PROPERTIES']['BUTTON_CODE_FORM']['VALUE'] ?>">
                        <?= $arResult['PROPERTIES']['BUTTON_TEXT_DETAIL']['~VALUE'] ?>
                    </button>
                    <?
                    global $FORMS;
                    $FORMS->includeForm($arResult['PROPERTIES']['BUTTON_CODE_FORM']['VALUE']);
                    ?>
                <? endif; ?>
            </div>
            <? if (!empty($arResult['PREVIEW_PICTURE']['SRC'])) { ?>
                <div class="banner-product-info__image">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <img src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>"
                                 alt="<?= $arResult['PREVIEW_PICTURE']['ALT'] ?>">
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-bottom">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {

    $renderer->render('Steps', $arResult['PROPERTIES']['STEPS']['VALUE'], null, [
        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
        'stepsTemplate' => $arResult['PROPERTIES']['STEPS_TEMPLATE']['VALUE_XML_ID'] ?? '',
    ]);

} ?>

<? if (!empty($arResult['PROPERTIES']['SELECTED_CAT']['VALUE'])) { ?>
    <section class="section-layout bg-blue-10 px-lg-6">
        <div class="container">
            <? if (!empty($arResult['PROPERTIES']['SELECTED_CAT_HEADER']['VALUE'])) { ?>
                <div class="row mb-6 mb-lg-7">
                    <h3><?= $arResult['PROPERTIES']['SELECTED_CAT_HEADER']['~VALUE'] ?></h3>
                </div>
            <? } ?>
            <div class="row">
                <div class="col-12">
                    <? global $selectedCatFilter;
                    $selectedCatFilter = [
                        'ACTIVE' => 'Y',
                        'ID' => $arResult['PROPERTIES']['SELECTED_CAT']['VALUE']
                    ];

                    $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "selected_cat",
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
                            "FIELD_CODE" => ["CODE", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", ""],
                            "FILTER_NAME" => "selectedCatFilter",
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
                            "PROPERTY_CODE" => ["HREF", "ICON"],
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
                    <a class="btn btn-link btn-lg d-inline-flex gap-2 align-items-center mt-4 mt-md-6" href="#">
                        <span class="text-wrap text-start">Список всех избранных категорий</span>
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['BENEFITS']['VALUE'])) { ?>
    <section class="section-special-benefits bg-dark-10 px-0 px-lg-6 py-6 py-sm-9 py-md-11 py-xl-16 position-relative overflow-hidden">
        <div class="container">
            <div class="row mb-6 mb-lg-7">
                <h3><?= $arResult['PROPERTIES']['BENEFITS_HEADER']['~VALUE'] ?></h3>
            </div>
            <div class="row row-gap-6">

                <? $renderer->render('Benefits', $arResult['PROPERTIES']['BENEFITS']['VALUE'], null, ['colCount' => '2']); ?>

            </div>
        </div>
    </section>
<? } ?>

<? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK']['VALUE'])) { ?>
    <section class="section-layout px-lg-6">
        <div class="container">
            <? if (!empty($arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['VALUE'])) { ?>
                <div class="row mb-6 mb-lg-7">
                    <h3><?= $arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['~VALUE']?></h3>
                </div>
            <? } ?>
            <div class="row">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="d-flex flex-column row-gap-4 text-l">
                        <?= $arResult['PROPERTIES']['TEXT_BLOCK']['~VALUE']['TEXT'] ?>
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
<? } ?>

<? $helper->saveCache(); ?>
