const menuTabs = Array.from(document.querySelectorAll('.mobile-menu__tab[data-tab]'));
const menuLists = Array.from(document.querySelectorAll('.mobile-menu__nav[data-list]'));
const bankButtons = document.querySelector('.mobile-menu__bank-buttons');
const bankContact = document.querySelector('.mobile-menu__bank-contact');

menuTabs.forEach(tab => {
    tab.onclick = ()=> {
        disableActive(menuTabs);
        tab.classList.add('is-active');

        menuLists.forEach(list => {
            disableActive(menuLists);
            bankButtons.classList.add('hidden');
            bankContact.classList.add('hidden');

            setTimeout(()=> {
                if (list.getAttribute('data-list') === tab.getAttribute('data-tab')) {
                    list.classList.add('is-active');
                    bankButtons.classList.remove('hidden');
                    bankContact.classList.remove('hidden');
                }
            }, 0);
        })
    }
})

function disableActive(array) {
    array.forEach(item => {
        item.classList.remove('is-active')
    })
}