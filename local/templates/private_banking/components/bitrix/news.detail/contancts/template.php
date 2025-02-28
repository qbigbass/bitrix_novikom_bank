<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$phone1 = $arResult['PROPERTIES']['PHONE']['VALUE'][0] ?? '';
$phone2 = $arResult['PROPERTIES']['PHONE']['VALUE'][1] ?? '';
$address1 = $arResult['PROPERTIES']['ADDRESS']['VALUE'][0] ?? '';
$address2 = $arResult['PROPERTIES']['ADDRESS']['VALUE'][1] ?? '';
$email = $arResult['PROPERTIES']['EMAIL']['VALUE'] ?? '';
$copyright = $arResult['~PREVIEW_TEXT'] ?? '';
$qr = $arResult['PREVIEW_PICTURE']['SRC'] ?? '';
$map = $arResult['DETAIL_PICTURE']['SRC'] ?? '';

?>
<div class="mt-auto pt-7 pt-lg-0">
    <div class="pb-card-contact d-flex flex-column row-gap-4 row-gap-lg-5 align-items-lg-center">
        <ul class="list-pb-contact d-flex flex-column flex-lg-row justify-content-xl-between flex-wrap gap-4">
            <? if ($phone1) : ?>
                <li class="d-flex align-items-center">
                    <span class="icon size-m flex-shrink-0 dark-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                        </svg>
                    </span>
                    <a class="list-pb-contact__link"
                       href="tel:+<?= preg_replace('/\D+/', '', $phone1); ?>"
                       data-phone="<?= $phone1 ?>"><?= $phone1 ?></a>
                </li>
            <? endif; ?>
            <?
            if ($email) : ?>
                <li class="d-flex align-items-center">
                    <span class="icon size-m flex-shrink-0 dark-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                        </svg>
                    </span>
                    <a class="list-pb-contact__link"
                       href="emailto:<?= $email ?>"><?= $email ?></a>
                </li>
            <? endif; ?>
            <? if ($address2) : ?>
                <li class="d-flex align-items-center">
                    <span class="icon size-m flex-shrink-0 dark-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-bank"></use>
                        </svg>
                    </span>
                    <span><?= $address2 ?></span>
                </li>
            <? endif; ?>
        </ul>
        <a class="btn btn-pb btn-pb--outline" href="/"><?= Loc::getMessage('HEADER_MAIN_SITE') ?></a>
    </div>
</div>

<?
$this->SetViewTarget('PB_INDEX_CONTACTS'); ?>
<section class="pb-section pb-section--bg-black">
    <div class="container">
        <div class="pb-card-office animate js-animation">
            <div class="pb-card-office__content d-flex flex-column align-items-start">
                <h3 class="pb-card-office__title mb-3 mb-lg-4">Контакты</h3>
                <? if ($address1) : ?>
                    <p class="pb-card-office__text pr-text-color mb-0"><?= UF_PB_FULL_ADDRESS ?></p>
                <? endif; ?>
                <div class="mt-auto d-flex justify-content-between align-items-center w-100">
                    <ul class="pb-card-office__list d-flex flex-column row-gap-2 row-gap-md-3 align-items-start">
                        <? if ($email) : ?>
                            <li><a href="mailto:<?= $email ?>"><?= $email ?></a></li>
                        <? endif; ?>
                        <? if ($phone1) : ?>
                            <li>
                                <a href="tel:+<?= preg_replace('/\D+/', '', $phone1); ?>">
                                    <?= $phone1 ?>
                                </a>
                            </li>
                        <? endif; ?>
                    </ul>
                    <? if ($qr) : ?>
                        <div class="pb-card-office__qr d-none d-xl-block">
                            <img src="<?= $qr ?>" alt="qr-код" loading="lazy" width="80" height="80">
                        </div>
                    <? endif; ?>
                </div>
            </div>
            <? if ($map) : ?>
                <div class="pb-card-office__map">
                    <img src="<?= $map ?>" alt="qr-код" loading="lazy" width="80" height="80" alt="карта"
                         loading="lazy">
                </div>
            <? endif; ?>
        </div>
    </div>
</section>
<?
$this->EndViewTarget(); ?>

<?
$this->SetViewTarget('PB_FOOTER_CONTACTS'); ?>
<div class="container">
    <div class="row row-gap-5">
        <div class="col-12 col-md-6">
            <div class="d-flex flex-column row-gap-5 flex-lg-row gap-lg-6 align-items-lg-center"><img
                    src="/frontend/dist/img/logo-pb-footer.svg" alt="Новиком" width="196" height="56" loading="lazy">
                <? if ($copyright) : ?>
                    <p class="pb-footer__copyright m-0"><?= str_replace('#DATE#', date('Y'), $copyright) ?></p>
                <? endif; ?>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="d-flex flex-column row-gap-2 align-items-start align-items-lg-end">
                <? if ($phone1) : ?>
                    <a class="pb-footer__text pb-footer__text--phone"
                       href="tel:+<?= preg_replace('/\D+/', '', UF_PHONE1); ?>">
                        <?= UF_PHONE1 ?>
                    </a>
                <? endif; ?>
                <? if ($address1) : ?>
                    <p class="m-0 pb-footer__text"><?= UF_PB_FULL_ADDRESS ?></p>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>
<?
$this->EndViewTarget(); ?>
