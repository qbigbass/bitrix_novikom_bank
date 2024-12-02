class OfficesMap {
    constructor(params) {
        this.params = params
        this.offices = []
        this.filteredOffices = []
        this.myMap = {}
        this.geoObjects = []
        this.clusterer = {}
        this.term = ''
        this.filterFormValues = {
            individuals: false,
            legal: false,
            limitedMobility: false,
            brokerage: false,
            biometrics: false,
        }
    }

    async init() {
        this.initMap()
        await this.loadOffices()
        this.filterOffices()
        this.initOfficesSearchFilter()
        this.renderOfficesPlacemarks()
    }

    initMap() {
        let maxZoom = 17;

        this.myMap = new ymaps.Map('map', {
            center: [55.76, 37.64], // [55.76, 37.64] - Москва
            zoom: 10,
            controls: [
                'zoomControl',
            ],
            maxZoom: maxZoom,
            autoFitToViewport: 'none',
        });

        this.clusterer = new ymaps.Clusterer({
            preset: 'islands#invertedVioletClusterIcons',
            groupByCoordinates: false,
            // clusterDisableClickZoom: true,
            clusterHideIconOnBalloonOpen: false,
            geoObjectHideIconOnBalloonOpen: false
        });

        // Запрещаем скролить на карте
        this.myMap.behaviors.disable('scrollZoom');
    }

    async loadOffices() {
        const queryParams = new URLSearchParams({
            mode: 'class',
            c: 'dalee:offices.map',
            action: 'fetchOffices',
            type: this.params.sectionCode
        }).toString();
        const response = await fetch('/bitrix/services/main/ajax.php?' + queryParams)
        const result = await response.json()
        this.offices = result.data.items
        this.filteredOffices = result.data.items
    }

    filterOffices() {
        this.getFilterFormValues()

        if (this.term.length) {
            this.filteredOffices = this.offices.filter(item => (item.name + item.address).toLowerCase().includes(this.term.toLowerCase()))
        }
        if (this.filterFormValues.limitedMobility) {
            this.filteredOffices = this.filteredOffices.filter(item => item.services.includes('mgn'))
        }
        if (this.filterFormValues.individuals) {
            this.filteredOffices = this.filteredOffices.filter(item => item.services.includes('mgn'))
        }

        this.renderOfficesList()
    }

    renderOfficesPlacemarks() {
        let iconDefaultSize = [40, 48]; // Размер иконки
        let iconDefaultPath = '/frontend/dist/img/office-pin.svg'; // Путь к иконке офиса
        let iconDefaultOffset = [-20, -24] // Смещение иконки

        this.filteredOffices.forEach(item => {
            // Создаем метку с кастомной иконкой
            let myPlacemark = new ymaps.Placemark(item.coords, {}, {
                iconLayout: 'default#image',
                iconImageHref: iconDefaultPath,
                iconImageSize: iconDefaultSize,
                iconImageOffset: iconDefaultOffset,
            });

            this.geoObjects.push(myPlacemark)
        })
        this.clusterer.add(this.geoObjects);
        this.myMap.geoObjects.add(this.clusterer);
    }

    renderOfficesList() {
        $('#offices-list').empty()

        this.filteredOffices.forEach(item => {
            $('#offices-list').append(`
                <a class="card-office d-flex col-gap-2 align-items-center" href="${item.url}" id="office-item-${item.id}">
                    <div class="card-office__body d-flex flex-grow-1 flex-column row-gap-2 row-gap-md-3">
                        <p class="card-office__title fw-semibold text-l m-0">${item.name}</p>
                        <p class="card-office__address text-s m-0 dark-70">${item.address}</p>
                        <div>services: ${item.services.join(', ')}</div>
                    </div>
                    <svg class="icon size-m d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </a>
            `)
        })
    }

    initOfficesSearchFilter() {
        $('#offices-search-input').on('input', (e) => {
            this.term = e.target.value
            this.filterOffices()
        })

        $('#filters-submit-button').on('click', () => {
            this.filterOffices()
        })
    }

    getFilterFormValues() {
        this.filterFormValues = {
            individuals: $('#individuals').is(':checked'),
            legal: $('#legal').is(':checked'),
            limitedMobility: $('#limited-mobility').is(':checked'),
            brokerage: $('#brokerage').is(':checked'),
            biometrics: $('#biometrics').is(':checked'),
        }
    }
}

ymaps.ready(function () {
    const params = JSON.parse(document.getElementById('map').dataset.params)
    new OfficesMap(params).init()
});
