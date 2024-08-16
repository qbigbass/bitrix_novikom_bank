<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
use Galago\Frontend\Asset;
global $APPLICATION;

$APPLICATION->SetTitle('Частным клиентам - Главная НОВИКОМБАНК');
Asset::getInstance()->addJsAndCss('index');
?>
    <main class="default-page-layout__body">

        <div class="main-slider">
            <img src="/frontend/build/assets/slides/hero_banner_bg_desktop.png" class="main-slider__bg" alt="">
            <div class="main-slider__container swiper swiper-container">
                <div class="main-slider__wrapper swiper-wrapper">
                    <div class="swiper-slide main-slider__slide">
                        <div class="main-slider__content">
                            <div class="main-slider-content">
                                <div class="main-slider-content__text">
                                    <h1 class="main-slider-content__title">Банк российских<br> инженеров</h1>
                                    <p class="body-l-light">
                                        Мы&nbsp;укрепляем технологический суверенитет России и&nbsp;помогаем занять
                                        лидерские позиции в&nbsp;экономике будущего
                                    </p>
                                    <a href="#" theme="dark" class="a-button main-slider-content__button a-button--m a-button--secondary a-button--link">
                                        Больше о банке

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><div class="swiper-slide main-slider__slide">
                        <div class="main-slider__content">
                            <div class="main-slider-content">
                                <div class="main-slider-content__text">
                                    <h1 class="main-slider-content__title">Новикомбанку<br> 30 лет</h1>
                                    <p class="body-l-light">
                                        Мы&nbsp;укрепляем технологический суверенитет России и&nbsp;помогаем занять
                                        лидерские позиции в&nbsp;экономике будущего
                                    </p>
                                    <a href="#" theme="dark" class="a-button main-slider-content__button a-button--m a-button--secondary a-button--link">
                                        Больше о банке

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><div class="swiper-slide main-slider__slide">
                        <div class="main-slider__content">
                            <div class="main-slider-content">
                                <div class="main-slider-content__text">
                                    <h1 class="main-slider-content__title">Ваша финансовая<br> безопасность</h1>
                                    <p class="body-l-light">
                                        Мы&nbsp;укрепляем технологический суверенитет России и&nbsp;помогаем занять
                                        лидерские позиции в&nbsp;экономике будущего
                                    </p>
                                    <a href="#" theme="dark" class="a-button main-slider-content__button a-button--m a-button--secondary a-button--link">
                                        Больше о банке

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><div class="swiper-slide main-slider__slide">
                        <div class="main-slider__content">
                            <div class="main-slider-content">
                                <div class="main-slider-content__text">
                                    <h1 class="main-slider-content__title">Годовой<br> отчет</h1>
                                    <p class="body-l-light">
                                        Мы&nbsp;укрепляем технологический суверенитет России и&nbsp;помогаем занять
                                        лидерские позиции в&nbsp;экономике будущего
                                    </p>
                                    <a href="#" theme="dark" class="a-button main-slider-content__button a-button--m a-button--secondary a-button--link">
                                        Больше о банке

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-slider-pagination"></div>
                <div class="main-slider-controls">
                    <button type="button" class="main-slider-control main-slider-control__prev">
				<span class="a-icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
			</svg>
</span>
                    </button>
                    <button type="button" class="main-slider-control main-slider-control__next">
				<span class="a-icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span>
                    </button>
                </div>
            </div>

            <div class="main-slider__thumbs swiper">
                <div class="main-slider__thumbs-wrapper swiper-wrapper">
                    <button class="swiper-slide main-slider-thumb">
                        <span class="headline-4">Банк российских<br> инженеров</span>
                    </button><button class="swiper-slide main-slider-thumb">
                        <span class="headline-4">Новикомбанку<br> 30 лет</span>
                    </button><button class="swiper-slide main-slider-thumb">
                        <span class="headline-4">Ваша финансовая<br> безопасность</span>
                    </button><button class="swiper-slide main-slider-thumb">
                        <span class="headline-4">Годовой<br> отчет</span>
                    </button>
                </div>
            </div>>
        </div>
        <section class="section-layout bank-offers js-bank-offers-expand" data-visible-on-mobile="3">

            <div class="content-container">
                <div class="section-title section-title--padding">
                    <div class="section-title__text headline-2">
                        Предложения Новикомбанка
                    </div>

                </div>

                <div class="slider-skeleton swiper persistent-slider js-persistent-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:40">

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
                                        <div class="offer-card__title headline-3">Вклад «Рантье»</div>
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
		Корпоративным клиентам
	</span>
                                            <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                        </div>
                                    </div>
                                    <div class="offer-card__content">
                                        <div class="offer-card__title headline-3">Резервирование<br>счетов</div>
                                        <div class="text-indicating-benefits">

                                            <div class="text-indicating-benefits-head violet-100">





                                            </div>

                                        </div>
                                        <div class="offer-card__description body-m-light">Дистанционная подача заявки<br>на&nbsp;открытие расчетного счета</div>
                                    </div>
                                    <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-corporate/account-reservation.png">
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
		Малому и среднему бизнесу
	</span>
                                            <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                        </div>
                                    </div>
                                    <div class="offer-card__content">
                                        <div class="offer-card__title headline-3">Экспресс-гарантии<br>44-ФЗ, 223-ФЗ</div>
                                        <div class="text-indicating-benefits">

                                            <div class="text-indicating-benefits-head violet-100">





                                            </div>

                                        </div>
                                        <div class="offer-card__description body-m-light">Принятие решения за 1 день,<br>до&nbsp;30 000 000 рублей, без залога</div>
                                    </div>
                                    <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-corporate/guarantees.png">
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
                                        <div class="offer-card__title headline-3">Вклад «Рантье»</div>
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
		Корпоративным клиентам
	</span>
                                            <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                        </div>
                                    </div>
                                    <div class="offer-card__content">
                                        <div class="offer-card__title headline-3">Резервирование<br>счетов</div>
                                        <div class="text-indicating-benefits">

                                            <div class="text-indicating-benefits-head violet-100">





                                            </div>

                                        </div>
                                        <div class="offer-card__description body-m-light">Дистанционная подача заявки<br>на&nbsp;открытие расчетного счета</div>
                                    </div>
                                    <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-corporate/account-reservation.png">
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
		Малому и среднему бизнесу
	</span>
                                            <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                        </div>
                                    </div>
                                    <div class="offer-card__content">
                                        <div class="offer-card__title headline-3">Экспресс-гарантии<br>44-ФЗ, 223-ФЗ</div>
                                        <div class="text-indicating-benefits">

                                            <div class="text-indicating-benefits-head violet-100">





                                            </div>

                                        </div>
                                        <div class="offer-card__description body-m-light">Принятие решения за 1 день,<br>до&nbsp;30 000 000 рублей, без залога</div>
                                    </div>
                                    <img class="offer-card__img" src="/frontend/build/assets/big-illustrations/large-corporate/guarantees.png">
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
                <div class="slider-skeleton swiper expandable-slider js-expandable-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3" data-space-between="mobile-s:0,mobile:0,tablet:32,laptop:40" data-rebuilding-slides="mobile" data-visible-slides="3">

                    <div class="swiper-wrapper js-swiper-wrapper">



                    </div>
                    <button class="a-button expandable-slider__trigger js-expandable-slider-trigger a-button--m a-button--primary a-button--text">Все предложения

                        <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
			</svg>
</span></button>


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
        <section class="section-layout bank-services">

            <div class="content-container">
                <div class="bank-services__container">
                    <div class="bank-services__services">
                        <div class="slider-skeleton swiper persistent-slider js-persistent-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:3,laptop:3" data-space-between="mobile-s:8,mobile:8,tablet:8,laptop:8">

                            <div class="swiper-wrapper js-swiper-wrapper">


                                <div class="swiper-slide js-swiper-slide bank-services__slide">

                                    <a href="#" class="service-card bank-services__card">
                                        <div class="service-card__content">
                                            <div class="service-card__title headline-3">Интернет-банк</div>
                                            <span class="a-icon service-card__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-a-web-bank"></use>
			</svg>
</span>
                                        </div>
                                        <div class="service-card__background">
                                            <img src="/frontend/build/assets/service-card-bg.svg">
                                        </div>
                                    </a>

                                </div>
                                <div class="swiper-slide js-swiper-slide bank-services__slide">

                                    <a href="#" class="service-card bank-services__card">
                                        <div class="service-card__content">
                                            <div class="service-card__title headline-3">Кредиты</div>
                                            <span class="a-icon service-card__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-a-money"></use>
			</svg>
</span>
                                        </div>
                                        <div class="service-card__background">
                                            <img src="/frontend/build/assets/service-card-bg.svg">
                                        </div>
                                    </a>

                                </div>
                                <div class="swiper-slide js-swiper-slide bank-services__slide">

                                    <a href="#" class="service-card bank-services__card">
                                        <div class="service-card__content">
                                            <div class="service-card__title headline-3">Ипотека</div>
                                            <span class="a-icon service-card__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-a-house"></use>
			</svg>
