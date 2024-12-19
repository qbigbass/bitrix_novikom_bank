<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) {
    foreach ($arResult as $key => $item) { ?>
        <a class="banner-hero-thumb" href="<?= basename($item["LINK"]) ?>">
            <h5><?= $item["TEXT"] ?></h5>
        </a>
    <? }
} ?>
