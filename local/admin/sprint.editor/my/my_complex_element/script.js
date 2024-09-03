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
    const res = $el.find('.sp-lists-result_my_complex_element');

    res.html(renderItems(data));

    function renderItems(block) {
      if (!block.elements || block.elements.length === 0) return '';

      return block.elements.map(item => {
        const uid = item.uid || sprint_editor.makeUid();
        const title = sprint_editor.renderString('{{!it.title}}', item);
        const desc = sprint_editor.renderString('{{!it.desc}}', item);
        const imagesHtml = renderImages(uid);

        return `
        <div class="sp-item" data-uid="${uid}">
          <input class="sp-item-title" type="text" placeholder="Введите заголовок" value="${title}"/>
          <textarea class="sp-item-desc" cols="66" rows="5" placeholder="Введите описание">${desc}</textarea>
          ${imagesHtml}
          <div class="sp-item-group">
            <span class="sp-item-handle sp-x-btn">&uarr;&darr;</span>
            <span class="sp-item-del sp-x-btn">x</span>
          </div>
        </div>`;
      }).join('');
    }

    function renderImages(uid) {
      const filteredImages = data.img?.filter(val => val.uid === uid) || [];
      if (filteredImages.length > 0) {
        return filteredImages.map(val => `
          <div class="sp-item-group-img">
            <img src="${val.imgPath}" width="20%" height="20%" alt="" />
            <button class="img_delete" type="button" id="${uid}">Удалить изображение</button>
          </div>`
        ).join('');
      }
      return `<input class="sp-item-img__my_complex_element" id="${uid}" type="file" />`;
    }

    $el.on('click', '.sp-item-del', function (e) {
      e.preventDefault();
      $(this).closest('.sp-item').remove();
    });

    $el.on('click', '.sp-lists-add-item_my_complex_element', function (e) {
      e.preventDefault();
      addItem(res);
    });

    function addItem($container) {
      $container.append(renderItems({
        elements: [{ title: '', desc: '' }],
      }));
      getImgForUpload();
    }
  }

  // Получение кнопок для загрузки картинки и обработка изменения кнопки
  function getImgForUpload() {
    const itemImg = document.querySelectorAll('.sp-item-img__my_complex_element');
    itemImg.forEach(item => {
      if (!item.dataset.eventBound) {
        item.dataset.eventBound = 'true'; // Используем dataset для установки атрибута
        item.addEventListener('change', (ev) => {
          const itemId = ev.target.id;
          const objFileByItem = ev.target.files[0];
          changeInputImg(itemId, objFileByItem);
        });
      }
    });
  }

  function changeInputImg(uid, file) {
    const img = new FormData();
    img.append('img', file, file.name);

    $.ajax({
      url: sprint_editor.getBlockWebPath('my_complex_element') + '/upload.php',
      method: 'POST',
      dataType: 'json',
      data: img,
      processData: false,
      contentType: false,
      success: (response) => {
        if (response.file) {
          renderFilesImg(uid, response.file);

          data.img.push({
            uid: uid,
            imgPath: response.file,
          });
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

  $el.on('click', '.sp-item-img__my_complex_element', function () {
    getImgForUpload();
  })

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
    if (!block.querySelector('.sp-item-img__my_complex_element')) {
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
