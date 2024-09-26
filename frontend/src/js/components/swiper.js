import Swiper from 'swiper';
import { Autoplay, Thumbs, Pagination, Navigation } from 'swiper/modules';

const CLASS_NAME = {
    mobileMenu: '.js-swiper-mobile-menu',
    bannerHero: '.js-banner-hero',
    thumbsHero: '.js-banner-hero-thumbs',
    cardsProduct: '.js-slider-product-cards',
}

const VARIABLES = {
    delay: 5000,
};

export function initSwiperMenu() {
    const swiper = new Swiper(CLASS_NAME.mobileMenu, {
        init: false,
        slidesPerView: 'auto',
        spaceBetween: 16,
    });

    swiper.on('init', function() {
        const slides = swiper.slides;
        for (let i = 0; i < slides.length; i++) {
            const slide = slides[i];
            const activeLink = slide.querySelector('.is-active');
            if (activeLink) {
                swiper.slideTo(i, 0, false);
                break;
            }
        }
    });

    // init Swiper
    swiper.init();
}



export function initHeroBanner () {
    const thumbs = new Swiper(CLASS_NAME.thumbsHero, {
        spaceBetween: 0,
        slidesPerView: 4,
        freeMode: false,
        watchSlidesProgress: true,
    });

    new Swiper(CLASS_NAME.bannerHero, {
        autoplay: {
            enabled: false,
        },
        loop: true,
        freeMode: false,
        modules: [Autoplay, Thumbs, Pagination, Navigation],
        thumbs: {
            swiper: thumbs,
        },
        controller: {
            control: thumbs,
        },
        pagination: {
            el: ".banner-hero-pagination",
            type: "bullets",
            clickable: true,
        },
        navigation: {
            prevEl: ".banner-hero-control__prev",
            nextEl: ".banner-hero-control__next",
        },
        breakpoints: {
            1200: {
                pagination: false,
                autoplay: {
                    enabled: true,
                    delay: VARIABLES.delay,
                },
            },
        },
        on: {
            slideChange: function () {
                const activeSlide = this.slides[this.activeIndex];
                const links = activeSlide.querySelectorAll('a');

                // Установить tabindex="-1" для всех ссылок в неактивных слайдах
                this.slides.forEach((slide, index) => {
                    if (index !== this.activeIndex) {
                        const links = slide.querySelectorAll('a');
                        links.forEach((link) => {
                            link.setAttribute('tabindex', '-1');
                        });
                    }
                });

                // Установить tabindex="0" для ссылок в активном слайде
                links.forEach((link) => {
                    link.setAttribute('tabindex', '0');
                });
            },
        },
    });
}

function setTabIndex(slides) {
    slides.forEach((slide) => {
        const links = slide.querySelectorAll('a');
        if (slide.classList.contains('swiper-slide-visible')) {
            links.forEach((link) => {
                link.setAttribute('tabindex', '0');
            });
        } else {
            links.forEach((link) => {
                link.setAttribute('tabindex', '-1');
            });
        }
    });
}

export function initProductCardSlider() {
    new Swiper(CLASS_NAME.cardsProduct, {
        modules: [Pagination, Navigation],
        slidesPerView: 1,
        spaceBetween: 8,
        watchSlidesProgress: true,
        pagination: {
            el: ".js-swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        navigation: {
            prevEl: ".js-swiper-prev",
            nextEl: ".js-swiper-next",
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            1200: {
                pagination: false,
                spaceBetween: 40,
                slidesPerView: 2,
            },
            1600: {
                spaceBetween: 40,
                slidesPerView: 3,
            }
        },
        on: {
            init: function () {
                setTabIndex(this.slides);
            },
            slideChange: function () {
                setTabIndex(this.slides);
            },
        },
    });
}