</span>
                                        </div>
                                        <div class="service-card__background">
                                            <img src="/frontend/build/assets/service-card-bg.svg">
                                        </div>
                                    </a>

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
                    <div class="service-salary-card bank-services__salary">
                        <div class="service-salary-card__content">
                            <div class="service-salary-card__title headline-2 dark-0">Зарплатная карта</div>
                            <div class="service-salary-card__links">
                                <a class="a-button a-button--lm a-button--white a-button--link a-button--text">Кешбек
                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span></a>
                                <a class="a-button a-button--lm a-button--white a-button--link a-button--text">Бонусы
                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span></a>
                                <a class="a-button a-button--lm a-button--white a-button--link a-button--text">Акции
                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span></a>
                            </div>
                        </div>
                        <div class="service-salary-card__background">
                            <img src="/frontend/build/assets/service-salary-card-bg.svg">
                        </div>
                    </div>
                    <div class="service-apps-card bank-services__apps">
                        <div class="service-apps-card__content">
                            <div class="service-apps-card__title headline-2">Мобильное приложение</div>
                            <div class="service-apps-card__benefits">
                                <div class="service-apps-card-benefit">
                                    <div class="service-apps-card-benefit__icon"><span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-mobile"></use>
			</svg>
</span></div>
                                    <div class="service-apps-card-benefit__title body-s-heavy">Управление кешбэком и бонусами</div>
                                </div>
                                <div class="service-apps-card-benefit">
                                    <div class="service-apps-card-benefit__icon"><span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-time"></use>
			</svg>
</span></div>
                                    <div class="service-apps-card-benefit__title body-s-heavy">Доступ к услугам банка 24/7</div>
                                </div>
                                <div class="service-apps-card-benefit">
                                    <div class="service-apps-card-benefit__icon"><span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-cash"></use>
			</svg>
</span></div>
                                    <div class="service-apps-card-benefit__title body-s-heavy">Платежи и переводы без комиссии</div>
                                </div>
                            </div>
                            <div class="service-apps-card__apps">
                                <a href="#" class="app-button app-button--m app-button--ru-store" target="_blank">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/app-logos.svg#ru-store"></use>
                                    </svg>
                                </a>
                                <a href="#" class="app-button app-button--m app-button--ru-market" target="_blank">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/app-logos.svg#ru-market"></use>
                                    </svg>
                                </a>
                                <a href="#" class="app-button app-button--m app-button--nash-store" target="_blank">
                                    <svg>
                                        <use  xlink:href="/frontend/build/assets/app-logos.svg#nash-store"></use>
                                    </svg>
                                </a>
                                <a href="#" download="true" class="a-button a-button--m a-button--white a-button--link">Скачать
                                    <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-download"></use>
			</svg>
</span></a>
                            </div>
                        </div>
                        <div class="service-apps-card__background">
                            <img src="/frontend/build/assets/service-apps-card-bg.svg">
                            <div class="service-apps-card__background-block"></div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="section-layout section-calculate-benefit">

            <div class="content-container">
                <div class="a-accordion js-a-accordion a-accordion-layout">

                    <div class="a-accordion-panel js-a-accordion-panel">

                        <button class="a-accordion-header js-a-accordion-header section-calculate-benefit__accordion-header">

                            <div class="headline-2">Рассчитайте выгоду</div>

                            <span class="a-icon a-accordion-header__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
			</svg>
</span>
                        </button>
                        <div class="a-accordion-content js-a-accordion-content section-calculate-benefit__accordion-content">

                            <div class="a-tabs a-tabs--layout js-a-tabs">

                                <div class="section-calculate-benefit__content">
                                    <div class="section-calculate-benefit__head">
                                        <div class="section-calculate-benefit__title headline-2">Рассчитайте выгоду</div>
                                        <div class="section-calculate-benefit__loan-tabs">
                                            <div class="a-tab-swiper swiper js-a-tab-swiper">

                                                <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">

                                                    <button type="button" data-value="0" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab is-active">
                                                        Кредит
                                                    </button>
                                                    <button type="button" data-value="1" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab">
                                                        Ипотека
                                                    </button>
                                                    <button type="button" data-value="2" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab">
                                                        Вклад
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
                                    </div>
                                    <div class="a-tab-panels js-a-tab-panels">

                                        <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="0">

                                            <div class="calculator-layout benefit-calculator">
                                                <div class="calculator-layout__form">

                                                    <div class="benefit-calculator__tabs">
                                                        <div class="benefit-calculator__tabs-desktop">
                                                            <div class="a-tabs a-tabs--component js-a-tabs">

                                                                <div class="a-tab-swiper swiper js-a-tab-swiper">

                                                                    <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">


                                                                        <button type="button" class="a-tab a-tab--m a-tab--primary swiper-slide js-a-tab is-active">
                                                                            Потребительский кредит
                                                                        </button>
                                                                        <button type="button" class="a-tab a-tab--m a-tab--primary swiper-slide js-a-tab">
                                                                            Рефинансирование
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
                                                        </div>
                                                        <div class="benefit-calculator__tabs-mobile">
                                                            <div class="a-input a-select-input js-a-select-input a-input--s">

                                                                <div class="a-select-input__inner">
                                                                    <input class="a-input__input" aria-describedby="undefined-hint">
                                                                    <span class="a-icon a-select-input__icon size-s">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
			</svg>
</span>
                                                                    <div class="a-drop-down js-a-drop-down a-select-input__drop-down">


                                                                        <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="Потребительский кредит" aria-selected="true">
                                                                            Потребительский кредит
                                                                        </button>
                                                                        <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="Рефинансирование" aria-selected="false">
                                                                            Рефинансирование
                                                                        </button>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="a-slider-input js-a-slider-input" data-type="price" data-steps="" data-start-value="1000000" data-max-value="5000000" data-min-value="20000" data-step-size="5000">
                                                        <label for="amount-credit" class="a-slider-input__label body-s-light dark-70">Сумма кредита</label>
                                                        <div class="a-slider-input-text js-a-slider-input-text">
                                                            <input class="a-slider-input-text__input headline-3 js-a-slider-input-text-input">
                                                            <button class="a-slider-input-text__button a-slider-input-text__button--edit js-a-slider-input-text-edit">
		<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-edit"></use>
			</svg>
</span>
                                                            </button>
                                                            <button class="a-slider-input-text__button a-slider-input-text__button--close js-a-slider-input-text-close">
		<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-close"></use>
			</svg>
</span>
                                                            </button>
                                                        </div>
                                                        <div class="a-slider-input__inner js-a-slider-input-inner">
                                                            <input id="amount-credit" class="a-slider-input__slider js-a-slider-input-slider" type="range" step="1" min="0" max="1" value="0">
                                                        </div>
                                                        <div class="a-slider-input-text-steps js-a-slider-input-text-steps"></div>
                                                    </div>
                                                    <div class="a-slider-input js-a-slider-input" data-type="month" data-steps="" data-start-value="31" data-max-value="60" data-min-value="1" data-step-size="1">
                                                        <label for="credit-term" class="a-slider-input__label body-s-light dark-70">Срок кредита</label>
                                                        <div class="a-slider-input-text js-a-slider-input-text">
                                                            <input class="a-slider-input-text__input headline-3 js-a-slider-input-text-input">
                                                            <button class="a-slider-input-text__button a-slider-input-text__button--edit js-a-slider-input-text-edit">
		<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-edit"></use>
			</svg>
</span>
                                                            </button>
                                                            <button class="a-slider-input-text__button a-slider-input-text__button--close js-a-slider-input-text-close">
		<span class="a-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-close"></use>
			</svg>
</span>
                                                            </button>
                                                        </div>
                                                        <div class="a-slider-input__inner js-a-slider-input-inner">
                                                            <input id="credit-term" class="a-slider-input__slider js-a-slider-input-slider" type="range" step="1" min="0" max="1" value="0">
                                                        </div>
                                                        <div class="a-slider-input-text-steps js-a-slider-input-text-steps"></div>
                                                    </div>

                                                    <div class="calculator-layout__agreements">

                                                        <div class="a-checkbox js-a-checkbox a-checkbox--m">
                                                            <label class="a-checkbox__inner" for="is-card-novkom">
                                                                <input class="a-checkbox__input" id="is-card-novkom" type="checkbox" checked="true">
                                                                <span class="a-checkbox__box">
			<span class="a-icon a-checkbox__icon size-s">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-check"></use>
			</svg>
</span>
		</span>
                                                            </label>
                                                            <div class="a-checkbox__label">
                                                                <div class="body-m-light">Получаю зарплату на карту НОВИКОМ</div>
                                                            </div>
                                                        </div>
                                                        <div class="a-checkbox js-a-checkbox a-checkbox--m">
                                                            <label class="a-checkbox__inner" for="insurance">
                                                                <input class="a-checkbox__input" id="insurance" type="checkbox">
                                                                <span class="a-checkbox__box">
			<span class="a-icon a-checkbox__icon size-s">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-check"></use>
			</svg>
