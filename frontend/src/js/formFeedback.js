const FEEDBACK_ELEMS = {
    formFeedback: '[data-form-feedback]',

    radiosPerson: 'input[name="PERSON"]',
    radiosTopic: 'input[name="TOPIC"]',
    radiosOtherEmail: 'input[name="OTHER_EMAIL"]',

    inputBirthday: 'input[name="BIRTHDAY"]',
    inputInn: 'input[name="INN"]',
    inputOrganization: 'input[name="ORGANIZATION"]',
    inputReplyEmail: 'input[name="REPLY_EMAIL"]',
    fieldsBlock: '#js-feedback-fields',
}

function initFormFeedback() {
    const formFeedback = document.querySelector(FEEDBACK_ELEMS.formFeedback)

    if (!formFeedback) return

    initFormPerson(formFeedback)
    initFormOtherEmail()
}

function initFormPerson(form) {
    const personRadios = form.querySelectorAll(FEEDBACK_ELEMS.radiosPerson)
    const topicRadios = form.querySelectorAll(FEEDBACK_ELEMS.radiosTopic)
    const colInputBirthday = form.querySelector(FEEDBACK_ELEMS.inputBirthday).closest('.application-form__col')
    const colInputInn = form.querySelector(FEEDBACK_ELEMS.inputInn).closest('.application-form__col')
    const colInputOrganization = form.querySelector(FEEDBACK_ELEMS.inputOrganization).closest('.application-form__col')
    const formFieldsBlock = form.querySelector(FEEDBACK_ELEMS.fieldsBlock);

    personRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'legal') {
                colInputBirthday.hidden = true
                colInputInn.hidden = false
                colInputOrganization.hidden = false
            } else {
                colInputBirthday.hidden = false
                colInputInn.hidden = true
                colInputOrganization.hidden = true
            }
            if (!!formFieldsBlock) {
                formFieldsBlock.classList.remove('d-none');
            }
        })
    })
    topicRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            const id = radio.id;
            if (id) {
                const textContainer = document.querySelector('#' + id + '-text');
                if (!!textContainer) {
                    document.querySelectorAll('.js-topic-text').forEach(el => {
                        el.hidden = true;
                    })
                    textContainer.hidden = false;
                }
            }
        })
    })
}

function initFormOtherEmail() {
    const otherEmailRadios = document.querySelectorAll(FEEDBACK_ELEMS.radiosOtherEmail)

    if (!otherEmailRadios.length) return

    const colInputReplyEmail = document.querySelector(FEEDBACK_ELEMS.inputReplyEmail).closest('.application-form__col')

    otherEmailRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            colInputReplyEmail.hidden = radio.value === 'false'
        })
    })
}
