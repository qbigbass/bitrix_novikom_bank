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

use Dalee\Helpers\ComponentRenderer\Renderer;
$renderer = new Renderer($APPLICATION, $component);
?>

<div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-option-bank-support">

    <? foreach ($arResult['ITEMS'] as $key => $item) { ?>
        <div class="accordion-item">
            <div class="accordion-header">
                <button class="accordion-button<?= $key != 0 ? ' collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $key + 1 ?>" <?= $key == 0 ? 'aria-expanded' : '' ?> aria-controls="<?= $key + 1 ?>">
                    <span class="fw-bold h4"><?= $item['~NAME'] ?></span>
                </button>
            </div>
            <div class="accordion-collapse collapse<?= $key == 0 ? ' show' : '' ?>" id="<?= $key + 1 ?>" data-bs-parent="#accordion-option-bank-support">
                <div class="accordion-body">
                    <div class="d-flex flex-column gap-6 gap-md-7">
                        <? if (!empty($item['DISPLAY_PROPERTIES'])) {
                            foreach ($item['DISPLAY_PROPERTIES'] as $propertyKey => $property) {
                                if ($property['CODE'] == 'BENEFITS' && !empty($property['VALUE'])) { ?>
                                    <div class="row row-gap-6 gx-xl-6">
                                    <? global $benefitsFilter;
                                    $benefitsFilter = [
                                        'ACTIVE' => 'Y',
                                        'ID' => $property['VALUE']
                                    ];

                                    $APPLICATION->IncludeComponent(
                                        "bitrix:news.list",
                                        "benefits",
                                        [
                                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                            "ADD_SECTIONS_CHAIN" => "N",
                                            "AJAX_MODE" => "N",
                                            "AJAX_OPTION_ADDITIONAL" => "",
                                            "AJAX_OPTION_HISTORY" => "N",
                                            "AJAX_OPTION_JUMP" => "N",
                                            "AJAX_OPTION_STYLE" => "Y",
                                            "CACHE_FILTER" => "Y",
                                            "CACHE_GROUPS" => "Y",
                                            "CACHE_TIME" => "36000000",
                                            "CACHE_TYPE" => "A",
                                            "CHECK_DATES" => "Y",
                                            "COL_COUNT" => "2",
                                            "DETAIL_URL" => "",
                                            "DISPLAY_BOTTOM_PAGER" => "N",
                                            "DISPLAY_TOP_PAGER" => "N",
                                            "FIELD_CODE" => ["CODE","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""],
                                            "FILTER_NAME" => "benefitsFilter",
                                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                            "IBLOCK_ID" => iblock('benefits'),
                                            "IBLOCK_TYPE" => "additional",
                                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                            "INCLUDE_SUBSECTIONS" => "N",
                                            "MESSAGE_404" => "",
                                            "NEWS_COUNT" => "20",
                                            "PAGER_BASE_LINK_ENABLE" => "N",
                                            "PAGER_DESC_NUMBERING" => "N",
                                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                            "PAGER_SHOW_ALL" => "N",
                                            "PAGER_SHOW_ALWAYS" => "N",
                                            "PAGER_TEMPLATE" => ".default",
                                            "PAGER_TITLE" => "Новости",
                                            "PARENT_SECTION" => "",
                                            "PARENT_SECTION_CODE" => "",
                                            "PREVIEW_TRUNCATE_LEN" => "",
                                            "PROPERTY_CODE" => ["",""],
                                            "SET_BROWSER_TITLE" => "N",
                                            "SET_LAST_MODIFIED" => "N",
                                            "SET_META_DESCRIPTION" => "N",
                                            "SET_META_KEYWORDS" => "N",
                                            "SET_STATUS_404" => "N",
                                            "SET_TITLE" => "N",
                                            "SHOW_404" => "N",
                                            "SORT_BY1" => "ACTIVE_FROM",
                                            "SORT_BY2" => "SORT",
                                            "SORT_ORDER1" => "DESC",
                                            "SORT_ORDER2" => "ASC",
                                            "STRICT_SECTION_CHECK" => "N",
                                        ],
                                        $component
                                    ); ?>
                                    </div>
                                    <? if ($propertyKey != array_key_last($item['DISPLAY_PROPERTIES'])) { ?>
                                        <span class="border-bottom-dashed" aria-hidden="true"></span>
                                    <? } ?>
                                <? }

                                if ($property['CODE'] == 'STEPS' && !empty($property['VALUE'])) {
                                    $renderer->render('Steps', $property['VALUE'], null, [
                                        'stepsHeader' => $arResult['PROPERTIES']['STEPS_HEADER']['~VALUE'] ?? 'Этапы',
                                        'stepsTemplate' => 'variants',
                                    ]);
                                    if ($propertyKey != array_key_last($item['DISPLAY_PROPERTIES'])) { ?>
                                        <span class="border-bottom-dashed" aria-hidden="true"></span>
                                    <? }
                                }

                                if ($property['CODE'] == 'QUOTE' && !empty($property['~VALUE'])) { ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="polygon-container js-polygon-container">
                                                <div class="polygon-container__content">
                                                    <div class="helper bg-white">
                                                        <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                            <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info_orange.png" alt="Обратите внимание">
                                                            <div class="helper__content text-l">
                                                                <p><?= $property['~VALUE']['TEXT'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="polygon-container__polygon js-polygon-container-polygon orange-100">
                                                    <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                        <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <? if ($propertyKey != array_key_last($item['DISPLAY_PROPERTIES'])) { ?>
                                        <span class="border-bottom-dashed" aria-hidden="true"></span>
                                    <? } ?>
                                <? }

                                if ($property['CODE'] == 'TEXT_FIELD' && !empty($property['~VALUE'])) { ?>
                                    <? foreach ($property['~VALUE'] as $key => $value) { ?>
                                        <div class="row">
                                            <div class="d-flex flex-column gap-3">
                                                <h4 class="text-l"><?= $property['DESCRIPTION'][$key] ?? '' ?></h4>
                                                <span><?= $value['TEXT'] ?></span>
                                            </div>
                                        </div>
                                        <? if ($key != array_key_last($property['~VALUE']) && $propertyKey != array_key_last($item['DISPLAY_PROPERTIES'])) { ?>
                                            <span class="border-bottom-dashed" aria-hidden="true"></span>
                                        <? } ?>
                                    <? } ?>
                                <? } ?>
                            <? } ?>
                            <? if (!empty($item['DISPLAY_PROPERTIES']['BUTTON_TEXT']['~VALUE']) && !empty($item['DISPLAY_PROPERTIES']['BUTTON_LINK']['~VALUE'])): ?>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a class="btn btn-orange btn-lg-lg d-inline-block" href="<?= $item['DISPLAY_PROPERTIES']['BUTTON_LINK']['~VALUE'] ?>">
                                            <?= $item['DISPLAY_PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?>
                                        </a>
                                    </div>
                                </div>
                            <? elseif (!empty($item['DISPLAY_PROPERTIES']['BUTTON_TEXT']['~VALUE']) && !empty($item['DISPLAY_PROPERTIES']['BUTTON_CODE_FORM']['VALUE'])): ?>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-orange btn-lg-lg d-inline-block" type="button" data-bs-toggle="modal" data-bs-target="#<?=$item['PROPERTIES']['BUTTON_CODE_FORM']['VALUE']?>">
                                            <?= $item['DISPLAY_PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?>
                                        </button>
                                    </div>
                                </div>
                                <?
                                global $FORMS;
                                $FORMS->includeForm($item['DISPLAY_PROPERTIES']['BUTTON_CODE_FORM']['VALUE']);
                                ?>
                            <? endif; ?>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>
</div>

