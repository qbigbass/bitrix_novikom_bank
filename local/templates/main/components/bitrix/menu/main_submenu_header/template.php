<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? global $APPLICATION; ?>
<? if (!empty($arResult)) { ?>
    <div class="navbar w-100">
        <? foreach ($arResult['FIRST_LEVEL_MENU']['NOT_HIDDEN'] as $notHiddenItem) { ?>
            <? $issetChildren = isset($arResult['SECOND_LEVEL_MENU'][$notHiddenItem['ITEM_INDEX']]) ?>
            <? $jsDesktopMoveLink = ($notHiddenItem['JS_DESKTOP_MOVE_LINK']) ? ' js-desktop-move-link d-none d-xl-inline-flex' : ''; ?>
            <?
            if ($issetChildren) {
                $path = array_filter(explode('/', $APPLICATION->GetCurDir()));
                $parentDir = reset($path);
                $isActive = $parentDir === basename($notHiddenItem['LINK']);
            } else {
                $isActive = $notHiddenItem['LINK'] === $APPLICATION->GetCurDir();
            }
            ?>
            <? if ($issetChildren) { ?>
                <a class="header__link <?= $isActive ? 'is-selected' : '' ?> js-dropdown-link gap-1 align-items-center d-inline-flex<?= $jsDesktopMoveLink ?>"
                   href="#spoiler-<?= $notHiddenItem['ITEM_INDEX'] ?>" role="button" aria-expanded="false"
                   aria-controls="spoiler-<?= $notHiddenItem['ITEM_INDEX'] ?>">
                    <span class="fw-semibold"><?= $notHiddenItem['TEXT'] ?></span>
                    <span class="icon size-s" slot="icon-after">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                            <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-chevron-down-small"></use>
                        </svg>
                    </span>
                </a>
            <? } else { ?>
                <a
                    class="header__link <?= $isActive ? 'is-selected' : '' ?> d-inline-flex gap-1 align-items-center<?= $jsDesktopMoveLink ?>"
                    href="<?= $notHiddenItem['LINK'] ?>"
                >
                    <span class="fw-semibold"><?= $notHiddenItem['TEXT'] ?></span>
                </a>
            <? } ?>
        <? } ?>
        <? if (!empty($arResult['FIRST_LEVEL_MENU']['HIDDEN']) || array_column($arResult['FIRST_LEVEL_MENU']['NOT_HIDDEN'], 'JS_DESKTOP_MOVE_LINK')) { ?>
            <div class="dropdown js-dropdown-menu">
                <button class="icon size-m dropdown-toggle violet-100" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-more"></use>
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <? foreach ($arResult['FIRST_LEVEL_MENU']['NOT_HIDDEN'] as $notHiddenItem) {
                        if ($notHiddenItem['JS_DESKTOP_MOVE_LINK']) { ?>
                            <li>
                                <a
                                    class="dropdown-item fw-bold d-xl-none"
                                    href="<?= $notHiddenItem['LINK'] ?>"
                                ><?= $notHiddenItem['TEXT'] ?></a>
                            </li>
                        <? }
                    } ?>
                    <? foreach ($arResult['FIRST_LEVEL_MENU']['HIDDEN'] as $hiddenItem) { ?>
                        <li>
                            <a
                                class="dropdown-item fw-bold"
                                href="<?= $hiddenItem['LINK'] ?>"
                            ><?= $hiddenItem['TEXT'] ?></a>
                        </li>
                    <? } ?>
                </ul>
            </div>
        <? } ?>
        <div class="dropdown js-dropdown-menu">
            <button class="icon size-m dropdown-toggle violet-100 js-dropdown-link" type="button" data-target="#search"
                    aria-expanded="false" aria-controls="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                </svg>
            </button>
        </div>
    </div>
    <? foreach ($arResult['SECOND_LEVEL_MENU'] as $indexItem => $secondLevelItems) { ?>
        <div class="dropdown-nav js-dropdown-nav" id="spoiler-<?= $indexItem ?>" role="menu">
            <div class="row">
                <div class="col-6 col-xxl-8">
                    <div class="row row-gap-4">
                        <? foreach ($secondLevelItems as $item) { ?>
                            <div class="col-6 violet-100">
                                <a class="header__link fw-semibold" href="<?= $item['LINK'] ?>"
                                   tabindex="-1"><?= $item['TEXT'] ?></a>
                            </div>
                        <? } ?>
                    </div>
                </div>
                <div class="col-6 col-xxl-4">
                    <a class="polygon-container js-polygon-container" href="#" tabindex="-1">
                        <div class="polygon-container__content">
                            <div class="card-menu">
                                <img class="card-menu__image" src="/frontend/dist/img/card-menu-image.png" alt=""
                                     loading="lazy">
                                <h5>Зарплатная карта «Мир»</h5>
                                <p class="text-s mb-0">Карта с&nbsp;полным набором<br>операций в&nbsp;торговых
                                    точках<br>и&nbsp;интернете</p>
                            </div>
                        </div>
                        <div class="polygon-container__polygon js-polygon-container-polygon green-100">
                            <svg class="js-polygon-container-svg" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="2,2 335,2 335,394 295,434 2,434" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-dasharray="10"></polygon>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <? } ?>
    <div class="dropdown-nav js-dropdown-nav" id="search">
        <div class="d-flex flex-column gap-6">
            <form method="get" id="header-search-form" action="/search/">
                <div class="input-group flex-nowrap">
                    <span class="input-group-icon" id="input-search">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                                <use xlink:href="/frontend/dist/img/svg-sprite.svg#icon-search"></use>
                            </svg>
                        </span>
                    </span>
                    <input
                        id="header-input-search"
                        name="q"
                        class="form-control"
                        type="text"
                        placeholder="Поиск по сайту"
                        aria-label="Поиск по сайту"
                        aria-describedby="input-search"
                        tabindex="-1"
                        value="<?= htmlspecialchars($_GET['q'] ?? ''); ?>"
                    >
                </div>
            </form>
            <div class="d-flex flex-column gap-4">
                <span class="dark-70">Популярные запросы:</span>
                <div class="d-flex flex-wrap gap-3">
                    <a class="chip text-s" href="#" tabindex="-1">Зарплатный проект</a>
                    <a class="chip text-s" href="#" tabindex="-1">Зарплатная карта</a>
                    <a class="chip text-s" href="#" tabindex="-1">Расчетный счет</a>
                    <a class="chip text-s" href="#" tabindex="-1">Ипотека в новостройке</a>
                    <a class="chip text-s" href="#" tabindex="-1">Кредит на бизнес</a>
                    <a class="chip text-s" href="#" tabindex="-1">Депозиты</a>
                    <a class="chip text-s" href="#" tabindex="-1">Вклады</a>
                    <a class="chip text-s" href="#" tabindex="-1">Социально-платежная карта МИР</a>
                    <a class="chip text-s" href="#" tabindex="-1">Банковские гарантии</a>
                </div>
            </div>
        </div>
    </div>
<? } ?>
