<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) { ?>
    <nav class="pb-nav d-flex flex-column align-items-center row-gap-4 row-gap-lg-6">
        <?
        foreach ($arResult as $arItem) {
            ?>
            <a class="<?= $arItem['PARAMS']['CLASS'] ?? 'pb-nav__link' ?>"
               href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a>
            <?
        } ?>

    </nav>
<? } ?>
