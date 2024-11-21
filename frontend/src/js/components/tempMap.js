ymaps = window.ymaps;
// в случае если обьект не загружен
var yLoad = false;
// true загружен
if (typeof ymaps != 'undefined') {
  var yLoad = true;
}

let workJs = document.getElementsByClassName('y-map')[0];
workJs.setAttribute("data-js", 'allow-js');

document.addEventListener('DOMContentLoaded', function(){
  if (yLoad) {
    ymaps.ready(function(){
    }).then(function(){
      init(true);
    }).catch(function(){
      init(false);
    });
  } else {
    init(false);
  }
  addEventListener("popstate", function (e) {
    location.reload();
  });
});

function init(isLoad) {

  if (!isLoad) {
    let cMap = document.getElementsByClassName('y-map-container-in')[0];
    cMap.style.display = 'none';
    let cMapContainer = document.getElementsByClassName('y-map-container')[0];
    cMapContainer.style.backgroundColor = '#efefef';
  }

  // Префикс урла для теста, пути в urlrewrite.php, так же должны быть прописаны
  let addUrlPreffix = '/offices-atm-new';
  // Офис, банкоматы
  let typePoints = $('.y-map-change-point');
  // Фильтры
  let filterCheckbox = $('.y-map-checkbox__el');
  // Список
  let listContent = $('.y-map-list-content');
  // точка
  let pointContent = $('.y-map-point-content');
  // Кнопка назад
  let btnBack = $('.y-map-back-list');
  // Зона для вставки названия города или региона
  let zoneCityOrRegion = $('.region');
  // Размелитель для точек в класторе
  let delliter = '__';
  // Поиск по полю в js данных
  let typeContent = "typeContent";
  // блок контента
  let allContent = $('.all-content');
  // бокс для контента точек
  let addMyPoints = $('.mypoints');
  // Блок контента правой колонки
  //let listContentBox = $('.y-map-overy-map-content');
  // Точки в видимой области список в блоке "СПИСОК"
  let objectlist = $('.objectlist');
  // Работа с урлом
  let pUrl = getLocation();
  // Города и регионы
  let places = $('.place');
  // Глобальный тип Офисы или банкоматы
  let getType = pUrl.type;
  // Название офисы или банкоматы
  let nameType = $('#' + pUrl.type).text();
  // фильтры
  let filters = [];
  // Координаты перехода
  let objCoords = getCoordsZoomRegionOrCity();
  // иконка по умолчанию
  let defaultIcon = '/local/templates/main/components/bitrix/news.list/officesamps2022v6/img/pin.png';
  // Цвет для кластера
  let defaultColor = "#4782af"; //
  // иконка активности и новере на точке
  let overIcon = '/local/templates/main/components/bitrix/news.list/officesamps2022v6/img/pin_over.png';
  // иконка для болуна при выборе региона
  //let regionIcon = '/local/templates/main/components/bitrix/news.list/officesamps2022v2/img/pin_.png';
  let regionIcon = '/local/templates/main/components/bitrix/news.list/officesamps2022v6/img/pin.png';
  // Цвет для кластера при выбора региона или города
  //let regionColor = "#75a8d5";
  let regionColor = "#4782af";
  // Поиск по обьекту точек
  let arr = [];
  // Параметры фильтров, скрываем или показываем в зависимости от типа точки
  let yMapParams = $(".y-map-params");
  // Группы параметров
  let yMapGroupParams = $(".y-map-group-filters");
  // параметр
  let allowParam = 'view';
  // Значение
  let allowValue = 'region';
  // Показать точки только по региону
  let viewRigion = haveParameterInUrl(allowParam, allowValue);
  // точки только региона
  let onlyPointsRegion = [];

  let arPoints = novikomPoints;
  // Иконки на карте, вид контента
  let yaview = $('.ya-view-false');

  //let isMobile = window.matchMedia("only screen and (max-width: 769px)").matches;

  let selectWrap = $('.y-map-select-wrapper');

  let maxZoom = 17;

  // можно отключить кластер, если показывать только регионам
  let blCluster = true;
  if (!!viewRigion) {
    //blCluster = false;
  }

  if (isLoad) {

    // карта
    var myMap = new ymaps.Map('map', {
        center: [objCoords.l, objCoords.r], // [55.76, 37.64] - Москва
        zoom: objCoords.zoom, // 10
        controls: []
      }, {
        maxZoom: maxZoom,
        autoFitToViewport: 'none', // always
        searchControlProvider: 'yandex#search',
        yandexMapDisablePoiInteractivity: true // запрет Интерактивность маркеров
      }),
      // Парметры класторизации по умолчанию
      objectManagerClussterOptionDefault = {
        // Чтобы метки начали кластеризоваться, выставляем опцию.
        clusterize: blCluster,
        // ObjectManager принимает те же опции, что и кластеризатор.
        gridSize: 64,
        // Мы хотим загружать данные для балуна перед открытием, поэтому
        // запретим автоматически открывать балун по клику.
        geoObjectOpenBalloonOnClick: false,
        // запрещение открывать 2 и более точек всплывашка на карте
        clusterOpenBalloonOnClick: false,
        // запрещение масштабирования карты при щелчке по кластеру true
        clusterDisableClickZoom: false,
        // Макет метки кластера pieChart.
        clusterIconLayout: 'default#pieChart',
        // Радиус диаграммы в пикселях.
        clusterIconPieChartRadius: 20,
        // Радиус центральной части макета.
        clusterIconPieChartCoreRadius: 15,
        // Ширина линий-разделителей секторов и внешней обводки диаграммы.
        clusterIconPieChartStrokeWidth: 2,
        // Определяет наличие поля balloon.
        hasBalloon: false,
        zoomMargin: 90
      },

      searchControl = new ymaps.control.SearchControl({
        options: {
          provider: 'yandex#map'
        }
      });

    objectManager = new ymaps.ObjectManager(objectManagerClussterOptionDefault),

      objectManager.add(arPoints);

    myMap.geoObjects.add(objectManager);
    // Запрещаем скролить на карте
    myMap.behaviors.disable('scrollZoom');

    arr = objectManager.objects.getAll();

    // при наведение на обьект, подсветить точку
    objectManager.objects.events.add('mouseenter', function (e) {
      objectManager.objects.setObjectOptions(e.get('objectId'), { iconImageHref: overIcon });
    });
    // если точка активная, и ее id совпадает с открытм окном ничего не делать
    objectManager.objects.events.add('mouseleave', function (e) {
      if ($('.y-map-overy-map-content').hasClass('active')) {
        let openWindowPoint = $('.y-map-box-info-point');
        let blnFindPointId = true;
        openWindowPoint.each(function (event) {
          if (e.get('objectId') == $(this).data('id')) {
            blnFindPointId = false;
            return false;
          }
        });
        if (blnFindPointId) {
          objectManager.objects.setObjectOptions(e.get('objectId'), { iconImageHref: defaultIcon });
        }
      } else {
        objectManager.objects.setObjectOptions(e.get('objectId'), { iconImageHref: defaultIcon });
      }
    });

  } else {
    arr = arPoints.features;
  }


  // Старт и перезапуск функций, при ресайзе
  let minResize = false;
  let maxResize = false;
  let f_windowWidth = function (w) {
    if (w <= n && !minResize) {
      minResize = true;
      maxResize = false;
      $('body').addClass('isMobile');
      isMobile = true;
      startMapEngineOrResize();
    }
    if (w >= n && !maxResize) {
      maxResize = true;
      minResize = false;
      $('body').removeClass('isMobile');
      isMobile = false;
      startMapEngineOrResize();
    }
  };
  let n = 769, w = window.innerWidth;
  f_windowWidth(w);
  $(window).on("resize", function () {
    let w = window.innerWidth;
    f_windowWidth(w);
  });
  // Перезауск


  // в списке без карты
  $('.y-map-list-content').on('click', ".y-map-line", function (e) {

    e.preventDefault();

    let line = $(this);
    let ids = [];
    let city = '';
    let typePointTxt = '';

    $('.y-map-line').removeClass('active');
    line.addClass('active');

    let idObject = line.data('id');
    let findObject = arr.filter(function( obj ) {
      return obj.id === idObject;
    });

    if(Object.keys(findObject).length===0) {
      console.log('Не удалось найти обьект!');
    } else {
      ids.push(idObject);
      addActiveObjectList(ids, findObject[0].url);
      $('.y-map-region').each( function(e) {
        if ($(this).hasClass("active")) {
          // city = $(this).text();
          city = $(this).data('genitive');
        }
      });
      setHeaderTitle(findObject[0].typeGlobalContent, findObject[0].properties.balloonContent, city, 'point');
    }
  });


  // тип точки
  typePoints.on('click', function (e) {
    e.preventDefault();
    clearFilters();
    setUrlTypePoints($(this));
    if (!!viewRigion && isLoad) {
      regionFiltres = getUrlParamsFilter();
      objectManager.setFilter(getFilterRegion(regionFiltres));
    }
    closeOpenWindow();
    closePointWindow();
    changeTypePoints($(this));
  });

  // Мобильное представление выбора офиса или банкоматов
  if (typeof selectWrap != 'undefined') {

    selectWrap.each( function(e) {

      let thisEl = $(this);
      let option = thisEl.find(".y-map-custom-option");

      thisEl.on('click', function (e) {
        e.preventDefault();
        thisEl.find('.y-map-custom-select').toggleClass('open');
      });

      option.each( function(e) {

        let thisOl = $(this);

        thisOl.on('click', function (event) {

          event.preventDefault();

          if (!thisOl.hasClass("disabled") || !thisOl.hasClass("active")) {

            option.removeClass('active');
            thisOl.addClass('active');
            thisOl.closest('.y-map-custom-select').find('.y-map-custom-select__trigger span').text(thisOl.text());

            clearFilters();
            setUrlTypePoints(thisOl);
            if (!!viewRigion && isLoad) {
              regionFiltres = getUrlParamsFilter();
              objectManager.setFilter(getFilterRegion(regionFiltres));
            }
            closeOpenWindow();
            closePointWindow();
            changeTypePoints(thisOl);
          }

        });

      });

    });

    window.addEventListener('click', function (e) {
      $('.y-map-custom-select').each( function(event) {
        if (!$(this).has(e.target).length) {
          $(this).removeClass('open');
        }
      });

    });

  }

  // город или регион
  places.on('click', function (e) {
    e.preventDefault();
    clearFilters();
    changeRegionCity($(this));
    // если карта загружена и есть параметр
    if (!!viewRigion && isLoad) {
      regionFiltres = getUrlParamsFilter();
      objectManager.setFilter(getFilterRegion(regionFiltres));
    }
  });


  // При изменение фильтра чекбосов меняем точки на карте
  filterCheckbox.change(function () {
    if (isLoad) {
      filtres = getFilterDataBlocks();
      objectManager.setFilter(getFilterFunction(filtres));
    }
    countFilterEl();
    dinamicHideFilter();
    changePointsNonMapInList();
  });

  $("body").on("click", "#clearFilter", function (e) {
    e.preventDefault();
    clearFilters();
    changePointsNonMapInList();
  });

  $("body").on("click", ".y-map-view-filter, h1 span, .y-map-view-filter-mobile", function (e) {
    e.preventDefault();
    let viewBox = '';
    if (e.target.tagName == 'SPAN')	{
      viewBox = 'y-map-over-region-or-city';
    } else {
      viewBox = $(this).data('class-view');
    }
    closeOpenWindow();
    $('.'+viewBox).addClass('active');
  });

  $("body").on("click", ".y-map-wfilter__close-ic", function (e) {
    e.preventDefault();
    closeOpenWindow();
    //changePointsNonMapInList();
  });

  // кнопка назад при активной точке
  $("body").on("click", ".y-map-back-list", function (e) {
    e.preventDefault();
    pUrl = getLocation();
    closePointWindow();
    changeRegionCity($("#"+pUrl.searchRegion));
  });

  /**
   * Уникальная точка
   */
  if (isLoad) {
    objectManager.objects.events.add('click', function (e) {
      viewDetailPoints(e);
    });
  } else {
    // Скрыть выбор контента
    $('.y-map-change-view-type').hide();
  }


  // если карта загружена и есть параметр, показываем точки только региона
  if (!!viewRigion && isLoad) {
    regionFiltres = getUrlParamsFilter();
    objectManager.setFilter(getFilterRegion(regionFiltres));
  }

  /**
   * Тип контента для показа
   * Если нет карты скрываем выбор типа контента
   */
  if (typeof yaview != 'undefined') {
    if (isLoad) {
      yaview.eq(1).addClass('active');
      yaview.on('click', function (e) {
        e.preventDefault();
        viewYaContent($(this));
      });
    } else {
      yaview.eq(0).addClass('active');
      yaview.eq(1).hide();
    }
    viewYaContent($('.ya-view.active'));
  }

  viewListOrMapMobile(true);
  $("body").on("click", "#viewList, #viewMap", function (e) {// .y-map-open-adress-click
    e.preventDefault();
    viewListOrMapMobile(false);
    $('#'+$(this).data('view')).addClass('active');
    $('.y-map-wrapper').addClass($(this).data('view'));
    if (isLoad) {
      //myMap.container.fitToViewport();
    }
  });

  function viewListOrMapMobile(first) {

    if (isMobile) {
      $('.y-map-change-view-type').each(function () {
        let thisActive = $(this);
        $('.y-map-wrapper').removeClass(thisActive.attr('id'));
        thisActive.removeClass('active');
      });
      if (first) {
        if (!isLoad) {
          $v = 'viewList';
        } else {
          $v = 'viewMap';
        }
        $('#'+$v).addClass('active');
        $('.y-map-wrapper').addClass($v);
      }
    }
  }



  /**
   * Получить фильтр, работает только с параметром
   */
  function getUrlParamsFilter() {
    let pUrl = getLocation();
    let type = pUrl.type;
    let region = pUrl.region;
    let city = pUrl.city;
    let ffilter = [];
    // Собираем фильтры
    if (type != '' ) {
      ffilter.push(type);
    }
    if (region != '' ) {
      ffilter.push(region);
    }
    if (city != '' && region != city) {
      ffilter.push(city);
    }
    return ffilter;
  }

  /**
   * Функция фильтрации обьекта точек Региона
   */
  function getFilterRegion(regionFiltres) {
    return function (obj) {
      let view = false;
      let find = 0;
      let ar = obj['typeContent'];
      regionFiltres.forEach(function(el){
        if (ar.includes(el)) {
          find++;
        }
      });
      if (find === regionFiltres.length && find != 0) {
        view = true;
      }
      return view;
    }
  }


  /**
   *  Глобальный тип точек, офисы или банкоматы
   */
  function changeTypePoints(obj) {

    let tPoint = '';
    let objId = obj.attr('id');
    let objActive = obj;

    pUrl = getLocation();

    if (!typePoints.is(":visible")) {

      tPoint = $(".y-map-custom-option");
      if (objId != 'offices-m' && objId != 'atms-m') {
        objActive = $('#'+objId+'-m');
      }
      objActive.closest('.y-map-custom-select').find('.y-map-custom-select__trigger span').text(objActive.text());
      tPoint.removeClass('active disabled');

    } else {
      objActive = $('#'+objId);
      typePoints.removeClass('active').prop("disabled", false);
    }

    objActive.addClass('active');

    if (isLoad) {
      filtres = getFilterDataBlocks();
      objectManager.setFilter(getFilterFunction(filtres));
      changeRegionCity($("#" + pUrl.searchRegion));
    }

  }


  /**
   * Установить урл
   */
  function setUrlTypePoints(obj) {

    // Подменный урл в случае если уже установлены регион или город
    let fullUrl = addUrlPreffix + "/" + obj.data('search') + "/";

    // вслучае если установлен город
    places.each(function () {
      if ($(this).hasClass('active')) {
        fullUrl = fullUrl + $(this).attr('href');
      }
    });
    // изменяем урл
    setBrowserUrl(fullUrl, allowParam, allowValue);
    // изменяем вид представления точек в зависимости от урла
    changeView();
    changePointsNonMapInList();
  }

  /**
   * Изменить страницу при выборе региона или города
   */
  function changeRegionCity(obj) {

    // Парсинг урл
    let pUrl = getLocation();
    // url
    let url = obj.attr('href');
    // изменяем урл
    let rcUrl = addUrlPreffix + "/" + pUrl.type + "/" + url;

    setBrowserUrl(rcUrl, allowParam, allowValue);
    //window.history.pushState(null, null, rcUrl);
    // куда переместиться
    let objCoords = getCoordsZoomRegionOrCity();
    if (isLoad) {
      getCenterRegionAllPoints();
    }
    obj.closest('div.y-map-over-box').removeClass('active');
    // изменяем вид представления точек в зависимости от урла
    changeView();
    changePointsNonMapInList();
  }

  /**
   * Переместиться не к точке из регионов, а собрать все точки и переместиться к ним, по правилам см.ниже
   */
  function getCenterRegionAllPoints(){
    let pUrl = getLocation();
    let type = pUrl.type;
    let region = pUrl.region;
    let city = pUrl.city;
    let ffilter = [];
    let newArrCoords = [];
    let arrHiddenPoint = [];
    let points = [];

    // Собираем фильтры
    if (type != '' ) {
      ffilter.push(type);
    }
    if (region != '' ) {
      ffilter.push(region);
    }
    if (city != '' && region != city) {
      ffilter.push(city);
    }
    if (ffilter.length !== 0) {
      for (let k in Object.keys(arr)) {

        let find = 0;
        let ar = arr[k].typeContent

        ffilter.forEach(function(el){
          if (ar.includes(el)) {
            find++;
          }
        });

        if (find === ffilter.length && find != 0) {
          newArrCoords.push(arr[k].geometry.coordinates);
          arrHiddenPoint.push(arr[k].id);
        }
      }
    }

    // вернуть всем обьектам цвет по умолчанию
    clearAllPointImgBoloon();

    if(newArrCoords.length !== 0) {
      // tyt
      arrHiddenPoint.forEach(function(id){
        let object = objectManager.objects.getById(id);
        objectManager.objects.setObjectOptions(id, {
          iconImageHref: regionIcon,
          iconColor: regionColor
        });
      });

      // Создание коллекции геообъектов и настройка параметров.
      var myGeoObjects = new ymaps.GeoObjectCollection();
      myGeoObjects.removeAll();
      newArrCoords.forEach(function(coords){
        var myPlacemark = new ymaps.Placemark(coords);
        // скрываем дубли обьекты с карты
        myPlacemark.options.set("visible", false);
        myGeoObjects.add(myPlacemark);
      });
      // Добавление коллекции на карту.
      myMap.geoObjects.add(myGeoObjects);
      // Установка центра и масштаба карты таким образом, чтобы вся коллекция была видна.
      myMap.setBounds(myGeoObjects.getBounds(), {
        checkZoomRange: true,
        zoomMargin: [90]
      });
    }
  }

  /**
   * Клик по кластеру
   */
  function onClusterEvent(e) {
    let zoom = myMap.getZoom();
    if (zoom >= 1) {
      let objectId = e.get('objectId');
      let arCodePoints = [];
      let cluster = objectManager.clusters.getById(objectId);
      let objects = cluster.properties.geoObjects;
      objects.forEach(function (element) {
        arCodePoints.push(element);
      });
      viewDetailPoints(arCodePoints);
    }
  }
  if (isLoad) {
    objectManager.clusters.events.add(['click'], onClusterEvent);
  }

  /**
   * Вывести для детального просмотра точки или точку
   * pPoint - может быть обьектом, массивом или строка (код (CODE) точки)
   * Второй параметр, отключить построение урла для точек или точки, и только офисов
   */
  function viewDetailPoints(pPoint) {


    let pUrl = getLocation();
    let url = '';
    let arObjId = [];
    let arUrl = [];
    let arCreateClasterUrl = [];
    let match = [];
    let lineClusterCode = '';

    if (Object.prototype.toString.call(pPoint) === '[object Array]') {

      // разделитель для группы кодов точек
      for (const e of pPoint) {
        arObjId.push(e.id);
        match = e.url.match(/[^/?]*[^/?]/g);
        arCreateClasterUrl.push(match.pop());
      }
      for (const el of match) {
        url += "/" + el;
      }
      addCodeDelliter = delliter;
      for (let i = 0; i < arCreateClasterUrl.length; i++) {
        if (i == arCreateClasterUrl.length - 1) {
          addCodeDelliter = '';
        }
        lineClusterCode += arCreateClasterUrl[i] + addCodeDelliter;
      }
      //url += "/" + lineClusterCode + "/";
      url += "/";

    } else if (Object.prototype.toString.call(pPoint) === '[object String]') {

      if (pPoint.indexOf(delliter) > -1) {

        // cluster
        let arClusterPoint = String(pPoint).split(delliter);
        for (const p of arClusterPoint) {
          objectManager.objects.each(function (object) {
            if (object.code == p) {
              arObjId.push(object.id);
              arUrl.push(object.url);
            }
          });
        }
        for (const e of arUrl) {
          match = e.match(/[^/?]*[^/?]/g);
          arCreateClasterUrl.push(match.pop());
        }
        for (const el of match) {
          url += "/" + el;
        }
        addCodeDelliter = delliter;
        for (let i = 0; i < arCreateClasterUrl.length; i++) {
          if (i == arCreateClasterUrl.length - 1) {
            addCodeDelliter = '';
          }
          lineClusterCode += arCreateClasterUrl[i] + addCodeDelliter;
        }
        url += "/" + lineClusterCode + "/";

      } else if(pPoint.indexOf(delliter) == -1) {
        // Соло точка
        arr.filter(function (obj, i) {
          if (String(pPoint).trim() === obj['code']) {
            arObjId[0] = obj['id'];
            url = obj['url'];
          }
        });

      } else {

        objectManager.objects.each(function (object) {
          if (object.code == pPoint) {
            arObjId[0] = object.id;
            url = object.url;
          }
        });
      }
    } else if (Object.prototype.toString.call(pPoint) === '[object Object]') {
      arObjId[0] = pPoint.get('objectId');
      url = objectManager.objects.getById(arObjId[0]).url;
    }
    if (pUrl.type == 'atms') {
      url = '';
      url += "/" + pUrl.region + "/";
      if(pUrl.city != '') {
        url += pUrl.city + "/";
      }
    }
    addActiveObjectList(arObjId, url);
    changeView();
  }



  /**
   *  Клик по точке, установить урл точки, переместиться к ней, отрисовать
   */
  function addActiveObjectList(arObjId, url) {
    // Парсинг урл
    let pUrl = getLocation();
    // Установить урл
    url = addUrlPreffix + "/" + pUrl.type + url;
    // собрать данные по точке
    let pointIds = [];

    if (isLoad) {

      let objectId = '';
      let checkObj = [];
      let singleObj = {};

      // для переход к точке или кластер
      objectId = arObjId[0];
      // данные точки
      singleObj = objectManager.objects.getById(objectId);

      // Открываем на мобилке информацию по точке
      if (isMobile) {
        viewListOrMapMobile(false);
        $('#viewList').addClass('active');
        $('.y-map-wrapper').addClass('viewList');
      }

      // переход к центру точки с зумированием
      /*
      myMap.setCenter(singleObj.geometry.coordinates, maxZoom, {
        checkZoomRange: true
      });
      */
      // обнулим все точки - иконку
      clearAllPointImgBoloon();
      for (const e of arObjId) {
        objectManager.objects.setObjectOptions(e, { iconImageHref: overIcon });
        pointIds.push(e);
      }

    } else {
      pointIds = arObjId;
    }

    if (pUrl.type != 'atms') {
      setBrowserUrl(url, allowParam, allowValue);
    }

    getInfoHtmlByPoints(pointIds, 'points');
  }

  /**
   * Основная функция фильтрации обьекта точек
   */
  function getFilterFunction(categories) {

    return function (obj) {

      let view = false;
      let arTrueElements = [];
      let availableFilters = [];
      let availableObjFilters = obj['typeContent'];
      let countAvailableElement = 0;

      // Поиск всех значение с true
      for (var s in categories['typeContent']) {
        if (categories['typeContent'][s] === true) {
          arTrueElements.push(s);
        }
      }

      if (arTrueElements.length !== 0) {

        // Допустимые значения, строки вхождения
        availableFilters = String(availableObjFilters).split(',');

        for (const e in arTrueElements) {
          for (const f in availableFilters) {
            // найдем true поисковые фильтры, посчитаем количество допустимых значений в точке
            if (arTrueElements[e] === availableFilters[f]) {
              countAvailableElement++;
            }
          }
        }
        // если ообщее количество выбранных фильтров, совпадает с количество допустимых в строке, показываем точку
        if (countAvailableElement == arTrueElements.length) {
          view = true;
        }
      }
      return view;
    }

  }

  /**
   * Работа с фильтром
   */
  function countFilterEl() {
    let countFilter = 0;
    // подсчет активных фильтров
    filterCheckbox.each(function(){
      if ($(this).is(':checked')) {
        countFilter++;
      }
    });
    $('#countFilter, #clearFilter').remove();
    if (countFilter>=1) {
      //$('.f').prepend('<div id="clearFilter"><span id="countFilter">'+countFilter+'</span> <span class="closeFilter">'+BX.message('YA_MAP_BREAK')+'</span></div>'); // Сбросить
      $('.f').append('<div id="clearFilter"><span id="countFilter">'+countFilter+'</span> <span class="closeFilter">'+BX.message('YA_MAP_BREAK')+'</span></div>'); // Сбросить
    }
  }

  /**
   * Чистим фильтр
   */
  function clearFilters() {
    filterCheckbox.each(function () {
      let t = $(this);
      t.prop('checked', false).attr('disabled', false);
      t.closest('.y-map-checkbox--abs').removeClass('disabled').next().removeClass('disabled');
    });
    if (isLoad) {
      filtres = getFilterDataBlocks();
      objectManager.setFilter(getFilterFunction(filtres));
    }
    countFilterEl();
  }

  /**
   * Обнулить все картинки точек
   */
  function clearAllPointImgBoloon() {
    arr.filter(function (obj, i) {
      objectManager.objects.setObjectOptions(obj.id, { iconImageHref: defaultIcon, iconColor: defaultColor });
    });
  }

  /** zoom точки */
  // Создадим пользовательский макет ползунка масштаба.
  if (isLoad) {
    ZoomLayout = ymaps.templateLayoutFactory.createClass("<div>" +
      "<div id='zoom-in' class='y-map-btn'><i class='fa fa-plus' aria-hidden='true'></i></div><br>" +
      "<div id='zoom-out' class='y-map-btn'><i class='fa fa-minus' aria-hidden='true'></i></div>" +
      "</div>", {

      // Переопределяем методы макета, чтобы выполнять дополнительные действия
      // при построении и очистке макета.
      build: function () {
        // Вызываем родительский метод build.
        ZoomLayout.superclass.build.call(this);

        // Привязываем функции-обработчики к контексту и сохраняем ссылки
        // на них, чтобы потом отписаться от событий.
        this.zoomInCallback = ymaps.util.bind(this.zoomIn, this);
        this.zoomOutCallback = ymaps.util.bind(this.zoomOut, this);

        // Начинаем слушать клики на кнопках макета.
        $('#zoom-in').bind('click', this.zoomInCallback);
        $('#zoom-out').bind('click', this.zoomOutCallback);
      },

      clear: function () {
        // Снимаем обработчики кликов.
        $('#zoom-in').unbind('click', this.zoomInCallback);
        $('#zoom-out').unbind('click', this.zoomOutCallback);

        // Вызываем родительский метод clear.
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
    }),
      zoomControl = new ymaps.control.ZoomControl({options: {layout: ZoomLayout}});
    myMap.controls.add(zoomControl, { float: 'none', position: {right: '20px', bottom: '120px'} });
  }


  /**
   * Показываем обьекты в таблице если форма не работает
   */
  function changePointsNonMapInList(){

    let bHtml = '';
    let pUrl = getLocation();
    let type = pUrl.type;
    let region = pUrl.region;
    let city = pUrl.city;
    let point = pUrl.point;
    let ffilter = [];
    let newArr = [];
    let arrIds = [];

    // Собираем фильтры
    if (type != '' ) {
      ffilter.push(type);
    }
    if (region != '' ) {
      ffilter.push(region);
    }
    if (city != '' && region != city) {
      ffilter.push(city);
    }
    if (point != '' ) {
      ffilter.push(point);
    }
    // активные фильтры
    filterCheckbox.each(function(){
      if ($(this).is(':checked')) {
        ffilter.push($(this).data('id'));
      }
    });

    if (ffilter.length !== 0) {
      for (let k in Object.keys(arr)) {
        let find = 0;
        let ar = arr[k].typeContent
        ar.push(arr[k].code);
        ffilter.forEach(function(el){
          if (ar.includes(el)) {
            find++;
          }
        });
        if (find === ffilter.length) {
          newArr.push(arr[k]);
        }
      }
    }
    if(newArr.length !== 0) {
      newArr.forEach(function(el){
        arrIds.push(el.id)
      });
      if (point != '') {
        bHtml = getHtmlTableLines(arrIds, 'points');
      } else {
        bHtml = getHtmlTableLines(arrIds, 'list');
      }
    } else {
      bHtml = getHtmlTableLines('undefined', '');
    }
  }


  /**
   * Шаблон для таблицы
   */
  function getHtmlTableLines(ids, type) {

    if (typeof ids !== 'undefined' && type != '') {
      getInfoHtmlByPoints(ids, type);
    } else {
      listContent.addClass('active');
      pointContent.removeClass('active');
      btnBack.closest('.y-map-scrollbar-points').removeClass('active');
      $('.table__tbody').empty().html('Поиск не дал результатов, укажите другой город или регион!');
    }
  }

  /**
   * Подгружаем точки в отдельный блок на карте, если JS не работает
   */
  function getInfoHtmlByPoints(ids, type) {

    if (ids.length !== 0) {

      let wJs = $('.y-map').data('js');

      if (type  == 'points') {
        listContent.removeClass('active');
        pointContent.addClass('active');
        btnBack.closest('.y-map-scrollbar-points').addClass('active');
      } else if (type  == 'list') {
        listContent.addClass('active');
        pointContent.removeClass('active');
        btnBack.closest('.y-map-scrollbar-points').removeClass('active');
      }
      // В случае когда работает JS, выборку делаем через JS
      if (typeof wJs != 'undefined' && type == 'list') {

        getInfoHtmlByPointsJs(ids, type);

      } else {

        $.ajax({
          url: BX.message('TEMPLATE_URL')+'/ajax.php',
          method: 'post',
          cache: true,
          data: { ids: ids, type: type },
          success: function (data) {
            if (type  == 'points') {
              $('.mypoints').empty().html(data);
              $('.y-map-accordion').beefup();
            } else if(type  == 'list') {
              $('.table__tbody').empty().html(data);
            }
          }
        });
      }
    }
  }


  /**
   * Подготовка HTML, когда JS включен
   */
  function getInfoHtmlByPointsJs(ids, type) {

    let el = ids.length,
      elContent = [],
      html = '',
      countEl = ids.length,
      addMoreClass = '',
      addClass = '';

    for (let i = 0; i < countEl; i++) {
      let findObject = arr.filter(function( obj ) {
        if (obj['id'] === ids[i]) {

          if (countEl>1) addMoreClass = 'y-map-more';

          if (type == 'list') {
            addClass += ' y-map-line';
          }

          if(obj['typeGlobalContent'] == 'atm') {
            addClass += ' y-map-atm';
          } else {
            if (type=='list') {
              addClass += ' y-map-office';
            }
          }

          html += '<div class="y-map-box-info-point '+addMoreClass+addClass+'" data-id="'+ids[i]+'">';
          html += '<div class="y-map-open-header">';

          html += '<div class="y-map-open-head">'+obj['properties']['balloonContent']+'</div>';
          if(obj['typeGlobalContent'] == 'atm') {
            html += '<div class="y-map-open-code">'+obj["code"]+'</div>';
          }
          html += '<div class="y-map-open-adress y-map-open-adress-click" data-view="viewMap">'+obj['pointInfo']['contact']+'</div>';

          /*
          if(obj['typeGlobalContent'] != 'atm') {
            let workTime = obj['pointInfo']['workTime'][0];
            if (workTime.hasOwnProperty("status")) {
              html += '<div class="y-work-indicator-box">';
              if (workTime.status.hasOwnProperty("f")) {
                html += '<span class="y-work-bank-indicator '+workTime.status.f+'"></span>';
              }
              if (workTime.status.hasOwnProperty("u")) {
                html += '<span class="y-work-bank-indicator '+workTime.status.u+'"></span>';
              }
              if (workTime.status.hasOwnProperty("k")) {
                html += '<span class="y-work-bank-indicator '+workTime.status.k+'"></span>';
              }
              html += '</div>';
            }
          }
          */


          if (obj['pointInfo']['metro'].length !== 0) {

            html += '<div class="y-map-open-metro">';
            html += '<span class="table__value table__metro">';

            obj['pointInfo']['metro'].forEach(function(m) {
              if(m.color != '') {
                let borderColor = m.color;
                let textColor = m.color;
                if(m.color == '#FFFFFF') {
                  borderColor = '#e11d36';
                  textColor = '#333';
                }
                html += '<span class="y-map-metro-color-circle-point" style="border: 1px solid '+borderColor+'; background-color: '+m.color+'"></span>';
                html += '<span class="y-map-metro-color-name" style="color: '+textColor+'">'+m.name+'</span>';//<br>';
              } else {
                html += m.name; //+ '<br>';
              }
            });
            html += '</span>';
            html += '</div>';
          }


          if(obj['typeGlobalContent'] == 'office') {

            let typeW = ['F', 'U', 'K'];
            let preffixLng = ['Режим обслуживания', 'Юридические лица', 'Операционная касса'];
            let addStyle = '';

            html += '<div class="y-map-open-free-box y-map-works">';

            obj['pointInfo']['workTime'].forEach(function(el){
              typeW.forEach( function(preffix, i) {
                addStyle = '';
                if (preffix in el) {

                  if (preffix == 'U' || preffix == 'K') {
                    addStyle = ' style="dispaly: inline-block; margin-top: 10px;" ';
                  }
                  if (preffixLng[i] != '') {
                    html += '<strong '+addStyle+'>'+preffixLng[i]+'</strong>';
                  }
                  let workLine = el[preffix].split(" || ");
                  html += '<table class="y-map-table-time">';
                  workLine.forEach(function(line){
                    let workCol = line.split("~ ");
                    html += '<tr><td>'+workCol[0]+'</td><td>'+workCol[1]+'</td></tr>';

                  });
                  html += '</table>';
                }
              });
            });
            html += '</div>';

            html += '<div class="y-map-open-contacts y-map-phones">';
            html += '<strong>'+BX.message('YA_MAP_CONTACTS')+'</strong>';
            html += '<table class="y-map-table-time">';
            html += '<tbody>';

            if (obj['pointInfo']['phones'].length !== 0) {
              obj['pointInfo']['phones'].forEach(function(p){
                html += '<tr>';
                html += '<td><a href="tel:'+p['tel']+'">'+p['phone']+'</a></td>';
                if (p['dob'] != '') {
                  html += '<td>доб. '+p['dob']+'</td>';
                } else {
                  html += '<td></td>';
                }
                html += '</tr>';
              });
            }
            if (obj['pointInfo']['fax'] != '') {
              html += '<tr>';
              html += '<td>'+obj['pointInfo']['fax']+'</td>';
              html += '<td></td>';
              html += '</tr>';
            }
            if (obj['pointInfo']['email'] != '') {
              html += '<tr>';
              html += '<td><a href="mailto:'+obj['pointInfo']['email']+'">'+obj['pointInfo']['email']+'</a></td>';
              html += '<td></td>';
              html += '</tr>';
            }
            html += '</tbody>';
            html += '</table>';
            html += '</div>';
          }


          if(obj['typeGlobalContent'] == 'atm') {
            if (obj['pointInfo']['access'] != '') {
              html += '<div class="y-map-open-access">';
              html += '<strong>'+BX.message["YA_MAP_ENTER"]+':</strong>';
              html += ' <span>'+obj['pointInfo']['access']+'</span>';
              html += '</div>';
            }
          }

          if(obj['typeGlobalContent'] == 'atm') {
            if (obj['pointInfo']['atmtimes'] != '') {
              html += '<div class="y-map-open-access">'+obj['pointInfo']['atmtimes']+'</div>';
            }
          }

          if (obj['pointInfo']['services'].length !== 0) {
            html += '<div class="y-map-open-free-box">';
            html += '<strong>'+BX.message('YA_MAP_DOP_OPTIONS')+'</strong>';

            obj['pointInfo']['services'].forEach(function(s) {
              $.each(s, function(key, value) {
                html += '<span>';
                if(key == 'bio') {
                  html += BX.message('YA_MAP_HERE_YOU_CAN_SUBMIT')+' <a href="/press-center/news/novikombank-nachal-sbor-biometricheskikh-dannykh-/" target="_blank">'+BX.message('YA_MAP_BIOMETRIC_DATA')+'</a>';
                } else {
                  html += value + '<br>';
                }
                html += '</span>';
              });
            });
            html += '</div>';
          }


          html += '</div>';
          html += '</div>';
          //html += '<div class="clearfix"></div>';
        }
      });
    }
    $('.table__tbody').empty().html(html);
  }


  /**
   * Подготовка глобального фильтра для поиска точек на карте
   */
  function getFilterDataBlocks() {

    let id;
    let obj = {};
    let globalFilters = {};
    let tPoint = '';

    if (!typePoints.is(":visible")) {
      tPoint = $(".y-map-custom-option");
    } else {
      tPoint = typePoints;
    }
    tPoint.each(function(){
      id = $(this).data('search');
      globalFilters[id] = ($(this).hasClass( "active" )) ? true : false;
    });

    filterCheckbox.each(function(){
      if (!$('#' + $(this).attr("id") + ':visible').length == 0) {
        id = $(this).data("id");
        globalFilters[id] = ($(this).is(':checked')) ? true : false;
      }
    });
    obj[typeContent] = globalFilters;
    return obj;
  }

  /**
   * Изменения вида данных
   */
  function changeView() {

    // Парсинг урл
    let pUrl = getLocation();
    let sel = pUrl.searchRegion;
    let genitiveTxt = '';
    let typeView = 'region';

    places.removeClass("active");
    // Скрываем регионы и города, если нет в них офисов или банкоматов
    places.show();
    places.each( function() {
      if(!$(this).hasClass(pUrl.type)) {
        $(this).hide();
      }
    });

    // Блокируем кнопку офисы или банкоматы, если в выбраном городе или регионе нет офиса или банкомата
    if (!typePoints.is(":visible")) {
      $(".y-map-custom-option").removeClass('disabled');
    } else {
      typePoints.prop( "disabled", false);
    }

    if (pUrl.region || pUrl.city) {

      $("#"+sel).addClass('active');

      $('#clearCityOrRegion').remove();

      zoneCityOrRegion.append('<div id="clearCityOrRegion">'+$("#"+sel).text()+'</div>');

      if(!$("#"+sel).hasClass('atms')) {
        if (!typePoints.is(":visible")) {
          $('[data-search="atms"]').addClass('disabled');;
        } else {
          $('#atms').prop("disabled", true);
        }
      }
      if(!$("#"+sel).hasClass('offices')) {
        if (!typePoints.is(":visible")) {
          $('[data-search="offices"]').addClass('disabled');;
        } else {
          $('#offices').prop("disabled", true);
        }
      }

      let el = {}, pointSelected = [];
      let ar = String($("#"+sel).data(pUrl.type)).split(',');
      for (const e of ar) {
        $('.'+pUrl.type+'-'+e).addClass('active');
        pointSelected.push({ 'id' : e, 'text' : $('.'+pUrl.type+'-'+e).text() });
      }
    }

    genitiveTxt = $("#" + sel).data('genitive');
    if (pUrl.point != '') {
      typeView = 'point';
      genitiveTxt = $('.y-map-point-content.active').find('.y-map-open-head').text();
    }
    // h1 и title
    setHeaderTitle(pUrl.type, genitiveTxt, '', typeView);
    // динамически меняем фильтр
    dinamicFilter(arr);
  }

  /**
   * Сформировать обьект из урл
   */
  function getLocation() {

    let type = '';  // Тип Офис или банкомат
    let region = ''; // регион
    let city = ''; // город
    let point = ''; // точка на карте
    let searchRegion = ''; // последний регион поиска
    let url = new URL(window.location);

    // фикс при тестирование на разделе
    if (addUrlPreffix != '' ) {
      pathnameReplace = String(url.pathname).replace(addUrlPreffix, "");
    } else {
      pathnameReplace = url.pathname;
    }

    if (pathnameReplace != '' && pathnameReplace != '/') {
      let match = pathnameReplace.match(/[^/?]*[^/?]/g);
      type = match[0];
      if(1 in match) {
        region = match[1];
        searchRegion = region;
      }
      // fix
      if (region=='moscow') {
        if(2 in match) {
          city = 'moscow';
          searchRegion = city;
          point = match[2];
        }
      } else if(region=='saint-petersburg') {
        if(2 in match) {
          city = 'saint-petersburg';
          searchRegion = city;
          point = match[2];
        }
      } else {
        if(2 in match) {
          city = match[2];
        }
        if(3 in match) {
          point = match[3];
        }
      }
      if (region != city && city != '') {
        searchRegion = city;
      }
    } else {
      type = 'offices';  // Тип Офис или банкомат по умолчанию
    }
    return {
      type: type,
      region: region,
      city: city,
      point: point,
      searchRegion: searchRegion,
      pathname: url.pathname,
      hash: ''
    }
  }

  /**
   * Получить координаты
   */
  function getCoordsZoomRegionOrCity() {

    let pUrl = getLocation();

    // Координаты по умолчанию
//		let defL = '55.76';
//		let defR = '37.64';

    let defL = latloadCoords;
    let defR = lngloadCoords;

    // Зум по умолчанию
    let defZoom = 10;
    // активная точка
    let objPoint = $("#"+pUrl.searchRegion);
    // Координаты точки
    let coords = '';
    // Зум точки
    let zoom = '';
    // Координаты
    let arCoords = [];
    // Широта
    let l = '';
    // Долгота
    let r = '';

    if(Object.keys(objPoint).length !== 0)  {
      coords = objPoint.data('coords');
      zoom = objPoint.data('zoom');
      if (zoom == '') {
        zoom = defZoom;
      }
      if (coords != '' && typeof coords !== 'undefined') {
        arCoords = String(coords).split(',');
        // обрабатываем точки, так как точные координаты глючат при переходе
        l = parseFloat(arCoords[0]).toFixed(6);
        r = parseFloat(arCoords[1]).toFixed(6);
      }
    } else {
      l = defL;
      r = defR;
      zoom = defZoom;
    }
    return {
      zoom : zoom,
      l : l,
      r : r,
    }
  }

  /**
   * Установить заголовок
   */
  function setHeaderTitle(tp, genitive, city, typeView) {

    let txt = '';
    let desp = '';
    let typePoint = tp;

    if (tp == 'atm') typePoint = 'atms';
    if (tp == 'office') typePoint = 'offices';

    let typePointTxt = ''; // в единственном числе
    let typePointsTxt = $("#" + typePoint).text().trim();

    if (typePoint == 'offices') {
      typePointTxt = 'Офис';
    } else if(typePoint == 'atms') {
      typePointTxt = 'Банкомат';
    }

    if (typeView=='region') {

      $('h1').empty().append(typePointsTxt + ' <span>'+genitive+'</span>');
      txt = typePointsTxt + ' ' + genitive + ' - Новикомбанк';
      desp = txt;

    } else if (typeView == 'point') {
      txt = genitive;
      if (typePoint == 'offices') {
        desp = genitive + ' ' + city
      } else if (typePoint == 'atms') {
        txt = genitive + '. ' + typePointTxt + ' Новикомбанка';
        desp = txt + ' ' + city
      }
    }
    txt = txt.trim();
    desp = desp.trim();

    if (txt != '') {
      $('title').empty().append(txt);
      $('meta[name="twitter:title"]').attr('content', txt);
      $('meta[property="og:title"]').attr('content', txt);
      $('meta[name="og:description"]').attr('content', desp);
      $('meta[name="twitter:description"]').attr('content', desp);
      $('meta[property="og:description"]').attr('content', desp);
      $('meta[itemprop="description"]').attr('content', desp);
    }
  }


  /**
   * найдем все значения по типу точке офисы или банкоматы
   * перестраиваем динамические фильтры
   */
  function dinamicFilter(arr) {

    // Парсинг урл
    let pUrl = getLocation();
    let type = pUrl.type;
    let arUinParamsByTypePoints = [];
    let arPointFilters = [];
    let arUniqueKey = [];
    const getUnique = (arr) => {
      return arr.filter((el, ind) => ind === arr.indexOf(el));
    };
    arr.filter(function (obj, i) {
      let pointParams = obj['typeContent'];
      arPointFilters = String(pointParams).split(',');
      for (const e in arPointFilters) {
        if (arPointFilters[e] === type) {
          arUinParamsByTypePoints = arUinParamsByTypePoints.concat(obj['typeContent']);
        }
      }
    });
    arUniqueKey = getUnique(arUinParamsByTypePoints);
    if (arUniqueKey.length) {
      // скрыть блоки фильтров
      yMapGroupParams.hide();
      // скрыть точки фильтров
      yMapParams.hide();
      // увидеть точки фильтра
      for (const k in arUniqueKey) {
        let keyName = '[data-key-' + arUniqueKey[k] + ']';
        if ($(keyName).length) {
          $(keyName).show();
        }
      }
      // проверить группу, если есть открытые точки, показать группу
      yMapGroupParams.each(function () {
        let boxthis = $(this);
        $(this).find('.y-map-params').each(function(){
          if($(this).css('display') != 'none') {
            boxthis.show();
          }
        });
      });
    }
  };

  /**
   * Динамически перестраиваем точки по всем параметрам, город не учитывается
   */
  function dinamicHideFilter() {

    let pUrl = getLocation();
    let type = pUrl.type;
    let arUinParamsByTypePoints = [];
    let arUniqueKey = [];
    let arrWork = [];

    const getUnique = (arr) => {
      return arr.filter((el, ind) => ind === arr.indexOf(el));
    };

    let findAnd = [];
    findAnd.push(type);
    filterCheckbox.each(function () {
      let t = $(this);
      let id = t.data('id');
      if( t.is(':checked') ){
        findAnd.push(id);
      }
    });

    let findLine = function (sLine, find) {
      let f = 0;
      let c = find.length;
      let sfilter = String(sLine).split(',');
      for (const e in find) {
        for (const s in sfilter) {
          if (find[e] === sfilter[s]) {
            f++;
          }
        }
      }
      if (f === c) {
        return sLine;
      }
    }

    arr.filter(function (obj, i) {
      let pointParams = obj['typeContent'];
      arUinParamsByTypePoints = arUinParamsByTypePoints.concat(findLine(pointParams, findAnd));
    });

    arUniqueKey = getUnique(arUinParamsByTypePoints);

    if (arUniqueKey.length) {
      filterCheckbox.each(function () {
        const t = $(this);
        t.closest('.y-map-checkbox--abs').addClass('disabled').next().addClass('disabled');
        t.attr('disabled', true);
      });
      for (const k in arUniqueKey) {
        let keyName = '[data-key-' + arUniqueKey[k] + ']';
        if ($(keyName).length) {
          const spanTags = $(keyName).find('.y-map-checkbox--abs');
          spanTags.removeClass('disabled').next().removeClass('disabled');
          spanTags.find('input').attr('disabled', false).css('border', '1px solid red');
        }
      }
    }
  };


  /**
   * Закрыть открытые вспомогательные окна
   */
  function closeOpenWindow() {

    let pUrl = getLocation();
    $('.y-map-over-box').each(function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass('active');
      }
    });
    if (isLoad) {
      clearAllPointImgBoloon();
    }
  }

  /**
   * Закрыть открытую точку
   */
  function closePointWindow() {

    let pUrl = getLocation();

    btnBack.closest('.y-map-scrollbar-points').removeClass('active');
    listContent.addClass('active');
    pointContent.removeClass('active');

    $('.y-map-over-box').each(function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass('active');
      }
    });
    if (isLoad) {
      clearAllPointImgBoloon();
    }
  }

  /**
   * Какой тип контента показывать
   */
  function viewYaContent(obj) {
    let viewContent = '';
    yaview.removeClass('active').prop("disabled", false);
    yaview.each(function () {
      $('.'+$(this).attr('id')).hide();
    });
    obj.addClass('active');
    $('.'+obj.attr('id')).show();
  }


  // в поиске используються все значения фильтра
  let find = function (arr, find) {

    return arr.filter(function (obj, i) {

      let categories = getFilterDataBlocks();
      let view = false;
      let arTrueElements = [];
      let availableFilters = [];
      let availableObjFilters = obj['typeContent'];
      let countAvailableElement = 0;

      // Поиск всех значение с true
      for (var s in categories['typeContent']) {
        if (categories['typeContent'][s] === true) {
          arTrueElements.push(s);
        }
      }

      if (arTrueElements.length !== 0) {
        // Допустимые значения, строки вхождения
        availableFilters = String(availableObjFilters).split(',');
        for (const e in arTrueElements) {
          for (const f in availableFilters) {
            // найдем true поисковые фильтры, посчитаем количество допустимых значений в точке
            if (arTrueElements[e] === availableFilters[f]) {
              countAvailableElement++;
            }
          }
        }
        // если ообщее количество выбранных фильтров, совпадает с количество допустимых в строке, показываем точку
        if (countAvailableElement == arTrueElements.length) {
          view = true;
        }
      }

      if (view === true) {
        // Ищем по адресу
        return (obj.pointInfo.contact + "").toLowerCase().indexOf(find.toLowerCase()) != -1;
        // по названию
        //return (obj.properties.balloonContent + "").toLowerCase().indexOf(find.toLowerCase()) != -1;
      } else {
        return false;
      }
    });
  };

  var provider = {
    suggest: function (request, options) {
      var res = find(arr, request),
        arrayResult = [],
        results = Math.min(options.results, res.length);
      for (var i = 0; i < results; i++) {
        arrayResult.push({
          displayName: res[i].properties.balloonContent,
          displayAdress: res[i].pointInfo.contact,
          value: res[i].properties.balloonContent,
          id: res[i].id,
          code: res[i].code,
          url: res[i].url
        })
      }
      return ymaps.vow.resolve(arrayResult);
    }
  };

  /**
   * Yandex Suggest API
   * https://codepen.io/VadimMalykhin/pen/yXKJay
   */
  let timer = null;
  let timeout = 800;

  $('#suggest').focus(function(){
    $('#suggest-results').addClass('visible');
  });

  $("#suggest").on("keyup change", function(e) {

    let value = $(this).val();
    clearTimeout(timer);
    timer = setTimeout(function() {

      let $suggest = $('#suggest');
      let $results = $('#suggest-results').removeClass('visible').empty();
      let $close = $('#suggest-close');
      // is empty value
      if ($.trim(value) === '') {
        return false;
      }

      let $ul = $('<ul/>').appendTo($results);
      ymaps.suggest(value).then(function(items) {

        $results.addClass('visible');
        $close.addClass('visible');

        if (items.length > 0) {
          items.map(function(item) {
            $ul.append($('<li/>').html(item.displayName).attr({
              'data-adress': item.displayName
            }));
          });
          $('li', $results).on('click', function() {
            $suggest.val($(this).text().trim());
            let adress = $(this).data('adress');

            ymaps.geocode($(this).data('adress'), { results: 1 }).then(function (res) {
                // Выбираем первый результат геокодирования
                let firstGeoObject = res.geoObjects.get(0);
                let coords = firstGeoObject.geometry.getCoordinates();
                myMap.setCenter([coords[0], coords[1]], 14, {
                  checkZoomRange: true // изменяем зум точки, чтоб не было конфликта от зама установленной точки, к зуму переходной точки
                });
              },
              function (err) {
                // Если геокодирование не удалось, сообщаем об ошибке
                console.log(err.message);
              });
            $results.removeClass('visible');
          });
        } else {
          $ul.append($('<li/>').addClass('message').text(BX.message('YA_MAP_RESULT_EMPTY')));
        }
        $close.on('click', function() {
          $suggest.val($(this).text().trim());
          $results.empty();
          $results.removeClass('visible');
          $close.removeClass('visible');
          timer = null;
        });
      }).catch(function (err) {
        throw err;
      });
    }, timeout);
  });

  /*
  * Старт и перезапуск функций карты
  */
  function startMapEngineOrResize() {
    pUrl = getLocation();
    changeTypePoints($('[data-search="'+pUrl.type+'"]'));
    if (pUrl.region != '') {
      if (pUrl.city != '') {
        if (pUrl.point != '') {
          viewDetailPoints(pUrl.point);
        } else {
          changeRegionCity($("#" + pUrl.city));
        }
      } else {
        changeRegionCity($("#" + pUrl.region));
      }
    } else {
      setUrlTypePoints($("#" + pUrl.type));
    }
    viewListOrMapMobile(true);
  }

}

