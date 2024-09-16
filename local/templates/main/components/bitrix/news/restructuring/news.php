<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
Galago\Frontend\Asset::getInstance()->addJsAndCss('loans');
?>
<div class="text-banner text-banner--blue text-banner--border-green">
    <div class="content-container">
        <div class="text-banner__inner">
            <div class="text-banner__content">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "",
                    Array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                );?>
                <div class="text-banner__title headline-0">Кредиты</div>
                <div class="text-banner__description body-l-light">Быстрые кредиты по оптимальной ставке на любые цели</div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/build/assets/patterns/section/pattern-dark-l.svg" alt="bg pattenr" loading="lazy">
    </picture>
</div>
<section class="section-layout section-catalog-layout section-layout--s">
    <div class="content-container">
        <div class="a-tabs a-tabs--layout js-a-tabs">
            <div class="section-catalog-layout__content">
                <div class="section-catalog-layout__tabs">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "loan_types",
                        Array(
                            "ROOT_MENU_TYPE" => "iblock_sections",
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "Y",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => "",
                        )
                    );?>
                </div>
                <div class="section-catalog-layout__panels">
                    <div class="section-catalog-layout__panels">
                        <div class="a-tab-panels js-a-tab-panels">
                            <div class="product-list">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:catalog.section.list",
                                    "restructuring",
                                    Array(
                                        "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
                                        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
                                        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                                        "COUNT_ELEMENTS" => "N",
                                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                                        "FILTER_NAME" => "sectionsFilter",
                                        "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
                                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                                        "SECTION_CODE" => "",
                                        "SECTION_FIELDS" => array("",""),
                                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                                        "SECTION_USER_FIELDS" => array("UF_ICON","UF_SHORT_CONDITIONS"),
                                        "SHOW_PARENT_NAME" => "Y",
                                        "TOP_DEPTH" => "1",
                                        "VIEW_MODE" => "LINE"
                                    )
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?$APPLICATION->IncludeFile('/local/php_interface/include/cross_sale_products_block.php')?>

<?$APPLICATION->IncludeFile('/local/php_interface/include/request_call.php');?>
