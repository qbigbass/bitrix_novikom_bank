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

<div class="container">
    <div class="row">
        <div class="col-12 position-relative z-1 d-flex flex-column align-items-start gap-4 gap-md-6 gap-lg-7">
            <?foreach($arResult['ITEMS'] as $arItem) {?>
                <div class="card-product-list overflow-hidden position-relative mh-100 h-auto bg-dark-10 w-100 pt-7 pb-6 py-sm-9 py-md-9 py-lg-11 px-3 px-sm-4 px-md-5 px-lg-6 pe-xxl-11">
                    <div class="card-product-list__inner d-flex flex-column flex-lg-row align-items-start h-100 gap-3 gap-md-6 gap-xxl-11">
                        <div class="card-product-list__image-container mx-auto">
                            <img class="card-product-list__image" src="<?= CFile::GetPath($arItem['PICTURE']) ?>" alt="" loading="lazy">
                        </div>
                        <div class="card-product-list__content flex-column d-flex align-items-start gap-6 gap-lg-9 w-100">
                            <div class="card-product-list__title-group d-flex flex-column gap-4 gap-lg-6">
                                <div class="tag tag--triangle-absolute card-product-list__tag">
                                    <span class="tag__content text-s fw-semibold"><?= $arItem['PARENT_SECTION_NAME'] ?></span>
                                    <span class="tag__triangle">
                                      <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                      </svg>
                                    </span>
                                </div>
                                <a href="<?= $arItem['SECTION_PAGE_URL'] ?>">
                                    <h2 class="card-product-list__title text-break"><?=$arItem['NAME']?></h2>
                                </a>
                            </div>
                            <? if (!empty($arItem['UF_CARD_SHORT_CONDITIONS'])) : ?>
                                <div class="card-product-list__condition-list w-100 w-lg-auto d-flex justify-content-between justify-content-lg-start flex-column flex-sm-row flex-wrap row-gap-4 row-gap-sm-6 row-gap-lg-6 row-gap-xxl-6 gap-xl-12 gap-xxl-16">
                                    <?= htmlspecialchars_decode($arItem['UF_CARD_SHORT_CONDITIONS']) ?>
                                </div>
                            <? endif; ?>
                            <div class="d-flex flex-column flex-sm-row align-items-center gap-5 gap-sm-6 w-100">
                                <?if($arItem['UF_SHOW_BUTTON']) {?>
                                    <button
                                        class="btn btn-tertiary btn-lg-lg card-product-list__button w-100 w-sm-auto"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal-credit-card-form"
                                    >Оформить заявку
                                    </button>
                                <?}?>
                                <a class="btn btn-link btn-lg-lg d-inline-flex gap-2 align-items-center card-product-list__button-more" href="<?= $arItem['SECTION_PAGE_URL'] ?>">
                                    <span>Подробнее</span>
                                    <svg class="card-product-list__button-icon" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?}?>
        </div>
    </div>
</div>
<?php $APPLICATION->IncludeComponent(
    "dalee:form",
    "credit_card_form",
    [
        "FORM_CODE" => "credit_card_form",
    ],
    $component
); ?>
