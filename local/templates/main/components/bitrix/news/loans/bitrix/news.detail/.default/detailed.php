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
?>

<div class="banner-product banner-product--heavy-violet">
    <div class="banner-product__wrapper">
        <div class="banner-product__content">
            <div class="banner-product__header">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "",
                    Array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                );?>
                <h1><?= $arResult["~NAME"] ?></h1>
                <p class="banner-product__subtitle"><?= $arResult["~PREVIEW_TEXT"] ?></p>
            </div>
            <img class="banner-product__image" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>" loading="lazy">
            <? if ($arResult['PROPERTIES']['DETAIL_TERMS']['VALUE_FORMATTED']) { ?>
                <div class="banner-product__benefits-list">
                    <? foreach ($arResult['PROPERTIES']['DETAIL_TERMS']['VALUE_FORMATTED'] as $term) { ?>
                        <div class="d-inline-flex flex-column row-gap-2">
                            <div class="d-inline-flex flex-nowrap align-items-baseline text-l fw-semibold gap-1 green-100">
                                <?= !empty($term["Мелко"]) ? "<span>{$term["Мелко"]}</span>" : '' ?>
                                <?= !empty($term["Крупно"]) ? "<span class='text-number-l fw-bold text-nowrap'>{$term["Крупно"]}</span>" : '' ?>
                            </div>
                            <?= !empty($term["Подпись"]) ? "<span class='d-block'>{$term["Подпись"]}</span>" : '' ?>
                        </div>
                    <? } ?>
                </div>
            <? } ?>
            <? if ($arResult['PROPERTIES']['BUTTON_DETAIL']['VALUE']) { ?>
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
