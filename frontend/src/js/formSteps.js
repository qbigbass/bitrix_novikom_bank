const STEPS_ELEMS = {
    step: '[data-form-step]',
    buttonNext: '[data-form-step-button-next]',
    buttonPrev: '[data-form-step-button-prev]',
}

function initFormSteps() {
    const buttonNextStep = document.querySelectorAll(STEPS_ELEMS.buttonNext)
    const buttonPrevStep = document.querySelectorAll(STEPS_ELEMS.buttonPrev)

    if (buttonNextStep.length) {
        buttonNextStep.forEach((button) => {
            button.addEventListener('click', handlerClickNextStep)
        })
    }

    if (buttonPrevStep.length) {
        buttonPrevStep.forEach((button) => {
            button.addEventListener('click', handlerClickPrevStep)
        })
    }
}

function handlerClickNextStep(e) {
    const thisStep = e.target.closest(STEPS_ELEMS.step)

    thisStep.hidden = true
    thisStep.nextElementSibling.hidden = false

    if (thisStep.closest('.modal-body')) {
        thisStep.closest('.modal-body').scrollTo(0, 0)
    }
}

function handlerClickPrevStep(e) {
    const thisStep = e.target.closest(STEPS_ELEMS.step)

    thisStep.hidden = true
    thisStep.previousElementSibling.hidden = false

    if (thisStep.closest('.modal-body')) {
        thisStep.closest('.modal-body').scrollTo(0, 0)
    }
}
