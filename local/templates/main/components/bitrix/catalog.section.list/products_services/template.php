<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<? if (!empty($arResult['SECTIONS'])) : ?>
    <? foreach ($arResult['SECTIONS'] as $section) : ?>
        <div class="col-12 col-md-6 col-lg-4">
            <a class="card-product card-product--transparent card-product--bg-white" href="<?= $section['SECTION_PAGE_URL'] ?>">
                <div class="card-product__inner">
                    <div class="card-product__content mw-100">
                        <h4 class="card-product__title"><?= $section['NAME'] ?></h4>
                        <p class="card-product__description m-0 mw-100"><?= $section['DESCRIPTION'] ?></p>
                    </div>
                    <div class="card-product__footer">
                        <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                            <span>Подробнее</span>
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </span>
                        <? if (!empty($section['ICON_PATH'])) : ?>
                            <img class="icon size-xxl ms-auto" src="<?= $section['ICON_PATH'] ?>" alt="" loading="lazy">
                        <? endif; ?>
                    </div>
                </div>
            </a>
        </div>
    <? endforeach; ?>
<? endif; ?>
