<? if ($arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['VALUE'] && $arResult['PROPERTIES']['TEXT_BLOCK']['VALUE']) { ?>
    <section class="section-layout py-lg-11 bg-blue-10">
        <div class="container">
            <div class="banner-product-info ps-lg-6">
                <div class="banner-product-info__header">
                    <? if ($arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE']) { ?>
                        <div class="tag tag--outline">
                            <span class="tag__content text-s fw-semibold"><?= $arResult['PROPERTIES']['TEXT_BLOCK_TAG']['VALUE'] ?></span>
                            <span class="tag__triangle">
                                  <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 19.3486L0.934259 0.5H13.5V19.3486Z"></path>
                                  </svg>
                            </span>
                        </div>
                    <? } ?>
                    <h3><?= $arResult['PROPERTIES']['TEXT_BLOCK_HEADER']['~VALUE'] ?></h3>
                </div>
                <div class="banner-product-info__body">
                    <p class="text-l m-0"><?= $arResult['PROPERTIES']['TEXT_BLOCK']['~VALUE']['TEXT'] ?></p>
                    <? if ($arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE'] && $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE']) { ?>
                        <a class="btn btn-lg-lg btn-outline-primary fw-bold w-100 w-md-auto mt-6 mt-lg-7" href="<?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON_LINK']['VALUE'] ?>">
                            <?= $arResult['PROPERTIES']['TEXT_BLOCK_BUTTON']['VALUE'] ?>
                        </a>
                    <? } ?>
                </div>
                <? if ($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE']) { ?>
                    <div class="banner-product-info__image">
                        <div class="polygon-container js-polygon-container">
                            <div class="polygon-container__content">
                                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['VALUE']) ?>" alt="<?= $arResult['PROPERTIES']['TEXT_BLOCK_IMAGE']['ALT'] ?>" loading="lazy">
                            </div>
                            <div class="polygon-container__polygon js-polygon-container-polygon purple-70">
                                <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="10"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--position-sm-bottom">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-heavy/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-heavy/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>
