import Swiper from 'swiper';
import {Autoplay, Thumbs, Pagination, Navigation, Grid} from 'swiper/modules';
import {VARIABLES, MEDIA_QUERIES, DEFAULT_SEPARATORS, DEFAULT_SLIDER_DATA_ATTRS} from './constants';

const CLASS_NAME = {
    mobileMenu: '.js-swiper-mobile-menu',
    bannerHero: '.js-banner-hero',
    thumbsHero: '.js-banner-hero-thumbs',
    cardsSlider: '.js-slider-cards',
    announcementsSlider: '.js-announcement-slider',
    tabsSlider: '.js-tabs-slider',
    slide: '.js-swiper-slide',
    prevEl: '.js-swiper-prev',
    nextEl: '.js-swiper-next',
    pagination: '.js-swiper-pagination',
}

const DEFAULT_SLIDER_OPTIONS = {
    modules: [Navigation, Pagination],
    slidesPerView: 'auto',
    spaceBetween: 8,
    watchSlidesProgress: true,
    navigation: {
        prevEl: CLASS_NAME.prevEl,
        nextEl: CLASS_NAME.nextEl,
        navigationDisabledClass: 'swiper-navigation-disabled',
    },
    pagination: {
        el: CLASS_NAME.pagination,
        paginationDisabledClass: 'swiper-pagination-disabled',
        type: 'bullets',
        clickable: true
    },
    breakpoints: {},
}

const createSliderOptionsByAttrs = (dataAttrs, slidesLength) => {
    if (dataAttrs) {
        const options = {...DEFAULT_SLIDER_OPTIONS};

        for (const attrKey in dataAttrs) {
            const attrValue = dataAttrs[attrKey];
            const breakpointItems = attrValue.split(DEFAULT_SEPARATORS.mediaItem);

            breakpointItems.forEach((breakpoint) => {
                const [mqKey, mqValue] = breakpoint.split(DEFAULT_SEPARATORS.mediaQuery);

                if (MEDIA_QUERIES[mqKey]) {
                    const optionBreakpointKey = Number.parseInt(MEDIA_QUERIES[mqKey]);

                    const optionBreakpointValue = {
                        [attrKey]: mqValue
                    }

                    if (!options?.breakpoints) {
                        options.breakpoints = {};
                    }

                    let payload = {
                        ...options.breakpoints[optionBreakpointKey] = {
                            ...options.breakpoints[optionBreakpointKey],
                            ...optionBreakpointValue,
                        }
                    }

                    if (attrKey === 'slidesPerView') {
                        payload = {
                            ...payload,
                            navigation: {
                                enabled: slidesLength > Number(mqValue)
                            },
                            pagination: {
                                enabled: slidesLength > Number(mqValue)
                            }
                        }
                    }

                    options.breakpoints[optionBreakpointKey] = payload;
                }
            });
        }

        return options;
    } else {
        return DEFAULT_SLIDER_OPTIONS;
    }
}

export function initSwiperMenu() {
    const swiper = new Swiper(CLASS_NAME.mobileMenu, {
        init: false,
        slidesPerView: 'auto',
        spaceBetween: 16,
    });

    swiper.on('init', function () {
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

    // init SwiperMin
    swiper.init();
}

export function initHeroBanner() {
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

export function initCardSlider() {
    const sliders = document.querySelectorAll(CLASS_NAME.cardsSlider);

    sliders.forEach((slider) => {
        const dataAttrs = slider.dataset;
        const sliderDataAttrs = Object.assign(DEFAULT_SLIDER_DATA_ATTRS, dataAttrs);
        const slides = slider.querySelectorAll(CLASS_NAME.slide);
        const slidesLength = slides.length;
        const options = createSliderOptionsByAttrs(sliderDataAttrs, slidesLength);

        options.on = {
            init: function () {
                setTabIndex(this.slides);
            },
            slideChange: function () {
                setTabIndex(this.slides);
            },
        };

        new Swiper(slider, options);
    })
}

export function initAnnouncementSlider() {
    new Swiper(CLASS_NAME.announcementsSlider, {
        modules: [Pagination, Navigation, Grid],
        slidesPerView: 1,
        spaceBetween: 40,
        grid: {
            fill: 'row',
        },
        navigation: {
            prevEl: CLASS_NAME.prevEl,
            nextEl: CLASS_NAME.nextEl,
            navigationDisabledClass: 'swiper-navigation-disabled',
        },
        pagination: {
            el: CLASS_NAME.pagination,
            paginationDisabledClass: 'swiper-pagination-disabled',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            375: {
                spaceBetween: 8,
                grid: {
                    rows: 1,
                },
            },
            768: {
                spaceBetween: 40,
                grid: {
                    rows: 2,
                },
            }
        }
    });
}

export function initTabsSlider() {
    new Swiper(CLASS_NAME.tabsSlider, {
        slidesPerView: "auto",
        loop: false,
        freeMode: true,
        pagination: false,
        slideToClickedSlide: true,
        modules: [Navigation],
        navigation: {
            prevEl: ".js-tabs-slider-navigation-prev",
            nextEl: ".js-tabs-slider-navigation-next",
        },
    });
}
