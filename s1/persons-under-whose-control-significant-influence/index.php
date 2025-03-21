<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle("Информация о лицах, под контролем или значительным влиянием которых находится Банк");

use Dalee\Helpers\HeaderView;

$headerView = new HeaderView();
$headerView->render(
    $APPLICATION->GetTitle(),
    null,
    ['bg-linear-blue', 'border-green']
);
?>

<section class="section-layout bg-dark-10 px-lg-6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    Актуальная информация о структуре и составе акционеров (участников) финансовой организации, в том числе о лицах, под контролем либо значительным влиянием которых она находится, направлена в установленном порядке в Банк России.
                </div>
            </div>
        </div>
    </div>
</section>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_tabs.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_ads_customers.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_cross_sale.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_special_offers.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_news.php'); ?>

<? $APPLICATION->IncludeFile('/local/php_interface/include/block_contacts.php'); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
