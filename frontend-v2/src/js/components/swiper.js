import Swiper from 'swiper';
import 'swiper/css';

export function initSwiperMenu() {
    const swiper = new Swiper('.js-swiper-mobile-menu', {
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



