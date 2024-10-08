<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
use Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs('/frontend/dist/js/bundle.js');
Asset::getInstance()->addCss('/frontend/dist/css/all.css');
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
                    <div class="d-flex align-items-center gap-4 column-gap-xxl-3 column-gap-xxxl-6">
                        <div class="d-none d-lg-flex gap-4 column-gap-xxl-3 column-gap-xxxl-6">
                            <a class="text-s d-inline-flex gap-1 align-items-center dark-100" href="#">
                                <span class="icon size-s d-none d-xxl-inline-block violet-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-point-small"></use>
                                    </svg>
                                </span>
                                <span class="icon size-m d-xxl-none violet-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/img/svg-sprite.svg#icon-point"></use>
                                    </svg>
                                </span>
                                <span class="header-contact-link__text d-none d-xxl-inline-block"><?=Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE')?></span>
                            </a>
                            <a class="header-contact-link text-s dark-100" href="tel:<?=clearPhoneNumber(MOBIL_PHONE_CONTACT_NUMBER)?>">
                                <span class="icon size-m d-xxl-none violet-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                    </svg>
                                </span>
                                <span class="header-contact-link__text d-none d-xxl-inline-block"><?=MOBIL_PHONE_CONTACT_NUMBER?></span>
                            </a>
                        </div>
                        <div class="d-flex column-gap-md-3 column-gap-lg-4 column-gap-xxl-3">
                            <button class="btn btn-outline-primary btn-sm d-none d-md-inline-flex gap-2 align-items-center justify-content-center" type="button">
                                <svg class="icon size-s" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                </svg>
                                <?=Loc::getMessage('DOWNLOAD_MOBIL_APP_BUTTON_TITLE')?>
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=Loc::getMessage('ONLINE_BUNK_BUTTON_TITLE')?></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item fw-bold" href="#"><?=Loc::getMessage('FOR_PRIVATE_CLIENTS_BUTTON_TITLE')?></a></li>
                                    <li><a class="dropdown-item fw-bold" href="#"><?=Loc::getMessage('FOR_ORGANIZATIONS_BUTTON_TITLE')?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__bottom-row">
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "main_submenu_header",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "iblock_sections",
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
