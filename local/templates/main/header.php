<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

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
$asset->addJs('/frontend/dist/js/vendors/highcharts.js');
$asset->addJs('/frontend/dist/js/chatBot.js');
$asset->addJs('/frontend/dist/js/datepicker.js');
$asset->addJs('/frontend/dist/js/dropDownMenu.js');
$asset->addJs('/frontend/dist/js/formFeedback.js');
$asset->addJs('/frontend/dist/js/formSend.js');
$asset->addJs('/frontend/dist/js/formSteps.js');
$asset->addJs('/frontend/dist/js/uploadFile.js');
$asset->addJs('/frontend/dist/js/polygon-container.js');
$asset->addJs('/frontend/dist/js/setPage.js');
$asset->addJs('/frontend/dist/js/sliders.js');
$asset->addJs('/frontend/dist/js/tabs.js');
$asset->addJs('/frontend/dist/js/charts.js');
$asset->addJs('/frontend/dist/js/private-banking.js');
$asset->addJs('/frontend/dist/js/calculator-deposit.js');
$asset->addJs('/frontend/dist/js/calculator-loan.js');
$asset->addJs('/frontend/dist/js/calculator-mortgage.js');
$asset->addJs('/frontend/dist/js/calculator-bonus.js');
$asset->addJs('/frontend/dist/js/currency-converter.js');
$asset->addJs('/frontend/dist/js/inputSlider.js');
$asset->addJs('/frontend/dist/js/index.js');
$asset->addJs('/frontend/dist/js/accessibility-panel.js');
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
<body>
<div id="panel">
    <?php $APPLICATION->ShowPanel(); ?>
</div>
<header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="accessibilityPanel" style="display:none">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="settings">
      <div class="fontSizeSettings">
        <div class="title">Размер шрифта</div>
        <div class="fontSizes">
          <button class="fontDefault selected" aria-label="Обычный шрифт. Нажмите для выбора" tabindex="0">A</button>
          <button class="fontMedium" aria-label="Средний шрифт. Нажмите для выбора" tabindex="0">A</button>
          <button class="fontLarge" aria-label="Крупный шрифт. Нажмите для выбора" tabindex="0">A</button>
        </div>
      </div>
      <div class="contrastColorSettings">
        <div class="title">Цвет сайта</div>
        <div class="contrastColors">
          <button class="contrastColorsBlue" aria-label="Синий цвет сайта. Нажмите для выбора" tabindex="0">A</button>
          <button class="contrastColorsBlack" aria-label="Чёрный цвет сайта. Нажмите для выбора" tabindex="0">A</button>
          <button class="contrastColorsYellow" aria-label="Жёлтый цвет сайта. Нажмите для выбора" tabindex="0">A</button>
        </div>
      </div>
      <button class="btnReset" id="hideAccessibilityPanel" aria-label="Обычная версия сайта" tabindex="0">Обычная версия сайта<img class="icon" src="/frontend/dist/img/eye.svg" tabindex="0" alt="Иконка глаза"></button>
    </div>
  </div>
</header>
<div class="page-wrapper js-page-wrapper">
    <header class="header">
        <div class="container d-flex align-items-center">
            <div class="header__logo">
                <a class="d-block" href="/">
                    <img src="/frontend/dist/img/logo-main.svg" width="196" height="56" alt="Новиком">
                </a>
            </div>
            <div class="d-flex flex-column gap-4 ms-auto flex-grow-1">
                <div class="header__top-row">
                    <div class="d-none d-lg-flex align-items-center">
                        <?php $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main_menu_header",
                            [
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => [""],
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "N"
                            ]
                        ); ?>
                    </div>
                    <div class="d-flex align-items-center gap-4 column-gap-xxl-3 column-gap-xxxl-6">
                        <div class="d-none d-lg-flex gap-4 column-gap-xxl-3 column-gap-xxxl-6">
                            <a class="text-s d-inline-flex gap-1 align-items-center dark-100" href="/map/offices/">
                                <span class="icon size-s d-none d-xxl-inline-block violet-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-point-small"></use>
                                    </svg>
                                </span>
                                <span class="icon size-m d-xxl-none violet-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-point"></use>
                                    </svg>
                                </span>
                                <span
                                    class="header-contact-link__text d-none d-xxl-inline-block"><?= Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE') ?></span>
                            </a>
                            <a class="header-contact-link text-s dark-100"
                               href="tel:<?= clearPhoneNumber(UF_PHONE1) ?>">
                                <span class="icon size-m d-xxl-none violet-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                    </svg>
                                </span>
                                <span
                                    class="header-contact-link__text d-none d-xxl-inline-block"><?= UF_PHONE1 ?></span>
                            </a>
                        </div>
                        <div class="d-flex column-gap-md-3 column-gap-lg-4 column-gap-xxl-3">
                            <a
                                class="btn btn-outline-primary btn-sm d-none d-md-inline-flex gap-2 align-items-center justify-content-center"
                                type="button" href="/upload/android-v19.apk">
                                <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                </svg>
                                <?= Loc::getMessage('DOWNLOAD_MOBIL_APP_BUTTON_TITLE') ?>
                            </a>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                ><?= Loc::getMessage('ONLINE_BUNK_BUTTON_TITLE') ?></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item fw-bold"
                                           href="https://online.novikom.ru/#/registration"><?= Loc::getMessage('FOR_PRIVATE_CLIENTS_BUTTON_TITLE') ?></a></li>
                                    <li><a class="dropdown-item fw-bold"
                                           href="https://bk.novikom.ru/ru/html/login.html"><?= Loc::getMessage('FOR_ORGANIZATIONS_BUTTON_TITLE') ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                global $currentSection;
                $currentSection = explode('/', trim($APPLICATION->GetCurDir(), '/'))[0];
                ?>
                <div class="header__bottom-row">
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        (
                            $currentSection === 'for-corporate-clients' ||
                            $currentSection === 'msb' ||
                            $currentSection === 'financial-institutions'
                        )
                            ? "corporate_submenu_header"
                            : "main_submenu_header",
                        [
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "iblock_sections",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => [""],
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "Y"
                        ]
                    ); ?>
                </div>
            </div>
        </div>
    </header>
<!-- #WORK_AREA# ----------------------------------------------------------------------------------------------------->
