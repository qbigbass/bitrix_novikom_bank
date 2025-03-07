<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
global $FORMS;
use Bitrix\Main\Localization\Loc;
?>

<!-- /#WORK_AREA# -------------------------------------------------------------------------------------------------- -->

    <div class="modal fade" id="modal-success" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable align-items-end align-items-md-center">
            <div class="modal-content">
                <div class="modal-body d-flex flex-column row-gap-4 row-gap-md-5 row-gap-lg-6"><img class="modal-img" src="/frontend/dist/img/modals/success.png" alt="">
                    <div class="modal-title h4 text-center js-success-title"></div>
                    <p class="text-l text-center m-0 js-success-info"></p>
                </div>
                <div class="modal-footer border-0 justify-content-md-center">
                    <button class="btn btn-primary btn-lg-lg m-0 w-100 w-md-auto" type="button" data-bs-dismiss="modal">Ок, спасибо!</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-error" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable align-items-end align-items-md-center">
            <div class="modal-content">
                <div class="modal-body d-flex flex-column row-gap-4 row-gap-md-5 row-gap-lg-6"><img class="modal-img" src="/frontend/dist/img/modals/error.png" alt="">
                    <div class="modal-title h4 text-center js-error-title"></div>
                    <p class="text-l text-center m-0 js-error-info"></p>
                </div>
                <div class="modal-footer border-0 justify-content-md-center">
                    <button class="btn btn-primary btn-lg-lg m-0 w-100 w-md-auto js-error-btn" type="button">Вернуться</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row row-gap-6 row-gap-lg-7 gx-md-2 gx-lg-2_5 footer__content">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "main_menu_footer",
                    [
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "2",
                        "MENU_CACHE_GET_VARS" => [""],
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "Y"
                    ]
                );?>
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="polygon-container js-polygon-container">
                        <div class="polygon-container__content">
                            <div class="d-flex flex-column row-gap-4 px-3 py-4 p-md-5 p-lg-6 bg-blue-10">
                                <h5><?=Loc::getMessage('DOWNLOAD_MOBIL_APP_HEADER')?></h5>
                                <a class="btn-app btn d-inline-flex justify-content-center align-items-center bg-white" href="<?=RU_STORE_APP_LINK?>" target="_blank">
                                    <img src="/frontend/dist/img/app-logos/ru-store.svg" alt="ru-store" loading="lazy">
                                </a>
                                <a class="btn-app btn d-inline-flex justify-content-center align-items-center bg-white" href="<?=RU_MARKET_APP_LINK?>" target="_blank">
                                    <img src="/frontend/dist/img/app-logos/ru-market.svg" alt="ru-market" loading="lazy">
                                </a>
                                <a class="btn-app btn d-inline-flex justify-content-center align-items-center bg-white" href="<?=NASH_STORE_APP_LINK?>" target="_blank">
                                    <img src="/frontend/dist/img/app-logos/nash-store.svg" alt="nash-store" loading="lazy">
                                </a>
                                <a class="btn-app btn btn-primary d-flex align-items-center gap-2 gap-lg-3 justify-content-center" href="<?=MOBIL_APP_LINK?>">
                                    <?=Loc::getMessage('DOWNLOAD_MOBIL_APP_BUTTON_TITLE_IN_FOOTER')?>
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="polygon-container__polygon  purple-70 js-polygon-container-polygon">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-3 d-flex flex-column row-gap-3">
                    <a class="h4" href="tel:<?= clearPhoneNumber(UF_PHONE1) ?>"><?= UF_PHONE1 ?></a>
                    <a class="h4" href="tel:<?= clearPhoneNumber(UF_PHONE2) ?>"><?= UF_PHONE2 ?></a>
                    <span class="dark-70"><?=Loc::getMessage('ADDRESS')?></span>
                    <a class="btn btn-link d-inline-flex gap-2 align-items-center border-0" href="<?=OFFICES_AND_ATMS_LINK?>">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-point"></use>
                        </svg>
                        <?=Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE')?>
                    </a>
                    <a class="btn btn-link d-inline-flex gap-2 align-items-center border-0" href="<?=TELEGRAM_LINK?>">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-circle-telegram"></use>
                        </svg>
                        <?=Loc::getMessage('TELEGRAM_BUTTON_TITLE')?>
                    </a>
                    <a
                        class="btn btn-primary btn-lg-lg mt-4 mt-md-0"
                        href="/feedback/"
                    >
                        <?=Loc::getMessage('FEEDBACK_BUTTON_TITLE')?>
                    </a>
                    <?
                    global $FORMS;
                    $FORMS->includeForm('feedback_form');
                    ?>
                    <div class="d-flex flex-column row-gap-3 pt-md-3 pt-lg-5">
                        <a class="btn btn-lg-lg btn-outline-primary d-flex gap-2 gap-lg-3 align-items-center justify-content-center" id='showAccessibilityPanel' href="#">
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-glasses"></use>
                            </svg>
                            <span class="d-none d-md-block"><?=Loc::getMessage('VERSION_FOR_THE_VISUALLY_IMPAIRED_DESKTOP_BUTTON')?></span>
                            <span class="d-md-none"><?=Loc::getMessage('VERSION_FOR_THE_VISUALLY_IMPAIRED_MOBIL_BUTTON')?></span>
                        </a>
                        <a class="btn btn-lg-lg btn-outline-primary d-flex gap-2 align-items-center justify-content-center" href="<?=ENGLISH_VERSION_LINK?>">English version</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__info">
            <div class="container">
                <div class="row row-gap-3 row-gap-md-6">
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "additional_menu_footer",
                        [
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => [""],
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom",
                            "USE_EXT" => "N"
                        ]
                    );?>
                    <div class="col-12 col-lg-4 col-xl-3">
                        <div class="footer__copyright">
                            <img src="/frontend/dist/img/footer-insurance.png" width="120" height="120" alt="" loading="lazy">
                            <div class="d-flex flex-column row-gap-3">
                                <span class="text-s fw-semibold dark-70"><?=Loc::getMessage('LICENSE_TITLE')?></span>
                                <span class="text-s fw-semibold dark-70"><?=Loc::getMessage('COPYRIGHT_TEXT')?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="mobile-main-nav js-mobile-main-nav">
    <div class="nav-panel">
        <a class="btn-nav-panel" href="/cards/">
            <span class="icon size-s">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-card"></use>
                </svg>
            </span>
            <span class="btn-nav-panel__text"><?=Loc::getMessage('CARD_BUTTON_TITLE')?></span>
        </a>
        <a class="btn-nav-panel" href="/deposits/">
            <span class="icon size-s">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-deposit"></use>
                </svg>
            </span>
            <span class="btn-nav-panel__text"><?=Loc::getMessage('DEPOSITS_BUTTON_TITLE')?></span>
        </a>
        <button class="btn-nav-panel btn-nav-panel--primary js-btn-nav-panel">
            <span class="btn-nav-panel__icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </span>
            <span class="btn-nav-panel__text js-btn-nav-panel-text"><?=Loc::getMessage('MENU_BUTTON_TITLE')?></span>
        </button>
        <a class="btn-nav-panel" href="/loans/">
            <span class="icon size-s">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-wallet"></use>
                </svg>
            </span>
            <span class="btn-nav-panel__text"><?=Loc::getMessage('CREDITS_BUTTON_TITLE')?></span>
        </a>
        <a class="btn-nav-panel" href="/mortgage/">
            <span class="icon size-s">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-house"></use>
                </svg>
            </span>
            <span class="btn-nav-panel__text"><?=Loc::getMessage('MORTGAGE_BUTTON_TITLE')?></span>
        </a>
    </div>
    <div class="mobile-main-nav__menu">
        <div class="mobile-menu">
            <div class="mobile-menu__header">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "main_mobil_menu",
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
                );?>
            </div>
            <div class="mobile-menu__body js-mobile-menu-body">
                <div class="d-flex flex-column gap-3 gap-md-4">
                    <form>
                        <div class="input-group flex-nowrap js-mobile-search"><span class="input-group-icon" id="input-search-menu"><span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                          </svg></span></span>
                            <input class="form-control" type="text" placeholder="Поиск по сайту" aria-label="Поиск по сайту" aria-describedby="input-search-menu">
                        </div>
                    </form>
                    <div class="mobile-menu__search-content"><span class="dark-70">Популярные запросы:</span>
                        <div class="d-flex flex-wrap gap-3"><a class="chip text-s" href="#">Зарплатный проект</a><a class="chip text-s" href="#">Зарплатная карта</a><a class="chip text-s" href="#">Расчетный счет</a><a class="chip text-s" href="#">Ипотека в новостройке</a><a class="chip text-s" href="#">Кредит на бизнес</a><a class="chip text-s" href="#">Депозиты</a><a class="chip text-s" href="#">Вклады</a><a class="chip text-s" href="#">Социально-платежная карта МИР</a><a class="chip text-s" href="#">Банковские гарантии</a>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu__nav">
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "main_mobil_submenu",
                        [
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => [""],
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "Y"
                        ]
                    );?>
                </div>

                <div class="mobile-menu__bank-apps">
                    <a class="btn btn-outline-primary d-inline-flex gap-2 align-items-center justify-content-center" href="<?=MOBIL_APP_LINK?>">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                        </svg>
                        <?=Loc::getMessage('DOWNLOAD_MOBIL_APP_BUTTON_TITLE')?>
                    </a>
                    <div class="dropdown">
                        <a href="<?=ONLINE_BANK_LINK?>" class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=Loc::getMessage('ONLINE_BUNK_BUTTON_TITLE')?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bold" href="https://online.novikom.ru/#/registration">Для частных лиц</a></li>
                            <li><a class="dropdown-item fw-bold" href="https://bk.novikom.ru/ru/html/login.html">Для организаций</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mobile-menu__bank-contact">
                    <a class="d-flex align-items-center gap-2" href="<?=OFFICES_AND_ATMS_LINK?>">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-point"></use>
                            </svg>
                        </span>
                        <span class="fw-bold"><?=Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE')?></span>
                    </a>
                    <a class="d-flex align-items-center gap-2" href="tel:<?= clearPhoneNumber(UF_PHONE1) ?>">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mobile"></use>
                            </svg>
                        </span>
                        <span class="fw-bold"><?= UF_PHONE1 ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?
/* ChatBot */
$APPLICATION->IncludeComponent(
    "dalee:chatbot",
    "",
    [
        "FORM_TITLES" => ["Заказать звонок", "Направить обращение"],
        "FORM_CODES" => ["callback", "feedback"],
        "FORM_ICONS" => ["img/svg-sprite.svg#icon-phone", "img/svg-sprite.svg#icon-mail"],
    ]
);
?>
</body>
</html>
