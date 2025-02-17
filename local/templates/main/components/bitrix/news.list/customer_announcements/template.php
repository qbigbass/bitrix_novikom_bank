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
$parentSection = $component->getParent()?->arParams['SECTION_URL'] ?? ($component->getParent()?->arParams['SEF_FOLDER'] ?? '/');
$classColorBg = $arParams["CLASS_COLOR_BG"] ?? "bg-dark-10";
$pathImgBg = $arParams["PATH_IMG_BG"] ?? "/frontend/dist/img/patterns/section-2/pattern-light";
?>
<? if (!empty($arResult["ITEMS"])) : ?>
    <section class="section-layout <?= $classColorBg ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xxl-6 d-flex flex-column gap-6 gap-lg-7">
                    <a class="h3 d-flex align-items-center ps-lg-6" href="/support/announcements_for_clients<?= $parentSection ?>">
                        <span><?= $arResult["NAME"] ?></span>
                        <span class="icon size-m violet-100 ms-auto ms-md-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </span>
                    </a>
                    <div class="ps-lg-6 mt-xxl-auto mw-100">
                        <div class="swiper js-announcement-slider">
                            <div class="swiper-wrapper">
                                <? foreach ($arResult["ITEMS"] as $item) { ?>
                                    <?
                                    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                                    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                    ?>
                                    <div class="swiper-slide js-announcement-slide" id="<?=$this->GetEditAreaId($item['ID']);?>">
                                        <a class="announcement" href="<?= $item["DETAIL_PAGE_URL"] ?>" tabIndex="-1">
                                            <span class="dark-70"><?= date('d.m.Y', strtotime($item["TIMESTAMP_X"])) ?></span>
                                            <span class="dark-100"><?= $item["NAME"] ?></span>
                                            <span class="icon size-m d-none d-md-inline-block ms-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-arrow-right"></use>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                <? } ?>
                            </div>
                            <div class="slider-controls js-swiper-controls mt-3 mt-md-4">
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
                        </div>
                    </div>
                </div>
                <? if (!empty($arParams["SHOW_BLOCK_ABOUT_BANK"])) : ?>
                    <div class="col-12 col-xxl-6 mt-6 mt-xxl-0">
                    <a class="card-link h3 d-lg-none" href="/about/">О банке
                        <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </a>
                    <div class="card-about-bank d-none d-lg-flex">
                        <div class="card-about-bank__col d-flex flex-column gap-6">
                            <a class="h3" href="/about/">О банке
                                <svg class="icon size-m blue-100" xmlns="http://www.w3.org/2000/svg" width="100%"
                                     height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </a>
                            <div class="d-flex flex-column">
                                <span class="violet-100 fw-semibold text-number-m fw-bold">30 лет</span>
                                <p class="card-about-bank__description text-s fw-semibold">успешной работы в&nbsp;реальном
                                    секторе российской<br class="d-xxl-none">
                                    экономики
                                </p>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="violet-100 fw-semibold text-number-m fw-bold">19,4 млн</span>
                                <p class="card-about-bank__description text-s fw-semibold">рекордная чистая прибыль<br>за&nbsp;2022&nbsp;г
                                </p>
                            </div>
                        </div>
                        <div class="card-about-bank__col d-flex flex-column">
                            <img src="/frontend/dist/img/top.svg" alt="Топ"
                                 width="138" height="54"
                                 loading="lazy">
                            <img src="/frontend/dist/img/top-20.svg" alt="20" width="138" height="144" loading="lazy">
                            <p class="card-about-bank__description text-s fw-semibold mt-auto">по&nbsp;величине капитала,
                                объему активов<br class="d-xxl-none">
                                и&nbsp;корпоративных кредитов
                            </p>
                        </div>
                        <picture class="pattern-bg card-about-bank__pattern">
                            <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                    media="(max-width: 767px)">
                            <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                    media="(max-width: 1199px)">
                            <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                        </picture>
                    </div>
                </div>
                <? endif; ?>
            </div>
        </div>
        <? if (!empty($pathImgBg)) : ?>
            <picture class="pattern-bg pattern-bg--hide-mobile">
                <source srcset="<?= $pathImgBg ?>-s.svg" media="(max-width: 767px)">
                <source srcset="<?= $pathImgBg ?>-m.svg" media="(max-width: 1199px)">
                <img src="<?= $pathImgBg ?>-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        <? endif; ?>
    </section>
<? endif; ?>
