<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Localization\Loc;

$curDir = $APPLICATION->GetCurDir();

$asset = Asset::getInstance();

$asset->addCss('/frontend/dist/css/bootstrap.css');
$asset->addCss('/frontend/dist/css/swiper.css');
$asset->addCss('/frontend/dist/css/select2.css');
$asset->addCss('/frontend/dist/css/air-datepicker.css');
$asset->addCss('/frontend/dist/css/all.css');

$asset->addJs('/frontend/dist/js/vendors/jquery.min.js');
$asset->addJs('/frontend/dist/js/vendors/popover.js');
$asset->addJs('/frontend/dist/js/vendors/bootstrap.min.js');
$asset->addJs('/frontend/dist/js/vendors/swiper.min.js');
$asset->addJs('/frontend/dist/js/vendors/select2.min.js');
$asset->addJs('/frontend/dist/js/vendors/airdatepicker.js');
$asset->addJs('/frontend/dist/js/vendors/jquery.mask.min.js');
$asset->addJs('/frontend/dist/js/chatBot.js');
$asset->addJs('/frontend/dist/js/datepicker.js');
$asset->addJs('/frontend/dist/js/dropDownMenu.js');
$asset->addJs('/frontend/dist/js/formFeedback.js');
$asset->addJs('/frontend/dist/js/formSend.js');
$asset->addJs('/frontend/dist/js/formSteps.js');
$asset->addJs('/frontend/dist/js/inputSlider.js');
$asset->addJs('/frontend/dist/js/uploadFile.js');
$asset->addJs('/frontend/dist/js/polygon-container.js');
$asset->addJs('/frontend/dist/js/setPage.js');
$asset->addJs('/frontend/dist/js/sliders.js');
$asset->addJs('/frontend/dist/js/tabs.js');
$asset->addJs('/frontend/dist/js/yMap.js');
$asset->addJs('/frontend/dist/js/private-banking.js');
$asset->addJs('/frontend/dist/js/calculator-deposit.js');
$asset->addJs('/frontend/dist/js/calculator-loan.js');
$asset->addJs('/frontend/dist/js/calculator-mortgage.js');
$asset->addJs('/frontend/dist/js/calculator-bonus.js');
$asset->addJs('/frontend/dist/js/currency-converter.js');
$asset->addJs('/frontend/dist/js/charts.js');
$asset->addJs('/frontend/dist/js/index.js');

?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="/favicon.ico">
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body class="pb">
<div id="panel">
    <?php $APPLICATION->ShowPanel(); ?>
</div>

<!-- #WORK_AREA# ----------------------------------------------------------------------------------------------------->
<?
$model = array_merge(
$arResult['CONTENT_JSON'] ?? [],
[
'contact_phone' => $APPLICATION->GetProperty('contact_phone'),
'contact_email' => $APPLICATION->GetProperty('contact_email'),
'contact_address' => $APPLICATION->GetProperty('contact_address'),
'online_bank_url' => $APPLICATION->GetProperty('online_bank_url'),
]
);
?>

<section class="pb-section-hero">
    <header class="pb-header animate js-animation-start" id="header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="col-8">
                    <a class="d-none d-lg-block" href="/"><img src="/frontend/dist/img/logo-pb.svg" width="280"
                                                               height="80" alt="Новиком"></a>
                    <a class="d-lg-none" href="/"><img src="/frontend/dist/img/logo-pb-mob.svg" width="140" height="40"
                                                       alt="Новиком"></a>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end gap-4"
                ><a
                        class="d-none d-lg-block btn btn-pb btn-pb--primary btn-pb--size-m js-scroll-to"
                        href="#become-client">
                        <?= Loc::getMessage('HEADER_MENU_BECOME_A_CLIENT') ?>
                    </a>
                    <button class="pb-menu-btn js-pb-menu-btn" type="button">
                        <span class="pb-menu-btn__icon">
                            <span></span><span></span><span></span><span></span><span></span><span></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="pb-overlay js-pb-nav-menu d-none">
        <div class="pb-main-nav">
            <div class="pb-main-nav__wrapper container d-flex flex-column">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    'top',
                    [
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "top",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => [""],
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "Y"
                    ]
                ); ?>
                <div class="text-center d-lg-none">
                    <a class="btn btn-pb btn-pb--size-m-lg btn-pb--primary js-scroll-to" href="#become-client">
                        <?= Loc::getMessage('HEADER_MENU_BECOME_A_CLIENT') ?></a>
                </div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.detail",
                    "contancts",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_ELEMENT_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "BROWSER_TITLE" => "-",
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "ELEMENT_CODE" => "kontakty-v-private-banking",
                        "ELEMENT_ID" => "",
                        "FIELD_CODE" => array("ID","NAME",'PREVIEW_PICTURE','DETAIL_PICTURE'),
                        "IBLOCK_ID" => "200",
                        "IBLOCK_TYPE" => "additional",
                        "IBLOCK_URL" => "",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "MESSAGE_404" => "",
                        "META_DESCRIPTION" => "-",
                        "META_KEYWORDS" => "-",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Страница",
                        "PROPERTY_CODE" => array("EMAIL","ADDRESS","DEPARTMENT","PHONE",""),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_CANONICAL_URL" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "STRICT_SECTION_CHECK" => "N",
                        "USE_PERMISSIONS" => "N",
                        "USE_SHARE" => "N"
                    )
                );?>
            </div>
        </div>
    </div>
    <?
    if($curDir == '/private-banking/') {
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR . 'private-banking/include/header_index.php',
                "AREA_FILE_RECURSIVE" => "N",
                "EDIT_MODE" => "html",
            ),
            false,
            array('HIDE_ICONS' => 'N')
        );
    }else{
        $APPLICATION->ShowViewContent('PB_HEADER');
    }
    ?>
</section>
