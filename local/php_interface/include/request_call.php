<section class="section-layout section-feedback bg-blue-10">
    <div class="container">
        <div class="section-feedback__content d-grid align-items-start gap-5 row-gap-md-6 column-gap-md-5 column-gap-lg-6">
            <div class="d-flex flex-column align-items-start gap-5 gap-md-6 ps-lg-6">
                <div class="d-flex flex-column gap-3 gap-lg-4">
                    <h3>Остались вопросы</h3>
                    <p class="text-l mb-0">Оставьте свой телефон и&nbsp;мы&nbsp;перезвоним вам, либо задайте вопрос
                        в&nbsp;чате</p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-start gap-5 gap-md-6 ps-lg-6">
                <button class="btn btn-info w-100 w-lg-auto" type="button">Открыть чат</button>
                <p class="text-s dark-70 mb-0">Нажимая кнопку «Перезвоните мне», вы&nbsp;соглашаетесь с&nbsp;условиями предоставления информации</p>
            </div>
            <form class="form-feedback bg-white" action="/" method="POST">
                <div>
                    <label class="form-label" for="mobile-phone">Мобильный телефон</label>
                    <input class="form-control form-control-lg-lg js-mask-phone" id="mobile-phone" type="text"
                           aria-describedby="mobile-phone-hint" placeholder="+7">
                </div>
                <button class="btn btn-primary btn-lg-lg w-100" type="button">Перезвоните мне</button>
            </form>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-top">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
