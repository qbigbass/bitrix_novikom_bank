<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
use Galago\Frontend\Asset;
global $APPLICATION;

$APPLICATION->SetTitle('Кредиты');
Asset::getInstance()->addJsAndCss('loans');
?>
<main class="default-page-layout__body">

    <div class="text-banner text-banner--blue">
        <div class="content-container">
            <div class="text-banner__inner">
                <div class="text-banner__content">
                    <nav class="breadcrumbs body-s-light">
                        <ul class="breadcrumbs__list">
                            <li class="breadcrumbs__item">
                                <a href="#" class="breadcrumbs__link">
                                    Частным клиентам
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="breadcrumbs__link breadcrumbs__link-mobile">
		<span class="a-icon size-s">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
			</svg>
</span>
                            Частным клиентам
                        </a>
                    </nav>
                    <div class="text-banner__title headline-0">Кредиты</div>
                    <div class="text-banner__description body-l-light">Быстрые кредиты по оптимальной ставке на любые цели</div>
                </div>

            </div>
        </div>
        <div class="text-banner__pattern">
            <img src="/frontend/build/assets/text-banner-pattern.svg">
        </div>
    </div>
    <section class="section-layout section-catalog-layout section-layout--s section-layout--bg-undefined">

        <div class="content-container">
            <div class="a-tabs a-tabs--layout js-a-tabs">

                <div class="section-catalog-layout__content">
                    <div class="section-catalog-layout__tabs">
                        <div class="a-tab-swiper swiper js-a-tab-swiper">

                            <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">


                                <button type="button" data-value="0" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab is-active">
                                    Все кредиты
                                </button>
                                <button type="button" data-value="1" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab">
                                    Потребительские
                                </button>
                                <button type="button" data-value="2" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab">
                                    На образование
                                </button>
                                <button type="button" data-value="3" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab">
                                    Рефинансирование
                                </button>
                                <button type="button" data-value="4" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab">
                                    Овердрафт
                                </button>
                                <button type="button" data-value="5" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab">
                                    Реструктуризация
                                </button>


                            </div>

                            <button class="a-tab-nav-button js-a-tab-prev is-prev">
	<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
			</svg>
