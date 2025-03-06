<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<section class="pb-section pb-section--gradient position-relative z-1 py-xxl-16">
    <div class="container">
        <div class="d-flex flex-column row-gap-6 row-gap-lg-11">
            <h2 class="pb-section__title dark-0 text-center animate js-animation">
                <?= $arResult['NAME'] ?>
            </h2>
            <div class="pb-cards-grid">
                <?
                foreach ($arResult['ITEMS'] as $index => $item) :
                    ?>
                    <?
                    if ($index === 0) { ?>
                        <div class="pb-card-special pb-card-special--large pb-cards-grid__item animate js-animation">
                            <div class="d-flex flex-column row-gap-4">
                                <h3 class="pb-card-special__title"><?= $item['NAME'] ?></h3>
                                <div class="d-flex flex-column row-gap-4">
                                    <p class="pb-card-special__text"><?= $item['PREVIEW_TEXT'] ?></p>
                                    <div class="d-flex flex-column flex-md-row flex-grow-1 align-items-start row-gap-2">
                                        <?
                                        if (
                                            is_array($item['PROPERTIES']['LIST']['VALUE'])
                                            && !empty($item['PROPERTIES']['LIST']['VALUE'])
                                        ) {
                                            ?>
                                            <ul class="pb-list d-flex flex-column gap-3">
                                                <?
                                                foreach ($item['PROPERTIES']['LIST']['VALUE'] as $listItem) {
                                                    ?>
                                                    <li><?= $listItem ?></li>
                                                    <?
                                                }
                                                ?>
                                            </ul>
                                            <?
                                        }
                                        if ($item['PROPERTIES']['IMAGE']['VALUE']) {
                                            ?>
                                            <div class="pb-card-special__image">
                                                <img src="<?= \CFile::GetPath($item['PROPERTIES']['IMAGE']['VALUE']) ?>"
                                                     alt="<?= $item['NAME'] ?>">
                                            </div>
                                            <?
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?
                    } else { ?>
                        <div class="pb-card-special pb-cards-grid__item animate js-animation">
                            <div class="d-flex flex-column flex-md-row row-gap-2 col-gap-md-3">
                                <div class="d-flex flex-column align-items-start row-gap-4 row-gap-md-3">
                                    <h3 class="pb-card-special__title"><?= $item['NAME'] ?></h3>
                                    <p class="pb-card-special__text"><?= $item['PREVIEW_TEXT'] ?></p>
                                </div>
                                <?
                                if ($item['PROPERTIES']['IMAGE']['VALUE']) {
                                    ?>
                                    <div class="pb-card-special__image">
                                        <img src="<?= \CFile::GetPath($item['PROPERTIES']['IMAGE']['VALUE']) ?>"
                                             alt="<?= $item['NAME'] ?>" loading="lazy">
                                    </div>
                                    <?
                                }
                                ?>
                            </div>
                        </div>
                    <?
                    } ?>
                <?
                endforeach; ?>
            </div>
        </div>
    </div>
</section>

