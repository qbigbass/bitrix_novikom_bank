<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
$this->setFrameMode(true);

$pbModel = $arResult['CONTENT_JSON'] ?? null;

?>
<section class="pb-section pb-section--gradient position-relative z-1 py-xxl-16">
    <div class="container">
        <div class="d-flex flex-column row-gap-6 row-gap-lg-11">
            <h2 class="pb-section__title dark-0 text-center animate js-animation">
                <?= $pbModel['title'] ?>
            </h2>
            <div class="pb-cards-grid">
                <?foreach ($pbModel['items'] as $index => $item) : ?>
                    <?if ($index === 0) : ?>
                        <div class="pb-card-special pb-card-special--large pb-cards-grid__item animate js-animation">
                            <div class="d-flex flex-column row-gap-4">
                                <h3 class="pb-card-special__title"><?= $item['title'] ?></h3>
                                <div class="d-flex flex-column row-gap-4">
                                    <p class="pb-card-special__text"><?= $item['text'] ?></p>
                                    <div class="d-flex flex-column flex-md-row flex-grow-1 align-items-start row-gap-2">
                                        <ul class="pb-list d-flex flex-column gap-3">
                                            <?foreach ($item['list'] as $li) : ?>
                                                <li><?= $li ?></li>
                                            <?endforeach;?>
                                        </ul>
                                        <div class="pb-card-special__image"><img src="/frontend/dist/img/bank01.png" alt="Персональное сопровождение"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?else : ?>
                        <div class="pb-card-special pb-cards-grid__item animate js-animation">
                            <div class="d-flex flex-column flex-md-row row-gap-2 col-gap-md-3">
                                <div class="d-flex flex-column align-items-start row-gap-4 row-md-gap-3">
                                    <h3 class="pb-card-special__title"><?= $item['title'] ?></h3>
                                    <p class="pb-card-special__text"><?= $item['text'] ?></p>
                                </div>
                                <div class="pb-card-special__image"><img src="<?= $item['image'] ?>" alt="Вклады" loading="lazy"></div>
                            </div>
                        </div>
                    <?endif;?>
                <?endforeach;?>
            </div>
        </div>
    </div>
</section>
