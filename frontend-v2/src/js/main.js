// Import our custom CSS
import '../scss/styles.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import initPolygonContainer from './components/polygon-container.js'


document.addEventListener('DOMContentLoaded', () => {
    initPolygonContainer();
});

window.addEventListener('resize', () => {
    initPolygonContainer();
});
