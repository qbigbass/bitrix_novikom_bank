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
<div class="a-tabs a-tabs--component js-a-tabs">
    <div class="a-tab-swiper swiper js-a-tab-swiper">
        <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">
            <?$isActiveDefault = (!isset($_GET['set_filter'])) ? ' is-active' : '';?>
            <a href="<?=$arResult['FILTER_URL']?>" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab<?=$isActiveDefault?>">
                Все варианты
            </a>
            <?foreach($arResult["ITEMS"][44]["VALUES"] as $arValue) {?>
                <?$isActive = ($arValue['CHECKED']) ? ' is-active' : '';?>
                <a href="<?=$arResult['FILTER_URL']?>?<?=$arValue['CONTROL_NAME']?>=Y&set_filter=Y" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab<?=$isActive?>">
                    <?=$arValue['VALUE']?>
                </a>
            <?}?>
        </div>
        <button class="a-tab-nav-button js-a-tab-prev is-prev">
            <span class="a-icon size-m">
                <svg>
                    <use xlink:href="assets/svg-sprite.svg#icon-chevron-left"></use>
                </svg>
            </span>
        </button>
        <button class="a-tab-nav-button js-a-tab-next is-next">
            <span class="a-icon size-m">
                <svg>
                    <use xlink:href="assets/svg-sprite.svg#icon-chevron-right"></use>
                </svg>
            </span>
        </button>
    </div>
</div>
