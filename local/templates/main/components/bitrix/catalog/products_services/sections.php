<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
    $APPLICATION->GetTitle(),
    '',
    ['bg-linear-blue']
);

$sectionListParams = [
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
	"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
	"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
	"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
	"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
	"HIDE_SECTION_NAME" => ($arParams["SECTIONS_HIDE_SECTION_NAME"] ?? "N"),
	"ADD_SECTIONS_CHAIN" => ($arParams["ADD_SECTIONS_CHAIN"] ?? ''),
    "SECTION_USER_FIELDS" => ["UF_SUPPORT_PRODUCT__ICON", "UF_SUPPORT_INFO_ICON"]
];
?>
<section class="section-layout px-lg-6 bg-dark-10">
    <div class="container">
        <form class="w-100 mb-4 mb-md-6 mb-lg-7">
            <div class="input-group flex-nowrap d-none d-lg-flex"><span class="input-group-icon bg-transparent"><span class="icon violet-100">
                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="img/svg-sprite.svg#icon-search"></use>
                      </svg></span></span>
                <input class="form-control form-control-lg text-l bg-transparent" id="input-search" type="text" placeholder="Поиск по разделу" aria-label="Поиск по разделу" aria-describedby="input-search" tabindex="-1">
            </div>
            <div class="input-group flex-nowrap d-flex d-lg-none"><span class="input-group-icon bg-transparent"><span class="icon violet-100">
                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="img/svg-sprite.svg#icon-search"></use>
                      </svg></span></span>
                <input class="form-control ps-0 text-s bg-transparent" id="input-search-mobile" type="text" placeholder="Поиск по разделу" aria-label="Поиск по разделу" aria-describedby="#input-search-mobile" tabindex="-1">
            </div>
        </form>
        <div class="row g-1 g-md-2 g-lg-2_5">
            <?
            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section.list",
                "products_services",
                $sectionListParams,
                $component,
                ($arParams["SHOW_TOP_ELEMENTS"] !== "N" ? array("HIDE_ICONS" => "Y") : array())
            );
            unset($sectionListParams);
            ?>
        </div>
    </div>
</section>

<? $helper->saveCache(); ?>
