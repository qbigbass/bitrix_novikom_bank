import $ from "../vendors/jquery.min";

const TABS_DATA = {
    buttons: '[data-tab-button-page]',
}

function setPage() {
    const $buttons = $(TABS_DATA.buttons);

    if (!$buttons.length) {
        return false;
    }

    $buttons.on('click', function() {
        const page = $(this).data('tab-button-page');

        fetch('/local/php_interface/ajax/ajax_set_page.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                action: 'set_page',
                page: page
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
    });
}

export default setPage;
