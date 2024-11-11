const ELEMS = {
    root: "[data-upload-box]",
    input: "[data-upload-input]",
    uploadButton: "[data-upload-button]",
    deleteButton: "[data-upload-delete]",
}

export function initUploadFile() {
    const upload = document.querySelector(ELEMS.root);

    if (!upload) return;

    const uploadButton = upload.querySelector(ELEMS.uploadButton);
    const input = upload.querySelector(ELEMS.input);

    uploadButton.onclick = () => {
        input.click();
    };

    input.addEventListener("change", function (e) {
        const files = [...e.target.files];

        files.forEach(file => {
            const fileName = file.name;
            upload.insertAdjacentHTML("beforebegin", fileData(fileName));
        })
    });
}

function fileData(fileName) {
    return (
        `
            <div class="upload-file__file btn btn-link btn-icon">
                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><use xlink:href="img/svg-sprite.svg#icon-doc"></use></svg>
                ${fileName}
                <button type="button" class="icon size-m" data-upload-delete>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><use xlink:href="img/svg-sprite.svg#icon-close"></use></svg>
                </button>
            </div>`
    )
}

