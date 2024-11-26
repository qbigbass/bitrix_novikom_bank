// import '../scss/style.scss';
// Import all of Bootstrap's JS
// import * as bootstrap from 'bootstrap'
import initPolygonContainer from './components/polygon-container.js'
import initDropdownMenu from './components/dropDownMenu.js'
import {setVh} from "./utils";
import { initSwiperMenu, initHeroBanner, initCardSlider, initAnnouncementSlider, initTabsSlider } from "./components/swiper/swiper";
import initButtonNavMobile from './components/nav-panel.js'
import initMobileSearch from './components/mobile-search.js'
import initSelect2 from './components/select2.js'
import { initTabsContent } from './components/tabs.js'
import initInputSlider from "./components/inputSlider";
import showMoreContent from "./components/showMoreContent";
import './components/accessibility-panel.js'

document.addEventListener('DOMContentLoaded', () => {
    initDropdownMenu();
    // initPolygonContainer();
    setVh();
    initSwiperMenu();
    initButtonNavMobile();
    initMobileSearch();
    initHeroBanner();
    initCardSlider();
    initAnnouncementSlider();
    initTabsSlider();
    initSelect2();
    initTabsContent();
    initInputSlider();
    showMoreContent();
});

window.onload = function() {
    initPolygonContainer();

    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))


    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
};

window.addEventListener('resize', () => {
    initPolygonContainer(true);
    setVh();
});