</span>
		</span>
                                                            </label>
                                                            <div class="a-checkbox__label">
                                                                <div class="body-m-light">Страховка</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="calculator-layout__card">

                                                    <div class="calculator-card js-calculator-card calculator-card--white">
                                                        <div class="a-polygon-container js-a-polygon-container">
                                                            <div class="a-polygon-container__content">

                                                                <div class="calculator-card__inner">

                                                                    <div class="calculator-card-item js-calculator-card-item">
                                                                        <div class="calculator-card-item__hint body-s-light">Процентная ставка</div>
                                                                        <div class="calculator-card-item__value">
                                                                            <div class="calculator-card-item__text number-l-heavy">
                                                                                <span class="calculator-card-item__number js-calculator-card-item-number">16,5%</span>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="calculator-card-item js-calculator-card-item">
                                                                        <div class="calculator-card-item__hint body-s-light">Ежемесячный платеж</div>
                                                                        <div class="calculator-card-item__value">
                                                                            <div class="calculator-card-item__text number-l-heavy">
                                                                                <span class="calculator-card-item__number js-calculator-card-item-number">35 404,38</span>
                                                                                <span class="calculator-card-item__currency currency">₽</span>
                                                                            </div>
                                                                            <a href="#" class="a-button calculator-card-item__link js-calculator-card-item-link a-button--s a-button--primary a-button--link a-button--text">График платежей
                                                                                <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="calculator-card-item js-calculator-card-item">
                                                                        <div class="calculator-card-item__hint body-s-light">Диапазон полной стоимости кредита</div>
                                                                        <div class="calculator-card-item__value">
                                                                            <div class="calculator-card-item__text number-l-heavy">
                                                                                <span class="calculator-card-item__number js-calculator-card-item-number">16,464 – 20,474 %</span>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="calculator-card__footer">
                                                                        <button class="a-button js-calculator-card-button a-button--lm a-button--primary a-button--full">Оформить заявку
                                                                        </button>
                                                                        <div class="calculator-card__note body-s-light">
                                                                            Калькулятор не гарантирует точность расчетов. Окончательные параметры кредита определяются по итогам рассмотрения заявки.
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="a-polygon-container__polygon js-a-polygon-container-polygon green-100">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="js-a-polygon-container-svg">
                                                                    <polygon points="" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="1">

                                            Калькулятор 1

                                        </div>
                                        <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="2">

                                            Калькулятор 2

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </section>
        <section class="section-layout section-client-info">

            <div class="content-container">
                <div class="section-client-info__container">
                    <div class="section-client-info__top">
                        <div class="announcement-card-clients section-client-info__announcement-card">
                            <a href="#" class="announcement-card-clients__title headline-2">
                                <span>Объявления <span>для клиентов</span></span>
                                <span class="a-icon announcement-card-clients__title-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span>
                            </a>

                            <div class="announcement-card-clients__swiper swiper js-announcement-card-clients-swiper">
                                <div class="announcement-card-clients__swiper-wrapper swiper-wrapper">
                                    <a href="#" class="announcement-card-clients-item announcement-card-clients__swiper-slide swiper-slide">
                                        <div class="announcement-card-clients-item__date body-m-light dark-70">25.04.2024</div>
                                        <div class="announcement-card-clients-item__title body-m-light">Технические работы 30 апреля 2024 года в период с 0:00 до 3:30 (МСК)</div>
                                        <span class="a-icon announcement-card-clients-item__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span>
                                    </a><a href="#" class="announcement-card-clients-item announcement-card-clients__swiper-slide swiper-slide">
                                        <div class="announcement-card-clients-item__date body-m-light dark-70">25.04.2024</div>
                                        <div class="announcement-card-clients-item__title body-m-light">Режим работы клиентских офисов в мае</div>
                                        <span class="a-icon announcement-card-clients-item__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span>
                                    </a><a href="#" class="announcement-card-clients-item announcement-card-clients__swiper-slide swiper-slide">
                                        <div class="announcement-card-clients-item__date body-m-light dark-70">25.04.2024</div>
                                        <div class="announcement-card-clients-item__title body-m-light">Технические работы 30 апреля 2024 года в период с 0:00 до 3:30 (МСК)</div>
                                        <span class="a-icon announcement-card-clients-item__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span>
                                    </a><a href="#" class="announcement-card-clients-item announcement-card-clients__swiper-slide swiper-slide">
                                        <div class="announcement-card-clients-item__date body-m-light dark-70">25.04.2024</div>
                                        <div class="announcement-card-clients-item__title body-m-light">Режим работы клиентских офисов в мае</div>
                                        <span class="a-icon announcement-card-clients-item__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span>
                                    </a><a href="#" class="announcement-card-clients-item announcement-card-clients__swiper-slide swiper-slide">
                                        <div class="announcement-card-clients-item__date body-m-light dark-70">25.04.2024</div>
                                        <div class="announcement-card-clients-item__title body-m-light">Технические работы 30 апреля 2024 года в период с 0:00 до 3:30 (МСК)</div>
                                        <span class="a-icon announcement-card-clients-item__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span>
                                    </a><a href="#" class="announcement-card-clients-item announcement-card-clients__swiper-slide swiper-slide">
                                        <div class="announcement-card-clients-item__date body-m-light dark-70">25.04.2024</div>
                                        <div class="announcement-card-clients-item__title body-m-light">Режим работы клиентских офисов в мае</div>
                                        <span class="a-icon announcement-card-clients-item__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-arrow-right"></use>
			</svg>
</span>
                                    </a>
                                </div>
                                <div class="slider-controls js-swiper-controls announcement-card-clients__controls">
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
                    <div class="section-client-info__bottom">
                        <a href="#" class="card-about-bank section-client-info__about-card">
                            <div class="card-about-bank__row">
                                <div class="card-about-bank__col">
                                    <div class="card-about-bank__title headline-2">
                                        О банке
                                        <span class="a-icon card-about-bank__title-icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
			</svg>