</span>
                            </button>
                            <button class="a-tab-nav-button js-a-tab-next is-next">
	<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span>
                            </button>
                        </div>
                    </div>
                    <div class="section-catalog-layout__panels">
                        <div class="a-tab-panels js-a-tab-panels">


                            <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="0">

                                <div class="product-list">
                                    <div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/credit-for-any-purpose-salary-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на любые цели<br> для зарплатных клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">18%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">1 500 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/credit-for-any-purpose-strategic-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на любые цели <br> для стратегических клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">18%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">1 500 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/credit-education.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на образование</div>
                                                <div class="product-card__description body-l-light">Для оплаты до 100% от стоимости обучения в вузе или дополнительного образования</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/overdraft.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Овердрафт</div>
                                                <div class="product-card__description body-l-light">Кредит «до зарплаты» на случай непредвиденных расходов и неотложных платежей</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/refinancing-salary-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на рефинансирование<br> для зарплатных клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">5 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/refinancing-strategic-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на рефинансирование<br> для стратегических клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">5 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/restructuring.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Реструктуризация</div>
                                                <div class="product-card__description body-l-light">Программы для заемщиков, у которых возникли трудности с погашением кредита</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">
                                                            <span class="headline-2">Уменьшение</span>




                                                        </div>
                                                        <div class="body-m-light dark-70">Кредитной ставки</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">
                                                            <span class="headline-2">Кредитные</span>




                                                        </div>
                                                        <div class="body-m-light dark-70">Каникулы</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">


                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="1">

                                <div class="product-list">
                                    <div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/credit-for-any-purpose-salary-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на любые цели<br> для зарплатных клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">18%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">1 500 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/credit-for-any-purpose-strategic-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на любые цели <br> для стратегических клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">18%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">1 500 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="2">

                                <div class="product-list">
                                    <div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/credit-education.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на образование</div>
                                                <div class="product-card__description body-l-light">Для оплаты до 100% от стоимости обучения в вузе или дополнительного образования</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="3">

                                <div class="product-list">
                                    <div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/refinancing-salary-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на рефинансирование<br> для зарплатных клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">5 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div><div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/refinancing-strategic-clients.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Кредит на рефинансирование<br> для стратегических клиентов</div>
                                                <div class="product-card__description body-l-light">Воплощение задуманных планов и реализация любых целей уже сегодня</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">5 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="4">

                                <div class="product-list">
                                    <div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/overdraft.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Овердрафт</div>
                                                <div class="product-card__description body-l-light">Кредит «до зарплаты» на случай непредвиденных расходов и неотложных платежей</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">от</span>
                                                            <span class="number-l-heavy">16%</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Ставка</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">3 000 000</span>
                                                            <span class="number-l-heavy currency">₽</span>

                                                        </div>
                                                        <div class="body-m-light dark-70">Сумма</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">

                                                            <span class="body-l-heavy">до</span>
                                                            <span class="number-l-heavy">8 лет</span>


                                                        </div>
                                                        <div class="body-m-light dark-70">Срок</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">

                                                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку
                                                </button>
                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="5">

                                <div class="product-list">
                                    <div class="product-card">
                                        <div class="product-card__image-container">
                                            <img src="/frontend/build/assets/big-illustrations/large-individual/restructuring.png" class="product-card__image">

                                        </div>

                                        <div class="product-card__content">
                                            <div class="product-card__head">
                                                <div class="product-card__title headline-1">Реструктуризация</div>
                                                <div class="product-card__description body-l-light">Программы для заемщиков, у которых возникли трудности с погашением кредита</div>
                                            </div>
                                            <div class="product-card__conditions-box">
                                                <div class="product-card__conditions is-big-gap">
                                                    <div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">
                                                            <span class="headline-2">Уменьшение</span>




                                                        </div>
                                                        <div class="body-m-light dark-70">Кредитной ставки</div>
                                                    </div><div class="text-indicating-benefits">

                                                        <div class="text-indicating-benefits-head">
                                                            <span class="headline-2">Кредитные</span>




                                                        </div>
                                                        <div class="body-m-light dark-70">Каникулы</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card__buttons">


                                                <a href="#" class="a-button a-button--lm a-button--primary a-button--link a-button--text">Подробнее
                                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="section-layout section-see-also section-layout--bg-undefined">

        <div class="content-container">
            <div class="section-title section-title--padding">
                <h3 class="section-title__text headline-2">
                    Смотрите также
                </h3>

            </div>
            <div class="slider-skeleton swiper persistent-slider js-persistent-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,tablet-album:2,laptop:3,laptop-x:3,desktop:3" data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:40,laptop:40,laptop-x:40,desktop:40">

                <div class="swiper-wrapper js-swiper-wrapper">

                    <div class="swiper-slide js-swiper-slide">

                        <div class="offer-card offer-card--green">
                            <div class="offer-card__inner">
                                <div class="offer-card__tag">
                                    <div class="a-tag" slot="tag">
	<span class="a-tag__content body-s-heavy">
		Частным клиентам
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                </div>
                                <div class="offer-card__content">
                                    <div class="offer-card__title headline-3">Программа «Кешбэк»</div>
                                    <div class="text-indicating-benefits">

                                        <div class="text-indicating-benefits-head violet-100">

                                            <span class="body-l-heavy">до</span>
                                            <span class="number-l-heavy">15,5%</span>


                                        </div>

                                    </div>

                                </div>
                                <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/contribution-rentier.png">
                                <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Открыть вклад
                                </a>
                            </div>
                        </div>

                    </div><div class="swiper-slide js-swiper-slide">

                        <div class="offer-card offer-card--orange">
                            <div class="offer-card__inner">
                                <div class="offer-card__tag">
                                    <div class="a-tag" slot="tag">
	<span class="a-tag__content body-s-heavy">
		Частным клиентам
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                </div>
                                <div class="offer-card__content">
                                    <div class="offer-card__title headline-3">Ипотека по программе <br>«IT-ипотека»</div>
                                    <div class="text-indicating-benefits">

                                        <div class="text-indicating-benefits-head violet-100">

                                            <span class="body-l-heavy">от</span>
                                            <span class="number-l-heavy">4,8%</span>


                                        </div>

                                    </div>

                                </div>
                                <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/it-mortgage.png">
                                <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Подать заявку
                                </a>
                            </div>
                        </div>

                    </div><div class="swiper-slide js-swiper-slide">

                        <div class="offer-card offer-card--yellow">
                            <div class="offer-card__inner">
                                <div class="offer-card__tag">
                                    <div class="a-tag" slot="tag">
	<span class="a-tag__content body-s-heavy">
		Частным клиентам
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                </div>
                                <div class="offer-card__content">
                                    <div class="offer-card__title headline-3">Кредит<br>на образование</div>
                                    <div class="text-indicating-benefits">

                                        <div class="text-indicating-benefits-head violet-100">

                                            <span class="body-l-heavy">от</span>
                                            <span class="number-l-heavy">16%</span>


                                        </div>

                                    </div>

                                </div>
                                <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/credit-education.png">
                                <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Оформить
                                </a>
                            </div>
                        </div>

                    </div><div class="swiper-slide js-swiper-slide">

                        <div class="offer-card offer-card--green">
                            <div class="offer-card__inner">
                                <div class="offer-card__tag">
                                    <div class="a-tag" slot="tag">
	<span class="a-tag__content body-s-heavy">
		Частным клиентам
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                </div>
                                <div class="offer-card__content">
                                    <div class="offer-card__title headline-3">Программа «Кешбэк»</div>
                                    <div class="text-indicating-benefits">

                                        <div class="text-indicating-benefits-head violet-100">

                                            <span class="body-l-heavy">до</span>
                                            <span class="number-l-heavy">15,5%</span>


                                        </div>

                                    </div>

                                </div>
                                <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/contribution-rentier.png">
                                <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Открыть вклад
                                </a>
                            </div>
                        </div>

                    </div><div class="swiper-slide js-swiper-slide">

                        <div class="offer-card offer-card--orange">
                            <div class="offer-card__inner">
                                <div class="offer-card__tag">
                                    <div class="a-tag" slot="tag">
	<span class="a-tag__content body-s-heavy">
		Частным клиентам
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                </div>
                                <div class="offer-card__content">
                                    <div class="offer-card__title headline-3">Ипотека по программе <br>«IT-ипотека»</div>
                                    <div class="text-indicating-benefits">

                                        <div class="text-indicating-benefits-head violet-100">

                                            <span class="body-l-heavy">от</span>
                                            <span class="number-l-heavy">4,8%</span>


                                        </div>

                                    </div>

                                </div>
                                <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/it-mortgage.png">
                                <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Подать заявку
                                </a>
                            </div>
                        </div>

                    </div><div class="swiper-slide js-swiper-slide">

                        <div class="offer-card offer-card--yellow">
                            <div class="offer-card__inner">
                                <div class="offer-card__tag">
                                    <div class="a-tag" slot="tag">
	<span class="a-tag__content body-s-heavy">
		Частным клиентам
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                </div>
                                <div class="offer-card__content">
                                    <div class="offer-card__title headline-3">Кредит<br>на образование</div>
                                    <div class="text-indicating-benefits">

                                        <div class="text-indicating-benefits-head violet-100">

                                            <span class="body-l-heavy">от</span>
                                            <span class="number-l-heavy">16%</span>


                                        </div>

                                    </div>

                                </div>
                                <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-individual/credit-education.png">
                                <a slot="link" class="a-button offer-card__link a-button--m a-button--primary a-button--link">Оформить
                                </a>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="slider-skeleton__controls">

                    <div class="slider-controls js-swiper-controls">
                        <div class="slider-controls__pagination js-swiper-pagination"></div>
                        <div class="slider-controls__navigation js-swiper-nav">
                            <button type="button" class="swiper-button-prev js-swiper-prev">
			<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
			</svg>
