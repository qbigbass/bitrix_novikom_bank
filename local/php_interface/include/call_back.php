<div class="card-feedback position-relative overflow-hidden d-inline-flex px-3 py-4 p-sm-5 p-lg-6 w-100 bg-white h-100">
    <div class="card-feedback__inner d-flex flex-column row-gap-6 row-gap-lg-7 h-100 w-100 z-2">
        <div class="card-feedback__title-group d-flex flex-column gap-3 gap-md-4">
            <h4 class="card-feedback__title">Остались вопросы?</h4>
            <p class="card-feedback__description text-l m-0">Оставьте свой телефон и мы перезвоним вам, <br class="d-none d-md-block d-lg-none d-xl-block">либо направьте обращение</p>
        </div>
        <div class="d-flex flex-column flex-md-row p-0 gap-3 gap-md-4">
            <a href="/feedback/" class="btn btn-outline-primary btn-lg-lg text-ls overflow-visible w-100 w-md-auto">Открыть чат</a>
            <a href="/callback/" class="btn btn-primary btn-lg-lg text-ls overflow-visible w-100 w-md-auto">Перезвоните мне</a>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-top z-1">
        <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</div>

<?
global $FORMS;
$FORMS->includeForm('feedback_form');
$FORMS->includeForm('callback_form');
?>
