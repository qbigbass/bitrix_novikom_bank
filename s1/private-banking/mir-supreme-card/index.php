<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
global $APPLICATION;
$APPLICATION->SetTitle("Карта Мир Supreme");
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
                            <li class="d-flex align-items-center"><span class="icon size-m flex-shrink-0 dark-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                              </svg></span><a class="list-pb-contact__link" href="tel:+78002507007">+7 (800) 250-70-07</a>
                            </li>
                            <li class="d-flex align-items-center"><span class="icon size-m flex-shrink-0 dark-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                              </svg></span><a class="list-pb-contact__link" href="emailto:vip@novikom.ru">vip@novikom.ru</a>
                            </li>
                            <li class="d-flex align-items-center"><span class="icon size-m flex-shrink-0 dark-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-bank"></use>
                              </svg></span><span>Москва, округ Якиманка, наб. Якиманская, д.&nbsp;2</span>
                            </li>
                        </ul><a class="btn btn-pb btn-pb--outline" href="/">Основной сайт Новиком</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="pb-section__title dark-0 text-center my-4 my-md-6 mt-lg-0 animate js-animation">Премиальная карта Мир&nbsp;Supreme</h3>
        <p class="pb-section__subtitle dark-0 text-center m-0 px-xl-6 animate js-animation">Дебетовая карта с&nbsp;ежемесячным начислением процентов на&nbsp;остаток средств или&nbsp;кредитная карта с&nbsp;бесплатным снятием наличных.</p>
        <div class="pb-card-wrapper my-6 position-relative animate js-animation">
            <div class="pb-card-image pb-card-image--type-dark"><img src="/frontend/dist/img/pb-images/pb-card-supreme-dark.png" alt="Supreme Card">
                <svg class="pb-card-image__blink" width="549" height="389" viewBox="0 0 549 389" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_1417_5046" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="27" y="28" width="495" height="318">
                        <path d="M27.8387 43.7196C27.7371 35.1999 34.7437 28.3064 43.2606 28.5466L486.363 41.0459C495.114 41.2928 502.247 48.145 502.844 56.879L521.26 326.109C521.809 334.139 515.491 340.978 507.442 341.064L48.4255 345.966C39.0455 346.066 31.3571 338.55 31.2452 329.17L27.8387 43.7196Z" fill="#D9D9D9"></path>
                    </mask>
                    <g mask="url(#mask0_1417_5046)">
                        <g class="blink-dark-animate" style="mix-blend-mode:color-dodge" filter="url(#filter0_f_1417_5046)">
                            <ellipse cx="618.298" cy="227.741" rx="112.869" ry="286.249" transform="rotate(-2.80658 618.298 227.741)" fill="url(#paint0_radial_1417_5046)"></ellipse>
                        </g>
                        <g filter="url(#filter1_f_1417_5046)">
                            <path d="M28.8387 43.7077C28.7438 35.7559 35.2833 29.322 43.2324 29.5462L486.335 42.0455C494.571 42.2779 501.284 48.727 501.847 56.9473L520.263 326.178C520.773 333.634 514.905 339.984 507.432 340.064L48.4148 344.966C39.5866 345.06 32.3504 337.986 32.2451 329.158L28.8387 43.7077Z" stroke="url(#paint1_linear_1417_5046)" stroke-width="2"></path>
                        </g>
                        <g filter="url(#filter2_f_1417_5046)">
                            <path d="M32.8384 43.66C32.7706 37.9801 37.4417 33.3845 43.1196 33.5446L486.222 46.044C492.399 46.2182 497.434 51.0551 497.856 57.2203L516.272 326.451C516.625 331.613 512.563 336.009 507.389 336.064L48.3721 340.966C41.7509 341.037 36.3238 335.731 36.2448 329.11L32.8384 43.66Z" stroke="url(#paint2_linear_1417_5046)" stroke-opacity="0.7" stroke-width="10"></path>
                        </g>
                    </g>
                    <defs>
                        <filter id="filter0_f_1417_5046" x="474.684" y="-88.2207" width="287.228" height="631.922" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                            <feGaussianBlur stdDeviation="15" result="effect1_foregroundBlur_1417_5046"></feGaussianBlur>
                        </filter>
                        <filter id="filter1_f_1417_5046" x="23.8379" y="24.541" width="501.456" height="325.426" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                            <feGaussianBlur stdDeviation="2" result="effect1_foregroundBlur_1417_5046"></feGaussianBlur>
                        </filter>
                        <filter id="filter2_f_1417_5046" x="-32.1621" y="-31.459" width="613.456" height="437.426" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                            <feGaussianBlur stdDeviation="30" result="effect1_foregroundBlur_1417_5046"></feGaussianBlur>
                        </filter>
                        <radialGradient id="paint0_radial_1417_5046" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(618.298 227.741) rotate(86.6203) scale(238.777 93.8777)">
                            <stop stop-color="#D8C3F3" stop-opacity="0.3"></stop>
                            <stop offset="1" stop-color="#BCA9D5" stop-opacity="0"></stop>
                        </radialGradient>
                        <linearGradient id="paint1_linear_1417_5046" x1="531.286" y1="341.143" x2="435.694" y2="292.125" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#DEDBF8" stop-opacity="0.4"></stop>
                            <stop offset="1" stop-color="#D5C6F3" stop-opacity="0"></stop>
                        </linearGradient>
                        <linearGradient id="paint2_linear_1417_5046" x1="531.286" y1="341.143" x2="477.559" y2="289.765" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#D5D0FC" stop-opacity="0.3"></stop>
                            <stop offset="1" stop-color="#CBB9ED" stop-opacity="0"></stop>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="pb-card-image pb-card-image--type-light"><img src="/frontend/dist/img/pb-images/pb-card-supreme-light.png" alt="Supreme Card">
                <svg class="pb-card-image__blink" width="589" height="453" viewBox="0 0 589 453" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_1417_5056" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="12" y="12" width="562" height="429">
                        <path d="M13.7471 159.361C10.9881 151.305 15.4811 142.571 23.6394 140.131L449.312 12.8053C457.68 10.3022 466.584 14.5483 469.906 22.6267L572.521 272.156C575.587 279.612 571.739 288.11 564.113 290.724L128.864 439.92C119.458 443.144 109.22 438.131 105.998 428.725L13.7471 159.361Z" fill="#D9D9D9"></path>
                    </mask>
                    <g mask="url(#mask0_1417_5056)">
                        <g class="blink-light-animate" filter="url(#filter0_f_1417_5056)">
                            <ellipse cx="0.38985" cy="252.118" rx="47.5" ry="296" transform="rotate(-18.3077 0.38985 252.118)" fill="url(#paint0_radial_1417_5056)"></ellipse>
                        </g>
                        <g class="blink-light-animate" filter="url(#filter1_f_1417_5056)">
                            <ellipse cx="61.3681" cy="461.202" rx="47.5" ry="76.503" transform="rotate(-18.3077 61.3681 461.202)" fill="url(#paint1_radial_1417_5056)"></ellipse>
                        </g>
                        <g filter="url(#filter2_f_1417_5056)">
                            <path d="M16.5853 158.389C14.3781 151.945 17.9724 144.957 24.4991 143.005L450.172 15.6795C457.063 13.6181 464.396 17.1149 467.131 23.7677L569.746 273.297C572.155 279.155 569.132 285.832 563.14 287.886L127.891 437.082C120.053 439.769 111.521 435.591 108.837 427.753L16.5853 158.389Z" stroke="url(#paint2_linear_1417_5056)" stroke-width="6"></path>
                        </g>
                    </g>
                    <defs>
                        <filter id="filter0_f_1417_5056" x="-112.973" y="-39.3027" width="226.725" height="582.842" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                            <feGaussianBlur stdDeviation="5" result="effect1_foregroundBlur_1417_5056"></feGaussianBlur>
                        </filter>
                        <filter id="filter1_f_1417_5056" x="-49.7412" y="327.039" width="222.219" height="268.324" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                            <feGaussianBlur stdDeviation="30" result="effect1_foregroundBlur_1417_5056"></feGaussianBlur>
                        </filter>
                        <filter id="filter2_f_1417_5056" x="-17.0664" y="-17.9102" width="620.645" height="488.807" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                            <feGaussianBlur stdDeviation="15" result="effect1_foregroundBlur_1417_5056"></feGaussianBlur>
                        </filter>
                        <radialGradient id="paint0_radial_1417_5056" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(0.389853 252.118) rotate(88.6232) scale(246.552 39.565)">
                            <stop stop-color="white"></stop>
                            <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                        </radialGradient>
                        <radialGradient id="paint1_radial_1417_5056" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(61.3681 461.202) rotate(84.6872) scale(63.9794 39.4064)">
                            <stop stop-color="#992EED"></stop>
                            <stop offset="1" stop-color="#8A3DD7" stop-opacity="0"></stop>
                        </radialGradient>
                        <linearGradient id="paint2_linear_1417_5056" x1="-0.703109" y1="456.004" x2="111.363" y2="434.655" gradientUnits="userSpaceOnUse">
                            <stop offset="0.24666" stop-color="white"></stop>
                            <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                            <stop offset="1" stop-color="#D5D9F9" stop-opacity="0"></stop>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="pb-benefits d-flex flex-column flex-lg-row flex-wrap gap-4 align-items-md-start justify-content-lg-center">
            <div class="pb-card-benefit d-flex align-items-center animate js-animation"><img class="pb-card-benefit__icon" src="/frontend/dist/img/pb-images/pb-supreme-icons/bank-icon.svg" alt="benefit-icon">
                <div class="m-0 pr-text-color pb-card-benefit__description">Снятие наличных в&nbsp;любых банкоматах без комиссии</div>
            </div>
            <div class="pb-card-benefit d-flex align-items-center animate js-animation"><img class="pb-card-benefit__icon" src="/frontend/dist/img/pb-images/pb-supreme-icons/airplane-icon.svg" alt="benefit-icon">
                <div class="m-0 pr-text-color pb-card-benefit__description">Доступ в&nbsp;бизнес-залы аэропортов с&nbsp;Mir Pass</div>
            </div>
            <div class="pb-card-benefit d-flex align-items-center animate js-animation"><img class="pb-card-benefit__icon" src="/frontend/dist/img/pb-images/pb-supreme-icons/percent-icon.svg" alt="benefit-icon">
                <div class="m-0 pr-text-color pb-card-benefit__description">Повышенный кэшбэк до&nbsp;30% от&nbsp;покупок</div>
            </div>
            <div class="pb-card-benefit d-flex align-items-center animate js-animation"><img class="pb-card-benefit__icon" src="/frontend/dist/img/pb-images/pb-supreme-icons/wallet-icon.svg" alt="benefit-icon">
                <div class="m-0 pr-text-color pb-card-benefit__description">Дополнительные карты бесплатно</div>
            </div>
            <div class="pb-card-benefit d-flex align-items-center animate js-animation"><img class="pb-card-benefit__icon" src="/frontend/dist/img/pb-images/pb-supreme-icons/spb-icon.svg" alt="benefit-icon">
                <div class="m-0 pr-text-color pb-card-benefit__description">Переводы по&nbsp;номеру телефона до&nbsp;1&nbsp;млн ₽&nbsp;в&nbsp;другие банки по&nbsp;СБП без комиссии</div>
            </div>
        </div>
        <div class="mt-6 mb-4 text-center">
            <button class="btn btn-pb btn-pb--primary btn-pb--size-lg w-100 w-md-auto animate js-animation" type="button" data-bs-toggle="modal" data-bs-target="#modal-become-client" aria-label="Стать клиентом">Стать клиентом</button>
        </div>
    </div>
    <div class="pb-section-hero__overlay pb-section-hero__overlay--size-small"></div>
