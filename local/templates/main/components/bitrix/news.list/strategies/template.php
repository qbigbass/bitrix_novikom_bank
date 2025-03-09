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
<div class="d-flex flex-column gap-4 gap-md-5 gap-lg-7">
    <? foreach ($arResult["STRATEGIES"] as $elemId => $arStrategy) : ?>
        <? if (empty($arStrategy["BENEFITS"])) : ?>
            <div class="card overflow-hidden position-relative">
                <div class="card__inner d-flex flex-column flex-lg-row-reverse align-items-start gap-4 gap-md-5 gap-lg-6">
                    <? if (!empty($arStrategy["PICTURE"])) : ?>
                        <div class="card__image-container flex-shrink-0 mx-auto">
                            <img class="card__image" src="<?= $arStrategy["PICTURE"]?>" alt="" loading="lazy">
                        </div>
                    <? endif; ?>
                    <div class="card__content flex-column d-flex align-items-start gap-4 gap-md-6">
                        <? if (!empty($arStrategy["NAME"]) || !empty($arStrategy["PREVIEW_TEXT"])) : ?>
                            <div class="card__title-group d-flex flex-column gap-4 gap-lg-6">
                                <h2 class="card__title text-break"><?= $arStrategy["NAME"]?></h2>
                            </div>
                        <? endif; ?>
                        <?if(!empty($arStrategy["RISK"]) || !empty($arStrategy["PERIOD"]) || !empty($arStrategy["PROFIT"])):?>
                            <div class="card__condition-list d-flex flex-column flex-md-row flex-wrap gap-4 column-gap-md-11 column-gap-lg-16 row-gap-lg-6">
                                <? if (!empty($arStrategy["RISK"])) : ?>
                                    <div class="card__condition violet-100 d-flex flex-column gap-2">
                                        <div class="card__condition-title d-inline-flex flex-nowrap align-items-baseline gap-1">
                                            <span class="h4"><?= $arStrategy["RISK"]?></span>
                                        </div>
                                        <span class="text-m dark-70"><?= Loc::getMessage("STRATEGY_ITEM_RISK")?></span>
                                    </div>
                                <? endif; ?>
                                <? if (!empty($arStrategy["PERIOD"])) : ?>
                                    <div class="card__condition violet-100 d-flex flex-column gap-2">
                                        <div class="card__condition-title d-inline-flex flex-nowrap align-items-baseline gap-1">
                                            <?= $arStrategy["PERIOD"]?>
                                        </div>
                                        <span class="text-m dark-70"><?= Loc::getMessage("STRATEGY_ITEM_PERIOD")?></span>
                                    </div>
                                <? endif; ?>
                                <? if (!empty($arStrategy["PROFIT"])) : ?>
                                    <div class="card__condition violet-100 d-flex flex-column gap-2">
                                        <div class="card__condition-title d-inline-flex flex-nowrap align-items-baseline gap-1">
                                            <span class="text-l fw-semibold">до</span>
                                            <span class="text-number-ml fw-bold"><?= $arStrategy["PROFIT"]?></span>
                                            <span class="text-l fw-semibold">в год</span>
                                        </div>
                                        <span class="text-m dark-70"><?= Loc::getMessage("STRATEGY_ITEM_PROFIT")?></span>
                                    </div>
                                <? endif; ?>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <? if (!empty($arStrategy["REQUIREMENTS"]) ||
                    !empty($arStrategy["RATES"]) ||
                    !empty($arStrategy["OTHERS"]) ||
                    !empty($arStrategy["FILE"])
                ) :
                    ?>
                    <div class="collapse" id="<?= $elemId?>">
                        <div class="d-flex flex-column gap-4 gap-md-6 gap-lg-7 mt-4 mt-md-6 mt-lg-7">
                            <div class="d-flex flex-column gap-4">
                                <div class="table-tab cell-2">
                                    <div class="table-tab__body">
                                        <div class="table-tab__row">
                                            <div class="table-tab__cell text-l fw-semibold dark-70"><?= Loc::getMessage("STRATEGY_ITEM_TARGET")?></div>
                                            <div class="table-tab__cell text-l"><?= $arStrategy["TARGET"]?></div>
                                        </div>
                                        <div class="table-tab__row">
                                            <div class="table-tab__cell text-l fw-semibold dark-70"><?= Loc::getMessage("STRATEGY_ITEM_CONTROL_METHOD")?></div>
                                            <div class="table-tab__cell text-l"><?= $arStrategy["CONTROL_METHOD"]?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? if(!empty($arStrategy["REQUIREMENTS"])) : ?>
                                <div class="d-flex flex-column gap-4">
                                    <div class="h4"><?= Loc::getMessage("STRATEGY_ITEM_TITLE_REQUIREMENTS")?></div>
                                    <div class="table-tab cell-2">
                                        <div class="table-tab__body">
                                            <? foreach ($arStrategy["REQUIREMENTS"] as $k => $v) : ?>
                                                <div class="table-tab__row">
                                                    <div class="table-tab__cell text-l fw-semibold dark-70"><?= $k?></div>
                                                    <div class="table-tab__cell text-l"><?= $v?></div>
                                                </div>
                                            <? endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if(!empty($arStrategy["RATES"])) : ?>
                                <div class="d-flex flex-column gap-4">
                                    <div class="h4"><?= Loc::getMessage("STRATEGY_ITEM_TITLE_RATES")?></div>
                                    <div class="table-tab cell-2">
                                        <div class="table-tab__body">
                                            <? foreach ($arStrategy["RATES"] as $k => $v) : ?>
                                                <div class="table-tab__row">
                                                    <div class="table-tab__cell text-l fw-semibold dark-70"><?= $k?></div>
                                                    <div class="table-tab__cell text-l"><?= $v?></div>
                                                </div>
                                            <? endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if (!empty($arStrategy["OTHERS"])) : ?>
                                <div class="d-flex flex-column gap-4">
                                    <div class="table-tab cell-2">
                                        <div class="table-tab__body">
                                            <div class="table-tab__row">
                                                <div class="table-tab__cell text-l fw-semibold dark-70"><?= Loc::getMessage("STRATEGY_ITEM_TITLE_OTHERS")?></div>
                                                <div class="table-tab__cell text-l">
                                                    <ul class='list list--size-l'>
                                                        <? foreach ($arStrategy["OTHERS"] as $enumId => $value) : ?>
                                                            <li><?= $value?></li>
                                                        <? endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if(!empty($arStrategy["FILES"])) : ?>
                                <div class="d-flex flex-column gap-4">
                                    <div class="h4">
                                        <?= Loc::getMessage("STRATEGY_ITEM_TITLE_FILE")?>
                                    </div>
                                    <div class="link-list">
                                        <? foreach ($arStrategy["FILES"] as $file): ?>
                                            <a
                                                class="d-flex flex-column gap-1 py-3 document-download text-m"
                                                href="<?= $file["PATH"]; ?>"
                                                download="<?= $file["NAME"] ?>"
                                            >
                                                <?= $file["NAME"]?>
                                                <div class="d-flex gap-1 align-items-center">
                                                    <div class="document-download__file caption-m dark-70">
                                                        <span class="document-download__date-time">
                                                            <?= $file["DATE_MODIFIED"]?>
                                                        </span>
                                                        <span class="document-download__file-type">
                                                            <?= $file["EXTENSION"]?>
                                                        </span>
                                                    </div>
                                                    <span class="icon size-s text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                                    </svg>
                                                </span>
                                                </div>
                                            </a>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                    <div class="d-flex card__button-wrap mt-4 mt-md-5 mt-lg-0">
                        <a class="btn btn-lg-lg btn-outline-primary btn-icon w-100 w-md-auto mt-lg-7 card__button-more"
                           data-bs-toggle="collapse"
                           href="#<?= $elemId?>"
                           role="button"
                           aria-expanded="false"
                           aria-controls="<?= $elemId?>"
                        >
                            <span><?= Loc::getMessage("STRATEGY_TITLE_MORE_DETAILS")?></span>
                            <span><?= Loc::getMessage("STRATEGY_TITLE_HIDE_DETAILS")?></span>
                            <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                            </svg>
                        </a>
                    </div>
                <? endif; ?>
            </div>
        <? endif; ?>
        <? if (!empty($arStrategy["BENEFITS"])) : ?>
            <div class="card p-4 p-md-5 p-lg-6">
                <div class="d-flex flex-column gap-5 gap-lg-7">
                    <div class="d-flex flex-column gap-4">
                        <div class="h2"><?= $arStrategy["NAME"] ?></div>
                        <p class="text-l m-0"><?= $arStrategy["PREVIEW_TEXT"] ?></p>
                    </div>
                    <div class="row row-gap-4 row-gap-md-5 row-gap-lg-7 gx-xl-6">
                        <? foreach ($arStrategy["BENEFITS"] as $id => $arData) : ?>
                            <div class="col-12 col-lg-6">
                                <div class="benefit d-flex gap-3 flex-column flex-column flex-md-row align-items-md-center gap-md-4 gap-lg-6">
                                    <? if (!empty($arData['ICON'])): ?>
                                        <img class="icon size-xxl" src="<?= $arData['ICON'] ?>" alt="icon" loading="lazy">
                                    <? endif; ?>
                                    <div class="benefit__content d-flex flex-column gap-3">
                                        <h4 class="benefit__title"><?= $arData['NAME'] ?></h4>
                                    </div>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        <? endif; ?>
    <? endforeach; ?>
</div>
