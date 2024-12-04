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
        const errorElement = upload.querySelector(UPLOAD_ELEMS.error)
        const input = upload.querySelector(UPLOAD_ELEMS.input)

        const maxFiles = Number(input.getAttribute(UPLOAD_ATTR.maxFiles))
        const maxSize = Number(input.getAttribute(UPLOAD_ATTR.maxSize))

        const dataTransfer = new DataTransfer();

        uploadButton.onclick = () => {
            input.click()
        }

        input.addEventListener('change', function (e) {
            const file = e.target.files[0]

            if (!file) return

            const fileName = file.name
            if (file.size > maxSize) {
                errorElement.textContent = `Размер файла ${fileName} превышен, выберите файл меньше ${bytesToMegabytes(maxSize)} МБ.`
                !errorElement.classList.contains('d-block') && errorElement.classList.add('d-block')
                e.preventDefault()
                return
            }

            dataTransfer.items.add(file)
            uploadBox.insertAdjacentHTML('beforebegin', renderFile(fileName))

            updateFileList(input, dataTransfer, uploadButton, maxFiles, errorElement)
        })

        upload.addEventListener('click', (e) => {
            if (e.target.closest('[data-upload-delete]')) {
                const items = [...upload.querySelectorAll('[data-upload-file]')]
                const targetItem = e.target.closest('[data-upload-file]')
                const indexTargetItem = items.indexOf(targetItem)

                targetItem.remove()
                dataTransfer.items.remove(dataTransfer.items[indexTargetItem])

                updateFileList(input, dataTransfer, uploadButton, maxFiles, errorElement)
            }
        })
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

function updateFileList(input, dataTransfer, uploadButton, maxFiles, errorElement) {
    errorElement.classList.contains('d-block') && errorElement.classList.remove('d-block')
    input.files = dataTransfer.files
    uploadButton.disabled = dataTransfer.files.length === maxFiles
}

function bytesToMegabytes(bytes) {
    return (bytes / (1024 * 1024))
}