</span>
                            </button>
                            <button type="button" class="swiper-button-next js-swiper-next">
			<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <section class="section-layout section-call-me-back section-layout--bg-undefined">

        <div class="content-container">
            <div class="section-call-me-back__container">
                <div class="section-call-me-back__content">
                    <div class="section-title section-call-me-back__title">
                        <h3 class="section-title__text headline-2">
                            Остались вопросы
                        </h3>

                    </div>
                    <div class="body-l-light">Оставьте свой телефон и мы перезвоним вам, либо задайте вопрос в чате</div>
                </div>
                <div class="section-call-me-back__help">
                    <div class="section-call-me-back__links">
                        <button class="a-button a-button--m a-button--white">Открыть чат
                        </button>
                        <!--<AButton element="a" href="#" size="m" color="white">Перейти в раздел Помощь</AButton>-->
                    </div>
                    <div class="section-call-me-back__confirm dark-70 body-s-light">Нажимая кнопку «Перезвоните мне», вы&nbsp;соглашаетесь с&nbsp;условиями предоставления информации</div>
                </div>
                <div class="section-call-me-back__form">
                    <div class="form-call-me-back form-call-me-back--white">

                        <form class="form-call-me-back__form" action="/" method="POST">
                            <div class="a-input js-a-input a-input--ms">
                                <label for="mobile-phone" class="a-input__label body-s-heavy">Мобильный телефон</label>
                                <input id="mobile-phone" class="a-input__input" placeholder="+7" aria-describedby="mobile-phone-hint">

                            </div>
                            <button type="button" class="a-button a-button--lm a-button--primary a-button--full">Перезвоните мне
                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div class="section-call-me-back__background">
            <img src="/frontend/build/assets/section-call-me-back-bg.svg">
        </div>

    </section>

</main>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