</span>
                                    </div>

                                    <div class="card-about-bank__items">
                                        <div class="card-about-bank-item">
                                            <div class="card-about-bank-item__title violet-100 number-m-heavy">30 лет</div>
                                            <div class="card-about-bank-item__description body-s-heavy">
                                                успешной работы в реальном секторе российской экономики
                                            </div>
                                        </div><div class="card-about-bank-item">
                                            <div class="card-about-bank-item__title violet-100 number-m-heavy">19,4 млн</div>
                                            <div class="card-about-bank-item__description body-s-heavy">
                                                рекордная чистая прибыль<br>за&nbsp;2022 г.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-about-bank__col">
                                    <div class="card-about-bank__top-title dark-0">
                                        Топ
                                        <div class="card-about-bank__top-title-decor">
                                            <svg width="85" height="30" viewBox="0 0 85 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.3574 7.16406H25.4297V5.82227H26.4297V8.16406H24.3574V7.16406ZM25.4297 3.13867H26.4297V0.796875H24.416V1.79688H25.4297V3.13867ZM22.3887 1.79688V0.796875H20.3613V1.79688H22.3887ZM18.334 1.79688V0.796875H16.3066V1.79688H18.334ZM14.2793 1.79688V0.796875H12.252V1.79688H14.2793ZM10.2246 1.79688V0.796875H8.19727V1.79688H10.2246ZM6.16992 1.79688V0.796875H4.14258V1.79688H6.16992ZM2.11523 1.79688V0.796875H0.101562V3.13867H1.10156V1.79688H2.11523ZM1.10156 5.82227H0.101562V8.16406H2.17676V7.16406H1.10156V5.82227ZM4.32715 7.16406V8.16406H6.47754V7.16406H4.32715ZM8.62793 7.16406V8.16406H8.70312V8.20586H9.70312V7.16406H8.62793ZM9.70312 10.2895H8.70312V12.373H9.70312V10.2895ZM9.70312 14.4566H8.70312V16.5402H9.70312V14.4566ZM9.70312 18.6238H8.70312V20.7074H9.70312V18.6238ZM9.70312 22.791H8.70312V24.8746H9.70312V22.791ZM9.70312 26.9582H8.70312V29H10.5967V28H9.70312V26.9582ZM12.3838 28V29H14.1709V28H12.3838ZM15.958 28V29H17.8516V26.9582H16.8516V28H15.958ZM16.8516 24.8746H17.8516V22.791H16.8516V24.8746ZM16.8516 20.7074H17.8516V18.6238H16.8516V20.7074ZM16.8516 16.5402H17.8516V14.4566H16.8516V16.5402ZM16.8516 12.373H17.8516V10.2895H16.8516V12.373ZM16.8516 8.20586H17.8516V8.16406H17.9238V7.16406H16.8516V8.20586ZM20.0684 7.16406V8.16406H22.2129V7.16406H20.0684ZM35.1801 27.0855C35.5352 27.267 35.9022 27.4312 36.2812 27.5781C36.6825 27.7321 37.0937 27.8662 37.5149 27.9802L37.2535 28.9455C36.8 28.8227 36.3564 28.6781 35.9229 28.5117L35.9197 28.5105C35.5095 28.3514 35.1112 28.1733 34.7251 27.976L35.1801 27.0855ZM40.0703 28.4178L39.9905 29.4147C40.4418 29.4508 40.9007 29.4688 41.3672 29.4688C41.8516 29.4688 42.326 29.4517 42.7903 29.4172L42.7164 28.4199C42.2778 28.4525 41.828 28.4688 41.3672 28.4688C40.9264 28.4688 40.4941 28.4518 40.0703 28.4178ZM45.3783 27.9878L45.631 28.9554C46.107 28.831 46.5694 28.6838 47.0179 28.5134C47.4329 28.3572 47.8345 28.1824 48.2223 27.9889L47.7756 27.0941C47.419 27.2722 47.0485 27.4335 46.6641 27.5781C46.2497 27.7356 45.8211 27.8721 45.3783 27.9878ZM49.8069 25.7778L50.4435 26.5491C50.7847 26.2674 51.1092 25.9662 51.4169 25.6455C51.4168 25.6455 51.417 25.6454 51.4169 25.6455L51.056 25.2994M51.056 25.2994L51.4169 25.6455C51.7343 25.3148 52.0317 24.9656 52.3089 24.598L51.9097 24.2969C51.6443 24.6488 51.3597 24.9831 51.056 25.2994ZM52.787 21.8334L53.6977 22.2465C53.8809 21.8426 54.0464 21.4244 54.1946 20.9922C54.366 20.5049 54.5135 20.0003 54.6377 19.4789L53.6649 19.2473C53.5481 19.7376 53.4098 20.2099 53.25 20.6641C53.1114 21.0687 52.957 21.4585 52.787 21.8334ZM54.0931 16.3278L55.0909 16.3939C55.1241 15.892 55.1406 15.3779 55.1406 14.8516C55.1406 14.5136 55.1335 14.1808 55.1193 13.8529L54.1202 13.8963C54.1338 14.2092 54.1406 14.5276 54.1406 14.8516C54.1406 15.357 54.1248 15.8491 54.0931 16.3278ZM53.9443 11.9951C53.8494 11.344 53.7202 10.7208 53.5567 10.1256L54.521 9.86069C54.6961 10.4981 54.8334 11.1617 54.9338 11.851L53.9443 11.9951ZM52.9204 8.32603L53.8353 7.92241C53.6952 7.6047 53.5435 7.29533 53.3804 6.99443C53.2416 6.73515 53.0961 6.48268 52.9439 6.2371L52.094 6.76401C52.2353 6.99195 52.3706 7.22686 52.5 7.46875C52.6505 7.74608 52.7906 8.03184 52.9204 8.32603ZM51.1449 5.44436C50.7948 5.02392 50.4182 4.63455 50.0149 4.27626L50.6792 3.52873C51.1203 3.92071 51.5317 4.34614 51.9134 4.80447L51.1449 5.44436ZM48.7216 3.29204L49.2656 2.45295C49.0192 2.29323 48.7661 2.14203 48.5064 1.99933C48.239 1.85134 47.9665 1.71301 47.6889 1.58436L47.2684 2.49167C47.5249 2.61052 47.7766 2.7383 48.0234 2.875C48.2627 3.00638 48.4954 3.1454 48.7216 3.29204ZM49.8069 25.7778C50.1181 25.521 50.4142 25.2461 50.6953 24.9531C50.9852 24.6512 51.2569 24.3321 51.5105 23.9959M33.1642 25.7665C32.8551 25.5129 32.5582 25.2418 32.2734 24.9531C31.9824 24.65 31.7081 24.3295 31.4505 23.9918L30.6554 24.5983C30.9357 24.9657 31.2346 25.3149 31.552 25.6457L31.5615 25.6554C31.8706 25.9687 32.1934 26.2635 32.53 26.5396L33.1642 25.7665ZM30.1398 21.8306C29.9617 21.4565 29.7979 21.0677 29.6484 20.6641C29.4846 20.2105 29.3429 19.7388 29.2231 19.2491L28.2517 19.4866C28.3796 20.0094 28.5315 20.5152 28.7079 21.0037L28.7107 21.0114C28.8701 21.4419 29.0455 21.8583 29.2369 22.2604L30.1398 21.8306ZM28.7833 16.329L27.7856 16.3968C27.7514 15.894 27.7344 15.3788 27.7344 14.8516C27.7344 14.5157 27.741 14.1848 27.7543 13.859L28.7535 13.8998C28.7407 14.2116 28.7344 14.5288 28.7344 14.8516C28.7344 15.3574 28.7507 15.8499 28.7833 16.329ZM28.9182 12.0045L27.9275 11.8689C28.0213 11.1827 28.1498 10.5219 28.3137 9.88717L29.2819 10.1372C29.1284 10.7317 29.0072 11.3542 28.9182 12.0045ZM29.8822 8.33236C30.0053 8.03594 30.1383 7.74807 30.2812 7.46875C30.4054 7.22614 30.5358 6.99055 30.6726 6.76198L29.8146 6.24843C29.6662 6.49643 29.525 6.75141 29.391 7.01327C29.2358 7.31666 29.0917 7.62855 28.9587 7.94882L29.8822 8.33236ZM31.5984 5.43921L30.8235 4.80705C31.199 4.34679 31.6061 3.91973 32.0445 3.52643L32.7122 4.27077C32.3128 4.62911 31.9415 5.01859 31.5984 5.43921ZM33.9942 3.2896L33.4493 2.4511C33.6946 2.2917 33.9469 2.14084 34.2061 1.99848C34.4861 1.84472 34.773 1.70152 35.0667 1.56886L35.4784 2.4802C35.2081 2.60229 34.9444 2.73389 34.6875 2.875C34.4496 3.00566 34.2185 3.14386 33.9942 3.2896ZM44.3852 20.6232C44.2454 20.7773 44.095 20.9139 43.9338 21.0341L43.9262 21.0398C43.7697 21.1587 43.5979 21.263 43.4093 21.352L43.8363 22.2563C44.086 22.1384 44.3177 21.9982 44.5312 21.8359C44.7452 21.6765 44.9435 21.4962 45.1259 21.2951L44.3852 20.6232ZM42.2731 22.6821L42.1592 21.6886C41.9415 21.7136 41.7089 21.7266 41.4609 21.7266C41.2089 21.7266 40.9722 21.7135 40.7502 21.6884L40.6378 22.682C40.9 22.7117 41.1744 22.7266 41.4609 22.7266C41.7437 22.7266 42.0145 22.7117 42.2731 22.6821ZM39.0516 22.2563L39.4727 21.3493C39.2789 21.2594 39.1024 21.1541 38.9412 21.0341C38.779 20.9132 38.627 20.7756 38.4852 20.6201L37.7464 21.294C37.9302 21.4955 38.1294 21.6762 38.3438 21.8359C38.5616 21.9982 38.7975 22.1384 39.0516 22.2563ZM45.5591 17.9269C45.4896 18.2705 45.4073 18.5888 45.3132 18.8827L45.3096 18.8943C45.2385 19.1262 45.1588 19.3407 45.0715 19.5387L45.9864 19.9423C46.0908 19.7057 46.1839 19.4541 46.2656 19.1875C46.3719 18.8554 46.4631 18.5014 46.5392 18.1255L45.5591 17.9269ZM46.8008 15.9485L45.8021 15.8968C45.8194 15.5629 45.8281 15.2145 45.8281 14.8516C45.8281 14.4894 45.8196 14.1426 45.8027 13.8111L46.8014 13.7603C46.8192 14.11 46.8281 14.4737 46.8281 14.8516C46.8281 15.2305 46.819 15.5961 46.8008 15.9485ZM46.5421 11.5944L45.5623 11.7942C45.4925 11.4518 45.4099 11.1379 45.3156 10.8514L45.3131 10.8436L45.3107 10.8359C45.2398 10.6079 45.1605 10.3973 45.0736 10.2033L45.9863 9.79452C46.0907 10.0277 46.1838 10.2759 46.2656 10.5391C46.3732 10.8664 46.4654 11.2182 46.5421 11.5944ZM38.0758 8.12552C37.7778 8.3772 37.5155 8.6739 37.2891 9.01562C37.1563 9.21974 37.0339 9.43991 36.922 9.67614L37.8258 10.1042C37.9192 9.90702 38.0192 9.72753 38.1249 9.56459C38.301 9.29946 38.5 9.07613 38.721 8.88955L38.0758 8.12552ZM76.6875 8.20586V7.16406H75.501V8.16406H75.6875V8.20586H76.6875ZM67.1953 26.9582H68.1953V29H66.3018V28H67.1953V26.9582ZM64.5146 28V29H62.7275V28H64.5146ZM60.9404 28V29H59.0469V27.0642H60.0469V28H60.9404ZM82.8672 1.79688H83.8594V2.7327H84.8594V0.796875H82.8672V1.79688ZM82.9629 28V29H84.8594V27.0642H83.8594V28H82.9629ZM81.1699 28V29H79.377V28H81.1699ZM76.6875 10.2895H75.6875V12.373H76.6875V10.2895ZM76.6875 14.4566H75.6875V16.5402H76.6875V14.4566ZM76.6875 18.6238H75.6875V20.7074H76.6875V18.6238ZM76.6875 22.791H75.6875V24.8746H76.6875V22.791ZM76.6875 26.9582H75.6875V29H77.584V28H76.6875V26.9582ZM83.8594 25.1925H84.8594V23.3209H83.8594V25.1925ZM83.8594 21.4492H84.8594V19.5776H83.8594V21.4492ZM83.8594 17.7059H84.8594V15.8343H83.8594V17.7059ZM83.8594 13.9626H84.8594V12.091H83.8594V13.9626ZM83.8594 10.2193H84.8594V8.34766H83.8594V10.2193ZM83.8594 6.476H84.8594V4.60435H83.8594V6.476ZM80.8828 1.79688V0.796875H78.8984V1.79688H80.8828ZM76.9141 1.79688V0.796875H74.9297V1.79688H76.9141ZM72.9453 1.79688V0.796875H70.9609V1.79688H72.9453ZM68.9766 1.79688V0.796875H66.9922V1.79688H68.9766ZM65.0078 1.79688V0.796875H63.0234V1.79688H65.0078ZM61.0391 1.79688H60.0469V2.7327H59.0469V0.796875H61.0391V1.79688ZM60.0469 4.60435H59.0469V6.476H60.0469V4.60435ZM60.0469 8.34766H59.0469V10.2193H60.0469V8.34766ZM60.0469 12.091H59.0469V13.9626H60.0469V12.091ZM60.0469 15.8343H59.0469V17.7059H60.0469V15.8343ZM60.0469 19.5776H59.0469V21.4492H60.0469V19.5776ZM60.0469 23.3209H59.0469V25.1925H60.0469V23.3209ZM67.1953 24.8746H68.1953V22.791H67.1953V24.8746ZM67.1953 20.7074H68.1953V18.6238H67.1953V20.7074ZM67.1953 16.5402H68.1953V14.4566H67.1953V16.5402ZM67.1953 12.373H68.1953V10.2895H67.1953V12.373ZM67.1953 8.20586H68.1953V8.16406H68.3818V7.16406H67.1953V8.20586ZM70.7549 7.16406V8.16406H73.1279V7.16406H70.7549ZM45.6865 1.89004C45.1548 1.72896 44.6053 1.60112 44.0379 1.50653L44.2023 0.520146C44.8106 0.62156 45.4022 0.759016 45.9765 0.933001L45.6865 1.89004ZM42.3545 1.32604L42.4056 0.327347C42.1097 0.312218 41.8105 0.304688 41.5078 0.304688C41.1934 0.304688 40.8832 0.311755 40.5773 0.325955L40.6237 1.32488C40.9137 1.31142 41.2084 1.30469 41.5078 1.30469C41.7939 1.30469 42.0761 1.31181 42.3545 1.32604ZM38.8647 1.49789C38.2659 1.59015 37.6903 1.71547 37.1379 1.87382L36.8623 0.912544C37.4573 0.741973 38.0742 0.607886 38.7124 0.509552L38.8647 1.49789ZM36.036 14.0952L37.0354 14.1293C37.0275 14.363 37.0234 14.6038 37.0234 14.8516C37.0234 15.2145 37.0322 15.5629 37.0494 15.8968L36.0508 15.9485C36.0326 15.5961 36.0234 15.2305 36.0234 14.8516C36.0234 14.593 36.0276 14.3409 36.036 14.0952ZM36.3123 18.1255L37.2924 17.9269C37.362 18.2705 37.4443 18.5888 37.5384 18.8827C37.6128 19.1153 37.6954 19.3306 37.7854 19.5295L36.8743 19.9418C36.7673 19.7053 36.6712 19.4539 36.5859 19.1875C36.4797 18.8554 36.3885 18.5014 36.3123 18.1255ZM45.1251 8.46495L44.3917 9.14474C44.2532 8.99528 44.1041 8.86303 43.944 8.74692C43.7823 8.62959 43.6046 8.5265 43.4091 8.43833L43.8203 7.52678C44.0755 7.64191 44.3125 7.77881 44.5312 7.9375C44.7449 8.09253 44.9429 8.26835 45.1251 8.46495ZM42.2351 7.11344L42.1259 8.10745C41.9034 8.08301 41.6664 8.07031 41.4141 8.07031C41.0435 8.07031 40.7058 8.09864 40.3987 8.15205L40.2274 7.16684C40.5974 7.10249 40.9929 7.07031 41.4141 7.07031C41.6998 7.07031 41.9735 7.08469 42.2351 7.11344ZM36.4212 11.1008L37.3906 11.3464C37.2865 11.7569 37.2032 12.2104 37.1424 12.7087L36.1497 12.5876C36.215 12.0531 36.3054 11.5575 36.4212 11.1008Z" fill="#55246A"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-about-bank__top-number dark-0">
                                        20
                                        <div class="card-about-bank__top-number-decor">
                                            <svg width="131" height="92" viewBox="0 0 131 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M59.5488 89H61.6875V87.0957H62.6875V90H59.5488V89ZM61.6875 83.2871H62.6875V79.4785H61.6875V83.2871ZM61.6875 75.6699H62.6875V72.7656H59.8213V73.7656H61.6875V75.6699ZM56.0889 73.7656V72.7656H52.3565V73.7656H56.0889ZM48.624 73.7656V72.7656H44.8916V73.7656H48.624ZM41.1592 73.7656V72.7656H37.4268V73.7656H41.1592ZM33.6944 73.7656V72.7656H29.9619V73.7656H33.6944ZM26.2295 73.7656V72.7656H26.013L26.4257 72.377L25.7403 71.6489L24.3633 72.9453V73.7656H26.2295ZM28.4942 69.0562L29.1796 69.7842L31.9336 67.1915L31.2481 66.4634L28.4942 69.0562ZM34.002 63.8706L34.6875 64.5987L36.057 63.3092L36.0606 63.3059C36.6233 62.7868 37.1768 62.2728 37.7212 61.7637L37.0382 61.0333C36.4943 61.5418 35.9413 62.0555 35.3789 62.5742L34.002 63.8706ZM40.3218 57.9168L41.0159 58.6367C42.1427 57.5502 43.2241 56.4886 44.2601 55.4519L43.5528 54.745C42.5214 55.7771 41.4444 56.8344 40.3218 57.9168ZM46.718 51.507L47.4413 52.1975C47.9756 51.6377 48.4953 51.0859 49.0003 50.5421C49.418 50.097 49.8246 49.6512 50.22 49.2046L49.4712 48.5417C49.082 48.9815 48.6814 49.4207 48.2696 49.8594C47.7672 50.4004 47.25 50.9496 46.718 51.507ZM51.7483 45.7982L52.5387 46.4108C53.2998 45.4287 54.0074 44.4427 54.6612 43.4526L53.8267 42.9016C53.1875 43.8696 52.4947 44.8351 51.7483 45.7982ZM55.6621 39.8455L56.5416 40.3214C56.8351 39.779 57.1127 39.2354 57.3742 38.6905C57.624 38.1701 57.8578 37.6425 58.0755 37.108L57.1494 36.7308C56.9393 37.2466 56.7137 37.7556 56.4727 38.2578C56.2183 38.7878 55.9481 39.317 55.6621 39.8455ZM58.2202 33.5681L59.1848 33.8318C59.4855 32.7314 59.7244 31.6053 59.9017 30.4538L58.9133 30.3017C58.7417 31.4165 58.5107 32.5053 58.2202 33.5681ZM59.2453 26.9787L60.2442 27.0268C60.2715 26.4596 60.2852 25.8868 60.2852 25.3086C60.2852 24.7638 60.2691 24.2251 60.2369 23.6927L59.2387 23.7531C59.2697 24.2649 59.2852 24.7834 59.2852 25.3086C59.2852 25.8711 59.2719 26.4278 59.2453 26.9787ZM58.849 20.6673L59.8303 20.4751C59.6194 19.3982 59.335 18.3511 58.9767 17.3342L58.0336 17.6664C58.3754 18.6367 58.6472 19.637 58.849 20.6673ZM56.7839 14.819L57.6671 14.3499C57.4136 13.8726 57.1418 13.4034 56.8518 12.9424C56.5587 12.4715 56.2494 12.0132 55.924 11.5674L55.1163 12.1571C55.4276 12.5834 55.7235 13.0219 56.0039 13.4727C56.2815 13.9139 56.5415 14.3626 56.7839 14.819ZM53.0603 9.742L53.7716 9.0391C53.0021 8.26041 52.1711 7.53254 51.2792 6.85536L50.6745 7.65179C51.5297 8.30111 52.325 8.99785 53.0603 9.742ZM5.83669 72.3264L8.52468 69.6091L7.81375 68.9059L5.12576 71.6232L5.83669 72.3264ZM11.2127 66.8918L10.5017 66.1886L13.1897 63.4713L13.9007 64.1746L11.2127 66.8918ZM16.5886 61.4573L19.2766 58.74L18.5657 58.0367L15.8777 60.754L16.5886 61.4573ZM21.9646 56.0227L21.2537 55.3194L22.5921 53.9664L22.5948 53.9637C23.0453 53.501 23.4865 53.0464 23.9184 52.5998L24.6372 53.2949C24.2037 53.7432 23.7608 54.1996 23.3086 54.6641L21.9646 56.0227ZM27.2779 50.5427L26.5533 49.8535C27.4738 48.8858 28.3426 47.9628 29.1599 47.0844L29.892 47.7655C29.072 48.6469 28.2006 49.5726 27.2779 50.5427ZM41.187 29.4612L40.1929 29.3526C40.2621 28.7191 40.2969 28.0743 40.2969 27.418C40.2969 26.7198 40.2541 26.0674 40.1705 25.4598L41.1612 25.3235C41.2517 25.981 41.2969 26.6792 41.2969 27.418C41.2969 28.1097 41.2603 28.7908 41.187 29.4612ZM32.9066 17.3534L32.7732 18.3444C32.1741 18.2638 31.539 18.2227 30.8672 18.2227C30.0665 18.2227 29.2723 18.2691 28.4844 18.3619L28.3675 17.3687C29.1945 17.2713 30.0277 17.2227 30.8672 17.2227C31.5797 17.2227 32.2595 17.2662 32.9066 17.3534ZM23.5043 18.5287L23.8455 19.4687C23.1053 19.7373 22.3693 20.0499 21.6374 20.4067C20.8079 20.8111 19.9662 21.2633 19.1124 21.7638L18.6067 20.9011C19.4811 20.3886 20.3453 19.9241 21.1992 19.5078C21.9618 19.1361 22.7301 18.8097 23.5043 18.5287ZM7.72268 21.6392L5.26174 18.7241L4.49762 19.3692L6.95856 22.2842L7.72268 21.6392ZM1.57033 14.3516C2.1906 13.8199 2.81956 13.2957 3.4572 12.7789L2.82757 12.002C2.18283 12.5245 1.54682 13.0546 0.91954 13.5923L0.165955 14.2382L2.03669 16.4542L2.8008 15.8091L1.57033 14.3516ZM16.4557 4.73369L16.099 3.79948C16.9329 3.48107 17.7905 3.18448 18.6718 2.9096C19.2088 2.73829 19.7598 2.5794 20.3245 2.43284L20.5757 3.40078C20.0269 3.5432 19.4925 3.69737 18.9727 3.86328C18.1094 4.13246 17.2704 4.4226 16.4557 4.73369ZM30.4869 2.12692L30.4608 1.12726C31.0174 1.11273 31.5826 1.10547 32.1563 1.10547C32.8018 1.10547 33.4377 1.11857 34.0639 1.14481L34.022 2.14394C33.4102 2.11829 32.7883 2.10547 32.1563 2.10547C31.591 2.10547 31.0345 2.11262 30.4869 2.12692ZM37.7371 2.47435L37.8752 1.48394C39.1812 1.66607 40.4389 1.91428 41.6479 2.22927L41.3958 3.19696C40.2265 2.89232 39.0069 2.65145 37.7371 2.47435ZM27.1549 2.31148L27.0684 1.31523C25.8967 1.41692 24.7679 1.55575 23.6822 1.73209L23.8425 2.71915C24.902 2.54707 26.0061 2.41118 27.1549 2.31148ZM11.6302 6.97851L11.1413 6.10619C10.3325 6.55951 9.5531 7.0396 8.80323 7.54656L8.79777 7.55027C8.11305 8.01979 7.43675 8.49663 6.76886 8.9808L7.35578 9.79044C8.01656 9.31143 8.68573 8.83962 9.3633 8.375C10.0895 7.88406 10.8451 7.41856 11.6302 6.97851ZM10.1836 24.5542L9.4195 25.1993L11.2888 27.4135L12.0516 26.7821C12.8175 26.1483 13.5753 25.5485 14.3251 24.9826L13.7227 24.1844C12.9603 24.7599 12.1908 25.369 11.4141 26.0117L10.1836 24.5542ZM36.775 18.6016L36.2825 19.4719C36.8136 19.7724 37.3024 20.1275 37.7501 20.5379L37.7581 20.5453L37.7662 20.5524C38.224 20.9541 38.6183 21.412 38.9506 21.9285L39.7916 21.3874C39.4092 20.7931 38.9539 20.2642 38.4258 19.8008C37.9221 19.339 37.3718 18.9393 36.775 18.6016ZM40.2773 33.4436L39.3351 33.1083C39.1207 33.7108 38.8701 34.3035 38.5832 34.8866L38.5776 34.8982C38.2555 35.5746 37.8718 36.2783 37.4249 37.0094L38.2781 37.5309C38.7409 36.7738 39.1417 36.0395 39.4805 35.3281C39.7841 34.711 40.0497 34.0828 40.2773 33.4436ZM35.3604 41.6145L34.5826 40.9861C34.0866 41.5999 33.5554 42.2276 32.9887 42.8693C32.5887 43.3231 32.1675 43.7954 31.7263 44.2849L32.4692 44.9544C32.9125 44.4624 33.3356 43.988 33.7383 43.5312C34.3139 42.8795 34.8546 42.2406 35.3604 41.6145ZM3.1487 75.0437L1.80471 76.4023V77.9771H0.804707V75.9913L2.43777 74.3404L3.1487 75.0437ZM1.80471 81.1265H0.804707V84.2759H1.80471V81.1265ZM1.80471 87.4253H0.804707V90H3.94338V89H1.80471V87.4253ZM8.22072 89V90H12.4981V89H8.22072ZM16.7754 89V90H21.0528V89H16.7754ZM25.3301 89V90H29.6074V89H25.3301ZM33.8848 89V90H38.1621V89H33.8848ZM42.4395 89V90H46.7168V89H42.4395ZM50.9942 89V90H55.2715V89H50.9942ZM44.9332 4.37591L45.3151 3.45173C45.9176 3.70074 46.5052 3.96974 47.0779 4.25879C47.5734 4.5066 48.0561 4.76542 48.526 5.03528L48.0279 5.90241C47.5746 5.64206 47.1083 5.39203 46.6289 5.15234C46.0786 4.87453 45.5134 4.61572 44.9332 4.37591ZM46.8525 4.70513L47.0761 4.25792L47.0779 4.25879L47.0796 4.25966L46.8543 4.706M81.2374 83.4548C81.7898 83.9831 82.363 84.4839 82.9571 84.957C83.5488 85.4231 84.1626 85.8579 84.7985 86.2614L84.2627 87.1058C83.5982 86.684 82.9566 86.2296 82.3383 85.7426L82.334 85.7393C81.7162 85.2471 81.1202 84.7265 80.5462 84.1774L81.2374 83.4548ZM88.8257 88.2872L88.4645 89.2197C89.8861 89.7704 91.3854 90.2034 92.9609 90.5203L93.158 89.5399C91.6351 89.2337 90.191 88.8161 88.8257 88.2872ZM97.6334 90.1068L97.5747 91.1051C98.3321 91.1497 99.1041 91.1719 99.8906 91.1719C100.514 91.1719 101.128 91.1592 101.733 91.1338L101.691 90.1347C101.101 90.1595 100.501 90.1719 99.8906 90.1719C99.1229 90.1719 98.3705 90.1502 97.6334 90.1068ZM105.275 89.8139L105.414 90.8041C106.678 90.6262 107.893 90.3835 109.058 90.075L108.803 89.1083C107.678 89.406 106.502 89.6412 105.275 89.8139ZM112.208 87.9499L112.598 88.8706C113.18 88.624 113.747 88.3574 114.298 88.0707C114.795 87.8119 115.28 87.5384 115.754 87.2501L115.234 86.3958C114.78 86.6724 114.314 86.935 113.836 87.1836C113.309 87.4579 112.766 87.7133 112.208 87.9499ZM78.2271 80.0258C77.3461 78.8333 76.5382 77.5441 75.8036 76.158L74.92 76.6263C75.6766 78.0538 76.5106 79.3854 77.4229 80.62L78.2271 80.0258ZM71.6588 64.043L70.6798 64.2469C70.4108 62.9551 70.1745 61.6251 69.9707 60.2571L70.9598 60.1097C71.1609 61.4598 71.3939 62.7709 71.6588 64.043ZM70.4715 56.1439L69.4764 56.242C69.3472 54.9312 69.2448 53.5887 69.169 52.2147L70.1675 52.1597C70.2425 53.52 70.3438 54.848 70.4715 56.1439ZM70.0248 48.1667L69.025 48.1839C69.0136 47.5188 69.0078 46.8468 69.0078 46.168C69.0078 45.4894 69.0129 44.8178 69.0231 44.1533L70.023 44.1687C70.0129 44.828 70.0078 45.4944 70.0078 46.168C70.0078 46.8412 70.0135 47.5074 70.0248 48.1667ZM70.1507 40.1743L69.1519 40.1251C69.2197 38.7502 69.3115 37.408 69.4273 36.0987L70.4234 36.1868C70.3088 37.4826 70.2179 38.8118 70.1507 40.1743ZM70.8631 32.2141L69.8719 32.0811C70.0561 30.7086 70.2698 29.3761 70.5132 28.0837L71.4959 28.2687C71.2559 29.543 71.045 30.8581 70.8631 32.2141ZM75.3626 16.0969L74.4704 15.6453C75.1978 14.2083 76.0068 12.8683 76.8982 11.6266L77.7105 12.2098C76.8508 13.4073 76.0682 14.703 75.3626 16.0969ZM80.669 8.7665C81.2144 8.2369 81.7818 7.73531 82.3711 7.26172C82.9752 6.77632 83.6072 6.32443 84.2671 5.90604L83.7316 5.06148C83.0405 5.49967 82.3781 5.97325 81.7447 6.48221C81.1309 6.97549 80.5401 7.49781 79.9723 8.04906L80.669 8.7665ZM73.5815 20.2754L72.6393 19.9404C72.3836 20.6592 72.1439 21.3971 71.92 22.1538L71.9189 22.1575C71.7317 22.7994 71.5536 23.4534 71.3847 24.1196L72.354 24.3655C72.5201 23.7104 72.6951 23.0677 72.8789 22.4375C73.0979 21.6974 73.3321 20.9767 73.5815 20.2754ZM72.5999 67.9257L71.6366 68.1943C71.8211 68.8556 72.0153 69.5056 72.2193 70.1442L72.2199 70.1459C72.4623 70.9001 72.7199 71.6355 72.9928 72.352L73.9273 71.9961C73.6609 71.2966 73.4091 70.5779 73.1719 69.8398C72.9717 69.2134 72.7811 68.5753 72.5999 67.9257ZM114.935 5.949L115.476 5.10795C116.135 5.53163 116.771 5.98784 117.385 6.47647C118.009 6.96372 118.611 7.48029 119.191 8.02607L118.505 8.7543C117.946 8.22833 117.366 7.7308 116.766 7.26172C116.177 6.79288 115.567 6.35531 114.935 5.949ZM121.55 12.1758L122.351 11.577C123.274 12.8104 124.117 14.1434 124.884 15.5745L124.002 16.0465C123.258 14.657 122.441 13.3667 121.55 12.1758ZM125.902 20.2171L126.835 19.8578C127.111 20.5758 127.373 21.313 127.619 22.0694L126.668 22.3789C126.875 23.0127 127.068 23.6411 127.255 24.2996L128.217 24.0258C128.028 23.3615 127.828 22.7093 127.619 22.0694L127.618 22.0678L126.668 22.3789M127.255 24.2996C127.069 23.6469 126.873 23.0066 126.668 22.3789C126.427 21.6387 126.172 20.9181 125.902 20.2171M108.407 70.1359C107.976 70.9711 107.501 71.7122 106.98 72.3594C106.546 72.9023 106.071 73.3766 105.554 73.7823L104.936 72.9958C105.389 72.6403 105.811 72.2211 106.2 71.7347L106.201 71.733C106.674 71.1443 107.114 70.4606 107.519 69.6772L108.407 70.1359ZM101.9 75.4049L101.717 74.4218C101.148 74.5277 100.54 74.582 99.8906 74.582C99.2334 74.582 98.6185 74.5268 98.0441 74.4193L97.8602 75.4022C98.5006 75.5221 99.1774 75.582 99.8906 75.582C100.596 75.582 101.265 75.523 101.9 75.4049ZM94.1729 73.75C93.6536 73.3368 93.1767 72.8537 92.7422 72.3008C92.232 71.6515 91.7649 70.9075 91.3407 70.0689L92.2331 69.6175C92.6315 70.4052 93.0642 71.092 93.5285 71.683C93.9178 72.1785 94.3405 72.6054 94.7955 72.9674L94.1729 73.75ZM89.5822 65.1019C89.3836 64.287 89.2065 63.425 89.0508 62.5156C88.946 61.8634 88.849 61.1872 88.7598 60.4872L89.7517 60.3608C89.8394 61.0489 89.9346 61.7125 90.0373 62.3517C90.1892 63.2386 90.3615 64.0763 90.5537 64.8651L89.5822 65.1019ZM88.3489 56.409L89.346 56.3322C89.247 55.0464 89.1689 53.6944 89.1118 52.2763L88.1126 52.3165C88.1701 53.7457 88.2489 55.1098 88.3489 56.409ZM88.0081 48.2185L89.008 48.2065C89.0001 47.5394 88.9961 46.8599 88.9961 46.168C88.9961 45.4761 89.0001 44.7966 89.008 44.1294L88.0081 44.1175C88.0001 44.7888 87.9961 45.4723 87.9961 46.168C87.9961 46.8637 88.0001 47.5472 88.0081 48.2185ZM88.1126 40.0195L89.1118 40.0597C89.1689 38.6415 89.247 37.2896 89.346 36.0037L88.3489 35.9269C88.2489 37.2261 88.1701 38.5903 88.1126 40.0195ZM88.7598 31.8487L89.7517 31.9751C89.8394 31.2869 89.9347 30.6232 90.0374 29.9838C90.1889 29.0909 90.3607 28.2478 90.5524 27.4543L89.5804 27.2194C89.3825 28.0386 89.206 28.9055 89.0508 29.8203C88.946 30.4726 88.849 31.1487 88.7598 31.8487ZM110.195 65.1662C110.396 64.3497 110.574 63.4857 110.73 62.5742C110.841 61.9206 110.944 61.2426 111.038 60.5402L110.047 60.4071C109.954 61.0989 109.853 61.7655 109.745 62.407C109.592 63.2966 109.419 64.1366 109.224 64.9273L110.195 65.1662ZM111.472 56.4483L110.475 56.3676C110.58 55.0785 110.662 53.7221 110.722 52.2983L111.721 52.3404C111.661 53.7759 111.578 55.1451 111.472 56.4483ZM111.831 48.2265L110.831 48.214C110.84 47.5445 110.844 46.8625 110.844 46.168C110.844 45.4761 110.84 44.7965 110.831 44.1294L111.831 44.1168C111.84 44.7883 111.844 45.472 111.844 46.168C111.844 46.8665 111.84 47.5527 111.831 48.2265ZM111.721 40.0175L110.722 40.0599C110.661 38.6422 110.579 37.2907 110.474 36.0054L111.471 35.9243C111.577 37.2237 111.66 38.5881 111.721 40.0175ZM111.037 31.8471L110.046 31.9804C109.954 31.2915 109.853 30.6273 109.745 29.9876C109.593 29.0917 109.419 28.2462 109.225 27.4506L110.197 27.2137C110.397 28.0345 110.575 28.9034 110.73 29.8203C110.841 30.4721 110.943 31.1476 111.037 31.8471ZM105.57 18.5151C106.081 18.9326 106.551 19.4198 106.98 19.9766C107.502 20.6259 107.979 21.3716 108.412 22.2136L107.522 22.6703C107.116 21.8804 106.675 21.193 106.201 20.603L106.195 20.5953L106.189 20.5876C105.802 20.087 105.385 19.6554 104.937 19.2891L105.57 18.5151ZM101.915 16.8231L101.724 17.8047C101.153 17.6938 100.543 17.6367 99.8906 17.6367C99.2319 17.6367 98.6158 17.6933 98.0406 17.8033L97.8527 16.8212C98.4953 16.6982 99.1746 16.6367 99.8906 16.6367C100.601 16.6367 101.276 16.6989 101.915 16.8231ZM91.3365 22.2221L92.2298 22.6714C92.6293 21.8773 93.0632 21.1866 93.5286 20.5944L93.5338 20.5876C93.9218 20.085 94.3425 19.6519 94.7951 19.2844L94.1647 18.5081C93.6486 18.9272 93.1744 19.4167 92.7422 19.9766C92.2303 20.6281 91.7617 21.3766 91.3365 22.2221ZM129.869 48.4956C129.884 47.7293 129.891 46.9534 129.891 46.168C129.891 45.4909 129.885 44.8211 129.874 44.1585L130.873 44.1413C130.885 44.8097 130.891 45.4853 130.891 46.168C130.891 46.9594 130.884 47.7415 130.869 48.5141L129.869 48.4956ZM129.73 40.1442L130.728 40.0891C130.652 38.7062 130.549 37.3565 130.418 36.0401L129.423 36.1388C129.552 37.44 129.654 38.7751 129.73 40.1442ZM128.928 32.152L129.917 32.0032C129.71 30.6258 129.469 29.2889 129.196 27.9926L128.217 28.1993C128.487 29.4754 128.724 30.793 128.928 32.152ZM129.69 53.1463L130.688 53.2059C130.592 54.8131 130.462 56.3753 130.297 57.8922L129.303 57.7842C129.466 56.2842 129.595 54.7382 129.69 53.1463ZM128.671 62.3953L129.658 62.5604C129.526 63.3466 129.384 64.1191 129.231 64.8778C129.109 65.5031 128.979 66.1182 128.84 66.723L127.866 66.499C128.002 65.9044 128.13 65.2993 128.25 64.6836C128.401 63.9349 128.541 63.1722 128.671 62.3953ZM126.899 70.0804L127.854 70.379C127.466 71.6202 127.034 72.8113 126.559 73.9522L125.636 73.5678C126.099 72.4566 126.52 71.2941 126.899 70.0804ZM124.033 76.9126L124.91 77.3935C124.6 77.9579 124.278 78.5073 123.942 79.0414C123.648 79.5167 123.342 79.9788 123.025 80.4278L122.208 79.8507C122.514 79.4176 122.81 78.9712 123.094 78.5117C123.419 77.994 123.733 77.4609 124.033 76.9126ZM120.191 82.3452C119.459 83.1354 118.68 83.8681 117.854 84.5434L118.487 85.3178C119.349 84.6129 120.162 83.8484 120.924 83.0245L120.191 82.3452ZM110.928 3.90252C109.566 3.36607 108.127 2.94237 106.609 2.63143L106.81 1.65179C108.381 1.97366 109.876 2.41332 111.294 2.97211L110.928 3.90252ZM102.144 2.05454L102.204 1.05633C101.447 1.01092 100.676 0.988281 99.8906 0.988281C99.0785 0.988281 98.2829 1.00954 97.504 1.05219L97.5586 2.05069C98.3186 2.00909 99.096 1.98828 99.8906 1.98828C100.657 1.98828 101.408 2.01037 102.144 2.05454ZM92.9311 2.60108C91.3413 2.90321 89.8447 3.31706 88.4411 3.84262L88.0904 2.90613C89.5513 2.35911 91.1031 1.93057 92.7444 1.61866L92.9311 2.60108Z" fill="#55246A"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-about-bank-item">

                                        <div class="card-about-bank-item__description body-s-heavy">
                                            по величине капитала, объему активов <br>и&nbsp;корпоративных кредитов
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-about-bank__row-decor">
                                <div class="card-about-bank__col-decor"></div>
                                <div class="card-about-bank__col-decor"></div>
                            </div>
                            <div class="card-about-bank__background">
                                <img src="/frontend/build/assets/card-about-bank-bg.svg">
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </section>
        <section class="section-layout section-news no-padding-top">

            <div class="content-container">
                <div class="section-title section-news__title section-title--padding">
                    <div class="section-title__text headline-2">
                        Новости


                    </div>
                    <div class="section-title__after">
                        <a slot="after" class="a-button a-button--s a-button--primary a-button--link a-button--text">Пресс-центр
                            <span class="a-icon a-button__icon">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#chevron-right"></use>
			</svg>