$(document).ready(function () {
  //
  //$('.y-map').removeAttr('data-js');
  // аккордионы
  $('.y-map-accordion').beefup();
  $(".y-map-js-list").click(function(e) {
    e.preventDefault();
    $("html, body").animate({
      scrollTop: $('.'+$(this).data('anchor')).offset().top + "px"
    }, {
      duration: 500,
      easing: "swing"
    });
    return false;
  });
  $('body').removeClass('isMobile');
  let isMobile = window.matchMedia("only screen and (max-width: 769px)").matches;
  if (isMobile) {
    $('body').addClass('isMobile');
  }
});


/*
* урл + доп параметр
*/
function setBrowserUrl(u, allowParam, allowValue, data) {
  if(u != '' ) {
    let valueParam = haveParameterInUrl(allowParam, allowValue);
    if (!!valueParam) {
      u = u + '?' + allowParam + "=" + valueParam;
    }
    window.history.pushState(u, null, u);
  }
}

/*
* Проверить наличие параметра в строке
*/
function haveParameterInUrl(allowParam, allowValue) {
  let valueParam = getParameterByName(allowParam);
  if (valueParam != allowValue) {
    return null;
  } else {
    return valueParam;
  }
}

/*
* Получить параметры по имени
*/
function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, '\\$&');
  var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
