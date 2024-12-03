$(function () {

    const sounds = [];

    $('.modal').on('openFormModal', e => {
        $(e.target).find('.captcha-image').click()
    })

    $('.captcha-image').on('click', async () => {
        const res = await fetch('/bitrix/services/main/ajax.php?mode=class&c=dalee:captcha&action=update', {
            method: 'POST'
        })
        const result = await res.json()
        const imageUrl = '/bitrix/tools/captcha.php?captcha_sid=' + result.data.captcha_sid;
        $('[name=captcha_word]').val('')
        $('.captcha-sid').val(result.data.captcha_sid)
        $('.captcha-image').prop('src', imageUrl)
        sounds.length = 0
    })

    $('.captcha-audio-btn').on('click', async () => {
        if (!sounds.length) {
            const captcha_sid = $('.captcha-sid').val()
            const res = await fetch('/bitrix/services/main/ajax.php?mode=class&c=dalee:captcha&action=audio', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ captcha_sid: captcha_sid })
            })
            const result = await res.json()

            result.data.word.forEach(s => {
                sounds.push(new Audio('data:audio/mp3;base64,' + s))
            })
        }

        sounds.forEach(function (sound) {
            sound.onended = onEnded
        });

        let currentIndex = 0

        function onEnded(e) {
            currentIndex++
            if (currentIndex < sounds.length) {
                sounds[currentIndex].play()
            }
        }

        sounds[0].play()
    })

});
