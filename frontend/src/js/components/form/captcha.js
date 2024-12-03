const CAPTCHA_ELEMS = {
    audioButton: ".captcha-audio-btn"
}

export function initCaptcha() {
    const captchaAudioButtons = document.querySelectorAll(CAPTCHA_ELEMS.audioButton)

    if (!captchaAudioButtons.length) return

    captchaAudioButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            btn.classList.add('is-active')

            setTimeout(() => {
                btn.classList.remove('is-active')
            }, 5500)
        })
    })
}
