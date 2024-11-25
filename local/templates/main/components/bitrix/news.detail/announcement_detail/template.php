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

//echo "<pre>"; print_r($arResult); echo "</pre>";

?>
<section class="pt-6 pb-6 pb-md-9 pb-lg-11 px-lg-6 border-top border-tertiary border-4 border-lg-8">
    <div class="container">
        <div class="row row-gap-6 row-gap-lg-7">
            <div class="col-12">
                <div class="breadcrumbs d-flex flex-wrap gap-2"><a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-none" href="/support/"><span>Поддержка</span></a><a class="breadcrumbs__item d-md-inline-flex align-items-center gap-2 text-s dark-70 d-inline-flex" href="<?= $arResult['LIST_PAGE_URL'] ?>">
                        <svg class="icon size-s d-inline-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                        </svg><span>Объявления для частных клиентов</span></a>
                </div>
            </div>
            <div class="col-12">
                <h1 class="h2 mb-4 mb-md-5 mb-lg-6"><?= $arResult['NAME'] ?></h1>
                <div class="d-flex gap-3 gap-md-4 align-items-center">
                    <div class="tag tag--outline tag--triangle-absolute"><span class="tag__content text-s fw-semibold"><?= $arResult['PROPERTIES']['TYPE_AD']['VALUE'] ?></span><span class="tag__triangle">
                          <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                          </svg></span></div><span class="text-m dark-70"><?= $arResult['PROPERTIES']['DATE']['VALUE'] ?></span>
                </div>
            </div>
            <?= $arResult['DETAIL_TEXT'] ?>
        </div>
    </div>
</section>
