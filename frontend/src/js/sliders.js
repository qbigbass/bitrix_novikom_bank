const VARIABLES = {
    delay: 5000,
};

const DEFAULT_SEPARATORS = {
    mediaQuery: ':',
    mediaItem: ','
}

const DEFAULT_SLIDER_DATA_ATTRS = {
    spaceBetween: 'mobile-s:8,mobile:8,tablet:16,laptop:16',
    slidesPerView: 'mobile-s:1,mobile:1,tablet:2,laptop:3',
    autoHeight: 'false',
}

const SLIDER_ATTR = {
    destroyBreakpoint: 'data-slider-breakpoint-destroy',
}

const CLASS_NAME = {
    mobileMenu: '.js-swiper-mobile-menu',
    bannerHero: '.js-banner-hero',
    pbCardSlider: '.js-pb-slider',
    pbCardThumbs: '.js-pb-tags-thumbs',
    thumbsHero: '.js-banner-hero-thumbs',
    cardsSlider: '.js-slider-cards',
    announcementsSlider: '.js-announcement-slider',
    tabsSlider: '.js-tabs-slider',
    wrapper: '.js-swiper-wrapper',
    slide: '.js-swiper-slide',
    prevEl: '.js-swiper-prev',
    nextEl: '.js-swiper-next',
    controls: '.js-swiper-controls',
    pagination: '.js-swiper-pagination',
    pbTabsSlider: '.js-pb-tabs-slider',
}

