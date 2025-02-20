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

$model = array_merge(
    $arResult['CONTENT_JSON'] ?? [],
    [
        'contact_phone' => $APPLICATION->GetProperty('contact_phone'),
        'contact_email' => $APPLICATION->GetProperty('contact_email'),
        'contact_address' => $APPLICATION->GetProperty('contact_address'),
        'online_bank_url' => $APPLICATION->GetProperty('online_bank_url'),
    ]
);
?>

<section class="pb-section-hero">
    <header class="pb-header animate js-animation-start" id="header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="col-8">
                    <a class="d-none d-lg-block" href="/"><img src="/frontend/dist/img/logo-pb.svg" width="280" height="80" alt="Новиком"></a>
                    <a class="d-lg-none" href="/"><img src="/frontend/dist/img/logo-pb-mob.svg" width="140" height="40" alt="Новиком"></a>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end gap-4"><a class="d-none d-lg-block btn btn-pb btn-pb--primary btn-pb--size-m js-scroll-to" href="#become-client">Стать клиентом</a>
                    <button class="pb-menu-btn js-pb-menu-btn" type="button"><span class="pb-menu-btn__icon"><span></span><span></span><span></span><span></span><span></span><span></span></span></button>
                </div>
            </div>
        </div>
    </header>
    <div class="pb-overlay js-pb-nav-menu d-none">
        <div class="pb-main-nav">
            <div class="pb-main-nav__wrapper container d-flex flex-column">
                <nav class="pb-nav d-flex flex-column align-items-center row-gap-4 row-gap-lg-6">
                    <?foreach ($model['main_nav'] as $item) : ?>
                        <a class="<?= $item['class'] ?>" href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                    <?endforeach;?>
                </nav>
                <div class="text-center d-lg-none">
                    <a class="btn btn-pb btn-pb--size-m-lg btn-pb--primary js-scroll-to" href="#become-client">Стать клиентом</a>
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
                                <a class="list-pb-contact__link" href="tel:+<?= preg_replace('/\D+/', '', $model['contact_phone']); ?>" data-phone="<?= $model['contact_phone'] ?>"><?= $model['contact_phone'] ?></a>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="icon size-m flex-shrink-0 dark-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                                    </svg>
                                </span>
                                <a class="list-pb-contact__link" href="emailto:<?= $model['contact_email'] ?>"><?= $model['contact_email'] ?></a>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="icon size-m flex-shrink-0 dark-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-bank"></use>
                                    </svg>
                                </span>
                                <span><?= $model['contact_address'] ?></span>
                            </li>
                        </ul>
                        <a class="btn btn-pb btn-pb--outline" href="/">Основной сайт Новиком</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="pb-section-hero__title dark-0 text-center animate js-animation-start">
            <?= $model['title'] ?>
        </h1>
    </div>
    <video class="pb-section-hero__video animate js-animation-start" autoplay="" loop="" muted="" poster="/frontend/dist/img/video-poster.jpg">
        <source src="/frontend/dist/img/video-background.mp4" type="video/mp4">
    </video>
    <div class="pb-section-hero__overlay"></div>
</section>