</span></a>
                    </div>
                </div>

                <div class="slider-skeleton swiper persistent-slider js-persistent-slider" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:3" data-space-between="mobile-s:8,mobile:8,tablet:8,laptop:8">

                    <div class="swiper-wrapper js-swiper-wrapper">

                        <div class="swiper-slide js-swiper-slide">

                            <a href="#" class="news-card section-news__card">
                                <div class="news-card__head">
                                    <div class="a-tag news-card__tag a-tag--outline">
	<span class="a-tag__content body-s-heavy">
		Пресс-центр
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                    <div class="news-card__date body-s-light dark-70">07.12.2023</div>
                                </div>
                                <div class="news-card__body body-m-light">Новикомбанк рассказал о развитии финансовых инструментов</div>
                            </a>

                        </div><div class="swiper-slide js-swiper-slide">

                            <a href="#" class="news-card section-news__card">
                                <div class="news-card__head">
                                    <div class="a-tag news-card__tag a-tag--outline">
	<span class="a-tag__content body-s-heavy">
		Пресс-центр
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                    <div class="news-card__date body-s-light dark-70">06.12.2023</div>
                                </div>
                                <div class="news-card__body body-m-light">Новикомбанк и Республика Татарстан договорились о сотрудничестве</div>
                            </a>

                        </div><div class="swiper-slide js-swiper-slide">

                            <a href="#" class="news-card section-news__card">
                                <div class="news-card__head">
                                    <div class="a-tag news-card__tag a-tag--outline">
	<span class="a-tag__content body-s-heavy">
		Союз машиностроителей
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                    <div class="news-card__date body-s-light dark-70">27.11.2023</div>
                                </div>
                                <div class="news-card__body body-m-light">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</div>
                            </a>

                        </div><div class="swiper-slide js-swiper-slide">

                            <a href="#" class="news-card section-news__card">
                                <div class="news-card__head">
                                    <div class="a-tag news-card__tag a-tag--outline">
	<span class="a-tag__content body-s-heavy">
		Пресс-центр
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                    <div class="news-card__date body-s-light dark-70">20.11.2023</div>
                                </div>
                                <div class="news-card__body body-m-light">Новикомбанк и Республика Татарстан договорились о сотрудничестве</div>
                            </a>

                        </div><div class="swiper-slide js-swiper-slide">

                            <a href="#" class="news-card section-news__card">
                                <div class="news-card__head">
                                    <div class="a-tag news-card__tag a-tag--outline">
	<span class="a-tag__content body-s-heavy">
		Союз машиностроителей
	</span>
                                        <span class="a-tag__triangle">
		<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
		</svg>
	</span>
                                    </div>
                                    <div class="news-card__date body-s-light dark-70">05.11.2023</div>
                                </div>
                                <div class="news-card__body body-m-light">При поддержке Новикомбанка Росэлектроника начала серийный выпуск KVM-коммутаторов для удаленного управления оборудованием</div>
                            </a>

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
        <section class="section-layout section-call-me-back">

            <div class="content-container">
                <div class="section-call-me-back__container">
                    <div class="section-call-me-back__content">
                        <div class="section-title section-call-me-back__title">
                            <div class="section-title__text headline-2">
                                Остались вопросы
                            </div>

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
        <section class="section-layout section-currency-exchange s-no-padding">

            <div class="content-container">
                <div class="section-currency-exchange__container">
                    <div class="a-accordion js-a-accordion a-accordion-layout">

                        <div class="a-accordion-panel js-a-accordion-panel">

                            <button class="a-accordion-header js-a-accordion-header section-currency-exchange__accordion-header">

                                <div class="headline-2">Обмен валюты</div>

                                <span class="a-icon a-accordion-header__icon size-m">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
			</svg>
