$(function () {
    $('.simple-callback-form').each(function (index, form) {
        $(form).on('submit', async (event) => {
            event.preventDefault()

            const response = await fetch($(form).prop('action'), {
                method: 'POST',
                body: new FormData(event.target)
            })
            const data = await response.json()
            if (data.status === 'success') {
                $(form).trigger('reset')
                alert('OK')
            } else {
                const message = data.errors.map(item => item.message
                    .replaceAll("<br />", "\n")
                    .replaceAll("&nbsp;", "")
                    .replaceAll("&raquo;", "")
                ).join("\n")
                alert('Ошибка! ' + message)
            }
        })
    })
})
