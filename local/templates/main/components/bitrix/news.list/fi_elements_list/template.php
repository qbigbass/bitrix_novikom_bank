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
use Bitrix\Main\Localization\Loc;
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
        <section
            class="section-layout <?= $item["SECTION_BACKGROUND_CLASS_STYLE"]?> <?= $item["SECTION_BORDER_CLASS_STYLE"]?>"
            id="<?= $item['CODE']?>"
        >
            <div class="container">
                <?if(!empty($item['DETAIL_TEXT']) && !empty($item["PREVIEW_PICTURE"]["SRC"])): ?>
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
                        <!-- Карточки продуктов -->
                        <?if(!empty($item["CARD_PRODUCTS"])):?>
                            <div class="row cards-gutter">
                                <?foreach ($item["CARD_PRODUCTS"] as $product):?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                    <a class="card-product bg-dark-10 bg-dark-30" href="#">
                                        <div class="card-product__inner">
                                            <div class="card-product__content mw-100">
                                                <h4 class="card-product__title"><?= $product["TITLE"]?></h4>
                                                <p class="card-product__description m-0 mw-100"><?= $product["TEXT"]?></p>
                                            </div>
                                            <div class="card-product__footer">
                                                <img class="icon size-xxl" src="<?= $product["PICTURE"]?>" alt="" loading="lazy">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?endforeach;?>
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
                                                            <?if(!empty($slider["TEXT"])):?>
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
                                                        <?if(!empty($item["QUOTES"]["POS_0"]["TITLE"])):?>
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
                        <!-- Блок с бенефитами -->
                        <?if(!empty($item["BENEFITS"])):?>
                            <div class="col-12">
                                <div class="row row-gap-6 gx-xl-6 px-lg-6">
                                    <?foreach ($item["BENEFITS"] as $benefit):?>
                                        <div class="col-12 col-md-6">
                                            <div class="benefit d-flex gap-3 flex-column">
                                                <img class="icon size-xxl" src="<?= $benefit["PICTURE"]?>" alt="icon" loading="lazy">
                                                <div class="benefit__content d-flex flex-column gap-3">
                                                    <h4 class="benefit__title"><?= $benefit["TITLE"]?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?endforeach;?>
                                </div>
                            </div>
                        <?endif;?>
                        <!-- Блок со второй цитатой -->
                        <?if(!empty($item["QUOTES"]["POS_1"])):?>
                            <div class="col-12">
                                <div class="col-12">
                                    <div class="polygon-container js-polygon-container">
                                        <div class="polygon-container__content">
                                            <div class="helper <?if(preg_match('/bg-dark/', $item["SECTION_CLASS_STYLE"])):?>bg-white<?else:?>bg-dark-30<?endif;?>">
                                                <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                    <img class="helper__image w-auto float-end" src="<?= $item["QUOTES"]["POS_0"]["PICTURE"] ?>" alt="Обратите внимание" loading="lazy">
                                                    <div class="helper__content text-l">
                                                        <?if(!empty($item["QUOTES"]["POS_1"]["TITLE"])):?>
                                                            <h4 class="mb-3"><?= $item["QUOTES"]["POS_1"]["TITLE"] ?></h4>
                                                        <?endif;?>
                                                        <p class="m-0"><?= $item["QUOTES"]["POS_1"]["TEXT"] ?></p>
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
                            <?foreach ($item["TEXT_ACCORDION"] as $elemId => $arData):?>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button
                                            class="accordion-button"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#<?= $elemId?>"
                                            aria-expanded
                                            aria-controls="<?= $elemId?>"
                                        >
                                            <span class="fw-bold h4"><?= $arData["TITLE"]?></span>
                                        </button>
                                    </div>
                                    <div class="accordion-collapse collapse <?if($i === 0):?>show<?endif?>" id="<?= $elemId?>" data-bs-parent="#accordion-trust-management">
                                        <div class="accordion-body">
                                            <div class="rte rte--accordion">
                                                <?= $arData["TEXT"]?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?$i++;?>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                        <!-- Блок со стратегиями -->
                        <?if(!empty($item["STRATEGY_TABS"]) && !empty($item["STRATEGY_ITEMS"])):?>
                            <div class="col-12">
                                <div class="tabs-panel js-tabs-slider overflow-hidden position-relative pe-1 pe-lg-0">
                                    <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                                        <span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev d-flex align-items-center justify-content-start px-1 z-3 position-absolute swiper-button-disabled">
                                            <span class="icon size-s">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="tabs-panel__navigation-item js-tabs-slider-navigation-next d-flex align-items-center justify-content-end px-1 z-3 position-absolute swiper-button-disabled">
                                            <span class="icon size-s">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                                        <?foreach ($item["STRATEGY_TABS"] as $propId => $data):?>
                                            <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                                <button
                                                    class="tabs-panel__list-item-link nav-link bg-transparent <?if($data["ACTIVE"] === "Y"):?>active<?endif;?>"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#<?= $propId ?>"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="<?= $propId ?>"
                                                    aria-selected="true"><?= $data["TITLE"] ?>
                                                </button>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content mt-4 mt-md-6 mt-lg-7">
                                <?foreach ($item["STRATEGY_ITEMS"] as $propListId => $arStrategies):?>
                                    <div class="tab-pane fade show <?if($item["STRATEGY_TABS"][$propListId]["ACTIVE"] === "Y"):?>active<?endif;?>"
                                         id="<?= $propListId?>"
                                         aria-labelledby="limits"
                                         tabindex="0"
                                         role="tabpanel"
                                    >
                                        <div class="d-flex flex-column gap-4 gap-md-5 gap-lg-7">
                                            <?foreach ($arStrategies as $elemId => $arStrategy):?>
                                                <div class="card overflow-hidden position-relative">
                                                    <div class="card__inner d-flex flex-column flex-lg-row-reverse align-items-start gap-4 gap-md-5 gap-lg-6">
                                                        <?if(!empty($arStrategy["PICTURE"])):?>
                                                            <div class="card__image-container flex-shrink-0 mx-auto">
                                                                <img class="card__image" src="<?= $arStrategy["PICTURE"]?>" alt="" loading="lazy">
                                                            </div>
                                                        <?endif;?>
                                                        <div class="card__content flex-column d-flex align-items-start gap-4 gap-md-6">
                                                            <?if(!empty($arStrategy["NAME"]) || !empty($arStrategy["PREVIEW_TEXT"])):?>
                                                                <div class="card__title-group d-flex flex-column gap-4 gap-lg-6">
                                                                    <h2 class="card__title text-break"><?= $arStrategy["NAME"]?></h2>
                                                                    <p class="text-l m-0"><?= $arStrategy["PREVIEW_TEXT"]?></p>
                                                                </div>
                                                            <?endif;?>
                                                            <?if(!empty($arStrategy["RISK"]) || !empty($arStrategy["PERIOD"]) || !empty($arStrategy["PROFIT"])):?>
                                                                <div class="card__condition-list d-flex flex-column flex-md-row flex-wrap gap-4 column-gap-md-11 column-gap-lg-16 row-gap-lg-6">
                                                                    <?if(!empty($arStrategy["RISK"])):?>
                                                                        <div class="card__condition violet-100 d-flex flex-column gap-2">
                                                                            <div class="d-inline-flex flex-nowrap align-items-baseline gap-1">
                                                                                <span class="h4"><?= $arStrategy["RISK"]?></span>
                                                                            </div>
                                                                            <span class="text-m dark-70"><?= Loc::getMessage("STRATEGY_ITEM_RISK")?></span>
                                                                        </div>
                                                                    <?endif;?>
                                                                    <?if(!empty($arStrategy["PERIOD"])):?>
                                                                        <div class="card__condition violet-100 d-flex flex-column gap-2">
                                                                            <div class="d-inline-flex flex-nowrap align-items-baseline gap-1">
                                                                                <span class="text-number-ml fw-bold"><?= $arStrategy["PERIOD"]?></span>
                                                                            </div>
                                                                            <span class="text-m dark-70"><?= Loc::getMessage("PERIOD")?></span>
                                                                        </div>
                                                                    <?endif;?>
                                                                    <?if(!empty($arStrategy["PROFIT"])):?>
                                                                        <div class="card__condition violet-100 d-flex flex-column gap-2">
                                                                            <div class="d-inline-flex flex-nowrap align-items-baseline gap-1">
                                                                                <span class="text-l fw-semibold">до</span>
                                                                                <span class="text-number-ml fw-bold"><?= $arStrategy["PROFIT"]?></span>
                                                                                <span class="text-l fw-semibold">в год</span>
                                                                            </div>
                                                                            <span class="text-m dark-70"><?= Loc::getMessage("STRATEGY_ITEM_PROFIT")?></span>
                                                                        </div>
                                                                    <?endif;?>
                                                                </div>
                                                            <?endif;?>
                                                        </div>
                                                    </div>
                                                    <?if(!empty($arStrategy["REQUIREMENTS"]) ||
                                                        !empty($arStrategy["RATES"]) ||
                                                        !empty($arStrategy["OTHERS"]) ||
                                                        !empty($arStrategy["FILE"])
                                                    ):
                                                        ?>
                                                        <div class="collapse" id="<?= $elemId?>">
                                                            <div class="d-flex flex-column gap-4 gap-md-6 gap-lg-7 mt-4 mt-md-6 mt-lg-7">
                                                                <div class="d-flex flex-column gap-4">
                                                                    <div class="table-tab cell-2">
                                                                        <div class="table-tab__body">
                                                                            <div class="table-tab__row">
                                                                                <div class="table-tab__cell text-l fw-semibold dark-70"><?= Loc::getMessage("STRATEGY_ITEM_TARGET")?></div>
                                                                                <div class="table-tab__cell text-l"><?= $arStrategy["TARGET"]?></div>
                                                                            </div>
                                                                            <div class="table-tab__row">
                                                                                <div class="table-tab__cell text-l fw-semibold dark-70"><?= Loc::getMessage("STRATEGY_ITEM_CONTROL_METHOD")?></div>
                                                                                <div class="table-tab__cell text-l"><?= $arStrategy["CONTROL_METHOD"]?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?if(!empty($arStrategy["REQUIREMENTS"])):?>
                                                                    <div class="d-flex flex-column gap-4">
                                                                        <div class="h4"><?= Loc::getMessage("STRATEGY_ITEM_TITLE_REQUIREMENTS")?></div>
                                                                        <div class="table-tab cell-2">
                                                                            <div class="table-tab__body">
                                                                                <?foreach ($arStrategy["REQUIREMENTS"] as $item):?>
                                                                                    <?foreach ($item as $k => $v):?>
                                                                                        <div class="table-tab__row">
                                                                                            <div class="table-tab__cell text-l fw-semibold dark-70"><?= $k?></div>
                                                                                            <div class="table-tab__cell text-l"><?= $v?></div>
                                                                                        </div>
                                                                                    <?endforeach;?>
                                                                                <?endforeach;?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>
                                                                <?if(!empty($arStrategy["RATES"])):?>
                                                                    <div class="d-flex flex-column gap-4">
                                                                        <div class="h4"><?= Loc::getMessage("STRATEGY_ITEM_TITLE_RATES")?></div>
                                                                        <div class="table-tab cell-2">
                                                                            <div class="table-tab__body">
                                                                                <?foreach ($arStrategy["RATES"] as $item):?>
                                                                                    <?foreach ($item as $k => $v):?>
                                                                                        <div class="table-tab__row">
                                                                                            <div class="table-tab__cell text-l fw-semibold dark-70"><?= $k?></div>
                                                                                            <div class="table-tab__cell text-l"><?= $v?></div>
                                                                                        </div>
                                                                                    <?endforeach;?>
                                                                                <?endforeach;?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>
                                                                <?if(!empty($arStrategy["OTHERS"])):?>
                                                                    <div class="d-flex flex-column gap-4">
                                                                        <div class="table-tab cell-2">
                                                                            <div class="table-tab__body">
                                                                                <div class="table-tab__row">
                                                                                    <div class="table-tab__cell text-l fw-semibold dark-70"><?= Loc::getMessage("STRATEGY_ITEM_TITLE_OTHERS")?></div>
                                                                                    <div class="table-tab__cell text-l">
                                                                                        <ul class='list list--size-l'>
                                                                                            <?foreach ($arStrategy["OTHERS"] as $enumId => $value):?>
                                                                                                <li><?= $value?></li>
                                                                                            <?endforeach;?>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>
                                                                <?if(!empty($arStrategy["FILE"])):?>
                                                                    <div class="d-flex flex-column gap-4">
                                                                        <div class="h4"><?= Loc::getMessage("STRATEGY_ITEM_TITLE_FILE")?></div>
                                                                        <div class="link-list">
                                                                            <a
                                                                                class="d-flex flex-column gap-1 py-3 document-download text-m"
                                                                                href="<?= $arStrategy["FILE"]["PATH"]?>"
                                                                                download="<?= $arStrategy["FILE"]["NAME"]?>"
                                                                            ><?= $arStrategy["FILE"]["NAME"]?>
                                                                                <div class="d-flex gap-1 align-items-center">
                                                                                    <div class="document-download__file caption-m dark-70">
                                                                                        <span class="document-download__date-time">
                                                                                            <?= $arStrategy["DATE_MODIFIED"]?>
                                                                                        </span>
                                                                                        <span class="document-download__file-type"><?= $arStrategy["FILE"]["EXTENSION"]?></span>
                                                                                    </div>
                                                                                    <span class="icon size-s text-primary">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                                                                        </svg>
                                                                                    </span>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex card__button-wrap mt-4 mt-md-5 mt-lg-0">
                                                            <a class="btn btn-outline-primary btn-icon w-100 w-md-auto mt-lg-7 card__button-more"
                                                               data-bs-toggle="collapse"
                                                               href="#<?= $elemId?>"
                                                               role="button"
                                                               aria-expanded="false"
                                                               aria-controls="<?= $elemId?>"
                                                            >
                                                                <span><?= Loc::getMessage("STRATEGY_TITLE_MORE_DETAILS")?></span>
                                                                <span><?= Loc::getMessage("STRATEGY_TITLE_HIDE_DETAILS")?></span>
                                                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    <?endif;?>
                                                    <?if(!empty($arStrategy["BENEFITS"])):?>
                                                        <div class="row row-gap-6 gx-xl-6">
                                                            <?foreach ($arStrategy["BENEFITS"] as $propValueId => $arData):?>
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="benefit d-flex gap-3 flex-column flex-column flex-md-row align-items-md-center gap-md-4 gap-lg-6">
                                                                        <?foreach ($arData as $title => $filePath):?>
                                                                            <img class="icon size-xl" src="<?= $filePath?>" alt="icon" loading="lazy">
                                                                            <div class="benefit__content d-flex flex-column gap-3">
                                                                                <h4 class="benefit__title"><?= $title?></h4>
                                                                            </div>
                                                                        <?endforeach;?>
                                                                    </div>
                                                                </div>
                                                            <?endforeach;?>
                                                        </div>
                                                    <?endif;?>
                                                </div>
                                            <?endforeach;?>
                                        </div>
                                    </div>
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
