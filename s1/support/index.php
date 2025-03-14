<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION;
$APPLICATION->SetTitle('Поддержка');
?>
<section class="banner-text bg-linear-blue border-green">
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 position-relative z-1 mb-5 mb-md-0 pt-6 col-xxl-8">
                <div class="banner-text__content d-flex flex-column align-items-start gap-3 gap-lg-4">
                    <h1 class="banner-text__title dark-0 text-break">
                        <?= $APPLICATION->GetTitle(); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<section class="section-layout pt-lg-11 pb-0 bg-dark-10">
    <div class="container">
        <div class="row g-1 g-md-2 g-lg-2_5">
            <div class="col-12 col-md-6 col-lg-4">
                <a class="card-product card-product--transparent card-product--bg-white"
                   href="/support/very_important_information/">
                    <div class="card-product__inner">
                        <div class="card-product__content mw-100">
                            <h4 class="card-product__title">Очень важная информация</h4>
                        </div>
                        <div class="card-product__footer">
                            <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                <span>Подробнее</span>
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a class="card-product card-product--transparent card-product--bg-white"
                   href="/support/announcements_for_clients/">
                    <div class="card-product__inner">
                        <div class="card-product__content mw-100">
                            <h4 class="card-product__title">Объявления для клиентов</h4>
                        </div>
                        <div class="card-product__footer">
                            <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                <span>Подробнее</span>
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a class="card-product card-product--transparent card-product--bg-white"
                   href="/support/questions_and_answers/">
                    <div class="card-product__inner">
                        <div class="card-product__content mw-100">
                            <h4 class="card-product__title">Вопросы и ответы</h4>
                        </div>
                        <div class="card-product__footer">
                            <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                <span>Подробнее</span>
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/financial_literacy.php', [
    'LINK' => 'https://rostec.academy/novikom',
    'IS_TARGET_BLANK' => true
]); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/request_call.php'); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
