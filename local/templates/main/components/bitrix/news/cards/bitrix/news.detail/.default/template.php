<?

use Bitrix\Main\Application;
use Galago\Frontend\Asset;

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

Asset::getInstance()->addJsAndCss('mir-credit-supreme');

$request = Application::getInstance()->getContext()->getRequest()->toArray();
$properties = $arResult['PROPERTIES'];
$bannerClass = $arResult["PROPERTY_{$properties['CLASS_BANNER_DETAIL']['ID']}"];
?>

<div class="product-card-banner <?= !empty($bannerClass) ? $bannerClass : '' ?> ">
    <picture class="pattern-bg product-card-banner__pattern">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/build/assets/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/build/assets/patterns/section/pattern-dark-l.svg" alt="bg pattenr" loading="lazy">
    </picture>
    <div class="product-card-banner__wrapper">
        <div class="product-card-banner__content">
            <div class="product-card-banner__header">
                <nav class="breadcrumbs body-s-light">
                    <ul class="breadcrumbs__list">
                        <li class="breadcrumbs__item">
                            <a href="" class="breadcrumbs__link">
                                Частным клиентам
                            </a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="<?= $arResult['IBLOCK']['LIST_PAGE_URL'] ?>" class="breadcrumbs__link">
                                Карты
                            </a>
                        </li>
                    </ul>
                    <a href="<?= $arResult['IBLOCK']['LIST_PAGE_URL'] ?>" class="breadcrumbs__link breadcrumbs__link-mobile">
                            <span class="a-icon size-s">
                                <svg>
                                    <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
                                </svg>
                            </span>
                        Карты
                    </a>
                </nav>
                <h1 class="product-card-banner__title headline-0">
                    <?= $arResult['NAME'] ?>
                </h1>
                <p class="product-card-banner__subtitle body-l-light">
                    <?= $arResult['DETAIL_TEXT'] ?>
                </p>
            </div>
            <img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" class="product-card-banner__image" alt="<?= $arResult['NAME'] ?>">
            <div class="product-card-banner__benefits-list">

                <? if ( !empty($arResult["PROPERTY_{$properties['BALANCE_BANNER']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="body-l-heavy">до</span>
                            <span class="number-l-heavy"><?= $arResult["PROPERTY_{$properties['BALANCE_BANNER']['ID']}"] ?></span>
                        </div>
                        <div class="body-m-light dark-0">Годовых в&nbsp;месяц на&nbsp;остаток</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['SERVICE']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="number-l-heavy"><?= number_format($arResult["PROPERTY_{$properties['SERVICE']['ID']}"], 0, '', ' ') ?></span>
                            <span class="number-l-heavy currency">₽</span>
                        </div>
                        <div class="body-m-light dark-0">Обслуживание карты</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['CASHBACK_PARTNER']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="body-l-heavy">до</span>
                            <span class="number-l-heavy"><?= $arResult["PROPERTY_{$properties['CASHBACK_PARTNER']['ID']}"] ?></span>
                        </div>
                        <div class="body-m-light dark-0">Кешбэк рублями за покупки у партнёров банка</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['SELECTED_CATEGORY']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="body-l-heavy">от</span>
                            <span class="number-l-heavy"><?= $arResult["PROPERTY_{$properties['SELECTED_CATEGORY']['ID']}"]?></span>
                        </div>
                        <div class="body-m-light dark-0">Кешбэк от суммы покупок в избранных категориях</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['ISSUE_CARD']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="number-l-heavy"><?= number_format($arResult["PROPERTY_{$properties['ISSUE_CARD']['ID']}"], 0, '', ' ')  ?></span>
                            <span class="number-l-heavy currency">₽</span>
                        </div>
                        <div class="body-m-light dark-0">Выпуск цифровой карты</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['FREE_PERIOD']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="body-l-heavy">до</span>
                            <span class="number-l-heavy"><?= $arResult["PROPERTY_{$properties['FREE_PERIOD']['ID']}"] ?></span>
                            <span class="body-l-heavy">дней</span>
                        </div>
                        <div class="body-m-light dark-0">Беспроцентный период</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['INSTANT_ISSUE_CARD']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="number-l-heavy"><?= number_format($arResult["PROPERTY_{$properties['INSTANT_ISSUE_CARD']['ID']}"], 0, '', ' ')  ?></span>
                            <span class="number-l-heavy currency">₽</span>
                        </div>
                        <div class="body-m-light dark-0">Мгновенный выпуск карты</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['GLUED_SMARTPHONE']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="number-l-heavy"><?= $arResult["PROPERTY_{$properties['GLUED_SMARTPHONE']['ID']}"] ?></span>
                        </div>
                        <div class="body-m-light dark-0">Стикер приклеивается на&nbsp;смартфон</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['MAGNETIC_FIELD']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="number-l-heavy"><?= $arResult["PROPERTY_{$properties['MAGNETIC_FIELD']['ID']}"] ?></span>
                        </div>
                        <div class="body-m-light dark-0">Магнитное поле стикера не&nbsp;позволяет считать его на&nbsp;расстоянии</div>
                    </div>
                <? } ?>

                <? if ( !empty($arResult["PROPERTY_{$properties['ENTRY_PIN']['ID']}"]) ) { ?>
                    <div class="text-indicating-benefits">
                        <div class="text-indicating-benefits-head green-100">
                            <span class="number-l-heavy"><?= $arResult["PROPERTY_{$properties['ENTRY_PIN']['ID']}"] ?></span>
                        </div>
                        <div class="body-m-light dark-0">Обязательное введение пин-кода при сумме оплаты от&nbsp;3&nbsp;000&nbsp;рублей</div>
                    </div>
                <? } ?>

            </div>
            <a href="#" class="a-button product-card-banner__button a-button--lm a-button--green a-button--link">Оформить карту</a>
        </div>
    </div>
</div>

<section class="section-layout section-benefits section-benefits--bg">
    <div class="content-container">
        <div class="section-benefits__container">
            <h3 class="section-benefits__title headline-2"><?= !$arResult['generalPage'] ? 'Преимущества для каждого' : 'Преимущества карты ' . $arResult['NAME'] ?></h3>
            <? if (!$arResult['generalPage']) { ?>

                <? /* Вывод список страниц по Преимуществам */ ?>
                <div class="section-benefits__tabs">
                    <div class="a-tabs a-tabs--component js-a-tabs">
                        <div class="a-tab-swiper swiper js-a-tab-swiper">
                            <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">
                                <? foreach ($arResult['generalPageTabs'] as $key => $generateTabs) { ?>
                                    <?
                                        $isActive = false;

                                        if ( $generateTabs['ID'] == $request['item'] ) {
                                            $isActive = true;
                                        } elseif (!isset($request['item']) && $key == 0) {
                                            $isActive = true;
                                        }
                                    ?>
                                    <a
                                        href="<?= $arResult['DETAIL_PAGE_URL'] . $generateTabs['CODE'] . '/' ?>"
                                        class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab <?= $isActive ? 'is-active' : '' ?>"
                                    >
                                        <?= $generateTabs['NAME'] ?>
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
                <div class="a-collapsed-items js-a-collapsed-items" data-visible-items="4" data-rebuilding-mq="tablet" data-use-count="true">
                    <div class="section-benefits__content">
                        <div class="benefit-cards-layout max-cols-3">
                            <? foreach ($arResult['advantagesItems'] as $advantagesItem) { ?>
                                <div class="a-collapsed-item js-a-collapsed-item">
                                    <div class="benefit-text-card">
                                        <div class="benefit-text-card__icon">
                                            <img src="<?= $advantagesItem['IMG_PATH'] ?>" class="a-icon size-xxl" alt="" loading="lazy">
                                        </div>
                                        <h3 class="benefit-text-card__title headline-3"><?= $advantagesItem['NAME'] ?></h3>
                                        <p class="benefit-text-card__description body-m-light"><?= $advantagesItem['DESCRIPTION'] ?></p>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                        <button data-hidden-text="Скрыть" data-visible-text="Еще преимущества" class="a-button a-collapsed-button js-a-collapsed-button is-hidden a-button--lm a-button--primary a-button--text">
                            <span class="js-a-collapsed-button-text">
                                Еще преимущества
                            </span>
                            <span class="a-icon a-button__icon">
                                <svg>
                                    <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

            <? } else { ?>

                <? /* Вывод общей информации по Преимуществам */ ?>
                <div class="a-collapsed-items js-a-collapsed-items" data-visible-items="4" data-rebuilding-mq="tablet" data-use-count="true">
                    <div class="section-benefits__content">
                        <div class="benefit-cards-layout max-cols-2">
                            <? foreach ($arResult['advantagesItems'] as $advantagesItemGeneral) { ?>
                                <div class="a-collapsed-item js-a-collapsed-item">
                                    <div class="benefit-text-card">
                                        <div class="benefit-text-card__icon">
                                            <img src="<?= $advantagesItemGeneral['IMG_PATH'] ?>" class="a-icon size-xxl" alt="" loading="lazy">
                                        </div>
                                        <h3 class="benefit-text-card__title headline-3"><?= $advantagesItemGeneral['NAME'] ?></h3>
                                        <p class="benefit-text-card__description body-m-light"><?= $advantagesItemGeneral['DESCRIPTION'] ?></p>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                        <button data-hidden-text="Скрыть" data-visible-text="Еще преимущества" class="a-button a-collapsed-button js-a-collapsed-button is-hidden a-button--lm a-button--primary a-button--text">
                            <span class="js-a-collapsed-button-text">
                                Еще преимущества
                            </span>
                            <span class="a-icon a-button__icon">
                                <svg>
                                    <use xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

            <? } ?>
        </div>
    </div>
</section>

<?
// вывод информации из конструктора
$arrDetailInfoCardIds = [];

if (!$arResult['generalPage']) {
    $arrDetailInfoCardIds = $arResult['generalPageTabs'];
} else {
    $arrDetailInfoCardIds = $arResult["PROPERTY_{$arResult['PROPERTIES']['DETAIL_INFO_CARD']['ID']}"];
}

$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    "",
    Array(
        "IBLOCK_ID" => $arResult['iblockInnerCardInfo'],
        "ELEMENT_ID" => $arrDetailInfoCardIds[0],
        "PROPERTY_CODE" => "GENERATE_PAGE",
    ),
    false,
    Array(
        "HIDE_ICONS" => "Y"
    )
);
?>


<? /* Блок Смотрите также */ ?>
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
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Открыть вклад
                            </a>
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
                                <div class="offer-card__title headline-3">Ипотека по программе <br>«IT-ипотека»</div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">от</span>
                                        <span class="number-l-heavy">4,8%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/it-mortgage.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Подать заявку
                            </a>
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
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Оформить
                            </a>
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
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Открыть вклад
                            </a>
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
                                <div class="offer-card__title headline-3">Ипотека по программе <br>«IT-ипотека»</div>
                                <div class="text-indicating-benefits">
                                    <div class="text-indicating-benefits-head violet-100">
                                        <span class="body-l-heavy">от</span>
                                        <span class="number-l-heavy">4,8%</span>
                                    </div>
                                </div>
                            </div>
                            <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/it-mortgage.png">
                            <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Подать заявку
                            </a>
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