<? if ($arResult['PROPERTIES']['TABS']['VALUE'] && $arResult['PROPERTIES']['TABS_HEADER']['VALUE']) { ?>
    <section class="section-layout js-collapsed-mobile">
        <div class="container">
            <h3 class="d-none d-md-flex mb-md-6 mb-lg-7 px-lg-6"><?= $arResult['PROPERTIES']['TABS_HEADER']['VALUE'] ?></h3>
            <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#additional-info-content" role="button" aria-expanded="false" aria-controls="additional-info-content">Подробные условия
                <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                </svg>
            </a>
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

                                <? foreach ($arResult['PROPERTIES']['TABS']['VALUE'] as $key => $tabId) {
                                    if (isset($arResult['ELEMENTS_PROPERTIES'][$tabId])) {
                                        $tab = $arResult['ELEMENTS_PROPERTIES'][$tabId]; ?>
                                        <li class="swiper-slide w-auto tabs-panel__list-item nav-item z-2">
                                            <button class="tabs-panel__list-item-link nav-link bg-transparent <?= $key == 0 ? 'active' : '' ?>"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#additional-info-<?= $tabId ?>"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="additional-info-<?= $tabId ?>"
                                                    aria-selected="true">
                                                <?= $tab->name ?? '' ?>
                                            </button>
                                        </li>
                                    <? } ?>
                                <? } ?>

                            </ul>
                        </div>
                        <div class="tab-content">
                            <? foreach ($arResult['PROPERTIES']['TABS']['VALUE'] as $key => $tabId) {
                                if (isset($arResult['ELEMENTS_PROPERTIES'][$tabId])) {
                                    $tab = $arResult['ELEMENTS_PROPERTIES'][$tabId]; ?>
                                    <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>"
                                         id="additional-info-<?= $tabId ?>"
                                         aria-labelledby="additional-info-<?= $tabId ?>"
                                         tabindex="0"
                                         role="tabpanel">

                                        <? if (!empty($tab->properties)) {
                                            foreach ($tab->properties as $code => $property) {

                                                if ($code == 'CONDITIONS') { ?>
                                                    <div class="table-tab cell-2 mt-7 mt-md-7 mt-lg-8">
                                                        <div class="table-tab__body">

                                                            <? foreach ($property as $condition) { ?>
                                                                <div class="table-tab__row">
                                                                    <div class="table-tab__cell text-l fw-semibold dark-70"><?= $condition->value ?? '' ?></div>
                                                                    <div class="table-tab__cell text-l"><?= $condition->description ?? '' ?></div>
                                                                </div>
                                                            <? } ?>

                                                        </div>
                                                    </div>
                                                <? }

                                                if ($code == 'CONDITIONS_ICONS') { ?>
                                                    <div class="row row-gap-6 mt-7 mt-md-7 mt-lg-8">

                                                        <? foreach ($property as $conditionIcon) { ?>
                                                            <div class="col-12 col-md-6 col-lg-4">
                                                                <div class="benefit d-flex gap-3 flex-column flex-md-row align-items-md-center gap-md-4 gap-lg-6"><img class="icon size-lxl" src="<?= $conditionIcon->filePath ?? '' ?>" alt="icon" loading="lazy">
                                                                    <div class="benefit__content d-flex flex-column gap-3">
                                                                        <h5 class="benefit__title fw-semibold"><?= $conditionIcon->description ?? '' ?></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <? } ?>

                                                    </div>
                                                <? }

                                                if ($code == 'TEXT_FIELD') { ?>
                                                    <? foreach ($property as $textField) { ?>
                                                        <div class="w-100 w-xl-75 rte mt-7 mt-md-7 mt-lg-8">
                                                            <?= !empty($textField->value) ? unserialize($textField->value)['TEXT'] : '' ?>
                                                        </div>
                                                    <? } ?>
                                                <? }

                                                if ($code == 'SHORT_INFO') { ?>
                                                    <? foreach ($property as $shortInfo) { ?>
                                                        <div class="w-100 mt-7 mt-md-7 mt-lg-8">
                                                            <div class="polygon-container js-polygon-container">
                                                                <div class="polygon-container__content">
                                                                    <div class="helper bg-dark-10">
                                                                        <div class="helper__wrapper d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-4 gap-lg-6">
                                                                            <img class="helper__image w-auto float-end" src="/frontend/dist/img/restructuring-additional-info.png" alt="" loading="lazy">
                                                                            <div class="helper__content text-l">
                                                                                <p class="mb-0">
                                                                                    <?= !empty($shortInfo->value) ? unserialize($shortInfo->value)['TEXT'] : '' ?>
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
                                                    <? } ?>
                                                <? }

                                                if ($code == 'QUOTES') { ?>
                                                    <? foreach ($property as $quote) { ?>
                                                        <div class="dark-70 w-100 w-xl-75 rte mt-7 mt-md-7 mt-lg-8">
                                                            <p><?= !empty($quote->value) ? unserialize($quote->value)['TEXT'] : '' ?></p>
                                                        </div>
                                                    <? } ?>
                                                <? }

                                                if ($code == 'QUESTIONS') { ?>
                                                    <div class="row row-gap-6 mt-7 mt-md-7 mt-lg-8">
                                                        <div class="col-12 col-xxl-8">
                                                            <div class="accordion" id="accordion-<?= $arResult['PROPERTIES']['QUESTIONS']['ID'] ?>">
                                                                <? foreach ($property as $question) { ?>
                                                                    <div class="accordion-item">
                                                                        <div class="accordion-header">
                                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $question->id ?>" aria-controls="<?= $question->id ?>">
                                                                                <?= $question->linkedItem->name ?? '' ?>
                                                                            </button>
                                                                        </div>
                                                                        <div class="accordion-collapse collapse" id="<?= $question->id ?>" data-bs-parent="#accordion-<?= $arResult['PROPERTIES']['QUESTIONS']['ID'] ?>">
                                                                            <div class="accordion-body">
                                                                                <p class="text-m mb-0 dark-70">
                                                                                    <?= $question->linkedItem->previewText ?? '' ?>
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
                                            }
                                        }?>
                                    </div>
                                <? } ?>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <picture class="pattern-bg pattern-bg--hide-mobile">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-s.svg" media="(max-width: 767px)">
            <source srcset="/frontend/dist/img/patterns/section-2/pattern-light-m.svg" media="(max-width: 1199px)"><img src="/frontend/dist/img/patterns/section-2/pattern-light-l.svg" alt="bg pattern" loading="lazy">
        </picture>
    </section>
<? } ?>
<? if ($arResult['PROPERTIES']['STEPS']['VALUE'] || $arResult['PROPERTIES']['STEPS']['DESCRIPTION']) { ?>

    <section class="section-restructuring-steps bg-dark-10 py-6 py-sm-9 py-md-11 py-xl-16">
        <div class="container">
            <div class="row px-lg-6">
                <h3 class="d-none d-md-flex"><?= $arResult['PROPERTIES']['STEPS_HEADER']['VALUE'] ?></h3>
                <a class="h3 d-flex align-items-center justify-content-between dark-100 d-md-none" data-bs-toggle="collapse" href="#restructuring-steps-content" role="button" aria-expanded="false" aria-controls="restructuring-steps-content">
                    <?= $arResult['PROPERTIES']['STEPS_HEADER']['VALUE'] ?>sdsds</h3>
                    <svg class="icon size-m violet-100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down"></use>
                    </svg>
                </a>
            </div>
            <div class="section-restructuring-steps__wrapper collapse d-md-block mt-6 mt-lg-7" id="restructuring-steps-content">
                <div class="row row-gap-6 px-lg-6">
                    <div class="stepper steps-3">
                        <? foreach ($arResult['PROPERTIES']['STEPS']['~VALUE'] as $key => $step) {?>

                            <div class="stepper-item stepper-item--color-green">
                                <div class="stepper-item__header">
                                    <div class="stepper-item__number">
                                        <div class="stepper-item__number-value"><?= $key + 1 ?></div>
                                        <div class="stepper-item__number-icon">
                                            <div class="stepper-item__icon-border" data-level="1">
                                                <svg width="76" height="44" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M36.0723 1.06022C37.2727 0.400039 38.7273 0.400039 39.9277 1.06022L74.8138 20.2476C76.1953 21.0074 76.1953 22.9926 74.8138 23.7524L39.9277 42.9398C38.7273 43.6 37.2727 43.6 36.0723 42.9398L1.18624 23.7524C-0.195312 22.9926 -0.19531 21.0074 1.18624 20.2476L36.0723 1.06022Z" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                            <? for ($i = 0; $i < $key; $i++) {?>
                                                <div class="stepper-item__icon-border" data-level="<?= $i + 2 ?>">
                                                    <svg width="80" height="46" viewBox="0 0 80 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M39.5181 1.26505C39.8182 1.10001 40.1818 1.10001 40.4819 1.26506L78.4069 22.1238C79.0977 22.5037 79.0977 23.4963 78.4069 23.8762L40.4819 44.7349C40.1818 44.9 39.8182 44.9 39.5181 44.7349L1.59312 23.8762C0.902343 23.4963 0.902345 22.5037 1.59312 22.1238L39.5181 1.26505Z" stroke="currentColor" stroke-linecap="round" stroke-dasharray="4 4"></path>
                                                    </svg>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                    <div class="stepper-item__arrow"></div>
                                </div>
                                <div class="stepper-item__content">
                                    <? if ($arResult['PROPERTIES']['STEPS']['~DESCRIPTION'][$key]) { ?>
                                        <h4><?= $arResult['PROPERTIES']['STEPS']['~DESCRIPTION'][$key] ?></h4>
                                    <? } ?>
                                    <p class="text-l no-mb"><?= $step ?></p>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? } ?>
