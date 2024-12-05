<div class="card-help d-inline-flex p-3 p-sm-5 p-lg-6 w-100 bg-<?= $arParams['BACKGROUND_COLOR'] ?? 'white' ?> h-100">
    <div class="card-help__inner d-flex flex-column gap-4 gap-md-6 h-100 w-100">
        <div class="card-help__title-group d-flex flex-column gap-3 gap-md-4">
            <h4 class="card-help__title">Остались вопросы?</h4>
            <p class="card-help__description text-m m-0">Оставьте свой телефон и мы
                перезвоним вам, либо задайте вопрос в чате</p>
        </div>
        <form class="form-feedback p-0 gap-3 gap-md-4" action="/" method="POST">
            <div>
                <label class="form-label" for="mobile-phone-help">Мобильный
                    телефон</label>
                <input
                    class="card-help__input form-control form-control-lg bg-transparent" id="mobile-phone-help"
                    type="text"
                    aria-describedby="mobile-phone-hint" placeholder="+7">
            </div>
            <button class="btn btn-primary btn-lg text-m w-100" type="button">Перезвоните мне</button>
        </form>
        <button class="card-help__button btn btn-link btn-lg btn-icon mx-auto gap-2" type="button">
            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chat"></use>
            </svg>
            Написать в чат
        </button>
        <p class="card-help__agreement-text m-0 dark-70 fs-4 lh-sm">Нажимая кнопку
            «Перезвоните мне», вы соглашаетесь с условиями предоставления информации</p>
    </div>
</div>
