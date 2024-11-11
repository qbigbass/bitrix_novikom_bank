const FORM_ELEMS = {
    form: "[data-form]",
    validateGroup: "[data-form-validate-group]",
    button: "[data-form-button]",
    input: "[data-form-input]",
    checkbox: "[data-form-checkbox]",
    error: "[data-form-error]",
}

export async function initFormSend() {
    const forms = document.querySelectorAll(FORM_ELEMS.form);

    if (!forms.length) return;

    forms.forEach(form => {
        const validateGroup = form.querySelectorAll(FORM_ELEMS.validateGroup)

        if (validateGroup.length) {
            validateGroup.forEach(formGroup => {
                checkValidity(formGroup)
            })
        } else {
            checkValidity(form)
        }

        form.addEventListener('submit', handleFormSubmit)
    })
}


async function handleFormSubmit(event) {
    event.preventDefault()

    const action = event.target.action
    const method = event.target.method

    const formData = new FormData(event.target)

    try {
        const response = await sendData(action, method, formData)
        const data = await response.json();

        if (data.status === 'success') {
            onSuccess(event.target)
        }
    } catch (error) {
        onError(error)
    }
}

async function sendData(action, method, data) {
    return await fetch(action, {
        method: method,
        headers: {'Content-Type': 'multipart/form-data'},
        body: data,
    })

    // Чтобы проверить, как работает
    // обработка ответа, можно использовать
    // поддельный ответ от сервера:

    // return new Promise(resolve => {
    //   setTimeout(() => {
    //     resolve({
    //       status: 400,
    //       error: {
    //         message: 'Что-то пошло не так!'
    //       }
    //     })
    //   })
    // })
}

function onSuccess() {
    const modalSuccess = new bootstrap.Modal(document.getElementById('modal-success'));
    modalSuccess.show()
}

function onError() {
    const modalError = new bootstrap.Modal(document.getElementById('modal-error'));
    modalError.show()
}

function checkValidity(form) {
    const inputList = Array.from(form.querySelectorAll(FORM_ELEMS.input))
    const checkboxElement = form.querySelector(FORM_ELEMS.checkbox)
    const buttonElement = form.querySelector(FORM_ELEMS.button)
    const formErrorElement = form.querySelector(FORM_ELEMS.error)

    toggleButton(inputList, checkboxElement, buttonElement, formErrorElement)

    inputList.forEach((inputElement) => {
        inputElement.addEventListener('input', () => {
            checkInputValidity(inputElement)

            if (hasEmptyRequiredInput(inputList)) {
                formErrorElement.textContent = 'Не заполнены обязательные поля'
            } else {
                formErrorElement.textContent = ''
            }

            inputList.forEach((inputElement) => {
                checkEmptyRequiredInput(inputElement)
            })

            toggleButton(inputList, checkboxElement, buttonElement, formErrorElement)
        })
        inputElement.addEventListener('blur', () => {
            toggleInputError(inputElement)
        })
        inputElement.addEventListener('focus', () => {
            toggleErrorSpan(inputElement)
        })
    })
    if (checkboxElement) {
        checkboxElement.addEventListener('change', () => {
            toggleInputError(checkboxElement)
            toggleButton(inputList, checkboxElement, buttonElement, formErrorElement)
        })
    }
}

function checkInputValidity(inputElement) {
    if (inputElement.validity.patternMismatch) {
        inputElement.setCustomValidity(inputElement.dataset.errorMessage)
    } else {
        inputElement.setCustomValidity(checkLengthMismatch(inputElement))
    }
}

function checkEmptyRequiredInput(inputElement) {
    if (inputElement.required && inputElement.value === "" && !inputElement.classList.contains("is-invalid")) inputElement.classList.add('is-required')
}

function checkLengthMismatch(inputElement) {
    if (inputElement.type !== 'text') {
        return ''
    }
    const valueLength = inputElement.value.trim().length
    if (valueLength < inputElement.minLength) {
        return `Минимальное количество символов: ${inputElement.minLength}`
    }
    return ''
}

function hasInvalidInput(inputList, checkboxElement) {
    return (
        inputList.some(inputElement => !inputElement.validity.valid && !inputElement.closest('[hidden]')) || (checkboxElement && !checkboxElement.validity.valid)
    )
}

function hasEmptyRequiredInput(inputList) {
    const emptyRequiredInputs = inputList.filter(inputElement => !inputElement.closest('[hidden]') && inputElement.required && inputElement.value === "");
    return !!emptyRequiredInputs.length;
}

function toggleInputError(inputElement) {
    if (!inputElement.validity.valid) {
        toggleErrorSpan(inputElement, inputElement.validationMessage)
    } else {
        toggleErrorSpan(inputElement)
    }
}

function toggleErrorSpan(inputElement, errorMessage) {
    const errorElement = inputElement.parentElement.querySelector('.invalid-feedback');
    if (errorMessage) {
        inputElement.classList.add('is-invalid')
        inputElement.classList.remove('is-required')
        errorElement.textContent = errorMessage
    } else {
        inputElement.classList.remove('is-invalid')
        inputElement.classList.remove('is-required')
        errorElement.textContent = ''
    }
}

function toggleButton(inputList, checkboxElement, buttonElement, formErrorElement) {
    if (hasInvalidInput(inputList, checkboxElement)) {
        buttonElement.disabled = true;
        buttonElement.setAttribute('aria-disabled', 'true')
    } else {
        buttonElement.disabled = false;
        buttonElement.setAttribute('aria-disabled', 'false')
        formErrorElement.textContent = ''
    }
}
