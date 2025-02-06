<?
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

use Dalee\Libs\Tabs\AnchorContent;

?>
<? if (!empty($arResult["ITEMS"])) : ?>
    <? if (!empty($arResult["MENU"])) : ?>
        <div class="anchor-panel bg-white sticky-lg-top">
            <div class="container d-flex py-3 overflow-auto">
                <nav id="#navigation" class="d-flex flex-nowrap flex-md-wrap gap-4 column-gap-md-5 row-gap-md-4 column-gap-lg-6">
                    <? foreach ($arResult["MENU"] as $item) : ?>
                        <a class="anchor-item text-l text-nowrap" href="#<?= $item["CODE"] ?>"><?= $item["TITLE"] ?></a>
                    <? endforeach ?>
                </nav>
            </div>
        </div>
    <? endif ?>
    <? if (!empty($arResult["BLOCKS"])) : ?>
        <div class="scrollspy" data-bs-spy="scroll" data-bs-target="#navigation" tabindex="0">
            <? foreach ($arResult["BLOCKS"] as $block) : ?>
                <section class="section-layout <?= $block["CLASS_BLOCK"] ?>" id="<?= $block["CODE"] ?>" tabindex="0">
                    <div class="container">
                        <div class="row row-gap-6 row-gap-lg-11">
                            <div class="col-12">
                                <h2 class="mb-3 mb-md-4 px-lg-6"><?= $block["TITLE"] ?></h2>
                                <? if (!empty($block["TEXT"])) : ?>
                                    <p class="text-l px-lg-6 m-0"><?= $block["TEXT"] ?></p>
                                <? endif; ?>
                            </div>
                            <?= AnchorContent::render(
                                $block['~DETAIL_TEXT'],
                                $block['DISPLAY_PROPERTIES'],
                                $arParams['ELEMENT_ID'] ?? null,
                                $block['PARAMS']
                            ); ?>
                        </div>
                    </div>
                    <? if (!empty($block["IMG_PATH"])) : ?>
                        <picture class="pattern-bg pattern-bg--position-top">
                            <source srcset="/frontend/dist/<?= $block["IMG_PATH"] ?>-s.svg" media="(max-width: 767px)">
                            <source srcset="/frontend/dist/<?= $block["IMG_PATH"] ?>-m.svg" media="(max-width: 1199px)">
                            <img src="/frontend/dist/<?= $block["IMG_PATH"] ?>-l.svg" loading="lazy">
                        </picture>
                    <? endif ?>
                </section>
            <? endforeach ?>
        </div>
    <? endif ?>
<? endif ?>
