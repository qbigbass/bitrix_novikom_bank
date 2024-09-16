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

Asset::getInstance()->addJsAndCss('spc-for-employees');

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

<section class="section-layout section-benefits">
    <div class="content-container">
        <div class="section-benefits__container">
            <h3 class="section-benefits__title headline-2">Преимущества карты <?= $arResult['NAME'] ?></h3>
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
        </div>
    </div>
    <picture class="pattern-bg">
        <source srcset="/frontend/build/assets/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/build/assets/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/build/assets/patterns/section/pattern-light-l.svg" alt="bg pattenr" loading="lazy">
    </picture>
</section>

<?
// вывод информации из конструктора
$arrDetailInfoCardIds = json_decode($arResult['PROPERTIES']['DETAIL_CARD']['~VALUE'], true)['blocks'][0]['element_ids'];

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
