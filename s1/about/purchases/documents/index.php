<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Документы');
?>

<section class="banner-text bg-linear-blue border-green">
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 col-sm-6 col-md-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                <div class="banner-text__content d-flex flex-column align-items-start gap-3 gap-lg-4">

                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "",
                        [
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => 1
                        ]
                    );
                    ?>

                    <h1 class="banner-text__title dark-0 text-break"><?= $APPLICATION->GetTitle() ?></h1>
                </div>
            </div>
            <div class="d-none d-sm-block col-12 col-sm-6 col-md-4">
                <img class="banner-text__image position-relative w-auto float-end"
                     src="/frontend/dist/img/big-illustrations/large-individual/individual-documents.png" alt=""
                     loading="lazy">
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<section class="section-layout py-lg-11 pb-lg-0 px-lg-6">
    <div class="container">
        <div class="rte rte--w-xxl-60 px-lg-6 mb-6 mb-lg-7">

                <? $APPLICATION->IncludeFile('/about/purchases/documents/include_text.php'); ?>

        </div><br>
        <div class="polygon-container js-polygon-container">
            <div class="polygon-container__content">
                <div class="helper bg-dark-10">
                    <div
                        class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                        <img class="helper__image w-auto float-end"
                             src="/frontend/dist/img/restructuring-additional-info.png" alt="Обратите внимание">

                        <? $APPLICATION->IncludeFile('/about/purchases/documents/include_quote.php'); ?>

                    </div>
                </div>
            </div>
            <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-dasharray="10"></polygon>
                </svg>
            </div>
        </div>
    </div>
</section>
<section class="section-layout py-lg-11 px-lg-6">
    <div class="container">
        <div class="row">


        </div>
    </div>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts.php'); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
