<?
$classColorBtn = 'btn-orange';
$classColorCard = 'card-service-app--bg-purple';

if (!empty($arParams['CLASS_COLOR_CARD'])) {
    $classColorCard = $arParams['CLASS_COLOR_CARD'];
}

if (!empty($arParams['CLASS_COLOR_BTN'])) {
    $classColorBtn = $arParams['CLASS_COLOR_BTN'];
}
?>

<div class="col-12">
    <div class="card-service-app <?= $classColorCard ?>">
        <div class="card-service-app__inner">
            <h3>Интернет-банк для бизнеса</h3>
            <div class="card-service-app__content">
                <div class="row row-gap-3">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-center gap-3">
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-doc"></use>
                            </svg>
                            <span class="fw-semibold text-s">Удаленный <br class="d-none d-lg-block">документооборот</span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-center gap-3">
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-cash"></use>
                            </svg>
                            <span class="fw-semibold text-s">Проведение <br class="d-none d-lg-block">платежей</span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-center gap-3">
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-wallet"></use>
                            </svg>
                            <span class="fw-semibold text-s">Управление <br class="d-none d-lg-block">расчетными счетами</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <a class="btn <?= $classColorBtn ?> d-none d-md-inline-flex" href="/msb/dbo/">Перейти в интернет-банк</a>
                    <a class="btn btn-sm <?= $classColorBtn ?> d-md-none" href="/msb/dbo/">Перейти в интернет-банк</a>
                </div>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-top">
            <source srcset="/frontend/dist/img/patterns/card/pattern-dark-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/card/pattern-dark-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-dark-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </div>
</div>

