import initPolygonContainer from './components/polygon-container.js'
import initDropdownMenu, { hideDropDownMenu } from './components/dropDownMenu.js'
import {setVh} from "./utils";
import { initSwiperMenu, initHeroBanner, initCardSlider, initAnnouncementSlider, initTabsSlider } from "./components/swiper/swiper";
import initButtonNavMobile from './components/nav-panel.js'
import initMobileSearch from './components/mobile-search.js'
import initSelect2 from './components/select2.js'
import { initTabsContent } from './components/tabs.js'
import initInputSlider from "./components/inputSlider";
import showMoreContent from "./components/showMoreContent";
import initDatepicker from './components/datepicker.js'
import setPage from "./components/setPage";
import {initFormSteps} from "./components/form/formSteps";
import {initFormFeedback} from "./components/form/formFeedback";
import {initFormSend} from "./components/form/formSend";
import {initUploadFile} from "./components/form/uploadFile";
import {initMask} from "./components/form/mask";
import {initResizePolygonAccordions} from "./components/accordions";
import initHeaderSearchForm from "./components/headerSearchForm.js";

document.addEventListener('DOMContentLoaded', () => {
    initDropdownMenu();
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
    initDatepicker();
    setPage();
    initFormSteps();
    initFormFeedback();
    initFormSend();
    initUploadFile();
    initMask();
    initResizePolygonAccordions();
    initHeaderSearchForm();
    hideDropDownMenu();
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
    hideDropDownMenu();
});
