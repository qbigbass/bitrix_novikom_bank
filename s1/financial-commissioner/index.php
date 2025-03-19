<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle("Информация о праве физических лиц - потребителей финансовых услуг на направление обращения финансовому уполномоченному");

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
                    <p>С 1 января 2021 года действует новый досудебный порядок урегулирования споров потребителей с кредитными
                        организациями.</p>
                    <p>В случае если кредитная организация отказывается удовлетворить требования потребителя, до обращения в суд
                        потребитель для урегулирования спора должен обратиться к финансовому уполномоченному.</p>
                    <p>Должность финансового уполномоченного учреждена Федеральным законом от 4 июня 2018 года № 123-ФЗ
                        «Об уполномоченном по правам потребителей финансовых услуг» (далее – Закон).</p>
                    <p>Финансовый уполномоченный рассматривает имущественные требования потребителя, размер которых не
                        превышает 500000 рублей.</p>
                    <p>Обращение потребителя финансовому уполномоченному может быть направлено в электронной форме через
                        <a target="_blank" href="https://finombudsman.ru/lk/login">личный кабинет</a> на официальном сайте
                        финансового уполномоченного или в письменной форме.</p>
                    <p>Прием и рассмотрение обращений потребителей осуществляется финансовым уполномоченным бесплатно.</p>
                    <p>До направления обращения финансовому уполномоченному потребитель должен обратиться с
                        заявлением - претензией в кредитную организацию. Данный претензионный порядок установлен статьей 16 Закона
                        и является обязательным для потребителей.</p>
                    <p>С подробной информацией о порядке направления обращения финансовому уполномоченному можно ознакомиться
                        на <a target="_blank" href="https://finombudsman.ru/">официальном сайте</a> финансового уполномоченного.</p>
                    <p>Официальный сайт финансового уполномоченного: <a target="_blank" href="https://finombudsman.ru/">finombudsman.ru</a></p>
                    <p>Номер телефона службы обеспечения деятельности финансового уполномоченного: 8 (800) 200-00-10
                        (бесплатный звонок по России).</p>
                    <p>Место нахождения службы обеспечения деятельности финансового уполномоченного: 119017, г. Москва,
                        Старомонетный переулок, дом 3.</p>
                    <p>Почтовый адрес службы обеспечения деятельности финансового уполномоченного: 119017, г. Москва,
                        Старомонетный переулок, дом 3, получатель АНО «СОДФУ».</p>
                    <p><a target="_blank" href="/upload/broshyura-dlya-elektronnogo-razmeshcheniya.pdf">Брошюра о финансовом уполномоченном</a></p>
                    <p><a target="_blank" href="https://finombudsman.ru/wp-content/uploads/2020/12/Videorolik-o-finansovom-upolnomochennom.mp4">Видеоролик о финансовом уполномоченном</a></p>
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
