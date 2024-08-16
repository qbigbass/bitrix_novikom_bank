<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
use Bitrix\Main\Localization\Loc;
?>

<!-- /#WORK_AREA# -------------------------------------------------------------------------------------------------- -->

<footer class="a-footer">
    <div class="content-container">
        <div class="a-footer__content">
            <?php $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "main_menu_footer",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "2",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "N"
                )
            );?>
            <div class="a-footer__apps">
                <div class="a-polygon-container js-a-polygon-container">
                    <div class="a-polygon-container__content">

                        <div class="a-footer-apps">
                            <div class="a-footer-apps__title headline-4"><?=Loc::getMessage('DOWNLOAD_MOBIL_APP_HEADER')?></div>
                            <a href="<?=RU_STORE_APP_LINK?>" class="app-button app-button--m app-button--ru-store" target="_blank">
                                <svg>
                                    <use  xlink:href="/frontend/build/assets/app-logos.svg#ru-store"></use>
                                </svg>
                            </a>
                            <a href="<?=RU_MARKET_APP_LINK?>" class="app-button app-button--m app-button--ru-market" target="_blank">
                                <svg>
                                    <use  xlink:href="/frontend/build/assets/app-logos.svg#ru-market"></use>
                                </svg>
                            </a>
                            <a href="<?=NASH_STORE_APP_LINK?>" class="app-button app-button--m app-button--nash-store" target="_blank">
                                <svg>
                                    <use  xlink:href="/frontend/build/assets/app-logos.svg#nash-store"></use>
                                </svg>
                            </a>
                            <a href="<?=MOBIL_APP_LINK?>" download="true" class="a-button a-button--lm a-button--primary a-button--link">
                                <?=Loc::getMessage('DOWNLOAD_MOBIL_APP_BUTTON_TITLE_IN_FOOTER')?>
                                <span class="a-icon a-button__icon">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-download"></use>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="a-polygon-container__polygon js-a-polygon-container-polygon purple-70">
                        <svg xmlns="http://www.w3.org/2000/svg" class="js-a-polygon-container-svg">
                            <polygon points="" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="a-footer-feedback a-footer__feedback">
                <a href="tel:<?=clearPhoneNumber(MOBIL_PHONE_CONTACT_NUMBER)?>" class="a-footer-feedback__number headline-3"><?=MOBIL_PHONE_CONTACT_NUMBER?></a>
                <a href="tel:<?=clearPhoneNumber(MOBIL_PHONE_CONTACT_NUMBER_2)?>" class="a-footer-feedback__number headline-3"><?=MOBIL_PHONE_CONTACT_NUMBER_2?></a>
                <div class="a-footer-feedback__address body-m-light"><?=Loc::getMessage('ADDRESS')?></div>
                <a href="<?=OFFICES_AND_ATMS_LINK?>" class="a-button a-button--m a-button--primary a-button--link a-button--outline a-button--text">
                    <span class="a-icon a-button__icon">
                        <svg>
                            <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-point"></use>
                        </svg>
                    </span>
                    <?=Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE')?>
                </a>
                <a href="<?=TELEGRAM_LINK?>" class="a-button a-button--m a-button--primary a-button--link a-button--outline a-button--text">
                    <span class="a-icon a-button__icon">
                        <svg>
                            <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-circle-telegram"></use>
                        </svg>
                    </span>
                    <?=Loc::getMessage('TELEGRAM_BUTTON_TITLE')?>
                </a>
                <button href="#" class="a-button a-button--lm a-button--primary a-button--full"><?=Loc::getMessage('FEEDBACK_BUTTON_TITLE')?></button>
                <div class="a-footer-feedback__help">
                    <button class="a-button a-footer-feedback__visually a-button--lm a-button--primary a-button--full a-button--outline">
                        <span class="a-icon a-button__icon">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-glasses"></use>
                            </svg>
                        </span>
                        <span class="a-footer-feedback__visually-desktop"><?=Loc::getMessage('VERSION_FOR_THE_VISUALLY_IMPAIRED_DESKTOP_BUTTON')?></span>
                        <span class="a-footer-feedback__visually-mobile"><?=Loc::getMessage('VERSION_FOR_THE_VISUALLY_IMPAIRED_MOBIL_BUTTON')?></span>
                    </button>
                    <a href="<?=ENGLISH_VERSION_LINK?>" class="a-button a-button--lm a-button--primary a-button--full a-button--outline">
                        English version
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="a-footer-info a-footer__footer-info">
        <div class="content-container">
            <div class="a-footer-info__content">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "additional_menu_footer",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "bottom",
                        "USE_EXT" => "N"
                    )
                );?>
                <div class="a-footer-info__insurance">
                    <img src="/frontend/build/img/footer-insurance.png" class="a-footer-info__insurance-img">
                    <div class="a-footer-info__insurance-content">
                        <p class="a-footer-info__insurance-license body-s-heavy"><?=Loc::getMessage('LICENSE_TITLE')?></p>
                        <p class="a-footer-info__insurance-copy body-s-heavy"><?=Loc::getMessage('COPYRIGHT_TEXT')?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="mobile-main-nav js-mobile-main-nav">
    <div class="mobile-main-nav__panel">
        <a href="/for-private-clients/cards/" class="button-nav-mobile">
            <span class="a-icon size-s">
                <svg>
                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-card"></use>
                </svg>
            </span>
            <span class="button-nav-mobile__text js-button-nav-mobile-text">
                <?=Loc::getMessage('CARD_BUTTON_TITLE')?>
            </span>
        </a>
        <a href="/for-private-clients/deposits/" class="button-nav-mobile">
            <span class="a-icon size-s">
                <svg>
                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-deposit"></use>
                </svg>
            </span>
            <span class="button-nav-mobile__text js-button-nav-mobile-text">
                <?=Loc::getMessage('DEPOSITS_BUTTON_TITLE')?>
            </span>
        </a>
        <button class="button-nav-mobile button-nav-mobile--acent js-button-nav-mobile">
            <div class="button-nav-mobile__icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span class="button-nav-mobile__text js-button-nav-mobile-text">
                <?=Loc::getMessage('MENU_BUTTON_TITLE')?>
            </span>
        </button>
        <a href="/for-private-clients/credits/" class="button-nav-mobile">
            <span class="a-icon size-s">
                <svg>
                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-wallet"></use>
                </svg>
            </span>
            <span class="button-nav-mobile__text js-button-nav-mobile-text">
                <?=Loc::getMessage('CREDITS_BUTTON_TITLE')?>
            </span>
        </a>
        <a href="/for-private-clients/mortgage/" class="button-nav-mobile">
            <span class="a-icon size-s">
                <svg>
                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-house"></use>
                </svg>
            </span>
            <span class="button-nav-mobile__text js-button-nav-mobile-text">
                <?=Loc::getMessage('MORTGAGE_BUTTON_TITLE')?>
            </span>
        </a>
    </div>
    <div class="mobile-main-nav__menu">
        <div class="mobile-menu">
            <div class="mobile-menu__header">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "main_mobil_menu",
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
            <div class="mobile-menu__body js-mobile-menu-body">
                <div class="mobile-search">
                    <form class="mobile-search__form js-mobile-search">
                        <div class="input-wrapper">
                            <span class="a-icon input-wrapper__icon">
                                <svg>
                                    <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-search"></use>
                                </svg>
                            </span>
                            <input placeholder="Поиск по сайту" class="input-wrapper__input">
                        </div>
                    </form>
                    <div class="mobile-search__tag-layout">
                        <p class="body-s-light dark-70">Популярные запросы:</p>
                        <div class="mobile-search__tag-wrapper">
                            <a class="tag-simple body-s-light" href="#">
                                Зарплатный проект
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Зарплатная карта
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Расчетный счет
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Ипотека в новостройке
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Кредит на бизнес
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Депозиты
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Вклады
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Социально-платежная карта МИР
                            </a>
                            <a class="tag-simple body-s-light" href="#">
                                Банковские гарантии
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu__nav">
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "main_mobil_submenu",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "Y"
                        )
                    );?>
                </div>

                <div class="mobile-menu__bank-apps">
                    <a href="<?=MOBIL_APP_LINK?>" target="_blank" class="a-button a-button--m a-button--primary a-button--link a-button--outline">
                        <span class="a-icon a-button__icon">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-download"></use>
                            </svg>
                        </span>
                        <?=Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE')?>
                    </a>
                    <a href="<?=ONLINE_BANK_LINK?>" target="_blank" class="a-button a-button--m a-button--primary a-button--link">
                        <?=Loc::getMessage('ONLINE_BUNK_BUTTON_TITLE')?>
                    </a>
                </div>
                <div class="mobile-menu__bank-contact">
                    <a href="<?=OFFICES_AND_ATMS_LINK?>" class="header-contact-link body-s-light">
                        <span class="header-contact-link__icon">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-point"></use>
                            </svg>
                        </span>
                        <span class="header-contact-link__text">
                            <?=Loc::getMessage('OFFICES_AND_ATMS_BUTTON_TITLE')?>
                        </span>
                    </a>
                    <a href="tel:<?=clearPhoneNumber(MOBIL_PHONE_CONTACT_NUMBER)?>" class="header-contact-link body-s-light">
                        <span class="header-contact-link__icon">
                            <svg>
                                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-mobile"></use>
                            </svg>
                        </span>
                        <span class="header-contact-link__text">
                            <?=MOBIL_PHONE_CONTACT_NUMBER?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
