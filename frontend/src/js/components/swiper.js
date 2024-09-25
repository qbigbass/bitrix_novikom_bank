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
        }
    });
}

export function initProductCardSlider() {
    new Swiper(CLASS_NAME.cardsProduct, {
        modules: [Pagination, Navigation],
        slidesPerView: 1,
        spaceBetween: 8,
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
        }
    });
}




