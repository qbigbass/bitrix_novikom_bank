BX.ready(function () {
    let block = BX('js-measure-block');
    if (!!block) {
        //Ссылки для переключения табов
        let links = BX.findChildren(
            block,
            {"class": "section-catalog__tab-list-item"},
            true
        );
        links.forEach(function (link) {
            let href = link.getAttribute('href');
            if (!!href) {
                BX.bind(link, 'click', function (e) {
                    e.preventDefault();
                    BX.showWait();
                    links.forEach(function (el){
                        BX.removeClass(el,'active');
                    });
                    BX.addClass(link,'active');
                    BX.ajax.post(
                        href,
                        {action: 'getAjaxMeasures'},
                        function (data) {
                            let contentBlock = BX('js-measure-block-content');
                            if (!!contentBlock) {
                                contentBlock.innerHTML = data;
                            }
                            BX.closeWait();
                        }
                    );
                });
            }
        });
    }
});
