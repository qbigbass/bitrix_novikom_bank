class OfficesMapDetail {
    constructor(params) {
        this.params = params
        this.myMap = {}
    }

    async init() {
        this.initMap()
        this.initOffsetCenter()
        this.renderOfficePlacemark()
    }

    initMap() {
        let maxZoom = 17;
        const isTablet = window.matchMedia(`(min-width: ${MEDIA_QUERIES['tablet']})`).matches;
        const isDesktop = window.matchMedia(`(min-width: ${MEDIA_QUERIES['tablet-album']})`).matches;

        this.myMap = new ymaps.Map('map', {
            center: this.params.center,
            zoom: this.params.zoom,
            controls: [],
            maxZoom: maxZoom,
            autoFitToViewport: 'none',
        });

        // Пользовательский макет ползунка масштаба.
        const ZoomLayout = ymaps.templateLayoutFactory.createClass(
            "<div class='map-zoom-container'>" +
            "    <button type='button' id='zoom-in' class='btn btn-zoom bg-white' aria-label='Увеличить масштаб'>" +
            "        <svg class='icon' xmlns='http://www.w3.org/2000/svg' width='100%' height='100%'>" +
            "            <use xlink:href='/frontend/dist/img/svg-sprite.svg#icon-plus'></use>" +
            "        </svg>" +
            "    </button>" +
            "    <button type='button' id='zoom-out' class='btn btn-zoom bg-white' aria-label='Уменьшить масштаб'>" +
            "        <svg class='icon' xmlns='http://www.w3.org/2000/svg' width='100%' height='100%'>" +
            "            <use xlink:href='/frontend/dist/img/svg-sprite.svg#icon-minus'></use>" +
            "        </svg>" +
            "    </button>" +
            "</div>", {

                build: function () {
                    ZoomLayout.superclass.build.call(this);

                    this.zoomInCallback = ymaps.util.bind(this.zoomIn, this);
                    this.zoomOutCallback = ymaps.util.bind(this.zoomOut, this);

                    $('#zoom-in').bind('click', this.zoomInCallback);
                    $('#zoom-out').bind('click', this.zoomOutCallback);
                },

                clear: function () {
                    $('#zoom-in').unbind('click', this.zoomInCallback);
                    $('#zoom-out').unbind('click', this.zoomOutCallback);

                    ZoomLayout.superclass.clear.call(this);
                },

                zoomIn: function () {
                    var map = this.getData().control.getMap();
                    map.setZoom(map.getZoom() + 1, {checkZoomRange: true});
                },

                zoomOut: function () {
                    var map = this.getData().control.getMap();
                    map.setZoom(map.getZoom() - 1, {checkZoomRange: true});
                }
            });

        const zoomControl = new ymaps.control.ZoomControl({
            options: {
                layout: ZoomLayout,
            }
        });

        const positionZoomControl = isDesktop
            ? {
                top: 'calc(50vh - 7rem)',
                right: '1rem'
            }
            : isTablet
                ? {
                    top: 'calc((53vh / 2) - 5rem)',
                    right: '1rem'
                }
                : {
                    right: '1rem',
                    bottom: '1rem'
                };

        this.myMap.controls.add(zoomControl, {
            float: 'none',
            position: positionZoomControl
        });

        // Запрещаем скролить на карте
        this.myMap.behaviors.disable('scrollZoom');
    }

    initOffsetCenter() {
        const isDesktop = window.matchMedia(`(min-width: ${MEDIA_QUERIES['tablet-album']})`).matches;

        if (isDesktop) {
            // Смещение центра карты вправо на 200px
            const offsetPX = 200;
            const positions = this.myMap.getGlobalPixelCenter();
            const offsetPos = this.myMap.options.get('projection').fromGlobalPixels([positions[0] - offsetPX, positions[1]], this.myMap.getZoom());
            this.myMap.setCenter(offsetPos);
        }
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
