$(function () {

    let sounds = [];

    $('.captcha-image').on('click', async () => {
        const res = await fetch('/bitrix/services/main/ajax.php?mode=class&c=dalee:captcha&action=update', {
            method: 'POST'
        })
        const result = await res.json()
        const imageUrl = '/bitrix/tools/captcha.php?captcha_sid=' + result.data.captcha_sid;
        $('.captcha-sid').val(result.data.captcha_sid)
        $('.captcha-image').prop('src', imageUrl)
        sounds = []
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
                sounds.push(new Audio('data:audio/wav;base64,' + s))
            })
        }

        let currentIndex = 0
        sounds.forEach(function (sound) {
            sound.onended = onEnded
        });

        function onEnded(e) {
            currentIndex++
            if (currentIndex < sounds.length) {
                sounds[currentIndex].play()
            }
        }

        sounds[0].play()
    })

});
