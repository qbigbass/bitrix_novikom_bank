<?
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

use Dalee\Helpers\ComponentHelper;

$terms = [
    'RATE_TO' => [
        'SIGN' => 'При ключевой ставке<br>Банка России на ' . date('d.m.Y'),
        'FROM_TO' => 'до&nbsp;',
    ],
    'PERIOD_FROM' => [
        'SIGN' => 'Минимальный срок вклада',
        'FROM_TO' => 'от&nbsp;',
    ],
    'SUM_FROM' => [
        'SIGN' => 'Минимальная сумма вклада',
        'FROM_TO' => 'от&nbsp;',
    ],
];

?>

<div class="banner-product banner-product--heavy-purple">
    <div class="banner-product__wrapper">
        <div class="banner-product__content">
            <div class="banner-product__header">

                <?
                    $helper = new ComponentHelper($component);
                    $helper->deferredCall('showNavChain', ['.default']);
                ?>

                <h1>Вклад «<?= $arResult["~NAME"] ?>»</h1>
                <p class="banner-product__subtitle"><?= $arResult["~PREVIEW_TEXT"] ?></p>
            </div>
            <img class="banner-product__image" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>" loading="lazy">
            <? if (!empty($arResult['PROPERTIES']['TERMS'])) { ?>
                <div class="banner-product__benefits-list">
                    <? $termsValues = processTerms($terms, $arResult['PROPERTIES']['TERMS'], true);
                    foreach ($termsValues as $term) { ?>
                        <div class="d-inline-flex flex-column row-gap-2">
                            <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 green-100">
                                <span><?= $term['FROM_TO'] ?></span>
                                <span class='text-number-l fw-bold text-nowrap'><?= $term['VALUE'] ?></span>
                            </div>
                            <span class='d-block'><?= $term['SIGN'] ?></span>
                        </div>
                    <? } ?>
                </div>
            <? } ?>
            <? if (!empty($arResult['PROPERTIES']['BUTTON_DETAIL']['VALUE'])) { ?>
                <a class="btn btn-tertiary btn-lg banner-product__button" href="#"><?= $arResult['PROPERTIES']['BUTTON_TEXT_DETAIL']['VALUE'] ?></a>
            <? } ?>
        </div>
    </div>
    <picture class="pattern-bg banner-product__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-dark-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-dark-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</div>
