$(document).ready(function () {
    $(document).on('select2:select', '.js-select', function () {
        let params = new URLSearchParams(window.location.search);
        params.set('PAGEN_1', $(this).val());
        window.location.search = params.toString();
    });
});
