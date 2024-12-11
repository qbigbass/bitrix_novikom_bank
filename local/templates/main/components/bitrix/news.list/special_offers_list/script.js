document.addEventListener('DOMContentLoaded', function () {
    const stickyIcons = document.querySelectorAll('.card-news__sticky-icon');

    stickyIcons.forEach(function (icon) {
        icon.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const itemId = this.dataset.id;
            this.classList.toggle('active');

            const parentElement = this.closest('.col-12');
            if (!parentElement) return;

            const parentContainer = parentElement.parentNode;
            const isActive = this.classList.contains('active');

            if (isActive) {
                parentContainer.prepend(parentElement);
                console.log(`Иконка ${itemId} закреплена`);
            } else {
                console.log(`Иконка ${itemId} откреплена`);
            }

            BX.ajax({
                url: '/local/php_interface/ajax/pin_news.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    sessid: BX.bitrix_sessid(),
                    itemId: itemId,
                    path: window.location.pathname
                },
                onsuccess: function (response) {
                    // location.reload();
                },
                onfailure: function (error) {
                    console.error('Ошибка AJAX:', error);
                }
            });
        });
    });
});
