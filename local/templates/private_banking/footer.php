<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @var array $pbModel
 */
?>

<!-- /#WORK_AREA# -------------------------------------------------------------------------------------------------- -->
<div class="modal modal-pb fade" id="modal-pb-response" tabindex="-1" aria-hidden="true">
    <div class="container modal-pb__container">
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                  <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close-small"></use>
                </svg>
            </span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="pb-form d-flex flex-column gap-4 gap-lg-5">
                    <div class="pb-form__title dark-0 text-center js-title"></div>
                    <p class="pb-form__text text-l dark-0 text-center m-0 js-info"></p>
                    <p class="pb-form__date text-l dark-0 text-center m-0 js-info-date"></p>
                    <div class="pb-form__footer d-flex align-items-center justify-content-center gap-5">
                        <button class="btn btn-pb btn-pb--primary w-100 w-md-auto js-btn" type="button" data-bs-dismiss="modal">Ок, спасибо</button>
                    </div>
                    <img class="pb-form__bg-sphere"
                         src="/frontend/dist/img/pb-images/pb-sphere-tablet.png"
                         srcset="/frontend/dist/img/pb-images/pb-sphere.png 172w, /frontend/dist/img/pb-images/pb-sphere-tablet.png 224w"
                         sizes="(max-width: 767px) 172px, 224px"
                         alt="" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="pb-footer">
    <a class="btn-pb-up js-scroll-to" id="scrollToTop" href="#header" title="Наверх">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <use xlink:href="/frontend/dist/img/svg-sprite.svg#arrow-up"></use>
        </svg>
    </a>
    <div class="container">
        <div class="row row-gap-5">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column row-gap-5 flex-lg-row gap-lg-6 align-items-lg-center"><img src="/frontend/dist/img/logo-pb-footer.svg" alt="Новиком" width="196" height="56" loading="lazy">
                    <p class="pb-footer__copyright m-0"><?= str_replace('#DATE#', date('Y'), UF_PB_CPYRIGHT) ?></p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column row-gap-2 align-items-start align-items-lg-end">
                    <a class="pb-footer__text pb-footer__text--phone" href="tel:+<?= preg_replace('/\D+/', '', UF_PHONE1); ?>"><?= UF_PHONE1 ?></a>
                    <p class="m-0 pb-footer__text"><?= UF_PB_FULL_ADDRESS ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
