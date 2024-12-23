$(function () {

    $('.pb-form').each((index, form) => {

        $(form).on('submit',  async (e) => {
            e.preventDefault()
            const callbackTime = $(form).find('[name=callback_time]').val() + ' '
                + $(form).find('[name=hours]').val() + ':'
                + $(form).find('[name=minutes]').val()
            const request = new FormData
            request.append('sessid', $(form).find('[name=sessid]').val())
            request.append('FORM_CODE', $(form).find('[name=FORM_CODE]').val())
            request.append('FIRST_NAME', $(form).find('[name=name]').val())
            request.append('PHONE', $(form).find('[name=phone]').val())
            request.append('CALLBACK_TIME', callbackTime)
            const resp = await fetch('/bitrix/services/main/ajax.php?mode=class&c=dalee:form&action=saveLead', {
                method: 'post',
                body: request
            })
            const data = await resp.json()
            if (data.status === 'error') {
                alert(data.message)
            }
            $(form).get(0).reset()
        })

    })

})
