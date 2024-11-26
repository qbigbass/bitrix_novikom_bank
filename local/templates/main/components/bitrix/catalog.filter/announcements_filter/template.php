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

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

$context = Application::getInstance()->getContext();
$request = $context->getRequest();
$typeSelected = $request["arrAdFilter_pf"]["TYPE_AD"];
$setFilter = $request["set_filter"];
$delFilter = $request["del_filter"];

if ($delFilter) {
    $typeSelected = 0;
}

?>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
    <?foreach($arResult["ITEMS"] as $arItem):
        if(array_key_exists("HIDDEN", $arItem)):
            echo $arItem["INPUT"];
        endif;
    endforeach;?>
    <div class="d-flex flex-column flex-md-row gap-4 gap-md-3 gap-lg-6 align-items-start align-items-md-center justify-content-lg-between">
        <div class="d-lg-none w-100 w-md-50">
            <select class="form-select form-select--size-small js-select" id="select1" aria-label="Подсказка" onchange="setFilter(this)">
                <?foreach ($arResult["ITEMS"] as $item):?>
                    <option
                        <?if((int)$typeSelected === 0):?>selected<?endif;?>
                        value="#to-all"
                        data-clearFilter="Y"
                        data-filter="<?=$APPLICATION->GetCurPage(false)?>"
                    ><?=Loc::getMessage('FILTER_ALL_TITLE')?></option>
                    <?foreach ($item["LIST"] as $xmlId => $value):?>
                        <?if ((int)$xmlId > 0):?>
                            <option
                                <?if((int)$typeSelected === (int)$xmlId):?>selected<?endif;?>
                                value=""
                                data-setFilter="Y"
                                data-filter="<?=$APPLICATION->GetCurPage(false)?>?<?= $item["INPUT_NAME"] ?>=<?= $xmlId ?>&set_filter=Y"
                            ><?= $value ?></option>
                        <?endif;?>
                    <?endforeach;?>
                <?endforeach;?>
            </select>
        </div>
        <div class="tabs-panel js-tabs-slider overflow-hidden position-relative px-1 tabs-panel--small w-auto d-none d-lg-flex w-auto d-none d-lg-flex">
            <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100"><span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev h-100 d-flex align-items-center justify-content-start px-1 z-3 position-absolute start-0 top-0"><span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                      <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                                    </svg></span></span><span class="tabs-panel__navigation-item js-tabs-slider-navigation-next h-100 d-flex align-items-center justify-content-end px-1 z-3 position-absolute end-0 top-0"><span class="icon size-m">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                      <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                                    </svg></span></span></div>
            <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">
                <?foreach ($arResult["ITEMS"] as $item):?>
                    <?if(!empty($item["LIST"])):?>
                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                            <a
                                class="tabs-panel__list-item-link nav-link bg-transparent <?if((int)$typeSelected === 0):?>active<?endif;?>"
                                aria-current="page"
                                href="#"
                                data-filter="<?=$APPLICATION->GetCurPage(false)?>"
                                data-clearFilter="Y"
                            ><?=Loc::getMessage('FILTER_ALL_TITLE')?></a>
                        </li>
                        <?foreach ($item["LIST"] as $xmlId => $value):?>
                            <?if ((int)$xmlId > 0):?>
                                <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                    <a
                                        class="tabs-panel__list-item-link nav-link bg-transparent <?if((int)$typeSelected === (int)$xmlId):?>active<?endif;?>"
                                        href="#"
                                        data-setFilter="Y"
                                        data-filter="<?=$APPLICATION->GetCurPage(false)?>?<?= $item["INPUT_NAME"] ?>=<?= $xmlId ?>&set_filter=Y"
                                    ><?= $value ?></a>
                                </li>
                            <?endif;?>
                        <?endforeach;?>
                    <?endif;?>
                <?endforeach;?>
            </ul>
        </div>
        <div class="position-relative w-100 w-md-50 w-lg-240w">
            <input class="js-date js-date--range js-date--today-max w-100 form-control" id="date1" type="text" name="date1" placeholder="Показать за период"><span class="position-absolute top-0 end-0 violet-70 text-m p-2 px-3 pe-none">
                          <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-calendar"></use>
                          </svg></span>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        /* Фильтр по типу объвяления для desktop */
        $(document).on('click', '[data-setFilter=Y]', function(e){
            e.preventDefault();
            let link = $(this).data('filter');
            let dateFilter = $('input[name=date1]').val();
            let arDateFilter = dateFilter.split(' - ');

            if (arDateFilter.length > 0 && arDateFilter[0] !== "" && link !== "") {
                let dFrom = arDateFilter[0];
                link += '&propDateFrom=' + dFrom;
                if (arDateFilter[1]) {
                    let dTo = arDateFilter[1];
                    link += '&propDateTo=' + dTo;
                }
            }

            location.href = link;
        });

        $(document).on('click', '[data-clearFilter=Y]', function(e){
            e.preventDefault();
            let link = $(this).data('filter');
            location.href = link;
        });
    });

    /* Фильтр по типу объявления для mobile */
    function setFilter(select) {
        let link = '';
        let dateFilter = $('input[name=date1]').val();
        let arDateFilter = dateFilter.split(' - ');
        let clearFilter = true;

        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].selected) {
                link = $(select.options[i]).data('filter');

                if ($(select.options[i]).data('setfilter')) {
                    clearFilter = false;
                }
            }
        }

        if (clearFilter) {
            location.href = link;
        }

        if (arDateFilter.length > 0 && arDateFilter[0] !== "" && link !== "") {
            let dFrom = arDateFilter[0];
            link += '&propDateFrom=' + dFrom;

            if (arDateFilter[1]) {
                let dTo = arDateFilter[1];
                link += '&propDateTo=' + dTo;
            }
        }

        location.href = link;
    }

</script>
