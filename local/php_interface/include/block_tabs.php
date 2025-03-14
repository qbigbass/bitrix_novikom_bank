<?php
/** @var array $arParams */

use Dalee\Helpers\ComponentRenderer\Renderer;

global $APPLICATION;
$renderer = new Renderer($APPLICATION);
$elementIds = getElementIdsIncludedArea(iblock('tabs'));
$params = [];

if (!empty($arParams['IBLOCK_ID'])) {
    $code = basename($APPLICATION->GetCurPage());
    $element = \Bitrix\Iblock\ElementTable::getList([
        'filter' => [
            'CODE' => $code,
            'IBLOCK_ID' => $arParams['IBLOCK_ID'] ?? ''
        ],
        'select' => [
            'ID'
        ]
    ])->fetch();

    $params['elementId'] = $element['ID'];
}

?>
<? if (!empty($elementIds)) : ?>
    <?
    $blockTabsSectionClass = $APPLICATION->GetProperty("blockTabsSectionClass") ?: "";
    $title = $APPLICATION->GetProperty("blockTabsTitle") ?: "";
    $picPath = $APPLICATION->GetProperty("blockTabsPicPath") ?: "";
    ?>
    <section class="section-layout js-collapsed-mobile <?= $blockTabsSectionClass ?>">
        <div class="container">
            <h3 class="d-none d-md-flex mb-md-6 mb-lg-7 px-lg-6"><?= $title ?></h3>
            <a
                class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none"
                data-bs-toggle="collapse"
                href="#additional-info-content"
                role="button"
                aria-expanded="false"
                aria-controls="additional-info-content"
            >
                <?= $title ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
            <? $renderer->render('Tabs', $elementIds, null, $params); ?>
        </div>
        <? if (!empty($picPath)) : ?>
            <picture class="pattern-bg pattern-bg--hide-mobile">
                <source srcset="<?= $picPath ?>-s.svg" media="(max-width: 767px)">
                <source srcset="<?= $picPath ?>-m.svg" media="(max-width: 1199px)">
                <img src="<?= $picPath ?>-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        <? endif; ?>
    </section>
<? endif; ?>
