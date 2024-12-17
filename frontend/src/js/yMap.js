function initMap() {
  let maxZoom = 17;
  let iconDefaultSize = [40, 48]; // Размер иконки
  let iconDefaultPath = '/frontend/dist/img/office-pin.svg'; // Путь к иконке офиса
  let iconDefaultOffset = [-20, -24] // Смещение иконки

  const myMap = new ymaps.Map("map", {
    center: [55.76, 37.64], // [55.76, 37.64] - Москва
    zoom: 10,
    controls: [
      'zoomControl',
    ],
    maxZoom: maxZoom,
    autoFitToViewport: 'none',
  });
  // Создаем метку с кастомной иконкой
  let myPlacemark = new ymaps.Placemark([55.76, 37.64], {}, {
    iconLayout: 'default#image',
    iconImageHref: iconDefaultPath,
    iconImageSize: iconDefaultSize,
    iconImageOffset: iconDefaultOffset,
  });

  // Добавляем метку на карту
  myMap.geoObjects.add(myPlacemark);

  // Запрещаем скролить на карте
  myMap.behaviors.disable('scrollZoom');
}

function initYMap() {
  const map = document.getElementById("map");
  if (!map) return false;

  ymaps.ready(initMap);
}