</span>
                            </button>
                            <div class="a-accordion-content js-a-accordion-content section-currency-exchange__accordion-content">

                                <div class="section-currency-exchange__content">
                                    <div class="section-currency-exchange__box">
                                        <div class="section-currency-exchange__head">
                                            <div class="section-currency-exchange__title headline-2">Обмен валюты</div>
                                            <div class="section-currency-exchange__description body-s-light">Курс банка актуален на 14:00 по МСК 30 апреля 2024 г.</div>
                                        </div>
                                        <div class="currency-exchange-table section-currency-exchange__table">
                                            <div class="a-tabs a-tabs--layout js-a-tabs">

                                                <div class="currency-exchange-table__tabs">
                                                    <div class="a-tab-swiper swiper js-a-tab-swiper">

                                                        <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">

                                                            <button type="button" data-value="0" class="a-tab a-tab--m a-tab--primary swiper-slide js-a-tab is-active">
                                                                EUR
                                                            </button>
                                                            <button type="button" data-value="1" class="a-tab a-tab--m a-tab--primary swiper-slide js-a-tab">
                                                                USD
                                                            </button>
                                                            <button type="button" data-value="2" class="a-tab a-tab--m a-tab--primary swiper-slide js-a-tab">
                                                                CNY
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
                                                <div class="currency-exchange-table__title">
                                                    <div class="currency-exchange-table__row body-s-light">
                                                        <div class="currency-exchange-table__cell">Валюта</div>
                                                        <div class="currency-exchange-table__cell">Продать, RUB</div>
                                                        <div class="currency-exchange-table__cell">Купить, RUB</div>
                                                        <div class="currency-exchange-table__cell">ЦБ РФ, RUB</div>
                                                    </div>
                                                </div>
                                                <div class="a-tab-panels js-a-tab-panels">

                                                    <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="0">

                                                        <div class="currency-exchange-table__row">
                                                            <div class="currency-exchange-table__cell body-l-light is-left body-m-heavy">Евро - EUR</div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">Продать, RUB</span>
                                                                <p>94,60</p>
                                                            </div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">Купить, RUB</span>
                                                                <p>99,10</p>
                                                            </div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">ЦБ РФ, RUB</span>
                                                                <p>97,15</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="1">

                                                        <div class="currency-exchange-table__row">
                                                            <div class="currency-exchange-table__cell body-l-light is-left body-m-heavy">Доллар США - USD</div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">Продать, RUB</span>
                                                                <p>89,60</p>
                                                            </div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">Купить, RUB</span>
                                                                <p>90,10</p>
                                                            </div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">ЦБ РФ, RUB</span>
                                                                <p>89,15</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="a-tab-panel js-a-tab-panel is-hidden" data-value="2">

                                                        <div class="currency-exchange-table__row">
                                                            <div class="currency-exchange-table__cell body-l-light is-left body-m-heavy">Китайский юань - CNY</div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">Продать, RUB</span>
                                                                <p>13,60</p>
                                                            </div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">Купить, RUB</span>
                                                                <p>15,10</p>
                                                            </div>
                                                            <div class="currency-exchange-table__cell body-l-light">
                                                                <span class="body-s-light">ЦБ РФ, RUB</span>
                                                                <p>13,15</p>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="section-currency-exchange__note body-s-light">
                                            <p>
                                                Банк оставляет за&nbsp;собой право на&nbsp;изменение курса купли-продажи иностранной валюты.<br>
                                                Действующие на&nbsp;момент совершения операций курсы уточняйте в&nbsp;отделениях банка.
                                                Список отделений доступен по&nbsp;ссылке.
                                            </p>
                                            <p>Покупка и&nbsp;продажа фунтов стерлингов и&nbsp;швейцарских франков осуществляется только в&nbsp;ДО&nbsp;«Якиманка».</p>
                                        </div>
                                    </div>
                                    <div class="section-currency-exchange__card">
                                        <div class="currency-exchange-calculator-card">
                                            <div class="currency-exchange-calculator-card__title headline-3">Предварительный расчет</div>
                                            <form class="currency-exchange-calculator-card__form" action="" method="POST">
                                                <div class="a-input a-currency-input js-a-currency-input a-input--ms">
                                                    <label for="you-have" class="a-currency-input__label body-s-heavy">У вас есть</label>

                                                    <div class="a-currency-input__inner">
                                                        <input id="you-have" class="a-input__input" placeholder="1500" name="you-have" aria-describedby="you-have-hint">
                                                        <button class="a-currency-input__button js-a-currency-input-button" type="button">
                                                            <span class="a-currency-input__button-text js-a-currency-input-button-text"></span>
                                                            <span class="a-icon a-currency-input__button-icon size-s">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
			</svg>
