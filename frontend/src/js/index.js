// import '../scss/style.scss';
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import initPolygonContainer from './components/polygon-container.js'
import initDropdownMenu from './components/dropDownMenu.js'
import {setVh} from "./components/helpers";
import { initSwiperMenu, initHeroBanner, initCardSlider } from "./components/swiper/swiper";
import initButtonNavMobile from './components/nav-panel.js'
import initMobileSearch from './components/mobile-search.js'

document.addEventListener('DOMContentLoaded', () => {
    initDropdownMenu();
    initPolygonContainer();
    setVh();
    initSwiperMenu();
    initButtonNavMobile();
    initMobileSearch();
    initHeroBanner();
    initCardSlider();
});

window.addEventListener('resize', () => {
    initPolygonContainer();
    setVh();
});