const DEFAULT_SLIDER_OPTIONS = {
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
                        [attrKey]: attrKey === 'autoHeight' ? mqValue === "true" : mqValue
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

function initSwiperMenu() {
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

function initHeroBanner() {
    const banner = document.querySelector(CLASS_NAME.bannerHero);

    if (!banner) return;

    const thumbsHero = document.querySelector(CLASS_NAME.thumbsHero);
    const numSlides = banner.querySelectorAll('.swiper-slide').length;
    const autoplayDelay = banner.dataset.autoplayDelay;

    if (numSlides <= 1) thumbsHero.hidden = true;

    numSlides < 4 ? thumbsHero.classList.add('is-less-4') : thumbsHero.classList.remove('is-less-4');

    const thumbs = {
        swiper: new Swiper(CLASS_NAME.thumbsHero, {
            spaceBetween: 0,
            slidesPerView: 4,
            freeMode: false,
            watchSlidesProgress: true,
        })
    }

    new Swiper(CLASS_NAME.bannerHero, {
        autoplay: {
            enabled: false,
        },
        loop: true,
        freeMode: false,
        thumbs: numSlides > 1 ? thumbs : false,
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
                    enabled: false,
                    delay: autoplayDelay ?? VARIABLES.delay,
                },
            },
        },
        on: {

            init: function () {
                if (this.slides.length <= 1) {
                    // Скрываем пагинацию, если слайдов меньше или равно 1
                    this.pagination.el.style.display = 'none';
                }
            },
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

                // Пауза видео в неактивных слайдах
                const videos = activeSlide.querySelectorAll('video');

                this.slides.forEach((slide, index) => {
                    if (index !== this.activeIndex) {
                        const videos = slide.querySelectorAll('video');
                        videos.forEach((video) => {
                            video.pause();

                        });
                    }
                });

                // Воспроизведение видео в активном слайде
                videos.forEach((video) => {
                    video.play();
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

function initCardSlider() {
    const sliders = document.querySelectorAll(CLASS_NAME.cardsSlider);

    sliders.forEach((slider) => {
        const dataAttrs = slider.dataset;
        const sliderDataAttrs = Object.assign(DEFAULT_SLIDER_DATA_ATTRS, dataAttrs);
        const slides = slider.querySelectorAll(CLASS_NAME.slide);
        const slidesLength = slides.length;
        const options = createSliderOptionsByAttrs(sliderDataAttrs, slidesLength);

        const destroyBreakpoints = slider.getAttribute(SLIDER_ATTR.destroyBreakpoint);
        const wrapper = slider.querySelector(CLASS_NAME.wrapper);
        const controls = slider.querySelector(CLASS_NAME.controls)

        options.on = {
            init: function () {
                setTabIndex(this.slides);
            },
            slideChange: function () {
                setTabIndex(this.slides);
            },
        };

        if (!destroyBreakpoints) {
            new Swiper(slider, options);
        } else {
            cardSliderMode(slider, options, destroyBreakpoints, wrapper, slides, controls);
        }
    })
}

function cardSliderMode(slider, options, destroyBreakpoints, wrapper, slides, controls) {
    let init = false;
    let toggleSlider = null;

    const breakpoint = window.matchMedia(`(min-width: ${MEDIA_QUERIES[destroyBreakpoints]})`);

    if (!breakpoint.matches) {
        wrapper.classList.remove('row');
        wrapper.classList.add('swiper-wrapper');
        slides.forEach(slide => {
            slide.classList.add('swiper-slide');
        })
        controls.hidden = false;

        if (!init) {
            toggleSlider = new Swiper(slider, options);
            init = true;
        }
    } else {
        wrapper.classList.add('row');
        wrapper.classList.remove('swiper-wrapper');
        slides.forEach(slide => {
            slide.classList.remove('swiper-slide');
            slide.removeAttribute('style');
        })
        controls.hidden = true;

        if (init) {
            toggleSlider.destroy(true, true);
            init = false;
        }
    }
}

function initAnnouncementSlider() {
    new Swiper(CLASS_NAME.announcementsSlider, {
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
                spaceBetween: 24,
                grid: {
                    rows: 2,
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

function initTabsSlider() {
    new Swiper(CLASS_NAME.tabsSlider, {
        slidesPerView: "auto",
        loop: false,
        freeMode: true,
        pagination: false,
        slideToClickedSlide: true,
        navigation: {
            prevEl: ".js-tabs-slider-navigation-prev",
            nextEl: ".js-tabs-slider-navigation-next",
        },
        on: {
            init: function () {
                let indexActive = 0;

                this.el.querySelectorAll('.tabs-panel__list-item-link').forEach((el, index) => {
                    if (el.classList.contains('active')) {
                        indexActive = index;
                    }
                });

                this.activeIndex = indexActive;
                this.slideTo(this.activeIndex);
            },
        },
    });
}

function initPbSlider() {
    const thumbWrappers = document.querySelectorAll(CLASS_NAME.pbCardThumbs);
    thumbWrappers.forEach((thumbWrapper) => {
        const thumbsLength = thumbWrapper.querySelectorAll('.swiper-slide').length;
        const cardsSlider = thumbWrapper.nextElementSibling;
        const pbThumbsSlider = new Swiper(thumbWrapper, {
            freeMode: false,
            watchSlidesProgress: true,
            slidesPerView: thumbsLength,
            spaceBetween: 8,
        });

        new Swiper(cardsSlider, {
            freeMode: false,
            thumbs: {
                swiper: pbThumbsSlider,
            },
            speed: 2000,
            spaceBetween: 24,
            slidesPerView: 1,
            pagination: {
                el: ".pb-services__pagination",
                type: "bullets",
                clickable: true,
            },
            breakpoints: {
                768: {
                    spaceBetween: 40,
                    slidesPerView: 1.32,
                },
                1440: {
                    spaceBetween: 40,
                    slidesPerView: 1.5,
                },
                1600: {
                    spaceBetween: 40,
                    slidesPerView: 1.75,
                }
            }
        })
    })
}

let tabPbSwiper;

function initPbTabsSlider() {
    tabPbSwiper = new Swiper(CLASS_NAME.pbTabsSlider, {
        slidesPerView: "auto",
        loop: false,
        freeMode: true,
        pagination: false,
        slideToClickedSlide: true,
        spaceBetween: 16,
    });
}

function destroyPbTabSwiper() {
    if (tabPbSwiper) {
        tabPbSwiper.destroy(true, true);
        tabPbSwiper = null;
    }
}
