sprint_editor.registerBlock('my_complex_element', function ($, $el, data, settings) {

  settings = settings || {};

  data = $.extend({
    elements: [{title: '', desc: ''}],
    img: [],
  }, data);

  this.getData = function () {
    return data;
  };

  this.collectData = function () {

    function collectElements($container) {
      var result = [];

      $container.children('.sp-item').each(function () {

        var title = $.trim(
          $(this).children('.sp-item-title').val()
        );

        var desc = $.trim(
          $(this).children('.sp-item-desc').val()
        );

        var uid = $(this).attr('data-uid');

        result.push({
          title: title,
          desc: desc,
          uid: uid,
        })
      });

      return result;
    }

    data.elements = collectElements(
      $el.find('.sp-lists-result_my_complex_element'),
    );

    return data;
  };

  this.afterRender = function () {

    var res = $el.find('.sp-lists-result_my_complex_element');

    res.sortable({
      items: ".sp-item",
      handle: ".sp-item-handle",
    });

    res.html(
      renderItemsCultureItemsPopup(data)
    )

    function renderItemsCultureItemsPopup(block) {
      var html = '';
      if (block.elements && block.elements.length > 0) {
        $.each(block.elements, function (index, item) {

          const uid = item.uid || sprint_editor.makeUid();
          const title = sprint_editor.renderString('{{!it.title}}', item);
          const desc = sprint_editor.renderString('{{!it.desc}}', item);

          // Создание родительского блока
          html += `<div class="sp-item" data-uid="${uid}">`;

          // Добавление полей в родительский блок
          html += `
                    <input class="sp-item-title" type="text" placeholder="Введите заголовок" value="${title}"/>
                    <textarea class="sp-item-desc" cols="66" rows="5" placeholder="Введите описание">${desc}</textarea>
                `;

          // Проверка на вывод изображения
          if (Array.isArray(data.img) && data.img.length > 0) {
            const filteredImages = data.img.filter(val => val.uid === item.uid);
            if (filteredImages.length > 0) {
              // Если есть изображения, выводим их и кнопку "Удалить изображение"
              html += filteredImages.map(val => `
                      <div class="sp-item-group-img">
                          <img src="${val.imgPath}" width="20%" height="20%" alt="" />
                          <button class="img_delete" type="button" id="${item.uid}">Удалить изображение</button>
                      </div>
                    `).join('');
            } else {
              // Если изображений нет, выводим кнопку "Выберите файл"
              html += `<input class="sp-item-img__my_complex_element" id="${uid}" type="file" />`;
            }
          } else {
            // Если массив изображений пуст или не является массивом, выводим кнопку "Выберите файл"
            html += `<input class="sp-item-img__my_complex_element" id="${uid}" type="file" />`;
          }

          // Кнопки для управления
          html += `
                    <div class="sp-item-group">
                        <span class="sp-item-handle sp-x-btn">&uarr;&darr;</span>
                        <span class="sp-item-del sp-x-btn">x</span>
                    </div>
                </div>`;
        });

      }
      return html;
    }

    getImgForUpload();

    $el.on('click', '.sp-item-del', function (e) {
      e.preventDefault();
      $(this).closest('.sp-item').remove();
    });

    $el.on('keypress', '.sp-item-text', function (e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) {
        e.preventDefault();
        addItem($(this).closest('.sp-item').parent(), true);
      }
    });

    $el.on('click', '.sp-lists-add-item_my_complex_element', function (e) {
      e.preventDefault();
      addItem(res, false);
    });

    function searchInputFile() {
      getImgForUpload();
    }

    function addItem($container) {
      $container.append(
        renderItemsCultureItemsPopup({
          elements: [{title: '', desc: ''}],
        })
      );
      searchInputFile();
    }
  }

  // получение кнопок для загрузки картинки и обработка изменения кнопки
  function getImgForUpload() {
    const itemImg = document.querySelectorAll('.sp-item-img__my_complex_element');
    itemImg.forEach(function (item) {
      if (!item.hasAttribute('data-event-bound')) {
        item.setAttribute('data-event-bound', 'true');
        item.addEventListener('change', function (ev) {
          const itemId = ev.target.getAttribute('id');
          const objFileByItem = ev.target.files[0];
          changeInputImg(itemId, objFileByItem);
        })
      }
    });
  }

  function changeInputImg(uid, file) {

    let img = new FormData();
    img.append('img', file, file.name);

    $.ajax({
      url: sprint_editor.getBlockWebPath('my_complex_element') + '/upload.php',
      method: 'post',
      dataType: 'json',
      data: img,
      processData: false,
      contentType: false,
      success: function (response) {

        if (typeof response['file'] !== "undefined") {
          renderFilesImg(uid, response.file);

          data.img.push({
            uid: uid,
            imgPath: response.file,
          })

        }
      }
    });

    return data;
  }

  function renderFilesImg(uid, link) {
    const block = $(`.sp-lists-result_my_complex_element [data-uid='${uid}']`);

    // Создаем HTML для изображения и кнопки
    const html = `
      <div class="sp-item-group-img">
          <img src="${link}" width="20%" height="20%" alt="" />
          <button class="img_delete" id="${uid}">Удалить изображение</button>
      </div>
    `;

    // Добавляем HTML после текстовой области и удаляем элемент для загрузки изображений
    block.find('textarea').after(html);
    block.find('.sp-item-img__my_complex_element').remove();
  }

  $el.on('click', '.img_delete', function () {
    const uid = $(this).attr('id');
    const block = document.querySelector(`.sp-lists-result_my_complex_element [data-uid='${uid}']`);

    // Находим индекс изображения и удаляем его
    const itemIndex = data.img.findIndex(item => item.uid === uid);
    if (itemIndex > -1) {
      data.img.splice(itemIndex, 1); // Удаляем элемент по индексу
    }

    // Удаляем элемент изображения из DOM
    $(this).parent().remove();

    // Проверяем наличие кнопки импорта файла и добавляем, если её нет
    const item = block.querySelector('.sp-item-img__my_complex_element');
    if (!item) {
      const blockAdd = document.createElement('input');
      blockAdd.className = 'sp-item-img__my_complex_element';
      blockAdd.id = uid;
      blockAdd.type = 'file';

      // Вставляем новый элемент после текстовой области описания
      const blockAfterItemAdd = block.querySelector('.sp-item-desc');
      blockAfterItemAdd.parentNode.insertBefore(blockAdd, blockAfterItemAdd.nextSibling);
    }
  });
});
