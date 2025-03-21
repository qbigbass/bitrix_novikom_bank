const FEEDBACK_ELEMS = {
    formFeedback: '[data-form-feedback]',

    radiosPerson: 'input[name="PERSON"]',
    radiosTopic: 'input[name="TOPIC"]',
    radiosOtherEmail: 'input[name="OTHER_EMAIL"]',

    inputBirthday: 'input[name="BIRTHDAY"]',
    inputInn: 'input[name="INN"]',
    inputOrganization: 'input[name="ORGANIZATION"]',
    inputReplyEmail: 'input[name="REPLY_EMAIL"]',
    fieldsBlock: '#feedback-fields',
    topicText: '.js-topic-text',
    formCol: '.application-form__col',
}

function initFormFeedback() {
    const formFeedback = document.querySelector(FEEDBACK_ELEMS.formFeedback);

    if (!formFeedback) return;

    initFormPerson(formFeedback);
    initFormOtherEmail();
}

function initFormPerson(form) {
    const personRadios = form.querySelectorAll(FEEDBACK_ELEMS.radiosPerson);
    const topicRadios = form.querySelectorAll(FEEDBACK_ELEMS.radiosTopic);
    const colInputBirthday = form.querySelector(FEEDBACK_ELEMS.inputBirthday)?.closest(FEEDBACK_ELEMS.formCol);
    const colInputInn = form.querySelector(FEEDBACK_ELEMS.inputInn)?.closest(FEEDBACK_ELEMS.formCol);
    const colInputOrganization = form.querySelector(FEEDBACK_ELEMS.inputOrganization)?.closest(FEEDBACK_ELEMS.formCol);
    const formFieldsBlock = form.querySelector(FEEDBACK_ELEMS.fieldsBlock);
    const topicText = form.querySelectorAll(FEEDBACK_ELEMS.topicText);

    personRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'legal') {
                colInputBirthday.hidden = true;
                colInputInn.hidden = false;
                colInputOrganization.hidden = false;
            } else {
                colInputBirthday.hidden = false;
                colInputInn.hidden = true;
                colInputOrganization.hidden = true;
            }
            if (formFieldsBlock) {
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
                    topicText.forEach(el => {
                        el.hidden = true;
                    })
                    textContainer.hidden = false;
                }
            }
        })
    })
}

function initFormOtherEmail() {
    const otherEmailRadios = document.querySelectorAll(FEEDBACK_ELEMS.radiosOtherEmail);

    if (!otherEmailRadios.length) return;

    const colInputReplyEmail = document.querySelector(FEEDBACK_ELEMS.inputReplyEmail)?.closest(FEEDBACK_ELEMS.formCol);

    otherEmailRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            colInputReplyEmail.hidden = radio.value === 'false'
        })
    })
}
