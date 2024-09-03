sprint_editor.registerBlock('my_complex_element', function ($, $el, data, settings) {

    settings = settings || {};

    data = $.extend({
        elements: [{title: '', desc:''}],
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

                  var uid = sprint_editor.makeUid();
                  var title = sprint_editor.renderString('{{!it.title}}', item)
                  var desc = sprint_editor.renderString('{{!it.desc}}', item)

                  // создание родительского блока
                  if (item.uid) {
                      html += `<div class="sp-item" data-uid="${item.uid}">`;
                  } else {
                      html += `<div class="sp-item" data-uid="${uid}">`;
                  }

                  // добавление полей в родительский блок
                  html += `
                      <input class="sp-item-title" type="text" placeholder="Введите заголовок" value="${title}"/>
                      <textarea class="sp-item-desc" type="text" cols="66" rows="5" placeholder="Введите описание">${desc}</textarea>
                  `;

                  // проверка на вывод изобрежния
                  if (Array.isArray(data.img) && data.img.length > 0) {
                    const filteredImages = data.img.filter(val => val.uid === item.uid);
                    html += filteredImages.map(val => {
                      const src = val.imgPath;
                      return `
                          <div class="sp-item-group-img">
                              <img src="${src}" width="20%" height="20%" alt="" />
                              <button class="img_delete" type="button" id="${item.uid}">Удалить изображение</button>
                          </div>
                      `;
                    }).join('');
                  }

                  // вывод кнопки загрузить файл
                  if (item.uid) {
                      html += `<input class="sp-item-img__my_complex_element" id="${item.uid}" type="file" />`;
                  } else {
                      html += `<input class="sp-item-img__my_complex_element" id="${uid}" type="file" />`;
                  }

                  // кнопки для управления
                  html += `
                          <div class="sp-item-group">
                              <span class="sp-item-handle sp-x-btn">&uarr;&darr;</span>
                              <span class="sp-item-del sp-x-btn">x</span>
                          </div>
                      </div>
                  `;

                });
            }
            return html;
        }

        function searchInputFile() {
            getImgForUploadCultureItemsPopup();
        }

        getImgForUploadCultureItemsPopup();

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

        function addItem($container) {
            $container.append(
                renderItemsCultureItemsPopup({
                    elements: [{title: '', desc:''}],
                })
            );
            searchInputFile();
        }
    }

    // получение кнопок для загрузки картинки и обработка изменения кнопки
    function getImgForUploadCultureItemsPopup() {
        const itemImg = document.querySelectorAll('.sp-item-img__my_complex_element');
        itemImg.forEach(function (item) {
            if (!item.hasAttribute('data-event-bound')) {
                item.setAttribute('data-event-bound', 'true');
                item.addEventListener('change', function(ev) {
                    const itemId = ev.target.getAttribute('id');
                    const objFileByItem = ev.target.files[0];
                    changeInputImgCultureItemsPopup(itemId, objFileByItem);
                })
            }
        });
    }

    function changeInputImgCultureItemsPopup(uid, file) {

        let img = new FormData();
        img.append('img',file, file.name);

        $.ajax({
            url: sprint_editor.getBlockWebPath('my_complex_element') + '/upload.php',
            method: 'post',
            dataType: 'json',
            data: img,
            processData: false,
            contentType: false,
            success: function(response){

                if ( typeof response['file'] !== "undefined" ) {
                    renderfilesImg(uid, response.file);

                    data.img.push({
                        uid: uid,
                        imgPath: response.file,
                    })

                }
            }
        });

        return data;
    }

    function renderfilesImg(uid, link) {
        const block = $($(`.sp-lists-result_my_complex_element [data-uid='${uid}']`));

        let html = '';
        html = `
                <div class="sp-item-group-img">
                    <img src="${link}" width="50%" height="50%" alt="" />
                    <button class="img_delete" id="${uid}">Удалить изображение</button>
                </div>
            `;

        $(block).find('textarea').after(html);

        $(block).find('.sp-item-img__my_complex_element').remove();

    }

    $el.on('click', '.img_delete', function () {
        const uid = $(this).attr('id');
        const block = document.querySelector(`.sp-lists-result_my_complex_element [data-uid='${uid}']`);
        const itemIndex = data.img.findIndex(item => item.uid === uid)

        data.img = data.img.filter((_, index) => index !== itemIndex)
        $(this).parent()[0].remove();

        // добавляет кнопку импорта файла, если после загрузки картинки ее нету
        const item = block.querySelector('.sp-item-img__my_complex_element');
        if (!item) {
            const blockAfterItemAdd = block.querySelector('.sp-item-desc');
            const blockAdd = document.createElement('input');
            blockAdd.className = 'sp-item-img__my_complex_element';
            blockAdd.id = uid;
            blockAdd.type = 'file';


            blockAfterItemAdd.parentNode.insertBefore(blockAdd,blockAfterItemAdd.nextSibling);
        }
    });
});
