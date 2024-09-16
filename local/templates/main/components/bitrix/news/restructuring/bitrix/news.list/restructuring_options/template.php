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
<div class="grid-variants-layout">
    <?foreach($arResult['ITEMS'] as $item) {?>
        <div class="grid-variant-card">
            <div class="benefit-card benefit-card--white">
                <div class="benefit-card__title">
                    <div class="headline-3"><?=$item['NAME']?></div>
                </div>
                <div class="benefit-card__description body-m-light"></div>
                <div class="benefit-card__footer">
                    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="a-button a-button--m a-button--primary a-button--link a-button--text">Подробнее
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
</div>

