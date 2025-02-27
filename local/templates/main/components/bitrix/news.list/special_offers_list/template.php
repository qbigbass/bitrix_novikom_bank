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

foreach ($arResult['ITEMS'] as $key => $item) {
    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="col-12 col-md-6 col-lg-4" id="<?= $this->GetEditAreaId($item['ID']); ?>">
        <a class="card-news position-relative bg-dark-10 dark-100 h-100 d-flex flex-column overflow-hidden"
           href="<?= $item['DETAIL_PAGE_URL'] ?>">
            <div
                class="card-news__header w-100 position-absolute top-0 start-0 d-flex align-items-start justify-content-between z-2">
                <? if (!empty($item['PROPERTIES']['TAG']['VALUE'])) { ?>
                    <div class="tag card-news__tag">
                        <span class="tag__content text-s fw-semibold">
                            <?= $item['PROPERTIES']['TAG']['VALUE'] ?>
                        </span>
                        <span class="tag__triangle">
                            <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                            </svg>
                        </span>
                    </div>
                <? } ?>
                <? if (!empty($item['PROPERTIES']['PIN']['VALUE']) && $item['PROPERTIES']['PIN']['VALUE'] == 'Y'): ?>
                    <span class="card-news__sticky-icon btn btn-info p-0 d-flex">
                        <svg class="icon size-m blue-100 m-auto" xmlns="http://www.w3.org/2000/svg" width="100%"
                             height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-pin"></use>
                        </svg>
                    </span>
                <? endif; ?>
            </div>
            <div class="card-news__image-container position-relative z-1 h-100">
                <? if (!empty($item['PICTURE'])) { ?>
                    <img class="card-news__img position-relative z-2" src="<?= $item['PICTURE'] ?>"
                         alt=""
                         loading="lazy">
                    <div class="card-news__top-blackout z-3 position-absolute top-0 start-0 w-100"></div>
                <? } else { ?>
                    <picture class="pattern-bg pattern-bg--position-sm-top z-1">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-s.svg"
                                media="(max-width: 767px)">
                        <source srcset="/frontend/dist/img/patterns/card/pattern-light-m.svg"
                                media="(max-width: 1199px)">
                        <img src="/frontend/dist/img/patterns/card/pattern-light-l.svg" alt="bg pattern" loading="lazy">
                    </picture>
                <? } ?>
            </div>
            <div class="card-news__body d-flex flex-column gap-2 gap-sm-3 z-3">
                <span class="text-m dark-70">
                    <?= $item['PROPERTIES']['PUBLICATION_DATE']['VALUE'] ?>
                </span>
                <h5 class="fw-bold"><?= $item['NAME'] ?></h5>
            </div>
        </a>
    </div>
<? }

if ($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? } ?>
