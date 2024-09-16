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
<div class="a-tab-swiper swiper js-a-tab-swiper">
    <div class="a-tab-swiper-wrapper swiper-wrapper js-a-tab-swiper-wrapper">
        <?foreach($arResult as $menuItem) {?>
            <?$menuItem['LINK'] = str_replace('index.php', '', $menuItem['LINK'])?>
            <a href="<?=$menuItem['LINK']?>" type="button" data-value="0" class="a-tab a-tab--lm a-tab--primary swiper-slide js-a-tab<?=($menuItem['SELECTED']) ? ' is-active' : ''?>">
                <?=$menuItem['TEXT']?>
            </a>
        <?}?>
    </div>
    <button class="a-tab-nav-button js-a-tab-prev is-prev">
        <span class="a-icon size-m">
            <svg>
                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-left"></use>
            </svg>
        </span>
    </button>
    <button class="a-tab-nav-button js-a-tab-next is-next">
        <span class="a-icon size-m">
            <svg>
                <use  xlink:href="/frontend/build/assets/svg-sprite.svg#icon-chevron-right"></use>
            </svg>
        </span>
    </button>
</div>

