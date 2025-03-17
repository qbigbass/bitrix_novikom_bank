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
$this->setFrameMode(true); ?>

<?
$colorSection = $arParams["COLOR_SECTION"] ?? "";
$colorCard = $arParams["COLOR_CARD"] ?? "bg-heavy-purple";
$colorTag = $arParams["COLOR_TAG"] ?? "tag--outline";
$colorH4 = $arParams["COLOR_H4"] ?? "dark-0";
$colorSpan = $arParams["COLOR_SPAN"] ?? "dark-0";
$colorIcon = $arParams["COLOR_ICON"] ?? "dark-0";
?>
<section class="section-layout <?= $colorSection ?>">
    <div class="container">
        <h3 class="mb-4 mb-md-6 mb-lg-7 px-lg-6">Контакты</h3>
        <div class="row">
            <div class="col-12">
                <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:1,tablet-album:2,laptop:2,laptop-x:2" data-space-between="mobile-s:8,mobile:8,tablet:16,tablet-album:16,laptop:16,laptop-x:16">
                    <div class="slider-controls js-swiper-controls mb-3">
                        <div class="slider-controls__pagination js-swiper-pagination"></div>
                        <div class="slider-controls__navigation js-swiper-nav">
                            <button class="swiper-button-prev js-swiper-prev" type="button">
                                <span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg>
                                </span>
                            </button>
                            <button class="swiper-button-next js-swiper-next" type="button">
                                <span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['ITEMS'] as $item) : ?>
                            <?
                            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="swiper-slide js-swiper-slide" id="<?=$this->GetEditAreaId($item['ID']);?>">
                                <div class="contact-block <?= $colorCard ?>">
                                    <div class="contact-block__content d-flex flex-column row-gap-5 row-gap-md-6 row-gap-lg-7 h-100">
                                        <? if (!empty($item["PROPERTIES"]["DEPARTMENT"]["VALUE"])) : ?>
                                            <div class="tag <?= $colorTag ?> tag--triangle-absolute contact-block__tag">
                                                <span class="tag__content text-s fw-semibold w-100 w-sm-auto"><?= $item["PROPERTIES"]["DEPARTMENT"]["VALUE"] ?></span>
                                                <span class="tag__triangle">
                                                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        <? endif; ?>
                                        <div class="d-flex flex-column row-gap-2">
                                            <h4 class="contact-block__title <?= $colorH4 ?>"><?= $item['~NAME'] ?></h4>
                                            <?if (!empty($item["PREVIEW_TEXT"])) : ?>
                                                <p class="mb-0 contact-block__description"><?= $item["PREVIEW_TEXT"] ?></p>
                                            <? endif; ?>
                                        </div>
                                        <div class="mt-auto">
                                            <ul class="list-contact d-flex flex-column row-gap-4">
                                                <? if (!empty($item['PROPERTIES']['PHONE']['VALUE'])) : ?>
                                                    <li class="d-flex flex-column column-gap-3 row-gap-2">
                                                        <? foreach ($item['PROPERTIES']['PHONE']['VALUE'] as $phone) : ?>
                                                            <div class="d-flex column-gap-3">
                                                                <span class="icon size-m flex-shrink-0 <?= $colorIcon ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-phone"></use>
                                                                    </svg>
                                                                </span>
                                                                <div class="list-contact__text d-flex flex-wrap gap-2">
                                                                    <a class="list-contact__link" href="tel:<?= preg_replace('/[^\d+]/', '', $phone) ?>">
                                                                        <span class="<?= $colorSpan ?> text-l"><?= $phone ?></span>
                                                                    </a>
                                                                    <? if(!empty($item['PROPERTIES']['PHONE']['DESCRIPTION'][0])): ?>
                                                                        <span class="caption-m chip chip--outlined <?= $colorSpan ?>">доб. <?= $item['PROPERTIES']['PHONE']['DESCRIPTION'][0] ?></span>
                                                                    <? endif; ?>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </li>
                                                <? endif; ?>
                                                <? if (!empty($item['PROPERTIES']['EMAIL']['VALUE'])) : ?>
                                                    <li class="d-flex column-gap-3">
                                                        <span class="icon size-m flex-shrink-0 <?= $colorIcon ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-mail"></use>
                                                            </svg>
                                                        </span>
                                                        <div class="list-contact__text d-flex flex-wrap gap-2">
                                                            <a class="text-decoration-underline <?= $colorSpan ?>" href="mailto:<?= $item['PROPERTIES']['EMAIL']['VALUE'] ?>">
                                                                <span class="text-l"><?= $item['PROPERTIES']['EMAIL']['VALUE'] ?></span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <? endif; ?>
                                                <? if (!empty($item['PROPERTIES']['ADDRESS']['VALUE'])) : ?>
                                                    <li class="d-flex flex-column column-gap-3 row-gap-2">
                                                        <? foreach ($item['PROPERTIES']['ADDRESS']['VALUE'] as $address) : ?>
                                                            <div class="d-flex column-gap-3">
                                                                <span class="icon size-m flex-shrink-0 <?= $colorIcon ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                      <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-point"></use>
                                                                    </svg>
                                                                </span>
                                                                <div class="list-contact__text d-flex flex-wrap gap-2">
                                                                    <span class="<?= $colorSpan ?> text-l"><?= $address ?></span>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </li>
                                                <? endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? endforeach; ?>
                        <div class="swiper-slide js-swiper-slide">
                            <div class="card-feedback position-relative overflow-hidden d-inline-flex px-3 py-4 p-sm-5 p-lg-6 w-100 bg-white h-100">
                                <div class="card-feedback__inner d-flex flex-column row-gap-6 row-gap-lg-7 h-100 w-100 z-2">
                                    <div class="card-feedback__title-group d-flex flex-column gap-3 gap-md-4">
                                        <h4 class="card-feedback__title">Остались вопросы?</h4>
                                        <p class="card-feedback__description text-l m-0">Оставьте свой телефон и мы перезвоним вам, <br class="d-none d-md-block d-lg-none d-xl-block">либо направьте обращение</p>
                                    </div>
                                    <div class="d-flex flex-column flex-md-row p-0 gap-3 gap-md-4">
                                        <a href="/feedback/" class="btn btn-outline-primary btn-lg-lg text-ls overflow-visible w-100 w-md-auto">Открыть чат</a>
                                        <a href="/callback/" class="btn btn-primary btn-lg-lg text-ls overflow-visible w-100 w-md-auto">Перезвоните мне</a>
                                    </div>
                                </div>
                                <picture class="pattern-bg pattern-bg--position-top z-1">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg" media="(max-width: 767px)">
                                    <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                                </picture>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