</span>
                                                        </button>
                                                        <div class="a-drop-down js-a-drop-down a-currency-input__drop-down">


                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="RUB" aria-selected="true">
                                                                RUB
                                                            </button>
                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="EUR" aria-selected="false">
                                                                EUR
                                                            </button>
                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="USD" aria-selected="false">
                                                                USD
                                                            </button>
                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="CNY" aria-selected="false">
                                                                CNY
                                                            </button>


                                                        </div>
                                                    </div>
                                                    <small class="a-input__hint js-a-input-hint caption-m" id="you-have-hint">1 RUB = 0,01 USD</small>
                                                </div>
                                                <div class="a-input a-currency-input js-a-currency-input a-input--ms">
                                                    <label for="you-get" class="a-currency-input__label body-s-heavy">Вы получите</label>

                                                    <div class="a-currency-input__inner">
                                                        <input id="you-get" class="a-input__input" placeholder="9,77" name="you-get" aria-describedby="you-get-hint">
                                                        <button class="a-currency-input__button js-a-currency-input-button" type="button">
                                                            <span class="a-currency-input__button-text js-a-currency-input-button-text"></span>
                                                            <span class="a-icon a-currency-input__button-icon size-s">
	<svg>
				<use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-down"></use>
			</svg>
</span>
                                                        </button>
                                                        <div class="a-drop-down js-a-drop-down a-currency-input__drop-down">


                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="RUB" aria-selected="false">
                                                                RUB
                                                            </button>
                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="EUR" aria-selected="false">
                                                                EUR
                                                            </button>
                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="USD" aria-selected="true">
                                                                USD
                                                            </button>
                                                            <button class="a-drop-down-button btn-m-heavy js-a-drop-down-button" type="button" data-value="CNY" aria-selected="false">
                                                                CNY
                                                            </button>


                                                        </div>
                                                    </div>
                                                    <small class="a-input__hint js-a-input-hint caption-m" id="you-get-hint">1 USD = 97 RUB</small>
                                                </div>
                                                <button type="submit" class="a-button a-button--lm a-button--primary">Зафиксировать курс
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
