// import '../scss/style.scss';
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import initPolygonContainer from './components/polygon-container.js'
import initDropdownMenu from './components/dropDownMenu.js'
import {setVh} from "./components/helpers";
import { initSwiperMenu, initHeroBanner, initCardSlider, initAnnouncementSlider, initTabsSlider } from "./components/swiper/swiper";
import initButtonNavMobile from './components/nav-panel.js'
import initMobileSearch from './components/mobile-search.js'
import initSelect2 from './components/select2.js'

document.addEventListener('DOMContentLoaded', () => {
    initDropdownMenu();
    initPolygonContainer();
    setVh();
    initSwiperMenu();
    initButtonNavMobile();
    initMobileSearch();
    initHeroBanner();
    initCardSlider();
    initAnnouncementSlider();
    initTabsSlider();
    initSelect2();
});

window.addEventListener('resize', () => {
    initPolygonContainer();
    setVh();
});
