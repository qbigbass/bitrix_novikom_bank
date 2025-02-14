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
?>
<section class="pb-section-hero">
    <header class="pb-header animate js-animation-start" id="header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="col-8">
                    <a class="d-none d-lg-block" href="/private-banking/"><img src="/frontend/dist/img/logo-pb.svg" width="280" height="80" alt="Новиком"></a>
                    <a class="d-lg-none" href="/private-banking/"><img src="/frontend/dist/img/logo-pb-mob.svg" width="140" height="40" alt="Новиком"></a>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end gap-4">
                    <button class="d-none d-lg-block btn btn-pb btn-pb--primary btn-pb--size-m" type="button" data-bs-toggle="modal" data-bs-target="#modal-become-client" aria-label="Стать клиентом">Стать клиентом</button>
                    <button class="pb-menu-btn js-pb-menu-btn" type="button"><span class="pb-menu-btn__icon"><span></span><span></span><span></span><span></span><span></span><span></span></span></button>
                </div>
            </div>
        </div>
    </header>
    <div class="pb-overlay js-pb-nav-menu d-none">
        <div class="pb-main-nav">
            <div class="pb-main-nav__wrapper container d-flex flex-column">
                <nav class="pb-nav d-flex flex-column align-items-center row-gap-4 row-gap-lg-6">
                    <a class="pb-nav__link" href="/private-banking/">Главная</a>
                    <a class="pb-nav__link" href="/private-banking/services/investment/brokerskoe-obsluzhivanie/">Инвестиционные услуги</a>
                    <a class="pb-nav__link" href="/private-banking/cards/mir-supreme-card/">Карта Мир Supreme</a>
                    <a class="btn btn-pb btn-pb--outline d-none d-lg-inline-block" href="/online/">Онлайн-банк</a>
                </nav>
                <div class="text-center d-lg-none">
                    <button class="btn btn-pb btn-pb--primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-become-client" aria-label="Стать клиентом">Стать клиентом</button>
                </div>
                <div class="mt-auto pt-7 pt-lg-0">
                    <div class="pb-card-contact d-flex flex-column row-gap-4 row-gap-lg-5 align-items-lg-center">
                        <ul class="list-pb-contact d-flex flex-column flex-lg-row justify-content-xl-between flex-wrap gap-4">
                            <li class="d-flex align-items-center">
                                <span class="icon size-m flex-shrink-0 dark-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                    </svg>
                                </span>
                                <a class="list-pb-contact__link" href="tel:+78002507007">+7 (800) 250-70-07</a>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="icon size-m flex-shrink-0 dark-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                                    </svg>
                                </span>
                                <a class="list-pb-contact__link" href="emailto:vip@novikom.ru">vip@novikom.ru</a>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="icon size-m flex-shrink-0 dark-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-bank"></use>
                                    </svg>
                                </span>
                                <span>Москва, округ Якиманка, наб. Якиманская, д.&nbsp;2</span>
                            </li>
                        </ul><a class="btn btn-pb btn-pb--outline" href="/">Основной сайт Новиком</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="pb-section__title dark-0 text-center my-4 animate js-animation">
            <?= $arResult['SECTION']['NAME'] ?>
        </h3>
        <div class="swiper pb-tags-wrapper animate js-animation js-pb-tabs-slider">
            <ul class="nav nav-pills swiper-wrapper d-md-flex flex-md-wrap flex-md-row gap-md-3 justify-content-md-center" id="pills-tab" role="tablist">
                <?php foreach ($arResult['MENU_ELEMENTS'] as $arItem) : ?>
                    <li class="nav-item swiper-slide w-auto" role="presentation">
                        <a
                            href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                            class="pb-tags <?= $arResult['ID'] === $arItem['ID'] ? 'active' : ''; ?>"
                            aria-controls="brokerage-services"
                            <?= $arResult['ID'] === $arItem['ID'] ? 'aria-selected' : ''; ?>
                        >
                            <?= $arItem['NAME'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="pb-section-hero__overlay pb-section-hero__overlay--size-small"></div>
</section>

<section class="pb-section pb-section--bg-lines">
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active">
                <h2 class="pb-section__title pb-section__title--size-small dark-0 mb-6 ps-xxl-6 animate js-animation">
                    <?= $arResult['NAME'] ?>
                </h2>
                <div class="d-flex flex-column row-gap-6">
                    <?= $arResult['DETAIL_TEXT'] ?>
                    <?php if (!empty($arResult['PROPERTIES']['INFODOCS']['VALUE'])) : ?>
                        <div class="d-flex flex-column row-gap-6 pt-6 pb-additional-info animate js-animation">
                            <h3 class="pb-additional-info__title dark-0 ps-xxl-6">Информация и&nbsp;документы</h3>
                            <div class="accordion pb-accordion" id="accordion-additional-info">
                                <?php foreach ($arResult['PROPERTIES']['INFODOCS']['~VALUE'] as $index => $arItem) : ?>
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $index ?>" aria-controls="<?= $index ?>">
                                                <span><?= $arResult['PROPERTIES']['INFODOCS']['DESCRIPTION'][$index] ?></span>
                                            </button>
                                        </div>
                                        <div class="accordion-collapse collapse" id="<?= $index ?>" data-bs-parent="#accordion-additional-info">
                                            <div class="accordion-body">
                                                <div class="col-12 col-xxl-8 rte rte--accordion">
                                                    <?= $arItem['TEXT'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
