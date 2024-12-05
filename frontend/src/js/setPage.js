const TABS_DATA = {
    buttons: '[data-tab-button-page]',
}

async function setPage() {
    const $buttons = $(TABS_DATA.buttons);

    if (!$buttons.length) {
        return false;
    }

    $buttons.on('click', async function () {
        const page = $(this).data('tab-button-page');

        try {
            const response = await fetch('/local/php_interface/ajax/ajax_set_page.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'set_page',
                    page: page
                })
            });

            const data = await response.json();

            if (data.status === 'success') {
                location.reload();
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });
}
