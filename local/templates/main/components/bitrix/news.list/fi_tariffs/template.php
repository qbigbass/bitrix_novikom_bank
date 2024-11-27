<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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

use Bitrix\Main\Localization\Loc;

?>
<section class="section-layout px-lg-6">
    <div class="container">
        <div class="row">
            <div class="d-none d-md-flex justify-content-between">
                <h3 class="h3"><?= Loc::getMessage("BLOCK_TITLE") ?></h3>
            </div>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse"
               href="#documents" role="button" aria-expanded="false" aria-controls="documents"><?= Loc::getMessage("BLOCK_TITLE") ?>
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
        </div>
        <div class="collapse d-md-block mt-6 mt-lg-7" id="documents">
            <div class="row row-gap-6">
                <div class="col-12 col-xxl-8 pe-xxl-6">
                    <div class="ps-3 ps-lg-4">
                        <?foreach ($arResult["ITEMS"] as $item):?>
                            <?$file = $item['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'];?>
                            <a
                                class="d-flex flex-column gap-1 py-3 document-download text-m"
                                href="<?= $file['SRC']?>"
                                download="<?= $file['FILE_NAME']?>"
                            ><?= $item["NAME"] ?>
                                <div class="d-flex gap-1 align-items-center">
                                    <div class="document-download__file caption-m dark-70">
                                        <span class="document-download__date-time"><?= $item["TIMESTAMP_X"] ?></span>
                                        <span class="document-download__file-type"><?= explode('.', $file['ORIGINAL_NAME'])[1]?></span>
                                    </div>
                                    <span class="icon size-s text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        <?endforeach;?>
                    </div>
                </div>
                <div class="col-12 col-xxl-4">
                    <?$APPLICATION->IncludeFile('/local/php_interface/include/protection_from_scammers.php');?>
                </div>
            </div>
        </div>
    </div>
    <picture class="pattern-bg pattern-bg--position-sm-top pattern-bg--hide-mobile">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
        <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
        <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
    </picture>
</section>