</section>
<section class="pb-section pb-section--gradient-raial">
    <div class="container">
        <div class="d-flex flex-column row-gap-6">
            <h2 class="pb-section__title dark-0 text-center animate js-animation">Преимущества Мир Supreme</h2>
            <div class="row row-gap-6">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pb-card d-flex animate js-animation">
                        <div class="pb-card__content d-flex flex-column align-items-start">
                            <h3 class="pb-card__title dark-0">Доступный кредит</h3>
                            <div class="pb-card__footer mt-auto">
                                <p class="pb-card__subtitle dark-0 mb-0">до 10 млн ₽</p>
                            </div>
                        </div><img class="pb-card__image" src="/frontend/dist/img/pb-images/pb-cards/item-1.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pb-card d-flex animate js-animation">
                        <div class="pb-card__content d-flex flex-column align-items-start">
                            <h3 class="pb-card__title dark-0">Беспроцентный период</h3>
                            <div class="pb-card__footer mt-auto">
                                <p class="pb-card__subtitle dark-0 mb-0">56 дней</p>
                            </div>
                        </div><img class="pb-card__image" src="/frontend/dist/img/pb-images/pb-cards/item-2.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pb-card d-flex animate js-animation">
                        <div class="pb-card__content d-flex flex-column align-items-start">
                            <h3 class="pb-card__title dark-0">Круглосуточная поддержка</h3>
                            <div class="pb-card__footer mt-auto">
                                <p class="pb-card__subtitle dark-0 mb-0">24 × 7</p>
                            </div>
                        </div><img class="pb-card__image" src="/frontend/dist/img/pb-images/pb-cards/item-3.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pb-card d-flex animate js-animation">
                        <div class="pb-card__content d-flex flex-column align-items-start">
                            <h3 class="pb-card__title dark-0">Повышенный кешбэк</h3>
                            <div class="pb-card__footer mt-auto">
                                <p class="pb-card__subtitle dark-0 mb-0">до 30 %</p>
                                <p class="pb-card__description dark-0 mb-0">в специальных акциях МИР</p>
                            </div>
                        </div><img class="pb-card__image" src="/frontend/dist/img/pb-images/pb-cards/item-4.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pb-card d-flex animate js-animation">
                        <div class="pb-card__content d-flex flex-column align-items-start">
                            <h3 class="pb-card__title dark-0">Программа «БОНУС»</h3>
                            <div class="pb-card__footer mt-auto">
                                <p class="pb-card__subtitle dark-0 mb-0">до 20 %</p>
                                <p class="pb-card__description dark-0 mb-0">возврат от суммы покупок</p>
                            </div>
                        </div><img class="pb-card__image" src="/frontend/dist/img/pb-images/pb-cards/item-5.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pb-card d-flex animate js-animation">
                        <div class="pb-card__content d-flex flex-column align-items-start">
                            <h3 class="pb-card__title dark-0">Программа «Кешбэк»</h3>
                            <div class="pb-card__footer mt-auto">
                                <p class="pb-card__subtitle dark-0 mb-0">до 7 %</p>
                                <p class="pb-card__description dark-0 mb-0">возврат от суммы покупок</p>
                            </div>
                        </div><img class="pb-card__image" src="/frontend/dist/img/pb-images/pb-cards/item-6.png" alt="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="accordion pb-accordion" id="accordion-documents">
                        <div class="accordion-item animate js-animation">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-controls="1"><span>Тарифы и документы</span>
                                </button>
                            </div>
                            <div class="accordion-collapse collapse" id="1" data-bs-parent="#accordion-documents">
                                <div class="accordion-body"><a class="document-download" href="#" download=""><span class="me-2">Тарифы на обслуживание банковских карт Мир для физических лиц, выпущенных с 22.08.2022 г.</span>
                                        <div class="d-inline-flex gap-2 align-items-center">
                                            <div class="document-download__file caption-m dark-70"><span class="document-download__date-time">12.12.23 18:56</span><span class="document-download__file-type">XLS</span></div><span class="icon size-s pr-text-color">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                          <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                        </svg></span>
                                        </div></a><a class="document-download" href="#" download=""><span class="me-2">Договор банковского обслуживания</span>
                                        <div class="d-inline-flex gap-2 align-items-center">
                                            <div class="document-download__file caption-m dark-70"><span class="document-download__date-time">12.12.23 18:56</span><span class="document-download__file-type">XLS</span></div><span class="icon size-s pr-text-color">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                          <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                        </svg></span>
                                        </div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 pb-section__footer animate js-animation">
                    <div class="d-flex flex-column row-gap-4 align-items-center py-4">
                        <button class="btn btn-pb btn-pb--primary w-100 w-md-auto" type="button" data-bs-toggle="modal" data-bs-target="#modal-become-client" aria-label="Стать клиентом">Заказать карту</button>
                        <p class="pb-text-notes mb-0 pr-text-color text-center">Время изготовления карты <br class="d-md-none">до&nbsp;10 рабочих дней</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal modal-pb fade" id="modal-become-client" tabindex="-1" aria-hidden="true">
    <div class="container modal-pb__container">
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                  <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close-small"></use>
                </svg></span></button>
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="pb-form d-flex flex-column row-gap-4 row-gap-lg-5" action="#">
                    <h4 class="pb-form__title dark-0 text-center">Стать клиентом</h4>
                    <div class="row g-1">
                        <div class="col-12 col-md-6">
                            <div class="d-flex flex-column row-gap-1 row-gap-lg-2">
                                <label class="form-label form-label--pb mb-0" for="name">Имя</label>
                                <input class="form-control form-control--pb" id="name" type="text" name="name" placeholder="Введите имя">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex flex-column row-gap-1 row-gap-lg-2">
                                <label class="form-label form-label--pb mb-0" for="phone">Телефон</label>
                                <input class="js-mask-phone form-control form-control--pb" id="phone" type="text" name="phone" aria-describedby="mobile-phone-hint" placeholder="+7">
                            </div>
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col-12 col-md-8">
                            <div class="d-flex flex-column row-gap-1 row-gap-lg-2">
                                <label class="form-label form-label--pb mb-0" for="select-date">Удобное время для звонка</label>
                                <select class="form-select js-select js-select-date" id="select-date" aria-label="Выберите дату"></select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-control-time">
                                <input class="form-control form-control--pb" id="hours" type="number" name="hours" min="1" max="24" placeholder="19">
                                <input class="form-control form-control--pb" id="minutes" type="number" name="minutes" min="0" max="59" placeholder="00">
                            </div>
                        </div>
                    </div>
                    <div class="form-check form-check--pb">
                        <input class="form-check-input" id="personal" type="checkbox" checked>
                        <label class="form-check-label" for="personal">Я&nbsp;согласен с&nbsp;условиями использования банком моих персональных данных для обработки данного обращения</label>
                    </div>
                    <div class="pb-form__footer d-flex justify-content-center">
                        <button class="btn btn-pb btn-pb--primary w-100 w-md-auto" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
