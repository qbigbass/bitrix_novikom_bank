<section class="section-layout section-feedback bg-blue-10">
    <div class="container">
        <div class="section-feedback__content d-grid align-items-start gap-5 row-gap-md-6 column-gap-md-5 column-gap-lg-6">
            <div class="d-flex flex-column align-items-start gap-5 gap-md-6 ps-lg-6">
                <div class="d-flex flex-column gap-3 gap-lg-4">
                    <h3>Остались вопросы</h3>
                    <p class="text-l mb-0">Оставьте свой телефон, и&nbsp;мы&nbsp;перезвоним вам, либо направьте обращение</p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-start gap-5 gap-md-6 ps-lg-6">
                <a class="btn btn-info w-100 w-lg-auto" href="/feedback/">Направить обращение</a>
                <p class="text-s dark-70 mb-0">Нажимая кнопку «Перезвоните мне», вы&nbsp;соглашаетесь с&nbsp;условиями предоставления информации</p>
            </div>
            <?php $APPLICATION->IncludeComponent(
                "dalee:form",
                "simple_callback_form",
                [
                    "FORM_CODE" => "simple_callback_form",
                ]
            ); ?>
            <?
            global $FORMS;
            $FORMS->includeForm('feedback_form');
            ?>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-top">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
