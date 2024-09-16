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
<?foreach ($arResult['ITEMS'] as $loan) {?>
    <div class="product-card">
        <div class="product-card__image-container">
            <img src="<?=$loan['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']?>" class="product-card__image">
        </div>
        <div class="product-card__content">
            <div class="product-card__head">
                <div class="product-card__title headline-1"><?=$loan['NAME']?></div>
                <div class="product-card__description body-l-light"><?=$loan['PREVIEW_TEXT']?></div>
            </div>
            <div class="product-card__conditions-box">
                <div class="product-card__conditions is-big-gap">
                    <?foreach($loan['DISPLAY_PROPERTIES']['PREVIEW_SHORT_CONDITIONS']['DISPLAY_VALUE'] as $condition) {?>
                        <div class="text-indicating-benefits">
                            <div class="text-indicating-benefits-head">
                                <span class="body-l-heavy"><?=$condition['SMALL_TEXT']?></span>
                                <span class="number-l-heavy"><?=$condition['MAIN_TEXT']?></span>
                            </div>
                            <div class="body-m-light dark-70"><?=$condition['CONDITION_NAME']?></div>
                        </div>
                    <?}?>
                </div>
            </div>
            <div class="product-card__buttons">
                <button type="button" class="a-button a-button--lm a-button--green">Оформить заявку</button>
                <a href="<?=$loan['DETAIL_PAGE_URL']?>" class="a-button a-button--lm a-button--primary a-button--link a-button--text">
                    Подробнее
                    <span class="a-icon a-button__icon">
                        <svg>
                            <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
<?}?>
