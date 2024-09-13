// Import our custom CSS
import '../scss/styles.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import initPolygonContainer from './components/polygon-container.js'
import initDropdownMenu from './components/dropDownMenu.js'
import {setVh} from "./components/helpers";
import { initSwiperMenu } from "./components/swiper";
import initButtonNavMobile from './components/nav-panel.js'
import initMobileSearch from './components/mobile-search.js'

document.addEventListener('DOMContentLoaded', () => {
    initDropdownMenu();
    initPolygonContainer();
    setVh();
    initSwiperMenu();
    initButtonNavMobile();
    initMobileSearch();
});

window.addEventListener('resize', () => {
    initPolygonContainer();
    setVh();
});
