<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<? if (!empty($arResult['ITEMS'])) : ?>
    <section class="section-layout bg-dark-10">
        <div class="container">
            <div class="row row-gap-4 row-gap-md-5 row-gap-lg-7">
                <div class="card-offer-grid">
                    <? if ($arResult["UP_ITEMS"]) : ?>
                        <? $upIndex = 0; ?>
                        <? foreach ($arResult['ITEMS'] as $item) : ?>
                            <? $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
                            <? $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>

                            <? if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] === 'Сверху') : ?>
                                <a
                                    href="<?= $item['DETAIL_PAGE_URL'] ?>"
                                    class="card-product card-product--transparent <?= $upIndex == 0 ? 'card-product--size-large ' : '' ?>card-product--bg-white"
                                    id="<?= $this->GetEditAreaId($item['ID']); ?>">
                                    <div class="card-product__inner">
                                        <div class="card-product__content">
                                            <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                                            <? if (!empty($item["~PREVIEW_TEXT"])) : ?>
                                                <div class="rte m-0 gap-3 gap-lg-4">
                                                    <? if ($item["PREVIEW_TEXT_TYPE"] === "text") : ?>
                                                        <p><?= $item["~PREVIEW_TEXT"] ?></p>
                                                    <? else : ?>
                                                        <?= $item["~PREVIEW_TEXT"] ?>
                                                    <? endif; ?>
                                                </div>
                                            <? endif; ?>
                                        </div>
                                        <? if (!empty($item['DISPLAY_PROPERTIES']["ICON_TILE"]["FILE_VALUE"]["SRC"])) : ?>
                                            <img
                                                class="card-product__img"
                                                src="<?=$item['DISPLAY_PROPERTIES']["ICON_TILE"]["FILE_VALUE"]["SRC"]?>"
                                                alt="<?=$item['DISPLAY_PROPERTIES']["ICON_TILE"]["FILE_VALUE"]["DESCRIPTION"]?>"
                                                loading="lazy"
                                            >
                                        <? endif; ?>
                                        <span class="btn btn-link btn-icon m-auto m-lg-0 py-2 py-lg-0" >
                                <span>Подробнее</span>
                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                </svg>
                            </span>
                                    </div>
                                </a>
                                <? $upIndex++; ?>
                            <? endif; ?>
                        <? endforeach; ?>
                    <? endif; ?>
                </div>

                <? if ($arParams["SHOW_AD_INTERNET_BANK"] === "Y") : ?>
                <? $APPLICATION->IncludeFile(
                    '/local/php_interface/include/internet_bank_for_business.php',
                    [
                        'CLASS_COLOR_BTN' => 'btn-yellow',
                        'CLASS_COLOR_CARD' => 'card-service-app--bg-heavy-violet'
                    ]
                );?>
            <? endif; ?>

                <? if ($arResult['CENTER_ITEMS']) : ?>
                    <div class="col-12">
                    <div class="row cards-gutter">
                        <? $downIndex = 0; ?>
                        <? foreach ($arResult['ITEMS'] as $item) : ?>
                            <? if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] === 'По центру') : ?>
                                <?
                                $classList = match ($downIndex) {
                                    0, 1 => 'col-12 col-md-6 col-lg-4',
                                    default => 'col-12 col-lg-4',
                                };

                                if ($downIndex > 2) {
                                    $classList = 'col-12 col-md-6 col-xl-3';
                                }
                                ?>
                                <div class="<?= $classList ?>" id="<?= $this->GetEditAreaId($item['ID']); ?>">
                                    <a class="card-product card-product--transparent card-product--size-height-auto bg-white"
                                       href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                        <div class="card-product__inner">
                                            <div class="card-product__content mw-100">
                                                <h4 class="card-product__title"><?= $item['~NAME'] ?></h4>
                                                <p class="card-product__description m-0 mw-100"><?= $item['~PREVIEW_TEXT'] ?></p>
                                            </div>
                                            <div class="card-product__footer">
                                <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                <span>Подробнее</span>
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%"
                                         height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </span>
                                                <? if (!empty($item['DISPLAY_PROPERTIES']["ICON_TILE"]["FILE_VALUE"]["SRC"])) : ?>
                                                    <img class="ms-auto icon size-xxl" src="<?= $item['DISPLAY_PROPERTIES']["ICON_TILE"]["FILE_VALUE"]["SRC"] ?>" alt="" loading="lazy">
                                                <? endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <? $downIndex++; ?>
                            <? endif; ?>
                        <? endforeach; ?>
                    </div>
                </div>
                <? endif; ?>
            </div>
        </div>
    </section>
<? endif; ?>

<? if ($arParams["SHOW_AD_OPEN_ACC_NOVIKOM"] === "Y") : ?>
    <? $APPLICATION->IncludeFile('/local/php_interface/include/open_account_novikom.php'); ?>
<? endif; ?>

<? if (!empty($arResult['ITEMS']) && $arResult['DOWN_ITEMS']) : ?>
    <section class="section-layout">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="swiper slider-cards js-slider-cards" data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:2" data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['ITEMS'] as $item) : ?>
                            <? if (!empty($item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE']) && $item['DISPLAY_PROPERTIES']['LIST_POSITION']['VALUE'] === 'Снизу') : ?>
                                <div class="swiper-slide js-swiper-slide">
                                    <a class="card-product card-product--yellow bg-dark-10" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                        <div class="card-product__inner">
                                            <div class="card-product__content">
                                                <h4 class="card-product__title"><?= $item["~NAME"]?></h4>
                                                <p class="card-product__description m-0"><?= $item["~PREVIEW_TEXT"]?></p>
                                            </div>
                                            <?if (!empty($item['DISPLAY_PROPERTIES']["ICON_TILE"]["FILE_VALUE"]["SRC"])) :?>
                                                <img class="card-product__img" src="<?=$item['DISPLAY_PROPERTIES']["ICON_TILE"]["FILE_VALUE"]["SRC"]?>" alt="" loading="lazy">
                                            <?endif;?>
                                            <span class="btn btn-link btn-icon m-auto m-lg-0">
                                                <span>Узнать больше</span>
                                                <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <? endif; ?>
                        <? endforeach;?>
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
    </div>
</section>
<? endif; ?>
