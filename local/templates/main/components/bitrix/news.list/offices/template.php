<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
$this->setFrameMode(true);

$asset = \Bitrix\Main\Page\Asset::getInstance();
$asset->addJs('https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=' . COption::GetOptionString('fileman', 'yandex_map_api_key'));

?>
<section class="border-top border-blue10 section-office">
    <div
        class="map-wrapper"
        id="map"
        data-params="<?= htmlspecialchars(json_encode($arResult['PARAMS'], JSON_UNESCAPED_UNICODE)); ?>"
    ></div>
    <div class="map-content">
        <div class="map-content__header d-flex flex-column row-gap-4 row-gap-md-6">
            <div class="d-flex gap-3 justify-content-between align-items-center">
                <h1 class="map-content__title">Офисы и&nbsp;банкоматы</h1>
                <svg class="map-content__icon-close js-scroll-to-top" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                </svg>
            </div>
            <div class="d-flex flex-column row-gap-3">
                <ul class="nav nav-tabs">
                    <?php foreach ($arResult['MAP_MENU'] as $item): ?>
                        <li class="nav-item w-50">
                            <a
                                class="nav-link text-center <?= $item['ACTIVE'] ? 'active' : ''; ?>"
                                href="<?= $item['URL'] ?>"
                                <?php if ($item['ACTIVE']) : ?>
                                    aria-current="page"
                                <?php endif;?>
                            ><?= $item['NAME'] ?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
                <div class="d-flex gap-2">
                    <div class="flex-grow-1">
                        <div class="input-group input-group--size-small flex-nowrap">
                            <span class="input-group-icon" id="input-search">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                                    </svg>
                                </span>
                            </span>
                            <input class="form-control" type="text" id="offices-search-input" placeholder="Поиск по городу или адресу" aria-label="Поиск по городу или адресу" aria-describedby="input-search">
                        </div>
                    </div>
                    <button class="btn btn-outline-primary btn-icon-alone" type="button" data-bs-toggle="modal" data-bs-target="#modal-offices-filters">
                        <svg class="icon size-m" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-filters"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="map-content__body d-flex flex-column gap-2 gap-md-3" id="offices-list">
            <?php foreach ($arResult['ITEMS'] as $arItem) : ?>
                <a class="card-office d-flex col-gap-2 align-items-center" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" id="office-item-<?= $arItem['ID'] ?>">
                    <div class="card-office__body d-flex flex-grow-1 flex-column row-gap-2 row-gap-md-3">
                        <p class="card-office__title fw-semibold text-l m-0"><?= $arItem['NAME'] ?></p>
                        <p class="card-office__address text-s m-0 dark-70"><?= $arItem['DISPLAY_PROPERTIES']['ADDRESS']['VALUE'] ?></p>
                    </div>
                    <svg class="icon size-m d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-right"></use>
                    </svg>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="modal modal-xl fade" id="modal-offices-filters" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Фильтры</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icon size-m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="d-flex flex-column row-gap-6">
                        <div class="d-flex flex-column row-gap-4">
                            <h5>Обслуживание</h5>
                            <div class="form-check">
                                <input class="form-check-input" id="individuals" type="checkbox" value="">
                                <label class="form-check-label" for="individuals">Физические лица</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="legal" type="checkbox" value="">
                                <label class="form-check-label" for="legal">Юридические лица</label>
                            </div>
                        </div>
                        <div class="d-flex flex-column row-gap-4">
                            <h5>Услуги</h5>
                            <div class="form-check">
                                <input class="form-check-input" id="limited-mobility" type="checkbox" value="">
                                <label class="form-check-label" for="limited-mobility">Доступно для маломобильных граждан</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="brokerage" type="checkbox" value="">
                                <label class="form-check-label" for="brokerage">Услуги по&nbsp;брокерскому обслуживанию и&nbsp;доверительному управлению активами</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="biometrics" type="checkbox" value="">
                                <label class="form-check-label" for="biometrics">Можно сдавать биометрию</label>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row gap-3 gap-md-6 mt-md-2">
                            <button class="btn btn-primary btn-md-lg" type="button" data-bs-dismiss="modal" id="filters-submit-button">Применить</button>
                            <button class="btn btn-outline-primary btn-md-lg" type="button" data-bs-dismiss="modal">Сбросить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
