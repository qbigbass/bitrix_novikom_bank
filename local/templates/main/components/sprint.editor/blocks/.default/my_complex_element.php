<?php

/** @var $block array */

$result = [];

// Создаем ассоциативный массив для изображений
$images = [];
foreach ($block['img'] as $img) {
    $images[$img['uid']] = $img['imgPath'];
}

// Объединяем элементы с изображениями
foreach ($block['elements'] as $element) {
    $result[] = [
        'title' => $element['title'],
        'desc' => $element['desc'],
        'imgPath' => $images[$element['uid']] ?? '', // Используем оператор ?? для установки пустой строки, если изображение не найдено
    ];
}
?>
<section class="section-layout section-benefits">
    <div class="content-container">
        <div class="section-benefits__container">
            <h3 class="section-benefits__title headline-2">Преимущества</h3>
            <div class="a-collapsed-items js-a-collapsed-items" data-visible-items="4" data-rebuilding-mq="tablet" data-use-count="true">
                <div class="section-benefits__content">
                    <div class="benefit-cards-layout max-cols-2">
                        <? foreach ($result as $element) { ?>
                            <div class="a-collapsed-item js-a-collapsed-item">
                                <div class="benefit-text-card">
                                    <div class="benefit-text-card__icon">
                                        <img src="<?= $element['imgPath'] ?>" class="a-icon size-xxl" alt="<?= $element['title'] ?>" loading="lazy">
                                    </div>
                                    <h3 class="benefit-text-card__title headline-3"><?= $element['title'] ?></h3>
                                    <p class="benefit-text-card__description body-m-light"><?= $element['desc'] ?></p>
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
