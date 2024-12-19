<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<? if (!empty($arResult['DESCRIPTION'])): ?>
    <h3 class="ps-lg-6 mb-6 mb-lg-7 px-lg-6"><?= $arResult['DESCRIPTION'] ?></h3>
<? endif; ?>
<div class="swiper js-slider-cards slider-cards"
     data-slides-per-view="mobile-s:1,mobile:1,tablet:2,laptop:2,laptop-x:2"
     data-space-between="mobile-s:8,mobile:8,tablet:16,laptop:16,laptop-x:16">
    <div class="swiper-wrapper js-swiper-wrapper">
        <?
        foreach ($arResult['ITEMS'] as $key => $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="swiper-slide js-swiper-slide" id="<?= $this->GetEditAreaId($item['ID']); ?>">
                <div class="card-statistic overflow-hidden position-relative h-100 bg-blue-10">
                    <div
                        class="card-statistic__content d-flex flex-column flex-xl-row align-items-xl-end gap-4 gap-xl-6">
                        <div class="card-statistic__info d-flex flex-column align-items-start">
                            <? if (!empty($item['PROPERTIES']['TAG']['VALUE'])): ?>
                                <div class="tag card-statistic__tag">
                                    <span class="tag__content text-s fw-semibold mw-100 w-sm-auto">
                                        <?= $item['PROPERTIES']['TAG']['VALUE'] ?>
                                    </span>
                                    <span class="tag__triangle">
                                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            <? endif; ?>
                            <div class="card-statistic__title-box">
                                <div class="card-statistic__num h1"><?= $item['PROPERTIES']['NUMBER']['VALUE'] ?? '' ?></div>
                                <div class="card-statistic__caption h3"><?= $item['PROPERTIES']['SIGN']['VALUE'] ?? '' ?></div>
                            </div>
                            <p class="text-m card-statistic__description"><?= $item['~PREVIEW_TEXT'] ?? '' ?></p>
                        </div>
                        <div class="card-statistic__chart-box">
                            <div class="card-statistic__chart mx-auto" id="chart-1"
                                 data-chart="[{&quot;name&quot;: &quot;Credits to clients&quot;, &quot;y&quot;: 362279}, {&quot;name&quot;: &quot;Other assets&quot;,&quot;y&quot;: 36734}, {&quot;name&quot;: &quot;Interbank credits&quot;, &quot;y&quot;: 36043}, {&quot;name&quot;: &quot;Cash&quot;, &quot;y&quot;: 55701}, {&quot;name&quot;: &quot;Securities&quot;,&quot;y&quot;: 28480}, {&quot;name&quot;: &quot;Property&quot;, &quot;y&quot;: 11263}]"></div>
                        </div>
                    </div>
                    <picture class="pattern-bg card-statistic__pattern">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                media="(max-width: 1199px)">
                        <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <div class="slider-controls js-swiper-controls mt-3 mt-md-4">
        <div class="slider-controls__pagination js-swiper-pagination"></div>
        <div class="slider-controls__navigation js-swiper-nav">
            <button class="swiper-button-prev js-swiper-prev" type="button" aria-label="Листать влево">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                    </svg>
                </span>
            </button>
            <button class="swiper-button-next js-swiper-next" type="button" aria-label="Листать вправо">
                <span class="icon size-m">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </span>
            </button>
        </div>
    </div>
</div>
