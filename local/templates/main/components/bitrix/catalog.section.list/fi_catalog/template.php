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
<section class="section-layout bg-dark-30">
    <div class="container">
        <div class="row row-gap-4 row-gap-md-5 row-gap-lg-7">
            <?if(!empty($arResult["SECTIONS_UP_POSITION"])):?>
                <div class="card-offer-grid">
                    <?foreach ($arResult["SECTIONS_UP_POSITION"] as $key => $item):?>
                        <div class="card-product card-product--transparent <?if($key === 0):?>card-product--size-large<?endif;?> bg-dark-10 card-product--bg-white">
                            <div class="card-product__inner">
                                <div class="card-product__content">
                                    <h4 class="card-product__title"><?= $item["NAME"]?></h4>
                                    <p class="card-product__description m-0"><?= $item["DESCRIPTION"]?></p>
                                </div>
                                <?if (!empty($item["PICTURE"])) :?>
                                    <img class="card-product__img" src="<?= $item["PICTURE"]["SRC"]?>" alt="" loading="lazy">
                                <?endif;?>
                                <a class="btn btn-link btn-icon m-auto m-lg-0 py-2 py-lg-0" href="<?= $item["SECTION_PAGE_URL"] ?>">
                                    <span><?= Loc::getMessage("FL_CATALOG_LINK_DETAIL_TITLE")?></span>
                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            <?endif;?>
            <?if(!empty($arResult["SECTIONS_DOWN_POSITION_1"]) || !empty($arResult["SECTIONS_DOWN_POSITION_2"])):?>
                <div class="col-12">
                    <div class="d-flex flex-column cards-gap">
                        <div class="row cards-gutter">
                            <?foreach ($arResult["SECTIONS_DOWN_POSITION_1"] as $key => $item):?>
                                <div class="col-12 <?if($key <= 1):?>col-md-6<?endif;?> col-lg-4">
                                    <a class="card-product bg-dark-10 card-product--bg-white" href="<?= $item["SECTION_PAGE_URL"] ?>">
                                        <div class="card-product__inner">
                                            <div class="card-product__content mw-100">
                                                <h4 class="card-product__title"><?= $item["NAME"]?></h4>
                                            </div>
                                            <div class="card-product__footer">
                                                <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                                    <span><?= Loc::getMessage("FL_CATALOG_LINK_DETAIL_TITLE")?></span>
                                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                                    </svg>
                                                </span>
                                                <img class="ms-auto icon size-xxl" src="<?= $item["ICON_PATH"]?>" alt="" loading="lazy">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?endforeach;?>
                        </div>
                        <?if(!empty($arResult["SECTIONS_DOWN_POSITION_2"])):?>
                            <div class="collapse d-md-block" id="more-finorg">
                                <div class="row cards-gutter">
                                    <?foreach ($arResult["SECTIONS_DOWN_POSITION_2"] as $key => $item):?>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <a class="card-product bg-dark-10 card-product--bg-white" href="<?= $item["SECTION_PAGE_URL"] ?>">
                                                <div class="card-product__inner">
                                                    <div class="card-product__content mw-100">
                                                        <h4 class="card-product__title"><?= $item["NAME"]?></h4>
                                                    </div>
                                                    <div class="card-product__footer">
                                                        <span class="btn btn-link btn-icon d-none d-md-inline-flex">
                                                            <span><?= Loc::getMessage("FL_CATALOG_LINK_DETAIL_TITLE")?></span>
                                                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                              <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                                            </svg>
                                                        </span>
                                                        <img class="ms-auto icon size-xxl" src="<?= $item["ICON_PATH"]?>" alt="" loading="lazy">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?endforeach;?>
                                </div>
                            </div>
                        <?endif;?>
                    </div>
                </div>
            <?endif;?>
        </div>
    </div>
</section>
