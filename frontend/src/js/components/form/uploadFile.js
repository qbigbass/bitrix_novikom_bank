const UPLOAD_ELEMS = {
    root: '[data-upload]',
    uploadBox: '[data-upload-box]',
    input: '[data-upload-input]',
    uploadButton: '[data-upload-button]',
    deleteButton: '[data-upload-delete]',
    file: '[data-upload-file]',
    error: '.invalid-feedback',
}

const UPLOAD_ATTR = {
    maxFiles: 'data-max-files',
    maxSize: 'data-max-size',
}

export function initUploadFile() {
    const uploads = document.querySelectorAll(UPLOAD_ELEMS.root)

    if (!uploads.length) return

    uploads.forEach(upload => {
        const uploadBox = upload.querySelector(UPLOAD_ELEMS.uploadBox)
        const uploadButton = upload.querySelector(UPLOAD_ELEMS.uploadButton)
        const input = upload.querySelector(UPLOAD_ELEMS.input)
        const maxFiles = Number(input.getAttribute(UPLOAD_ATTR.maxFiles))
        const maxSize = Number(input.getAttribute(UPLOAD_ATTR.maxSize))
        const errorElement = upload.querySelector(UPLOAD_ELEMS.error)

        uploadButton.onclick = () => {
            input.click()
        };

        input.addEventListener('change', function (e) {
            const files = e.target.files

            if (files.length > maxFiles) {
                input.classList.add('is-invalid');
                errorElement.textContent = `Вы превысили лимит выбора файлов: можно выбрать не более ${maxFiles} файлов.`
                !errorElement.classList.contains('d-block') && errorElement.classList.add('d-block')
                return;
            }

            [...files].forEach(file => {
                const fileName = file.name;

                if (file.size > maxSize) {
                    errorElement.textContent = `Размер файла ${fileName} превышен, выберите файл меньше 3МБ.`
                    !errorElement.classList.contains('d-block') && errorElement.classList.add('d-block')
                    return;
                }

                errorElement.classList.contains('d-block') && errorElement.classList.remove('d-block')

                uploadBox.insertAdjacentHTML('beforebegin', renderFile(fileName));

                initRemoveFile(upload, files)
            })
        });

    })
}

function renderFile(fileName) {
    return (
        `
            <div class="upload-file__item btn btn-link btn-icon" data-upload-file>
                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><use xlink:href="img/svg-sprite.svg#icon-doc"></use></svg>
                ${fileName}
                <button type="button" class="icon size-m violet-100" data-upload-delete>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><use xlink:href="img/svg-sprite.svg#icon-close"></use></svg>
                </button>
            </div>`
    )
}

function initRemoveFile(upload) {
    upload.addEventListener('click', (e) => {
        if (e.target.closest('[data-upload-delete]')) {
            const item = e.target.closest('[data-upload-file]')
            item.remove()
        }
    })
}
