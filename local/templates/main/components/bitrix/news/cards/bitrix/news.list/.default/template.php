<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Application;

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

$request = Application::getInstance()->getContext()->getRequest()->toArray();
?>

<section class="section-layout section-catalog-layout section-layout--s section-layout--bg-undefined">
    <div class="content-container">
        <div class="a-tabs a-tabs--layout js-a-tabs">
            <div class="section-catalog-layout__content">
                <div class="section-catalog-layout__tabs">
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
                                    class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab <?= $request['SECTION_CODE'] == $section['CODE'] ? 'is-active' : '' ?>"
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
                <div class="section-catalog-layout__panels">
                    <div class="a-tab-panels js-a-tab-panels">
                        <div class="a-tab-panel js-a-tab-panel">
                            <div class="product-list">
                                <? foreach ($arResult['ITEMS'] as $sectionItem) { ?>
                                    <div class="product-card product-card--use-tag">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/showcase-cards/showcase-spk.png" class="product-card__image">
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

                                                    <? if ( isset($sectionItem['PROPERTIES']['SERVICE']['VALUE']) ) { ?>
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
                                                    <a href="<?= $sectionItem['DETAIL_PAGE_URL'] ?>" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                        <span class="a-icon a-button__icon">
                                                            <svg>
                                                                <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-layout section-see-also section-layout--bg-undefined">
    <div class="content-container">
        <div class="section-title section-title--padding">
            <h3 class="section-title__text headline-2">
                Смотрите также
            </h3>
        </div>
        <div class="slider-skeleton swiper persistent-slider js-persistent-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,tablet-album:2,laptop:3,laptop-x:3,desktop:3" data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:40,laptop:40,laptop-x:40,desktop:40">
            <div class="swiper-wrapper js-swiper-wrapper">
                <div class="swiper-slide js-swiper-slide">
                    <div class="offer-card offer-card--green">
                        <div class="offer-card__inner">
                            <div class="offer-card__tag">
                                <div class="a-tag" slot="tag">
                                    <span class="a-tag__content body-s-heavy">
                                        Частным клиентам
                                    </span>
                                    <span class="a-tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="offer-card__content">
                                <div class="offer-card__title headline-3">Программа «Кешбэк»</div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">до</span>
                                        <span class="number-l-heavy">15,5%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/contribution-rentier.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Открыть вклад</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="offer-card offer-card--orange">
                        <div class="offer-card__inner">
                            <div class="offer-card__tag">
                                <div class="a-tag" slot="tag">
                                    <span class="a-tag__content body-s-heavy">
                                        Частным клиентам
                                    </span>
                                    <span class="a-tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="offer-card__content">
                                <div class="offer-card__title headline-3">Ипотека по программе <br>«IT-ипотека»
                                </div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">от</span>
                                        <span class="number-l-heavy">4,8%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/it-mortgage.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Подать заявку</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="offer-card offer-card--yellow">
                        <div class="offer-card__inner">
                            <div class="offer-card__tag">
                                <div class="a-tag" slot="tag">
                                    <span class="a-tag__content body-s-heavy">
                                        Частным клиентам
                                    </span>
                                    <span class="a-tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="offer-card__content">
                                <div class="offer-card__title headline-3">Кредит<br>на образование</div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">от</span>
                                        <span class="number-l-heavy">16%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/credit-education.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Оформить</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="offer-card offer-card--green">
                        <div class="offer-card__inner">
                            <div class="offer-card__tag">
                                <div class="a-tag" slot="tag">
                                    <span class="a-tag__content body-s-heavy">
                                        Частным клиентам
                                    </span>
                                    <span class="a-tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="offer-card__content">
                                <div class="offer-card__title headline-3">Программа «Кешбэк»</div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">до</span>
                                        <span class="number-l-heavy">15,5%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/contribution-rentier.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Открыть вклад</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="offer-card offer-card--orange">
                        <div class="offer-card__inner">
                            <div class="offer-card__tag">
                                <div class="a-tag" slot="tag">
                                    <span class="a-tag__content body-s-heavy">
                                        Частным клиентам
                                    </span>
                                    <span class="a-tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="offer-card__content">
                                <div class="offer-card__title headline-3">Ипотека по программе <br>«IT-ипотека»
                                </div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">от</span>
                                        <span class="number-l-heavy">4,8%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/it-mortgage.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Подать заявку</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-swiper-slide">
                    <div class="offer-card offer-card--yellow">
                        <div class="offer-card__inner">
                            <div class="offer-card__tag">
                                <div class="a-tag" slot="tag">
                                    <span class="a-tag__content body-s-heavy">
                                        Частным клиентам
                                    </span>
                                    <span class="a-tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="offer-card__content">
                                <div class="offer-card__title headline-3">Кредит<br>на образование</div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">от</span>
                                        <span class="number-l-heavy">16%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/credit-education.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Оформить</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-skeleton__controls">
                <div class="slider-controls js-swiper-controls">
                    <div class="slider-controls__pagination js-swiper-pagination"></div>
                    <div class="slider-controls__navigation js-swiper-nav">
                        <button type="button" class="swiper-button-prev js-swiper-prev">
                                <span class="a-icon size-m">
                                    <svg>
                                        <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg>
                                </span>
                        </button>
                        <button type="button" class="swiper-button-next js-swiper-next">
                                <span class="a-icon size-m">
                                    <svg>
                                        <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
