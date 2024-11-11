const FEEDBACK_ELEMS = {
    formFeedback: "[data-form-feedback]",

    radiosPerson: "input[name='person']",
    radiosOtherEmail: "input[name='other-email']",

    inputBirthday: "input[name='birthday']",
    inputInn: "input[name='inn']",
    inputOrganization: "input[name='organization']",
    inputReplyEmail: "input[name='reply-email']",
}

export function initFormFeedback() {
    const formFeedback = document.querySelector(FEEDBACK_ELEMS.formFeedback);

    if (!formFeedback) return;

    initFormPerson(formFeedback);

    initFormOtherEmail();
}

function initFormPerson(form) {
    const personRadios = form.querySelectorAll(FEEDBACK_ELEMS.radiosPerson);
    const colInputBirthday = form.querySelector(FEEDBACK_ELEMS.inputBirthday).closest(".application-form__col");
    const colInputInn = form.querySelector(FEEDBACK_ELEMS.inputInn).closest(".application-form__col");
    const colInputOrganization = form.querySelector(FEEDBACK_ELEMS.inputOrganization).closest(".application-form__col");

    personRadios.forEach(radio => {
        radio.addEventListener("change", () => {
            if (radio.value === "legal") {
                colInputBirthday.hidden = true;
                colInputInn.hidden = false;
                colInputOrganization.hidden = false;
            } else {
                colInputBirthday.hidden = false;
                colInputInn.hidden = true;
                colInputOrganization.hidden = true;
            }
        })
    })
}

function initFormOtherEmail() {
    const otherEmailRadios = document.querySelectorAll(FEEDBACK_ELEMS.radiosOtherEmail);

    if (!otherEmailRadios.length) return;

    const colInputReplyEmail = document.querySelector(FEEDBACK_ELEMS.inputReplyEmail).closest(".application-form__col");

    otherEmailRadios.forEach(radio => {
        radio.addEventListener("change", () => {
            colInputReplyEmail.hidden = radio.value === "false";
        })
    })
}
