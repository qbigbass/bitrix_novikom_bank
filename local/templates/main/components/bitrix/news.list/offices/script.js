class OfficesMap {
    constructor(params) {
        this.params = params
        this.offices = []
        this.services = []
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
            currencyIn: [],
            currencyOut: [],
        }
    }

    async init() {
        this.initMap()
        await this.loadOffices()
        this.filterOffices()
        this.initOfficesSearchFilter()
        this.initOfficesServicesFilter()
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
        this.services = result.data.services
    }

    filterOffices() {
        this.updateFilterFormValues()

        this.filteredOffices = this.offices

        if (this.term.length) {
            this.filteredOffices = this.filteredOffices.filter(
                item => (item.name + item.address).toLowerCase().includes(this.term.toLowerCase())
            )
        }

        if (this.filterFormValues.accessFree || this.filterFormValues.accessEmployee) {
            if (this.filterFormValues.accessFree) {
                this.filteredOffices = this.filteredOffices.filter(item => item.freeAccess)
            }
            if (this.filterFormValues.accessEmployee) {
                this.filteredOffices = this.filteredOffices.filter(item => !item.freeAccess)
            }
        }

        if (this.filterFormValues.individuals) {
            this.filteredOffices = this.filteredOffices.filter(item => item.individual)
        }

        if (this.filterFormValues.legal) {
            this.filteredOffices = this.filteredOffices.filter(item => item.corporate)
        }

        if (this.filterFormValues.currencyIn.length) {
            this.filteredOffices = this.filteredOffices.filter(item => {
                return (new Set(item.currency.in)).intersection(new Set(this.filterFormValues.currencyIn)).size > 0
            })
        }

        if (this.filterFormValues.currencyOut.length) {
            this.filteredOffices = this.filteredOffices.filter(item => {
                return (new Set(item.currency.out)).intersection(new Set(this.filterFormValues.currencyOut)).size > 0
            })
        }

        const servicesFilter = {...this.filterFormValues}
        delete servicesFilter.individuals
        delete servicesFilter.legal
        delete servicesFilter.accessFree
        delete servicesFilter.accessEmployee
        delete servicesFilter.currencyIn
        delete servicesFilter.currencyOut

        if (Object.values(servicesFilter).some(item => item === true)) {
            console.log('filter services')
            for (const [key, value] of Object.entries(servicesFilter)) {
                if (servicesFilter[key]) {
                    this.filteredOffices = this.filteredOffices.filter(item => item.services.includes(key))
                }
            }
        }

        this.renderOfficesList()
        this.renderOfficesPlacemarks()
    }

    clearOfficesPlacemarks() {
        this.myMap.geoObjects.removeAll()
    }

    renderOfficesPlacemarks() {
        this.clearOfficesPlacemarks()

        let iconDefaultSize = [40, 48] // Размер иконки
        let iconDefaultPath = '/frontend/dist/img/office-pin.svg' // Путь к иконке офиса
        let iconDefaultOffset = [-20, -24] // Смещение иконки

        this.filteredOffices.forEach(item => {
            let myPlacemark = new ymaps.Placemark(item.coords, {}, {
                iconLayout: 'default#image',
                iconImageHref: iconDefaultPath,
                iconImageSize: iconDefaultSize,
                iconImageOffset: iconDefaultOffset,
            });

            myPlacemark.events.add(['click'],  (e) => {
                location.href = item.url
            })

            this.myMap.geoObjects.add(myPlacemark)
        })

        if (this.myMap.geoObjects.length) {
            this.myMap.setBounds(this.myMap.geoObjects.getBounds(), {
                checkZoomRange: true
            }).then(() => {
                if (this.myMap.getZoom() > 14) {
                    this.myMap.setZoom(14)
                }
            })
        }

        // this.clusterer.add(this.geoObjects)
        // this.myMap.geoObjects.add(this.clusterer)
    }

    renderOfficesList() {
        $('#offices-list').empty()

        this.filteredOffices.forEach(item => {
            $('#offices-list').append(`
                <a class="card-office d-flex col-gap-2 align-items-center" href="${item.url}" id="office-item-${item.id}">
                    <div class="card-office__body d-flex flex-grow-1 flex-column row-gap-2 row-gap-md-3">
                        <p class="card-office__title fw-semibold text-l m-0">${item.name}</p>
                        <p class="card-office__address text-s m-0 dark-70">${item.address}</p>
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

        $('#filters-reset-button').on('click', () => {
            $('#individuals').prop('checked', false)
            $('#legal').prop('checked', false)

            for (const [key, value] of Object.entries(this.services)) {
                $('#filter-service-' + key).prop('checked', false)
            }

            this.filterOffices()
        })
    }

    initOfficesServicesFilter() {
        const servicesContainer = $('#offices-services-filter').html('<h5>Услуги</h5>')
        for (const [key, value] of Object.entries(this.services)) {
            servicesContainer.append(`
                <div class="form-check">
                    <input class="form-check-input" id="filter-service-${key}" type="checkbox" value="">
                    <label class="form-check-label" for="filter-service-${key}">${value}</label>
                </div>`
            )
        }
    }

    updateFilterFormValues() {
        const currencyIn = []
        $('[name="currency_in[]"]:checked').each((index, item) => {
            currencyIn.push(item.value)
        })

        const currencyOut = []
        $('[name="currency_out[]"]:checked').each((index, item) => {
            currencyOut.push(item.value)
        })

        this.filterFormValues = {
            individuals: $('#individuals').is(':checked'),
            legal: $('#legal').is(':checked'),
            currencyIn: currencyIn,
            currencyOut: currencyOut,
            accessFree: $('#access-free').is(':checked'),
            accessEmployee: $('#access-employee').is(':checked'),
        }
        for (const [key, value] of Object.entries(this.services)) {
            this.filterFormValues[key] = $('#filter-service-' + key).is(':checked')
        }
        // console.log('updateFilterFormValues:', this.filterFormValues)
    }
}

ymaps.ready(function () {
    const params = JSON.parse(document.getElementById('map').dataset.params)
    new OfficesMap(params).init()
});
