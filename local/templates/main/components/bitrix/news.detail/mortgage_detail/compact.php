<?
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
?>

<section class="text-banner pe-lg-0 px-0 px-lg-6 bg-linear-blue text-banner--border-green">
    <div class="container text-banner__container position-relative z-2">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-8 position-relative z-1 mb-5 mb-md-0 pt-6">
                <div class="d-flex flex-column align-items-start gap-3 gap-md-4">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "",
                        [
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => "0"
                        ]
                    );?>
                    <h1 class="text-banner__title dark-0 text-break"><?= $arResult["NAME"] ?></h1>
                    <div class="text-banner__description text-l dark-0"><?= $arResult["PREVIEW_TEXT"] ?></div>
                </div>
            </div>
            <div class="d-none d-sm-block col-12 col-sm-6 col-md-4">
                <img class="text-banner__image position-relative w-auto float-end" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>">
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top text-banner__pattern">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
