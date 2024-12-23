class OfficesMapDetail {
    constructor(params) {
        this.params = params
        this.myMap = {}
    }

    async init() {
        this.initMap()
        this.renderOfficePlacemark()
    }

    initMap() {
        let maxZoom = 17;

        this.myMap = new ymaps.Map('map', {
            center: this.params.center, // [55.76, 37.64] - Москва
            zoom: this.params.zoom,
            controls: [
                'zoomControl',
            ],
            maxZoom: maxZoom,
            autoFitToViewport: 'none',
        });

        // Запрещаем скролить на карте
        this.myMap.behaviors.disable('scrollZoom');
    }

    renderOfficePlacemark() {
        let iconDefaultSize = [40, 48]; // Размер иконки
        let iconDefaultPath = '/frontend/dist/img/office-pin.svg'; // Путь к иконке офиса
        let iconDefaultOffset = [-20, -24] // Смещение иконки

        // Создаем метку с кастомной иконкой
        let myPlacemark = new ymaps.Placemark(this.params.coords, {}, {
            iconLayout: 'default#image',
            iconImageHref: iconDefaultPath,
            iconImageSize: iconDefaultSize,
            iconImageOffset: iconDefaultOffset,
        });

        this.myMap.geoObjects.add(myPlacemark);
    }
}

ymaps.ready(function () {
    const params = JSON.parse(document.getElementById('map').dataset.params)
    new OfficesMapDetail(params).init()
});
