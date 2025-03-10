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
use Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);
$adTypes = $arResult["ITEMS"]['TYPE_AD'];
$url = $APPLICATION->GetCurPage(false);
?>

<form name="<?=$arResult['FILTER_NAME'] . '_form'?>" action="<?=$arResult['FORM_ACTION']?>" method="get">
    <div class="d-flex flex-column flex-md-row gap-4 gap-md-3 gap-lg-6 align-items-start align-items-md-center justify-content-lg-between">
        <?if (!empty($adTypes['VALUES'])) :?>
            <div class="d-lg-none w-100 w-md-50">
                <select class="form-select form-select--size-small js-select" id="select1" aria-label="Подсказка" onchange="setFilter(this)">
                    <option <?=(!isset($arParams['SET_FILTER'])) ? 'selected' : '';?> value="<?=$url?>">
                        <?=Loc::getMessage('FILTER_ALL_TITLE')?>
                    </option>
                    <?foreach ($adTypes['VALUES'] as $type):?>
                        <option <?=($type['CHECKED']) ? 'selected' : '';?> value="<?=$url?>?<?=$type['CONTROL_NAME']?>=<?=$type['HTML_VALUE']?>&set_filter=Y">
                            <?=$type['VALUE'];?>
                        </option>
                    <?endforeach;?>
                </select>
            </div>
            <div class="tabs-panel js-tabs-slider overflow-hidden position-relative tabs-panel--small w-auto d-none d-lg-flex w-auto d-none d-lg-flex">
                <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100">
                    <span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev h-100 d-flex align-items-center justify-content-start px-1 z-3 position-absolute start-0 top-0">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                            </svg>
                        </span>
                    </span>
                    <span class="tabs-panel__navigation-item js-tabs-slider-navigation-next h-100 d-flex align-items-center justify-content-end px-1 z-3 position-absolute end-0 top-0">
                        <span class="icon size-m">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                            </svg>
                        </span>
                    </span>
                </div>
                <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                    <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                        <a class="tabs-panel__list-item-link nav-link bg-transparent <?=(!isset($arParams['SET_FILTER'])) ? 'active' : '';?>" href="<?=$url?>">
                            <?=Loc::getMessage('FILTER_ALL_TITLE')?>
                        </a>
                    </li>
                    <?foreach ($adTypes['VALUES'] as $type):?>
                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                            <a class="tabs-panel__list-item-link nav-link bg-transparent <?=($type['CHECKED']) ? 'active' : ''?>" href="<?=$url?>?<?=$type['CONTROL_NAME']?>=<?=$type['HTML_VALUE']?>&set_filter=Y">
                                <?=$type['VALUE']?>
                            </a>
                        </li>
                    <?endforeach;?>
                </ul>
            </div>
        <?endif;?>
        <?//TODO календарь не работает?>
        <?if ($arParams['SHOW_CALENDAR'] === 'Y') :?>
            <div class="position-relative w-100 w-md-50 w-lg-240w">
                <input
                    class="js-date js-date--range js-date--today-max w-100 form-control"
                    id="date1"
                    type="text"
                    name="date1"
                    placeholder="Показать за период"
                    value=""
                >
                <span class="position-absolute top-0 end-0 violet-70 text-m p-2 px-3 pe-none">
                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                    </svg>
                </span>
            </div>
        <? endif; ?>
    </div>
</form>
