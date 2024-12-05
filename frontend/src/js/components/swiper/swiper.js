import Swiper from 'swiper';
import {Autoplay, Thumbs, Pagination, Navigation, Grid} from 'swiper/modules';
import {VARIABLES, MEDIA_QUERIES, DEFAULT_SEPARATORS, DEFAULT_SLIDER_DATA_ATTRS, SLIDER_ATTR} from './constants';

const CLASS_NAME = {
    mobileMenu: '.js-swiper-mobile-menu',
    bannerHero: '.js-banner-hero',
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

let mySlider;
export function initCardSlider() {
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
        } else  {
            cardSliderMode(slider, options, destroyBreakpoints, wrapper, slides, controls);

            window.addEventListener('resize', function () {
                cardSliderMode(slider, options, destroyBreakpoints, wrapper, slides, controls);
            });
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
        on: {
            init: function () {
                let indexActive = 0;

                this.el.querySelectorAll('.tabs-panel__list-item-link').forEach((el, index) => {
                    if (el.classList.contains('active')) {
                        indexActive = index;
                    }
                });

                this.activeIndex = indexActive;
            },
        },
    });
}

export function initPbSlider() {
    const financeSlider = document.querySelector(
        "[data-order='1'] .js-pb-slider"
    );
    const investmentSlider = document.querySelector(
        "[data-order='2'] .js-pb-slider"
    );

    const financeTabs = document.querySelectorAll("[data-order='1'] .tabs__link");
    const investmentTabs = document.querySelectorAll(
        "[data-order='2'] .tabs__link"
    );

    if (financeSlider && investmentSlider) {
        const financeSwiper = new Swiper(financeSlider, {
            modules: [Navigation, Pagination],
            slidesPerView: 2,
            spaceBetween: 40,
            grabCursor: true,
            speed: 700,
            loop: true
        });

    const investmentSwiper = new Swiper(investmentSlider, {
      modules: [Navigation, Pagination],
      slidesPerView: 2,
      spaceBetween: 40,
      grabCursor: true,
      speed: 700,
      loop: true
    });

    // Ппреключение по вкладкам финуслуг
    financeTabs.forEach((tab, index) => {
      tab.addEventListener("click", event => {
        event.preventDefault();
        // удаляем активный класс у всех вкладок
        financeTabs.forEach(t => t.classList.remove("active"));
        // Добавляем активкласс к текущей вкладке
        tab.classList.add("active");
        // Переключаем слайд
        financeSwiper.slideToLoop(index);
      });
    });

    // переключение по вкладкам инвестиционных услуг
    investmentTabs.forEach((tab, index) => {
      tab.addEventListener("click", event => {
        event.preventDefault();
        // удаляем активный класс у всех вкладок
        investmentTabs.forEach(t => t.classList.remove("active"));
        // добавляем активный класс к текущей вкладке
        tab.classList.add("active");
        // ппереключаем слайд
        investmentSwiper.slideToLoop(index);
      });
    });

    //финансовые и инвестиционные услуги
    const tabs = document.querySelectorAll(".pb__services-header-item");
    tabs.forEach(tab => {
      tab.addEventListener("click", () => {
        tabs.forEach(t => t.classList.remove("tab-active"));
        tab.classList.add("tab-active");

        const activeTabOrder = tab.dataset.order;
        document.querySelectorAll(".pb__services-tab").forEach(section => {
          section.classList.remove("tab-active");
          if (section.dataset.order === activeTabOrder) {
            section.classList.add("tab-active");
          }
        });
        financeSwiper.update();
        investmentSwiper.update();
      });
    });
  }
}
