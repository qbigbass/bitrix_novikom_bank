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
            <div class="tab-content">
                <? foreach ($arResult['ITEMS'] as $key => $tab) { ?>
                    <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>"
                         id="additional-info-<?= $tab['ID'] ?>"
                         aria-labelledby="additional-info-<?= $tab['ID'] ?>"
                         tabindex="0"
                         role="tabpanel">

                        <? if (!empty($tab['DISPLAY_PROPERTIES'])) {
                            foreach ($tab['DISPLAY_PROPERTIES'] as $property) {

                                if ($property['CODE'] == 'CONDITIONS_ICONS' && !empty($property['~VALUE'])) { ?>
                                    <div class="row row-gap-6 mt-7 mt-md-7 mt-lg-8">

                                        <? foreach ($property['~VALUE'] as $key => $value) { ?>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="benefit d-flex gap-3 flex-column flex-md-row align-items-md-center gap-md-4 gap-lg-6">
                                                    <img class="icon size-lxl" src="<?= CFile::GetPath($value) ?>" alt="icon" loading="lazy">
                                                    <div class="benefit__content d-flex flex-column gap-3">
                                                        <h5 class="benefit__title fw-semibold"><?= $property['~DESCRIPTION'][$key] ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } ?>

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

                                if ($property['CODE'] == 'TEXT_FIELD' && !empty($property['~VALUE']['TEXT'])) { ?>
                                    <div class="w-100 w-xl-75 rte mt-7 mt-md-7 mt-lg-8">
                                        <?= $property['~VALUE']['TEXT'] ?>
                                    </div>
                                <? }

                                if ($property['CODE'] == 'SHORT_INFO' && !empty($property['~VALUE']['TEXT'])) { ?>
                                    <div class="w-100 mt-7 mt-md-7 mt-lg-8">
                                        <div class="polygon-container js-polygon-container">
                                            <div class="polygon-container__content">
                                                <div class="helper bg-dark-10">
                                                    <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                        <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="" loading="lazy">
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
                                                                <?= $question['~NAME'] ?>
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
                                                <? foreach ($property['LINK_SECTION_VALUE'] as $section) { ?>
                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $section['ID'] ?>" aria-controls="<?= $section['ID'] ?>">
                                                                <?= $section['~NAME'] ?>
                                                            </button>
                                                        </div>
                                                        <div class="accordion-collapse collapse" id="<?= $section['ID'] ?>" data-bs-parent="#accordion-<?= $property['ID'] ?>">
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
                                                                                <span class="document-download__date-time"><?= $element['ACTIVE_FROM']->format('d.m.y H:i') ?></span>
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

