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

$parentElementCode = basename($APPLICATION->GetCurPage());
$element = \Bitrix\Iblock\ElementTable::getList([
    'filter' => [
        'CODE' => $parentElementCode
    ],
    'select' => ['NAME', 'PREVIEW_TEXT']
])->fetch();

$headerH1 = $element["NAME"];
$arResult["PREVIEW_TEXT"] = $element["PREVIEW_TEXT"];
$headerColorClass = 'bg-linear-blue';
$headerFilePath = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/header/news_detail/compact.php";

if (file_exists($headerFilePath)) {
    include($headerFilePath);
} else {
    echo "Шаблон шапки $headerFilePath не найден";
}
?>


<section class="section-layout pb-0 pt-xl-11">
    <div class="container">
        <div class="row px-lg-6">
            <div class="col-12">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "iblock_elements_ajax",
                    [
                        "ROOT_MENU_TYPE" => "iblock_sections",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => [
                        ],
                        "COMPONENT_TEMPLATE" => "iblock_elements_ajax",
                    ],
                );
                ?>
            </div>
        </div>
    </div>
</section>

<? if (!empty($arResult['PROPERTIES']['STEPS']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['STEPS']['VALUE'] as $key => $tab) { ?>

        <section class="section-layout <?= $key % 2 != 0 ? 'bg-dark-10' : '' ?>">
            <div class="container">
                <h3 class="px-lg-6 mb-4 mb-md-6 mb-lg-7"><?= $tab['TAB'] ?></h3>
                <div class="row px-lg-6">
                    <div class="stepper steps-<?= count($tab['VALUES']) > 3 ? 4 : 3 ?>">

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
                                    <p class="text-l mb-0"><?= $value ?></p>
                                </div>
                            </div>
                        <? } ?>

                    </div>
                </div>
            </div>
        </section>

    <? } ?>
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


<? $helper->saveCache(); ?>
