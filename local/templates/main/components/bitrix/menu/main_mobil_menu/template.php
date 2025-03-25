<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
/** @var $arResult array */
/** @var $arParams array */

use Bitrix\Main\Localization\Loc;
?>
<? if (!empty($arResult)) : ?>
    <div class="mobile-main-nav__menu">
        <div class="mobile-menu">
            <div class="mobile-menu__header">
                <div class="swiper js-swiper-mobile-menu">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult as $keyFirstLevel => $item) : ?>
                            <? if ($item['DEPTH_LEVEL'] === 1) : ?>
                                <div class="swiper-slide">
                                    <? if ($item['LINK'] === '/private-banking/') : ?>
                                        <? $isActive = ($item['SELECTED']) ? ' is-active' : ''; ?>
                                        <a
                                            class="text-s <?= $isActive ?>"
                                            href="<?= $item['LINK'] ?>"
                                        ><?= $item['TEXT'] ?></a>
                                    <? else:?>
                                        <div data-tab="tab-<?= $keyFirstLevel ?>">
                                            <span><?= $item['TEXT'] ?></span>
                                        </div>
                                    <? endif; ?>
                                </div>
                            <? endif; ?>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="mobile-menu__body js-mobile-menu-body">
                <div class="d-flex flex-column gap-3 gap-md-4">
                    <form method="get" action="/search/">
                        <div class="input-group flex-nowrap js-mobile-search">
                            <span class="input-group-icon" id="input-search-menu">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                                    </svg>
                                </span>
                            </span>
                            <input
                                class="form-control"
                                name="q"
                                type="text"
                                placeholder="Поиск по сайту"
                                aria-label="Поиск по сайту"
                                aria-describedby="input-search-menu"
                                value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
                            >
                        </div>
                    </form>
                    <div class="mobile-menu__search-content">
                        <span class="dark-70">Популярные запросы:</span>
                        <div class="d-flex flex-wrap gap-3">
                            <a class="chip text-s" href="#">Зарплатный проект</a>
                            <a class="chip text-s" href="#">Зарплатная карта</a>
                            <a class="chip text-s" href="#">Расчетный счет</a>
                            <a class="chip text-s" href="#">Ипотека в новостройке</a>
                            <a class="chip text-s" href="#">Кредит на бизнес</a>
                            <a class="chip text-s" href="#">Депозиты</a>
                            <a class="chip text-s" href="#">Вклады</a>
                            <a class="chip text-s" href="#">Социально-платежная карта МИР</a>
                            <a class="chip text-s" href="#">Банковские гарантии</a>
                        </div>
                    </div>
                </div>
                <? foreach ($arResult as $keyFirstLevel => $item) : ?>
                    <div class="mobile-menu__nav" data-list="list-<?= $keyFirstLevel ?>">
                        <div class="accordion accordion-flush" id="accordionMenu">
                            <? if (!empty($item['CHILD'])) : ?>
                                <? foreach ($item['CHILD'] as $keySecondLevel => $itemSecond) : ?>
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <a
                                                class="accordion-button collapsed fw-semibold"
                                                href="#collapse<?= $keySecondLevel ?>"
                                                data-bs-toggle="collapse"
                                                aria-expanded="false"
                                                aria-controls="collapse<?= $keySecondLevel ?>"
                                            ><?= $itemSecond['TEXT'] ?></a>
                                        </div>
                                        <? if (!empty($itemSecond['SUBMENU'])) : ?>
                                            <div class="accordion-collapse collapse" data-bs-parent="#accordionMenu" id="collapse<?= $keySecondLevel ?>">
                                                <div class="accordion-body">
                                                    <div class="row row-gap-4">
                                                        <? foreach ($itemSecond['SUBMENU'] as $keyThirdLevel => $itemThird) : ?>
                                                            <div class="col-12 col-md-6">
                                                                <a href="<?= $itemThird['LINK'] ?>"><?= $itemThird['TEXT'] ?></a>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <? endif; ?>
                                    </div>
                                <? endforeach; ?>
                            <? endif; ?>
                        </div>
                    </div>
                <? endforeach; ?>
                <div class="mobile-menu__bank-apps">
                    <a class="btn btn-outline-primary d-inline-flex gap-2 align-items-center justify-content-center" href="<?=MOBIL_APP_LINK?>">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                        </svg>
                        <?=Loc::getMessage('DOWNLOAD_MOBIL_APP_BUTTON_TITLE')?>
                    </a>
                    <div class="dropdown">
                        <a href="<?= ONLINE_BANK_LINK ?>" class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=Loc::getMessage('ONLINE_BUNK_BUTTON_TITLE')?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bold" href="https://online.novikom.ru/#/registration">Для частных лиц</a></li>
                            <li><a class="dropdown-item fw-bold" href="https://bk.novikom.ru/ru/html/login.html">Для организаций</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-menu__bank-contact">
                    <a class="d-flex align-items-center gap-2" href="<?= OFFICES_AND_ATMS_LINK ?>">
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
<? endif; ?>
