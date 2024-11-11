const STEPS_ELEMS = {
    form: "[data-form-step]",
    buttonNext: "[data-form-step-button-next]",
}

export function initFormSteps() {
    const buttonNextStep = document.querySelectorAll(STEPS_ELEMS.buttonNext);

    if (!buttonNextStep.length) return;

    buttonNextStep.forEach((button) => {
        button.addEventListener('click', handlerClickNextStep)
    })
}

function handlerClickNextStep(e) {
    const thisStep = e.target.closest(STEPS_ELEMS.form);

    thisStep.hidden = true;
    thisStep.nextElementSibling.hidden = false;

    if (thisStep.closest(".modal-body")) {
        thisStep.closest(".modal-body").scrollTo(0, 0);
    }
}
