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

<div class="collapse d-md-block mt-4 mt-md-6 mt-lg-7" id="additional-info-content">
    <div class="row px-lg-6">
        <div class="col-12">
            <div class="tabs-panel js-tabs-slider overflow-hidden position-relative px-1">
                <div class="tabs-panel__navigation d-none d-lg-block js-tabs-slider-navigation w-100"><span class="tabs-panel__navigation-item tabs-panel__navigation-item-reverse js-tabs-slider-navigation-prev h-100 d-flex align-items-center justify-content-start px-1 z-3 position-absolute start-0 top-0"><span class="icon size-m">
                          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-left"></use>
                          </svg></span></span><span class="tabs-panel__navigation-item js-tabs-slider-navigation-next h-100 d-flex align-items-center justify-content-end px-1 z-3 position-absolute end-0 top-0"><span class="icon size-m">
                          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                          </svg></span></span></div>
                <ul class="swiper-wrapper tabs-panel__list nav nav-tabs d-inline-flex flex-nowrap w-auto p-0 border border-purple rounded">

                    <? foreach ($arResult['ITEMS'] as $key => $tab) { ?>
                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                            <button class="tabs-panel__list-item-link nav-link bg-transparent <?= $key == 0 ? 'active' : '' ?>"
                                    data-bs-toggle="tab"
                                    data-bs-target="#additional-info-<?= $tab['ID'] ?>"
                                    type="button"
                                    role="tab"
                                    aria-controls="additional-info-<?= $tab['ID'] ?>"
                                    aria-selected="true">
                                <?= $tab['NAME'] ?? '' ?>
                            </button>
                        </li>
                    <? } ?>

                </ul>
            </div>
            <div class="tab-content mt-4 mt-md-6 mt-lg-7">
                <? foreach ($arResult['ITEMS'] as $key => $tab) { ?>
                    <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>"
                         id="additional-info-<?= $tab['ID'] ?>"
                         aria-labelledby="additional-info-<?= $tab['ID'] ?>"
                         tabindex="0"
                         role="tabpanel">

                        <? if (
                            !empty($tab['CODE']) && ($tab['CODE'] == 'protsentnye-stavki' || $tab['CODE'] == 'stavki')
                            || ($tab['NAME'] == 'Процентные ставки' || $tab['NAME'] == 'Ставки')
                            && !empty($component ->__parent->arResult['RATES_TABLE_HTML'])
                        ) {
                            echo($component ->__parent->arResult['RATES_TABLE_HTML']);
                        } ?>

                        <? if (!empty($tab['DISPLAY_PROPERTIES'])) {
                            foreach ($tab['DISPLAY_PROPERTIES'] as $property) {

                                if ($property['CODE'] == 'BENEFITS' && !empty($property['VALUE'])) {

                                    global $benefitsFilter;
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
                                            "COL_COUNT" => "3",
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
                                    );
                                }

                                if ($property['CODE'] == 'TEXT_BLOCK_DESCRIPTION' && !empty($property['~VALUE'])) {
                                    foreach ($property['~VALUE'] as $key => $value) { ?>
                                        <div class="col-12 col-xxl-8">
                                            <h4 class="mb-4 mb-md-6 mb-lg-7"><?= $property['DESCRIPTION'][$key] ?? '' ?></h4>
                                            <?= $value['TEXT'] ?>
                                        </div>
                                    <? }
                                }

                                if ($property['CODE'] == 'HTML' && !empty($property['~VALUE'])) {?>
                                    <?=$property['~VALUE']?>
                                <?}

                                if ($property['CODE'] == 'COMPLEX_PROP' && !empty($property['~VALUE'])) { ?>
                                    <div class="accordion accordion--size-lg accordion--bg-transparent" id="accordion-insurance-more">
                                        <? foreach ($property['~VALUE'] as $key => $value) { ?>
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $key ?>" aria-controls="<?= $key ?>">
                                                        <span class="h4"><?= $value['SUB_VALUES']['COMPLEX_HEADER']['~VALUE'] ?></span>
                                                    </button>
                                                </div>
                                                <div class="accordion-collapse collapse" id="<?= $key ?>" data-bs-parent="#accordion-insurance-more">
                                                    <div class="accordion-body">
                                                        <div class="d-flex flex-column gap-4 gap-md-5 gap-lg-7">
                                                            <? foreach ($value['SUB_VALUES'] as $subKey => $subValue) {
                                                                if ($subKey == 'COMPLEX_TEXT_FIELD' && !empty($subValue['~VALUE']['TEXT'])) { ?>
                                                                    <p class="text-l mb-0 dark-100"><?= $subValue['~VALUE']['TEXT'] ?></p>
                                                                <? }
                                                                if ($subKey == 'COMPLEX_LIST' && !empty($subValue['~VALUE']['TEXT'])) { ?>
                                                                    <div>
                                                                        <div class="text-l fw-semibold mb-3"><?= $value['SUB_VALUES']['COMPLEX_LIST_HEADER']['~VALUE'] ?? '' ?></div>
                                                                        <?= $subValue['~VALUE']['TEXT'] ?>
                                                                    </div>
                                                                <? }
                                                                if ($subKey == 'COMPLEX_FILE' && !empty($subValue['VALUE'])) {
                                                                    $file = CFile::GetFileArray($subValue['VALUE']);
                                                                    $fileData = explode('.', $file['ORIGINAL_NAME']);
                                                                    $fileName = $fileData[0];
                                                                    $fileType = $fileData[1];
                                                                    ?>
                                                                    <div>
                                                                        <div class="text-l fw-bold mb-3"><?= $value['SUB_VALUES']['COMPLEX_HEADER_FILE']['~VALUE'] ?? '' ?></div>
                                                                        <div class="link-list">
                                                                            <a class="d-flex flex-column gap-1 py-3 document-download text-m" href="#" download="">
                                                                                <?= $fileName ?>
                                                                                <div class="d-flex gap-1 align-items-center">
                                                                                    <div class="document-download__file caption-m dark-70">
                                                                                        <span class="document-download__date-time"><?= date('d.m.Y H:i', strtotime($file['TIMESTAMP_X'])) ?> </span>
                                                                                        <span class="document-download__file-type"><?= mb_strtoupper($fileType) ?></span>
                                                                                    </div>
                                                                                    <span class="icon size-s text-primary">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                                                                        </svg>
                                                                                    </span>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                <? }
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } ?>
                                    </div>
                                <? }

                                if (($property['CODE'] == 'CONDITIONS_ICONS' || $property['CODE'] == 'ICONS_WITH_DESCRIPTION') && !empty($property['~VALUE'])) { ?>
                                    <div class="col-12 col-xl-8">
                                        <? if (!empty($tab['PROPERTIES']['ICONS_WITH_DESCRIPTION_HEADER']['VALUE'])) { ?>
                                            <h4 class="mb-4 mb-md-6">
                                                <?= $tab['PROPERTIES']['ICONS_WITH_DESCRIPTION_HEADER']['VALUE'] ?>
                                            </h4>
                                        <? } ?>
                                        <div class="row row-gap-6">
                                            <? foreach ($property['~VALUE'] as $key => $value) { ?>
                                                <div class="col-12 col-md-6 <?= count($property['~VALUE']) < 3 ? 'col-lg-6' : 'col-lg-4' ?>">
                                                    <div class="benefit d-flex gap-3 flex-column flex-md-row align-items-md-center gap-md-4 gap-lg-6">
                                                        <img class="icon size-lxl" src="<?= CFile::GetPath($value) ?>" alt="icon" loading="lazy">
                                                        <div class="benefit__content d-flex flex-column gap-3">
                                                            <h5 class="benefit__title fw-semibold"><?= $property['~DESCRIPTION'][$key] ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'CONDITIONS' && !empty($property['~VALUE'])) { ?>
                                    <div class="table-tab cell-2 mt-7 mt-md-7 mt-lg-8">
                                        <div class="table-tab__body">

                                            <? foreach ($property['~VALUE'] as $key => $value) { ?>
                                                <div class="table-tab__row">
                                                    <div class="table-tab__cell text-l fw-semibold dark-70"><?= $property['~DESCRIPTION'][$key] ?></div>
                                                    <div class="table-tab__cell text-l"><?= $value['TEXT'] ?></div>
                                                </div>
                                            <? } ?>

                                        </div>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'CONDITIONS_TABS' && !empty($property['~VALUE'])) { ?>
                                    <div class="tab-content mt-4 mt-md-6 mt-lg-7">
                                        <div class="tab-pane fade active show" id="limits" aria-labelledby="limits" tabindex="0" role="tabpanel">
                                        <? foreach ($property['~VALUE'] as $key => $value) {
                                            $valueDecoded = json_decode($value, 1); ?>

                                            <div class="row <?= $key > 0 ? 'mt-6 mt-md-9 mt-lg-11' : '' ?>">
                                                <div class="col-12">
                                                    <h4 class="mb-4 mb-md-5 mb-lg-6"><?= $valueDecoded['TAB'] ?></h4>
                                                    <div class="table-tab cell-2">
                                                        <div class="table-tab__body">
                                                            <? foreach ($valueDecoded['DESCRIPTIONS'] as $innerKey => $header) { ?>
                                                                <div class="table-tab__row">
                                                                    <div class="table-tab__cell text-l fw-semibold dark-70"><?= $header ?></div>
                                                                    <div class="table-tab__cell">
                                                                        <p class="text-l"><?= $valueDecoded['VALUES'][$innerKey] ?? '' ?></p>
                                                                    </div>
                                                                </div>
                                                            <? } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } ?>
                                        </div>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'TEXT_FIELD' && !empty($property['~VALUE']['TEXT'])) { ?>
                                    <div class="w-100 w-xl-75 rte mt-7 mt-md-7 mt-lg-8">
                                        <? if (!empty($tab['PROPERTIES']['TEXT_FIELD_HEADER']['VALUE'])) { ?>
                                            <h4 class="mb-4 mb-md-6">
                                                <?= $tab['PROPERTIES']['TEXT_FIELD_HEADER']['VALUE'] ?>
                                            </h4>
                                        <? } ?>
                                        <?= $property['~VALUE']['TEXT'] ?>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'RATES_DESCRIPTION' && !empty($property['~VALUE'])) {?>
                                    <?$firstColumnName = 'Процент годовых в месяц';?>
                                    <?$secondColumnName = 'Условия';?>
                                    <div class="table-adaptive">
                                        <div class="table-adaptive__header">
                                            <div class="table-adaptive__row">
                                                <div class="table-adaptive__cell text-s"><?=$firstColumnName?></div>
                                                <div class="table-adaptive__cell text-s"><?=$secondColumnName?></div>
                                            </div>
                                        </div>
                                        <div class="table-adaptive__body">
                                            <?foreach ($property['~VALUE'] as $index => $value) {?>
                                                <div class="table-adaptive__row">
                                                    <div class="table-adaptive__cell text-number-l fw-bold">
                                                        <span class="table-adaptive__label text-s"><?=$firstColumnName?></span>
                                                        <span><?=$property['DESCRIPTION'][$index]?></span>
                                                    </div>
                                                    <div class="table-adaptive__cell text-l">
                                                        <span class="table-adaptive__label text-s"><?=$secondColumnName?></span>
                                                        <span><?=$value['TEXT']?></span>
                                                    </div>
                                                </div>
                                            <?}?>
                                        </div>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'HEADING' && !empty($property['~VALUE'])) { ?>
                                    <h4 class="mb-4 mb-md-5 mb-lg-6">
                                        <?=$property['~VALUE']?>
                                    </h4>
                                <? }

                                if ($property['CODE'] == 'STEPS' && !empty($property['~VALUE'])) {?>
                                    <div class="row row-gap-6 mb-6 mb-md-9 mb-lg-11">
                                        <div class="stepper steps-2">
                                            <?foreach ($property['~VALUE'] as $index => $value) {?>
                                                <div class="stepper-item stepper-item--color-green">
                                                    <div class="stepper-item__header">
                                                        <div class="stepper-item__number">
                                                            <div class="stepper-item__number-value"><?=$index + 1?></div>
                                                            <div class="stepper-item__number-icon">
                                                                <?=getStepperIcons($index)?>
                                                            </div>
                                                        </div>
                                                        <div class="stepper-item__arrow"></div>
                                                    </div>
                                                    <div class="stepper-item__content">
                                                        <p class="text-l mb-0"><?=$value['TEXT']?></p>
                                                    </div>
                                                </div>
                                            <?}?>
                                        </div>
                                    </div>
                                <?}

                                if ($property['CODE'] == 'SHORT_INFO' && !empty($property['~VALUE']['TEXT'])) { ?>
                                    <?$iconPath = (!empty($tab['DISPLAY_PROPERTIES']['ICON_SHORT_INFO']['FILE_VALUE']['SRC']))
                                        ? $tab['DISPLAY_PROPERTIES']['ICON_SHORT_INFO']['FILE_VALUE']['SRC']
                                        : '/frontend/dist/img/restructuring-additional-info.png';?>

                                    <div class="w-100 mt-7 mt-md-7 mt-lg-8">
                                        <div class="polygon-container js-polygon-container">
                                            <div class="polygon-container__content">
                                                <div class="helper bg-dark-10">
                                                    <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                        <img class="helper__image w-auto float-end" src="<?=$iconPath?>" alt="" loading="lazy">
                                                        <div class="helper__content text-l">
                                                            <p class="mb-0">
                                                                <?= $property['~VALUE']['TEXT'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                                                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'QUOTES' && !empty($property['~VALUE']['TEXT'])) { ?>
                                    <div class="dark-70 w-100 w-xl-75 rte mt-7 mt-md-7 mt-lg-8">
                                        <p><?= $property['~VALUE']['TEXT'] ?></p>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'QUESTIONS' && !empty($property['LINK_ELEMENT_VALUE'])) { ?>
                                    <div class="row row-gap-6 mt-7 mt-md-7 mt-lg-8">
                                        <div class="col-12 col-xxl-8">
                                            <div class="accordion" id="accordion-<?= $property['ID'] ?>">
                                                <? foreach ($property['LINK_ELEMENT_VALUE'] as $question) { ?>
                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $question['ID'] ?>" aria-controls="<?= $question['ID'] ?>">
                                                                <?= $question['NAME'] ?>
                                                            </button>
                                                        </div>
                                                        <div class="accordion-collapse collapse" id="<?= $question['ID'] ?>" data-bs-parent="#accordion-<?= $property['ID'] ?>">
                                                            <div class="accordion-body">
                                                                <p class="text-m mb-0 dark-70">
                                                                    <?= $question['PREVIEW_TEXT'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <? } ?>
                                                <a class="btn btn-link btn-lg d-inline-flex gap-2 align-items-center mt-4 mt-md-6 section-custom-accordion__button-more" href="#">
                                                    <span class="text-m">Все вопросы и ответы</span>
                                                    <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right-small"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xxl-4">
                                            <?$APPLICATION->IncludeFile('/local/php_interface/include/request_call_form.php');?>
                                        </div>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'DOCUMENTS' && !empty($property['LINK_SECTION_VALUE'])) { ?>
                                    <div class="row row-gap-6 mt-7 mt-md-7 mt-lg-8">
                                        <div class="col-12 col-xxl-8">
                                            <div class="accordion" id="accordion-<?= $property['ID'] ?>">
                                                <? foreach ($property['LINK_SECTION_VALUE'] as $key => $section) {
                                                    if (!empty($section['ELEMENTS'])) { ?>
                                                        <div class="accordion-item">
                                                            <div class="accordion-header">
                                                                <button
                                                                    class="accordion-button <?= $key == array_key_first($property['LINK_SECTION_VALUE']) ? 'show' : 'collapsed' ?>"
                                                                    type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#<?= $section['ID'] ?>"
                                                                    aria-controls="<?= $section['ID'] ?>"
                                                                    <?= $key == array_key_first($property['LINK_SECTION_VALUE']) ? 'aria-expanded="true"' : '' ?>
                                                                >
                                                                    <?= $section['NAME'] ?>
                                                                </button>
                                                            </div>
                                                            <div class="accordion-collapse collapse <?= $key == array_key_first($property['LINK_SECTION_VALUE']) ? 'show' : '' ?>" id="<?= $section['ID'] ?>" data-bs-parent="#accordion-<?= $property['ID'] ?>">
                                                                <div class="accordion-body">
                                                                    <p class="text-m mb-0 dark-70">
                                                                        <?= $section['DESCRIPTION'] ?>
                                                                    </p>
                                                                    <div class="mt-4">
                                                                    <? foreach ($section['ELEMENTS'] as $element) {
                                                                        $file = CFile::GetFileArray($element['PROPERTIES']['FILE']['VALUE']);
                                                                        ?>
                                                                        <a class="d-flex flex-column gap-1 py-3 document-download text-m" href="<?= $file['SRC'] ?>" download="<?= $file['NAME'] ?>"><?= $element ['NAME'] ?>
                                                                            <div class="d-flex gap-1 align-items-center">
                                                                                <div class="document-download__file caption-m dark-70">
                                                                                    <span class="document-download__date-time"><?= !empty($element['ACTIVE_FROM']) ? $element['ACTIVE_FROM']->format('d.m.y H:i') : '' ?></span>
                                                                                    <span class="document-download__file-type"><?= explode('.', $file['ORIGINAL_NAME'])[1] ?></span>
                                                                                </div>
                                                                                <span class="icon size-s text-primary">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                                                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-download-small"></use>
                                                                                    </svg>
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                    <? } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <? } ?>
                                                <? } ?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xxl-4">
                                            <?$APPLICATION->IncludeFile('/local/php_interface/include/protection_from_scammers.php');?>
                                        </div>
                                    </div>
                                <? }
                            }
                        }?>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>

