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
                <div class="col-8"><a class="d-none d-lg-block" href="#"><img src="/frontend/dist/img/logo-pb.svg" width="280" height="80" alt="Новиком"></a><a class="d-lg-none" href="#"><img src="/frontend/dist/img/logo-pb-mob.svg" width="140" height="40" alt="Новиком"></a></div>
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
                    <a class="pb-nav__link" href="/private-banking/mir-supreme-card/">Карта Мир Supreme</a>
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
                                <?/*
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-controls="1">
                                            <span>Информация для получателей финансовых услуг</span>
                                        </button>
                                    </div>
                                    <div class="accordion-collapse collapse" id="1" data-bs-parent="#accordion-additional-info">
                                        <div class="accordion-body">
                                            <div class="col-12 col-xxl-8 rte rte--accordion">
                                                <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                                <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                                <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                                <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                                <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                                <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                                <ol>
                                                    <li>В&nbsp;банк
                                                        <ul>
                                                            <li>в свободной письменной форме или по форме Банка
                                                                <ul>
                                                                    <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                    <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                                </ul>
                                                            </li>
                                                            <li>в электронном виде
                                                                <ul>
                                                                    <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                    <li>сообщением по следующим электронным адресам Банка:
                                                                        <ul>
                                                                            <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                            <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>В НАУФОР
                                                        <ul>
                                                            <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                            <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                        </ul>
                                                    </li>
                                                    <li>В банк России
                                                        <ul>
                                                            <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                            <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                        </ul>
                                                    </li>
                                                </ol>
                                                <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                                <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                                <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-controls="2">
                                            <span>Информация для получателей финансовых услуг</span>
                                        </button>
                                    </div>
                                    <div class="accordion-collapse collapse" id="2" data-bs-parent="#accordion-additional-info">
                                        <div class="accordion-body">
                                            <div class="col-12 col-xxl-8 rte rte--accordion">
                                                <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                                <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                                <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                                <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                                <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                                <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                                <ol>
                                                    <li>В&nbsp;банк
                                                        <ul>
                                                            <li>в свободной письменной форме или по форме Банка
                                                                <ul>
                                                                    <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                    <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                                </ul>
                                                            </li>
                                                            <li>в электронном виде
                                                                <ul>
                                                                    <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                    <li>сообщением по следующим электронным адресам Банка:
                                                                        <ul>
                                                                            <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                            <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>В НАУФОР
                                                        <ul>
                                                            <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                            <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                        </ul>
                                                    </li>
                                                    <li>В банк России
                                                        <ul>
                                                            <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                            <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                        </ul>
                                                    </li>
                                                </ol>
                                                <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                                <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                                <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-controls="3"><span>Полезные материалы</span>
                                        </button>
                                    </div>
                                    <div class="accordion-collapse collapse" id="3" data-bs-parent="#accordion-additional-info">
                                        <div class="accordion-body">
                                            <div class="col-12 col-xxl-8 rte rte--accordion">
                                                <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                                <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                                <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                                <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                                <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#4" aria-controls="4"><span>Уведомления</span>
                                        </button>
                                    </div>
                                    <div class="accordion-collapse collapse" id="4" data-bs-parent="#accordion-additional-info">
                                        <div class="accordion-body">
                                            <div class="col-12 col-xxl-8 rte rte--accordion">
                                                <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                                <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                                <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                                <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                                <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#5" aria-controls="5"><span>Тарифы и&nbsp;документы</span>
                                        </button>
                                    </div>
                                    <div class="accordion-collapse collapse" id="5" data-bs-parent="#accordion-additional-info">
                                        <div class="accordion-body">
                                            <div class="col-12 col-xxl-8 rte rte--accordion">
                                                <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                                <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                                <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                                <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                                <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                */?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?/*
            <div class="tab-pane fade show active" id="brokerage-services" role="tabpanel" aria-labelledby="brokerage-services" tabindex="0">
                <h2 class="pb-section__title pb-section__title--size-small dark-0 mb-6 animate js-animation">Брокерское обслуживание</h2>
                <div class="d-flex flex-column row-gap-6">
                    <div class="d-flex flex-column row-gap-4 row-gap-md-6">
                        <div class="pb-card-about pb-card-about--wide animate js-animation">
                            <div class="d-flex flex-column row-gap-3">
                                <p class="pb-card-about__text">Клиенты банка Новиком могут совершать сделки как на организованном рынке ценных бумаг (ПАО Московская биржа), так и на внебиржевом рынке, а также участвовать в первичных размещениях бумаг.</p>
                            </div>
                            <div class="pb-card-about__image mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/brokerage-1.png"></div>
                        </div>
                        <div class="pb-cards-grid">
                            <div class="pb-card-about pb-cards-grid__item animate js-animation pb-card-about--big">
                                <div class="d-flex flex-column row-gap-3">
                                    <h3 class="pb-card-about__title">Лучшие цены</h3>
                                    <p class="pb-card-about__text">Услуги профессионального участника рынка ценных бумаг, предоставляемые банком, также включают в себя депозитарные услуги с поиском лучшей цены исполнения заявки при недостаточной ликвидности ценной бумаги в биржевом стакане</p>
                                </div>
                                <div class="pb-card-about__image mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/brokerage-2.png" alt="Лучшие цены"></div>
                            </div>
                            <div class="pb-card-about pb-cards-grid__item animate js-animation">
                                <div class="d-flex flex-column row-gap-3">
                                    <h3 class="pb-card-about__title">QUIK</h3>
                                    <p class="pb-card-about__text">Торговый терминал QUIK — один из самых удобных и популярных инструментов</p>
                                </div>
                                <div class="pb-card-about__image mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/brokerage-3.png" alt="QUIK"></div>
                            </div>
                            <div class="pb-card-about pb-cards-grid__item animate js-animation">
                                <div class="d-flex flex-column row-gap-3">
                                    <h3 class="pb-card-about__title">Консультации</h3>
                                    <p class="pb-card-about__text">Профессиональные консультации экспертов Новикома о конъюнктуре рынка</p>
                                </div>
                                <div class="pb-card-about__image mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/brokerage-4.png" alt="Консультации"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-panel-info d-flex flex-column flex-md-row gap-3 gap-md-4 gap-xl-6 align-items-start align-items-md-center animate js-animation"><img class="pb-panel-info__image flex-shrink-0" src="/frontend/dist/img/pb-images/icon-info.png" alt="иконка информации">
                        <div class="pb-panel-info__content">
                            <p class="pb-panel-info__text">Банк информирует Клиентов о необходимости ознакомиться с Декларацией о рисках, являющейся обязательным приложением к Регламенту оказания брокерских услуг на финансовых рынках (далее — Регламент), до заключения договора на брокерское обслуживание. Депозитарные услуги предоставляются банком Клиенту на основании заключённого между ними договора счёта депо в порядке, предусмотренном Регламентом депозитарного обслуживания.</p>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-9 ps-xxl-6 pe-xxl-6 rte animate js-animation">
                        <p>Услуги, оказываемые банком в рамках Регламента, не являются услугами по открытию банковских счётов и приёму вкладов. Денежные средства, передаваемые по договору о брокерском обслуживании, не подлежат страхованию в соответствии с Федеральным законом от 23.12.2003 года № 177-ФЗ «О страховании вкладов физических лиц в банках Российской Федерации».</p>
                    </div>
                    <div class="d-flex flex-column row-gap-6 pt-6 pb-additional-info animate js-animation">
                        <h3 class="pb-additional-info__title dark-0 ps-xxl-6">Информация и&nbsp;документы</h3>
                        <div class="accordion pb-accordion" id="accordion-additional-info">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-controls="1"><span>Информация для получателей финансовых услуг</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="1" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-controls="2"><span>Информация для получателей финансовых услуг</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="2" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-controls="3"><span>Полезные материалы</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="3" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#4" aria-controls="4"><span>Уведомления</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="4" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#5" aria-controls="5"><span>Тарифы и&nbsp;документы</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="5" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="trust-management" role="tabpanel" aria-labelledby="trust-management" tabindex="0">
                <h2 class="pb-section__title pb-section__title--size-small dark-0 mb-6 animate js-animation">Доверительное управление</h2>
                <div class="d-flex flex-column row-gap-6">
                    <div class="d-flex flex-column row-gap-4 row-gap-md-6">
                        <div class="pb-card-about pb-card-about--wide animate js-animation">
                            <div class="d-flex flex-column row-gap-3">
                                <p class="pb-card-about__text">Команда профессиональных управляющих банка Новиком поможет эффективно разместить ваши свободные денежные средства. Вам не придётся самостоятельно анализировать состояние финансовых рынков, отраслей, ценных бумаг, выбирать момент для совершения сделок по покупке или продаже ценных бумаг.</p>
                            </div>
                            <div class="pb-card-about__image pb-card-about__image--size-medium mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/trust-1.png" alt=""></div>
                        </div>
                        <div class="pb-card-about pb-card-about--wide animate js-animation">
                            <div class="d-flex flex-column row-gap-3 row-gap-md-4 align-self-start">
                                <p class="pb-card-about__text">Банк Новиком разрабатывает уникальные инвестиционные предложения  по вашим предпочтениям. Мы учитываем такие критерии, как:</p>
                                <ul class="pb-list d-flex flex-column row-gap-2 row-gap-3">
                                    <li>ликвидность</li>
                                    <li>горизонт инвестирования</li>
                                    <li>риски</li>
                                    <li>доходность</li>
                                </ul>
                            </div>
                            <div class="pb-card-about__image pb-card-about__image--size-large mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/trust-2.png" alt=""></div>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-9 ps-xxl-6 pe-xxl-6 rte animate js-animation">
                        <p>Наряду с индивидуальными стратегиями доверительного управления банк Новиком предлагает стандартные инвестиционные стратегии.</p>
                    </div>
                    <div class="pb-panel-info d-flex flex-column flex-md-row gap-3 gap-md-4 gap-xl-6 align-items-start align-items-md-center animate js-animation"><img class="pb-panel-info__image flex-shrink-0" src="/frontend/dist/img/pb-images/icon-info.png" alt="иконка информации">
                        <div class="pb-panel-info__content">
                            <p class="pb-panel-info__text">Банк предоставляет Клиентам услуги по управлению ценными бумагами, а также денежными средствами, предназначенными для инвестирования в ценные бумаги, иные услуги за вознаграждение в порядке и на условиях Регламента доверительного управления активами.</p>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-9 ps-xxl-6 pe-xxl-6 rte animate js-animation">
                        <p>Приведённый список услуг банка не&nbsp;является исчерпывающим. В&nbsp;случаях, предусмотренных Законодательством, Правилами Торговых систем, банк осуществляет иные юридические и&nbsp;фактические действия в&nbsp;интересах Клиентов, в&nbsp;том числе путём заключения Дополнительных соглашений.</p>
                        <p>Банк информирует Клиентов о необходимости ознакомиться с Декларацией о рисках, являющейся обязательным приложением к Регламенту, до заключения договора о доверительном управлении активами.</p>
                        <p>Оказываемые банком услуги по управлению активами, предусмотренные Регламентом, несут для Клиента риск потери инвестируемых средств в связи с тем, что денежные средства Клиента, передаваемые в банк в рамках Услуг банка, не застрахованы в соответствии с Федеральным законом от 23.12.2003 года № 177-ФЗ «О страховании вкладов физических лиц в банках Российской Федерации». Поставщиком услуг является Акционерный Коммерческий банк «НОВИКОМБАНК» акционерное общество. Оказываемые банком услуги, предусмотренные Регламентом, не являются услугами по открытию банковских счётов и приёму вкладов.</p>
                    </div>
                    <div class="d-flex flex-column row-gap-6 pt-6 pb-additional-info animate js-animation">
                        <h3 class="pb-additional-info__title dark-0 ps-xxl-6">Перечень стандартных инвестиционных стратегий</h3>
                        <div class="accordion pb-accordion" id="accordion-additional-info">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-controls="1"><span>Информация для получателей финансовых услуг</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="1" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-controls="2"><span>Облигации</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="2" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-controls="3"><span>Акции</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="3" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#4" aria-controls="4"><span>Уведомления</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="4" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#5" aria-controls="5"><span>Тарифы и&nbsp;документы</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="5" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="depository-services" role="tabpanel" aria-labelledby="depository-services" tabindex="0">
                <h2 class="pb-section__title pb-section__title--size-small dark-0 mb-6 animate js-animation">Депозитарное обслуживание</h2>
                <div class="d-flex flex-column row-gap-6">
                    <div class="d-flex flex-column row-gap-4 row-gap-md-6">
                        <div class="pb-card-about pb-card-about--wide animate js-animation">
                            <div class="d-flex flex-column row-gap-3">
                                <p class="pb-card-about__text">Банк Новиком предоставляет юридическим и физическим лицам широкий спектр депозитарных услуг.</p>
                                <p class="pb-card-about__text">Депозитарные услуги предоставляются на основании заключённого договора счета депо в порядке, предусмотренном Регламентом депозитарного обслуживания депонентов АО АКБ «НОВИКОМБАНК» (условия осуществления депозитарной деятельности).</p>
                            </div>
                            <div class="pb-card-about__image pb-card-about__image--size-medium mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/depository-1.png" alt=""></div>
                        </div>
                        <div class="pb-card-about pb-card-about--wide animate js-animation">
                            <div class="d-flex flex-column row-gap-3 row-gap-md-4 align-self-start">
                                <h3 class="pb-card-about__title">Основные депозитарные услуги</h3>
                                <ul class="pb-list d-flex flex-column row-gap-2 row-gap-md-3">
                                    <li>открытие и ведение счётов депо</li>
                                    <li>хранение и учёт ценных бумаг</li>
                                    <li>проведение операций с ценными бумагами по счетам депо (поставка или получение, свободное от платежа, поставка или получение против платежа)</li>
                                    <li>услуги, содействующие реализации клиентами Депозитария прав по ценным бумагам, включая получение и последующее перечисление выплат по ценным бумагам, которые учитываются на счетах депо клиентов</li>
                                    <li>фиксация обременения и (или) ограничения распоряжения ценными бумагами / прекращения обременения и (или) ограничения распоряжения ценными бумагами</li>
                                    <li>консультации по вопросам проведения операций по счетам депо</li>
                                    <li>иные операции в рамках требований законодательства Российской Федерации, Регламента.</li>
                                </ul>
                            </div>
                            <div class="pb-card-about__image pb-card-about__image--size-large mt-auto mt-md-0 align-self-xl-end"><img src="/frontend/dist/img/pb-images/pb-cards/depository-2.png" alt=""></div>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-9 ps-xxl-6 pe-xxl-6 rte animate js-animation">
                        <h3>Банк Новиком располагает счетами в&nbsp;крупнейших депозитариях и&nbsp;регистраторах</h3>
                        <ul>
                            <li>Небанковская кредитная организация акционерное общество «Национальный расчетный депозитарий»</li>
                            <li>Акционерное общество «Независимая регистраторская компания Р.О.С.Т.»</li>
                            <li>Акционерное общество«Реестр»</li>
                        </ul>
                    </div>
                    <div class="pb-panel-info d-flex flex-column flex-md-row gap-3 gap-md-4 gap-xl-6 align-items-start align-items-md-center animate js-animation"><img class="pb-panel-info__image flex-shrink-0" src="/frontend/dist/img/pb-images/icon-info.png" alt="иконка информации">
                        <div class="pb-panel-info__content">
                            <p class="pb-panel-info__text">Банк информирует получателей финансовых услуг о необходимости до заключения договора счета депо ознакомиться с Регламентом, являющимся неотъемлемой частью договора счета депо.</p>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-9 ps-xxl-6 pe-xxl-6 rte animate js-animation">
                        <p>В случае возникновения вопросов, ответы на которые не удалось найти на страницах нашего сайта, вы можете обратиться за профессиональной консультацией к сотрудникам банка.</p>
                    </div>
                    <div class="d-flex flex-column row-gap-6 pb-additional-info animate js-animation">
                        <div class="accordion pb-accordion" id="accordion-additional-info">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-controls="1"><span>Информация для получателей финансовых услуг</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="1" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-controls="2"><span>Облигации</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="2" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-controls="3"><span>Акции</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="3" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#4" aria-controls="4"><span>Уведомления</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="4" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#5" aria-controls="5"><span>Тарифы и&nbsp;документы</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="5" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="investment-consulting" role="tabpanel" aria-labelledby="investment-consulting" tabindex="0">
                <h2 class="pb-section__title pb-section__title--size-small dark-0 mb-6 animate js-animation">Инвестиционное консультирование</h2>
                <div class="d-flex flex-column row-gap-6">
                    <div class="d-flex flex-column row-gap-4 row-gap-md-6">
                        <div class="pb-card-about pb-card-about--wide animate js-animation">
                            <div class="d-flex flex-column row-gap-3">
                                <p class="pb-card-about__text">АО АКБ «НОВИКОМБАНК», выступая в качестве инвестиционного советника, предлагает физическим лицам — квалифицированным инвесторам услуги инвестиционного консультирования для заключения ими сделок в рамках договоров на брокерское обслуживание.</p>
                            </div>
                            <div class="pb-card-about__image pb-card-about__image--size-medium mt-auto mt-md-0"><img src="/frontend/dist/img/pb-images/pb-cards/investment-1.png" alt=""></div>
                        </div>
                        <div class="pb-card-about pb-card-about--wide animate js-animation">
                            <div class="d-flex flex-column row-gap-3 row-gap-md-4 align-self-start">
                                <h3 class="pb-card-about__title">АО АКБ «НОВИКОМБАНК» предлагает</h3>
                                <ul class="pb-list d-flex flex-column row-gap-2 row-gap-md-3">
                                    <li>Предоставление индивидуальных инвестиционных рекомендаций (ИИР) в рамках Договора инвестиционного консультирования</li>
                                    <li>Составление ИИР с учётом инвестиционных целей Клиента</li>
                                    <li>Мониторинг инвестиционного портфеля на соответствие инвестиционному профилю Клиента</li>
                                </ul>
                            </div>
                            <div class="pb-card-about__image pb-card-about__image--size-large mt-auto mt-md-0 align-self-xl-end"><img src="/frontend/dist/img/pb-images/pb-cards/investment-2.png" alt=""></div>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-9 ps-xxl-6 pe-xxl-6 rte animate js-animation">
                        <p>Услуги инвестиционного консультирования оказываются физическим лицам — квалифицированным инвесторам на условиях Регламента оказания услуг инвестиционного консультирования (далее — Регламент).</p>
                    </div>
                    <div class="pb-panel-info d-flex flex-column flex-md-row gap-3 gap-md-4 gap-xl-6 align-items-start align-items-md-center animate js-animation"><img class="pb-panel-info__image flex-shrink-0" src="/frontend/dist/img/pb-images/icon-info.png" alt="иконка информации">
                        <div class="pb-panel-info__content">
                            <p class="pb-panel-info__text">Банк информирует Клиентов о необходимости ознакомиться с Декларацией о рисках, связанных с исполнением инвестиционного консультирования, являющейся приложением к Регламенту, до заключения договора инвестиционного консультирования.</p>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-9 ps-xxl-6 pe-xxl-6 rte animate js-animation">
                        <p>Банк внесён 26.04.2022г. в Единый реестр инвестиционных советников банка России в соответствии с требованиями Федерального закона № 397-ФЗ «О внесении изменений в Федеральный закон „О рынке ценных бумаг“ от 20.12.2017 г.</p>
                    </div>
                    <div class="d-flex flex-column row-gap-6 pb-additional-info animate js-animation">
                        <div class="accordion pb-accordion" id="accordion-additional-info">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-controls="1"><span>Информация для получателей финансовых услуг</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="1" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-controls="2"><span>Облигации</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="2" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                            <p><span class="text-big">Направление обращений и жалоб</span><br><span class="text-tiny">Клиент имеет право направить обращение или жалобу:</span></p>
                                            <ol>
                                                <li>В&nbsp;банк
                                                    <ul>
                                                        <li>в свободной письменной форме или по форме Банка
                                                            <ul>
                                                                <li>передать в&nbsp;Банк лично или уполномоченным представителем;</li>
                                                                <li>почтовой/курьерской связью по адресу Банка: 119180, г. Москва, ул. Полянка Большая, д. 50/1, стр. 1 или по месту нахождения регионального офиса Банка (информация об адресах офисов Банка – в разделе «Офисы и банкоматы» на сайте Банка).</li>
                                                            </ul>
                                                        </li>
                                                        <li>в электронном виде
                                                            <ul>
                                                                <li>через форму Обратной связи на&nbsp;официальном сайте Банка, вкладка &laquo;Направить обращение&raquo;;</li>
                                                                <li>сообщением по следующим электронным адресам Банка:
                                                                    <ul>
                                                                        <li><a href="mailto:call-center@novikom.ru">call-center@novikom.ru</a> — для обращений не претензионного характера;</li>
                                                                        <li><a href="mailto:oro@novikom.ru">oro@novikom.ru</a> — для обращений претензионного характера.</li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>В НАУФОР
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 129090, Москва, 1-й Коптельский пер., д.&nbsp;18, стр.1;</li>
                                                        <li>через <a hrf="#" target="_blank">сайт НАУФОР</a> в&nbsp;раздел &laquo;Пожаловаться на&nbsp;члена НАУФОР&raquo;.</li>
                                                    </ul>
                                                </li>
                                                <li>В банк России
                                                    <ul>
                                                        <li>почтовым отправлением по&nbsp;адресу: 107016, Москва, ул. Неглинная, д.&nbsp;12, Банк России;</li>
                                                        <li>иные способы: <a href="www.cbr.ru/contacts" target="_blank">www.cbr.ru/contacts</a></li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p><span class="text-big">Способы защиты прав получателя финансовых услуг и&nbsp;разрешения споров</span><br><span class="text-tiny">Банк оказывает услуги в соответствии с Федеральным законом «О защите прав и законных интересов инвесторов на рынке ценных бумаг» от 05 марта 1999 года № 46-ФЗ.<br>Все споры и разногласия между банком и Клиентом разрешаются путём переговоров, а в случае невозможности такого разрешения все споры решаются в соответствии с Регламентом.<br>Контактные телефоны: 8 800 250-70-07, +7 495 974-71-87.</span></p>
                                            <p><span class="text-big">Порядок получения финансовой услуги</span><br><span class="text-tiny">Порядок получения финансовых услуг, в том числе документы, которые должны быть предоставлены получателем финансовых услуг для её получения, изложены в Регламенте.</span></p>
                                            <p><span class="text-big">Изменения условия договора брокерского обслуживания</span><br><span class="text-tiny">Внесение изменений и/или дополнений в Регламент и приложения к нему производится банком в соответствии с условиями Регламента.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-controls="3"><span>Акции</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="3" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#4" aria-controls="4"><span>Уведомления</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="4" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#5" aria-controls="5"><span>Тарифы и&nbsp;документы</span>
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="5" data-bs-parent="#accordion-additional-info">
                                    <div class="accordion-body">
                                        <div class="col-12 col-xxl-8 rte rte--accordion">
                                            <p><span class="text-small">Полное и&nbsp;сокращенное фирменное наименование Банка</span><br>Акционерный Коммерческий Банк &laquo;НОВИКОМБАНК&raquo; акционерное общество АО&nbsp;АКБ &laquo;НОВИКОМБАНК&raquo;</p>
                                            <p><span class="text-small">Адрес Банка</span><br>119180, г. Москва, ул. Полянка Большая, д. 50/1, стр.&nbsp;1</p>
                                            <p><span class="text-small">Адрес офиса Банка, оказывающего услуги по&nbsp;брокерскому обслуживанию</span><br>119180, город Москва, вн.тер.г. муниципальный округ Якиманка, наб. Якиманская, д.&nbsp;2</p>
                                            <p><span class="text-small">Контакты</span><br>Адреса электронной почты:&nbsp;<a class="text-decoration-underline" href="mailto:office@novikom.ru">office@novikom.ru</a><br>Контактные телефоны:&nbsp;<a class="text-decoration-none" href="tel:+78002507007">+7 (800) 250-70-07,</a><a class="text-decoration-none" href="tel:+74959747187">+7 (495) 974-71-87</a><br>Сайт: <a href="https://novikom.ru">novikom.ru</a></p>
                                            <p><span class="text-small">Лицензия профессионального участника рынка ценных бумаг на&nbsp;осуществление брокерской деятельности</span><br>&#8470;&nbsp;177-06439-100000, дата выдачи 25.02.2003 года (без ограничения срока действия)<br>Адрес:&nbsp;107016, Россия, г. Москва, ул. Неглинная, 12<br>Контактные телефоны: <a class="text-decoration-none" href="tel:88003003000">8 800 300-30-00</a> (для бесплатных звонков из регионов России), <a class="text-decoration-none" href="tel:+74993003000">+7 499 300-30-00</a> (круглосуточно, по рабочим дням), факс: +7 495 621-64-65</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            */?>
        </div>
    </div>
</section>
