<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Контакты банка Новиком');
?>
<section class="banner-text bg-linear-blue border-green">
    <div class="container banner-text__container position-relative z-2">
        <div class="row ps-lg-6">
            <div class="col-12 col-xxl-8 position-relative z-1 mb-6 mb-md-0 pt-6">
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
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top banner-text__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_tabs.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_ads_customers.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_special_offers.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts.php'); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
