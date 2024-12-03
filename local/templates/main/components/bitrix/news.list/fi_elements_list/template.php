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

<?if(!empty($arResult["ITEMS"])):?>
    <?if ($arResult["SHOW_UP_MENU"] && !empty($arResult["UP_MENU"])):?>
        <div class="anchor-panel bg-white sticky-lg-top">
            <div class="container d-flex py-3 overflow-auto">
                <div class="d-flex flex-nowrap flex-md-wrap gap-4 column-gap-md-5 row-gap-md-4 column-gap-lg-6">
                    <?foreach ($arResult["UP_MENU"] as $item):?>
                        <a class="anchor-item text-l text-nowrap" href="#<?= $item["CODE"]?>"><?= $item["TITLE"]?></a>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    <?endif;?>
    <?foreach ($arResult["ITEMS"] as $item):?>
        <section class="section-layout <?= $item["SECTION_CLASS_STYLE"]?>" id="<?= $item['CODE']?>">
            <div class="container">
                <?if($item['DETAIL_TEXT'] !== "" && $item["PREVIEW_PICTURE"]["SRC"] !== ""): ?>
                    <!-- Блок анонса и детальной картинки -->
                    <div class="banner-product-info ps-lg-6">
                        <div class="banner-product-info__header">
                            <h3><?= $item['NAME']?></h3>
                        </div>
                        <div class="banner-product-info__body">
                            <p class="text-l"><?= $item['DETAIL_TEXT']?></p>
                        </div>
                        <div class="banner-product-info__image">
                            <div class="polygon-container js-polygon-container">
                                <div class="polygon-container__content">
                                    <img src="<?= $item["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                                </div>
                                <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                        <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                <?else:?>
                    <div class="row row-gap-6 row-gap-lg-11">
                        <?if($item["CODE"] !== "empty_title"):?>
                            <div class="col-12">
                                <h2 class="mb-3 mb-md-4 px-lg-6"><?= $item['NAME']?></h2>
                                <p class="text-l px-lg-6 m-0"><?= $item['PREVIEW_TEXT']?></p>
                            </div>
                        <?endif;?>
                        <!-- Слайдер с карточками -->
                        <?if(!empty($item["SLIDERS"])):?>
                            <div class="col-12">
                                <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:3" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                                    <div class="swiper-wrapper">
                                        <?foreach ($item["SLIDERS"] as $slider):?>
                                            <div class="swiper-slide js-swiper-slide">
                                                <div class="card-benefit d-inline-flex px-3 px-sm-5 px-lg-6 p-4 p-sm-5 p-lg-6 w-100 bg-dark-30 card-benefit--type-img">
                                                    <div class="card-benefit__inner d-flex flex-column gap-6 gap-lg-7 justify-content-between h-100 w-100">
                                                        <div class="card-benefit__content d-flex flex-column gap-4">
                                                            <img class="card-benefit__image" src="<?= $slider["PICTURE"]?>" alt="<?= $slider["TITLE"]?>" loading="lazy">
                                                            <h4 class="card-benefit__title"><?= $slider["TITLE"]?></h4>
                                                            <?if($slider["TEXT"] !== ""):?>
                                                                <p class="card-benefit__description m-0 text-m"><?= $slider["TEXT"]?></p>
                                                            <?endif;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?endforeach;?>
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
                        <?endif;?>
                        <!-- Блок с текстом в виде списка -->
                        <?if(!empty($item["PROPERTIES"]["TEXT_LIST"]["VALUE"])):?>
                            <div class="col-12 px-lg-6">
                                <ul class="list list--md-col2 list--size-l">
                                    <?foreach ($item["PROPERTIES"]["TEXT_LIST"]["VALUE"] as $value):?>
                                        <li><?= $value ?></li>
                                    <?endforeach;?>
                                </ul>
                            </div>
                        <?endif;?>
                        <!-- Блок с первой цитатой -->
                        <?if(!empty($item["QUOTES"]["POS_0"])):?>
                            <div class="col-12">
                                <div class="col-12">
                                    <div class="polygon-container js-polygon-container">
                                        <div class="polygon-container__content">
                                            <div class="helper <?if(preg_match('/bg-dark/', $item["SECTION_CLASS_STYLE"])):?>bg-white<?else:?>bg-dark-30<?endif;?>">
                                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                    <img class="helper__image w-auto float-end" src="<?= $item["QUOTES"]["POS_0"]["PICTURE"] ?>" alt="Обратите внимание" loading="lazy">
                                                    <div class="helper__content text-l">
                                                        <?if($item["QUOTES"]["POS_0"]["TITLE"]):?>
                                                            <h4 class="mb-3"><?= $item["QUOTES"]["POS_0"]["TITLE"] ?></h4>
                                                        <?endif;?>
                                                        <p class="m-0"><?= $item["QUOTES"]["POS_0"]["TEXT"] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="polygon-container__polygon js-polygon-container-polygon violet-100">
                                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg" height="208.0001220703125" width="1345.5999755859375">
                                                <polygon points="2,2 1344,2 1344,166 1304,206 2,206" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?endif;?>
                        <!-- Блок с контентом в аккордионе -->
                        <?if(!empty($item["TEXT_ACCORDION"])):?>
                            <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-trust-management">
                            <?$i = 0;?>
                            <?foreach ($item["TEXT_ACCORDION"] as $elemId => $item):?>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $elemId?>" aria-expanded aria-controls="1">
                                            <span class="fw-bold h4"><?= $item["TITLE"]?></span>
                                        </button>
                                    </div>
                                    <div class="accordion-collapse collapse <?if($i === 0):?>show<?endif?>" id="<?= $elemId?>" data-bs-parent="#accordion-trust-management">
                                        <div class="accordion-body">
                                            <?= $item["TEXT"]?>
                                        </div>
                                    </div>
                                </div>
                                <?$i++;?>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                    </div>
                <?endif;?>
            </div>
            <picture class="pattern-bg pattern-bg--position-top">
                <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
                <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)">
                <img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
            </picture>
        </section>
    <?endforeach;?>
    <?if ($arResult["SHOW_BLOCK_CONTACT"]):?>
        <!-- Блок "Контакты" -->
        <? showBlockContact(); ?>
        <?= $GLOBALS["BLOCK_CONTACT"]; ?>
    <?endif;?>
<?endif;?>
