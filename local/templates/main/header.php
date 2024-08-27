<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
use Bitrix\Main\Localization\Loc;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="/frontend/build/favicon.svg">
    <title><?php $APPLICATION->ShowTitle();?></title>
    <?php $APPLICATION->ShowHead();?>
</head>
<body>
<div id="panel">
    <?php $APPLICATION->ShowPanel();?>
</div>

<div class="default-page-layout js-page-wrapper">
    <header class="default-page-layout__header">
        <div class="desktop-nav-layout content-container">
            <div class="desktop-nav-layout__logo">
                <a href="/" class="inherits-link">
                    <img src="/frontend/build/assets/logo-main.svg" width="196" height="56" alt="Новиком">
                </a>
            </div>
            <div class="desktop-nav-layout__menu-wrapper">
                <div class="desktop-nav-layout__top-row">
                    <div class="desktop-nav-layout__main-menu">
                        <?php $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main_menu_header",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(""),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "N"
                            )
                        );?>
                    </div>
                    <div class="desktop-nav-layout__bank">
                        <div class="desktop-nav-layout__bank-contact">
                            <a href="#" class="header-contact-link body-s-light">
                                <span class="header-contact-link__icon">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-point-small"></use>
                                    </svg>
                                </span>
                                <span class="header-contact-link__text">
                                    <?=Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE')?>
                                </span>
                                <span class="header-contact-link__icon header-contact-link__icon--hide-desktop">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-point"></use>
                                    </svg>
                                </span>
                            </a>
                            <a href="tel:<?=clearPhoneNumber(MOBIL_PHONE_CONTACT_NUMBER)?>" class="header-contact-link body-s-light">
                                <span class="header-contact-link__text">
                                    <?=MOBIL_PHONE_CONTACT_NUMBER?>
                                </span>
                                <span class="header-contact-link__icon header-contact-link__icon--hide-desktop">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-phone"></use>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="desktop-nav-layout__bank-apps">
                            <a href="#" target="_blank" class="a-button a-button--s a-button--primary a-button--link a-button--outline">
                                <span class="a-icon a-button__icon">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-download-small"></use>
                                    </svg>
                                </span>
                                <?=Loc::getMessage('DOWNLOAD_MOBIL_APP_BUTTON_TITLE')?>
                            </a>
                            <button class="a-button js-drop-down-button a-button--s a-button--primary">
                                <?=Loc::getMessage('ONLINE_BUNK_BUTTON_TITLE')?>
                                <div class="drop-down-menu js-drop-down-menu">
                                    <a href="#" class="drop-down-menu__link"><?=Loc::getMessage('FOR_PRIVATE_CLIENTS_BUTTON_TITLE')?></a>
                                    <a href="#" class="drop-down-menu__link"><?=Loc::getMessage('FOR_ORGANIZATIONS_BUTTON_TITLE')?></a>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="desktop-nav-layout__bottom-row">
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "main_submenu_header",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "Y"
                        )
                    );?>
                </div>
            </div>
        </div>
    </header>

<!-- #WORK_AREA# --------------------------------------------------------------------------------------------------- -->
