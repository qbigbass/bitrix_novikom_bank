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
        <div class="col-12 position-relative z-1 d-flex flex-column align-items-start gap-5 gap-md-7">
            <?foreach($arResult['ITEMS'] as $arItem) {?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="card-product-list card-product-list--gap-smal overflow-hidden position-relative mh-100 h-auto bg-dark-10 w-100 py-6 py-sm-9 py-md-11 px-3 px-sm-4 px-md-6 pe-xxl-11" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="card-product-list__inner d-flex flex-column flex-lg-row align-items-start h-100 gap-3 gap-md-6 gap-xxl-11">
                        <div class="card-product-list__image-container mx-auto">
                            <img class="card-product-list__image" src="<?=$arItem['DISPLAY_PROPERTIES']['ICON_PREVIEW']['FILE_VALUE']['SRC']?>" alt="" loading="lazy">
                        </div>
                        <div class="card-product-list__content flex-column d-flex align-items-start gap-6 gap-xxl-9 w-100">
                            <div class="card-product-list__title-group d-flex flex-column gap-4 gap-lg-6">
                                <div class="tag card-product-list__tag">
                                    <span class="tag__content text-s fw-semibold"><?=$arItem['SECTION_TAG']?></span>
                                    <span class="tag__triangle">
                                      <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                      </svg>
                                    </span>
                                </div>
                                <h2 class="card-product-list__title text-break"><?=$arItem['NAME']?></h2>
                            </div>
                            <div class="card-product-list__condition-list w-100 w-lg-auto d-flex justify-content-between justify-content-lg-start flex-column flex-sm-row flex-wrap row-gap-4 row-gap-sm-6 row-gap-lg-6 row-gap-xxl-6 gap-xl-12 gap-xxl-16">
                                <?foreach($arItem['DISPLAY_PROPERTIES']['SHORT_CONDITIONS']['VALUE'] as $condition){?>
                                    <?=getStylizedCardCondition($condition)?>
                                <?}?>
                            </div>
                            <div class="d-flex flex-column flex-sm-row align-items-center gap-5 gap-sm-6 w-100">
                                <?if($arItem['DISPLAY_PROPERTIES']['SHOW_BUTTON']['VALUE'] == 'Y') {?>
                                    <a class="btn btn-tertiary btn-lg-lg card-product-list__button w-100 w-sm-auto" href="#">Оформить заявку</a>
                                <?}?>
                                <a class="btn btn-link btn-lg d-inline-flex gap-2 align-items-center card-product-list__button-more" href="<?=$arItem['DETAIL_PAGE_URL']?>">
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

