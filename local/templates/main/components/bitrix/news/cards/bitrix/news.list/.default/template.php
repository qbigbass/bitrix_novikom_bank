<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Application;
use Galago\Frontend\Asset;

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

Asset::getInstance()->addJsAndCss('showcase-of-cards');

$request = Application::getInstance()->getContext()->getRequest()->toArray();
?>

<? /* Баннер разводящей страницы */ ?>
<div class="text-banner text-banner--blue">
    <div class="content-container">
        <div class="text-banner__inner">
            <div class="text-banner__content">
                <nav class="breadcrumbs body-s-light">
                    <ul class="breadcrumbs__list">
                        <li class="breadcrumbs__item">
                            <a href="#" class="breadcrumbs__link">
                                Частным клиентам
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="breadcrumbs__link breadcrumbs__link-mobile">
                            <span class="a-icon size-s">
                                <svg>
                                    <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                            </span>
                        Частным клиентам
                    </a>
                </nav>
                <div class="text-banner__title headline-0">Банковские карты</div>
                <div class="text-banner__description body-l-light">Карты с оптимальными условиями и приятными бонусами</div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/build/assets/patterns/section/pattern-dark-l.svg" alt="bg pattenr" loading="lazy">
    </picture>
</div>

<? /* Вывод элементов */ ?>
<section class="section-layout section-catalog-layout section-layout--s">
    <div class="content-container">
        <div class="section-catalog-layout__content">
            <div class="section-catalog-layout__tabs">
                <div class="a-tabs a-tabs--component js-a-tabs">
                    <div class="a-tab-swiper swiper js-a-tab-swiper">
                        <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">
                            <a
                                href="<?= $arResult['LIST_PAGE_URL'] ?>"
                                class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab <?= empty($request) ? 'is-active' : '' ?>"
                            >
                                Все карты
                            </a>
                            <? foreach ($arParams['sectionList'] as $section) { ?>
                                <a
                                    href="<?= $arResult['LIST_PAGE_URL'] . $section['CODE'] . '/' ?>"
                                    class="a-tab a-tab--lm a-tab--primary swiper-slide <?= $request['SECTION_CODE'] == $section['CODE'] ? 'is-active' : '' ?>"
                                >
                                    <?= $section['NAME'] ?>
                                </a>
                            <? } ?>
                        </div>
                        <button class="a-tab-nav-button js-a-tab-prev is-prev">
                        <span class="a-icon size-m">
                            <svg>
                                <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                            </svg>
                        </span>
                        </button>
                        <button class="a-tab-nav-button js-a-tab-next is-next">
                        <span class="a-icon size-m">
                            <svg>
                                <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="section-catalog-layout__list">
                <div class="product-list">
                    <? foreach ($arResult['ITEMS'] as $sectionItem) { ?>
                        <div class="product-card <?= !empty($sectionItem['IBLOCK_SECTION_PROP_TYPE_CARDS']) ? 'product-card--use-tag' : '' ?>">
                            <div class="product-card__image-container">
                                <img src="<?= $sectionItem['PREVIEW_PICTURE']['SRC'] ?>" class="product-card__image" alt="<?= $sectionItem['NAME'] ?>">
                            </div>
                            <? if (!empty($sectionItem['IBLOCK_SECTION_PROP_TYPE_CARDS'])) { ?>
                                <div class="product-card__tag">
                                    <div class="a-tag">
                                        <span class="a-tag__content body-s-heavy">
                                            <?= $sectionItem['IBLOCK_SECTION_PROP_TYPE_CARDS'] ?>
                                        </span>
                                        <span class="a-tag__triangle">
                                            <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            <? } ?>
                            <div class="product-card__content">
                                <div class="product-card__head">
                                    <div class="product-card__title headline-1"><?= $sectionItem['NAME'] ?></div>
                                </div>
                                <div class="product-card__conditions-box">
                                    <div class="product-card__conditions">

                                        <? if ( isset($sectionItem['PROPERTIES']['SERVICE']['VALUE']) && !empty($sectionItem['PROPERTIES']['SERVICE']['VALUE']) ) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['SERVICE']['VALUE'] ?></span>
                                                    <span class="number-l-heavy currency">₽</span>
                                                </div>
                                                <div class="body-m-light dark-70">Обслуживание</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['PAY_BY_CATEGORY']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="body-l-heavy">до</span>
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['PAY_BY_CATEGORY']['VALUE'] ?></span>
                                                    <span class="body-l-heavy">кешбэк</span>
                                                </div>
                                                <div class="body-m-light dark-70">Рублями по категориям</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['DESCRIPTION']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['DESCRIPTION']['VALUE'] ?></span>
                                                </div>
                                                <div class="body-m-light dark-70">Описание</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['INTERESTET']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="body-l-heavy">до</span>
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['INTERESTET']['VALUE'] ?></span>
                                                </div>
                                                <div class="body-m-light dark-70">Процент на остаток</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['DEPOSIT']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['DEPOSIT']['VALUE'] ?></span>
                                                </div>
                                                <div class="body-m-light dark-70">Снятие и внесение наличных</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['CREDIT_LIMIT']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="body-l-heavy">от</span>
                                                    <span class="number-l-heavy"><?= number_format($sectionItem['PROPERTIES']['CREDIT_LIMIT']['VALUE'], 0, '', ' ') ?></span>
                                                    <span class="number-l-heavy currency">₽</span>
                                                </div>
                                                <div class="body-m-light dark-70">Кредитный лимит</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['CASHBACK']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="body-l-heavy">до</span>
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['CASHBACK']['VALUE'] ?></span>
                                                    <span class="body-l-heavy">кешбэк</span>
                                                </div>
                                                <div class="body-m-light dark-70">Рублями или бонусами</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['FREE_PERIOD']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="body-l-heavy">до</span>
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['FREE_PERIOD']['VALUE'] ?></span>
                                                    <span class="body-l-heavy">дней</span>
                                                </div>
                                                <div class="body-m-light dark-70">Беспроцентный период</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['RUBLES_MIR']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="body-l-heavy">до</span>
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['RUBLES_MIR']['VALUE'] ?></span>
                                                    <span class="body-l-heavy">кешбэк</span>
                                                </div>
                                                <div class="body-m-light dark-70">Рублями от ПС «Мир»</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['TOUCH']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['TOUCH']['VALUE'] ?></span>
                                                </div>
                                                <div class="body-m-light dark-70">В одно касание</div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($sectionItem['PROPERTIES']['SMARTPHONE_PAY']['VALUE'])) { ?>
                                            <div class="text-indicating-benefits">
                                                <div class="text-indicating-benefits-head">
                                                    <span class="number-l-heavy"><?= $sectionItem['PROPERTIES']['SMARTPHONE_PAY']['VALUE'] ?></span>
                                                </div>
                                                <div class="body-m-light dark-70">Оплата покупок
                                                    смартфоном
                                                </div>
                                            </div>
                                        <? } ?>

                                    </div>
                                    <div class="product-card__buttons">
                                        <button type="button" class="a-button a-button--lm a-button--green">
                                            Оформить заявку
                                        </button>

                                        <? if ($sectionItem['anchoredElements']) { ?>
                                            <a href="<?= count($sectionItem['anchoredElements']) > 1 ? $sectionItem['DETAIL_PAGE_URL'] . $sectionItem['anchoredElements'][0]['code'] .'/'  : $sectionItem['DETAIL_PAGE_URL'] ?>" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                <span class="a-icon a-button__icon">
                                                                <svg>
                                                                    <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                                                                </svg>
                                                            </span>
                                            </a>
                                        <? } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</section>
