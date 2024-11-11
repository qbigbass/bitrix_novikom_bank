import {STEPS_ELEMS} from './formSteps';

export const FORM_ELEMS = {
    form: '[data-form]',
    validateGroup: '[data-form-validate-group]',
    button: '[data-form-button]',
    input: '[data-form-input]',
    checkbox: '[data-form-checkbox]',
    error: '[data-form-error]',
    radio: 'input[type="radio"]',
}

const MODALS_ID = {
    success: 'modal-success',
    error: 'modal-error',
}

const MESSAGE_ELEMS = {
    messageBox: '.js-message',
    titleSuccess: '.js-success-title',
    infoSuccess: '.js-success-info',
    titleError: '.js-error-title',
    infoError: '.js-error-info',
    btnError: '.js-error-btn'
}

const MESSAGE_ATTR = {
    titleSuccessContent: 'data-success-title',
    infoSuccessContent: 'data-success-info',
    titleErrorContent: 'data-error-title',
    infoErrorContent: 'data-error-info',
}

export async function initFormSend() {
    const forms = document.querySelectorAll(FORM_ELEMS.form)

    if (!forms.length) return;

    forms.forEach(form => {
        const validateGroup = form.querySelectorAll(FORM_ELEMS.validateGroup)
        const modalId = form.closest('.modal').getAttribute('id');

        if (validateGroup.length) {
            validateGroup.forEach(formGroup => {
                checkValidity(formGroup)
            })
        } else {
            checkValidity(form)
        }

        form.addEventListener('submit', (event) => {
            handleFormSubmit(event, modalId)
        })
    })
}


async function handleFormSubmit(event, modalId) {
    event.preventDefault()

    const action = event.target.action
    const method = event.target.method
    const formData = new FormData(event.target)
    const modalInstance = bootstrap.Modal.getInstance(document.getElementById(modalId))

    try {
        const response = await sendData(action, method, formData)
        const data = await response.json()

        if (data.status === 'success') {
            modalInstance.hide()
            onSuccess(event.target)
        }
    } catch (error) {
        console.error('Error:', error)
        modalInstance.hide()
        onError(event.target, modalId)
    }
}

async function sendData(action, method, data) {
    return await fetch(action, {
        method: method,
        headers: {
            'Content-Type': 'multipart/form-data'
        },
        body: data,
    })
}

function onSuccess(form) {
    const modalSuccessEl = document.getElementById(MODALS_ID.success)
    const modalBsSuccess = new bootstrap.Modal(modalSuccessEl)
    const titleEl = modalSuccessEl.querySelector(MESSAGE_ELEMS.titleSuccess)
    const infoEl = modalSuccessEl.querySelector(MESSAGE_ELEMS.infoSuccess)

    const messagesBox = form.querySelector(MESSAGE_ELEMS.messageBox)
    const titleContent = messagesBox.getAttribute(MESSAGE_ATTR.titleSuccessContent)
    const infoContent = messagesBox.getAttribute(MESSAGE_ATTR.infoSuccessContent)

    titleEl.innerHTML = titleContent
    infoEl.innerHTML = infoContent

    modalBsSuccess.show()
    resetForm(form)
    resetStep(form)
}

function onError(form, modalId) {
    const modalErrorEl = document.getElementById(MODALS_ID.error)
    const modalBsError = new bootstrap.Modal(modalErrorEl)
    const titleEl = modalErrorEl.querySelector(MESSAGE_ELEMS.titleError)
    const infoEl = modalErrorEl.querySelector(MESSAGE_ELEMS.infoError)
    const btnEL = document.querySelector(MESSAGE_ELEMS.btnError)

    const messagesBox = form.querySelector(MESSAGE_ELEMS.messageBox)
    const titleContent = messagesBox.getAttribute(MESSAGE_ATTR.titleErrorContent)
    const infoContent = messagesBox.getAttribute(MESSAGE_ATTR.infoErrorContent)

    titleEl.innerHTML = titleContent
    infoEl.innerHTML = infoContent

    btnEL.removeAttribute('data-bs-dismiss')
    btnEL.setAttribute('data-bs-toggle', 'modal')
    btnEL.setAttribute('data-bs-target', `#${modalId}`)

    modalBsError.show()
    resetStep(form)
}

function resetForm(form) {
    const inputList = Array.from(form.querySelectorAll(FORM_ELEMS.input))
    const checkboxElement = form.querySelector(FORM_ELEMS.checkbox)

    inputList.forEach((inputElement) => {
        inputElement.value = ''
    });

    if (checkboxElement) checkboxElement.checked = false
}

function resetStep(form) {
    const steps = form.querySelectorAll(STEPS_ELEMS.step);

    if (!steps) return

    steps.forEach((step, index) => {
        step.hidden = index !== 0
    })
}

function checkValidity(form) {
    const inputList = Array.from(form.querySelectorAll(FORM_ELEMS.input))
    const checkboxElement = form.querySelector(FORM_ELEMS.checkbox)
    const radioList = Array.from(form.querySelectorAll(FORM_ELEMS.radio))
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
            toggleButton(inputList, checkboxElement, buttonElement, formErrorElement)
        })
    }
    if (radioList) {
        radioList.forEach(radio => {
            radio.addEventListener('change', () => {
                toggleButton(inputList, checkboxElement, buttonElement, formErrorElement)
            })
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
    if (inputElement.required && inputElement.value === '' && !inputElement.classList.contains("is-invalid")) inputElement.classList.add('is-required')
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
        inputList.some(inputElement => !inputElement.validity.valid && !inputElement.closest('[hidden]'))
        || (checkboxElement && !checkboxElement.validity.valid)
    )
}

function hasEmptyRequiredInput(inputList) {
    const emptyRequiredInputs = inputList.filter(inputElement => !inputElement.closest('[hidden]') && inputElement.required && inputElement.value === '')
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
    const errorElement = inputElement.parentElement.querySelector('.invalid-feedback')
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
