<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle("Противодействие коррупции");

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
                    <h3>Памятка по направлению сообщений на «горячую линию» ГК «Ростех»</h3>
                    <p>
                        8 (800) 700 84 19<br>
                        8 (495) 287 25 87
                    </p>
                    <p>
                        119991, г. Москва, Гоголевский бульвар, 21
                    </p>
                    <p>
                        <a href="mailto:hotline@rostec.ru">hotline@rostec.ru</a><br>
                        с пометкой «На «Горячую линию»
                    </p>
                    <p>
                        «Горячая линия» - система сбора и обработки информации, направленная на своевременное выявление и предотвращение мошенничества, хищений и коррупции в Корпорации и ее организациях, и позволяющая работникам Корпорации и ее организаций, а также третьим лицам направлять сообщения о признаках и фактах мошенничества, хищений, коррупции.
                    </p>
                    <h3>Инструкция по использованию «горячей линии»:</h3>
                    <ol>
                        <li>Указать организацию Корпорации (если возможно указать функцию/подразделение организации/область деятельности), в которой произошло нарушение.</li>
                        <li>Дать характеристику нарушения и указать известные Вам факты.</li>
                        <li>Указать оценку возможного ущерба, иную дополнительную информацию.</li>
                        <li>Указать Ваше имя (по желанию).</li>
                        <li>Указать контактные данные (по желанию).</li>
                    </ol>
                    <h3>Исчерпывающий перечень случаев, рассматриваемых по «горячей линии»:</h3>
                    <ul>
                        <li>Мошенничество</li>
                        <li>Хищение или неправомерное использование имущества и активов</li>
                        <li>Получение взяток и «откатов»</li>
                        <li>Наличие конфликта интересов у работников Корпорации/организации Корпорации и контрагентов</li>
                        <li>Искажение бухгалтерской (финансовой) и управленческой отчетности</li>
                        <li>Незаконные финансовые операции</li>
                    </ul>
                    <p>
                        <a target="_blank" href="https://rostec.ru/upload/1_files/%D0%9F%D0%BE%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BE%20%D0%93%D0%BE%D1%80%D1%8F%D1%87%D0%B5%D0%B9%20%D0%9B%D0%B8%D0%BD%D0%B8%D0%B8_%D0%A0%D0%A2_2024.pdf">Положение о «Горячей линии» в области противодействия мошенничеству, хищениям и коррупции в Государственной корпорации «Ростех» и организациях Государственной корпорации «Ростех»</a>
                    </p><p></p>
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
